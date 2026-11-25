<?php
					// 数据库
$bbstable = 'bbs1';				// Post表名(中间用逗号分隔)
$dvpre = '';							//DV论坛数据表前缀
$pre = "cdb_";							// Discuz! 数据库名前缀, 需和 config.php 设置的一致
$dbhost = "localhost";					// 数据库主机名，同一台机器就不用改 
$dbuser = "17pub";						// 数据库用户名 
$dbpasswd = "17171717";					// 数据库密码 
$dbname = "17pub"; 						// vB 和 Discuz! 数据库名
$many = 10000;							// 如果您的服务器比较慢,请将这个值调小
										// 如果您曾经大批量删过帖(超过1千)，建议您不要修改该值

// 下面是程序部分不需改动！！！！！！！！！！！！！！！！！！ ==========================================================
echo "<html>\n";
echo "<head>\n";
echo "<style>\n";
echo "<!--\n";
echo "body { font-size:12px;color:#333333;font-family:Verdana }\n";
echo ".bt1 { font-size:16px;color:#FF0000;font-weight:bold;text-align:center }\n";
echo ".bt2 { color:#008000;text-align:center }\n";
echo ".bt3 { color:#0000FF; font-weight:bold;text-align:center }\n";
echo ".zw1 { font-size:10px;line-height:90% }\n";
echo "-->\n";
echo "</style>\n";
echo "</head>\n";
echo "<body style=\"boder:20px\" topmargin=10 leftmargin=10 scroll=no>\n";
error_reporting(7);
@set_time_limit(1000);
if(!get_cfg_var("register_globals")) {
	foreach($HTTP_GET_VARS as $key => $val) {
		$$key = $val;
	}
	unset($HTTP_GET_VARS);
}

mysql_connect($dbhost, $dbuser, $dbpasswd) or die(mysql_error());
mysql_select_db($dbname) or die(mysql_error());

	echo "<title>4 --&gt; 5 ID: $start --&gt; $end 转换中……</title>\n";
	echo"<font class=bt1><b>正在进行转换第 4 步(共 5 步) 如果您的数据很多,则这一步需要时间较长</b></font><br><br>\n";
	echo"<font class=bt2>现在转换贴子. 本转换可能经历多次跳转, 请不要关闭浏览器.</font><br>\n";
	echo"<font class=bt3>现在开始转换 id 从 $start 到 $end 的主题.</font><br><br>";
	echo "<div style='padding-left:100px'>";
	$sql="select pid,message from cdb_posts";
	$rs=mysql_query($sql) or die("Invalid query: " . mysql_error());
	     while ($line = mysql_fetch_array($rs)) {
			//$line['message'] = str_replace("http://localhost/bbs/", "http:///bbs/", strip_tags($line['message']));
			$line['message'] = str_replace("http://http://", "http://", strip_tags($line['message']));
			$sql2="update cdb_posts set message= '".$line['message']."' where pid = '".$line['pid']."'";
			mysql_query($sql2);
			$error = mysql_error();
	       }
 echo "------------------------------------------------------------------------------";
  echo "OK";
   echo "-----------------------------------------------------------------------------";
?>





























































































<?
echo "<br><br><br><br><p align=center style='color:#666666'>&copy; 北京康盛世纪科技有限公司 2004</p>\n"; 
echo "</body>\n";
echo "</html>";

function redirect($url) {
	echo"<script>";
	echo"function redirect() {window.location.replace('$url');}\n";
	echo"setTimeout('redirect();', 2000);\n";//debug
	echo"</script>";
	echo"<p align=right><a href=\"$url\">如果您的浏览器没有自动跳转，请点击这里</a></p>";
}

function daddslashes($string) {
	if(is_array($string)) {
		foreach($string as $key => $val) {
			$string[$key] = daddslashes($val, $force);
		}
	} else {
		$string = addslashes($string);
	}
	return $string;
}

function timeconv($time) {
	return strtotime(str_replace(array(' 一月 ',' 二月 ',' 三月 ',' 四月 ',' 五月 ',' 六月 ',' 七月 ',' 八月 ',' 九月 ',' 十月 ',' 十一月 ',' 十二月 '), array('-1-','-2-','-3-','-4-','-5-','-6-','-7-','-8-','-9-','-10-','-11-','-12-'), $time));
}
?>