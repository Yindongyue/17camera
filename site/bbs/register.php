<?php

/*
	[17camera!] register.php - new member registration
	This is NOT a freeware, use is subject to license terms

	Version: 2.2.0
	Author: 17camera (master@17camera.com)
	Copyright: 17camera Studio (www.17camera.com)
	Last Modified: 2002/12/6 17:00
*/

require './include/common.php';

$discuz_action = 5;

if(!$regstatus) {
	showmessage('register_disable');
}

$query = $db->query("SELECT censoruser, doublee, bbrules, bbrulestxt, welcommsg, welcommsgtxt FROM $table_settings");
extract($db->fetch_array($query), EXTR_OVERWRITE);

$query = $db->query("SELECT allowcstatus, allowavatar FROM $table_usergroups WHERE creditshigher<=0 AND 0<creditslower");
$groupinfo = $db->fetch_array($query);

if(!$regsubmit) {

	if($bbrules && !$rulesubmit) {
		$bbrulestxt = nl2br("\n".$bbrulestxt."\n\n");
	} else {
		$styleselect = $dayselect = '';
		$query = $db->query("SELECT styleid, name FROM $table_styles WHERE available='1'");
		while($styleinfo = $db->fetch_array($query)) {
			$styleselect .= '<option value="'.$styleinfo['styleid'].'">'.$styleinfo['name'].'</option>'."\n";
		}

		for($num = 1; $num <= 31; $num++) {
			$dayselect .= '<option value="'.$num.'">'.$num.'</option>';
		}

		$bbcodeis = $allowsigbbcode ? 'On' : 'Off';
		$imgcodeis = $allowsigimgcode ? 'On' : 'Off';
		$currtime = gmdate($timeformat);

		$dateformatorig = $dateformat;
		$dateformatorig = str_replace('n', 'mm', $dateformatorig);
		$dateformatorig = str_replace('j', 'dd', $dateformatorig);
		$dateformatorig = str_replace('y', 'yy', $dateformatorig);
		$dateformatorig = str_replace('Y', 'yyyy', $dateformatorig);

	}

	include template('register');

} else {

	$referer = $referer ? $referer : 'index.php';

	$email = trim($email);
	if(!$doublee && strstr($email, '@')) {
		$emailadd = "OR email='$email'";
	}

	$username = trim($username);

	if(strlen($username) > 15) {
		showmessage('profile_username_toolang');
	}

	if($password != $password2) {
		showmessage('profile_passwd_notmatch');
	}

	if(htmlspecialchars($username) != $username || preg_match("/^$|^c:\\con\\con$|　|[,\"\s\t\<\>&]|^游客|^Guest/is", $username) || @eregi(str_replace(',', '|', "^(".str_replace(' ', '', addslashes($censoruser)).")$"), $username)) {
		showmessage('profile_username_illegal');
	}

	if($regverify != 1 && (!$password || $password != addslashes($password))) {
		showmessage('profile_passwd_illegal');
	}

	if(!strstr($email, '@') || $email != addslashes($email) || $email != htmlspecialchars($email)) {
		showmessage('profile_email_illegal');
	}

	if($maxsigsize && strlen($sig) > $maxsigsize) {
		showmessage('regsister_sig_toolang');
	}

	$query = $db->query("SELECT COUNT(*) FROM $table_members WHERE username='$username' $emailadd");
	if($db->result($query, 0)) {
		showmessage('profile_account_duplicate');
	}

	if($allowavatar == 2 && $avatar) {
		if($maxavatarsize) {
			if(strstr($avatar, ',')) {
				$avatarinfo = explode(',', $avatar);
				if(trim($avatarinfo[1]) > $maxavatarsize || trim($avatarinfo[2]) > $maxavatarsize) {
					showmessage('profile_avatar_toobig');
				}
			} elseif($image_size = @getimagesize($avatar)) {
				if($image_size[0] > $maxavatarsize || $image_size[1] > $maxavatarsize) {
					showmessage('profile_avatar_toobig');
				}
			}
		}
	} else {
		$avatar = '';
	}

	if($regverify == 1){
		$password2 = random(8);
		$password = md5($password2);
	} else {
		$password = md5($password);
	}

	if(!$groupinfo[allowcstatus]) {
		$cstatus = '';
	}

	$bday = "$year-$month-$day";

	if(!$month || !$day || !$year) {
		$bday = '';
	}

	$dateformatnew = str_replace('mm', 'n', $dateformatnew);
	$dateformatnew = str_replace('dd', 'j', $dateformatnew);
	$dateformatnew = str_replace('yyyy', 'Y', $dateformatnew);
	$dateformatnew = str_replace('yy', 'y', $dateformatnew);
	$timeformatnew = $timeformatnew == '24' ? 'H:i' : 'h:i A';

	$avatar = dhtmlspecialchars($avatar);
	$locationnew = dhtmlspecialchars($locationnew);
	$icq = dhtmlspecialchars($icq);
	$yahoo = dhtmlspecialchars($yahoo);
	$oicq = dhtmlspecialchars($oicq);
	$email = dhtmlspecialchars($email);
	$site = dhtmlspecialchars($site);
	$bio = dhtmlspecialchars($bio);
	$bday = dhtmlspecialchars($bday);
	$cstatus = dhtmlspecialchars($cstatus);

	if($welcommsg && !empty($welcommsgtxt)) {
		$welcomtitle = "Welcome to $bbname!";
		$welcommsgtxt = addslashes($welcommsgtxt);
		$db->query("INSERT INTO $table_pm (msgto, msgfrom, folder, new, subject, dateline, message)
			VALUES ('$username', 'System Message', 'inbox', '1', '$welcomtitle', '$timestamp','$welcommsgtxt')");
	}

	$status = $regverify == 2 ? 'Inactive' : 'Member';
	$db->query("INSERT INTO $table_members (username, password, gender, status, regip, regdate, lastvisit, postnum, credit, email, site, icq, oicq, yahoo, msn, location, bday, bio, avatar, signature, customstatus, tpp, ppp, styleid, dateformat, timeformat, showemail, newsletter, timeoffset)
		VALUES ('$username', '$password', '$gendernew', '$status', '$onlineip', '$timestamp', '$timestamp', '0', '0', '$email', '$site', '$icq', '$oicq', '$yahoo', '$msn', '$locationnew', '$bday', '$bio', '$avatar', '$sig', '$cstatus', '$tppnew', '$pppnew', '$styleidnew', '$dateformatnew', '$timeformatnew', '$showemail', '$newsletter', '$timeoffsetnew')");
	$db->query("UPDATE $table_settings SET lastmember='$username', totalmembers=totalmembers+1");
	
	// added by 17camera, written by pk0909
	if($welcommsg && !empty($welcommsgtxt)) {
		$db->query("UPDATE $table_members set newpm='1' where username='$username'");
	}
	// ended

	require $discuz_root.'./include/cache.php';
	updatecache('settings');

	if($regverify == 1){

		sendmail($email, 'activation_subject', 'activation_content');
		showmessage('profile_email_identify');

	} else {
		$query = $db->query("SELECT m.username as discuz_user, m.password as discuz_pw, u.*, u.specifiedusers LIKE '%\t$username\t%' AS specifieduser
			FROM $table_members m LEFT JOIN $table_usergroups u ON u.specifiedusers LIKE '%\t$username\t%' OR (u.status=m.status
			AND ((u.creditshigher='0' AND u.creditslower='0' AND u.specifiedusers='') OR (m.credit>=u.creditshigher AND m.credit<u.creditslower)))
			WHERE username='$username' AND password='$password' ORDER BY specifieduser DESC");
		@extract($db->fetch_array($query));
		$discuz_userss = $discuz_user;
		$discuz_user = addslashes($discuz_user);
		$styleid = $styleid ? $styleid : $_DCACHE['settings']['styleid'];

		setcookie('cookietime', 2592000, $timestamp + 86400 * 365, $cookiepath, $cookiedomain);
		setcookie('_discuz_user', $discuz_userss, $timestamp + 2592000, $cookiepath, $cookiedomain);
		setcookie('_discuz_pw', $discuz_pw, $timestamp + 2592000, $cookiepath, $cookiedomain);

		showmessage('register_succeed', $referer);
	}
}

?>