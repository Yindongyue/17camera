<?php

/*
	[17camera!] topicadmin - moderator's administration
	This is NOT a freeware, use is subject to license terms

	Version: 2.0.0
	Author: 17camera (master@17camera.com)
	Copyright: 17camera Studio (www.17camera.com)
	Last Modified: 2002/12/6 17:00
*/

require './include/common.php';
require $discuz_root.'./include/post.php';
require $discuz_root.'./include/misc.php';

$discuz_action = 151;
$ismoderator = modcheck($discuz_user);

$tid = $tid ? $tid : $delete[0];
if($tid) {
	$query = $db->query("SELECT * FROM $table_threads WHERE tid='$tid'");
	$thread = $db->fetch_array($query);
	$thread['subject'] .= $action == 'delthread' ? ", etc." : NULL;
}

if($forum['type'] == 'forum') {
	$navigation = "&raquo; <a href=\"forumdisplay.php?fid=$fid\">$forum[name]</a> &raquo; <a href=\"viewthread.php?tid=$tid\">$thread[subject]</a> ";
	$navtitle = " - $forum[name] - $thread[subject]";
} else {
	$query = $db->query("SELECT name, fid FROM $table_forums WHERE fid='$forum[fup]'");
	$fup = $db->fetch_array($query);
	$navigation = "&raquo; <a href=\"forumdisplay.php?fid=$fup[fid]\">$fup[name]</a> &raquo; <a href=\"forumdisplay.php?fid=$fid\">$forum[name]</a> &raquo; <a href=\"viewthread.php?tid=$tid\">$thread[subject]</a> ";
	$navtitle = " - $fup[name] - $forum[name] - $thread[subject]";
}

if(!$discuz_user || !$discuz_pw || !$ismoderator) {
	showmessage('admin_nopermission');
}

$fupadd = $fup ? "OR (fid='$fup[fid]' && type<>'group')" : NULL;

if($action == 'delthread') {

	if(!is_array($delete) && !count($delete)) {
		showmessage('admin_delthread_invalid');
	} else {
		if(!$delthreadsubmit) {

			$deleteid = '';
			foreach($delete as $id) {
				$deleteid .= "<input type=\"hidden\" name=\"delete[]\" value=\"$id\">\n";
			}

			include template('topicadmin_delthread');
				
		} else {

			$tids = $comma = '';
			foreach($delete as $id) {
				$tids .= "$comma'$id'";
				$comma = ", ";
			}



			$usernames = $comma = '';

			//fix:  版主权限超越
			$query = $db->query("SELECT tid,author FROM $table_posts WHERE tid IN ($tids) AND fid='$forum[fid]' "); 
		    $tids=''; 
			while($result = $db->fetch_array($query)) {
				$tids .= "$comma'".$result[tid]."'"; 
				$author = addslashes($result[author]);
				$usernames .= "$comma$author";
				$comma = ",";
			}
		    if(!$tids) showmessage('admin_delpost_invalid');  
			//fix: end
			updatemember('-', $usernames);

			$query = $db->query("SELECT attachment FROM $table_attachments WHERE tid IN ($tids)");
			while($attach = $db->fetch_array($query)) {
				@unlink("$attachdir/$attach[attachment]");
			}

			$db->query("DELETE FROM $table_threads WHERE tid IN ($tids) OR closed='moved|$tid'");
			$db->query("DELETE FROM $table_posts WHERE tid IN ($tids)");
			$db->query("DELETE FROM $table_attachments WHERE tid IN ($tids)");
			updateforumcount($fid);

			showmessage('admin_succeed', "forumdisplay.php?fid=$fid&page=$page");

		}
	}		

} elseif($action == 'delpost') {

	if(!is_array($delete) && !count($delete)) {
		showmessage('admin_delpost_invalid');
	} else {
		if(!$delpostsubmit) {

			$query = $db->query("SELECT COUNT(*) FROM $table_posts WHERE tid='$tid'");
			if(count($delete) < $db->result($query, 0)) {

				$deleteid = '';
				foreach($delete as $id) {
					$deleteid .= "<input type=\"hidden\" name=\"delete[]\" value=\"$id\">\n";
				}

				include template('topicadmin_delpost');
				
			} else {
				header("Location: {$boardurl}topicadmin.php?action=delete&fid=$fid&tid=$tid");
			}

		} else {

			$pids = $comma = '';
			foreach($delete as $id) {
				$pids .= "$comma'$id'";
				$comma = ", ";
			}

			$usernames = $comma = '';
			//fix: 版主权限超越
		    $query = $db->query("SELECT pid,author FROM $table_posts WHERE pid IN ($pids) AND fid='$forum[fid]'"); 
		    $pids=''; 
			while($result = $db->fetch_array($query)) {
    			$pids .="$comma'".$result[pid]."'"; 
				$author = addslashes($result[author]);
				$usernames .= "$comma$author";
				$comma = ",";
			}
	    	if(!$pids) showmessage('admin_delpost_invalid');  
			//fix:end
			updatemember('-', $usernames);

			$attach_type = '';
			$query = $db->query("SELECT pid, attachment, filetype FROM $table_attachments WHERE tid='$tid'");
			while($attach = $db->fetch_array($query)) {
				if(in_array($attach[pid], $delete)) {
					@unlink("$attachdir/$attach[attachment]");
				} else {
					$attach_type = substr(strrchr($attach[attachment], "."), 1)."\t".$attach[filetype];
				}
			}

			if($attach_type) {
				$db->query("UPDATE $table_threads SET attachment='$attach_type' WHERE tid='$tid'");
			}

			$db->query("DELETE FROM $table_posts WHERE pid IN ($pids)");
			$db->query("DELETE FROM $table_attachments WHERE pid IN ($pids)");
			updatethreadcount($tid);
			updateforumcount($fid);

			showmessage('admin_succeed', "forumdisplay.php?fid=$fid&page=$page");

		}
	}

} elseif($action == 'digest') {

	if(!$digestsubmit) {

		include template('topicadmin_digest');

	} else {

		//fix:禁止精品等级过高，禁止重复加入精华，用户重复得分
		//plus:根据精品等级，加入不同分数，降级会扣除用户多余积分
		$level=intval($level);
		if($level < 0 || $level > 3) {
			 showmessage('undefined_action');  
		}
		$digest_mark=($level-intval($thread['digest']))*$digestcredits;
        $db->unbuffered_query("UPDATE $table_threads SET digest='$level' WHERE tid='$tid'"); 
		if($digest_mark) {
            $db->unbuffered_query("UPDATE $table_members SET credit=credit".($digest_mark > 0 ? '+' : '')."$digest_mark WHERE username='$thread[author]'"); 
		}
		showmessage('admin_succeed', "forumdisplay.php?fid=$fid&fpage=$fpage");
		//fix,plus:end

	}

} elseif($action == 'delete') {

	if(!$deletesubmit) {

		include template('topicadmin_delete');

	} else {

		$usernames = $comma = '';
		$query = $db->query("SELECT author FROM $table_posts WHERE tid='$tid'");
		while($result = $db->fetch_array($query)) {
			$author = addslashes($result[author]);
			$usernames .= "$comma$author";
			$comma = ",";
		}
		updatemember('-', $usernames);

		$db->query("DELETE FROM $table_threads WHERE tid='$tid' OR closed='moved|$tid'");
		$db->query("DELETE FROM $table_posts WHERE tid='$tid'");
		$query = $db->query("SELECT attachment FROM $table_attachments WHERE tid='$tid'");
		while($thread_attachment = $db->fetch_array($query)) {
			@unlink("$attachdir/$thread_attachment[attachment]");
		}
		$db->query("DELETE FROM $table_attachments WHERE tid='$tid'");
		updateforumcount($fid);
		if ($forum[type] == "sub") {
			updateforumcount($fup[fid]);
		}

		showmessage('admin_succeed', "forumdisplay.php?fid=$fid");

	}

} elseif($action == 'close') {

	if(!$closesubmit) {

		include template('topicadmin_openclose');

	} else {
		$openclose = $thread[closed] ? 0 : 1;
		$db->query("UPDATE $table_threads SET closed='$openclose' WHERE tid='$tid' AND fid='$fid'");
		showmessage('admin_succeed', "forumdisplay.php?fid=$fid");
	}

} elseif($action == 'move') {

	if(!$movesubmit) {

		require $discuz_root.'./include/forum.php';

		$forumselect = forumselect();
		include template('topicadmin_move');

	} else {

		if(!$moveto) {
			showmessage('admin_move_invalid');
		}

		if($type == 'normal') {
			$db->query("UPDATE $table_threads SET fid='$moveto' WHERE tid='$tid' AND fid='$fid'");
			$db->query("UPDATE $table_posts SET fid='$moveto' WHERE tid='$tid' AND fid='$fid'");
		} else {
			$db->query("INSERT INTO $table_threads (tid, fid, creditsrequire, icon, author, subject, dateline, lastpost, lastposter, views, replies, topped, digest, closed, pollopts, attachment)
				VALUES ('', '$thread[fid]', '$thread[creditsrequire]', '$thread[icon]', '$thread[author]', '$thread[subject]', '$thread[dateline]', '$thread[lastpost]', '$thread[lastposter]', '-', '-', '$thread[topped]', '$thread[digest]', 'moved|$thread[tid]', '', '')");

			$db->query("UPDATE $table_threads SET fid='$moveto' WHERE tid='$tid' AND fid='$fid'");
			$db->query("UPDATE $table_posts SET fid='$moveto' WHERE tid='$tid' AND fid='$fid'");
		}

		if ($forum['type'] == 'sub') {
			$query= $db->query("SELECT fup FROM $table_forums WHERE fid='$fid' LIMIT 1");
			$fup = $db->result($query, 0);
			updateforumcount($fup);
		}

		updateforumcount($moveto);
		updateforumcount($fid);
		showmessage('admin_succeed', "forumdisplay.php?fid=$fid");
	}

} elseif($action == 'top') {

	if(!$topsubmit) {

		include template('topicadmin_topuntop');

	} else {

		if(!$issupermod && $level >= 3) {
			showmessage('undefined_action');
		}
		$db->query("UPDATE $table_threads SET topped='$level' WHERE tid='$tid' AND fid='$fid'");
		showmessage('admin_succeed', "forumdisplay.php?fid=$fid");

	}

} elseif($action == 'getip') {

	$query = $db->query("SELECT useip FROM $table_posts WHERE pid='$pid' AND tid='$tid'");
	$useip = $db->result($query, 0);
	$iplocation = convertip($useip);

	include template('topicadmin_getip');

} elseif($action == 'bump') {

	if(!$bumpsubmit) {

		include template('topicadmin_bump');

	}else{

		$query = $db->query("SELECT subject, lastposter, lastpost FROM $table_threads WHERE tid='$tid' LIMIT 0, 1");
		$thread = $db->fetch_array($query);
		//fix:解决提升主题时候如果含有'，则论坛出错
		$thread[subject] = addslashes($thread[subject]);
		$thread[lastposter] = addslashes($thread[lastposter]);
		$db->query("UPDATE $table_threads SET lastpost='$timestamp' WHERE tid='$tid' AND fid='$fid'");
		$db->query("UPDATE $table_forums SET lastpost='$thread[subject]\t$timestamp\t$thread[lastposter]' WHERE fid='$fid' $fupadd");
		showmessage('admin_succeed', "forumdisplay.php?fid=$fid");
	}

} elseif($action == 'split') {

	if(!$splitsubmit) {

		require $discuz_root.'./include/discuzcode.php';

		$replies = $thread['replies'];
		if($replies <= 0) {
			showmessage('admin_split_invalid');
		}

		$postlist = array();
		$query = $db->query("SELECT * FROM $table_posts WHERE tid='$tid' ORDER BY dateline");
		while($post = $db->fetch_array($query)) {
			$post['message'] = postify($post['message'], $post['smileyoff'], $post['bbcodeoff']);
			$postlist[] = $post;
		}

		include template('topicadmin_split');

	} else {

		if(!trim($subject)) {
			showmessage('admin_split_subject_invalid');
		}
		//fix: 检查贴子分割标题的长度以及内容
		$subject=dhtmlspecialchars($subject);
                if(strlen($subject) > 100) {
	                showmessage('post_subject_toolang');
                }
		//fix:end
		$query = $db->query("SELECT author, dateline FROM $table_posts WHERE tid='$tid' ORDER BY dateline LIMIT 0,1");
		$fpost = $db->fetch_array($query);
		$query = $db->query("SELECT author, dateline FROM $table_posts WHERE tid='$tid' ORDER BY dateline DESC LIMIT 0, 1");
		$lpost = $db->fetch_array($query);
		$db->query("INSERT INTO $table_threads (fid, subject, author, dateline, lastpost, lastposter)
			VALUES ('$fid', '$subject', '".addslashes($fpost['author'])."', '$fpost[dateline]', '$lpost[dateline]', '".addslashes($lpost['author'])."')");
		$newtid = $db->insert_id();

		$pids = $or = '';
		$query = $db->query("SELECT pid FROM $table_posts WHERE tid='$tid'");
		while($post = $db->fetch_array($query)) {
			$split = "split$post[pid]";
			$split = "${$split}";
			if($split) {
				$pids .= " $or pid='$split'";
				$or = "OR";
			}
		}
		if($pids) {
			$db->query("UPDATE $table_posts SET tid='$newtid' WHERE $pids");
			$db->query("UPDATE $table_attachments SET tid='$newtid' WHERE $pids");
			updatethreadcount($tid);
			updatethreadcount($newtid);
			updateforumcount($fid);
			//fix:  修正分割后主题作者错误的BUG--开始 
			$pk_tmp_query=$db->query("Select author from $table_posts where tid='$newtid' order by dateline limit 1"); 
			$pk_author=AddSlashes($db->result($pk_tmp_query, 0)); 
			$db->query("Update $table_threads set author='$pk_author' where tid='$newtid'"); 
			//fix: 修正分割后主题作者错误的BUG--结束
			showmessage('admin_succeed', "forumdisplay.php?fid=$fid");
		} else {
			showmessage('admin_split_new_invalid');
		}
	}

} elseif($action == 'merge') {

	if(!$mergesubmit) {

		include template('topicadmin_merge');

	} else {
		$query = $db->query("SELECT fid, views, replies FROM $table_threads WHERE tid='$othertid'");
		$other = $db->fetch_array($query);
		$other['views'] = intval($other['views']);
		$other['replies']++;

		//fix:合并主题，贴子的fid身份忘记改变了。
		$db->query("UPDATE $table_posts SET tid='$tid', fid='$fid' WHERE tid='$othertid'");
		$postsmerged = $db->affected_rows();

		$db->query("UPDATE $table_attachments SET tid='$tid' WHERE tid='$othertid'");
		$db->query("DELETE FROM $table_threads WHERE tid='$othertid' OR closed='moved|$othertid'");
		$db->query("UPDATE $table_threads SET views=views+$other[views], replies=replies+$other[replies] WHERE tid='$tid'");
		
		if($fid == $other['fid']) {
			$db->query("UPDATE $table_forums SET threads=threads-1 WHERE fid='$fid' $fupadd");
		} else {
			$db->query("UPDATE $table_forums SET threads=threads-1, posts=posts-$postsmerged WHERE fid='$other[fid]'");
			$db->query("UPDATE $table_forums SET posts=$posts+$postsmerged WHERE fid='$fid' $fupadd");
		}

		showmessage('admin_succeed', "forumdisplay.php?fid=$fid");
	}

} else {

	showmessage('undefined_action');

}

@$fp = fopen($discuz_root.'./forumdata/modslog.php', 'a');
@flock($fp, 3);
@fwrite($fp, "$discuz_user\t$status\t$onlineip\t$timestamp\t$fid\t$forum[name]\t$tid\t$thread[subject]\t$action\n");
@fclose($fp);

?>