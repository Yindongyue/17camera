<?php

/*
	[17camera!] whatsnew.php - new threads list for html pages
	This is NOT a freeware, use is subject to license terms

	Version: 2.2.0
	Author: 17camera (master@17camera.com)
	Copyright: 17camera Studio (www.17camera.com)
	Last Modified: 2002/12/6 17:00
*/

// 17camera! 首页新帖调用程序 whatsnew.php
// 本程序使用方法见 utilities/whatsnew.txt

error_reporting(E_ERROR | E_WARNING | E_PARSE);

$num = 10;				// 显示多少条论坛新贴
$forumurl = 'http://localhost/discuz';	// 论坛 URL 地址
$length = 50;				// 标题显示最大长度(字符数)
$smdir = 'images/smilies';		// Smilies 相对论坛路径
$pre = '□-';				// 标题前字符,如显示为贴子图标,请设置为 "icon"

require './config.php';

mysql_connect($dbhost, $dbuser, $dbpw);
mysql_select_db($dbname);

$fidin = $HTTP_GET_VARS['fidin'];
$fidout = $HTTP_GET_VARS['fidout'];

$pre = addslashes($pre);

$forumadd = '';
$and = '';
$or = '';

if(strtolower($fidin) != 'all') {
	$fidind = explode('_', $fidin);
	$fidoutd = explode('_', $fidout);
	foreach($fidind as $fid) {
		if(trim($fid)) {
			$forumadd .= "$or fid='$fid'";
			$or = ' OR ';
			$and = ' AND ';
		}
	}

	if($forumadd) {
		$forumadd = "( $forumadd )";
	}

	foreach($fidoutd as $fid) {
		if(trim($fid)) {
			$forumadd .= "$and fid<>'$fid'";
			$and = " AND ";
		}
	}
}

if($forumadd) {
	$forumadd = "AND $forumadd";
}	


$query = mysql_query("SELECT subject, tid, icon FROM $tablepre"."threads WHERE closed NOT LIKE 'moved|%' $forumadd ORDER BY lastpost DESC LIMIT 0, $num") or die(mysql_error());
while($threads = mysql_fetch_array($query)) {
	$threads[subject] = htmlspecialchars(wordscut($threads[subject], $length));
	if($pre == "icon") {
		if($threads[icon]) {
			$icon = "<img src='$forumurl/$smdir/$threads[icon]' valign='absmiddle' border='0'>";
		} else {
			$icon = "";
		}
		echo"document.write(\"$icon <a href=$forumurl/viewthread.php?tid=$threads[tid] target=_blank>$threads[subject]</a><br>\");\n";
	} else {
		echo"document.write(\"<a href=$forumurl/viewthread.php?tid=$threads[tid] target=_blank>$pre$threads[subject]</a><br>\");\n";
	}
}

function wordscut($string, $length) {
	if(strlen($string) > $length) {
		for($i = 0; $i < $length - 3; $i++) {
			if(ord($string[$i]) > 127) {
				$wordscut .= $string[$i].$string[$i + 1];
				$i++;
			} else {
				$wordscut .= $string[$i];
			}
		}
		return $wordscut.' ...';
	}
	return $string;
}

?>

