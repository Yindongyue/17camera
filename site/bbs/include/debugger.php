<?

/*
	[17camera!] include/debugger.php - some debug tools for developing
	This is NOT a freeware, use is subject to license terms

	Version: 0.0.1
	Author: 17camera (master@17camera.com)
	Copyright: 17camera Studio (www.17camera.com)
	Last Modified: 2002/12/12 10:00
*/

function timer() {
	global $_timer;

	if(empty($_timer['start'])) {
		$mtime = explode(' ', microtime());
		$_timer['start'] = $mtime[1] + $mtime[0];
		$_timer['count'] ++;
	} else {
		$mtime = explode(' ', microtime());
		echo '<br>17camera! timer #'.$_timer['count'].': '.number_format(($mtime[1] + $mtime[0] - $_timer['start']), 6);
		unset($_timer['start']);
	}
}

function serverload() {
	if(@$fp = fopen('/proc/loadavg','r')) {
		$loadavg = explode(' ', @fread($fp, 6));
		@fclose($fp);
		return trim($loadavg[0]);
	} else {
		return FALSE;
	}
}

?>