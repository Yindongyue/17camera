<?php

/*
	[17camera!] admin/members.php - config of members and usergroups
	This is NOT a freeware, use is subject to license terms

	Version: 2.0.1
	Author: 17camera (master@17camera.com)
	Copyright: 17camera Studio (www.17camera.com)
	Last Modified: 2002/12/23 20:56
*/


if(!defined("IN_DISCUZ")) {
	exit("Access Denied");
}

cpheader();

if($action == 'addmember') {

	if(!$addsubmit) {

?>
<br><form method="post" action="admincp.php?action=addmember">
<table cellspacing="0" cellpadding="0" border="0" width="80%" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">

<tr><td class="header" colspan="2">添加新用户</td></tr>

<tr><td bgcolor="<?=ALTBG1?>">头衔：</td>
<td align="right" bgcolor="<?=ALTBG2?>"><select name="newstatus">
<option value="Member">正式会员</option>
<option value="Moderator">版    主</option>
<option value="SuperMod">版主</option>
<option value="Inactive">等待验证</option>
</td></tr>

<tr><td bgcolor="<?=ALTBG1?>">用户名：</td>
<td align="right" bgcolor="<?=ALTBG2?>"><input type="text" name="newusername"></td></tr>

<tr><td bgcolor="<?=ALTBG1?>">密码：</td>
<td align="right" bgcolor="<?=ALTBG2?>"><input type="text" name="newpassword"></td></tr>

<tr><td bgcolor="<?=ALTBG1?>">Email：</td>
<td align="right" bgcolor="<?=ALTBG2?>"><input type="text" name="newemail"></td></tr>

<tr><td bgcolor="<?=ALTBG1?>">发送通知到上述地址：</td>
<td align="right" bgcolor="<?=ALTBG2?>"><input type="checkbox" name="emailnotify" value="yes" checked></td></tr>

</table></td></tr></table>
<br><center><input type="submit" name="addsubmit" value="添加用户"></center>
</form>
<?

	} else {

		if(!trim($newpassword)) {
			cpmsg('您没有填写用户密码，请返回修改。');
		}

		if(!trim($newemail)) {
			cpmsg('您没有填写 Email 地址，请返回修改。');
		}

		$query = $db->query("SELECT COUNT(*) FROM $table_members WHERE username='$newusername'");
		if($db->result($query, 0)) {
			cpmsg('用户名已经存在，请返回修改。');
		}

		$db->query("INSERT INTO $table_members (username, password, gender, status, regip, regdate, lastvisit, postnum, credit, email, tpp, ppp, styleid, dateformat, timeformat, showemail, newsletter, timeoffset)
			VALUES ('$newusername', '".md5($newpassword)."', '0', '$newstatus', 'hidden', '$timestamp', '$timestamp', '0', '0', '$newemail', '0', '0', '0', '{$_DCACHE[settings][dateformat]}', '{$_DCACHE[settings][timeformat]}', '1', '1', '{$_DCACHE[settings][timeoffset]}')");
		$db->query("UPDATE $table_settings SET lastmember='$newusername', totalmembers=totalmembers+1");

		if($emailnotify == 'yes') {
			sendmail($newemail, "[17camera!]您被 $bbname 添加为会员", "您好，我是 $bbname 管理员 {$discuz_user}，\n".
				"您已被添加成为我们论坛的会员，欢迎您用以下账号登录：\n".
				"用户名：$newusername\n".
				"密码：$newpassword\n".
				"欢迎光临 $bbname ($boardurl)"
				);
		}

		updatecache('settings');
		cpmsg('用户添加成功。');
	}

} elseif($action == 'members') {

	if(!$searchsubmit && !$deletesubmit && !$editsubmit && !$exportsubmit) {

?>
<br><form method="post" action="admincp.php?action=members">
<table cellspacing="0" cellpadding="0" border="0" width="80%" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">

<tr><td class="header" colspan="2">搜索用户</td></tr>

<tr><td bgcolor="<?=ALTBG1?>">直接删除符合条件的用户：</td>
<td align="right" bgcolor="<?=ALTBG2?>"><input type="checkbox" name="deletesubmit" value="1"></td></tr>

<tr><td bgcolor="<?=ALTBG1?>">头衔：</td>
<td align="right" bgcolor="<?=ALTBG2?>"><select name="userstatus">
<option value="">任何头衔</option>
<option value="Admin">管 理 员</option>
<option value="SuperMod">版主</option>
<option value="Moderator">版 &nbsp;&nbsp; 主</option>
<option value="Member">正式会员</option>
<option value="Banned">禁止访问</option>
<option value="PostBanned">禁止发言</option>
</select></td></tr>

<tr><td bgcolor="<?=ALTBG1?>">用户名包含：</td>
<td align="right" bgcolor="<?=ALTBG2?>"><input type="text" name="username" size="40"></td></tr>

<tr><td bgcolor="<?=ALTBG1?>">积分小于：</td>
<td align="right" bgcolor="<?=ALTBG2?>"><input type="text" name="creditsless" size="40"></td></tr>

<tr><td bgcolor="<?=ALTBG1?>">积分大于：</td>
<td align="right" bgcolor="<?=ALTBG2?>"><input type="text" name="creditsmore" size="40"></td></tr>

<tr><td bgcolor="<?=ALTBG1?>">多少天没有登录论坛：</td>
<td align="right" bgcolor="<?=ALTBG2?>"><input type="text" name="awaydays" size="40"></td></tr>

<tr><td bgcolor="<?=ALTBG1?>">注册 IP 开头 (如 202.97)：</td>
<td align="right" bgcolor="<?=ALTBG2?>"><input type="text" name="regip" size="40"></td></tr>

</table></td></tr></table><br><center>
<input type="submit" name="searchsubmit" value="搜索用户"> &nbsp; 
<input type="submit" name="deletesubmit" value="删除用户"> &nbsp; 
<input type="submit" name="exportsubmit" value="导出 Email"></center></form>
<?

	} elseif($searchsubmit || $deletesubmit || $exportsubmit) {

		if(!$page) {
			$page = 1;
		}
		$offset = ($page - 1) * $memberperpage;

		$conditions = "";
		$conditions .= $username != "" ? " AND (username LIKE '%$username%' OR username='$username')" : NULL;
		$conditions .= $userstatus != "" ? " AND status='$userstatus'" : NULL;
		$conditions .= $creditsmore != "" ? " AND credit>'$creditsmore'" : NULL;
		$conditions .= $creditsless != "" ? " AND credit<'$creditsless'" : NULL;
		$conditions .= $awaydays != "" ? " AND lastvisit<'".($timestamp - $awaydays * 86400)."'" : NULL;
		$conditions .= $regip != "" ? " AND regip LIKE '$regip%'" : NULL;

		if($conditions) {

			$conditions = substr($conditions, 5);
			if($searchsubmit) {
				$query = $db->query("SELECT COUNT(*) FROM $table_members WHERE $conditions");
				$num = $db->result($query, 0);
				$multipage = multi($num, $memberperpage, $page, "admincp.php?action=members&searchsubmit=yes&username=$username&userstatus=$userstatus&creditsmore=$creditsmore&creditsless=$creditsless&awaydays=$awaydays&regip=$regip");

				$query = $db->query("SELECT * FROM $table_members WHERE $conditions LIMIT $offset, $memberperpage");
				while($member = $db->fetch_array($query)) {
					$select = array($member[status] => "selected=\"selected\"");
					$members .= "<tr align=\"center\" bgcolor=\"".ALTBG2."\" align=\"center\">\n".
						"<td><input type=\"checkbox\" name=\"delete[]\" value=\"$member[uid]\"></td>\n".
						"<td>$member[username]</td>\n".
						"<td><input type=\"text\" size=\"10\" name=\"passwdnew[$member[uid]]\"></td>\n".
						"<td><input type=\"text\" size=\"5\" name=\"creditnew[$member[uid]]\" value=\"$member[credit]\"> $creditunit</td>\n".
						"<td><select name=\"statusnew[$member[uid]]\">\n".
						"<option value=\"Member\">未知头衔</option>\n".
						"<option value=\"Admin\" ".$select['Admin'].">管 理 员</option>\n".
						"<option value=\"SuperMod\" ".$select['SuperMod'].">版主</option>\n".
						"<option value=\"Moderator\" ".$select['Moderator'].">版 &nbsp;&nbsp; 主</option>\n".
						"<option value=\"Member\" ".$select['Member'].">正式会员</option>\n".
						"<option value=\"Banned\" ".$select['Banned'].">禁止访问</option>\n".
						"<option value=\"PostBanned\" ".$select['PostBanned'].">禁止发言</option></select></td>\n".
						"<td><input type=\"text\" size=\"15\" name=\"usercstatus[$member[uid]]\" value=\"$member[customstatus]\"></td>\n".
						"<td><a href=\"admincp.php?action=memberprofile&username=".rawurlencode($member[username])."\">[编辑]</a></tr>\n";
				}
						
?>
<form method="post" action="admincp.php?action=members">
<table cellspacing="0" cellpadding="0" border="0" width="95%" align="center">
<tr><td class="multi"><?=$multipage?></td></tr>
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr align="center" class="header">
<td width="45"><input type="checkbox" name="chkall" class="header" onclick="checkall(this.form)">删?</td>
<td>用户名</td><td>密码</td><td>积分</td><td>系统头衔</td><td>用户头衔</td><td>详细</td></tr>
<?=$members?>
</table></td></tr>
<tr><td class="multi"><?=$multipage?></td></tr>
</table><br><center>
<input type="submit" name="editsubmit" value="修改用户资料"></center>
</form>
<?

			} elseif($deletesubmit) {
				if(!$confirmed) {
					cpmsg("本操作不可恢复，您确定要删除符合条件的会员吗？", "admincp.php?action=members&deletesubmit=yes&username=$username&userstatus=$userstatus&creditsmore=$creditsmore&creditsless=$creditsless&awaydays=$awaydays&regip=$regip", "form");
				} else {
					$query = $db->query("DELETE FROM $table_members WHERE $conditions");
					$numdeleted = $db->affected_rows();
					updatecache('settings');
					cpmsg("符合条件的 $numdeleted 个用户被成功删除。");
				}
			} elseif($exportsubmit) {
				$export = $comma = '';
				$query = $db->query("SELECT username, email FROM $table_members WHERE $conditions");
				while($member = $db->fetch_array($query)) {
					$export .= "$comma$member[username] &lt;$member[email]&gt;";
					$comma = ', ';
				}

?>
<table cellspacing="0" cellpadding="0" border="0" width="95%" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header"><td>用户 Email 地址导出</td></tr>
<tr bgcolor="<?=ALTBG1?>"><td><?=$export?>
</td></tr></table></td></tr></table>
<?

			}
		} else {
			cpmsg("您没有提供搜索的条件，请返回修改。");
		}
	} elseif($editsubmit) {
		if(is_array($delete)) {
			$ids = $comma = '';
			foreach($delete as $id) {
				$ids .= "$comma'$id'";
				$comma = ', ';
			}
			$db->query("DELETE FROM $table_members WHERE uid IN ($ids)");
			updatecache('settings');
		}
		if(is_array($statusnew)) {
			foreach($statusnew as $id => $val) {
				$passwdadd = $passwdnew[$id] != "" ? ", password='".md5($passwdnew[$id])."'" : NULL;
				$db->query("UPDATE $table_members SET status='$statusnew[$id]', credit='$creditnew[$id]', customstatus='$usercstatus[$id]' $passwdadd WHERE uid='$id'");

				// added by 17camera, written by pk0909
				$mytemp110=array();
				$my_query111=$db->query("SELECT username as uname FROM $table_members where uid='$id'");
				while($mytemp110 = $db->fetch_array($my_query111)){
					$my_temper = AddSlashes($mytemp110['uname']);
					$db->query("DELETE from $table_sessions WHERE username='$my_temper'");
				}
				unset($mytemp110, $my_query111, $my_temper);
				// ended
			}
		}
		cpmsg("符合条件的用户被成功编辑。");
	}

} elseif($action == 'memberprofile') {

	if(!$editsubmit) {

		$username = empty($username) ? $extr : $username;
		$query = $db->query("SELECT * FROM $table_members WHERE username='$username'");
		if($member = $db->fetch_array($query)) {

			$check = array($member[status] => "selected=\"selected\"");
			if($member[showemail]) {
					$emailchecked = "checked=\"checked\"";
			}
			if($member[newsletter]) {
				$newschecked = "checked=\"checked\"";
			}

			$currdate = gmdate("$timeformat");

			$styleselect = "<select name=\"styleidnew\">\n<option value=\"\">--使用默认值--</option>";
			$query = $db->query("SELECT styleid, name FROM $table_styles");
			while($style = $db->fetch_array($query)) {
				$styleselect .= "<option value=\"$style[styleid]\" ".($style['styleid'] == $member['styleid'] ? 'selected="selected"' : NULL).">$style[name]</option>\n";
			}
			$styleselect .= "</select>";

			$bday = explode("-", $member[bday]);
			$member[dateformat] = str_replace("n", "mm", $member[dateformat]);
			$member[dateformat] = str_replace("j", "dd", $member[dateformat]);
			$member[dateformat] = str_replace("y", "yy", $member[dateformat]);
			$member[dateformat] = str_replace("Y", "yyyy", $member[dateformat]);
			$member[timeformat] == "H:i" ? $check24 = "checked=\"checked\"" : $check12 = "checked=\"checked\"";

			$regdate = explode("-", gmdate("Y-n-j", $member[regdate] + ($timeoffset * 3600)));
			$lastvisittime = explode("-", gmdate("Y-n-j", $member[lastvisit] + ($timeoffset * 3600)));
			$username = stripslashes($username);
// the next 2 lines fix edit a special username
?>
<form method="post" action="admincp.php?action=memberprofile&username=<?=rawurlencode($username)?>">
<table cellspacing="0" cellpadding="0" border="0" width="90%" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr><td colspan="2" class="header">编辑个人资料 - 基本项目</td></tr>

<tr><td bgcolor="<?=ALTBG1?>">系统头衔：</td>
<td bgcolor="<?=ALTBG2?>"><select name="statusnew">
<option value="Member">未知头衔</option>
<option value="Admin" <?=$check[Admin]?>>管 理 员</option>
<option value="SuperMod" <?=$check[SuperMod]?>>版主</option>
<option value="Moderator" <?=$check[Moderator]?>>版 &nbsp;&nbsp; 主</option>
<option value="Member" <?=$check[Member]?>>正式会员</option>
<option value="Banned" <?=$check[Banned]?>>禁止访问</option>
<option value="PostBanned" <?=$check[PostBanned]?>>禁止发言</option>
</select></td></tr>

<tr><td bgcolor="<?=ALTBG1?>">用户名：</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="newusername" size="25" value="<?=$member[username]?>"> 如不是特别需要，请不要修改用户名</td></tr>

<tr><td bgcolor="<?=ALTBG1?>">新密码：</td>
<td bgcolor="<?=ALTBG2?>"><input type="password" name="newpassword" size="25"> 请输入新密码，如果不更改密码此处请留空</td></tr>

<tr><td bgcolor="<?=ALTBG1?>" width="21%">Email：</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="emailnew" size="25" value="<?=$member[email]?>"></td></tr>

<tr><td bgcolor="<?=ALTBG1?>" width="21%">积分：</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="creditnew" size="25" value="<?=$member[credit]?>"></td></tr>

<tr><td bgcolor="<?=ALTBG1?>" width="21%">发帖数：</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="userpostnum" size="25" value="<?=$member[postnum]?>"></td></tr>

<tr><td bgcolor="<?=ALTBG1?>" width="21%">注册 IP：</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="regip" size="25" value="<?=$member[regip]?>"></td></tr>

<tr><td bgcolor="<?=ALTBG1?>" width="21%">注册日期：</td>
<td bgcolor="<?=ALTBG2?>">
<input type="text" name="ryear" size="4" value="<?=$regdate[0]?>"> 年 
<input type="text" name="rmonth" size="2" value="<?=$regdate[1]?>"> 月 
<input type="text" name="rday" size="2" value="<?=$regdate[2]?>"> 日 </td></tr>

<tr><td bgcolor="<?=ALTBG1?>" width="21%">上次访问：</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="lyear" size="4" value="<?=$lastvisittime[0]?>"> 年 
<input type="text" name="lmonth" size="2" value="<?=$lastvisittime[1]?>"> 月 
<input type="text" name="lday" size="2" value="<?=$lastvisittime[2]?>"> 日 </td></tr>

<tr><td colspan="2" class="header">编辑个人资料 - 可选项目</td></tr>

<tr><td bgcolor="<?=ALTBG1?>" width="21%">主页：</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="site" size="25" value="<?=$member[site]?>"></td></tr>

<tr><td bgcolor="<?=ALTBG1?>" width="21%">OICQ：</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="oicq" size="25" value="<?=$member[oicq]?>"></td></tr>

<tr><td bgcolor="<?=ALTBG1?>" width="21%">ICQ：</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="icq" size="25" value="<?=$member[icq]?>"></td></tr>

<tr><td bgcolor="<?=ALTBG1?>" width="21%">Yahoo：</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="yahoo" size="25" value="<?=$member[yahoo]?>"></td></tr>

<tr><td bgcolor="<?=ALTBG1?>" width="21%">MSN：</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="msn" size="25" value="<?=$member[msn]?>"/></td></tr>

<tr><td bgcolor="<?=ALTBG1?>" width="21%">来自：</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="memlocation" size="25" value="<?=$member[location]?>"></td></tr>

<tr><td bgcolor="<?=ALTBG1?>">生日：</td>
<td bgcolor="<?=ALTBG2?>">
<input type="text" name="byear" size="4" value="<?=$bday[0]?>"> 年 
<input type="text" name="bmonth" size="2" value="<?=$bday[1]?>"> 月 
<input type="text" name="bday" size="2" value="<?=$bday[2]?>"> 日 </td></tr>

<tr><td bgcolor="<?=ALTBG1?>" width="21%">个人简介：</td>
<td bgcolor="<?=ALTBG2?>"><textarea rows="5" cols="30" name="bio"><?=$member[bio]?></textarea></td></tr>

<tr><td colspan="2" class="header">编辑个人资料 - 论坛个性化设置</td></tr>

<tr><td bgcolor="<?=ALTBG1?>">界面方案：</td>
<td bgcolor="<?=ALTBG2?>"><?=$styleselect?> <?=$currtheme?></td></tr>

<tr><td bgcolor="<?=ALTBG1?>">每页主题数：</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="tppnew" size="4" value="<?=$member[tpp]?>"> </td></tr>

<tr><td bgcolor="<?=ALTBG1?>">每页贴数：</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="pppnew" size="4" value="<?=$member[ppp]?>"> </td></tr>

<tr><td bgcolor="<?=ALTBG1?>">时间格式：</td>
<td bgcolor="<?=ALTBG2?>"><input type="radio" value="24" name="timeformatnew" <?=$check24?>> 24 小时制
<input type="radio" value="12" name="timeformatnew" <?=$check12?>> 12 小时制</td></tr>

<tr><td bgcolor="<?=ALTBG1?>" width="21%">自定义头衔：</td>
<td bgcolor="<?=ALTBG2?>">
<input type="text" name="cstatus" size="25" value="<?=$member[customstatus]?>"></td></tr>

<tr><td bgcolor="<?=ALTBG1?>">日期格式<br>(yyyy/mm/dd，mm/dd/yy 等)：</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="dateformatnew" size="25" value="<?=$member[dateformat]?>"></td></tr>

<tr><td bgcolor="<?=ALTBG1?>">短消息忽略列表：</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="ignorepm" size="25" value="<?=$member[ignorepm]?>"></td></tr>

<tr><td bgcolor="<?=ALTBG1?>">其他选项：</td>
<td bgcolor="<?=ALTBG2?>">
<input type="checkbox" name="showemail" value="1" <?=$emailchecked?>> Email 地址可见<br>
<input type="checkbox" name="newsletter" value="1" <?=$newschecked?>> 允许接收论坛通知 (Email 或短消息)<br>
<input type="text" name="timeoffset1" size="3" value="<?=$member[timeoffset]?>"> 时间较正 (北京时间 +8)，目前GMT标准时间 05:52 AM</td></tr>

<tr><td bgcolor="<?=ALTBG1?>">头像地址：</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="avatarnew" size="25" value="<?=$member[avatar]?>"></td></tr>

<tr><td bgcolor="<?=ALTBG1?>">个人签名：</td>
<td bgcolor="<?=ALTBG2?>"><textarea rows="4" cols="30" name="sig"><?=$member[signature]?></textarea></td></tr>

</table></td></tr></table><br>
<center><input type="submit" name="editsubmit" value="编辑个人资料"></center>
</form><br>
<?

		} else {
			cpmsg("指定用户不存在。");
		}

	} else {

		if($bmonth == "" || $bday == "" || $byear == "") {
			$bday = "";
		} else {
			$bday = "$byear-$bmonth-$bday";
		}

		$regdate = gmmktime(0, 0, 0, $rmonth, $rday, $ryear) - $timeoffset * 3600;
		$lastvisittime = gmmktime(0, 0, 0, $lmonth, $lday, $lyear) - $timeoffset * 3600;
		if($newpassword) {
			$password = md5($newpassword);
			$passwdadd = ", password='$password'";
		}


		$dateformatnew = str_replace("mm", "n", $dateformatnew);
		$dateformatnew = str_replace("dd", "j", $dateformatnew);
		$dateformatnew = str_replace("yyyy", "Y", $dateformatnew);
		$dateformatnew = str_replace("yy", "y", $dateformatnew);
		$timeformatnew = $timeformatnew == "24" ? "H:i" : "h:i A";

		$db->query("UPDATE $table_members SET status='$statusnew', email='$emailnew', credit='$creditnew', postnum='$userpostnum', regip='$regip', regdate='$regdate', lastvisit='$lastvisittime', site='$site', oicq='$oicq', icq='$icq', yahoo='$yahoo', msn='$msn', location='$memlocation', bday='$bday', bio='$bio', styleid='$styleidnew', tpp='$tppnew', ppp='$pppnew', timeformat='$timeformatnew', customstatus='$cstatus', ignorepm='$ignorepm', showemail='$showemail', newsletter='$newsletter', timeoffset='$timeoffset1', avatar='$avatarnew', signature='$sig' $passwdadd WHERE username='$username'");
		$db->query("DELETE from $table_sessions WHERE username='$username'"); //fix: 让对会员的修改及时生效
		if($username != $newusername) {
			$query = $db->query("SELECT COUNT(*) FROM $table_members WHERE username='$newusername'");
			if($db->result($query, 0)) {
				$usernameadd = "但新用户名与现有用户名重复，无法修改。";
			} else {
				$db->query("UPDATE $table_buddys SET username='$newusername' WHERE username='$username'");
				$db->query("UPDATE $table_buddys SET buddyname='$newusername' WHERE buddyname='$username'");
				$db->query("UPDATE $table_favorites SET username='$newusername' WHERE username='$username'");
				$db->query("UPDATE $table_subscriptions SET username='$newusername' WHERE username='$username'");
				$db->query("UPDATE $table_members SET username='$newusername' WHERE username='$username'");
				$db->query("UPDATE $table_posts SET author='$newusername' WHERE author='$username'");
				$db->query("UPDATE $table_threads SET author='$newusername' WHERE author='$username'");
				$db->query("UPDATE $table_threads SET lastposter='$newusername' WHERE lastposter='$username'");
				$db->query("UPDATE $table_forums SET lastpost=REPLACE(lastpost, '\t$username', '\t$newusername')");
				$db->query("UPDATE $table_pm SET msgfrom='$newusername' WHERE msgfrom='$username'");
				$db->query("UPDATE $table_pm SET msgto='$newusername' WHERE msgto='$username'");
			}
		}
		cpmsg("用户资料成功更新。$usernameadd");
	}

} elseif($action == "usergroups") {

	if(!$groupsubmit) {

		if($type != "detail" || !$id) {
			$membergroup = $specifiedgroup = $sysgroup = "";
			$upperlimit = $lowerlimit = $misconfig = 0;
			$query = $db->query("SELECT groupid, specifiedusers, status, grouptitle, creditshigher, creditslower, stars, groupavatar FROM $table_usergroups ORDER BY creditslower");
			while($group = $db->fetch_array($query)) {
				if($group[status] == "Member" && !$group[specifiedusers]) {
					$membergroup .= "<tr align=\"center\"><td bgcolor=\"".ALTBG1."\"><input type=\"checkbox\" name=\"delete[{$group[groupid]}]\" value=\"$group[groupid]\"></td>\n".
						"<td bgcolor=\"".ALTBG2."\"><input type=\"text\" size=\"12\" name=\"group_title[{$group[groupid]}]\" value=\"$group[grouptitle]\"></td>\n".
						"<td bgcolor=\"".ALTBG1."\"><input type=\"text\" size=\"6\" name=\"group_creditshigher[{$group[groupid]}]\" value=\"$group[creditshigher]\">\n".
						"<td bgcolor=\"".ALTBG2."\"><input type=\"text\" size=\"6\" name=\"group_creditslower[{$group[groupid]}]\" value=\"$group[creditslower]\"></td>\n".
						"<td bgcolor=\"".ALTBG1."\"><input type=\"text\" size=\"2\"name=\"group_stars[{$group[groupid]}]\" value=\"$group[stars]\"></td>\n".
						"<td bgcolor=\"".ALTBG2."\"><input type=\"text\" size=\"20\" name=\"group_avatar[{$group[groupid]}]\" value=\"$group[groupavatar]\"></td>".
						"<td bgcolor=\"".ALTBG1."\"><a href=\"admincp.php?action=usergroups&type=detail&id=$group[groupid]\">[详情]</a></td></tr>\n";
					if($group[creditshigher] > 0 && $upperlimit != $group[creditshigher]) {
						//echo "$upperlimit $group[creditshigher]<br>"; //debug
						$misconfig = 1;
					}
					$lowerlimit = $group[creditshigher] < $lowerlimit ? $group[creditshigher] : $lowerlimit;
					$upperlimit = $group[creditslower] > $upperlimit ? $group[creditslower] : $upperlimit;
				} elseif($group[specifiedusers]) {
					$group[specifiedusers] = str_replace("\t", ", ", substr($group[specifiedusers], 1, -1));
					$specifiedgroup .= "<tr align=\"center\"><td bgcolor=\"".ALTBG1."\"><input type=\"checkbox\" name=\"delete[{$group[groupid]}]\" value=\"$group[groupid]\"></td>\n".
						"<td bgcolor=\"".ALTBG2."\"><input type=\"text\" size=\"12\" name=\"group_title[{$group[groupid]}]\" value=\"$group[grouptitle]\"></td>\n".
						"<td bgcolor=\"".ALTBG1."\"><input type=\"text\" size=\"20\" name=\"group_specifiedusers[{$group[groupid]}]\" value=\"$group[specifiedusers]\">\n".
						"<td bgcolor=\"".ALTBG2."\"><input type=\"text\" size=\"2\"name=\"group_stars[{$group[groupid]}]\" value=\"$group[stars]\"></td>\n".
						"<td bgcolor=\"".ALTBG1."\"><input type=\"text\" size=\"20\" name=\"group_avatar[{$group[groupid]}]\" value=\"$group[groupavatar]\"></td>\n".
						"<td bgcolor=\"".ALTBG2."\"><a href=\"admincp.php?action=usergroups&type=detail&id=$group[groupid]\">[详情]</a></td></tr>\n";
				} else {
					$sysgroup .= "<tr align=\"center\">\n".
						"<td bgcolor=\"".ALTBG2."\"><input type=\"text\" size=\"12\" name=\"group_title[{$group[groupid]}]\" value=\"$group[grouptitle]\"></td>\n".
						"<td bgcolor=\"".ALTBG1."\">$group[status]</td>\n".
						"<td bgcolor=\"".ALTBG2."\"><input type=\"text\" size=\"2\"name=\"group_stars[{$group[groupid]}]\" value=\"$group[stars]\"></td>\n".
						"<td bgcolor=\"".ALTBG1."\"><input type=\"text\" size=\"20\" name=\"group_avatar[{$group[groupid]}]\" value=\"$group[groupavatar]\"></td>\n".
						"<td bgcolor=\"".ALTBG2."\"><a href=\"admincp.php?action=usergroups&type=detail&id=$group[groupid]\">[详情]</a></td></tr>\n";
				}
			}
			if($misconfig || $upperlimit < 9999 || $lowerlimit > -999) {
				$warning = "<script>alert('当前积分设定存在明显问题，请根据提示尽快修正。');</script><span class=\"mediumtxt\"><b>警告！</b>您当前的设定并未覆盖整个积分范围(建议 -99999 到 99999)，或相邻两组间积分上下限存在<br>空隙或重叠。请立即完善会员组设定或恢复到默认，否则将导致部分用户无法访问论坛的严重问题！</span><br><br>";
			}

?>
<table cellspacing="0" cellpadding="0" border="0" width="95%" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header"><td>特别提示</td></tr>
<tr bgcolor="<?=ALTBG1?>"><td>
<br><ul><li>17camera! 论坛的用户组分为系统组、特殊组和会员组，区别在于确定所在用户组的方式：系统组按照用户的系统头衔确定；特殊组按照指定的特别用户名确定；会员组按照会员的积分来确定。每个组可以分别设置相应的权限。</ul>
<ul><li>系统组和特殊组的设定不需要指定积分，17camera! 预留了从论坛管理员到游客等的 8 个系统头衔，特殊组的多个用户名之间可用半角逗号 "," 分割。</ul>
<ul><li>会员组积分设定的总体范围必须能满足实际的要求，如 -99999 到 99999，而且，不同的组之间积分范围不要出现重叠，否则将出现混乱。</ul>
<ul><li>如果您不小心误操作，导致问题，可点击“恢复默认”按钮将设定恢复到初始状态。</ul>
</td></tr></table></td></tr></table>

<form method="post" action="admincp.php?action=usergroups&type=member">
<table cellspacing="0" cellpadding="0" border="0" width="95%" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header"><td colspan="7">会员用户组 - 点击组头衔编辑详细权限设置</td></tr>
<tr class="header" align="center"><td width="45"><input type="checkbox" name="chkall" class="header" onclick="checkall(this.form)">删?</td>
<td>组头衔</td><td>积分下限</td><td>积分上限</td><td>星星数</td><td>组头像</td><td>编辑</td></tr>
<?=$membergroup?>
<tr height="1" bgcolor="<?=ALTBG2?>"><td colspan="7"></td></tr>
<tr align="center" bgcolor="<?=ALTBG1?>"><td>新增：</td>
<td><input type="text" size="12" name="grouptitlenew"></td>
<td><input type="text" size="6" name="creditshighernew"></td>
<td><input type="text" size="6" name="creditslowernew"></td>
<td><input type="text" size="2" name="starsnew"></td>
<td><input type="text" size="20" name="groupavatarnew"></td>
<td>&nbsp;</td>
</tr></table></td></tr></table><br><center><?=$warning?>
<input type="submit" name="groupsubmit" value="编辑会员用户组">&nbsp;
<input type="button" name="reset" value="恢复到默认设定" onClick="top.main.location.href='admincp.php?action=usergroups&type=member&reset=yes&groupsubmit=yes';"></center></form><br><br>

<form method="post" action="admincp.php?action=usergroups&type=specified">
<table cellspacing="0" cellpadding="0" border="0" width="95%" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header"><td colspan="6">特殊用户组 - 点击组头衔编辑详细权限设置</td></tr>
<tr class="header" align="center"><td width="45"><input type="checkbox" name="chkall" class="header" onclick="checkall(this.form)">删?</td>
<td>组头衔</td><td>包含用户</td><td>星星数</td><td>组头像</td><td>编辑</td></tr>
<?=$specifiedgroup?>
<tr height="1" bgcolor="<?=ALTBG2?>"><td colspan="6"></td></tr>
<tr align="center" bgcolor="<?=ALTBG1?>"><td>新增：</td>
<td><input type="text" size="12" name="grouptitlenew"></td>
<td><input type="text" size="20" name="specifiedusersnew"></td>
<td><input type="text" size="2" name="starsnew"></td>
<td><input type="text" size="20" name="groupavatarnew"></td>
<td>&nbsp;</td>
</tr></table></td></tr></table><br><center>
<input type="submit" name="groupsubmit" value="编辑特殊用户组"></center></form><br><br>

<form method="post" action="admincp.php?action=usergroups&type=system">
<table cellspacing="0" cellpadding="0" border="0" width="95%" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header"><td colspan="5">系统用户组 - 点击组头衔编辑详细权限设置</td></tr>
<tr class="header" align="center">
<td>组头衔</td><td>系统头衔</td><td>星星数</td><td>组头像</td><td>编辑</td></tr>
<?=$sysgroup?>
</table></td></tr></table><br><center>
<input type="submit" name="groupsubmit" value="编辑系统用户组"></center></form>
<?

		} else {

			if(!$detailsubmit) {
				$query = $db->query("SELECT * FROM $table_usergroups WHERE groupid='$id'");
				$group = $db->fetch_array($query);
				$checksearch = array($group['allowsearch'] => 'checked');
				$checkavatar = array($group['allowavatar'] => 'checked');

				echo "<form method=\"post\" action=\"admincp.php?action=usergroups&type=detail&id=$id\">\n";

				showtype("编辑用户组", "top");
				showsetting("用户组头衔", "grouptitlenew", $group[grouptitle], "text");

				showtype("基本权限");
				if($group[status] == "Guest") {
					echo "<input type=\"hidden\" name=\"allowvisitnew\" value=\"1\">\n";
				} else {
					showsetting("允许访问论坛：", "allowvisitnew", $group[allowvisit], "radio", "选择“否”将彻底禁止用户访问论坛的任何页面");
				}
				showsetting("允许浏览贴子：", "allowviewnew", $group[allowview], "radio", "设置是否允许浏览没有设置特殊权限的一般贴子");
				showsetting("允许查看统计数据：", "allowviewstatsnew", $group[allowviewstats], "radio", "设置是否允许用户查看论坛统计数据");
				showsetting("允许使用搜索：", '', '', "<input type=\"radio\" name=\"allowsearchnew\" value=\"0\" $checksearch[0]> 禁用搜索<br><input type=\"radio\" name=\"allowsearchnew\" value=\"1\" $checksearch[1]> 只允许搜索标题<br><input type=\"radio\" name=\"allowsearchnew\" value=\"2\" $checksearch[2]> 允许搜索贴子内容", "设置是否允许论坛贴子搜索功能");
				showsetting("允许使用头像：", '', '', "<input type=\"radio\" name=\"allowavatarnew\" value=\"0\" $checkavatar[0]> 禁用头像<br><input type=\"radio\" name=\"allowavatarnew\" value=\"1\" $checkavatar[1]> 允许使用论坛提供头像<br><input type=\"radio\" name=\"allowavatarnew\" value=\"2\" $checkavatar[2]> 允许自定义头像", "设置是否允许使用头像和可用头像的类型");
				showsetting("允许自定义头衔：", "allowcstatusnew", $group[allowcstatus], "radio", "设置是否允许用户设置自己的头衔名字并在贴子中显示");
				showsetting("允许参与评分：", "allowkarmanew", $group[allowkarma], "radio", "设置是否可以给别人的贴子评分");
				showsetting("每次最大评价分数：", "maxkarmaratenew", $group[maxkarmarate], "text", "设置每次评分允许的最大分数，需要拥有参与评分的权限才有效");
				showsetting("每天最大评价分数：", "maxrateperdaynew", $group[maxrateperday], "text", "设置每 24 小时允许评分的最大分数，需要拥有参与评分的权限才有效");
				showsetting("短消息收件箱容量：", "maxpmnumnew", $group[maxpmnum], "text", "设置用户短消息最大可保存的消息数目");
				showsetting("备忘录容量：", "maxmemonumnew", $group[maxmemonum], "text", "设置用户备忘录最大可保存的数目，如为 0 则禁止用户使用");

				showtype("贴子相关");
				showsetting("允许发贴：", "allowpostnew", $group[allowpost], "radio", "设置是否允许发新话题或发表回复");
				showsetting("允许设置贴子权限：", "allowsetviewpermnew", $group[allowsetviewperm], "radio", "设置是否允许设置贴子需要指定积分以上才可浏览");
				showsetting("允许发起投票：", "allowpostpollnew", $group[allowpostpoll], "radio", "设置是否允许发布投票贴");
				showsetting("允许参与投票：", "allowvotenew", $group[allowvote], "radio", "设置是否允许参与论坛的投票");
				showsetting("允许签名中使用 BB 代码：", "allowsigbbcodenew", $group[allowsigbbcode], "radio", "设置是否解析用户签名中的 BB 代码");
				showsetting("允许签名中使用 [img] 代码：", "allowsigimgcodenew", $group[allowsigimgcode], "radio", "设置是否解析用户签名中的 [img] 代码");
				showsetting("最大签名长度：", "maxsigsizenew", $group[maxsigsize], "text", "设置用户签名最大字节数");

				showtype("附件相关");
				showsetting("允许下载附件：", "allowgetattachnew", $group[allowgetattach], "radio", "设置是否允许从没有设置特殊权限的论坛中下载附件");
				showsetting("允许发布附件：", "allowpostattachnew", $group[allowpostattach], "radio", "设置是否允许上传附件到没有设置特殊权限的论坛中。需要 PHP 设置允许才有效，请参考系统设置首页");
				showsetting("允许设置附件权限：", "allowsetattachpermnew", $group[allowsetattachperm], "radio", "设置是否允许设置附件需要指定积分以上才可下载");
				showsetting("最大附件尺寸：", "maxattachsizenew", $group[maxattachsize], "text", "设置附件最大字节数，需要 PHP 设置允许才有效，请参考系统设置首页");
				showsetting("允许附件类型：", "attachextensionsnew", $group[attachextensions], "text", "设置允许上传的附件扩展名，多个扩版名之间用半角逗号 \",\" 分割");

				showtype("管理权限");
				showsetting("拥有版主权限：", "ismoderatornew", $group[ismoderator], "radio", "设置是否拥有版主权限");
				showsetting("拥有版主权限：", "issupermodnew", $group[issupermod], "radio", "设置是否拥有版主权限");
				showsetting("拥有管理员权限：", "isadminnew", $group[isadmin], "radio", "设置是否拥有管理员权限");

				showtype("", "bottom");

				echo "<br><center><input type=\"submit\" name=\"detailsubmit\" value=\"更新权限设置\"><center></form>";

			} else {

				if($isadminnew) {
					$ismoderatornew = $issupermodnew = 1;
				} elseif($issupermodnew) {
					$ismoderatornew = 1;
				}
				$db->query("UPDATE $table_usergroups SET grouptitle='$grouptitlenew', allowvisit='$allowvisitnew',
					allowview='$allowviewnew', allowviewstats='$allowviewstatsnew', allowsearch='$allowsearchnew',
					allowavatar='$allowavatarnew', allowcstatus='$allowcstatusnew', allowkarma='$allowkarmanew',
					maxkarmarate='$maxkarmaratenew', maxrateperday='$maxrateperdaynew', maxpmnum='$maxpmnumnew', allowpost='$allowpostnew',
					maxmemonum='$maxmemonumnew', allowsetviewperm='$allowsetviewpermnew', allowpostpoll='$allowpostpollnew',
					allowvote='$allowvotenew', allowsigbbcode='$allowsigbbcodenew', allowsigimgcode='$allowsigimgcodenew',
					maxsigsize='$maxsigsizenew', allowgetattach='$allowgetattachnew',
					allowpostattach='$allowpostattachnew', allowsetattachperm='$allowsetattachpermnew',
					maxattachsize='$maxattachsizenew', attachextensions='$attachextensionsnew',
					ismoderator='$ismoderatornew', issupermod='$issupermodnew', isadmin='$isadminnew' WHERE groupid='$id'");

				updatecache("usergroups");
				cpmsg("用户组权限设置成功更新。");

			}

		}

	} else {

		if($type == "member") {
			if($reset != "yes") {
				if($grouptitlenew && ($creditshighernew || $creditslowernew)) {
					$db->query("INSERT INTO $table_usergroups (grouptitle, status, creditshigher, creditslower, stars, groupavatar, allowvisit, allowview, allowpost, allowsigbbcode)
						VALUES ('$grouptitlenew', 'Member', '$creditshighernew', '$creditslowernew', '$starsnew', '$groupavatarnew', '1', '1', '1', '1')");
				}
				if(is_array($group_title)) {
					$ids = $comma = "";
					foreach($group_title as $id => $title) {
						if($delete[$id]) {
							$ids .= "$comma'$id'";
							$comma = ', ';
						} else {
							$db->query("UPDATE $table_usergroups SET grouptitle='$group_title[$id]', creditshigher='$group_creditshigher[$id]', creditslower='$group_creditslower[$id]', stars='$group_stars[$id]', groupavatar='$group_avatar[$id]' WHERE groupid='$id'");
						}
					}
				}
				if($ids) {
					$db->query("DELETE FROM $table_usergroups WHERE groupid IN ($ids)");
				}
			} else {
				if(!$confirmed) {
					cpmsg("本操作不可恢复，您确定要清除现有<br>记录并把用户组设定恢复默认吗？", "admincp.php?action=usergroups&type=member&reset=yes&groupsubmit=yes", "form");
				} else {
					$db->query("DELETE FROM $table_usergroups WHERE status='Member' AND specifiedusers=''");
//fix some error when the admin use a table not cdb_
					$groupreset =
<<<EOT
INSERT INTO $table_usergroups VALUES ('', '', 'Member', 'Newbie', 0, 50, 1, '', 0, 0, 1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 20, 0, 80, 0, 0, 0, '');
INSERT INTO $table_usergroups VALUES ('', '', 'Member', 'Member', 50, 200, 2, '', 0, 1, 1, 1, 1, 1, 1, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 30, 0, 100, 4, 10, 0, '');
INSERT INTO $table_usergroups VALUES ('', '', 'Member', 'Conqueror', 200, 500, 3, '', 0, 2, 1, 1, 1, 1, 1, 0, 1, 2, 0, 0, 0, 1, 0, 1, 0, 0, 0, 50, 0, 150, 6, 15, 256000, 'gif,jpg,png');
INSERT INTO $table_usergroups VALUES ('', '', 'Member', 'Lord', 500, 1000, 4, '', 1, 2, 1, 1, 1, 1, 1, 1, 1, 2, 1, 0, 0, 1, 0, 1, 0, 0, 0, 60, 0, 200, 10, 30, 512000, 'zip,rar,chm,txt,gif,jpg,png');
INSERT INTO $table_usergroups VALUES ('', '', 'Member', 'King', 1000, 3000, 6, '', 1, 2, 1, 1, 1, 1, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, 0, 0, 0, 80, 0, 300, 15, 40, 1024000, '');
INSERT INTO $table_usergroups VALUES ('', '', 'Member', 'Forum Legend', 3000, 9999999, 8, '', 1, 2, 1, 1, 1, 1, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, 0, 0, 0, 100, 0, 500, 20, 50, 2048000, '');
INSERT INTO $table_usergroups VALUES ('', '', 'Member', 'Beggar', -9999999, 0, 0, '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '');
EOT;

					$sqlquery = splitsql($groupreset);
					foreach($sqlquery as $sql) {
						$db->query($sql);
					}

					updatecache("usergroups");
					cpmsg("用户会员组成功恢复。");
				}
			}
		} elseif($type == "specified") {
			if($specifiedusersnew) {
				$specified = trim($specifiedusersnew);
				$comma = ", ";
			} else {
				$specified = $comma = "";
			}
			if(is_array($group_specifiedusers)) {
				foreach($group_specifiedusers as $user) {
					$specified .= $comma.trim($user);
					$comma = ", ";
				}
			}
			$admins = $comma = "";
			$specified = "'".str_replace(",", "', '", str_replace(" ", "", $specified))."'";
			$query = $db->query("SELECT username FROM $table_members WHERE username IN ($specified) AND (status='Admin' OR status='SuperMod' OR status='Moderator')");
			while($member = $db->fetch_array($query)) {
				$admins .= "$comma$member[username]";
				$comma = ", ";
			}
			if($admins) {
				cpmsg("对不起，特殊用户组中包含管理员或版主($admins)，这可能造成管理权限的丢失，您可以通过其他设置方式达到所需的权限设定，请返回修改。");
			}

			if($grouptitlenew && $specifiedusersnew) {
				$specifiedusersnew = "\t".str_replace(",", "\t", str_replace(" ", "", $specifiedusersnew))."\t";
				$db->query("INSERT INTO $table_usergroups (grouptitle, specifiedusers, status, stars, groupavatar, allowvisit, allowview, allowpost, allowsigbbcode)
					VALUES ('$grouptitlenew', '$specifiedusersnew', 'Member', '$starsnew', '$groupavatarnew', '1', '1', '1', '1')");
			}
			if(is_array($group_title)) {
				$ids = $comma = "";
				foreach($group_title as $id => $title) {
					if($delete[$id]) {
						$ids .= "$comma'$id'";
						$comma = ", ";
					} else {
						$group_specifiedusers[$id] = "\t".str_replace(",", "\t", str_replace(" ", "", $group_specifiedusers[$id]))."\t";
						$db->query("UPDATE $table_usergroups SET grouptitle='$group_title[$id]', specifiedusers='$group_specifiedusers[$id]', stars='$group_stars[$id]', groupavatar='$group_avatar[$id]' WHERE groupid='$id'");
					}
				}
			}
			if($ids) {
				$db->query("DELETE FROM $table_usergroups WHERE groupid IN ($ids)");
			}
		} elseif($type == "system") {
			if(is_array($group_title)) {
				foreach($group_title as $id => $title) {
					$db->query("UPDATE $table_usergroups SET grouptitle='$group_title[$id]', stars='$group_stars[$id]', groupavatar='$group_avatar[$id]' WHERE groupid='$id'");
				}
			}
		}

		updatecache("usergroups");
		cpmsg("用户组成功更新。如您添加了新的用户组，<br>请不要忘记修改其相应的权限设置");
	}

} elseif($action == 'ipban') {

	if(!$ipbansubmit) {

		require $discuz_root.'./include/misc.php';

		$iptoban = explode('.', $extr);

		$ipbanned = '';
		$query = $db->query("SELECT * FROM $table_banned ORDER BY dateline");
		while($banned = $db->fetch_array($query)) {
			for($i = 1; $i <= 4; $i++) {
				if ($banned["ip$i"] == -1) {
					$banned["ip$i"] = '*';
				}
			}
			$ipdate = gmdate("$dateformat $timeformat", $banned[dateline] + $timeoffset * 3600);
			$theip = "$banned[ip1].$banned[ip2].$banned[ip3].$banned[ip4]";
			$ipbanned .= "<tr align=\"center\">\n".
				"<td bgcolor=\"".ALTBG1."\"><input type=\"checkbox\" name=\"delete[".$banned[id]."]\" value=\"$banned[id]\"></td>\n".
				"<td bgcolor=\"".ALTBG2."\">$theip</td>\n".
				"<td bgcolor=\"".ALTBG1."\">".convertip($theip, "./")."</td>\n".
				"<td bgcolor=\"".ALTBG2."\">$banned[admin]</td>\n".
				"<td bgcolor=\"".ALTBG1."\">$ipdate</td></tr>\n";
		}

?>
<table cellspacing="0" cellpadding="0" border="0" width="75%" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header"><td>特别提示</td></tr>
<tr bgcolor="<?=ALTBG1?>"><td>
<br><ul><li>您的 IP 地址为：<?=$onlineip?></ul>
<ul><li>要禁止某地址段，请在下面地址中该部分用“*”代替。</ul>
</td></tr></table></td></tr></table>

<form method="post" action="admincp.php?action=ipban">
<table cellspacing="0" cellpadding="0" border="0" width="75%" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header" align="center">
<td width="45"><input type="checkbox" name="chkall" class="header" onclick="checkall(this.form)">删?</td>
<td>IP 地址</td><td>地理位置</td><td>管理员</td><td>加入时间</td></tr>
<?=$ipbanned?>
<tr bgcolor="<?=ALTBG2?>"><td colspan="5" height="1"></td></tr>
<tr bgcolor="<?=ALTBG1?>">
<td colspan="5">禁止新 IP：<b>
<input type="text" name="ip1new" value="<?=$iptoban[0]?>" size="3" maxlength="3"> . 
<input type="text" name="ip2new" value="<?=$iptoban[1]?>" size="3" maxlength="3"> . 
<input type="text" name="ip3new" value="<?=$iptoban[2]?>" size="3" maxlength="3"> . 
<input type="text" name="ip4new" value="<?=$iptoban[3]?>" size="3" maxlength="3"></b></td>
</tr></table></td></tr></table><br>
<center><input type="submit" name="ipbansubmit" value="更新 IP 禁止列表"></center>
</form>
<?

	} else {

		if($ip1new != '' && $ip2new != '' && $ip3new != '' && $ip4new != '') {
			$own = 0;
			$ip = explode('.', $onlineip);
			for($i = 1; $i <= 4; $i++) {
				if(!is_numeric(${'ip'.$i.'new'})) {
					${'ip'.$i.'new'} = -1;
					$own++;
				} elseif(${'ip'.$i.'new'} == $ip[$i - 1]) {
					$own++;
				}
				${'ip'.$i.'new'} = intval(${'ip'.$i.'new'});
			}

			if($own == 4) {
				cpmsg('操作错误！您自己的 IP 已经存在于禁止列表中，请返回修改。');
			}

			$query = $db->query("SELECT * FROM $table_banned");
			while($banned = $db->fetch_array($query)) {
				$exists = 0;
				for($i = 1; $i <= 4; $i++) {
					if($banned["ip$i"] == -1) {
						$exists++;
					} elseif($banned["ip$i"] == ${"ip".$i."new"}) {
						$exists++;
					}
				}
				if($exists == 4) {
					cpmsg("新的禁止 IP 已经存在于列表中，请返回。");
				}
			}

			$db->query("DELETE FROM $table_sessions WHERE ip LIKE '".str_replace('-1', '%', "$ip1new.$ip2new.$ip3new.$ip4new")."'");
			$db->query("INSERT INTO $table_banned (ip1, ip2, ip3, ip4, admin, dateline)
				VALUES ('$ip1new', '$ip2new', '$ip3new', '$ip4new', '$discuz_user', '$timestamp')");

		}

		$ids = $comma = '';
		if(is_array($delete)) {
			foreach($delete as $id) {
				$ids .= "$comma'$id'";
				$comma = ', ';
			}
		}
		if($ids) {
			$db->query("DELETE FROM $table_banned WHERE id IN ($ids)");
		}

		cpmsg('IP 禁止列表成功更新。');
	}
	
}

?>