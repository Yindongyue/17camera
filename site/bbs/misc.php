<?php

/*
	[17camera!] misc.php - misc of thread functions
	This is NOT a freeware, use is subject to license terms

	Version: 2.2.0
	Author: 17camera (master@17camera.com)
	Copyright: 17camera Studio (www.17camera.com)
	Last Modified: 2002/12/6 17:00
*/

require './include/common.php';

if($tid) {
	$query = $db->query("SELECT * FROM $table_threads WHERE tid='$tid'");
	$thread = $db->fetch_array($query);
	//$thread[subject] = addslashes($thread[subject]);
}

if($forum[type] == 'forum') {
	$navigation = "&raquo; <a href=\"forumdisplay.php?fid=$fid\">$forum[name]</a> &raquo; <a href=\"viewthread.php?tid=$tid\">$thread[subject]</a> ";
	$navtitle = " - $forum[name] - $thread[subject]";
} else {
	$query = $db->query("SELECT name, fid FROM $table_forums WHERE fid='$forum[fup]'");
	$fup = $db->fetch_array($query);
	$navigation = "&raquo; <a href=\"forumdisplay.php?fid=$fup[fid]\">$fup[name]</a> &raquo; <a href=\"forumdisplay.php?fid=$fid\">$forum[name]</a> &raquo; <a href=\"viewthread.php?tid=$tid\">$thread[subject]</a> ";
	$navtitle = " - $fup[name] - $forum[name] - $thread[subject]";
}

if($action == 'votepoll') {

	if(!$discuz_user || !$allowvote) {
		showmessage('group_nopermission');
	}

	$pollarray = unserialize($thread['pollopts']);
	if(!is_array($pollarray) || !$pollarray) {
		showmessage('undefined_action');
	}

	if(!empty($thread['closed'])) {
		showmessage('thread_poll_closed');
	}

	if(in_array($discuz_user, $pollarray['voters'])) {
		showmessage('thread_poll_voted');
	}

	if(!is_array($pollanswers) || count($pollanswers) < 1) {
		showmessage('thread_poll_invalid');
	}

	if(empty($pollarray['multiple']) && count($pollanswers) > 1) {
		showmessage('undefined_action');
	}

	$pollarray['voters'][] = $discuz_user;
	foreach($pollanswers as $id) {
		if (!$pollarray['options'][$id]) showmessage('undefined_action');   //fix_20030927_url提交投票数据无效检验
		if(++$pollarray['options'][$id][1] > $pollarray['max']) {
			$pollarray['max'] = $pollarray['options'][$id][1];
		}
		$pollarray['total']++;
	}

	$pollopts = addslashes(serialize($pollarray));
	$db->unbuffered_query("UPDATE $table_threads SET pollopts='$pollopts', lastpost='$timestamp' WHERE tid='$tid'");

	showmessage('thread_poll_succeed', "viewthread.php?tid=$tid");

} elseif($action == 'emailfriend') {

	if(!$sendsubmit) {

		$discuz_action = 122;
		$threadurl = "{$boardurl}viewthread.php?tid=$tid";

		$query = $db->query("SELECT email FROM $table_members WHERE username='$discuz_user'");
		$email = $db->result($query, 0);

		include template('emailfriend');

	} else {
		if(empty($fromname) || empty($fromemail) || empty($sendtoname) || empty($sendtoemail)) {
			showmessage('email_friend_invalid');
		}

		sendmail($sendtoemail, $subject, $message, "$fromname <$fromemail>");

		showmessage('email_friend_succeed', "viewthread.php?tid=$tid");
	}

} elseif($action == 'karma' && $pid) {

	$discuz_action = 121;

	if(!$allowkarma || !$maxkarmarate) {
		showmessage('group_nopermission');
	}

	$offset = ceil($maxkarmarate / 6);
	$minkarmarate = $offset - $maxkarmarate;
	if($score < $minkarmarate || $score > $maxkarmarate) {
		showmessage('thread_karma_range_invalid');
	}

	$query = $db->query("SELECT author FROM $table_posts WHERE pid='$pid'");
	if(!$post = $db->fetch_array($query)) {
		showmessage('undefined_action');
	} elseif($post['author'] == $discuz_userss) {
		showmessage('thread_karma_member_invalid');
	}
	$username = addslashes($post['author']);	// by cnteacher

	$query = $db->query("SELECT SUM(score) FROM $table_karmalog WHERE username='$discuz_user' AND dateline>=$timestamp-86400");
	if($maxrateperday &&  $maxrateperday <= $db->result($query, 0)) {
		$db->unbuffered_query("DELETE FROM $table_karmalog WHERE dateline<$timestamp-2592000");
		showmessage('thread_karma_ctrl');
	}

	$query = $db->query("SELECT COUNT(*) FROM $table_karmalog WHERE username='$discuz_user' AND pid='$pid'");
	if($db->result($query, 0)) {
		showmessage('thread_karma_duplicate');
	}

	if(!$karmasubmit) {

		$username = stripslashes($username);
		$encodename = rawurlencode($username);

		include template('karma');

	} else {

		$score = intval($score);
		if($score >= 0) {
			$score = "+$score";
		}
		$db->unbuffered_query("UPDATE $table_members SET credit=credit$score WHERE username='$post[author]'");
		$db->unbuffered_query("INSERT INTO $table_karmalog (username, pid, dateline, score)
			VALUES ('$discuz_user', '$pid', '$timestamp', '".abs($score)."')");

		$ratetimes = round($maxkarmarate / 5);
		$db->unbuffered_query("UPDATE $table_posts SET rate=rate$score, ratetimes=ratetimes+$ratetimes WHERE pid='$pid'");
		
		@$fp = fopen($discuz_root.'./forumdata/karmalog.php', 'a');
		@flock($fp, 3);
		@fwrite($fp, "$discuz_user\t$status\t$timestamp\t$username\t$score\t$tid\t$thread[subject]\n");
		@fclose($fp);

		showmessage('thread_karma_succeed', "viewthread.php?tid=$tid");

	}

} elseif($action == 'report') {

	if(!$reportpost) {
		showmessage('thread_report_disabled');
	}

	if(!$discuz_user) {
		showmessage('not_loggedin');
	}

	if(!$reportsubmit) {

		$discuz_action = 123;
		include template('reportpost');

	} else {

		if($pid) {
			$posturl = "{$boardurl}viewthread.php?tid=$tid#pid$pid";
		} else {
			$posturl = "{$boardurl}viewthread.php?tid=$tid";
		}

		$message = "Someone has reported the following post to you, please visit: \[url\]$posturl\[/url\]\n\nHis/Her reasons are: $reason";

		$reportto = array();
		if($forum['moderator']) { //fix:会员无法发送报告给斑竹.
			$mods = explode(',', $forum['moderator']);
			foreach($mods as $moderator) {
				$reportto[] = trim($moderator);
			}
		} else {
			$query = $db->query("SELECT username FROM $table_members WHERE status='Admin' OR status='SuperMod'");
			while($member = $db->fetch_array($query)) {
				$reportto[] = $member['username'];
			}
		}

		$admins = $comma = '';
		foreach($reportto as $admin) {
			$admin = addslashes($admin);
			$admins .= "$comma'$admin'";
			$comma = ', ';
			$db->query("INSERT INTO $table_pm (msgto, msgfrom, folder, new, subject, dateline, message)
				VALUES('$admin', '$discuz_user', 'inbox', '1', 'Report post to you from $discuz_user...', '$timestamp', '$message')");
		}
		$db->query("UPDATE $table_members SET newpm=newpm+1 WHERE username IN ($admins)");

		showmessage('thread_report_succeed', "viewthread.php?tid=$tid");

	}

} else {

	showmessage('undefined_action');

}

?>