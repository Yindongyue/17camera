<?php

/*
	[17camera!] index.php - 17camera 17camera! Board 's index page
	This is NOT a freeware, use is subject to license terms

	Version: 2.2.0
	Author: 17camera (master@17camera.com)
	Copyright: 17camera Studio (www.17camera.com)
	Last Modified: 2004/5/28 08:51
*/

require "./include/common.php";
require $discuz_root.'./include/forum.php';

$discuz_action = 1;

if(isset($showoldetails)) {
	switch ($showoldetails) {
		case 'no': setcookie('onlinedetail', 0, $timestamp + 86400 * 365, $cookiepath, $cookiedomain); break;
		case 'yes': setcookie('onlinedetail', 1, $timestamp + 86400 * 365, $cookiepath, $cookiedomain); break;
	}
} else {
	$showoldetails = false;
}

$currenttime = gmdate($timeformat, $timestamp + $timeoffset * 3600);
$lastvisittime = gmdate("$dateformat $timeformat", $lastvisit + $timeoffset * 3600);

$memberenc = rawurlencode($lastmember);
$discuz_userenc = rawurlencode($discuz_userss);
$newthreads = $timestamp - $lastvisit;

if(empty($gid)) {

	$navigation = $navtitle = '';

	$announcements = '';
	if($_DCACHE['announcements']) {
		$space = '';
		foreach($_DCACHE['announcements'] as $announcement) {
			if($timestamp >= $announcement['starttime'] && ($timestamp <= $announcement['endtime'] || !$announcement['endtime'])) {
				$announcements .= $space.'<a href="announcement.php?id='.$announcement['id'].'#'.$announcement['id'].'"><span class="bold">'.$announcement['subject'].'</span> '.
					'('.gmdate($dateformat, $announcement['starttime'] + $timeoffset * 3600).')</a>';
				$space = '&nbsp; &nbsp; &nbsp; &nbsp;';
			}
		}
	}
	unset($_DCACHE['announcements']);

	$threads = $posts = 0;
	$forumlist = $catforumlist = $forums = $catforums = $categories = array();
	$query = $db->query("SELECT fid, fup, type, icon, name, description, moderator, threads, posts, lastpost, viewperm FROM $table_forums WHERE status='1' ORDER BY displayorder");
	while($forum = $db->fetch_array($query)) {
		if($forum['type'] != 'sub') {
			$forum['fup'] ? $forums[] = $forum : ($forum['type'] == 'group' ? $categories[] = $forum : $catforums[] = $forum);
		}
		$forumname[$forum['fid']] = strip_tags($forum['name']);
		if($forum['type'] == 'forum') {  //fix:子论坛帖子数重复计算
			$threads += $forum['threads'];
			$posts += $forum['posts'];
		}
	}

	foreach($categories as $group) {
		$group_forum = array();
		foreach($forums as $forum) {
			if($forum['fup'] == $group['fid'] && $forum['type'] == 'forum') {
				forum($forum);
				if($forum) {
					$group_forum[] = $forum;
				}
			}
		}
		if($group_forum) {
			$forumlist = array_merge($forumlist, array($group), $group_forum);
		}
	}

 	foreach($catforums as $forum) {
		forum($forum);
		if(isset($forum)) {
			$catforumlist[] = $forum;
		}
	}
	if($catforumlist) {
		$forumlist[] = array('fid' => 0, 'type' => 'group', 'name' => $bbname);
		$forumlist = array_merge($forumlist, $catforumlist);
	}

	unset($forums, $catforums, $catforumlist, $categories, $group, $forum);

	if($whosonlinestatus) {
		$onlineinfo = explode("\t", $onlinerecord);
		$detailstatus = (!isset($HTTP_COOKIE_VARS['onlinedetail']) && $onlineinfo[0] < 500) || (($HTTP_COOKIE_VARS['onlinedetail'] || $showoldetails == 'yes') && $showoldetails != 'no');

		if($detailstatus) {
			@include language('actions');

			updatesession();
			$onlinenum = $membercount = $guestcount = 0;
			$whosonline = array();
			$query = $db->query("SELECT username, status, lastactivity, action, fid FROM $table_sessions ORDER BY lastactivity DESC");
			while($online = $db->fetch_array($query)) {
				if($online['username']) {
					$membercount++;
					$online['usernameenc'] = rawurlencode($online['username']);
					switch($online['status']) {
						case 'Admin': $online['icon'] = 'online_admin.gif'; break;
						case 'SuperMod': $online['icon'] = 'online_supermod.gif'; break;
						case 'Moderator': $online['icon'] = 'online_moderator.gif'; break;
						default: $online['icon'] = 'online_member.gif'; break;
					}

					$online['fid'] = $online['fid'] ? $forumname[$online[fid]] : 0;
					$online['action'] = $actioncode[$online['action']];
					$online['lastactivity'] = gmdate($timeformat, $online['lastactivity'] + ($timeoffset * 3600));
					$whosonline[] = $online;
				} else {
					$guestcount++;
				}
			}
			$onlinenum = $membercount + $guestcount;
			unset($online);
		} else {
			$query = $db->query("SELECT COUNT(*) FROM $table_sessions");
			$onlinenum = $db->result($query, 0);
		}

		if($onlinenum > $onlineinfo[0]) {
			$db->query("UPDATE $table_settings SET onlinerecord='$onlinenum\t$timestamp'");
			require $discuz_root.'./include/cache.php';
			updatecache("settings");
			$onlineinfo = array($onlinenum, $timestamp);
		}

		$onlineinfo[1] = gmdate("$dateformat $timeformat", $onlineinfo[1] + ($timeoffset * 3600));
	}

	if($discuz_user && $newpm) {
		require $discuz_root.'./include/pmprompt.php';
	}

	include template('index');

} else {

	$query = $db->query("SELECT fid, type, name FROM $table_forums WHERE fid='$gid' AND type='group'");
	$cat = $db->fetch_array($query);
	$navigation = '&raquo; '.$cat['name'];
	$navtitle = " - $cat[name]";
	$forumlist = array($cat);

	$threads = $posts = 0;
	$queryg = $db->query("SELECT type, fid, name, lastpost FROM $table_forums WHERE type='group' AND fid='$gid' AND status='1' ORDER BY displayorder");
	$group = $db->fetch_array($queryg);
	$query = $db->query("SELECT * FROM $table_forums WHERE type='forum' AND status='1' AND fup='$group[fid]' ORDER BY displayorder");
	while($forum = $db->fetch_array($query)) {
		$threads += $forum['threads'];
		$posts += $forum['posts'];

		forum($forum);
		if($forum) {
			$forumlist[] = $forum;
		}
	}
	include template('index');

}

?>