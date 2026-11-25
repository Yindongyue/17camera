'use strict';

/**
 * Minimal UBB / Discuz code converter for the archived article and forum text.
 * Input is untrusted, so the text is HTML-escaped before any markup is applied.
 */

function escapeHtml(input) {
  return String(input || '')
    .replace(/&nbsp;/g, ' ')
    .replace(/&/g, '&amp;')
    .replace(/</g, '&lt;')
    .replace(/>/g, '&gt;')
    .replace(/"/g, '&quot;');
}

function safeUrl(url) {
  const u = String(url || '').trim();
  return /^(https?:\/\/|\/)/i.test(u) ? u : '#';
}

function convert(input) {
  let text = escapeHtml(input);

  text = text.replace(/\[code\]([\s\S]*?)\[\/code\]/gi, (m, code) => `<pre class="ubb-code">${code}</pre>`);
  text = text.replace(/\[quote\]([\s\S]*?)\[\/quote\]/gi, (m, body) => `<blockquote class="ubb-quote">${body}</blockquote>`);
  text = text.replace(/\[img\]([\s\S]*?)\[\/img\]/gi, (m, src) => `<img class="ubb-img" loading="lazy" src="${safeUrl(src)}" alt="">`);
  text = text.replace(/\[url=([^\]]+)\]([\s\S]*?)\[\/url\]/gi, (m, href, label) => `<a href="${safeUrl(href)}" target="_blank" rel="noopener">${label}</a>`);
  text = text.replace(/\[url\]([\s\S]*?)\[\/url\]/gi, (m, href) => `<a href="${safeUrl(href)}" target="_blank" rel="noopener">${href}</a>`);
  text = text.replace(/\[email\]([\s\S]*?)\[\/email\]/gi, (m, mail) => `<a href="mailto:${mail}">${mail}</a>`);
  text = text.replace(/\[b\]([\s\S]*?)\[\/b\]/gi, '<strong>$1</strong>');
  text = text.replace(/\[i\]([\s\S]*?)\[\/i\]/gi, '<em>$1</em>');
  text = text.replace(/\[u\]([\s\S]*?)\[\/u\]/gi, '<u>$1</u>');
  text = text.replace(/\[color=([^\]]+)\]([\s\S]*?)\[\/color\]/gi, '<span style="color:$1">$2</span>');
  text = text.replace(/\[size=([^\]]+)\]([\s\S]*?)\[\/size\]/gi, '<span style="font-size:$1">$2</span>');
  text = text.replace(/\[align=([^\]]+)\]([\s\S]*?)\[\/align\]/gi, '<div style="text-align:$1">$2</div>');
  text = text.replace(/\[flash[^\]]*\][\s\S]*?\[\/flash\]/gi, '<span class="ubb-note">[flash]</span>');
  text = text.replace(/\[\/(b|i|u|color|size|align|quote|code|img|url)\]/gi, '');

  return text.replace(/\r\n|\r|\n/g, '<br>');
}

module.exports = { convert, escapeHtml };
