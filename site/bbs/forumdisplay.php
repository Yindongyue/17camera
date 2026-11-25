<?php

/*
	[17camera!] forumdisplay.php - list forum threads(topics)
	This is NOT a freeware, use is subject to license terms

	Version: 2.0.0
	Author: 17camera (master@17camera.com)
	Copyright: 17camera Studio (www.17camera.com)
	Last Modified: 2002/12/6 17:00
*/

require "./include/common.php";
require $discuz_root.'./include/forum.php';
require $discuz_root.'./include/attachment.php';

//fix: hide the forum when the forum's status is 0
if(!$forum['fid'] || $forum['type'] == 'group' || !$forum['status']) {
	showmessage('forum_nonexistence');
}

$discuz_action = 2;
$navigation = '';

if($forum['type'] == 'forum') {
	$navigation .= "&raquo; $forum[name]";
	$navtitle = " - $forum[name]";
} else {
	$forumup = $_DCACHE['forums'][$forum['fup']]['name'];
	$navigation .= "&raquo; <a href=\"forumdisplay.php?fid=$forum[fup]\">$forumup</a> &raquo; $forum[name]";
	$navtitle = " - $forumup - $forum[name]";
}

if($forum['password'] && $action == 'pwverify') {
	if($pw != $forum['password']) {
		showmessage('forum_passwd_wrong');
	} else {
		setcookie("fidpw$fid", $pw, 0, $cookiepath, $cookiedomain);
		header("Location: {$boardurl}forumdisplay.php?fid=$fid&sid=$sid");
	}
}

if($forum['viewperm'] && !strstr($forum['viewperm'], "\t$groupid\t")) {
	showmessage('forum_nopermission');
}

if(!empty($forum['password']) && $forum['password'] != $HTTP_COOKIE_VARS["fidpw$fid"]) {
	include template('forumdisplay_passwd');
	discuz_exit();
}

$ismoderator = modcheck($discuz_user);
$moderatedby = moddisplay($forum['moderator'], 'forumdisplay');

$subexists = $subthreads = 0;
foreach($_DCACHE['forums'] as $sub) {
	if($sub['type'] == 'sub' && $sub['fup'] == $fid) {
		$subexists = 1;
		break;
	}
}

if($subexists) {
	$subexists = 0;
	$sublist = array();
	$querys = $db->query("SELECT * FROM $table_forums WHERE status='1' AND type='sub' AND fup='$fid' ORDER BY displayorder");
	while($sub = $db->fetch_array($querys)) {
		$subexists = 1;
		$subthreads += $sub['threads'];
		forum($sub);
		$sublist[] = $sub;
	}
}

if(!empty($page)) {
	$start_limit = ($page - 1) * $tpp;
} else {
	$start_limit = 0;
	$page = 1;
}

$forumdisplayadd = $filteradd = '';
if(!empty($filter)) {
	if($filter != 'digest') {
		$forumdisplayadd .= "&filter=$filter";
		$filteradd = "AND lastpost>='".($timestamp - $filter)."'";
	} elseif($filter == 'digest') {
		$forumdisplayadd .= "&filter=digest";
		$filteradd = "AND digest<>'0'";
	}
} else {
	$filter = '';
}

(strtoupper($ascdesc)!='ASC' && strtoupper($ascdesc)!='DESC') ?$ascdesc = 'DESC' : $forumdisplayadd .= "&ascdesc=$ascdesc"; //fix: 非法字符注入
$dotadd1 = $dotadd2 = '';
if($dotfolders && $discuz_user) {
	$dotadd1 = "DISTINCT p.author AS dotauthor, ";
	$dotadd2 = "LEFT JOIN $table_posts p ON (t.tid=p.tid AND p.author='$discuz_user')";
}

if($whosonlinestatus) {
	$onlineinfo = explode("\t", $onlinerecord);
	$detailstatus = (!isset($HTTP_COOKIE_VARS['onlinedetail']) && $onlineinfo[0] < 500) || (($HTTP_COOKIE_VARS['onlinedetail'] || $showoldetails == 'yes') && $showoldetails != 'no');

	if($detailstatus) {
		@include language('actions');

		updatesession();
		$onlinenum = $membercount = $guestcount = 0;
		$whosonline = array();
		$query = $db->query("SELECT username, status, lastactivity, action FROM $table_sessions WHERE username<>'' AND fid='$fid'");
		if($db->num_rows($query)) {
			while($online = $db->fetch_array($query)) {
				$online['usernameenc'] = rawurlencode($online['username']);
				if($online['status'] == 'Admin') {
					$online['icon'] = 'online_admin.gif';
				} elseif($online['status'] == 'SuperMod') {
					$online['icon'] = 'online_supermod.gif';
				} elseif($online['status'] == 'Moderator') {
					$online['icon'] = 'online_moderator.gif';
				} else {
					$online['icon'] = 'online_member.gif';
				}
				$online['action'] = $actioncode[$online['action']];
				$online['lastactivity'] = gmdate($timeformat, $online['lastactivity'] + ($timeoffset * 3600));
				$whosonline[] = $online;
			}
		} else {
			$whosonlinestatus = 0;
		}
		unset($online);
	} else {
		$whosonlinestatus = 0;
	}
}

if($discuz_user && $newpm) {
	require $discuz_root.'./include/pmprompt.php';
}

if(!empty($filter)) {
	$query = $db->query("SELECT COUNT(*) FROM $table_threads WHERE (topped='3' OR fid='$fid') $filteradd");
	$topicsnum = $db->result($query, 0);
} else {
	$topicsnum = $forum['threads'] - $subthreads;
}

$multipage = multi($topicsnum, $tpp, $page, "forumdisplay.php?fid=$fid$forumdisplayadd");

$separatepos = 0;
$threadlist = array();
$query = $db->query("SELECT $dotadd1 t.* FROM $table_threads t $dotadd2 WHERE (t.topped='3' OR t.fid='$fid') $filteradd ORDER BY t.topped DESC, t.lastpost $ascdesc LIMIT $start_limit, $tpp");
while($thread = $db->fetch_array($query)) {
	$thread['icon'] = $thread['icon'] ? "<img src=\"".SMDIR."/$thread[icon]\" align=\"absmiddle\">" : '&nbsp;';
	$thread['authorenc'] = rawurlencode($thread['author']);
	$thread['lastposterenc'] = rawurlencode($thread['lastposter']);

	$postsnum = $thread['replies'] + 1;
	if($postsnum  > $ppp) {
		$pagelinks = '';
		$topicpages = ceil($postsnum / $ppp);
		for ($i = 1; $i <= $topicpages; $i++) {
			$pagelinks .= "<a href=\"viewthread.php?tid=$thread[tid]&page=$i\">$i</a> ";
			if($i == 6) {
				$i = $topicpages + 1;
			}
		}
		if($topicpages > 6) {
			$pagelinks .= " .. <a href=\"viewthread.php?tid=$thread[tid]&page=$topicpages\">$topicpages</a> ";
		}
		$thread['multipage'] = '&nbsp; &nbsp;( <img src="'.IMGDIR.'/multipage.gif" align="absmiddle" boader="0"> '.$pagelinks.')';
	} else {
		$thread['multipage'] = '';
	}

	if($thread['closed']) {
		if(substr($thread['closed'], 0, 5) == 'moved') {
			$thread['tid'] = substr($thread['closed'], 6);
			$thread['replies'] = '-';
			$thread['views'] = '-';
		}
		$thread['folder'] = 'lock_folder.gif';
	} else {
		$thread['folder'] = 'folder.gif';
		if($lastvisit < $thread['lastpost'] && !strstr($HTTP_COOKIE_VARS['oldtopics'], "\t$thread[tid]\t")) {
			$thread['new'] = 1;
			$thread['folder'] = 'red_'.$thread['folder'];
		} else {
			$thread['new'] = 0;
		}
		if($thread['replies'] >= $hottopic) {
			$thread['folder'] = 'hot_'.$thread['folder'];
		}
		if($dotfolders && $thread['dotauthor'] == $discuz_user && $discuz_user) {
			$thread['folder'] = 'dot_'.$thread['folder'];
		}
	}

	if($thread['attachment']) {
		$thread['subject'] = attachicon($thread['attachment']).' '.$thread['subject'];
	}

	$thread['dateline'] = gmdate($dateformat, $thread['dateline'] + $timeoffset * 3600);
	$thread['lastpost'] = gmdate("$dateformat $timeformat", $thread['lastpost'] + $timeoffset * 3600);

	if($thread['topped'] > 0) {
		$separatepos++;
	}

	$threadlist[] = $thread;

}

$check[$filter] = 'selected="selected"';
$ascdesc == 'ASC' ? $check['asc'] = 'selected="selected"' : $check['desc'] = 'selected="selected"';

$forumselect = forumselect();
if($fastpost && ((!$forum['postperm'] && $allowpost) || ($forum['postperm'] && strstr($forum[postperm], "\t$groupid\t")))) {
	$fastpost = 1;
	$usesigcheck = $signature ? 'checked' : NULL;
} else {
	$fastpost = 0;
}

include template('forumdisplay');

?>
