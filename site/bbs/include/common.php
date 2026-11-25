<?php

/*
	[17camera!] include/common.php - common processing module
	This is NOT a freeware, use is subject to license terms

	Version: 1.9.2
	Author: 17camera (master@17camera.com)
	Copyright: 17camera Studio (www.17camera.com)
	Last Modified: 2002/12/15 10:13
*/

error_reporting(E_ERROR | E_PARSE);

$mtime = explode(' ', microtime());
$starttime = $mtime[1] + $mtime[0];

define('IN_DISCUZ', TRUE);
set_magic_quotes_runtime(0);

$PHP_SELF = $HTTP_SERVER_VARS['PHP_SELF'] ?? $HTTP_SERVER_VARS['SCRIPT_NAME'] ?? '';
$SCRIPT_FILENAME = str_replace('\\\\', '/', ($HTTP_SERVER_VARS['PATH_TRANSLATED'] ?? $HTTP_SERVER_VARS['SCRIPT_FILENAME'] ?? ''));
$boardurl = 'http://'.$HTTP_SERVER_VARS['HTTP_HOST'].substr($PHP_SELF, 0, strrpos($PHP_SELF, '/') + 1);
$discuz_root = '';

require $discuz_root.'./config.php';
require $discuz_root.'./include/global.php';
require $discuz_root.'./include/db_'.$database.'.php';

$timestamp = time();

$register_globals = @ini_get('register_globals');
$magic_quotes_gpc = get_magic_quotes_gpc();

if(!$magic_quotes_gpc) {
	// 本地存档环境未开启 magic_quotes_gpc，继续运行
}

$url_redirect = '';
$_DSESSION = $_DCACHE = array();

if(getenv('HTTP_CLIENT_IP')) {
	$onlineip = getenv('HTTP_CLIENT_IP');
} elseif(getenv('HTTP_X_FORWARDED_FOR')) {
	$onlineip = getenv('HTTP_X_FORWARDED_FOR');
} elseif(getenv('REMOTE_ADDR')) {
	$onlineip = getenv('REMOTE_ADDR');
} else {
	$onlineip = $HTTP_SERVER_VARS['REMOTE_ADDR'];
}

if(!$register_globals || !$magic_quotes_gpc) {
	@extract(daddslashes($HTTP_POST_VARS), EXTR_SKIP);
	@extract(daddslashes($HTTP_GET_VARS), EXTR_SKIP);
	if(!$register_globals) {
		foreach($HTTP_POST_FILES as $key => $val) {
			$$key = $val['tmp_name'];
			${$key.'_name'} = $val['name'];
			${$key.'_size'} = $val['size'];
			${$key.'_type'} = $val['type'];
		}
	}
}

$tables = array('attachments', 'announcements', 'banned', 'favorites', 'forumlinks', 'forums', 'karmalog',
		'members', 'memo', 'posts', 'searchindex', 'sessions', 'settings', 'smilies', 'stats', 'styles',
		'stylevars', 'subscriptions', 'templates', 'threads', 'pm', 'usergroups', 'words', 'buddys'); 
foreach($tables as $tablename) {
	${'table_'.$tablename} = $tablepre.$tablename;
}
unset($tablename);

$db = new dbstuff;
$db->connect($dbhost, $dbuser, $dbpw, $dbname, $pconnect);
$db->select_db($dbname);
unset($dbhost, $dbuser, $dbpw, $dbname, $pconnect);

$currscript = basename($PHP_SELF);
$currscript = substr($currscript, 0, strpos($currscript, '.php'));

$cachelost = (@include $discuz_root.'./forumdata/cache/cache_settings.php') ? '' : 'settings';
if(in_array($currscript, array('index', 'forumdisplay', 'viewthread', 'post', 'search', 'pm'))) {
	$cachelost .= (@include $discuz_root.'./forumdata/cache/cache_'.$currscript.'.php') ? '' : ' '.$currscript;
}

@extract($_DCACHE['settings']);
$sid = isset($HTTP_GET_VARS['sid']) ? $HTTP_GET_VARS['sid'] :
	(isset($HTTP_POST_VARS['sid']) ? $HTTP_POST_VARS['sid'] :
	$HTTP_COOKIE_VARS['sid']);

$discuz_user = daddslashes($HTTP_COOKIE_VARS['_discuz_user']);
$discuz_pw = daddslashes($HTTP_COOKIE_VARS['_discuz_pw']);

$newpm = $ipbanned = $sessionexists = 0;
if($sid) {
	if($discuz_user) {
		$query = $db->query("SELECT s.sid, s.groupid, s.styleid, s.groupid, m.username AS discuz_user, m.password AS discuz_pw, m.status, m.email, m.timeoffset, m.tpp, m.ppp, m.credit, m.timeformat, m.dateformat, m.signature, m.lastvisit, m.newpm
					FROM $table_sessions s, $table_members m WHERE m.username=s.username AND s.sid='$sid' AND s.ip='$onlineip' AND ('$discuz_user'='' OR ('$discuz_user'<>'' AND m.username='$discuz_user' AND m.password='$discuz_pw'))");
	} else {
		$query = $db->query("SELECT sid, status, username AS sessionuser, groupid, styleid FROM $table_sessions WHERE sid='$sid' AND ip='$onlineip'");
	}
	if($_DSESSION = $db->fetch_array($query)) {
		$sessionexists = 1;
		if(!empty($_DSESSION['sessionuser'])) {
			$query = $db->query("SELECT m.username AS discuz_user, m.password AS discuz_pw, m.status, m.email, m.timeoffset, m.tpp, m.ppp, m.credit, m.timeformat, m.dateformat, m.signature, m.avatar, m.lastvisit, m.newpm FROM $table_members m WHERE username='$_DSESSION[sessionuser]'");
			$_DSESSION = array_merge($_DSESSION, $db->fetch_array($query));
		}
	} else {
		$query = $db->query("SELECT sid, status, groupid, styleid FROM $table_sessions WHERE sid='$sid' AND ip='$onlineip'");
		if($_DSESSION = $db->fetch_array($query)) {
			clearcookies();
			$sessionexists = 1;
		}
	}
}

if(empty($sessionexists)) {
	$ips = explode('.', $onlineip);
	$query = $db->query("SELECT COUNT(*) FROM $table_banned WHERE (ip1='$ips[0]' OR ip1='-1') AND (ip2='$ips[1]' OR ip2='-1') AND (ip3='$ips[2]' OR ip3='-1') AND (ip4='$ips[3]' OR ip4='-1')");
	if($db->result($query, 0)) {
		$statusverify = 'u.status=\'IPBanned\'';
		$ipbanned = 1;
	} else {
		$statusverify = 'u.status=m.status';
	}

	if($discuz_user) {
		$query = $db->query("SELECT m.username as discuz_user, m.password as discuz_pw, m.status, m.email, m.timeoffset, m.styleid, m.tpp, m.ppp, m.credit, m.timeformat, m.dateformat, m.signature, m.avatar, m.lastvisit, m.newpm, u.groupid, u.specifiedusers LIKE '%\t".addcslashes($discuz_user, '%_')."\t%' AS specifieduser
				FROM $table_members m LEFT JOIN $table_usergroups u ON u.specifiedusers LIKE '%\t".addcslashes($discuz_user, '%_')."\t%' OR ($statusverify AND ((u.creditshigher='0' AND u.creditslower='0' AND u.specifiedusers='') OR (m.credit>=u.creditshigher AND m.credit<u.creditslower)))
				WHERE username='$discuz_user' AND password='$discuz_pw' ORDER BY specifieduser DESC");
		if(!($_DSESSION = $db->fetch_array($query))) {
			clearcookies();
		}
	}
	$_DSESSION['sid'] = random(8);
}

if(!isset($discuz_user) && empty($_DSESSION['groupid'])) {
	$_DSESSION['groupid'] = empty($ipbanned) ? 1 : 2;
}

if(!isset($_DSESSION['lastvisit'])) {
	$_DSESSION['lastvisit'] = $HTTP_COOKIE_VARS['lastvisit'] ? $HTTP_COOKIE_VARS['lastvisit'] : $timestamp - 86400;
} else {
	if($timestamp - $_DSESSION['lastvisit'] - $onlinehold < 0) {
		$_DSESSION['lastvisit'] = $HTTP_COOKIE_VARS['lastvisit'];
	} else {
		$_DSESSION['lastvisit'] -= $onlinehold;
		setcookie('lastvisit', $_DSESSION['lastvisit'], $timestamp + 3600, $cookiepath, $cookiedomain);
	}
}

@extract($_DSESSION);

if(empty($discuz_user)) {
	$status = 'Guest';
	$groupid = 1;
	$credit = 0;
} else {
	$discuz_userss = $discuz_user;
	$discuz_user = addslashes($discuz_user);
	$credit = intval($credit);
}

if(empty($sessionexists)) {
	$discuz_action = 0;
	updatesession();
}

setcookie('sid', $sid, 0, $cookiepath, $cookiedomain);

if($statstatus) {
	require $discuz_root.'./include/counter.php';
}

$tpp = $_DSESSION['tpp'] ? $_DSESSION['tpp'] : $topicperpage;
$ppp = $_DSESSION['ppp'] ? $_DSESSION['ppp'] : $postperpage;

if(empty($referer) && isset($HTTP_SERVER_VARS['HTTP_REFERER'])) {
	$referer = preg_replace("/(?:([\?&]sid\=[a-z0-9]{8}&?))/i", '', $HTTP_SERVER_VARS['HTTP_REFERER']);
	$referer = substr($referer, -1) == '?' ? substr($referer, 0, -1) : $referer;
}

if(isset($tid)){
	$query = $db->query("SELECT f.* FROM $table_forums f, $table_threads t WHERE t.tid='$tid' AND f.fid=t.fid LIMIT 0, 1");
	$forum = $db->fetch_array($query);
	$fid = $forum['fid'];
} elseif(isset($fid)) {
	$query = $db->query("SELECT * FROM $table_forums WHERE fid='$fid'");
	$forum = $db->fetch_array($query);
}

$styleid = !empty($HTTP_GET_VARS['styleid']) ? $HTTP_GET_VARS['styleid'] :
		(!empty($HTTP_POST_VARS['styleid']) ? $HTTP_POST_VARS['styleid'] :
		(!empty($_DSESSION['styleid']) ? $_DSESSION['styleid'] :
		$_DCACHE['settings']['styleid']));

if(@!include $discuz_root.'./forumdata/cache/style_'.(!empty($forum['styleid']) ? $forum['styleid'] : $styleid).'.php') {
	$styleid = $_DCACHE['settings']['styleid'];
	$cachelost .= (@include $discuz_root.'./forumdata/cache/style_'.$styleid.'.php') ? '' : ' style_'.$styleid;
}

$cachelost .= (@include $discuz_root.'./forumdata/cache/usergroup_'.$groupid.'.php') ? '' : ' usergroup_'.$groupid;

if($cachelost) {
	require $discuz_root.'./include/cache.php';
	updatecache();
	discuz_exit('Cache List: '.$cachelost.'<br>Caches successfully created, please refresh.');
}

if($headercharset) {
	header('Content-Type: text/html; charset='.CHARSET);
}

$gzipcompress ? ob_start('ob_gzhandler') : ob_start();

$pluglink = '';
if(is_array($plugins)) {
	foreach($plugins as $plugarray) {
		if($plugarray['name'] && $plugarray['url']) {
			$pluglink .= '| <a href="'.$plugarray['url'].'"><font class="navtd">'.$plugarray['name'].'</font></a> ';
			if($plugarray['script']) {
				include $discuz_root.'./plugins/'.$plugarray['script'];
			}
		}
	}
}

if(isset($allowvisit) && $allowvisit == 0) {
	setcookie('_discuz_user', $discuz_userss, 86400 * 365, $cookiepath, $cookiedomain);
	setcookie('_discuz_pw', $discuz_pw, 86400 * 365, $cookiepath, $cookiedomain);
	showmessage('user_banned');
} elseif($bbclosed && !(($currscript == 'logging' && $action == 'login') || $isadmin)) {
	clearcookies();
	showmessage($closedreason ? $closedreason : 'board_closed');
}

?>
