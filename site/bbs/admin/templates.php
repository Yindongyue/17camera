<?php

/*
	[17camera!] admin/templates.php - add or edit templates
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

if($action == 'templates') {

	if(!$edit) {

		if(!$tplsubmit) {

			$templates = '';
			$query = $db->query("SELECT * FROM $table_templates");
			while($tpl = $db->fetch_array($query)) {
				$templates .= "<tr align=\"center\"><td bgcolor=\"".ALTBG1."\"><input type=\"checkbox\" name=\"delete[]\" value=\"$tpl[templateid]\"></td>\n".
					"<td bgcolor=\"".ALTBG2."\"><input type=\"text\" size=\"8\" name=\"namenew[$tpl[templateid]]\" value=\"$tpl[name]\"></td>\n".
					"<td bgcolor=\"".ALTBG1."\"><input type=\"text\" size=\"6\" name=\"charsetnew[$tpl[templateid]]\" value=\"$tpl[charset]\"></td>\n".
					"<td bgcolor=\"".ALTBG2."\"><input type=\"text\" size=\"20\" name=\"directorynew[$tpl[templateid]]\" value=\"$tpl[directory]\"></td>\n".
					"<td bgcolor=\"".ALTBG1."\">$tpl[copyright]</td>\n".
					"<td bgcolor=\"".ALTBG2."\"><a href=\"admincp.php?action=templates&edit=$tpl[templateid]\">[详情]</a></td></tr>\n";
			}

?>
<form method="post" action="admincp.php?action=templates">
<table cellspacing="0" cellpadding="0" border="0" width="95%" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header" align="center">
<td width="45"><input type="checkbox" name="chkall" class="header" onclick="checkall(this.form)">删?</td>
<td>模板名称</td><td>字符集</td><td>所在目录</td><td>版权信息</td><td>编辑</td></tr>
<?=$templates?>
<tr bgcolor="<?=ALTBG2?>"><td height="1" colspan="76"></td></tr>
<tr align="center"><td bgcolor="<?=ALTBG1?>">新增：</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" size="8" name="newname"></td>
<td bgcolor="<?=ALTBG1?>"><input type="text" size="6" name="newcharset"></td>
<td bgcolor="<?=ALTBG2?>"><input type="text" size="20" name="newdirectory"></td>
<td bgcolor="<?=ALTBG1?>"><input type="text" size="25" name="newcopyright"></td>
<td bgcolor="<?=ALTBG2?>">&nbsp;</td>
</tr></table></td></tr></table><br>
<center><input type="submit" name="tplsubmit" value="更新界面设置"></center></form>
<?

		} else {

			if($newname) {
				if(!$newcharset || !$newdirectory) {
					cpmsg('您没有填写模板字符集或所在目录，请返回修改。');
				} elseif(substr(trim($newdirectory), -1) == '/') {
					cpmsg('模板目录最后不能包含 "/"，请返回修改。');
				} elseif(!is_dir($discuz_root.'./'.$newdirectory)) {
					cpmsg("模板目录 $newdirectory 不存在，请返回修改。");
				}
				$db->unbuffered_query("INSERT INTO $table_templates (name, charset, directory, copyright)
					VALUES ('$newname', '$newcharset', '$newdirectory', '$newcopyright')");
			}

			foreach($directorynew as $id => $directory) {
				if(!$delete || ($delete && !in_array($id, $delete))) {
					if(!is_dir($directory)) {
						cpmsg("模板目录 $directory 不存在，请返回修改。");
					} elseif($id == 1 && $directory != './templates/default') {
						cpmsg('您不能修改默认模板的目录设置，请返回。');
					}
					$db->unbuffered_query("UPDATE $table_templates SET name='$namenew[$id]', charset='$charsetnew[$id]', directory='$directorynew[$id]' WHERE templateid='$id'");
				}
			}

			if(is_array($delete)) {
				if(in_array('1', $delete)) {
					cpmsg('您不能删除默认模板，请返回。');
				}
				$ids = $comma = '';
				foreach($delete as $id) {
					$ids .= "$comma'$id'";
					$comma = ', ';
				}
				$db->unbuffered_query("DELETE FROM $table_templates WHERE templateid IN ($ids) AND templateid<>'1'");
				$db->unbuffered_query("UPDATE $table_styles SET templateid='1' WHERE templateid IN ($ids)");
			}

			updatecache('styles');
			cpmsg('模板套系成功更新。');

		}

	} else {

		$query = $db->query("SELECT * FROM $table_templates WHERE templateid='$edit'");
		if(!$template = $db->fetch_array($query)) {
			cpmsg('指定模板套系不存在或已被删除，请返回。');
		} elseif(!is_dir($discuz_root.'./'.$template['directory'])) {
			cpmsg('模板所在目录 $template[directory] 不存在，请检查相关设置。');
		}

		$warning = $template['templateid'] == 1 ?
				'您正在修改默认模板，为了扩充其他模板的方便，强烈建议您不要对默认模板的内容进行修改。' :
				'本套系中并不要求必须完整，所缺少的模板将使用默认模板代替，但语言包必须完整无缺。';
		if($keyword) {
			$keywordadd = " - 包含关键字 '".htmlspecialchars($keyword)."' 的模板 - <a href=\"admincp.php?action=templates&edit=$edit\" style=\"color: ".HEADERTEXT."\">[ 查看全部模板 ]</a>";
			$keywordenc = rawurlencode($keyword);
		}

		$tplarray = $langarray = array();
		$tpldir = dir($discuz_root.'./'.$template['directory']);
		while($entry = $tpldir->read()) {
			$extension = strtolower(substr(strrchr($entry, '.'), 1));
			if($extension == 'htm') {
				$tplname = substr($entry, 0, -4);
				$pos = strpos($tplname, '_');
				if($keyword) {
					if(!stristr(implode("\n", file($discuz_root."./$template[directory]/$entry")), $keyword)) {
						continue;
					}
				}
				if(!$pos) {
					$tplarray[$tplname][] = $tplname;
				} else {
					$tplarray[substr($tplname, 0, $pos)][] = $tplname;
				}
			} elseif($extension == 'php') {
				$langarray[] = substr($entry, 0, -9);
			}
		}
		$tpldir->close();

		ksort($tplarray);
		ksort($langarray);
		$templates = $languages = '';

		foreach($tplarray as $tpl => $subtpls) {
			$templates .= "<ul><li><b>$tpl 模板组</b><ul>\n";
			foreach($subtpls as $subtpl) {
				$filename = "$subtpl.htm";
				$templates .= "<li>$subtpl &nbsp; <a href=\"admincp.php?action=tpledit&templateid=$template[templateid]&fn=$filename&keyword=$keywordenc\">[编辑]</a> ".
					"<a href=\"admincp.php?action=tpledit&templateid=$template[templateid]&fn=$filename&delete=yes\">[删除]</a>";
			}
			$templates .= "</ul></ul>\n";
		}
		foreach($langarray as $lang) {
			$languages .= "<ul><li>$lang &nbsp; <a href=\"admincp.php?action=tpledit&templateid=$template[templateid]&fn=$lang.lang.php\">[编辑]</a></ul>\n";
		}

?>
<table cellspacing="0" cellpadding="0" border="0" width="85%" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="0" width="100%">
<tr><td>
<table border="0" cellspacing="0" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header"><td colspan="3">模板维护</td></tr>

<form method="post" action="admincp.php?action=tpladd&edit=<?=$edit?>">
<tr bgcolor="<?=ALTBG2?>"><td width="25%">添加模板</td><td width="55%"><input type="text" name="name" size="40" maxlength="40"></td>
<td width="20%"><input type="submit" value="添 加"></td></tr></form>

<form method="get" action="admincp.php">
<input type="hidden" name="action" value="templates">
<input type="hidden" name="edit" value="<?=$edit?>">
<tr bgcolor="<?=ALTBG1?>"><td>搜索模板内容</td><td><input type="text" name="keyword" size="40"></td>
<td><input type="submit" value="搜 索"></td></tr></form>

</table></td></tr></table></td></tr></table><br><br>

<table cellspacing="0" cellpadding="0" border="0" width="85%" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header"><td>选择模板<?=$keywordadd?></td></tr>
<tr bgcolor="<?=ALTBG1?>"><td><br><center><b><?=$warning?></b></center><br>
<ul><li><b>17camera! 语言包</b><?=$languages?></ul>
<ul><li><b>17camera! 模板</b><?=$templates?></ul>
</td></tr></table></td></tr></table>
<?

	}
			
} elseif($action == 'tpledit') {

	$query = $db->query("SELECT * FROM $table_templates WHERE templateid='$templateid'");
	if(!$template = $db->fetch_array($query)) {
		cpmsg('指定模板套系不存在，请返回。');
	}

	$filename = $discuz_root."./$template[directory]/$fn";
	if(!is_writeable($filename)) {
		cpmsg("指定文件 $template[directory]/$fn 无法写入，<br>若需在线编辑，请将该文件和所在目录属性设置为 777。");
	}

	if(!$editsubmit && $delete != 'yes') {

		$keywordenc = rawurlencode($keyword);

		$fp = fopen($filename, 'r');
		$content = fread($fp, filesize($filename));
		fclose($fp);

		$content = str_replace("\\'", "'", htmlspecialchars($content));

?>
<script language="JavaScript">
var n = 0;
function displayHTML(obj) {
	win = window.open(" ", 'popup', 'toolbar = no, status = no, scrollbars=yes');
	win.document.write("" + obj.value + "");
}
function HighlightAll(obj) {
	obj.focus();
	obj.select();
	if (document.all) {
		obj.createTextRange().execCommand("Copy");
		window.status = "将模板内容复制到剪贴板";
		setTimeout("window.status=''", 1800);
	}
}
function findInPage(obj, str) {
	var txt, i, found;
	if (str == "") {
		return false;
	}
	if (document.layers) {
		if (!obj.find(str)) {
			while(obj.find(str, false, true)) {
				n++;
			}
		} else {
			n++;
		}
		if (n == 0) {
			alert('未找到指定字串。');
		}
	}
	if (document.all) {
		txt = obj.createTextRange();
		for (i = 0; i <= n && (found = txt.findText(str)) != false; i++) {
			txt.moveStart('character', 1);
			txt.moveEnd('textedit');
		}
		if (found) {
			txt.moveStart('character', -1);
			txt.findText(str);
			txt.select();
			txt.scrollIntoView();
			n++;
		} else {
			if (n > 0) {
				n = 0;
				findInPage(str);
			} else {
				alert("未找到指定字串。");
			}
		}
	}
	return false;
}
</script>
<form method="post" action="admincp.php?action=tpledit&templateid=<?=$templateid?>&fn=<?=$fn?>">
<input type="hidden" name="keyword" value="<?=$keywordenc?>">
<table cellspacing="0" cellpadding="0" border="0" width="60%" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr><td class="header">编辑模板 - <?=$fn?></td></tr>
<tr><td bgcolor="<?=ALTBG1?>" align="center">
<textarea cols="100" rows="25" name="templatenew"><?=$content?></textarea><br><br>
<input name="search" type="text" accesskey="t" size="20" onChange="n=0;">
<input type="button" value="查找" accesskey="f" onClick="findInPage(this.form.templatenew, this.form.search.value)">&nbsp;&nbsp;&nbsp;
<input type="button" value="返回" accesskey="e" onClick="history.go(-1)">
<input type="button" value="预览" accesskey="p" onClick="displayHTML(this.form.templatenew)">
<input type="button" value="复制" accesskey="c" onClick="HighlightAll(this.form.templatenew)">&nbsp;&nbsp;&nbsp;
<input type="submit" name="editsubmit" value="确认修改">
</td></tr></table></td></tr></table>
</form>

<?

	} elseif($delete == 'yes') {

		if(!$confirmed) {
			cpmsg("本操作不可恢复，您确定要删除模板 $fn 吗？", "admincp.php?action=tpledit&templateid=$templateid&fn=$fn&delete=yes", 'form');
		} else {
			if(@unlink($filename)) {
				cpmsg('指定模板成功删除，现在将转入模板列表。', "admincp.php?action=templates&edit=$templateid");
			} else {
				cpmsg('程序无权删除模板文件，请用 FTP 登录后再试。');
			}
		}

	} else {

		$fp = fopen($filename, 'w');
		flock($fp, 3);
		fwrite($fp, stripslashes(str_replace("\x0d\x0a", "\x0a", $templatenew)));
		fclose($fp);

		cpmsg('指定模板成功编辑，现在将转入模板列表。', "admincp.php?action=templates&edit=$templateid&keyword=$keyword");

	}

} elseif($action == 'tpladd') {

	$query = $db->query("SELECT * FROM $table_templates WHERE templateid='$edit'");
	if(!$template = $db->fetch_array($query)) {
		cpmsg('指定模板套系不存在或已被删除，请返回。');
	} elseif(!is_dir($discuz_root.'./'.$template[directory])) {
		cpmsg('模板所在目录 $template[directory] 不存在，请检查相关设置。');
	} elseif(file_exists($discuz_root."./$template[directory]/$name.htm")) {
		cpmsg('新增模板已经存在，请返回选择其他名称。');
	} elseif(!@$fp = fopen($discuz_root."./$template[directory]/$name.htm", 'w')) {
		cpmsg("指定文件 $template[directory]/$name.htm 无法写入，<br>若需在线编辑，请将该文件和所在目录属性设置为 777。");
	}

	@fclose($fp);
	cpmsg('指定模板成功添加，现在将转入模板编辑页。', "admincp.php?action=tpledit&templateid=1&fn=$name.htm");
	
}	

?>