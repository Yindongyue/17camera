<?php

/*
	[17camera!] prune.php - posts & pm pruning of 17camera! admincp
	This is NOT a freeware, use is subject to license terms

	Version: 1.1.0
	Author: 17camera (master@17camera.com)
	Copyright: 17camera Studio (www.17camera.com)
	Last Modified: 2002/12/5 10:27
*/

if(!defined('IN_DISCUZ')) {
		exit('Access Denied');
}

cpheader();

if($action == 'prune') {

	if(!$prunesubmit) {

		require $discuz_root.'./include/forum.php';

?>
<table cellspacing="0" cellpadding="0" border="0" width="90%" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header"><td>特别提示</td></tr>
<tr bgcolor="<?=ALTBG1?>"><td>
<br><ul><li>条件删贴可自动检索符合条件的帖子并将其删除，同时可以选择是否扣除作者发帖数和积分，用于清理垃圾贴。</ul>
<ul><li>批量删除主题可删除全部符合条件的主题，不会扣除作者发帖数和积分，用于清理论坛旧贴。</ul>
</td></tr></table></td></tr></table>

<br><br><form method="post" action="admincp.php?action=prune&type=filter">
<table cellspacing="0" cellpadding="0" border="0" width="90%" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">

<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">

<tr>
<td class="header" colspan="2">条件删贴 [此操作不可恢复 请慎重使用!]</td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>">删贴不减用户发贴数和积分：</td>
<td align="right" bgcolor="<?=ALTBG2?>"><input type="checkbox" name="donotupdatemember" value="1"></td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>">删除多少天以前的贴子(不限制时间请输入 0)：</td>
<td align="right" bgcolor="<?=ALTBG2?>"><input type="text" name="days" size="7"></td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>">请选择要批量删除的论坛：</td>
<td align="right" bgcolor="<?=ALTBG2?>"><select name="forums">
<option value="all">&nbsp;&nbsp;> 全部论坛</option><option value="">&nbsp;</option>
<?=forumselect()?></select></td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>">按用户名删除(多用户中间请用半角逗号 "," 分割)：</td>
<td align="right" bgcolor="<?=ALTBG2?>"><input type="text" name="users" size="40"></td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>">包含关键字(多关键字中间请用半角逗号 "," 分割)：</td>
<td align="right" bgcolor="<?=ALTBG2?>"><input type="text" name="keywords" size="40"></td>
</tr>

</table></td></tr></table><br>
<center><input type="submit" name="prunesubmit" value="执 行"></center>
</form>

<br><form method="post" action="admincp.php?action=prune&type=batch">
<table cellspacing="0" cellpadding="0" border="0" width="90%" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">

<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">

<tr>
<td class="header" colspan="2">批量删除主题 [此操作不可恢复 请慎重使用!]</td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>">保留置顶和精华主题：</td>
<td align="right" bgcolor="<?=ALTBG2?>"><input type="checkbox" name="reserve" value="1" checked></td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>">删除多少天内无新回复的主题：</td>
<td align="right" bgcolor="<?=ALTBG2?>"><input type="text" name="days" size="7"></td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>">删除被浏览次数小于多少的主题：</td>
<td align="right" bgcolor="<?=ALTBG2?>"><input type="text" name="views" size="7"></td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>">删除被回复次数小于多少的主题：</td>
<td align="right" bgcolor="<?=ALTBG2?>"><input type="text" name="replies" size="7"></td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>">请选择要批量删除的论坛：</td>
<td align="right" bgcolor="<?=ALTBG2?>"><select name="forums">
<option value="all">&nbsp;&nbsp;> 全部论坛</option><option value="">&nbsp;</option>
<?=forumselect()?></select></td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>">删除特定用户发起的主题(多用户中间请用半角逗号 "," 分割)：</td>
<td align="right" bgcolor="<?=ALTBG2?>"><input type="text" name="users" size="40"></td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>">标题中包含关键字(多关键字中间请用半角逗号 "," 分割)：</td>
<td align="right" bgcolor="<?=ALTBG2?>"><input type="text" name="keywords" size="40"></td>
</tr>

</table></td></tr></table><br>
<center><input type="submit" name="prunesubmit" value="执 行"></center>
</form>
<?

	} else {

		if($days == '' || !$forums) {
			cpmsg("您没有选择时间范围或论坛名称。");
		}

		if($type == 'filter') {

			$sql = "SELECT fid, tid, pid, author FROM $table_posts WHERE 1";

			if($forums != "all") {
				$sql .= " AND fid='$forums'";
			}
			if($days != "0") {
				$prunedate = $timestamp - (86400 * $days);
				$sql .= " AND dateline<='$prunedate'";
			}
			if(trim($keywords)) {
				$sqlkeywords = "";
				$or = "";
				$keywords = explode(",", str_replace(" ", "",$keywords));
				for($i = 0; $i < count($keywords); $i++) {
					$sqlkeywords .= " $or subject LIKE '%".$keywords[$i]."%' OR message LIKE '%".$keywords[$i]."%'";
					$or = "OR";
				}
				$sql .= " AND ($sqlkeywords)";
			}
			if(trim($users)) {
				$sql .= " AND author IN ('".str_replace(",", "', '", str_replace(" ", "", $users))."')";
			}

			$prune = array();
			$tids = $comma1 = $pids = $comma2 = "";
			$query = $db->query($sql);
			while($post = $db->fetch_array($query)) {
				$prune['forumposts'][$post[fid]]++;
				$prune['thread'][$post[tid]]++;
				$prune['user'][addslashes($post[author])]++;

				$tids .= "$comma1'$post[tid]'";
				$comma1 = ", ";

				$pids .= "$comma2'$post[pid]'";
				$comma2 = ", ";
			}

			if($pids) {
				$tidsdelete = $comma = "";
				$query = $db->query("SELECT fid, tid, replies FROM $table_threads WHERE tid IN ($tids)");
				while($thread = $db->fetch_array($query)) {
					if($thread[replies] + 1 <= $prune[thread][$thread[tid]]) {
						$tidsdelete .= "$comma'$thread[tid]'";
						$comma = ", ";
						$prune[forumthreads][$thread[fid]]++;
					}
				}
				if($tidsdelete) {
					$db->query("DELETE FROM $table_threads WHERE tid IN ($tidsdelete)");
				}

				$query = $db->query("SELECT attachment FROM $table_attachments WHERE pid IN ($pids)");
				while($attach = $db->fetch_array($query)) {
					@unlink("$attachdir/$attach[attachment]");
				}

				$query = $db->query("SELECT fid FROM $table_forums");
				while($forum = $db->fetch_array($query)) {
					if($prune[forumthreads][$forum[fid]] || $prune[forumposts][$forum[fid]]) {
						$prune[forumthreads][$forum[fid]] = intval($prune[forumthreads][$forum[fid]]);
						$prune[forumposts][$forum[fid]] = intval($prune[forumposts][$forum[fid]]);
						$querythd = $db->query("SELECT subject, lastpost, lastposter FROM $table_threads WHERE fid='$forum[fid]' ORDER BY lastpost DESC LIMIT 0, 1");
						$thread = $db->fetch_array($querythd);
						$thread[subject] = addslashes($thread[subject]);
						$thread[lastposter] = addslashes($thread[lastposter]);
						$db->query("UPDATE $table_forums SET threads=threads-".$prune[forumthreads][$forum[fid]].", posts=posts-".$prune[forumposts][$forum[fid]].", lastpost='$thread[subject]\t$thread[lastpost]\t$thread[lastposter]' WHERE fid='$forum[fid]'");
					}
				}

				foreach($prune[thread] as $tid => $decrease) {
					$db->query("UPDATE $table_threads SET replies=replies-$decrease WHERE tid='$tid'");
				}
				
				if(!$donotupdatemember) {
					foreach($prune[user] as $username => $decrease) {
						$db->query("UPDATE $table_members SET postnum=postnum-$decrease, credit=credit-$decrease*$postcredits WHERE username='$username'");
					}
				}

				$db->query("DELETE FROM $table_attachments WHERE pid IN ($pids)");
				$db->query("DELETE FROM $table_posts WHERE pid IN ($pids)");

				$num = $db->affected_rows();
			}

			$num = intval($num);
			cpmsg("符合条件的 $num 篇贴子被删除，相关数据成功更新。");

		} elseif($type == 'batch') {

			require_once $discuz_root.'./include/post.php';

			$sql = "SELECT fid, tid FROM $table_threads WHERE 1";

		//fix: PK0909 解决批量删贴问题：回复次数小于、 浏览次数小于这两个条件无效，删除多少天内无新回复的主题总是有效。
			if($views) { 
				$sql .= " AND views<'$views'"; 
			} 

			if($replies) { 
				$sql .= " AND replies<'$replies'"; 
			} 

			if($days) { 
				$prunedate = $timestamp - (86400 * $days); 
				$sql .= " AND lastpost<='$prunedate'"; 
			}

			if($forums != 'all') {
				$sql .= " AND fid='$forums'";
			}

		//fix: end

			if(trim($keywords)) {
				$sqlkeywords = $or = '';
				$keywords = explode(',', str_replace(' ', '',$keywords));
				foreach($keywords as $keyword) {
					$sqlkeywords .= " $or subject LIKE '%$keyword%'";
					$or = 'OR';
				}
				$sql .= " AND ($sqlkeywords)";
			}

			if(trim($users)) {
				$sql .= " AND author IN ('".str_replace(',', "', '", str_replace(' ', '', $users))."')";
			}

			if($reserve) {
				$sql .= " AND digest='0' AND topped='0'";
			}

			$fidprune = array();
			$tids = $comma = '';
			$query = $db->query($sql);
			while($thread = $db->fetch_array($query)) {
				$tids .= $comma."'$thread[tid]'";
				$fidprune[] = $thread['fid'];
				$comma = ', ';
			}

			if($tids) {

				$query = $db->query("SELECT attachment FROM $table_attachments WHERE tid IN ($tids)");
				while($attach = $db->fetch_array($query)) {
					@unlink($discuz_root.'./'.$attachdir.'/'.$attach['attachment']);
				}

				$db->query("DELETE FROM $table_attachments WHERE tid IN ($tids)");
				$db->query("DELETE FROM $table_posts WHERE tid IN ($tids)");
				$db->query("DELETE FROM $table_threads WHERE tid IN ($tids)");
				$num = $db->affected_rows();

				foreach(array_unique($fidprune) as $fid) {
					updateforumcount($fid);
				}

			}
			
			$num = intval($num);
			cpmsg("符合条件的 $num 篇主题被删除，相关数据成功更新。");

		}

	}

} elseif($action == 'pmprune') {

	if(!$prunesubmit) {

?>
<br><br><br><form method="post" action="admincp.php?action=pmprune">
<table cellspacing="0" cellpadding="0" border="0" width="90%" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr><td class="header" colspan="2">短消息清理 [此操作不可恢复 请慎重使用!]</td></tr>

<tr><td bgcolor="<?=ALTBG1?>">不删除未读信息：</td>
<td bgcolor="<?=ALTBG2?>" align="right"><input type="checkbox" name="ignorenew" value="1"></td></tr>

<tr><td bgcolor="<?=ALTBG1?>">删除多少天以前的短消息(不限制时间请输入 0)：</td>
<td bgcolor="<?=ALTBG2?>" align="right"><input type="text" name="days" size="7"></td></tr>

<tr><td bgcolor="<?=ALTBG1?>">按用户名清理(用户名间用半角逗号 "," 分割)：</td>
<td bgcolor="<?=ALTBG2?>" align="right"><input type="text" name="users" size="40"></td></tr>

</table></td></tr></table><br>
<center><input type="submit" name="prunesubmit" value="执 行"></center>
</form>
<?

	} else {

		if($days == "") {
			cpmsg("您没有输入要删除短消息的时间范围，请返回修改。");
		} else {
			$pruneuser = " AND (";
			$prunenew = "";
			$or = "";

			$prunedate = $timestamp - (86400 * $days);
			$arruser = explode(",", str_replace(" ", "", $users));
			for($i = 0; $i < count($arruser); $i++) {
				$arruser[$i] = trim($arruser[$i]);
				if($arruser[$i]) {
					$pruneuser .= $or."msgto='$arruser[$i]'";  //fix: 语法错误，丢失了一个 '
					$or = " OR ";
				}
			}
			if($pruneuser == " AND (") {   //fix:语法错误，导致删除条件无效
				$pruneuser = "";
			} else {
				$pruneuser .= ")";
			}
			if($ignorenew) {
				$prunenew = "AND new='0'";
			}

			$db->query("DELETE FROM $table_pm WHERE dateline<='$prunedate' $pruneuser $prunenew");
			$num = $db->affected_rows();

			cpmsg("符合条件的 $num 条短消息成功删除。");
		}
	}

}

?>