'use strict';

const fs = require('fs');
const path = require('path');
const express = require('express');
const session = require('express-session');

const db = require('./lib/data');
const store = require('./lib/store');
const ubb = require('./lib/ubb');
const h = require('./lib/helpers');

const app = express();
const PORT = Number(process.env.PORT) || 8000;

app.set('view engine', 'ejs');
app.set('views', path.join(__dirname, 'views'));
app.disable('x-powered-by');

app.use(express.urlencoded({ extended: false, limit: '1mb' }));

/* Packaged image assets: one binary blob + offset index (keeps source file count low). */
const ASSET_BIN = path.join(__dirname, 'assets', 'assets.bin');
const assetIndex = JSON.parse(fs.readFileSync(path.join(__dirname, 'assets', 'index.json'), 'utf8'));

app.use((req, res, next) => {
  if (req.method !== 'GET' && req.method !== 'HEAD') return next();
  let key;
  try {
    key = decodeURIComponent(req.path).replace(/^\/+/, '');
  } catch (e) {
    return next();
  }
  const entry = assetIndex[key];
  if (!entry) return next();
  const [offset, size, mime] = entry;
  res.set('Content-Type', mime);
  res.set('Content-Length', String(size));
  res.set('Cache-Control', 'public, max-age=604800');
  res.set('ETag', `"a${offset}-${size}"`);
  if (req.method === 'HEAD') return res.end();
  const stream = fs.createReadStream(ASSET_BIN, { start: offset, end: offset + size - 1 });
  stream.on('error', next);
  return stream.pipe(res);
});
app.use(
  session({
    name: 'yiqi.sid',
    secret: process.env.SESSION_SECRET || 'yiqi-17camera-archive',
    resave: false,
    saveUninitialized: false,
    cookie: { httpOnly: true, sameSite: 'lax', maxAge: 7 * 24 * 3600 * 1000 },
  })
);

const asyncRoute = (fn) => (req, res, next) => Promise.resolve(fn(req, res, next)).catch(next);

app.use((req, res, next) => {
  res.locals.user = req.session.user || null;
  res.locals.h = h;
  res.locals.catName = db.categoryName;
  res.locals.modelCover = db.modelCover;
  res.locals.photoSrc = db.photoSrc;
  res.locals.competeSrc = db.competeSrc;
  res.locals.mmSrc = db.mmSrc;
  res.locals.modelImage = db.modelImage;
  res.locals.userAvatar = db.userAvatar;
  res.locals.currentPath = req.path;
  res.locals.nav = [
    { href: '/', label: '首页' },
    { href: '/news', label: '摄影资讯' },
    { href: '/gallery', label: '作品图库' },
    { href: '/cameras', label: '器材库' },
    { href: '/models', label: '模特' },
    { href: '/competition', label: '赛事' },
    { href: '/forum', label: '论坛' },
  ];
  next();
});

/* ------------------------------------------------------------------ home */

app.get('/', (req, res) => {
  const featured = db.photos.filter((p) => String(p.tj) === '1').slice(0, 8);
  const latest = db.photos.slice().sort((a, b) => Number(b.pid) - Number(a.pid)).slice(0, 12);
  const newsList = db.news
    .filter((n) => Number(n.b_id) === 12)
    .sort((a, b) => Number(b.n_id) - Number(a.n_id))
    .slice(0, 8);
  const articles = db.news
    .filter((n) => [4, 5, 7, 11].includes(Number(n.b_id)))
    .sort((a, b) => Number(b.n_id) - Number(a.n_id))
    .slice(0, 8);
  const cameras = db.caProducts
    .slice()
    .sort((a, b) => Number(b.id) - Number(a.id))
    .slice(0, 6);
  const featuredModel = db.models.find((m) => String(m.tj) === '1') || db.models[0] || null;
  const featuredMember = db.users.find((u) => String(u.xc_tj) === '1') || null;
  const forumLatest = db
    .threadRows()
    .slice()
    .sort((a, b) => Number(b.lastpost) - Number(a.lastpost))
    .slice(0, 8);
  res.render('pages/home', {
    title: '逸憩摄影 · 17camera.com',
    featured,
    latest,
    newsList,
    articles,
    cameras,
    featuredModel,
    featuredMember,
    forumLatest,
    stats: {
      photos: db.photos.length,
      members: db.users.length,
      threads: db.threadRows().length,
      posts: db.postRows().length,
    },
  });
});

/* ------------------------------------------------------------------ news */

const NEWS_LABEL = Object.fromEntries(db.big.map((b) => [String(b.b_id), b.b_type]));
const ARTICLE_IDS = [4, 5, 7, 11];

app.get('/news', (req, res) => {
  const cat = req.query.cat ? String(req.query.cat) : '';
  let list = db.news.slice();
  if (cat === 'article') list = list.filter((n) => ARTICLE_IDS.includes(Number(n.b_id)));
  else if (cat) list = list.filter((n) => String(n.b_id) === cat);
  list.sort((a, b) => Number(b.n_id) - Number(a.n_id));
  const p = h.paginate(list.length, req.query.page, 20);
  res.render('pages/news-list', {
    title: cat === 'article' ? '技术文章' : '摄影资讯',
    cat,
    label: NEWS_LABEL,
    categories: db.big,
    list: list.slice(p.offset, p.offset + 20),
    pager: p,
  });
});

app.get('/news/:id(\\d+)', (req, res, next) => {
  const article = db.newsById(req.params.id);
  if (!article) return next();
  db.addHit(article.n_id);
  const related = db.news
    .filter((n) => Number(n.b_id) === Number(article.b_id) && n.n_id !== article.n_id)
    .sort((a, b) => Number(b.n_id) - Number(a.n_id))
    .slice(0, 8);
  res.render('pages/news-detail', {
    title: article.n_title,
    article,
    hits: db.hitCount(article),
    label: NEWS_LABEL,
    content: ubb.convert(article.n_content),
    related,
  });
});

/* --------------------------------------------------------------- gallery */

const PHOTO_CATEGORIES = db.leib.filter((l) => String(l.leib) !== '12');

app.get('/gallery', (req, res) => {
  const cat = req.query.cat ? String(req.query.cat) : '';
  const list = db.photosByCategory(cat).slice().sort((a, b) => Number(b.pid) - Number(a.pid));
  const p = h.paginate(list.length, req.query.page, 12);
  res.render('pages/gallery', {
    title: '作品图库',
    cat,
    categories: PHOTO_CATEGORIES,
    photos: list.slice(p.offset, p.offset + 12),
    pager: p,
  });
});

app.get('/gallery/:pid(\\d+)', (req, res, next) => {
  const photo = db.photos.find((p) => String(p.pid) === String(req.params.pid));
  if (!photo) return next();
  const author = db.userOf(photo.users);
  const comments = db.commentsFor(photo.pid);
  const more = db.photosByAuthor(photo.users).filter((p) => p.pid !== photo.pid).slice(0, 6);
  res.render('pages/photo', {
    title: photo.names || '作品',
    photo,
    author,
    comments,
    more,
    src: db.photoSrc(photo),
  });
});

app.post('/gallery/:pid(\\d+)/comment', asyncRoute(async (req, res) => {
  const photo = db.photos.find((p) => String(p.pid) === String(req.params.pid));
  if (!photo) return res.redirect('/gallery');
  if (!req.session.user) return res.redirect('/login?next=' + encodeURIComponent(`/gallery/${photo.pid}`));
  const content = String(req.body.content || '').trim();
  if (content) await db.addComment(photo.pid, req.session.user.username, content.slice(0, 1000));
  res.redirect(`/gallery/${photo.pid}#comments`);
}));

app.get('/author/:username', (req, res, next) => {
  const username = req.params.username;
  const user = db.userOf(username);
  const albums = db.photosByAuthor(username).sort((a, b) => Number(b.pid) - Number(a.pid));
  if (!albums.length && !db.state.users.find((u) => u.username === username)) return next();
  res.render('pages/author', {
    title: `${username} 的个人专辑`,
    profile: user,
    albums,
    forumPosts: db.postRows().filter((p) => p.author === username).length,
  });
});

/* ---------------------------------------------------------------- models */

app.get('/models', (req, res) => {
  const models = db.models.slice().sort((a, b) => Number(b.id) - Number(a.id));
  res.render('pages/models', { title: '逸憩模特', models });
});

app.get('/models/:name', (req, res, next) => {
  const name = req.params.name;
  const model = db.models.find((m) => m.name === name);
  const shots = db.mmphoto
    .filter((m) => m.name === name)
    .sort((a, b) => Number(b.pid) - Number(a.pid));
  if (!model && !shots.length) return next();
  res.render('pages/model', {
    title: model ? `模特 · ${name}` : name,
    model: model || { name },
    shots,
  });
});

/* ----------------------------------------------------------- competition */

app.get('/competition', (req, res) => {
  const list = db.compete.slice().sort((a, b) => Number(b.pid) - Number(a.pid));
  res.render('pages/competition', { title: '摄影赛事 · 参赛作品', photos: list });
});

app.get('/competition/:pid(\\d+)', (req, res, next) => {
  const photo = db.compete.find((p) => String(p.pid) === String(req.params.pid));
  if (!photo) return next();
  res.render('pages/compete-photo', {
    title: photo.names || '参赛作品',
    photo,
    author: db.userOf(photo.users),
    src: db.competeSrc(photo),
  });
});

/* --------------------------------------------------------------- cameras */

const SPEC_FIELDS = [
  ['xingh', '型号'], ['name', '商品名'], ['fs', '上市时间'], ['xs', '有效像素(万)'],
  ['ccd', '传感器'], ['zdfbl', '最大分辨率'], ['qtfbl', '其他分辨率'], ['iso', 'ISO 感光度'],
  ['gxbj', '光学变焦'], ['smbj', '数码变焦'], ['zddj', '最大对焦距离'], ['sddj', '最短对焦距离'],
  ['djfw', '对焦范围'], ['wj', '镜头'], ['bph', '曝光模式'], ['km', '快门速度'],
  ['gq', '光圈'], ['bg', '白平衡'], ['sg', '闪光灯'], ['bgbc', '曝光补偿'],
  ['cg', '测光方式'], ['kj', '连拍'], ['lp', '视频'], ['yk', '取景器'],
  ['sjj', '数据接口'], ['zp', '照片格式'], ['sp', '视频输出'], ['cc', '存储媒介'],
  ['ys', '颜色'], ['hz', '画质选择'], ['gxqj', '取景器'], ['yjxs', '液晶显示屏'],
  ['ljk', '接口'], ['dc', '电池'], ['zl', '重量'], ['gg', '尺寸规格'],
  ['spsc', '视频时长'], ['bz', '备注'],
];

app.get('/cameras', (req, res) => {
  const brand = req.query.brand ? String(req.query.brand) : '';
  let list = db.caProducts.slice();
  if (brand) list = list.filter((c) => String(c.class) === brand);
  list.sort((a, b) => Number(b.id) - Number(a.id));
  const p = h.paginate(list.length, req.query.page, 12);
  res.render('pages/cameras', {
    title: '器材库',
    brand,
    brands: db.caSorts,
    cameras: list.slice(p.offset, p.offset + 12),
    pager: p,
  });
});

app.get('/cameras/:id(\\d+)', (req, res, next) => {
  const camera = db.caProducts.find((c) => String(c.id) === String(req.params.id));
  if (!camera) return next();
  const brand = db.caSorts.find((s) => String(s.sortid) === String(camera.class));
  res.render('pages/camera', {
    title: `${camera.xingh || camera.name} · 器材库`,
    camera,
    brand,
    specs: SPEC_FIELDS.map(([key, label]) => ({ label, value: camera[key] })).filter((s) => s.value),
  });
});

/* ----------------------------------------------------------------- forum */

app.get('/forum', (req, res) => {
  const groups = db.forums.map((f) => ({ ...f, stats: db.forumStats(f.fid) }));
  res.render('pages/forum-index', {
    title: '逸憩论坛',
    forums: groups,
    totalThreads: db.threadRows().length,
    totalPosts: db.postRows().length,
  });
});

app.get('/forum/:fid(\\d+)', (req, res, next) => {
  const forum = db.forumById(req.params.fid);
  if (!forum) return next();
  const list = db.threadsOfForum(forum.fid);
  const p = h.paginate(list.length, req.query.page, 25);
  res.render('pages/forum-list', {
    title: forum.name,
    forum,
    threads: list.slice(p.offset, p.offset + 25),
    pager: p,
    userId: db.userOf(req.session.user ? req.session.user.username : ''),
  });
});

app.get('/forum/thread/:tid(\\d+)', (req, res, next) => {
  const thread = db.threadById(req.params.tid);
  if (!thread) return next();
  const forum = db.forumById(thread.fid);
  const list = db.postsOfThread(thread.tid);
  const p = h.paginate(list.length, req.query.page, 15);
  res.render('pages/thread', {
    title: thread.subject,
    thread,
    forum,
    posts: list.slice(p.offset, p.offset + 15),
    pager: p,
    content: (msg) => ubb.convert(msg),
  });
});

function requireLogin(req, res, next) {
  if (!req.session.user) {
    return res.redirect('/login?next=' + encodeURIComponent(req.originalUrl));
  }
  next();
}

app.post('/forum/thread/:tid(\\d+)/reply', requireLogin, asyncRoute(async (req, res) => {
  const thread = db.threadById(req.params.tid);
  if (!thread) return res.redirect('/forum');
  const message = String(req.body.message || '').trim().slice(0, 20000);
  if (message) await db.replyThread(thread.tid, req.session.user.username, req.body.subject || '', message);
  res.redirect(`/forum/thread/${thread.tid}`);
}));

app.post('/forum/:fid(\\d+)/new', requireLogin, asyncRoute(async (req, res) => {
  const forum = db.forumById(req.params.fid);
  if (!forum) return res.redirect('/forum');
  const subject = String(req.body.subject || '').trim().slice(0, 120);
  const message = String(req.body.message || '').trim().slice(0, 20000);
  if (!subject || !message) return res.redirect(`/forum/${forum.fid}`);
  const thread = await db.createThread(forum.fid, req.session.user.username, subject, message);
  res.redirect(`/forum/thread/${thread.tid}`);
}));

/* ------------------------------------------------------------------ auth */

app.get('/login', (req, res) => {
  res.render('pages/login', { title: '会员登录', next: req.query.next || '', error: null });
});

app.post('/login', (req, res) => {
  const username = String(req.body.username || '').trim();
  const password = String(req.body.password || '');
  const next = String(req.body.next || '');
  const user = db.users.concat(db.state.users).find((u) => u.username === username);
  if (!user || h.md5(password) !== user.password) {
    return res.status(401).render('pages/login', {
      title: '会员登录',
      next,
      error: '用户名或密码有误，请重试。',
    });
  }
  req.session.user = { username: user.username, flag: Number(user.flag) || 1 };
  res.redirect(next && next.startsWith('/') ? next : '/');
});

app.get('/register', (req, res) => {
  res.render('pages/register', { title: '注册会员', error: null, form: {} });
});

app.post('/register', asyncRoute(async (req, res) => {
  const form = {
    username: String(req.body.username || '').trim(),
    email: String(req.body.email || '').trim(),
    sex: String(req.body.sex || '').trim(),
    qq: String(req.body.qq || '').trim(),
    msn: String(req.body.msn || '').trim(),
    web: String(req.body.web || '').trim(),
    address: String(req.body.address || '').trim(),
    tele: String(req.body.tele || '').trim(),
  };
  const password = String(req.body.password || '');
  const fail = (error) => res.status(400).render('pages/register', { title: '注册会员', error, form });
  if (!/^[\w\u4e00-\u9fa5.-]{2,32}$/.test(form.username)) return fail('用户名需为 2-32 位字母、数字、中文或 .-_ 组合。');
  if (password.length < 4) return fail('密码至少 4 位。');
  if (db.users.concat(db.state.users).some((u) => u.username === form.username)) return fail('该用户名已被注册。');
  const user = await db.createUser({ ...form, password: h.md5(password) });
  req.session.user = { username: user.username, flag: 1 };
  res.redirect('/');
}));

app.post('/logout', (req, res) => {
  req.session.destroy(() => res.redirect('/'));
});

app.get('/u/:username', (req, res, next) => {
  const username = req.params.username;
  const user = db.userOf(username);
  const exists = db.users.concat(db.state.users).some((u) => u.username === username);
  if (!exists) return next();
  res.render('pages/profile', {
    title: `${username} 的资料`,
    profile: user,
    albums: db.photosByAuthor(username),
    posts: db.postRows().filter((p) => p.author === username).slice(-10).reverse(),
  });
});

/* ---------------------------------------------------------------- search */

app.get('/search', (req, res) => {
  const q = String(req.query.q || '').trim();
  const lower = q.toLowerCase();
  const hit = (text) => String(text || '').toLowerCase().includes(lower);
  const result = { news: [], photos: [], threads: [], cameras: [] };
  if (q) {
    result.news = db.news.filter((n) => hit(n.n_title)).slice(0, 20);
    result.photos = db.photos.filter((p) => hit(p.names) || hit(p.users)).slice(0, 24);
    result.threads = db.threadRows().filter((t) => hit(t.subject)).slice(0, 20);
    result.cameras = db.caProducts.filter((c) => hit(c.xingh) || hit(c.name)).slice(0, 20);
  }
  res.render('pages/search', { title: q ? `搜索：${q}` : '搜索', q, result, total: Object.values(result).reduce((n, arr) => n + arr.length, 0) });
});

/* ------------------------------------------------------------------ misc */

app.use(express.static(path.join(__dirname, 'public'), { maxAge: '7d', redirect: false }));

app.use((req, res) => {
  res.status(404).render('pages/error', { title: '页面不存在', code: 404, message: '没有找到这个页面。' });
});

app.use((err, req, res, next) => {
  console.error(err);
  res.status(500).render('pages/error', { title: '出错了', code: 500, message: '服务暂时不可用，请稍后再试。' });
});

async function start() {
  try {
    const persisted = await store.init();
    if (persisted) {
      db.hydrate(persisted);
      console.log(`storage: ${persisted.mode} (${persisted.users.length} users, ${persisted.threads.length} threads, ${persisted.posts.length} posts, ${persisted.comments.length} comments)`);
    } else {
      console.log('storage: local file (ephemeral). Set DATABASE_URL for durable storage.');
    }
  } catch (e) {
    console.error('database init failed, falling back to ephemeral storage:', e.message);
  }
  app.listen(PORT, '0.0.0.0', () => {
    console.log(`yiqi archive listening on 0.0.0.0:${PORT}`);
  });
}

start();
