<?php

/*
	[17camera!] viewthread.php - view thread posts
	This is NOT a freeware, use is subject to license terms

	Version: 2.2.0
	Author: 17camera (master@17camera.com)
	Copyright: 17camera Studio (www.17camera.com)
	Last Modified: 2002/12/6 17:00
*/

require './include/common.php';
require $discuz_root.'./include/forum.php';
//require $discuz_root.'./include/discuzcode.php';
echo "sdfsdf";
$discuz_action = 3;
$ismoderator = modcheck($discuz_user);

$query = $db->query("SELECT * FROM $table_threads WHERE tid='$tid'");
if(!$thread = $db->fetch_array($query)) {
	showmessage('thread_nonexistence');
}

$codecount = 0;
$oldtopics = $HTTP_COOKIE_VARS['oldtopics'];
if(!strstr($oldtopics, "\t$tid\t")) {
	$oldtopics .= $oldtopics ? "$tid\t" : "\t$tid\t";
	setcookie('oldtopics', $oldtopics, $timestamp + 3600, $cookiepath, $cookiedomain);
}

if($forum['type'] == 'forum') {
	$navigation .= "&raquo; <a href=\"forumdisplay.php?fid=$fid\"> $forum[name]</a> &raquo; $thread[subject]";
	$navtitle .= " - $forum[name] - $thread[subject]";
} else {
	$query = $db->query("SELECT fid, name FROM $table_forums WHERE fid='$forum[fup]'");
	$fup = $db->fetch_array($query);
	$navigation .= "&raquo; <a href=\"forumdisplay.php?fid=$fup[fid]\">$fup[name]</a> &raquo; <a href=\"forumdisplay.php?fid=$fid\"> $forum[name]</a> &raquo; $thread[subject]";
	$navtitle .= " - $fup[name] - $forum[name] - $thread[subject]";
}

if(!$forum['viewperm'] && !$allowview) {
	showmessage('group_nopermission');
} elseif($forum['viewperm'] && !strstr($forum['viewperm'], "\t$groupid\t")) {
	showmessage('forum_nopermission');
//fix: 解决如果贴子设定积分过高，作者自身可能无法观看和修改贴子
} elseif($thread['creditsrequire'] && $thread['creditsrequire'] > $credit && !$ismoderator && $thread['author']<>$discuz_user) {
	showmessage('thread_nopermission');
}

if($forum['password'] != $HTTP_COOKIE_VARS["fidpw$fid"] && $forum['password']) {
	//header("Location: {$boardurl}forumdisplay.php?fid=$fid&sid=$sid");
	//discuz_exit();
}

if(!$action && $tid) {

	if($discuz_user && $newpm) {
		require $discuz_root.'./include/pmprompt.php';
	}

	$highlightstatus = str_replace("+", "", $highlight) ? 1 : 0;
	$karmaoptions = '';
	if($allowkarma && $maxkarmarate) {
		$offset = ceil($maxkarmarate / 6);
		for($vote = - $maxkarmarate + $offset; $vote <= $maxkarmarate; $vote += $offset) {
			$votenum = $vote > 0 ? "+$vote" : $vote;
			$karmaoptions .= $vote ? "<option value=\"$vote\">$votenum</option>\n" : NULL;
		}
	}
	unset($vote, $votenum, $offset);
	
	$page = empty($page) ? 1 : $page;
	$start_limit = $numpost = ($page - 1) * $ppp;

	$db->unbuffered_query("UPDATE $table_threads SET views=views+1 WHERE tid='$tid'");

	$multipage = multi($thread['replies'] + 1, $ppp, $page, "viewthread.php?tid=$tid&highlight=".rawurlencode($highlight));

	if($thread['pollopts']) {
		$pollopts = unserialize($thread['pollopts']);
		$polloptions = array();
		foreach($pollopts['options'] as $option) {
			$polloptions[] = array(	'option'	=> dhtmlspecialchars(stripslashes($option[0])),
						'votes'		=> $option[1],
						'width'		=> @round($option[1] * 300 / $pollopts['max']) + 2,
						'percent'	=> @sprintf ("%01.2f", $option[1] * 100 / $pollopts['total'])
						);
		}

		$allowvote = $allowvote && $discuz_user && (empty($thread['closed']) || $issupermod) && !in_array($discuz_user, $pollopts['voters']);
		$optiontype = $pollopts['multiple'] ? 'checkbox' : 'radio';
	}

	$altbg1 = ALTBG1;
	$altbg2 = ALTBG2;
	$postcount = 0;
	$postlist = array();
	$attachments = $comma = '';
	$querypost = $db->query("SELECT p.*, a.aid AS aaid, a.creditsrequire, a.filetype, a.filename, a.attachment, a.filesize, a.downloads, m.uid, m.username, m.gender, m.status, m.regdate, m.lastvisit, m.postnum, m.credit, m.email, m.site, m.icq, m.oicq, m.yahoo, m.msn, m.location, m.avatar, m.signature, m.customstatus, m.showemail
					FROM $table_posts p LEFT JOIN $table_members m ON m.username=p.author LEFT JOIN $table_attachments a ON p.aid<>'0' AND p.aid=a.aid WHERE p.tid='$tid' ORDER BY dateline LIMIT $start_limit, $ppp");
	while($post = $db->fetch_array($querypost)) {
		$bgno = $postcount++ % 2 + 1;
		$post['thisbg'] = ${'altbg'.$bgno};
		$post['number'] = ++$numpost;

		$post['dateline'] = gmdate("$dateformat $timeformat", $post['dateline'] + $timeoffset * 3600);
		if(isset($post['username']) && $post['author'] != 'Guest') {
			$post['authorenc'] = rawurlencode($post['author']);
			unset($groupinfo, $groupstars, $stars);
			foreach($_DCACHE['usergroups'] as $usergroup) {
				if((stristr($usergroup['specifiedusers'], "\t".addslashes($post['author'])."\t") || ($post['status'] == $usergroup['status'] && $usergroup['status'] != "Member")) && !$usergroup['creditshigher'] && !$usergroup['creditslower']) {
					if($groupstars < $usergroup['stars']) {
						$groupstars = $usergroup['stars'];
					}
					$groupinfo = $usergroup;
				} elseif($post['credit'] >= $usergroup['creditshigher'] && $post['credit'] < $usergroup['creditslower']) {
					if($post['status'] == $usergroup['status'] && !$groupinfo) {
						$groupstars = $usergroup['stars'];
						$groupinfo = $usergroup;
					} elseif($groupstars < $usergroup['stars']) {
						$groupstars = $usergroup['stars'];
					}
					if($groupinfo) {
						break;
					}
				}
			}
			$post['authortitle'] = $post['customstatus'] ? $post['customstatus'] : $groupinfo['grouptitle'];
			$post['regdate'] = gmdate($dateformat, $post['regdate'] + $timeoffset * 3600);

			for($i = 0; $i < $groupstars; $i++) {
				$post['stars'] .= "<img src=\"".IMGDIR."/star.gif\">";
			}

			if($groupinfo['groupavatar']) {
				$post['avatar'] = image($groupinfo['groupavatar']);
			} elseif($groupinfo['allowavatar'] && $post['avatar']) {
				$post['avatar'] = '<img src="'.$post['avatar'].'" border="0">';
			} else {
				$post['avatar'] = '';
			}

		} else {
			$post['postnum'] = $post['credit'] = $post['regdate'] = 'N/A';
		}

		$post['karma'] = '';
		if($post['rate'] && $post['ratetimes']) {
			$rateimg = $post['rate'] > 0 ? 'agree.gif' : 'disagree.gif';
			for($i = 0; $i < round(abs($post['rate']) / $post['ratetimes']); $i++) {
				$post['karma'] .= '<img src="'.IMGDIR.'/'.$rateimg.'" align="right">';
			}
		}

		$post['subject'] = $post['subject'] ? $post['subject'].'<br><br>' : NULL;
		$post['message'] = postify($post['message'], $post['smileyoff'], $post['bbcodeoff'], $forum['allowsmilies'], $forum['allowhtml'], $forum['allowbbcode'], $forum['allowimgcode']);
		$post['signature'] = $post['usesig'] && $post['signature'] ? postify($post['signature'], 0, 0, 0, 0, $groupinfo['allowsigbbcode'], $groupinfo['allowsigimgcode']) : NULL;

		if($post['aaid']) {
			require_once $discuz_root.'./include/attachment.php';
			$extension = strtolower(substr(strrchr($post['filename'], "."), 1));
			$post['attachicon'] = attachicon($extension."\t".$postattach['filetype']);
			if($attachimgpost && ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'jpe' || $extension == 'gif' || $extension == 'png' || $extension == 'bmp')) {
				$post['attachimg'] = 1;
			} elseif($attachimgpost && $extension == 'swf') {
				$post['attachimg'] = 2;
			} else {
				$post['attachimg'] = 0;
				$post['attachsize'] = sizecount($post['filesize']);
			}
		}

		$postlist[] = $post;

	}

	$forumselect = forumselect();

	if($fastpost && (!$thread['closed'] || $ismoderator) && ((!$forum['postperm'] && $allowpost) || ($forum['postperm'] && strstr($forum['postperm'], "\t$groupid\t")))) {
		$fastpost = 1;
		$usesigcheck = $signature ? "checked" : NULL;
	} else {
		$fastpost = 0;
	}



} elseif($action == 'printable' && $tid) {



}
echo "sdfsdfdfd";

?>