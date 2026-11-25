<?php

/*
	[17camera!] include/newreply.php - post replying for post module
	This is NOT a freeware, use is subject to license terms

	Version: 2.2.0
	Author: 17camera (master@17camera.com)
	Copyright: 17camera Studio (www.17camera.com)
	Last Modified: 2004/5/28 05:48
*/


if(!defined('IN_DISCUZ')) {
        exit('Access Denied');
}

$discuz_action = 12;

if(empty($thread)) {
	showmessage('thread_nonexistence');
}

if(!$replysubmit) {

	if($repquote) {
		//plus: 查询引用贴子信息，增加2个新的字段，用于漏洞检测和游客发表的贴子。
		$query = $db->query("SELECT tid, fid, author, message, useip, dateline FROM $table_posts WHERE pid='$repquote'");
		$thaquote = $db->fetch_array($query);
		//fix: 解决引用漏洞，避免他人伪造tid
		if($thaquote['tid'] != $tid) {
			showmessage('undefined_action');
		}
		$quotefid = $thaquote['fid'];
		$message = $thaquote['message'];

		$time = gmdate("$dateformat $timeformat", $thaquote[dateline] + ($timeoffset * 3600));
		$message = preg_replace("/\[hide=?\d*\](.+?)\[\/hide\]/is", "[b]**** 私密信息，内容隐藏 *****[/b]", $message);
		$message = preg_replace("/(\[quote])(.*)(\[\/quote])/siU", "", $message);
		$message = wordscut(dhtmlspecialchars(trim($message)), 200);
		$message = preg_replace("/\n{2}\[ Last edited by .+? on .+? at .+? \]$/s", '', $message);
		
		//plus: 针对于引用的文字和加入对游客发贴的引用问题。
		$thaquote['author'] = $thaquote['author'] ? "[b]$thaquote[author][/b]" : "[i]Guest[/i] （From：$thaquote[useip]）";
		$message = "[quote] [u]$thaquote[author]  在 $time 发表:[/u]\n\n$message [/quote]\n\n";
	}

	if($thread['replies'] <= $ppp) {
		$altbg1 = ALTBG1;
		$altbg2 = ALTBG2;
		$postcount = 0;
		$postlist = array();
		$query = $db->query("SELECT * FROM $table_posts WHERE tid='$tid' ORDER BY dateline DESC");
		while($post = $db->fetch_array($query)) {
			$bgno = $postcount++ % 2 + 1;
			$post['thisbg'] = ${altbg.$bgno};
			$post['dateline'] = gmdate("$dateformat $timeformat", $post[dateline] + $timeoffset * 3600);;
			$post['message'] = preg_replace("/\[hide=?\d*\](.+?)\[\/hide\]/is","[b]**** Hidden message by originally poster *****[/b]", $post['message']);
			$post['message'] = postify($post['message'], $post['smileyoff'], $post['bbcodeoff'], $forum['allowsmilies'], $forum['allowhtml'], $forum['allowbbcode'], $forum['allowimgcode']);

			$postlist[] = $post;
		}
	}

	include template('post_newreply');

} else {

	if(($subject == "" || ereg("^ *$", $subject)) && $message == "") {
		showmessage('post_sm_isnull');
	}

	if(strlen(htmlspecialchars($subject)) > 100) { //fix: 标题长度检查和后面不一致
		showmessage('post_subject_toolang');
	}

	//fix: 取消对admin和supermod的贴子长度限制，不过作用好像不大，因为发贴时候的js有了控制。
	if(!$isadmin && !$issupermod && $maxpostsize && strlen($message) > $maxpostsize) {
		showmessage('post_message_toolang');
	}

	if(!$isadmin && !$issupermod && $forum[lastpost]) {
		$lastpost = explode("\t", $forum[lastpost]);
		if(($timestamp - $floodctrl) <= $lastpost[1] && $username == $lastpost[2]) {
			showmessage('post_flood_ctrl');
		}
	}

	$subject = dhtmlspecialchars($subject);
	if($thread['closed'] && !$ismoderator) {
		showmessage('post_thread_closed');
	} else {
		$emails = $comma = '';
		$notifytime = $timestamp - 43200;
		$query = $db->query("SELECT email FROM $table_subscriptions WHERE username<>'$username' AND tid='$tid' AND lastnotify<'$notifytime'");
		while($subs = $db->fetch_array($query)) {
			$emails .= $comma.$subs['email'];
			$comma = ', ';
		}
		if($emails) {
			sendmail($emails, 'email_notify_subject', 'email_notify_content');
		}
		if($emailnotify && $username != 'Guest') {
			$query = $db->query("SELECT COUNT(*) FROM $table_subscriptions WHERE tid='$tid' AND username='$username'");
			if(!$db->result($query, 0)) {
				$db->unbuffered_query("INSERT INTO $table_subscriptions (username, email, tid)
					VALUES ('$username', '$email', '$tid')");
			}
		}
		if(attach_upload() && ((!$forum['postattachperm'] && $allowpostattach) || ($forum['postattachperm'] && strstr($forum['postattachperm'], "\t$groupid\t")))) {
			$attachperm = $allowsetattachperm ? $attachperm : 0;
			$db->query("INSERT INTO $table_attachments (tid, pid, creditsrequire, filename, filetype, filesize, attachment)
				VALUES ('$tid', '', '$attachperm', '$attach_name', '$attach_type', '$attach_size', '$attach_fname')");
			$aid = $db->insert_id();
			$attach_type = substr(strrchr($attach_name, '.'), 1)."\t".$attach_type;
		} else {
			$attach_type = '';
			$aid = 0;
		}

		$db->query("INSERT INTO $table_posts  (fid, tid, aid, icon, author, subject, dateline, message, useip, usesig, bbcodeoff, smileyoff, parseurloff)
			VALUES ('$fid', '$tid', '$aid', '$posticon', '$username', '$subject', '$timestamp', '$message', '$onlineip', '$usesig', '$bbcodeoff', '$smileyoff', '$parseurloff')");
		$pid = $db->insert_id();
		if($aid) {
			$db->query("UPDATE $table_attachments SET pid='$pid' WHERE aid='$aid'");
			$db->unbuffered_query("UPDATE $table_threads SET lastposter='$username', lastpost='$timestamp', replies=replies+1, attachment='$attach_type' WHERE tid='$tid' AND fid='$fid'");
		} else {
			$db->unbuffered_query("UPDATE $table_threads SET lastposter='$username', lastpost='$timestamp', replies=replies+1 WHERE tid='$tid' AND fid='$fid'");
		}
		updatemember('+', $username);
		$db->unbuffered_query("UPDATE $table_forums SET lastpost='".addslashes($thread[subject])."\t$timestamp\t$username', posts=posts+1 WHERE fid='$fid' $fupadd");
	}

	@$topicpages = ceil(($thread['replies'] + 2) / $ppp);

	showmessage('post_reply_succeed', "viewthread.php?tid=$tid&pid=$pid&page=$topicpages#pid$pid");
}

?>