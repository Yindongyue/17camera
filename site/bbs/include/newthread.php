<?php

/*
	[17camera!] include/newthread.php - starting new thread for post module
	This is NOT a freeware, use is subject to license terms

	Version: 2.2.0
	Author: 17camera (master@17camera.com)
	Copyright: 17camera Studio (www.17camera.com)
	Last Modified: 2004/5/28 05:48
*/


if(!defined('IN_DISCUZ')) {
        exit('Access Denied');
}

$discuz_action = 11;

if(empty($forum['fid']) || $forum[type] == 'group') {
	showmessage('forum_nonexistence');
}

if(!$topicsubmit) {

	include template('post_newthread');

} else {

	if(!$subject || !$message) {
		showmessage('post_sm_isnull');
	}

	if(strlen(htmlspecialchars($subject)) > 100) { //fix:标题长度检查与后面检查不一致
		showmessage('post_subject_toolang');
	}

	if(!$issupermod && $maxpostsize && strlen($message) > $maxpostsize) {
		showmessage('post_message_toolang');
	}

	if(!$isadmin && !$issupermod && $forum['lastpost']) {
		$lastpost = explode("\t", $forum['lastpost']);
		if(($timestamp - $floodctrl) <= $lastpost[1] && $username == $lastpost[2]) {
			showmessage('post_flood_ctrl');
		}
	}

	$subject = dhtmlspecialchars($subject);
	$topped = ($ismoderator && $toptopic) ? 1 : 0;
	$digest = ($ismoderator && $addtodigest) ? 1 : 0;
	$viewperm = $allowsetviewperm ? $viewperm : 0;

	if($poll == 'yes' && $allowpostpoll && trim($polloptions)) {
		$pollarray = array();
		$polloptions = explode("\n", $polloptions);
		if(count($polloptions) > 10) {
			showmessage('post_poll_option_toomany');
		}

		foreach($polloptions as $polloption) {
			$polloption = trim($polloption);
			if($polloption) {
				$pollarray['options'][] = array($polloption, 0);
			}
		}
		$pollarray['multiple'] = $multiplepoll;
		$pollarray['voters'] = array();
		$pollopts = addslashes(serialize($pollarray));
	} else {
		$pollopts = '';
	}

	if(attach_upload() && ((!$forum['postattachperm'] && $allowpostattach) || ($forum['postattachperm'] && strstr($forum['postattachperm'], "\t$groupid\t")))) {
		$attachperm = $allowsetattachperm ? $attachperm : 0;
		$db->query("INSERT INTO $table_attachments (creditsrequire, filename, filetype, filesize, attachment, downloads)
			VALUES ('$attachperm', '$attach_name', '$attach_type', '$attach_size', '$attach_fname', '0')");
		$aid = $db->insert_id();
		$attach_type = substr(strrchr($attach_name, '.'), 1)."\t".$attach_type;
	} else {
		$attach_type = '';
		$aid = 0;
	}

	$db->query("INSERT INTO $table_threads (fid, creditsrequire, icon, author, subject, dateline, lastpost, lastposter, topped, digest, pollopts, attachment)
		VALUES ('$fid', '$viewperm', '$posticon', '$username', '$subject', '$timestamp', '$timestamp', '$username', '$topped', '$digest', '$pollopts', '$attach_type')");
	$tid = $db->insert_id();
	$db->query("INSERT INTO $table_posts  (fid, tid, aid, icon, author, subject, dateline, message, useip, usesig, bbcodeoff, smileyoff, parseurloff)
		VALUES ('$fid', '$tid', '$aid', '$posticon', '$username', '$subject', '$timestamp', '$message', '$onlineip', '$usesig', '$bbcodeoff', '$smileyoff', '$parseurloff')");
	$pid = $db->insert_id();
	if($aid) {
		$db->query("UPDATE $table_attachments SET tid='$tid', pid='$pid' WHERE aid='$aid'");
	}
	updatemember('+', $username);
	$db->unbuffered_query("UPDATE $table_forums SET lastpost='$subject\t$timestamp\t$username', threads=threads+1, posts=posts+1 WHERE fid='$fid' $fupadd");

	if($emailnotify && $username != 'Guest') {
		$query = $db->query("SELECT tid FROM $table_subscriptions WHERE tid='$tid' AND username='$username'");
		if(!$db->result($query, 0)) {
			$db->query("INSERT INTO $table_subscriptions (username, email, tid)
				VALUES ('$username', '$email', '$tid')");
		}
	}

	showmessage('post_newthread_succeed', "viewthread.php?tid=$tid");
}

?>