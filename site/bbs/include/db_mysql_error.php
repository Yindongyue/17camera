<?

/*
	[17camera!] include/db_mysql_error.php - error report module for MySQL class
	This is NOT a freeware, use is subject to license terms

	Version: 2.2.0
	Author: 17camera (master@17camera.com)
	Copyright: 17camera Studio (www.17camera.com)
	Last Modified: 2002/12/5 10:00
*/


if(!defined('IN_DISCUZ')) {
        exit('Access Denied');
}

$timestamp = time();
$errmsg = '';

$dberror = $this->error();
$dberrno = $this->errno();

if($dberrno == 1114) {

?>
<html>
<head><title>Max onlines reached</title></head>
<body>
<table cellpadding="0" cellspacing="0" border="0" width="500" height="90%" align="center" style="font-family: Verdana, Tahoma;font-size: 9px;color: #000000">
<tr><td height="50%">&nbsp;</td></tr><tr><td valign="middle" align="center" bgcolor="#EAEAEA">
<br><b style="font-size: 11px;">Forum onlines reached the upper limit</b><br><br><br>Sorry, the number of online visitors has reached the upper limit.<br>Please wait for someone else going offline or visit us in idle hours.<br><br></td>
</tr><tr><td height="50%">&nbsp;</td></tr></table>
</body>
</html>
<?

	exit;

} else {

	$discuz_user = $GLOBALS['_DSESSION']['discuz_user'] ?? $GLOBALS['HTTP_COOKIE_VARS']['_discuz_user'] ?? '';
	if($message) {
		$errmsg = "<b>17camera! info</b>: $message\n\n";
	}
	if($discuz_user) {
		$errmsg .= "<b>User</b>: $discuz_user\n";
	}
	$errmsg .= "<b>Time</b>: ".gmdate("Y-n-j g:ia", $timestamp + ($GLOBALS["timeoffset"] * 3600))."\n";
	$errmsg .= "<b>Script</b>: ".($GLOBALS['PHP_SELF'] ?? '')."\n\n";
	if($sql) {
		$errmsg .= "<b>SQL</b>: ".htmlspecialchars($sql)."\n";
	}
	$errmsg .= "<b>Error</b>:  $dberror\n";
	$errmsg .= "<b>Errno.</b>:  $dberrno";

	echo "</table></table></table></table></table>\n";
	echo "<p style=\"font-family: Verdana, Tahoma; font-size: 11px; background: #FFFFFF;\">";
	echo nl2br($errmsg);
	if($GLOBALS['adminemail']) {
		$errnos = array();
		$errorlogs = '';
		if($errlog = @file('./forumdata/dberror.log')) {
			for($i = 0; $i < count($errlog); $i++) {
				$log = explode("\t", $errlog[$i]);
				if(($timestamp - $log[0]) > 86400) {
					$errlog[$i] = "";
				} else {
					$errnos[] = $log[1];
				}
			}
		}
		if(!in_array($dberrno, $errnos)) {
			$errorlogs .= "$timestamp\t$dberrno\n";
			echo "<br><br>An error report has been dispatched to our administrator.";
			sendmail($GLOBALS['adminemail'], '[17camera!] MySQL Error Report',
					"There seems to have been a problem with the database of your 17camera! Board\n\n".
					strip_tags($errmsg)."\n\n".
					"Please check-up your MySQL server and forum scripts, similar errors will not be reported again in recent 24 hours\n".
					"If you have troubles in solving this problem, please visit 17camera! Community .");
		} else {
			echo '<br><br>Similar error report has beed dispatched to administrator before.';
		}
		for($i = 0; $i < count($errlog); $i++) {
			$errorlogs .= $errlog[$i] ? trim($errlog[$i])."\n" : NULL;
		}
		@$fp = fopen('./forumdata/dberror.log', 'w');
		@flock($fp, 3);
		@fwrite($fp, $errorlogs);
		@fclose($fp);
	}
	echo '</p>';
	exit;

}

?>