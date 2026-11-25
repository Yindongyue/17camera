<?php

/*
	[17camera!] logging.php - login and logout
	This is NOT a freeware, use is subject to license terms

	Version: 2.2.0
	Author: 17camera (master@17camera.com)
	Copyright: 17camera Studio (www.17camera.com)
	Last Modified: 2002/12/6 17:00
*/

require './include/common.php';

if($action == 'logout') {

	clearcookies();
	$discuz_user = $discuz_pw = '';
	$status = 'Guest';
	$groupid = 1;
	$styleid = $_DCACHE['settings']['styleid'];

	showmessage('logout_succeed', $referer ? $referer : 'index.php');

} elseif($action == 'login') {

	if(!$loginsubmit) {

		$discuz_action = 6;
		$styleselect = '';
		$query = $db->query("SELECT styleid, name FROM $table_styles WHERE available='1'");
		while($styleinfo = $db->fetch_array($query)) {
			$styleselect .= "<option value=\"$styleinfo[styleid]\">$styleinfo[name]</option>\n";
		}

		switch($HTTP_COOKIE_VARS['_cookietime']) {
			case '31536000': $year_checked = 'checked'; break;
			case '86400': $day_checked = 'checked'; break;
			case '3600': $hour_checked = 'checked'; break;
			case '0': $task_checked = 'checked'; break;
			default: $month_checked = "checked";
		}

		include template('login');

	} else {

		$discuz_user = $discuz_pw = '';
		if( !$referer || stristr($referer, 'logging.php')) $referer='index.php';	// fix:避免重复登陆信息
		$errorlog = "$username\t".substr($password, 0, 2);
		for($i = 3; $i < strlen($password); $i++) {
			$errorlog .= "*";
		}
		$errorlog .= substr($password, -1)."\t$onlineip\t$timestamp\n";
		$password = md5($password);

		//
		//以下是我添加的部分
		//
		//首先在数据库查找到该用户的密码
		$query=$db->query("SELECT password FROM $table_members WHERE username='$username'");
		//取得字段
		$men=$db->fetch_array($query);
		//获得密码,到manpwd
		$men_pwd=$men['password'];				  
		//如果是16位的,则进行转换
		if(strlen($men_pwd)==16){
			//用户输入的md5备份
			$check_pwd=$password;
			//获取32位密码的中间16位(32位和16位密码的中间是相同的)
			$check_pwd=substr($password,8,16);
			//如果相等,就说明密码正确,同时,更新数据库,变为新密码(32位)
			if($men_pwd==$check_pwd){
				$db->query("UPDATE	$table_members SET password='$password' WHERE username='$username'");
			}
		}
		//
		//添加的到这里为止,数据库中的密码已经改成32位
		//

		$query = $db->query("SELECT m.username as discuz_user, m.password as discuz_pw, m.status, m.styleid AS styleidmem, m.lastvisit, u.groupid, u.isadmin, u.specifiedusers LIKE '%\t".addcslashes($username, '%_')."\t%' AS specifieduser
					FROM $table_members m LEFT JOIN $table_usergroups u ON u.specifiedusers LIKE '%\t".addcslashes($username, '%_')."\t%' OR (u.status=m.status AND ((u.creditshigher='0' AND u.creditslower='0' AND u.specifiedusers='') OR (m.credit>=u.creditshigher AND m.credit<u.creditslower)))
					WHERE username='$username' AND password='$password' ORDER BY specifieduser DESC");
		@extract($db->fetch_array($query));
		$discuz_user = addslashes($discuz_user);
		$discuz_userss = stripslashes($discuz_user);

		if($bbclosed && !$isadmin) {
			showmessage($closedreason ? $closedreason : 'Sorry, this forum is temporarily closed.');
		}

		if(!$discuz_user) {
			@$fp = fopen($discuz_root.'./forumdata/illegallog.php', 'a');
			@flock($fp, 3);
			@fwrite($fp, $errorlog);
			@fclose($fp);
			showmessage('login_invalid', 'index.php');
		} else {
			$styleid = empty($HTTP_POST_VARS['styleid']) ? ($styleidmem ? $styleidmem :
					$_DCACHE['settings']['styleid']) : $HTTP_POST_VARS['styleid'];
			
			$_cookietime = isset($HTTP_POST_VARS['cookietime']) ? $HTTP_POST_VARS['cookietime'] :
					($HTTP_COOKIE_VARS['_cookietime'] ? $HTTP_COOKIE_VARS['_cookietime'] : 0);
			$cookietime = empty($_cookietime) ? 0 : $timestamp + $_cookietime;
			setcookie('_cookietime', $_cookietime, $timestamp + 31536000, $cookiepath, $cookiedomain);
			setcookie('_discuz_user', $discuz_user, $cookietime, $cookiepath, $cookiedomain);
			setcookie('_discuz_pw', $discuz_pw, $cookietime, $cookiepath, $cookiedomain);
			setcookie('lastvisit', $lastvisit, $timestamp + 3600, $cookiepath, $cookiedomain);

			//fix: 避免相同用户名出现在论坛在线名单
			$db->query("DELETE FROM $table_sessions WHERE username='$discuz_user'");
			$sessionupdated=0;

			showmessage('login_succeed', $referer);
		}

	}

}

?>