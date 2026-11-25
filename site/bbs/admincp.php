<?php

/*
	[17camera!] admincp.php - administrator's control panel
	This is NOT a freeware, use is subject to license terms

	Version: 2.0.1
	Author: 17camera (master@17camera.com)
	Copyright: 17camera Studio (www.17camera.com)
	Last Modified: 2002/12/23 17:00
*/

require './include/common.php';
require $discuz_root.'./include/cache.php';
require $discuz_root.'./admin/global.php';

$discuz_action = 161;

if(@file_exists($discuz_root.'./install.php')) {
	@unlink($discuz_root.'./install.php');
	if(@file_exists($discuz_root.'./install.php')) {
		discuz_exit('Please delete install.php via FTP!');
	}
}

if(empty($action) || !empty($direct)) {

	$action = empty($action) ? 'main' : $action;
?>
<html>
<head>
<title>17camera! 系统设置面板</title>
<meta http-equiv="Content-Type" content="text/html; charset=<?=CHARSET?>">
</head>

<frameset cols="160,*" frameborder="no" border="0" framespacing="0" rows="*"> 
<frame name="menu" noresize scrolling="yes" src="admincp.php?action=menu&sid=<?=$sid?>">
<frameset rows="20,*" frameborder="no" border="0" framespacing="0" cols="*"> 
<frame name="header" noresize scrolling="no" src="admincp.php?action=header&sid=<?=$sid?>">
<frame name="main" noresize scrolling="yes" src="admincp.php?action=<?=$action?>&extr=<?=$extr?>&sid=<?=$sid?>">
</frameset></frameset><noframes></noframes></html>
<?

} elseif($action == 'header') {

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?=CHARSET?>">
<? include template('css'); ?>
</head>

<body leftmargin="0" topmargin="0">
<table cellspacing="0" cellpadding="2" border="0" width="100%" height="100%" bgcolor="<?=ALTBG2?>">
<tr valign="middle">
<td width="33%"> 系统设置面板</td>
<td width="33%" align="center"><a href="" target="_blank">www.17camera.com</a></td>
<td width="34%" align="right"><a href="index.php" target="_blank">论坛首页</a></TD>
</tr>
</table>
</body></html>
<?

} elseif($action == 'menu') {

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?=CHARSET?>">
<? include template('css'); ?>
</head>

<body leftmargin="3" topmargin="3">

<br><table cellspacing="0" cellpadding="0" border="0" width="100%" align="center" style="table-layout: fixed">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table width="100%" border="0" cellspacing="1" cellpadding="0">
<tr><td bgcolor="#FFFFFF">
<table width="100%" border="0" cellspacing="3" cellpadding="<?=TABLESPACE?>">
<tr><td bgcolor="<?=ALTBG1?>" align="center"><a href="admincp.php?action=menu&expand=1_2_3_4_5_6_7_8_9_10">[展开]</a> &nbsp; <a href="admincp.php?action=menu&expand=0">[收缩]</a></td></tr>
<?

		if(preg_match("/(^|_)$change($|_)/is", $expand)) {
			$expandlist = explode('_', $expand);
			$expand = $underline = '';
			foreach($expandlist as $count) {
				if($count != $change) {
					$expand .= $underline.$count;
					$underline = '_';
				}
			}
		} else {
			$expand .= isset($expand) ? '_'.$change : $change;
		}

		if($expand || $expand == '0') {
			setcookie('expand_menu', $expand, $timestamp + 2592000, $cookiepath, $cookiedomain);
		} else {
			$expand = $HTTP_COOKIE_VARS['expand_menu'];
		}

		$pluginsarray = array();
		if(is_array($plugins)) {
			foreach($plugins as $plugin) {
				if($plugin[name] && $plugin[cpurl]) {
					$pluginsarray[] = array('name' => $plugin['name'], 'url' => $plugin['cpurl']);
				}
			}
		}

		$menucount = 0;
		showmenu('面板首页', 'admincp.php?action=main');
		showmenu('常规选项', 'admincp.php?action=settings');
		showmenu('论坛设置', array(	array('name' => '添加论坛', 'url' => 'admincp.php?action=forumadd'),
						array('name' => '论坛编辑', 'url' => 'admincp.php?action=forumsedit'),
						array('name' => '论坛合并', 'url' => 'admincp.php?action=forumsmerge')));
		showmenu('用户设置', array(	array('name' => '添加用户', 'url' => 'admincp.php?action=addmember'),
						array('name' => '用户编辑', 'url' => 'admincp.php?action=members'),
						array('name' => '用户组编辑', 'url' => 'admincp.php?action=usergroups'),
						array('name' => 'IP 禁止', 'url' => 'admincp.php?action=ipban')));
		showmenu('界面风格', array(	array('name' => '风格方案', 'url' => 'admincp.php?action=styles'),
						array('name' => '模板套系', 'url' => 'admincp.php?action=templates')));
		showmenu('其他设置', array(	array('name' => '论坛公告', 'url' => 'admincp.php?action=announcements'),
						array('name' => '联盟论坛', 'url' => 'admincp.php?action=forumlinks'),
						array('name' => '词语过滤', 'url' => 'admincp.php?action=censor'),
						array('name' => 'Smilies 编辑', 'url' => 'admincp.php?action=smilies')));
		showmenu('数据管理', array(	array('name' => '数据备份', 'url' => 'admincp.php?action=export'),
						array('name' => '数据恢复', 'url' => 'admincp.php?action=import'),
						array('name' => '数据库升级', 'url' => 'admincp.php?action=runquery'),
						array('name' => '数据表优化', 'url' => 'admincp.php?action=optimize')));
		showmenu('论坛维护', array(	array('name' => '附件编辑', 'url' => 'admincp.php?action=attachments'),
						array('name' => '批量删帖', 'url' => 'admincp.php?action=prune'),
						array('name' => '短消息清理', 'url' => 'admincp.php?action=pmprune')));
		showmenu('系统工具', array(	array('name' => '论坛通知', 'url' => 'admincp.php?action=newsletter'),
						array('name' => '更新缓存', 'url' => 'admincp.php?action=updatecache'),
						array('name' => '重建统计数据', 'url' => 'admincp.php?action=counter')));
		showmenu('运行记录', array(	array('name' => '密码错误记录', 'url' => 'admincp.php?action=illegallog'),
						array('name' => '用户评分记录', 'url' => 'admincp.php?action=karmalog'),
						array('name' => '版主管理记录', 'url' => 'admincp.php?action=modslog'),
						array('name' => '系统管理记录', 'url' => 'admincp.php?action=cplog')));
		showmenu('插件配置', $pluginsarray);
		showmenu('退出面板', 'admincp.php?action=logout');

?>
</table></td></tr></table></td></tr></table>

</body>
</html>
<?

} else {

	session_set_cookie_params(0, $cookiepath, $cookiedomain);
	session_name('admin_sid');
	session_start();
	session_register('admin_user', 'admin_pw', 'errorlog');

	$HTTP_SESSION_VARS['admin_user'] = isset($HTTP_POST_VARS['adusername']) ? $HTTP_POST_VARS['adusername'] : $HTTP_SESSION_VARS['admin_user'];
	$HTTP_SESSION_VARS['admin_pw'] = isset($HTTP_POST_VARS['adpassword']) ? md5($HTTP_POST_VARS['adpassword']) : $HTTP_SESSION_VARS['admin_pw'];

	if(!$isadmin || $HTTP_SESSION_VARS['errorlog'] >= 2) {
		clearcookies();
		$discuz_user = $discuz_pw = '';
		$status = 'Guest';
		$groupid = 14;
		$styleid = $_DCACHE['settings']['styleid'];

		cpheader();
		cpmsg("只有管理员才能进入系统设置！");
	} elseif($HTTP_SESSION_VARS['admin_user'] != $discuz_user || $HTTP_SESSION_VARS['admin_pw'] != $discuz_pw) {
		if($HTTP_SESSION_VARS['admin_user']) {
			$HTTP_SESSION_VARS['errorlog']++;
		}
		$action = empty($action) ? 'main' : $action;
		cpheader();

?>
<br><br><br><br><br><br>
<form method="post" action="admincp.php?action=<?=$action?>&extr=<?=$extr?>">
<input type="hidden" name="adusername" value="<?=$discuz_user?>">
<table cellspacing="0" cellpadding="0" border="0" width="60%" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header"><td colspan="2">请输入您的管理员密码</td></tr>
<tr><td bgcolor="<?=ALTBG1?>" width="25%">用户名:</td><td bgcolor="<?=ALTBG2?>"><?=$discuz_user?> <a href="logging.php?action=logout&referer=index.php" target="_blank">[退出登录]</a></td></tr>
<tr><td bgcolor="<?=ALTBG1?>" width="25%">密码:</td><td bgcolor="<?=ALTBG2?>"><input type="password" size="25" name="adpassword"></td></tr>
</td></tr></table></td></tr></table>
<br><center><input type="submit" value="提 &nbsp; 交"></center></form>
<br><br>
<?

		cpfooter();
		discuz_exit();

	}

}

	if ($action == 'main') {

		require $discuz_root.'./include/attachment.php';

		$serverinfo = PHP_OS.' / PHP v'.PHP_VERSION;
		$serverinfo .= @ini_get('safe_mode') ? ' 安全模式' : NULL;
		$dbversion = $db->result($db->query("SELECT VERSION()"), 0);

		if(@ini_get("file_uploads")) {
			$fileupload = "允许 - 文件 ".ini_get("upload_max_filesize")." - 表单：".ini_get("post_max_size");
		} else {
			$fileupload = "<font color=\"red\">禁止</font>";
		}

		$forumselect = $groupselect = '';
		$query = $db->query("SELECT groupid, grouptitle FROM $table_usergroups ORDER BY status, creditslower");
		while($group = $db->fetch_array($query)) {
			$groupselect .= "<option value=\"$group[groupid]\">$group[grouptitle]</option>\n";
		}
		$query = $db->query("SELECT fid, name FROM $table_forums WHERE type='forum' OR type='sub'");
		while($forum = $db->fetch_array($query)) {
			$forumselect .= "<option value=\"$forum[fid]\">$forum[name]</option>\n";
		}

		$dbsize = 0;
		$query = $db->query("SHOW TABLE STATUS LIKE '$tablepre%'", 1);
		while($table = $db->fetch_array($query)) {
			$dbsize += $table[Data_length] + $table[Index_length];
		}
		$dbsize = $dbsize ? sizecount($dbsize) : "未知";

		$attachsize = dirsize("./$attachdir");
		$attachsize = $attachsize ? sizecount($attachsize) : "未知";

		cpheader();

?>
<font class="mediumtxt">
<b>欢迎光临 <a href="" target="_blank">17camera! </a> 系统设置面板</b><br>


<br><br><br><table cellspacing="0" cellpadding="0" border="0" width="85%" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="0" width="100%">
<tr><td>
<table border="0" cellspacing="0" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header"><td colspan="3">快 捷 方 式</td></tr>

<form method="post" action="admincp.php?action=forumdetail"><tr bgcolor="<?=ALTBG2?>"><td>编辑论坛</td>
<td><select name="fid"><?=$forumselect?></select></td><td><input type="submit" value="提 交"></td></tr></form>

<form method="post" action="admincp.php?action=usergroups&type=detail"><tr bgcolor="<?=ALTBG1?>"><td>编辑用户组权限</td>
<td><select name="id"><?=$groupselect?></td><td><input type="submit" value="提 交"></td></tr></form>

<form method="post" action="admincp.php?action=members"><tr bgcolor="<?=ALTBG2?>"><td>编辑用户</td>
<td><input type="text" size="25" name="username"></td><td><input type="submit" name="searchsubmit" value="提 交"></td></tr></form>

<form method="post" action="admincp.php?action=export&type=mini&saveto=server"><tr bgcolor="<?=ALTBG1?>"><td>最小备份到服务器</td>
<td><input type="text" size="25" name="filename" value="./forumdata/dz_<?=date("md")."_".random(5)?>.sql"></td><td><input type="submit" name="exportsubmit" value="提 交"></td></tr></form>

</table></td></tr></table></td></tr></table><br><br>

<table cellspacing="0" cellpadding="0" border="0" width="85%" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="0" width="100%">
<tr><td>
<table border="0" cellspacing="0" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header"><td colspan="2">系 统 信 息</td></tr>
<tr bgcolor="<?=ALTBG2?>"><td width="50%">服务器环境</td><td><?=$serverinfo?></td></tr>
<tr bgcolor="<?=ALTBG1?>"><td>MySQL 版本</td><td><?=$dbversion?></td></tr>
<tr bgcolor="<?=ALTBG2?>"><td>附件上传许可</td><td><?=$fileupload?></td></tr>
<tr bgcolor="<?=ALTBG1?>"><td>数据库占用</td><td><?=$dbsize?></td></tr>
<tr bgcolor="<?=ALTBG2?>"><td>附件文件占用</td><td><?=$attachsize?></td></tr>
</table></td></tr></table></td></tr></table><br><br>

<table cellspacing="0" cellpadding="0" border="0" width="85%" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="0" width="100%">
<tr><td>
</td></tr></table></td></tr></table>
<?

	} elseif($action == 'settings') {
		require $discuz_root.'./admin/settings.php';
	} elseif($action == 'forumadd' || $action == 'forumsedit' || $action == 'forumsmerge' || $action == 'forumdetail' || $action == 'forumdelete') {
		require $discuz_root.'./admin/forums.php';
	} elseif($action == 'addmember' || $action == 'members' || $action == 'memberprofile' || $action == 'usergroups' || $action == 'ipban') {
		require $discuz_root.'./admin/members.php';
	} elseif($action == 'announcements') {
		require $discuz_root.'./admin/announcements.php';
	} elseif($action == 'styles') {
		require $discuz_root.'./admin/styles.php';
	} elseif($action == 'templates' || $action == 'tpladd' || $action == 'tpledit') {
		require $discuz_root.'./admin/templates.php';
	} elseif($action == 'forumlinks' || $action == 'censor' || $action == 'smilies' || $action == 'updatecache' || $action == 'logout') {
		require $discuz_root.'./admin/misc.php';
	} elseif($action == 'export' || $action == 'import' || $action == 'runquery' || $action == 'optimize') {
		require $discuz_root.'./admin/database.php';
	} elseif($action == 'attachments') {
		require $discuz_root.'./admin/attachments.php';
	} elseif($action == 'counter') {
		require $discuz_root.'./admin/counter.php';
	} elseif($action == 'prune' || $action == 'pmprune') {
		require $discuz_root.'./admin/prune.php';
	} elseif($action == 'newsletter') {
		require $discuz_root.'./admin/newsletter.php';
	} elseif($action == 'illegallog' || $action == 'karmalog' || $action == 'modslog' || $action == 'cplog') {
		require $discuz_root.'./admin/logs.php';
	}

	if($action != 'menu' && $action != 'header') {
		cpfooter();
	}


discuz_output();

?>