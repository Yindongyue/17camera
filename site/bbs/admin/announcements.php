<?php

/*
	[17camera!] admin/announcements - make or delete announcements
	This is NOT a freeware, use is subject to license terms

	Version: 2.2.0
	Author: 17camera (master@17camera.com)
	Copyright: 17camera Studio (www.17camera.com)
	Last Modified: 2002/12/25 10:00
*/


if(!defined("IN_DISCUZ")) {
        exit("Access Denied");
}

cpheader();

if($action == "announcements") {

	if(!$deletesubmit && !$addsubmit && !$edit) {

		$announcements = '';
		$query = $db->query("SELECT * FROM $table_announcements ORDER BY starttime DESC, id DESC");
		while($announce = $db->fetch_array($query)) {
			$announce['author'] = "<a href=\"./viewpro.php?username=".rawurlencode($announce[author])."\" target=\"_blank\">$announce[author]</a>";
			$announce['subject'] = "<a href=\"admincp.php?action=announcements&edit=$announce[id]\">$announce[subject]</a>";
			$announce['starttime'] = $announce['starttime'] ? gmdate("$dateformat", $announce[starttime] + $timeoffset * 3600) : "不限";
			$announce['endtime'] = $announce['endtime'] ? gmdate("$dateformat", $announce[endtime] + $timeoffset * 3600) : "不限";
			$announce['message'] = "<a href=\"admincp.php?action=announcements&edit=$announce[id]\">".wordscut(strip_tags($announce[message]), 20)."</a>";
			$announcements .= "<tr align=\"center\"><td bgcolor=\"".ALTBG1."\"><input type=\"checkbox\" name=\"delete[]\" value=\"$announce[id]\"></td>\n".
				"<td bgcolor=\"".ALTBG2."\">$announce[author]</td>\n".
				"<td bgcolor=\"".ALTBG1."\">$announce[subject]</td>\n".
				"<td bgcolor=\"".ALTBG2."\">$announce[message]</td>\n".
				"<td bgcolor=\"".ALTBG1."\">$announce[starttime]</td>\n".
				"<td bgcolor=\"".ALTBG2."\">$announce[endtime]</td></tr>\n";
		}
		$newstarttime = gmdate('Y-n-j', $timestamp + $timeoffset * 3600);

?>
<br><form method="post" action="admincp.php?action=announcements">
<table cellspacing="0" cellpadding="0" border="0" width="95%" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header"><td colspan="6">论坛公告编辑</td></tr>
<tr align="center" class="header">
<td width="45"><input type="checkbox" name="chkall" class="header" onclick="checkall(this.form)">删?</td>
<td>发布人</td><td>标题</td><td>内容</td><td>起始时间</td><td>终止时间</td></tr>
<?=$announcements?>
</table></td></tr></table><br><center>
<input type="submit" name="deletesubmit" value="删除选定公告"></center></form>

<br><form method="post" action="admincp.php?action=announcements">
<table cellspacing="0" cellpadding="0" border="0" width="95%" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header"><td colspan="2">添加论坛公告</td></tr>

<tr><td width="21%" bgcolor="<?=ALTBG1?>"><b>标题：</b></td>
<td width="79%" bgcolor="<?=ALTBG2?>"><input type="text" size="45" name="newsubject"></td></tr>

<tr><td width="21%" bgcolor="<?=ALTBG1?>"><b>起始时间：</b><br>格式：yyyy-mm-dd</td>
<td width="79%" bgcolor="<?=ALTBG2?>"><input type="text" size="45" name="newstarttime" value="<?=$newstarttime?>"></td></tr>

<tr><td width="21%" bgcolor="<?=ALTBG1?>"><b>终止时间：</b><br>格式：yyyy-mm-dd</td>
<td width="79%" bgcolor="<?=ALTBG2?>"><input type="text" size="45" name="newendtime"> 留空为不限制</td></tr>

<tr><td width="21%" bgcolor="<?=ALTBG1?>" valign="top"><b>公告内容：</b><br>公告中可以使用 UBB 代码</td>
<td width="79%" bgcolor="<?=ALTBG2?>"><textarea name="newmessage" cols="60" rows="10"></textarea></td></tr>

</table></td></tr></table><br><center><input type="submit" name="addsubmit" value="添加论坛公告">
</form>
<?

	} elseif($edit) {

		if(!$editsubmit) {
			$query = $db->query("SELECT * FROM $table_announcements WHERE id='$edit'");
			if($announce = $db->fetch_array($query)) {
				$announce[starttime] = $announce[starttime] ? gmdate("Y-n-j", $announce[starttime] + $timeoffset * 3600) : "";
				$announce[endtime] = $announce[endtime] ? gmdate("Y-n-j", $announce[endtime] + $timeoffset * 3600) : "";

?>
<br><form method="post" action="admincp.php?action=announcements&edit=<?=$edit?>">
<table cellspacing="0" cellpadding="0" border="0" width="95%" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header"><td colspan="2">编辑论坛公告</td></tr>

<tr><td width="21%" bgcolor="<?=ALTBG1?>"><b>标题：</b></td>
<td width="79%" bgcolor="<?=ALTBG2?>"><input type="text" size="45" name="subjectnew" value="<?=$announce[subject]?>"></td></tr>

<tr><td width="21%" bgcolor="<?=ALTBG1?>"><b>起始时间：</b><br>格式：yyyy-mm-dd</td>
<td width="79%" bgcolor="<?=ALTBG2?>"><input type="text" size="45" name="starttimenew" value="<?=$announce[starttime]?>"></td></tr>

<tr><td width="21%" bgcolor="<?=ALTBG1?>"><b>终止时间：</b><br>格式：yyyy-mm-dd</td>
<td width="79%" bgcolor="<?=ALTBG2?>"><input type="text" size="45" name="endtimenew" value="<?=$announce[endtime]?>"> 留空为不限制</td></tr>

<tr><td width="21%" bgcolor="<?=ALTBG1?>" valign="top"><b>公告内容：</b><br>公告中可以使用 BB 代码</td>
<td width="79%" bgcolor="<?=ALTBG2?>"><textarea name="messagenew" cols="60" rows="10"><?=dhtmlspecialchars($announce[message])?></textarea></td></tr>

</table></td></tr></table><br><center><input type="submit" name="editsubmit" value="编辑论坛公告">
</form>
<?
			} else {
				cpmsg("指定的公告不存在，请返回。");
			}
		} else {
			$newsubject = dhtmlspecialchars($newsubject);
			if(strpos($starttimenew, "-")) {
				$time = explode("-", $starttimenew);
				$starttimenew = gmmktime(0, 0, 0, $time[1], $time[2], $time[0]) - $timeoffset * 3600;
			} else {
				$starttimenew = 0;
			}
			if(strpos($endtimenew, "-")) {
				$time = explode("-", $endtimenew);
				$endtimenew = gmmktime(0, 0, 0, $time[1], $time[2], $time[0]) - $timeoffset * 3600;
			} else {
				$endtimenew = 0;
			}

			if(!$starttimenew) {
				cpmsg("您必须输入起始时间，请返回修改。");
			} elseif(!trim($subjectnew) || !trim($messagenew)) {
				cpmsg("您必须输入公告标题和内容，请返回修改。");
			} else {
				$db->query("UPDATE $table_announcements SET subject='$subjectnew', starttime='$starttimenew', endtime='$endtimenew', message='$messagenew' WHERE id='$edit'");
				updatecache("announcements");
				cpmsg("论坛公告成功编辑。");
			}
		}

	} elseif($deletesubmit) {

		if(is_array($delete)) {
			$ids = $comma = "";
			foreach($delete as $id) {
				$ids .= "$comma'$id'";
				$comma = ", ";
			}
			$db->query("DELETE FROM $table_announcements WHERE id IN ($ids)");
		}

		updatecache("announcements");
		cpmsg("指定公告成功删除");

	} elseif($addsubmit) {

		$newsubject = dhtmlspecialchars($newsubject);
		if(strpos($newstarttime, "-")) {
			$time = explode("-", $newstarttime);
			$newstarttime = gmmktime(0, 0, 0, $time[1], $time[2], $time[0]) - $timeoffset * 3600;
		} else {
			$newstarttime = 0;
		}
		if(strpos($newendtime, "-")) {
			$time = explode("-", $newendtime);
			$newendtime = gmmktime(0, 0, 0, $time[1], $time[2], $time[0]) - $timeoffset * 3600;
		} else {
			$newendtime = 0;
		}

		if(!$newstarttime) {
			cpmsg("您必须输入起始时间，请返回修改。");
		} elseif(!trim($newsubject) || !trim($newmessage)) {
			cpmsg("您必须输入公告标题和内容，请返回修改。");
		} else {
			$db->query("INSERT INTO $table_announcements (author, subject, starttime, endtime, message)
				VALUES ('$discuz_user', '$newsubject', '$newstarttime', '$newendtime', '$newmessage')");
			updatecache("announcements");
			cpmsg("论坛公告成功添加");
		}
	}

}

?>