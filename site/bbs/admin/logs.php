<?php

/*
	[17camera!] admin/logs.php - view board logs
	This is NOT a freeware, use is subject to license terms

	Version: 1.0.0
	Author: 17camera (master@17camera.com)
	Copyright: 17camera Studio (www.17camera.com)
	Last Modified: 2002/12/23 20:56
*/


if(!defined("IN_DISCUZ")) {
        exit("Access Denied");
}

cpheader();

$logs = array();
$logdir = $discuz_root.'./forumdata';
$maxlogrows = 300;
$lpp = 30;

$filename = "$logdir/$action.php";
@$logfile = file($filename);
@$fp = fopen($filename, "w");
@flock($fp, 3);
@fwrite($fp, "<?PHP exit(\"Access Denied\"); ?>\n");

for($i = count($logfile) - $maxlogrows; $i < count($logfile); $i++) {
	if(strpos($logfile[$i], "\t")) {
		$logfile[$i] = trim($logfile[$i]);
		$logs[] = $logfile[$i];
		@fwrite($fp, "$logfile[$i]\n");
	}
}
@fclose($fp);

if(!$page) {
	$page = 1;
}
$start = ($page - 1) * $lpp;
$logs = array_reverse($logs);
$num = count($logs);
$multipage = multi($num, $lpp, $page, "admincp.php?action=$action");

for($i = 0; $i < $start; $i++) {
	unset($logs[$i]);
}
for($i = $start + $lpp; $i < $num; $i++) {
	unset($logs[$i]);
}

?>
<table cellspacing="0" cellpadding="0" border="0" width="95%" align="center">
<tr class="multi"><td><?=$multipage?></td></tr>
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<?

if($action == "illegallog") {

	echo "<tr class=\"header\"><td colspan=\"4\">密码错误记录</td></tr>\n".
		"<tr class=\"header\" align=\"center\"><td>尝试用户名</td><td>尝试密码</td><td>IP 地址</td><td>时间</td></tr>\n";

	foreach($logs as $logrow) {
		$log = explode("\t", $logrow);
		if(strtolower($log[0]) == strtolower($discuz_userss)) {
			$log[0] = "<b>$log[0]</b>";
		}
		//$log[0] = addslashes($log[0]);
		$log[3] = gmdate("y-n-j H:i", $log[3] + $timeoffset * 3600);

		echo "<tr align=\"center\"><td bgcolor=\"".ALTBG1."\" width=\"25%\">$log[0]</td>\n".
			"<td bgcolor=\"".ALTBG2."\" width=\"25%\">$log[1]</td><td bgcolor=\"".ALTBG1."\" width=\"25%\">$log[2]</td>\n".
			"<td bgcolor=\"".ALTBG2."\" width=\"25%\">$log[3]</td></tr>\n";
	}

} elseif($action == "karmalog") {

	echo "<tr class=\"header\"><td colspan=\"7\">用户评分记录</td></tr>\n".
		"<tr class=\"header\" align=\"center\"><td>用户名</td><td>头衔</td><td>时间</td><td>被评价用户</td><td>分数</td><td>主题</td></tr>\n";

	foreach($logs as $logrow) {
		$log = explode("\t", $logrow);
		$log[0] = "<a href=\"viewpro.php?username=".rawurlencode($log[0])."\" target=\"_blank\">$log[0]";
		$log[3] = "<a href=\"viewpro.php?username=".rawurlencode($log[3])."\" target=\"_blank\">$log[3]</a>";
		if($log[3] == $discuz_userss) {
			$log[3] = "<b>$log[3]</b>";
		}
		$log[2] = gmdate("y-n-j H:i", $log[2] + $timeoffset * 3600);
		$log[4] = $log[4] < 0 ? "<b>$log[4]</b>" : $log[4];
		$log[6] = "<a href=\"./viewthread.php?tid=$log[5]\" target=\"_blank\">".wordscut($log[6], 20)."</a>";

		echo "<tr align=\"center\"><td bgcolor=\"".ALTBG1."\" width=\"15%\">$log[0]</a></td><td bgcolor=\"".ALTBG2."\" width=\"12%\">$log[1]</td>\n".
			"<td bgcolor=\"".ALTBG1."\" width=\"18%\">$log[2]</td><td bgcolor=\"".ALTBG2."\" width=\"15%\">$log[3]</td>\n".
			"<td bgcolor=\"".ALTBG1."\" width=\"8%\">$log[4]</td><td bgcolor=\"".ALTBG2."\" width=\"28%\">$log[6]</td></tr>\n";
	}

} elseif($action == "modslog") {

	echo "<tr class=\"header\"><td colspan=\"7\">版主管理记录</td></tr>\n".
		"<tr class=\"header\" align=\"center\"><td width=\"10%\">用户名</td><td width=\"15%\">头衔</td><td width=\"10%\">IP 地址</td><td width=\"18%\">时间</td><td width=\"15%\">论坛</td><td width=\"19%\">贴子</td><td width=\"13%\">动作</td></tr>\n";

	foreach($logs as $logrow) {
		$log = explode("\t", $logrow);
		//$log[0] = addslashes($log[0]);
		if($log[0] != $discuz_user) {
			$log[0] = "<b>$log[0]</b>";
		}
		$log[3] = gmdate("y-n-j H:i", $log[3] + $timeoffset * 3600);
		$log[5] = "<a href=\"./forumdisplay.php?fid=$log[4]\" target=\"_blank\">$log[5]</a>";
		$log[7] = "<a href=\"./viewthread.php?tid=$log[6]\" target=\"_blank\">".wordscut($log[7], 15)."</a>";

		echo "<tr align=\"center\"><td bgcolor=\"".ALTBG1."\">$log[0]</td>\n".
			"<td bgcolor=\"".ALTBG2."\">$log[1]</td><td bgcolor=\"".ALTBG1."\">$log[2]</td>\n".
			"<td bgcolor=\"".ALTBG2."\">$log[3]</td><td bgcolor=\"".ALTBG1."\">$log[5]</td>\n".
			"<td bgcolor=\"".ALTBG2."\">$log[7]</td><td bgcolor=\"".ALTBG1."\">$log[8]</td></tr>\n";
	}

} elseif($action == "cplog") {

	echo "<tr class=\"header\"><td colspan=\"5\">系统管理记录</td></tr>\n".
		"<tr class=\"header\" align=\"center\"><td width=\"15%\">管理员</td><td width=\"15%\">IP 地址</td><td width=\"18%\">时间</td><td width=\"15%\">动作</td><td width=\"37%\">其他</td></tr>\n";

	foreach($logs as $logrow) {
		$log = explode("\t", $logrow);
		//$log[0] = addslashes($log[0]);
		if($log[0] != $discuz_user) {
			$log[0] = "<b>$log[0]</b>";
		}
		$log[2] = gmdate("y-n-j H:i", $log[2] + $timeoffset * 3600);

		echo "<tr align=\"center\"><td bgcolor=\"".ALTBG1."\">$log[0]</td>\n".
			"<td bgcolor=\"".ALTBG2."\">$log[1]</td><td bgcolor=\"".ALTBG1."\">$log[2]</td>\n".
			"<td bgcolor=\"".ALTBG2."\">$log[3]</td><td bgcolor=\"".ALTBG1."\">$log[4]</td></tr>\n";
	}

}

?>
</table></td></tr><tr class="multi"><td><?=$multipage?></td></tr>
</table>