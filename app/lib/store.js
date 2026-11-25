'use strict';

/**
 * Durable storage for the archive's mutable data (members, forum threads/posts,
 * photo comments). The legacy archive content itself stays in the bundled JSON.
 *
 * Supported DATABASE_URL schemes:
 *   postgres:// | postgresql://  (pg)
 *   mysql://                     (mysql2)
 *
 * When DATABASE_URL is absent the app falls back to an ephemeral JSON file under
 * TMPDIR, which is only meant for local development.
 */

const SCHEMA = [
  `CREATE TABLE IF NOT EXISTS app_users (
    userid INTEGER PRIMARY KEY,
    username TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL,
    sex TEXT, tele TEXT, address TEXT, email TEXT, web TEXT,
    flag INTEGER, dat TEXT, jhhao TEXT, qq TEXT, msn TEXT, status INTEGER
  )`,
  `CREATE TABLE IF NOT EXISTS app_threads (
    tid INTEGER PRIMARY KEY,
    fid INTEGER NOT NULL,
    author TEXT, subject TEXT,
    dateline BIGINT, lastpost BIGINT, lastposter TEXT,
    views INTEGER, replies INTEGER, topped INTEGER, digest INTEGER, closed TEXT
  )`,
  `CREATE TABLE IF NOT EXISTS app_posts (
    pid INTEGER PRIMARY KEY,
    tid INTEGER NOT NULL, fid INTEGER,
    author TEXT, subject TEXT, dateline BIGINT, message TEXT
  )`,
  `CREATE TABLE IF NOT EXISTS app_comments (
    id INTEGER PRIMARY KEY,
    pid INTEGER NOT NULL, username TEXT, content TEXT, dat TEXT
  )`,
  'CREATE INDEX IF NOT EXISTS app_posts_tid ON app_posts (tid)',
  'CREATE INDEX IF NOT EXISTS app_comments_pid ON app_comments (pid)',
];

let driver = null;
let mode = 'file';

function toPgPlaceholders(sql) {
  let i = 0;
  return sql.replace(/\?/g, () => `$${++i}`);
}

function buildInsert(table, row) {
  const cols = Object.keys(row);
  const sql = `INSERT INTO ${table} (${cols.join(', ')}) VALUES (${cols.map(() => '?').join(', ')})`;
  return { sql, values: cols.map((c) => row[c]) };
}

async function initPg(url) {
  const { Pool } = require('pg');
  const ssl = /sslmode=(require|verify)/.test(url) ? { rejectUnauthorized: false } : undefined;
  const pool = new Pool({ connectionString: url, ssl, max: 5, connectionTimeoutMillis: 10000 });
  await pool.query('SELECT 1');
  return {
    async query(sql, values) {
      const res = await pool.query(values && values.length ? toPgPlaceholders(sql) : sql, values);
      return res.rows;
    },
    async close() { await pool.end(); },
  };
}

async function initMysql(url) {
  const mysql = require('mysql2/promise');
  const pool = mysql.createPool(url);
  await pool.query('SELECT 1');
  return {
    async query(sql, values) {
      const [rows] = await pool.query(sql, values);
      return rows;
    },
    async close() { await pool.end(); },
  };
}

function numberize(rows, keys) {
  return rows.map((r) => {
    const out = { ...r };
    for (const k of keys) if (out[k] != null) out[k] = Number(out[k]);
    return out;
  });
}

async function init() {
  const url = process.env.DATABASE_URL || '';
  if (!url) {
    mode = 'file';
    return null;
  }
  if (/^postgres(ql)?:\/\//i.test(url)) driver = await initPg(url);
  else if (/^mysql:\/\//i.test(url)) driver = await initMysql(url);
  else throw new Error('Unsupported DATABASE_URL scheme (use postgres:// or mysql://)');

  for (const ddl of SCHEMA) {
    // MySQL has no CREATE INDEX IF NOT EXISTS; ignore duplicate-index errors there.
    try {
      await driver.query(ddl);
    } catch (e) {
      if (!/already exists|Duplicate key name/i.test(e.message)) throw e;
    }
  }
  mode = 'database';

  const [users, threads, posts, comments] = await Promise.all([
    driver.query('SELECT * FROM app_users'),
    driver.query('SELECT * FROM app_threads'),
    driver.query('SELECT * FROM app_posts ORDER BY pid'),
    driver.query('SELECT * FROM app_comments ORDER BY id'),
  ]);

  return {
    mode,
    users: numberize(users, ['userid', 'flag', 'status']),
    threads: numberize(threads, ['tid', 'fid', 'dateline', 'lastpost', 'views', 'replies', 'topped', 'digest']),
    posts: numberize(posts, ['pid', 'tid', 'fid', 'dateline']),
    comments: numberize(comments, ['id', 'pid']),
  };
}

async function insert(table, row) {
  if (mode !== 'database') return;
  const { sql, values } = buildInsert(table, row);
  await driver.query(sql, values);
}

module.exports = {
  init,
  insert,
  isDatabase: () => mode === 'database',
  close: async () => { if (driver) await driver.close(); },
};
