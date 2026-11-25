<?php

/*
	[17camera!] admin/styles.php - add, edit, export/import styles, etc
	This is NOT a freeware, use is subject to license terms

	Version: 1.1.0
	Author: 17camera (master@17camera.com)
	Copyright: 17camera Studio (www.17camera.com)
	Last Modified: 2002/12/31 8:52
*/


if($action == 'styles' && $export) {
	$query = $db->query("SELECT s.name, s.templateid, t.name AS tplname, t.charset, t.directory, t.copyright FROM $table_styles s LEFT JOIN $table_templates t ON t.templateid=s.templateid WHERE styleid='$export'");
	if(!$stylearray = $db->fetch_array($query)) {
		cpheader();
		cpmsg('指定的风格不存在，无法导出。');
	}

	$stylearray['version'] = strip_tags();
	$time = gmdate("$dateformat $timeformat", $timestamp + $timeoffset * 3600);

	$query = $db->query("SELECT * FROM $table_stylevars WHERE styleid='$export'");
	while($style = $db->fetch_array($query)) {
		$stylearray['style'][$style['variable']] = $style['substitute'];
	}

	if($stylearray['templateid'] != 1) {
		$dir = dir($discuz_root.'./'.$stylearray['directory']);
		while($entry = $dir->read()) {
			$filename = $discuz_root.'./'.$stylearray['directory'].'/'.$entry;
			if(is_file($filename)) {
				$stylearray['template'][str_replace('.', '_DOT_', $entry)] = join('', file($filename));
			}
		}
		$dir->close();
	}

	$style_export = "# 17camera! Style Dump\n".
			"# Version: 17camera! \n".
			"# Time: $time\n".
			"# From: $bbname ($boardurl)\n".
			"#\n".
			"# This file was BASE64 encoded\n".
			"#\n".
			"# 17camera! Community: \n".
			"# Please visit our website for newest infomation about 17camera!\n".
			"# --------------------------------------------------------\n\n\n".
			wordwrap(base64_encode(serialize($stylearray)), 50, "\n", 1);

	ob_end_clean();
	header('Content-Encoding: none');
	header('Content-Type: '.(strpos($HTTP_SERVER_VARS['HTTP_USER_AGENT'], 'MSIE') ? 'application/octetstream' : 'application/octet-stream'));
	header('Content-Disposition: '.(strpos($HTTP_SERVER_VARS['HTTP_USER_AGENT'], 'MSIE') ? 'inline; ' : 'attachment; ').'filename="dz_style_'.$stylearray['name'].'.txt"');
	header('Content-Length: '.strlen($style_export));
	header('Pragma: no-cache');
	header('Expires: 0');

	echo $style_export;
	discuz_exit();
}

cpheader();

if($action == 'styles' && !$export) {

	$predefinedvars = array('bgcolor', 'altbg1', 'altbg2', 'link', 'bordercolor', 'headercolor', 'headertext', 'catcolor',
				'tabletext', 'text', 'borderwidth', 'tablewidth', 'tablespace', 'fontsize', 'font',
				'smfontsize', 'smfont', 'nobold', 'boardimg', 'imgdir', 'smdir', 'cattext');

	if(!$stylesubmit && !$importsubmit && !$edit && !$export) {

		$styleselect = '';
		$query = $db->query("SELECT s.styleid, s.available, s.name, t.name AS tplname, t.charset, t.copyright FROM $table_styles s LEFT JOIN $table_templates t ON t.templateid=s.templateid");
		while($styleinfo = $db->fetch_array($query)) {
			$styleselect .= "<tr align=\"center\"><td bgcolor=\"".ALTBG1."\"><input type=\"checkbox\" name=\"delete[]\" value=\"$styleinfo[styleid]\"></td>\n".
				"<td bgcolor=\"".ALTBG2."\"><input type=\"text\" name=\"namenew[$styleinfo[styleid]]\" value=\"$styleinfo[name]\" size=\"18\"></td>\n".
				"<td bgcolor=\"".ALTBG1."\"><input type=\"checkbox\" name=\"availablenew[$styleinfo[styleid]]\" value=\"1\" ".($styleinfo['available'] ? 'checked' : NULL)."></td>\n".
				"<td bgcolor=\"".ALTBG2."\">$styleinfo[styleid]</td>\n".
				"<td bgcolor=\"".ALTBG1."\">$styleinfo[tplname]</td>\n".
				"<td bgcolor=\"".ALTBG2."\">$styleinfo[charset]</td>\n".
				"<td bgcolor=\"".ALTBG1."\"><a href=\"admincp.php?action=styles&export=$styleinfo[styleid]\">[下载]</a></td>\n".
				"<td bgcolor=\"".ALTBG2."\"><a href=\"admincp.php?action=styles&edit=$styleinfo[styleid]\">[详情]</a></td></tr>\n";
		}

?>
<table cellspacing="0" cellpadding="0" border="0" width="90%" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header"><td>特别提示</td></tr>
<tr bgcolor="<?=ALTBG1?>"><td>
<br>
<ul><li>您可以指导用户通过在 URL 加入 styleid 变量来轻松切换当前界面风格，如 http://your.com/discuz/index.php?styleid=2 或 http://your.com/discuz/forumdisplay.php?fid=2&styleid=3</ul>
<ul><li>界面方案的“可用”是指用户是否选择使用此风格，但无论设置可用与否，都可以将此界面设置为默认界面或某分论坛的默认界面。</ul>
</td></tr></table></td></tr></table><br><br>

<form method="post" action="admincp.php?action=styles">
<table cellspacing="0" cellpadding="0" border="0" width="90%" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header" align="center">
<td width="45"><input type="checkbox" name="chkall" class="header" onclick="checkall(this.form)">删?</td>
<td>方案名称</td><td>可用</td><td>styleID</td><td>所用模板</td><td>字符集</td><td>导出</td><td>编辑</td></tr>
<?=$styleselect?>
<tr bgcolor="<?=ALTBG2?>"><td height="1" colspan="8"></td></tr>
<tr align="center"><td bgcolor="<?=ALTBG1?>">新增：</td>
<td bgcolor="<?=ALTBG2?>"><input type='text' name="newname" size="18"></td>
<td colspan="6" bgcolor="<?=ALTBG2?>">&nbsp;</td>
</tr></table></td></tr></table><br>
<center><input type="submit" name="stylesubmit" value="更新界面设置"></center></form>

<br><form method="post" action="admincp.php?action=styles">
<table cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="90%" bgcolor="<?=BORDERCOLOR?>" align="center">
<tr class="header"><td>导入界面方案 - 请将导出的文件内容粘贴如下</td></tr>
<tr><td bgcolor="<?=ALTBG1?>" align="center"><textarea  name="styledata" cols="80" rows="8"></textarea><br>
<input type="checkbox" name="ignoreversion" value="1"> 允许导入不同版本 17camera! 的界面(易产生错误!!)</td></tr>
</table><br><center><input type="submit" name="importsubmit" value="将风格文件导入 17camera!"></center></form>
<?

	} elseif($stylesubmit) {

		if(is_array($namenew)) {
			foreach($namenew as $id => $val) {
				$db->query("UPDATE $table_styles SET name='$namenew[$id]', available='$availablenew[$id]' WHERE styleid='$id'");
			}
		}

		if(is_array($delete)) {
			$ids = $comma = '';
			foreach($delete as $id) {
				$ids .= "$comma'$id'";
				$comma  = ', ';
			}
			$query = $db->query("SELECT COUNT(*) FROM $table_settings WHERE styleid IN ($ids)");
			if($db->result($query, 0)) {
				cpmsg("您不能直接删除系统默认的风格，请返回选择其他风格为默认后再进行删除。");
			}

			$db->query("DELETE FROM $table_styles WHERE styleid IN ($ids)");
			$db->query("DELETE FROM $table_stylevars WHERE styleid IN ($ids)");
			$db->query("UPDATE $table_members SET styleid='0' WHERE styleid IN ($ids)");
			$db->query("UPDATE $table_forums SET styleid='0' WHERE styleid IN ($ids)");
			$db->query("UPDATE $table_sessions SET styleid='$_DCACHE[settings][styleid]' WHERE styleid IN ($ids)");
		}

		if($newname) {
			$db->query("INSERT INTO $table_styles (name, templateid) VALUES ('$newname', '1')");
			$styleid = $db->insert_id();
			foreach($predefinedvars as $variable) {
				$db->query("INSERT INTO $table_stylevars (styleid, variable)
					VALUES ('$styleid', '$variable')");
			}
		}

		cpmsg("界面方案成功更新。");

	} elseif($importsubmit) {

		$styledata = preg_replace("/(#.*\s+)*/", '', $styledata);
		$stylearray = daddslashes(unserialize(base64_decode($styledata)), 1);

		if(!is_array($stylearray)) {
			cpmsg("界面文件已损坏，无法导入，请返回。");
		}

		if(empty($ignoreversion) && strip_tags($stylearray['version']) != strip_tags()) {
			cpmsg("导出界面所用 17camera! ($stylearray[version])与当前版本()不一致，请返回。");
		}

		if($stylearray['templateid'] != 1) {
			$templatedir = $discuz_root.'./'.$stylearray['directory'];
			if(!is_dir($templatedir)) {
				if(!@mkdir($templatedir, 0777)) {
					$basedir = dirname($stylearray['directory']);
					cpmsg("模板目录无法自动建立，请设置 $basedir 目录属性为 777<br>或通过 FTP 建立目录 $stylearray[directory] 并设置属性为 777。");
				}
			}

			foreach($stylearray['template'] as $name => $file) {
				$name = $templatedir.'/'.str_replace('_DOT_', '.', $name);
				if(file_exists($name)) {
					cpmsg("文件名重复，请返回确认模板目录为空后再试。");
				}
				if(!$fp = fopen($name, 'wb')) {
					cpmsg("模板文件无法写入，请返回设置 $stylearray[directory] 目录属性为 777 后再试。");
				}

				$file = stripslashes($file);//fix_beta 风格文件写入时候出现错误。
				flock($fp, 3);
				fwrite($fp, $file);
				fclose($fp);
			}

			$renameinfo = '';
			$query = $db->query("SELECT COUNT(*) FROM $table_templates WHERE name='$stylearray[tplname]'");
			if($db->result($query, 0)) {
				$stylearray['tplname'] .= '_'.random(4);
				$renameinfo .= "导入模板名称与现有模板重复，新模板被重命名为<br><b>$stylearray[tplname]</b>。";
			}
			$db->query("INSERT INTO $table_templates (name, charset, directory, copyright)
				VALUES ('$stylearray[tplname]', '$stylearray[charset]', '$stylearray[directory]', '$stylearray[copyright]')");
			$templateid = $db->insert_id();
		} else {
			$templateid = 1;
		}

		$query = $db->query("SELECT COUNT(*) FROM $table_styles WHERE name='$stylearray[name]'");
		if($db->result($query, 0)) {
			$stylearray['name'] .= '_'.random(4);
			$renameinfo .= "导入名称与现有界面重复，新界面被重命名为<br><b>$stylearray[name]</b>。";
		}
		$db->query("INSERT INTO $table_styles (name, templateid)
			VALUES ('$stylearray[name]', '$templateid')");
		$styleid = $db->insert_id();

		foreach($stylearray['style'] as $variable => $substitute) {
			$db->query("INSERT INTO $table_stylevars (styleid, variable, substitute)
				VALUES ('$styleid', '$variable', '$substitute')");
		}

		updatecache('styles');
		cpmsg($renameinfo.'界面方案成功导入。');

	} elseif($edit) {

		if(!$editsubmit) {

			$query = $db->query("SELECT name, templateid FROM $table_styles WHERE styleid='$edit'");
			if(!$style = $db->fetch_array($query)) {
				cpmsg("指定论坛界面不存在，请返回。");
			}

			$stylecustom = '';
			$stylestuff = array();
			$query = $db->query("SELECT * FROM $table_stylevars WHERE styleid='$edit'");
			while($stylevar = $db->fetch_array($query)) {
				if(in_array($stylevar['variable'], $predefinedvars)) {
					$stylestuff[$stylevar['variable']] = array('id' => $stylevar['stylevarid'], 'subst' => $stylevar['substitute']);
				} else {
					$stylecustom .= "<tr align=\"center\"><td bgcolor=\"".ALTBG1."\"><input type=\"checkbox\" name=\"delete[]\" value=\"$stylevar[stylevarid]\"></td>\n".
						"<td bgcolor=\"".ALTBG2."\"><b>{".strtoupper($stylevar[variable])."}</b></td>\n".
						"<td bgcolor=\"".ALTBG1."\"><textarea name=\"stylevar[$stylevar[stylevarid]]\" cols=\"50\" rows=\"2\">$stylevar[substitute]</textarea></td>\n".
						"</tr>";
				}
			}

			$tplselect = "<select name=\"templateidnew\">\n";
			$query = $db->query("SELECT templateid, name FROM $table_templates");
			while($template = $db->fetch_array($query)) {
				$tplselect .= "<option value=\"$template[templateid]\"".
					($style['templateid'] == $template['templateid'] ? 'selected="selected"' : NULL).
					">$template[name]</option>\n";
			}
			$tplselect .= '</select>';

			echo "<form method=\"post\" action=\"admincp.php?action=styles&edit=$edit\">\n";

			showtype('编辑界面方案 - '.$style['name'], 'top');
			showsetting('界面方案名称：', 'namenew', $style['name'], 'text', "识别界面风格的标志，请勿使用空格或特殊符号", '55%');
			showsetting('匹配模板：', '', '', $tplselect, '与本套界面风格相匹配的模板名称', '55%');
			showsetting('论坛 logo：', "stylevar[{$stylestuff[boardimg][id]}]", $stylestuff['boardimg']['subst'], 'text', "如使用 Flash  动画，请用逗号隔开 URL，宽度和高度，如“logo.swf,80,40”", '55%');
			showsetting('界面图片目录：', "stylevar[{$stylestuff[imgdir][id]}]", $stylestuff['imgdir']['subst'], 'text', '', '55%');
			showsetting('Smilies 图片目录：', "stylevar[{$stylestuff[smdir][id]}]", $stylestuff['smdir']['subst'], 'text', '', '55%');

			showtype('文字及颜色设置');
			showsetting('禁用粗体字显示：', "stylevar[{$stylestuff[nobold][id]}]", $stylestuff['nobold']['subst'], 'radio', "选择“是”前台将不显示任何粗体字内容", '55%');
			showsetting('正常字体设置：', "stylevar[{$stylestuff[font][id]}]", $stylestuff['font']['subst'], 'text', "多个候选字体间请用半角逗号 \",\" 分割", '55%');
			showsetting('正常字号设置：', "stylevar[{$stylestuff[fontsize][id]}]", $stylestuff['fontsize']['subst'], 'text', "可使用字号、pt、px(推荐) 等单位", '55%');
			showsetting('小号字体设置：', "stylevar[{$stylestuff[smfont][id]}]", $stylestuff['smfont']['subst'], 'text', "多个候选字体间请用半角逗号 \",\" 分割", '55%');
			showsetting('小号字号设置：', "stylevar[{$stylestuff[smfontsize][id]}]", $stylestuff['smfontsize']['subst'], 'text', "可使用字号、pt、px(推荐) 等单位", '55%');
			showsetting('链接文字颜色：', "stylevar[{$stylestuff[link][id]}]", $stylestuff['link']['subst'], 'color', '', '55%');
			showsetting('表头文字颜色：', "stylevar[{$stylestuff[headertext][id]}]", $stylestuff['headertext']['subst'], 'color', '', '55%');
			showsetting('栏目文字颜色：', "stylevar[{$stylestuff[cattext][id]}]", $stylestuff['cattext']['subst'], 'color', '', '55%');
			showsetting('表格中文字颜色：', "stylevar[{$stylestuff[tabletext][id]}]", $stylestuff['tabletext']['subst'], 'color', '', '55%');
			showsetting('页面中 (表格除外) 文字颜色：', "stylevar[{$stylestuff[text][id]}]", $stylestuff['text']['subst'], 'color', '', '55%');

			showtype('表格与背景颜色设置');
			showsetting('表格边框宽度：', "stylevar[{$stylestuff[borderwidth][id]}]", $stylestuff['borderwidth']['subst'], 'text', '', '55%');
			showsetting('表格边缘空隙：', "stylevar[{$stylestuff[tablespace][id]}]", $stylestuff['tablespace']['subst'],   'text', '', '55%');
			showsetting('表格边框颜色：', "stylevar[{$stylestuff[bordercolor][id]}]", $stylestuff['bordercolor']['subst'], 'color', '', '55%');
			showsetting('页面背景：', "stylevar[{$stylestuff[bgcolor][id]}]", $stylestuff['bgcolor']['subst'], 'color', "输入 16 进制颜色或图片链接", '55%');
			showsetting('表头背景颜色：', "stylevar[{$stylestuff[headercolor][id]}]", $stylestuff['headercolor']['subst'], 'color', "输入   16 进制颜色或图片链接", '55%');
			showsetting('栏目背景颜色：', "stylevar[{$stylestuff[catcolor][id]}]", $stylestuff['catcolor']['subst'], 'color', "输入 16 进制颜色或图片链接", '55%');
			showsetting('表格背景配色 1：', "stylevar[{$stylestuff[altbg1][id]}]", $stylestuff['altbg1']['subst'], 'color', "建议设置为相对表格背景色 2 较深的颜色", '55%');
			showsetting('表格背景配色 2：', "stylevar[{$stylestuff[altbg2][id]}]", $stylestuff['altbg2']['subst'], 'color', "建议设置为相对表格背景色 1 较浅的颜色", '55%');
			showsetting('表格宽度：', "stylevar[{$stylestuff[tablewidth][id]}]", $stylestuff['tablewidth']['subst'], 'text', "可设置为像素或百分比", '55%');
			showtype('', "bottom");

?>
<br><br>
<table cellspacing="0" cellpadding="0" border="0" width="90%" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header" align="center">
<td width="45"><input type="checkbox" name="chkall" class="header" onclick="checkall(this.form)">删?</td>
<td>变量</td><td>替换内容</td></tr>
<?=$stylecustom?>
<tr bgcolor="<?=ALTBG2?>"><td height="1" colspan="3"></td></tr>
<tr align="center"><td bgcolor="<?=ALTBG1?>">新增：</td>
<td bgcolor="<?=ALTBG2?>"><input type='text' name="newcvar" size="20"></td>
<td bgcolor="<?=ALTBG1?>"><textarea name="newcsubst" cols="50" rows="2"></textarea></td>
</tr></table></td></tr></table><br>
<?

			echo "<br><center><input type=\"submit\" name=\"editsubmit\" value=\"更新方案设置\"></center></form>";

		} else {

			if($newcvar && $newcsubst) {
				$query = $db->query("SELECT COUNT(*) FROM $table_stylevars WHERE variable='$newcvar' AND styleid='$edit'");
				if($db->result($query, 0)) {
					cpmsg('新增的替换变量名已经存在，请返回修改。');
				} elseif(!preg_match("/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/s", $newcvar)) {
					cpmsg('新增的替换变量名称不合法，请返回修改。');
				}

				$db->query("INSERT INTO $table_stylevars (styleid, variable, substitute)
					VALUES ('$edit', '$newcvar', '$newcsubst')");
			}

			$db->query("UPDATE $table_styles SET name='$namenew', templateid='$templateidnew' WHERE styleid='$edit'");
			foreach($stylevar as $id => $substitute) {
				$db->query("UPDATE $table_stylevars SET substitute='$substitute' WHERE stylevarid='$id' AND styleid='$edit'");
			}

			if(is_array($delete)) {
				$ids = $comma = '';
				foreach($delete as $id) {
					$ids .= "$comma'$id'";
					$comma = ', ';
				}
				$db->query("DELETE FROM $table_stylevars WHERE stylevarid IN ($ids) AND styleid='$edit'");
			}

			updatecache('styles');
			cpmsg("界面方案成功更新。");

		}

	}

}

?>