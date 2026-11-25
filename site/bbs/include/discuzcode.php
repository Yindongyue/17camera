<?php

/*
	[17camera!] include/discuzcode.php - 17camera 17camera! Board global functions
	This is NOT a freeware, use is subject to license terms

	Version: 2.0.0
	Author: 17camera (master@17camera.com)
	Copyright: 17camera Studio (www.17camera.com)
	Last Modified: 2002/12/5 10:00
*/

function censor($message) {
	return $GLOBALS['_DCACHE']['censor'] ? preg_replace($GLOBALS['_DCACHE']['censor']['find'], $GLOBALS['_DCACHE']['censor']['replace'], $message) : $message;
}

function credithide($creditsrequire, $message) {
	if($GLOBALS['credit'] < $creditsrequire && !$GLOBALS['issupermod']) {
		return "<b>**** Hidden to Credits Lower Than $creditsrequire ****</b>";
	} else {
		return "<span class=\"bold\">Below Message for Credits Higher Than $creditsrequire</span><br>==============================<br><br>".stripslashes($message)."<br><br>==============================";
	}
}

function codedisp($code) {
	global $thisbg, $codecount, $post_codecount, $codehtml;
	$post_codecount++;
	$code = htmlspecialchars(str_replace("\\\"", "\"", preg_replace("/^[\n\r]*(.+?)[\n\r]*$/is", "\\1", $code)));
	$codehtml[$post_codecount] = "<br><br><center><table border=\"0\" width=\"90%\" cellspacing=\"0\" cellpadding=\"0\"><tr><td class=\"smalltxt\">&nbsp;&nbsp;Code:</td><td align=\"right\"><a href=\"###\" class=\"smalltxt\" onclick=\"copycode(findobj('code$codecount'));\">[Copy to clipboard]</a>&nbsp;&nbsp;</td></tr><tr><td colspan=\"2\"><table border=\"0\" width=\"100%\" cellspacing=\"1\" cellpadding=\"10\" bgcolor=\"".BORDERCOLOR."\"><tr><td width=\"100%\" bgcolor=\"".ALTBG2."\" style=\"word-break:break-all\" id=\"code$codecount\">$code</td></tr></table></td></tr></table></center><br>";
	$codecount++;
	return "[\tDISCUZ_CODE_$post_codecount\t]";
}

function parseurl($message) {
	return preg_replace(	array(
					"/(?<=[^\]A-Za-z0-9-=\"'\\/])(https?|ftp|gopher|news|telnet|mms){1}:\/\/([A-Za-z0-9\/\-_+=.~!%@?#%&;:$\\()|]+)/is",
					"/([\n\s])www\.([a-z0-9\-]+)\.([A-Za-z0-9\/\-_+=.~!%@?#%&;:$\[\]\\()|]+)((?:[^\x7f-\xff,\s]*)?)/is",
					"/(?<=[^\]A-Za-z0-9\/\-_.~?=:.])([_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,4}))/si"
				), array(
					"[url]\\1://\\2[/url]",
					"\\1[url]www.\\2.\\3\\4[/url]",
					"[email]\\0[/email]"
				), ' '.$message);
}

function postify($message, $smileyoff, $bbcodeoff, $allowsmilies = 1, $allowhtml = 0, $allowbbcode = 1, $allowimgcode = 1) {
	global $credit, $tid, $discuz_user, $codehtml, $post_codecount, $thisbg, $highlight, $table_posts, $db, $searcharray, $replacearray, $ismoderator;

	$post_codecount = -1;

	if(!$bbcodeoff && $allowbbcode) {
		$message = preg_replace_callback("/\s*\[code\](.+?)\[\/code\]\s*/is", function($m) { return codedisp($m[1]); }, $message);
	}

	if(!$allowhtml) {
		$message = dhtmlspecialchars($message);
	}

	if(!$smileyoff && $allowsmilies) {
		if(is_array($GLOBALS['_DCACHE']['smilies'])) {
			foreach($GLOBALS['_DCACHE']['smilies'] as $smiliey) {
				$message = str_replace($smiliey['code'], "<img src=\"".SMDIR."/$smiliey[url]\" align=\"absmiddle\" border=\"0\">",$message);
			}
		}
	}

	if(!$bbcodeoff && $allowbbcode) {

		$message = preg_replace_callback("/\[url\]\s*(www\.|https?:\/\/|ftp:\/\/|gopher:\/\/|news:\/\/|telnet:\/\/|rtsp:\/\/|mms:\/\/)([^\[]+?)\s*\[\/url\]/i", function($m) { return urlcut($m[1].$m[2]); }, $message);

		if(!$searcharray['bbcode'] || !$replacearray['bbcode']) {
			$nests = 2;
			$searcharray['bbcode'] = array(
				"/\s*\[quote\][\n\r]*(.+?)[\n\r]*\[\/quote\]\s*/is",
				"/\[url=www.([^\[]+?)\](.+?)\[\/url\]/is",
				"/\[url=(https?|ftp|gopher|news|telnet|rtsp|mms){1}:\/\/([^\[]+?)\](.+?)\[\/url\]/is",
				"/\[email\]\s*([A-Za-z0-9\-_.]+)@([A-Za-z0-9\-_]+[.][A-Za-z0-9\-_.]+)\s*\[\/email\]/i",
				"/\[email=([A-Za-z0-9\-_.]+)@([A-Za-z0-9\-_]+[.][A-Za-z0-9\-_.]+)\](.+?)\[\/email\]/is",
				"/\[color=([^\[]+?)\]/i",
				"/\[size=([^\[]+?)\]/i",
				"/\[font=([^\[]+?)\]/i",
				"/\[align=([^\[]+?)\]/i"
			);
			$replacearray['bbcode'] = array(
				"<br><br><center><table border=\"0\" width=\"90%\" cellspacing=\"0\" cellpadding=\"0\"><tr><td>&nbsp;&nbsp;Quote:</td></tr><tr><td><table border=\"0\" width=\"100%\" cellspacing=\"1\" cellpadding=\"10\" bgcolor=\"".BORDERCOLOR."\"><tr><td width=\"100%\" bgcolor=\"".ALTBG2."\">\\1</td></tr></table></td></tr></table></center><br>",
				"<a href=\"http://www.\\1\" target=\"_blank\">\\2</a>",
				"<a href=\"\\1://\\2\" target=\"_blank\">\\3</a>",
				"<a href=\"mailto:\\1@\\2\">\\1@\\2</a>",
				"<a href=\"mailto:\\1@\\2\">\\3</a>",
				"<font color=\"\\1\">",
				"<font size=\"\\1\">",
				"<font face=\"\\1\">",
				"<p align=\"\\1\">",
			);

			for($i = (count($searcharray['bbcode']) - 1) * $nests; $i >= 0; $i -= $nests) {
				for($j = $i; $j > $i - $nests; $j--) {
					$searcharray['bbcode'][$j] = $searcharray['bbcode'][(($i + 1) / $nests)];
					$replacearray['bbcode'][$j] = $replacearray['bbcode'][(($i + 1) / $nests)];
				}
			}

		}
		$message = preg_replace($searcharray['bbcode'], $replacearray['bbcode'], $message);

		$message = str_replace('[/color]', '</font>', $message);
		$message = str_replace('[/size]', '</font>', $message);
		$message = str_replace('[/font]', '</font>', $message);
		$message = str_replace('[/align]', '</p>', $message);

		$message = str_replace('[b]', '<b>', $message);
		$message = str_replace('[/b]', '</b>', $message);
		$message = str_replace('[i]', '<i>', $message);
		$message = str_replace('[/i]', '</i>', $message);
		$message = str_replace('[u]', '<u>', $message);
		$message = str_replace('[/u]', '</u>', $message);
        $message = str_replace('[center]', '<center>', $message); //fix,plus: Add bbcode code
        $message = str_replace('[/center]', '</center>', $message);//fix,plus: Add bbcode code
		$message = str_replace('[fly]', '<marquee width="90%" behavior="alternate" scrollamount="3">', $message);
		$message = str_replace('[/fly]', '</marquee>', $message);
		$message = str_replace('[list]', '<ul>', $message);
		$message = str_replace('[list=1]', '<ol type=1>', $message);
		$message = str_replace('[list=a]', '<ol type=a>', $message);
		$message = str_replace('[list=A]', '<ol type=A>', $message);
		$message = str_replace('[*]', '<li>', $message);
		$message = str_replace('[/list]', '</ul></ol>', $message);

		if(preg_match("/\[hide=?\d*\].+?\[\/hide\]/is", $message)) {
			if(stristr($message, '[hide]') ) { //fix: code [HIDE]
				$query = $db->query("SELECT COUNT(*) FROM $table_posts WHERE tid='$tid' AND author='$discuz_user'");
				if($ismoderator || $db->result($query, 0)) {
					$message = preg_replace("/\[hide\]\s*(.+?)\s*\[\/hide\]/is", "<span class=\"bold\">Below Message for Repliers</span><br>==============================<br><br>\\1<br><br>==============================", $message);
				} else {
					$message = preg_replace("/\[hide\](.+?)\[\/hide\]/is", "<b>**** Hidden to Non-Reply Visitors *****</b>", $message);
				}
			}
			$message = preg_replace_callback("/\[hide=(\d+)\]\s*(.+?)\s*\[\/hide\]/is", function($m) { return credithide($m[1], $m[2]); }, $message);
		}
	}

	if(!$bbcodeoff && $allowimgcode) {
		if(empty($searcharray['imgcode']) || empty($replacearray['imgcode'])) {
			$searcharray['imgcode'] = array(
				"/\[swf\]\s*([^\[]+?)\s*\[\/swf\]/ies",
				"/\[img\]\s*([^\[]+?)\s*\[\/img\]/ies",
				"/\[img=(\d{1,3})[x|\,](\d{1,3})\]\s*([^\[]+?)\s*\[\/img\]/ies",
				"/\[MP=*([0-9]*),*([0-9]*)\](.[^\[]*)\[\/MP]/ies",
				"/\[RM=*([0-9]*),*([0-9]*)\](.[^\[]*)\[\/RM]/ies",
				
			);
			$replacearray['imgcode'] = array(
				"bbcodeurl('\\1','<a href= \"$1\" TARGET=_blank><IMG SRC=\"images/attachicon/flash.gif\" border=0 alt=?????????FLASH??! height=16 width=16>[full]</a><br><OBJECT codeBase=http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=4 classid=clsid:D27CDB6E-AE6D-11cf-96B8-444553540000 width=500 height=400><PARAM NAME=movie VALUE= $1 ><PARAM NAME=quality VALUE=high></OBJECT>')",
				"bbcodeurl('\\1', '<img src=\"%s\" border=\"0\" onload=\"if(this.width>screen.width-333) {this.width=screen.width-333;this.alt=\'Click Here to Open New Window\';}\" onmouseover=\"if(this.alt) this.style.cursor=\'hand\';\" onclick=\"if(this.alt) window.open(\'%s\');\">')",
				"bbcodeurl('\\3', '<img width=\"\\1\" height=\"\\2\" src=\"%s\" border=\"0\" onload=\"if(this.width>screen.width-333) {this.width=screen.width-333;this.alt=\'Click Here to Open New Window\';}\" onmouseover=\"if(this.alt) this.style.cursor=\'hand\';\" onclick=\"if(this.alt) window.open(\'%s\');\">')",
			    "bbcodeurl('\\3','<object align=middle classid=CLSID:22d6f312-b0f6-11d0-94ab-0080c74c7e95 class=OBJECT id=MediaPlayer width=$1 height=$2 ><param name=ShowStatusBar value=-1><param name=Filename value=$3><embed type=application/x-oleobject codebase=http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=5,1,52,701 flename=mp src=$3 width=$1 height=$2></embed></object>')",
				"bbcodeurl('\\3','<OBJECT classid=clsid:CFCDAA03-8BE4-11cf-B84B-0020AFBBCCFA class=OBJECT id=RAOCX width=$1 height=$2><PARAM NAME=SRC VALUE=$3><PARAM NAME=CONSOLE VALUE=Clip1><PARAM NAME=CONTROLS VALUE=imagewindow><PARAM NAME=AUTOSTART VALUE=true></OBJECT><br><OBJECT classid=CLSID:CFCDAA03-8BE4-11CF-B84B-0020AFBBCCFA height=32 id=video2 width=$1><PARAM NAME=SRC VALUE=$3><PARAM NAME=AUTOSTART VALUE=-1><PARAM NAME=CONTROLS VALUE=controlpanel><PARAM NAME=CONSOLE VALUE=Clip1></OBJECT>')",
			
			);
		}
		$message = preg_replace($searcharray['imgcode'], $replacearray['imgcode'], $message);
	}

	for($i = 0; $i <= $post_codecount; $i++) {
		$message = str_replace("[\tDISCUZ_CODE_$i\t]", $codehtml[$i], $message);
	}

	if($highlight) {
		foreach(explode('+', $highlight) as $ret) {
			$ret = addcslashes($ret, "/()[]|.:!=<>?^\$");
			if($ret) {
				$message = preg_replace("/([ \f\r\t\n]|^)$ret([ \f\r\t\n]|$)/is", "\\1<u><b><font color=\"#FF0000\">$ret</font></b></u>\\2", $message); //fix_beta:hightlight some url
			}
		}
	}

	$message = nl2br($message);
	$message = str_replace("\t", '&nbsp; &nbsp; &nbsp; &nbsp; ', $message);
	$message = str_replace('   ', '&nbsp; &nbsp;', $message);
	$message = str_replace('  ', '&nbsp;&nbsp;', $message);

	return $message;
}

function urlcut($url) {
	$length = 65;
	$urllink = "<a href=\"".(substr(strtolower($url), 0, 4) == 'www.' ? "http://$url" : $url)."\" target=\"_blank\">";
	if(strlen($url) > $length) {
		$url = substr($url, 0, intval($length * 0.5)).' ... '.substr($url, - intval($length * 0.3));
	}
	$urllink .= $url.'</a>';
	return $urllink;
}

function bbcodeurl($url, $tags) {
	//FIX: 去除部分链接中含有的非法字符
	if(!preg_match("/<.+?>/s",$url)) {
		if(!in_array(strtolower(substr($url, 0, 6)), array('http:/', 'ftp://', 'rtsp:/', 'mms://'))) {
			$url = 'http://'.$url;
		}
		$url = str_replace(array('>', '<', '"','submit=','subscriptions','favorites'),array('', '', "&quot;",'','','' ),  urldecode($url));
		return sprintf($tags, $url, $url);
	} else {
		return '&nbsp;'.$url;
	}
}
?>