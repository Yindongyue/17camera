<?php

/*
	[17camera!] include/template.php - compile engine of 17camera! templates
	This is NOT a freeware, use is subject to license terms

	Version: 2.2.0
	Author: 17camera (master@17camera.com)
	Copyright: 17camera Studio (www.17camera.com)
	Last Modified: 2002/12/15 10:12
*/


if(!defined('IN_DISCUZ')) {
        exit('Access Denied');
}

function parse_template($file, $templateid, $tpldir) {
	global $discuz_root, $language;

	$nest = 5;
	$tplfile = $discuz_root."./$tpldir/$file.htm";
	$objfile = $discuz_root."./forumdata/templates/{$templateid}_$file.tpl.php";

	if(!@$fp = fopen($tplfile, 'r')) {
		exit("Current template file './$tpldir/$file.htm' not found or have no access!");
	} elseif(!include language('templates', $templateid, $tpldir)) {
		exit("<br>Current template pack do not have a necessary language file 'templates.lang.php' or have syntax error!");
	}

	$template = fread($fp, filesize($tplfile));
	fclose($fp);

	$var_regexp = "((\\\$[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)(\[[a-zA-Z0-9_\"\'\$\x7f-\xff]+\])*)";
	$const_regexp = "([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)";

	$template = preg_replace("/([\n\r]+)\t+/s", "\\1", $template);
	$template = preg_replace("/\<\!\-\-\{(.+?)\}\-\-\>/s", "{\\1}", $template);
	$template = preg_replace_callback("/\{lang\s+(.+?)\}/is", function($m) { return languagevar($m[1]); }, $template);
	$template = str_replace("{LF}", "<?=\"\\n\"?>", $template);

	$template = preg_replace("/\{(\\\$[a-zA-Z0-9_\[\]\'\"\$\x7f-\xff]+)\}/s", "<?=\\1?>", $template);
	$template = preg_replace_callback("/$var_regexp/s", function($m) { return addquote('<?='.$m[1].'?>'); }, $template);
	$template = preg_replace_callback("/\<\?\=\<\?\=$var_regexp\?\>\?\>/s", function($m) { return addquote('<?='.$m[1].'?>'); }, $template);

	$template = "<? if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>\n\n$template";
	$template = preg_replace("/\s*\{template\s+(.+?)\}\s*/is", "\n<? include template('\\1'); ?>\n", $template);
	$template = preg_replace_callback("/\s*\{eval\s+(.+?)\}\s*/is", function($m) { return stripvtags('\n<? '.$m[1].' ?>\n',''); }, $template);
	$template = preg_replace_callback("/\s*\{elseif\s+(.+?)\}\s*/is", function($m) { return stripvtags('\n<? } elseif('.$m[1].') { ?>\n',''); }, $template);
	$template = preg_replace("/\s*\{else\}\s*/is", "\n<? } else { ?>\n", $template);

	for($i = 0; $i < $nest; $i++) {
		$template = preg_replace_callback("/\s*\{loop\s+(\S+)\s+(\S+)\}\s*(.+?)\s*\{\/loop\}\s*/is", function($m) { return stripvtags('\n<? if(is_array('.$m[1].')) { foreach('.$m[1].' as '.$m[2].') { ?>','\n'.$m[3].'\n<? } } ?>\n'); }, $template);
		$template = preg_replace_callback("/\s*\{loop\s+(\S+)\s+(\S+)\s+(\S+)\}\s*(.+?)\s*\{\/loop\}\s*/is", function($m) { return stripvtags('\n<? if(is_array('.$m[1].')) { foreach('.$m[1].' as '.$m[2].' => '.$m[3].') { ?>','\n'.$m[4].'\n<? } } ?>\n'); }, $template);
		$template = preg_replace_callback("/\s*\{if\s+(.+?)\}\s*(.+?)\s*\{\/if\}\s*/is", function($m) { return stripvtags('\n<? if('.$m[1].') { ?>','\n'.$m[2].'\n<? } ?>\n'); }, $template);
	}

	$template = preg_replace("/\{$const_regexp\}/s", "<?=\\1?>", $template);
	$template = preg_replace("/ \?\>[\n\r]*\<\? /s", " ", $template);

	if(!@$fp = fopen($objfile, 'w')) {
		exit("Directory './forumdata/templates/' not found or have no access!");
	}

	flock($fp, 3);
	fwrite($fp, $template);
	fclose($fp);
}

function addquote($var) {
	return str_replace("\\\"", "\"", preg_replace("/\[([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\]/s", "['\\1']", $var));
}

function languagevar($var) {
	if(isset($GLOBALS['language'][$var])) {
		return $GLOBALS['language'][$var];
	} else {
		return "!$var!";
	}
}

function stripvtags($expr, $statement) {
	$expr = str_replace("\\\"", "\"", preg_replace("/\<\?\=(\\\$[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\[\]\"\'\x7f-\xff]*)\?\>/s", "\\1", $expr));
	$statement = str_replace("\\\"", "\"", $statement);
	return $expr.$statement;
}

?>