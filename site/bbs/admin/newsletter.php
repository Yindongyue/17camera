<?php

/*
	[17camera!] admin/newsletter.php - send board newsletter by P.M. or email
	This is NOT a freeware, use is subject to license terms

	Version: 1.9.9
	Author: 17camera (master@17camera.com)
	Copyright: 17camera Studio (www.17camera.com)
	Last Modified: 2003/1/1 8:06
*/


if(!defined("IN_DISCUZ")) {
        exit("Access Denied");
}

cpheader();

if(!$newslettersubmit) {

?>
<br><br><form method="post" action="admincp.php?action=newsletter">
<table cellspacing="0" cellpadding="0" border="0" width="550" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header"><td colspan="2">论坛通知</td></tr>

<tr>
<td bgcolor="<?=ALTBG1?>">收件人：</td><td bgcolor="<?=ALTBG2?>">
<select name="nlstatus">
<option value="All">全部用户</option>
<option value="online">在线用户</option>
<option value="Moderator">版主</option>
<option value="SuperMod">版主</option>
<option value="Admin">Admin</option>
</select></td></tr>

<tr>
<td bgcolor="<?=ALTBG1?>">主题：</td><td bgcolor="<?=ALTBG2?>"><input type="text" name="newssubject" size="70"></td></tr>

<tr>
<td bgcolor="<?=ALTBG1?>" valign="top">内容：</td><td bgcolor="<?=ALTBG2?>">
<textarea cols="70" rows="10" name="newsmessage"></textarea></td></tr>

<tr>
<td bgcolor="<?=ALTBG1?>">通过：</td><td bgcolor="<?=ALTBG2?>"><input type="radio" value="email" checked name="sendvia"> Email
<input type="radio" value="pm" checked name="sendvia"> 短消息</td></tr>

</table></td></tr></table><br>
<center><input type="submit" name="newslettersubmit" value="发送通知"></center>
</form>
<?

} else {

	if($newssubject && $newsmessage) {
		$newssubject = "[17camera!] ".$newssubject;
		if($nlstatus == "All") {
			$query = $db->query("SELECT username, email FROM $table_members WHERE newsletter='1'");
		} elseif($nlstatus == "online") {
			$query = $db->query("SELECT m.username, m.email FROM $table_members m, $table_sessions s WHERE s.username<>'' AND m.username=s.username AND m.newsletter='1'");
		} else {
			$query = $db->query("SELECT username, email FROM $table_members WHERE newsletter='1' AND status='$nlstatus'");
		}

		$emails = $sendto = $comma = '';
		while($memnews = $db->fetch_array($query)) {
			if($sendvia == 'pm') {
				$memnews[username]=addslashes($memnews[username]);   //fix:特殊用户名进行处理
				$sendto .= "$comma'$memnews[username]'";
				$comma = ", ";
				$db->query("INSERT INTO $table_pm (msgto, msgfrom, folder, new, subject, dateline, message)
					VALUES('$memnews[username]', '$discuz_user', 'inbox', '1', '$newssubject', '$timestamp', '$newsmessage')"); 
			} else {
				$emails .= $comma.$memnews[email];
				$comma = ',';
			}
		}
		if($sendvia == "email") {
			sendmail($emails, $newssubject, $newsmessage);
			cpmsg("论坛通知成功发送。");
		} else {
			if($sendto) {
				$db->query("UPDATE $table_members SET newpm='1' WHERE username IN ($sendto)");
			}
			cpmsg("论坛通知成功发送。");
		}
	} else {
		cpmsg("您没有输入消息的标题或内容，请返回修改。");
	}

}

?>