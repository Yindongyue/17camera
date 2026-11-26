'use strict';

const fs = require('fs');
const path = require('path');
const store = require('./store');

const DATA_DIR = path.join(__dirname, '..', 'data');
const STATE_DIR = process.env.TMPDIR || '/tmp';
const STATE_FILE = path.join(STATE_DIR, 'yiqi-archive-state.json');

function load(name) {
  return JSON.parse(fs.readFileSync(path.join(DATA_DIR, name + '.json'), 'utf8'));
}

/* ---------- immutable content exported from the legacy MySQL database ---------- */

const users = load('users');
const users2 = (() => {
  try { return load('users2'); } catch (e) { return []; }
})();
const photoReviews = load('photo_review');
const newsReviews = load('news_review');
const mmphoto = load('mmphoto');
const models = load('model');
const big = load('big');
const leib = load('leib');
const leib2 = load('leib2');
const caSorts = load('ca_sorts');
const caProducts = load('ca_product');
const forums = load('forums');
const state = { users: [], threads: [], posts: [], comments: [], newsReview: [], hits: {}, threadMeta: {} };

// "人体类" was removed when the archive was published.
const photos = load('photo').filter((p) => String(p.leib) !== '12');
const compete = load('photo2');
const news = load('news');
const threads = load('threads');
const posts = load('posts');

/* ---------- mutable runtime state (database, falls back to TMPDIR JSON) ---------- */

function loadState() {
  try {
    const saved = JSON.parse(fs.readFileSync(STATE_FILE, 'utf8'));
    Object.assign(state, saved);
  } catch (e) {
    /* first run or wiped temp dir */
  }
}

function persist() {
  if (store.isDatabase()) return;
  try {
    fs.mkdirSync(STATE_DIR, { recursive: true });
    fs.writeFileSync(STATE_FILE, JSON.stringify(state));
  } catch (e) {
    console.error('state persist failed:', e.message);
  }
}

function hydrate(rows) {
  if (!rows) return;
  state.users = rows.users || [];
  state.threads = rows.threads || [];
  state.posts = rows.posts || [];
  state.comments = rows.comments || [];
  for (const u of state.users) userIndex.set(u.username, u);
}

function nextId(rows, key) {
  return rows.reduce((max, r) => Math.max(max, Number(r[key]) || 0), 0) + 1;
}

/* ---------- lookups ---------- */

const userIndex = new Map();
for (const u of users) userIndex.set(u.username, u);
for (const u of users2) if (!userIndex.has(u.username)) userIndex.set(u.username, u);
for (const u of state.users) userIndex.set(u.username, u);

function userOf(username) {
  return userIndex.get(username) || { username, flag: 1 };
}

function authorFolder(username, fallback) {
  const u = userIndex.get(username);
  return (u && u.jhhao) || fallback || '';
}

function photoSrc(p) {
  const folder = authorFolder(p.users, p.jhhao);
  return `/pic/${encodeURIComponent(folder)}/${encodeURIComponent(p.pic)}`;
}

function competeSrc(p) {
  const folder = authorFolder(p.users);
  return `/pic/compete/${encodeURIComponent(folder)}/${encodeURIComponent(p.pic)}`;
}

function mmSrc(p) {
  return `/pic/${encodeURIComponent(p.jhhao)}/${encodeURIComponent(p.pic)}`;
}

function modelCover(name) {
  const shot = mmphoto
    .filter((m) => m.name === name)
    .sort((a, b) => Number(a.pid) - Number(b.pid))[0];
  return shot && assetSrc([shot.jhhao, shot.pic].filter(Boolean)) ? mmSrc(shot) : null;
}

/* Featured model image: prefer the legacy cover, fall back to the first portrait shot. */
function modelImage(m) {
  if (!m) return null;
  const parts = m.tj_pic
    ? (m.tj_pic.includes('/') ? m.tj_pic.split('/') : [m.jhhao, m.tj_pic])
    : [];
  return assetSrc(parts.filter(Boolean)) || modelCover(m.name);
}

function categoryName(id) {
  const row = leib.find((l) => String(l.leib) === String(id));
  return row ? row.lb_name : '';
}

/* Avatars are legacy `tj_pic` values; only serve them when the packaged asset really exists. */
const assetIndex = require('../assets/index.json');
const IMAGE_RE = /\.(jpe?g|png|gif|webp|bmp)$/i;

function assetSrc(parts) {
  if (!parts.length || !IMAGE_RE.test(parts[parts.length - 1])) return null;
  return assetIndex['pic/' + parts.join('/')] ? `/pic/${parts.map(encodeURIComponent).join('/')}` : null;
}

function userAvatar(u) {
  if (!u || !u.tj_pic) return null;
  return assetSrc(u.tj_pic.split('/').filter(Boolean));
}

function photosByAuthor(username) {
  return photos.filter((p) => p.users === username);
}

function photosByCategory(cat) {
  return cat ? photos.filter((p) => String(p.leib) === String(cat)) : photos;
}

function commentsFor(pid) {
  return photoReviews
    .filter((c) => String(c.pid) === String(pid))
    .concat(state.comments.filter((c) => String(c.pid) === String(pid)))
    .sort((a, b) => String(a.dat).localeCompare(String(b.dat)));
}

function newsById(id) {
  return news.find((n) => String(n.n_id) === String(id));
}

function addHit(id) {
  const key = String(id);
  state.hits[key] = (state.hits[key] || 0) + 1;
}

function hitCount(n) {
  return (Number(n.n_hit) || 0) + (state.hits[String(n.n_id)] || 0);
}

/* forum */

function threadRows() {
  const extra = new Map();
  for (const p of state.posts) {
    const key = String(p.tid);
    let e = extra.get(key);
    if (!e) {
      e = { count: 0, lastpost: 0, lastposter: '' };
      extra.set(key, e);
    }
    e.count += 1;
    if (!e.lastpost || Number(p.dateline) >= e.lastpost) {
      e.lastpost = Number(p.dateline);
      e.lastposter = p.author;
    }
  }
  const base = threads.map((t) => {
    const e = extra.get(String(t.tid));
    if (!e) return t;
    return {
      ...t,
      replies: (Number(t.replies) || 0) + e.count,
      lastpost: Math.max(Number(t.lastpost) || 0, e.lastpost),
      lastposter: e.lastposter || t.lastposter,
    };
  });
  const persisted = state.threads.map((t) => {
    const e = extra.get(String(t.tid));
    if (!e) return { ...t, replies: 0 };
    return { ...t, replies: Math.max(0, e.count - 1), lastpost: e.lastpost, lastposter: e.lastposter };
  });
  return base.concat(persisted);
}

function postRows() {
  return posts.concat(state.posts);
}

function threadsOfForum(fid) {
  return threadRows()
    .filter((t) => String(t.fid) === String(fid))
    .sort((a, b) => (b.topped - a.topped) || (Number(b.lastpost) - Number(a.lastpost)));
}

function postsOfThread(tid) {
  return postRows()
    .filter((p) => String(p.tid) === String(tid))
    .sort((a, b) => (Number(a.dateline) - Number(b.dateline)) || (Number(a.pid) - Number(b.pid)));
}

function forumById(fid) {
  return forums.find((f) => String(f.fid) === String(fid));
}

function threadById(tid) {
  return threadRows().find((t) => String(t.tid) === String(tid));
}

function forumStats(fid) {
  const list = threadsOfForum(fid);
  let count = 0;
  for (const t of list) count += (Number(t.replies) || 0) + 1;
  return { threads: list.length, posts: count };
}

/* users */

async function createUser({ username, password, sex, email, tele, address, web, qq, msn }) {
  const now = new Date();
  const u = {
    userid: nextId(users.concat(state.users), 'userid'),
    username,
    password,
    sex: sex || '',
    tele: tele || '',
    address: address || '',
    email: email || '',
    web: web || '',
    flag: 1,
    dat: now.toISOString().replace('T', ' ').slice(0, 19),
    jhhao: 'u' + Math.random().toString(36).slice(2, 13),
    xc_tj: '',
    tj_pic: '',
    tj_dat: '',
    qq: qq || '',
    msn: msn || '',
    status: 1,
    local: true,
  };
  await store.insert('app_users', {
    userid: u.userid, username: u.username, password: u.password, sex: u.sex,
    tele: u.tele, address: u.address, email: u.email, web: u.web, flag: u.flag,
    dat: u.dat, jhhao: u.jhhao, qq: u.qq, msn: u.msn, status: u.status,
  });
  state.users.push(u);
  userIndex.set(u.username, u);
  persist();
  return u;
}

async function addComment(pid, username, content) {
  const c = {
    id: nextId(photoReviews.concat(state.comments), 'id'),
    pid: Number(pid),
    content,
    username,
    dat: new Date().toISOString().replace('T', ' ').slice(0, 19),
  };
  await store.insert('app_comments', c);
  state.comments.push(c);
  persist();
  return c;
}

async function createThread(fid, author, subject, message) {
  const now = Math.floor(Date.now() / 1000);
  const t = {
    tid: nextId(threadRows(), 'tid'),
    fid: Number(fid),
    author,
    subject,
    dateline: now,
    lastpost: now,
    lastposter: author,
    views: 0,
    replies: 0,
    topped: 0,
    digest: 0,
    closed: '',
    local: true,
  };
  const p = {
    pid: nextId(postRows(), 'pid'),
    tid: t.tid,
    fid: t.fid,
    author,
    subject,
    dateline: now,
    message,
    local: true,
  };
  await store.insert('app_threads', {
    tid: t.tid, fid: t.fid, author: t.author, subject: t.subject, dateline: t.dateline,
    lastpost: t.lastpost, lastposter: t.lastposter, views: t.views, replies: t.replies,
    topped: t.topped, digest: t.digest, closed: t.closed,
  });
  await store.insert('app_posts', {
    pid: p.pid, tid: p.tid, fid: p.fid, author: p.author, subject: p.subject,
    dateline: p.dateline, message: p.message,
  });
  state.threads.push(t);
  state.posts.push(p);
  persist();
  return t;
}

async function replyThread(tid, author, subject, message) {
  const t = threadById(tid);
  if (!t) return null;
  const now = Math.floor(Date.now() / 1000);
  const p = {
    pid: nextId(postRows(), 'pid'),
    tid: Number(tid),
    fid: t.fid,
    author,
    subject: subject || '',
    dateline: now,
    message,
    local: true,
  };
  await store.insert('app_posts', {
    pid: p.pid, tid: p.tid, fid: p.fid, author: p.author, subject: p.subject,
    dateline: p.dateline, message: p.message,
  });
  state.posts.push(p);
  persist();
  return t;
}

loadState();

module.exports = {
  users, photoReviews, newsReviews, mmphoto, models, big, leib, leib2,
  caSorts, caProducts, forums, news, state,
  photos, compete, threads, posts,
  userOf, authorFolder, photoSrc, competeSrc, mmSrc, userAvatar, modelCover, modelImage, categoryName,
  photosByAuthor, photosByCategory, commentsFor, newsById, addHit, hitCount,
  threadRows, postRows, threadsOfForum, postsOfThread, forumById, threadById, forumStats,
  createUser, addComment, createThread, replyThread, nextId, persist, hydrate,
};
