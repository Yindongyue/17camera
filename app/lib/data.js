'use strict';

const fs = require('fs');
const path = require('path');

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

/* ---------- mutable runtime state (ephemeral, lives in TMPDIR) ---------- */

function loadState() {
  try {
    const saved = JSON.parse(fs.readFileSync(STATE_FILE, 'utf8'));
    Object.assign(state, saved);
  } catch (e) {
    /* first run or wiped temp dir */
  }
}

function persist() {
  try {
    fs.mkdirSync(STATE_DIR, { recursive: true });
    fs.writeFileSync(STATE_FILE, JSON.stringify(state));
  } catch (e) {
    console.error('state persist failed:', e.message);
  }
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
  return shot ? mmSrc(shot) : null;
}

function categoryName(id) {
  const row = leib.find((l) => String(l.leib) === String(id));
  return row ? row.lb_name : '';
}

function userAvatar(u) {
  if (!u || !u.tj_pic) return null;
  return `/pic/${u.tj_pic.split('/').map(encodeURIComponent).join('/')}`;
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
  const meta = state.threadMeta || {};
  const base = threads.map((t) => (meta[t.tid] ? { ...t, ...meta[t.tid] } : t));
  return base.concat(state.threads);
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

function createUser({ username, password, sex, email, tele, address, web, qq, msn }) {
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
  state.users.push(u);
  userIndex.set(u.username, u);
  persist();
  return u;
}

function addComment(pid, username, content) {
  const c = {
    id: nextId(photoReviews.concat(state.comments), 'id'),
    pid: Number(pid),
    content,
    username,
    dat: new Date().toISOString().replace('T', ' ').slice(0, 19),
  };
  state.comments.push(c);
  persist();
  return c;
}

function createThread(fid, author, subject, message) {
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
  state.threads.push(t);
  state.posts.push({
    pid: nextId(postRows(), 'pid'),
    tid: t.tid,
    fid: t.fid,
    author,
    subject,
    dateline: now,
    message,
    local: true,
  });
  persist();
  return t;
}

function replyThread(tid, author, subject, message) {
  const t = threadById(tid);
  if (!t) return null;
  const now = Math.floor(Date.now() / 1000);
  state.posts.push({
    pid: nextId(postRows(), 'pid'),
    tid: Number(tid),
    fid: t.fid,
    author,
    subject: subject || '',
    dateline: now,
    message,
    local: true,
  });
  if (t.local) {
    t.replies = (Number(t.replies) || 0) + 1;
    t.lastpost = now;
    t.lastposter = author;
  } else {
    if (!state.threadMeta) state.threadMeta = {};
    const prev = state.threadMeta[t.tid] || {};
    state.threadMeta[t.tid] = {
      replies: (Number(prev.replies != null ? prev.replies : t.replies) || 0) + 1,
      lastpost: now,
      lastposter: author,
    };
  }
  persist();
  return t;
}

loadState();

module.exports = {
  users, photoReviews, newsReviews, mmphoto, models, big, leib, leib2,
  caSorts, caProducts, forums, news, state,
  photos, compete, threads, posts,
  userOf, authorFolder, photoSrc, competeSrc, mmSrc, userAvatar, modelCover, categoryName,
  photosByAuthor, photosByCategory, commentsFor, newsById, addHit, hitCount,
  threadRows, postRows, threadsOfForum, postsOfThread, forumById, threadById, forumStats,
  createUser, addComment, createThread, replyThread, nextId, persist,
};
