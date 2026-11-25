<?php

/*
	[17camera!] include/golbal.php - 17camera 17camera! Board global functions
	This is NOT a freeware, use is subject to license terms

	Version: 1.9.1
	Author: 17camera (master@17camera.com)
	Copyright: 17camera Studio (www.17camera.com)
	Last Modified: 2002/12/15 10:12
*/


if(!defined('IN_DISCUZ')) {
        exit('Access Denied');
}

function dhtmlspecialchars($string) {
	if(is_array($string)) {
		foreach($string as $key => $val) {
			$string[$key] = dhtmlspecialchars($val);
		}
	} else {
		$string = str_replace('&', '&amp;', $string);
		$string = str_replace('"', '&quot;', $string);
		$string = str_replace('<', '&lt;', $string);
		$string = str_replace('>', '&gt;', $string);
		$string = preg_replace('/&amp;(#\d{3,5};)/', '&\\1', $string);
	}
	return $string;
}

function discuz_exit($message = '') {
	global $db;
	discuz_output();
	$db->close();
	exit($message);
}

function daddslashes($string, $force = 0) {
	if(!$GLOBALS['magic_quotes_gpc'] || $force) {
		if(is_array($string)) {
			foreach($string as $key => $val) {
				$string[$key] = daddslashes($val, $force);
			}
		} else {
			$string = addslashes($string);
		}
	}
	return $string;
}

function url_rewriter($url, $tag = '') {
	global $sid;
	$tag = stripslashes($tag);
	if(!$tag || (!preg_match("/^(http:\/\/|mailto:|#|javascript)/i", $url) && !strpos($url, 'sid='))) {
		$pos = strpos($url, '#');
		if($pos) {
			$urlret = substr($url, $pos);
			$url = substr($url, 0, $pos);
		}
		$url .= strpos($url, '?') ? '&' : '?';
		$url .= "sid=$sid$urlret";
	}
	return $tag.$url;
}

function updatesession() {
	if(empty($GLOBALS['sessionupdated'])) {
		global $db, $sessionexists, $sessionupdated, $sid, $onlineip, $ipbanned, $status, $discuz_user, $timestamp, $groupid, $styleid, $discuz_action, $fid, $tid, $onlinehold, $logincredits, $table_sessions, $table_members;

		$sessionupdated = 1;
		if($sessionexists == 1) {
			$db->query("UPDATE $table_sessions SET status='$status', lastactivity='$timestamp', groupid='$groupid', username='$discuz_user', styleid='$styleid', action='$discuz_action', fid='$fid', tid='$tid' WHERE sid='$sid'");
		} else {
			$db->unbuffered_query("DELETE FROM $table_sessions WHERE sid='$sid' OR lastactivity<'".($timestamp - $onlinehold)."' OR (ip='$onlineip' AND lastactivity>'".($timestamp - 60)."') OR ('$discuz_user'<>'' AND username='$discuz_user')");
			$db->query("INSERT INTO $table_sessions (sid, ip, ipbanned, status, username, lastactivity, groupid, styleid, action, fid, tid)
				VALUES ('$sid', '$onlineip', '$ipbanned', '$status', '$discuz_user', '$timestamp', '$groupid', '$styleid', '$discuz_action', '$fid', '$tid')");
			if($discuz_user) {
				$logincredits = intval($logincredits);
				$db->unbuffered_query("UPDATE $table_members SET credit=credit+($logincredits), lastvisit=$timestamp+$onlinehold WHERE username='$discuz_user'");
			}
		}
	}
}

function discuz_output() {
	global $sid;

	if(empty($GLOBALS['HTTP_COOKIE_VARS']['sid'])) {
		$content = preg_replace_callback("/\<a(\s*[^\>]+\s*)href\=([\"|\']?)([^\"\'\s]+)/is", function($m) { return url_rewriter($m[3], '<a'.$m[1].'href='.$m[2]); }, ob_get_contents());
		$content = preg_replace("/(\<form.+?\>)/is", "\\1\n<input type=\"hidden\" name=\"sid\" value=\"$sid\">", $content);
		ob_end_clean();
		$GLOBALS['gzipcompress'] ? ob_start('ob_gzhandler') : ob_start();
		echo $content;
	}
}

function clearcookies() {
	global $timestamp, $cookiepath, $cookiedomain, $discuz_user, $discuz_pw, $status;
	setcookie('_discuz_user', '', $timestamp - 86400 * 365, $cookiepath, $cookiedomain);
	setcookie('_discuz_pw', '', $timestamp - 86400 * 365, $cookiepath, $cookiedomain);
	$discuz_user = $discuz_pw = '';
	$status = 'Guest';
}

function image($imageinfo, $basedir = "", $remark = "") {
	if($basedir) {
		$basedir .= "/";
	}
	if(strstr($imageinfo, ",")) {
		$flash = explode(",", $imageinfo);
		return "<embed src=\"$basedir".trim($flash[0])."\" width=\"".trim($flash[1])."\" height=\"".trim($flash[2])."\" type=\"application/x-shockwave-flash\" $remark></embed>";
	} else {
		return "<img src=\"$basedir$imageinfo\" $remark border=\"0\">";
	}
}

function language($file, $templateid = 0, $tpldir = '') {
	global $discuz_root;

	$tpldir = $tpldir ? $tpldir : TPLDIR;
	$templateid = $templateid ? $templateid : TEMPLATEID;

	$languagepack = $discuz_root.'./'.$tpldir.'/'.$file.'.lang.php';
	if(file_exists($languagepack)) {
		return $languagepack;
	} elseif($templateid != 1 && $tpldir != './templates/default') {
		return language($file, 1, './templates/default');
	} else {
		return FALSE;
	}
}

function template($file, $templateid = 0, $tpldir = '') {
	global $discuz_root, $tplrefresh;

	$tpldir = $tpldir ? $tpldir : TPLDIR;
	$templateid = $templateid ? $templateid : TEMPLATEID;

	$tplfile = $discuz_root.'./'.$tpldir.'/'.$file.'.htm';
	$objfile = $discuz_root.'./forumdata/templates/'.$templateid.'_'.$file.'.tpl.php';
	if(TEMPLATEID != 1 && $templateid != 1 && !file_exists($tplfile)) {
		return template($file, 1, './templates/default/');
	}
	if($tplrefresh == 1 || ($tplrefresh > 1 && substr($GLOBALS['timestamp'], -1) > $tplrefresh)) {
		if(@filemtime($tplfile) > @filemtime($objfile)) {
			require_once $discuz_root.'./include/template.php';
			parse_template($file, $templateid, $tpldir);
		}
	}
	return $objfile;
}

function random($length) {
	$hash = '';
	$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
	$max = strlen($chars) - 1;
	mt_srand((double)microtime() * 1000000);
	for($i = 0; $i < $length; $i++) {
		$hash .= $chars[mt_rand(0, $max)];
	}
	return $hash;
}

function sendmail($to, $subject, $message, $from = '') {
	extract($GLOBALS, EXTR_SKIP);
	require $discuz_root.'./include/sendmail.php';
}

function debuginfo() {
	if($GLOBALS['debug']) {
		global $db, $starttime, $gzipcompress;
		$mtime = explode(' ', microtime());
		$totaltime = number_format(($mtime[1] + $mtime[0] - $starttime), 6);
		echo '<br>Processed in '.$totaltime.' second(s), '.$db->querynum.' queries'.
			($gzipcompress ? ', Gzip enabled' : NULL);
	}
}

function multi($num, $perpage, $curr_page, $mpurl) {
	$multipage = '';
	if($num > $perpage) {
		$page = 10;
		$offset = 2;

		$pages = ceil($num / $perpage);
		$from = $curr_page - $offset;
		$to = $curr_page + $page - $offset - 1;
		if($page > $pages) {
			$from = 1;
			$to = $pages;
		} else {
			if($from < 1) {
				$to = $curr_page + 1 - $from;
				$from = 1;
				if(($to - $from) < $page && ($to - $from) < $pages) {
					$to = $page;
				}
			} elseif($to > $pages) {
				$from = $curr_page - $pages + $to;
				$to = $pages;
				if(($to - $from) < $page && ($to - $from) < $pages) {
					$from = $pages - $page + 1;
				}
			}
		}
		$multipage .= "<a href=\"$mpurl&page=1\">&lt;&lt;</a> &nbsp;";
		for($i = $from; $i <= $to; $i++) {
			if($i != $curr_page) {
				$multipage .= "<a href=\"$mpurl&page=$i\">[$i]</a>&nbsp;";
			} else {
				$multipage .= '<u><b>['.$i.']</b></u>&nbsp;';
			}
		}
		$multipage .= $pages > $page ? " ... <a href=\"$mpurl&page=$pages\"> [$pages] &gt;&gt;</a>" : " <a href=\"$mpurl&page=$pages\">&gt;&gt;</a>";
	}
	return $multipage;
}

function showmessage($show_message, $url_forward = '') {
	extract($GLOBALS, EXTR_SKIP);
	$discuz_action = 255;

	include language('messages');
	if(isset($language[$show_message])) {
		eval("\$show_message = \"".$language[$show_message]."\";");
	}
	$url_redirect = $url_forward ? '<meta http-equiv="refresh" content="2;url='.url_rewriter($url_forward).'">' : NULL;

	include template('showmessage');
	discuz_exit();
}

function wordscut($string, $length) {
	if(strlen($string) > $length) {
		for($i = 0; $i < $length - 3; $i++) {
			if(ord($string[$i]) > 127) {
				$wordscut .= $string[$i].$string[$i + 1];
				$i++;
			} else {
				$wordscut .= $string[$i];
			}
		}
		return $wordscut.' ...';
	}
	return $string;
}
	
function modcheck($username, $fid = 0) {
	global $isadmin, $issupermod, $ismoderator;
	if($fid) {
		global $table_forums, $db;
		$query = $db->query("SELECT moderator FROM $table_forums WHERE fid='$fid'");
		$forum = $db->fetch_array($query);
	} else {
		global $forum;
	}
	if($isadmin || $issupermod) {
		return 1;
	} elseif($ismoderator && eregi("(,|^)".preg_quote($username)."(,|$)", str_replace(' ', '', $forum['moderator']))) {
		return 1;
	} else {
		return 0;
	}
}

?>