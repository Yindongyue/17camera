'use strict';

const BADGES = {
  1: { label: '普通会员', cls: 'badge-plain' },
  2: { label: '资深会员', cls: 'badge-senior' },
  3: { label: 'VIP会员', cls: 'badge-vip' },
  4: { label: '管理员', cls: 'badge-admin' },
};

function fmtDate(value) {
  if (!value) return '';
  const s = String(value).replace('T', ' ');
  return s.slice(0, 10);
}

function fmtDateTime(value) {
  if (!value) return '';
  return String(value).replace('T', ' ').slice(0, 16);
}

function fmtUnix(sec) {
  const n = Number(sec);
  if (!n) return '';
  const d = new Date(n * 1000);
  const p = (x) => String(x).padStart(2, '0');
  return `${d.getFullYear()}-${p(d.getMonth() + 1)}-${p(d.getDate())} ${p(d.getHours())}:${p(d.getMinutes())}`;
}

function cut(str, width) {
  const s = String(str || '');
  let used = 0;
  let out = '';
  for (const ch of s) {
    const w = ch.charCodeAt(0) > 255 ? 2 : 1;
    if (used + w > width) return out.replace(/[\s,，、;；:：\-—_+/]+$/, '') + '…';
    out += ch;
    used += w;
  }
  return s;
}

function badge(flag) {
  return BADGES[Number(flag)] || BADGES[1];
}

function buildQuery(base, params) {
  const qs = Object.entries(params)
    .filter(([, v]) => v !== undefined && v !== null && v !== '')
    .map(([k, v]) => `${encodeURIComponent(k)}=${encodeURIComponent(v)}`)
    .join('&');
  return qs ? `${base}?${qs}` : base;
}

function paginate(total, page, pageSize) {
  const pages = Math.max(1, Math.ceil(total / pageSize));
  const current = Math.min(Math.max(1, Number(page) || 1), pages);
  const items = [];
  for (let i = 1; i <= pages; i += 1) {
    if (i === 1 || i === pages || Math.abs(i - current) <= 2) items.push(i);
    else if (items[items.length - 1] !== '…') items.push('…');
  }
  return { pages, current, items, offset: (current - 1) * pageSize };
}

function md5(text) {
  return require('crypto').createHash('md5').update(String(text)).digest('hex');
}

function nl2br(text) {
  return String(text || '').replace(/\r\n|\r|\n/g, '<br>');
}

module.exports = { fmtDate, fmtDateTime, fmtUnix, cut, badge, buildQuery, paginate, md5, nl2br };
