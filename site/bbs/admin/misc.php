<?php

/*
	[17camera!] admin/misc.php - misc functions of Admin CP
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

if($action == "forumlinks") {

	if(!$forumlinksubmit) {

		$forumlinks = "";
		$query = $db->query("SELECT * FROM $table_forumlinks ORDER BY displayorder");
		while($forumlink = $db->fetch_array($query)) {
			$forumlink[note]=htmlspecialchars($forumlink[note]);			//fix: 联盟论坛介绍含有html代码的问题。
			$forumlinks .= "<tr bgcolor=\"".ALTBG2."\" align=\"center\">\n".
				"<td bgcolor=\"".ALTBG1."\"><input type=\"checkbox\" name=\"delete[]\" value=\"$forumlink[id]\"></td>\n".
				"<td bgcolor=\"".ALTBG2."\"><input type=\"text\" size=\"3\" name=\"displayorder[$forumlink[id]]\" value=\"$forumlink[displayorder]\"></td>\n".
				"<td bgcolor=\"".ALTBG1."\"><input type=\"text\" size=\"15\" name=\"name[$forumlink[id]]\"	value=\"$forumlink[name]\"></td>\n".
				"<td bgcolor=\"".ALTBG2."\"><input type=\"text\" size=\"15\" name=\"url[$forumlink[id]]\" value=\"$forumlink[url]\"></td>\n".
				"<td bgcolor=\"".ALTBG1."\"><input type=\"text\" size=\"15\" name=\"note[$forumlink[id]]\"	value=\"$forumlink[note]\"></td>\n".
				"<td bgcolor=\"".ALTBG2."\"><input type=\"text\" size=\"15\" name=\"logo[$forumlink[id]]\"	value=\"$forumlink[logo]\"></td></tr>\n";
		}

?>
<table cellspacing="0" cellpadding="0" border="0" width="90%" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header"><td>特别提示</td></tr>
<tr bgcolor="<?=ALTBG1?>"><td>
<br><ul><li>如果您不想在首页显示联盟论坛，请把已有各项删除即可。</ul>
<ul><li>未填写文字说明的项目将以紧凑型显示。</ul>
</td></tr></table></td></tr></table>

<br><form method="post"	action="admincp.php?action=forumlinks">
<table cellspacing="0" cellpadding="0" border="0" width="90%" align="center">
<tr><td	bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header"><td colspan="6">联盟论坛编辑</td></tr>
<tr align="center" class="header">
<td><input type="checkbox" name="chkall" class="header"	onclick="checkall(this.form)">删?</td>
<td>顺序号</td><td>论坛名称</td><td>论坛 URL</td><td>文字说明</td>
<td>logo 地址(可选)</td></tr>
<?=$forumlinks?>
<tr bgcolor="<?=ALTBG2?>"><td colspan="6" height="1"></td></tr>
<tr bgcolor="<?=ALTBG1?>" align="center">
<td>新增：</td>
<td><input type="text" size="3"	name="newdisplayorder"></td>
<td><input type="text" size="15" name="newname"></td>
<td><input type="text" size="15" name="newurl"></td>
<td><input type="text" size="15" name="newnote"></td>
<td><input type="text" size="15" name="newlogo"></td>
</tr></table></td></tr></table><br>
<center><input type="submit" name="forumlinksubmit" value="更新列表"></center></form></td></tr>
<?

	} else {

		if(is_array($delete)) {
			$ids = $comma =	"";
			foreach($delete	as $id)	{
				$ids .=	"$comma'$id'";
				$comma = ", ";
			}
			$db->query("DELETE FROM	$table_forumlinks WHERE	id IN ($ids)");
		}

		if(is_array($name)) {
			foreach($name as $id =>	$val) {
				$db->query("UPDATE $table_forumlinks SET displayorder='$displayorder[$id]', name='$name[$id]', url='$url[$id]',	note='$note[$id]', logo='$logo[$id]' WHERE id='$id'");
			}
		}

		if($newname != "") {
			$db->query("INSERT INTO	$table_forumlinks (displayorder, name, url, note, logo)	VALUES ('$newdisplayorder', '$newname',	'$newurl', '$newnote', '$newlogo')");
		}

		updatecache("forumlinks");
		cpmsg("联盟论坛成功更新。");
	}

} elseif($action == "censor") {

	if(!$censorsubmit) {

		$censorwords = "";
		$query = $db->query("SELECT * FROM $table_words");
		while($censor =	$db->fetch_array($query)) {
			$censorwords .=	"<tr align=\"center\"><td bgcolor=\"".ALTBG1."\"><input type=\"checkbox\" name=\"delete[]\" value=\"$censor[id]\"></td>\n".
				"<td bgcolor=\"".ALTBG2."\"><input	type=\"text\" size=\"30\" name=\"find[$censor[id]]\" value=\"$censor[find]\"></td>\n".
				"<td bgcolor=\"".ALTBG1."\"><input	type=\"text\" size=\"30\" name=\"replace[$censor[id]]\"	value=\"$censor[replacement]\"></td></tr>\n";
		}

?>
<table cellspacing="0" cellpadding="0" border="0" width="80%" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header"><td>特别提示</td></tr>
<tr bgcolor="<?=ALTBG1?>"><td>
<br><ul><li>替换为的内容中可以使用 html	代码。</ul>
<ul><li>为不影响程序效率，请不要设置过多不需要的过滤内容。</ul>
</td></tr></table></td></tr></table>

<br><form method="post"	action="admincp.php?action=censor">
<table cellspacing="0" cellpadding="0" border="0" width="80%" align="center">
<tr><td	bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr align="center" class="header"><td width="45"><input	type="checkbox"	name="chkall" class="header" onclick="checkall(this.form)">删?</td>
<td>不良词语</td><td>替换为</td></tr>
<?=$censorwords?>
<tr bgcolor="<?=ALTBG2?>"><td colspan="3" height="1"></td></tr>
<tr bgcolor="<?=ALTBG1?>">
<td align="center">新增：</td>
<td align="center"><input type="text" size="30"	name="newfind"></td>
<td align="center"><input type="text" size="30"	name="newreplace"></td>
</tr></table></td></tr></table><br>
<center><input type="submit" name="censorsubmit" value="更新列表"></center>
</form>
<?

	} else {

		if(is_array($delete)) {
			$ids = $comma =	"";
			foreach($delete	as $id)	{
				$ids .=	"$comma'$id'";
				$comma = ", ";
			}
			$db->query("DELETE FROM	$table_words WHERE id IN ($ids)");
		}

		if(is_array($find)) {
			foreach($find as $id =>	$val) {
				$db->query("UPDATE $table_words	SET find='$find[$id]', replacement='$replace[$id]' WHERE id='$id'");
			}
		}

		if($newfind != "") {
			$db->query("INSERT INTO	$table_words (find, replacement) VALUES	('$newfind', '$newreplace')");
		}

		updatecache("censor");
		cpmsg("词语过滤成功更新。");

	}

} elseif($action == "smilies") {

	if(!$smiliesubmit) {

		$smilies = $picons = "";
		$query = $db->query("SELECT * FROM $table_smilies");
		while($smiley =	$db->fetch_array($query)) {
			if($smiley[type] == "smiley") {
				$smilies .= "<tr align=\"center\"><td bgcolor=\"".ALTBG1."\"><input type=\"checkbox\" name=\"delete[]\" value=\"$smiley[id]\"></td>\n".
					"<td bgcolor=\"".ALTBG2."\"><input	type=\"text\" size=\"25\" name=\"code[$smiley[id]]\" value=\"$smiley[code]\"></td>\n".
					"<td bgcolor=\"".ALTBG1."\"><input	type=\"text\" size=\"25\" name=\"url[$smiley[id]]\" value=\"$smiley[url]\"></td>\n".
					"<td bgcolor=\"".ALTBG2."\"><input	type=\"hidden\"	name=\"type[$smiley[id]]\" value=\"$smiley[type]\"><img	src=\"./".SMDIR."/$smiley[url]\"></td></tr>\n";
			} elseif($smiley[type] == "picon") {
				$picons	.= "<tr	align=\"center\"><td bgcolor=\"".ALTBG1."\"><input	type=\"checkbox\" name=\"delete[]\" value=\"$smiley[id]\"></td>\n".
					"<td colspan=\"2\" bgcolor=\"".ALTBG2."\"><input type=\"text\" size=\"35\"	name=\"url[$smiley[id]]\" value=\"$smiley[url]\"></td>\n".
					"<td bgcolor=\"".ALTBG1."\"><input	type=\"hidden\"	name=\"type[$smiley[id]]\" value=\"$smiley[type]\"><img	src=\"./".SMDIR."/$smiley[url]\"></td></tr>\n";
			}
		}

?>
<form method="post" action="admincp.php?action=smilies">
<table cellspacing="0" cellpadding="0" border="0" width="80%" align="center">
<tr><td	bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header"><td colspan="4" align="left">Smilies	编辑</td></tr>
<tr align="center" class="header">
<td width="45">删?</td>
<td>Smilies 代码</td><td>Smilies 名称</td><td>Smilies 图片</td></tr>
<?=$smilies?>
<tr><td	bgcolor="<?=ALTBG2?>" colspan="4" height="1"></td></tr>
<tr bgcolor="<?=ALTBG1?>" align="center"><td>添加：</td>
<td><input type="text" size="25" name="newcode"></td>
<td><input type="text" size="25" name="newurl1"></td>
<td></td></tr><tr>
<td bgcolor="<?=ALTBG2?>" colspan="4" height="1"></td></tr>
<tr><td	colspan="4" class="header">主题图标</td></tr>
<tr align="center" class="header">
<td width="45">删?</td>
<td colspan="2">图标名称</td><td>主题图标</td></tr>
<?=$picons?>
<tr><td	bgcolor="<?=ALTBG2?>" colspan="4" height="1"></td></tr>
<tr bgcolor="<?=ALTBG1?>" align="center">
<td>添加：</td><td colspan="2"><input type="text" name="newurl2" size="35"></td><td>&nbsp;</td>
</tr></table></td></tr></table><br>
<center><input type="submit" name="smiliesubmit" value="编辑 Smilies 设置"></center></form>
<?

	} else {

		if(is_array($delete)) {
			$ids = $comma =	"";
			foreach($delete	as $id)	{
				$ids .=	"$comma'$id'";
				$comma = ", ";
			}
			$db->query("DELETE FROM	$table_smilies WHERE id	IN ($ids)");
		}

		if(is_array($url)) {
			foreach($url as	$id => $val) {
				$db->query("UPDATE $table_smilies SET type='$type[$id]', code='$code[$id]', url='$url[$id]' WHERE id='$id'");
			}
		}

		if($newcode != "") {
			$query = $db->query("INSERT INTO $table_smilies	(type, code, url)
				VALUES ('smiley', '$newcode', '$newurl1')");
		}
		if($newurl2 != "") {
			$query = $db->query("INSERT INTO $table_smilies	(type, code, url)
				VALUES ('picon', '', '$newurl2')");
		}

		updatecache("smilies");
		updatecache("picons");
		cpmsg("Smilies 列表成功更新。");

	}

} elseif($action == 'updatecache') {

	updatecache();
	$tpl = dir($discuz_root.'./forumdata/templates');
	while($entry = $tpl->read()) {
		if (strpos($entry, '.tpl.php')) {
			@unlink($discuz_root.'./forumdata/templates/'.$entry);
		}
	}
	$tpl->close();

	cpmsg("全部缓存更新完毕。");

}elseif($action == 'logout') {

	session_unregister('admin_user');
	session_unregister('admin_pw');
	cpmsg('您已成功退出系统设置。');
}


?>