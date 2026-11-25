<?php
/* ============================================================================ */
/* vBulletin to Discuz! 论坛转换程序						*/
/* 本程序用来转换 vB 2.x.x 到 Discuz! 1.0(以后版本未知)				*/
/* ============================================================================ */
/*

   使用完本程序请务必删除, 否则可能被别人再次转换,覆盖掉 Discuz! 论坛新贴.

   注意：如在win下运行本程序 需要对php.ini进行修改，并重启服务器后才能正常转换
   1. ;extension=php_mssql.dll 去掉前面分号
   2. ;mssql.textlimit = 4096 去掉前面分号，将4096改为2147483647
   3. ;mssql.textsize = 4096 去掉前面分号，将4096改为2147483647
*/
// 请仔细设置下面变量!! ==========================================================

$ms_dbhost = 'localhost';				// mssql 数据库服务器
$ms_dbuser = 'sa';						// mssql 用户名
$ms_dbpasswd = 'server';				// mssql 密码
$ms_dbname = 'bbs';						// 数据库
$bbstable = 'bbs1,bbs2';				// Post表名(中间用逗号分隔)
$attachurl = 'http://bbs.mumayi.net';	//图片附件的绝对地址 后面不加"/"
$dvpre = 'Dv_';							//DV论坛数据表前缀
$pre = "cdb_";							// Discuz! 数据库名前缀, 需和 config.php 设置的一致
$dbhost = "localhost";					// 数据库主机名，同一台机器就不用改 
$dbuser = "root";						// 数据库用户名 
$dbpasswd = "jinhui";					// 数据库密码 
$dbname = "v2"; 						// vB 和 Discuz! 数据库名
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
mssql_connect($ms_dbhost, $ms_dbuser, $ms_dbpasswd);
mssql_select_db($ms_dbname);
mysql_connect($dbhost, $dbuser, $dbpasswd) or die(mysql_error());
mysql_select_db($dbname) or die(mysql_error());
mssql_query("SET TEXTSIZE 1024000");
if(!$action) {
	echo "<title>欢迎使用DvSQL2DisczV2! (动网SQL论坛 to Discuz2.0!) 转换程序</title>\n";
	echo"<center>欢迎使用DvSQL2DisczV2! (动网SQL论坛 to Discuz2.0!) 转换程序<br>\n";
	echo"<br>本程序可实现 动网各版本数据到 Discuz! 2.0 的数据转换.<br><br>\n";
	echo"请确认您用安装向导成功安装了 Discuz2.0!.建议您在本地运行本程序<br><br>\n";
	echo"由于动网各版本数据存储均有不同,所以转换操作需要一定的相关知识.<br><br>\n";
	echo"Discuz2.0! 数据库中的用户,论坛,贴子数据都会被覆盖,但源库(动网 数据)不会被修改,请您放心.<br><br>\n";
	echo"如果转换过程中出现超时,请把 \$many 变量设置小一点.如果中间出现转换超时,可以修改本程序设置,重新再来.<br><br>\n";
	echo"注意：本程序仅为转换\"可选\"工具,我们不对数据转换过程中,发生的一切问题负责!使用本程序为您自愿行为.<br>";
	echo"在使用中,遇到什么问题可以到我们的论坛上交流 www.Discuz.net。<br><br>";
	echo"<br><font class=bt1><b>转换过程是自动的(如果不出现错误)!您不需干预,请静静等待出现转换全部成功的提示</b></font><br><br>\n";
	echo"<br><a href=\"dvsql2discuzv2.php?action=user\">点击这里开始转换</a></center>";
} elseif($action == "user") {
	if(!$start) {
		mysql_query("TRUNCATE TABLE $pre"."members");
		$start = 0;
	}
	$end = $start + $many;
	$converted = 0;
	$query = mssql_query("SELECT * FROM Dv_User WHERE UserID BETWEEN $start AND $end");
	echo "<title>1 --&gt; 5 ID: $start --&gt; $end 转换中……</title>\n";
	echo"<font class=bt1><b>正在进行转换第 1 步(共 5 步)</b></font><br>\n";
	echo"<font class=bt2>现在转换用户资料</font><br>";
	echo"<font class=bt3>现在开始转换 id 从 $start 到 $end 的用户.</font><br><br>";
	echo "<div style='padding-left:100px;line-height:90%'>";
	while($user = mssql_fetch_assoc($query)) {
		$user = daddslashes($user);
		$user['JoinDate'] = timeconv($user['JoinDate']);
		$user['lastlogin'] = timeconv($user['lastlogin']);
		$sql = "INSERT INTO {$pre}members
		(uid,username, password, status, regip, regdate, lastvisit, email, dateformat, timeformat, showemail, newsletter, timeoffset)
		VALUES ('$user[UserID]', '$user[UserName]', '$user[UserPassword]', 'Member', '$user[UserLastIp]', '$user[JoinDate]', '$user[lastlogin]', '$user[UserEmail]', 'Y-n-j', 'h:i A', '1', '1', '8')";
		mysql_query($sql) or exit($sql.'<br>'.mysql_error());
		$converted = 1;
	}
	if($converted) {
		$end ++;
		echo "转换 [用户]数据 操作进行中，请稍候……";
		echo "</div>";
		redirect("dvsql2discuzv2.php?action=user&start=$end");
	} else {
		$adminpassword=md5("dvsql2discuzV2");
		mysql_query("INSERT INTO cdb_members (username, password, status, regip, regdate, lastvisit, email, dateformat, timeformat, showemail, newsletter, timeoffset)
		VALUES ('dvsql2discuzV2', '$adminpassword', 'Admin', 'hidden', '".time()."', '".time()."', '$email', 'Y-n-j', 'h:i A', '1', '1', '8')");
		echo "转换 [用户]数据完成，即将进行 [论坛板块设置] 转换 请稍候……";
		echo "</div>";
		redirect("dvsql2discuzv2.php?action=forums");
	}
} elseif ($action == "forums") {
	echo "<title>2 --&gt; 5  论坛设置 转换中……</title>\n";
	echo"<font class=bt1><b>正在进行转换第 2 步(共 5 步)</b></font><br><br>\n";
	echo"<font class=bt2>现在转换论坛设置. 注意: 只能转换分类,一,二级论坛.<br>\n";
	echo"而且,所有动网论坛即使原来的\"关闭\"的,转换后都被设置为\"打开\"</font><br><br>\n";
	mysql_query("TRUNCATE TABLE $pre"."forums");
	$query = mssql_query("SELECT * FROM {$dvpre}Board ORDER BY boardid");
	echo "<div style='padding-left:100px;line-height:90%'>";
	while($forum = mssql_fetch_assoc($query)) {
		$forum = daddslashes($forum);
		if(isset($forum['Depth']) && $forum['Depth'] == 0) {
			$sql="INSERT INTO {$pre}forums 
					(fid,type,name,description,status,displayorder,fup)
					VALUES ('$forum[boardid]','group','$forum[BoardType]','',1,'$forum[Orders]',0)";
			mysql_query($sql) or exit($sql.mysql_error());
		} else{
			$sql="INSERT INTO {$pre}forums
					(fid,type,name,description,status,displayorder,threads,posts,allowhtml, allowimgcode, allowbbcode, allowsmilies,fup)
					VALUES ('$forum[boardid]','forum','$forum[BoardType]','$forum[readme]',1,'$forum[Orders]','$forum[TopicNum]','$forum[PostNum]',0,1,1,1,'$forum[ParentID]')";
                    mysql_query($sql) or die($sql.mysql_error());
		}
	}
	echo "转换 [论坛板块设置] 操作进行中，请稍候……";
	echo "</div>";
	redirect("dvsql2discuzv2.php?action=threads");
} elseif ($action == "threads") {
	if(!$start) {
		$query = mssql_query("SELECT MIN(TopicID) AS Expr1 FROM Dv_Topic");
		$start_array=mssql_fetch_assoc($query);
		$start=$start_array['Expr1'];
		mysql_query("TRUNCATE TABLE $pre"."threads");
	}
	$end = $start + $many;
	$converted = 0;
	echo "<title>3 --&gt; 5 ID: $start --&gt; $end 转换中……</title>\n";
	echo"<font class=bt1><b>正在进行转换第 3 步(共 5 步) 如果您的数据很多,则这一步需要时间较长</b></font><br><br>\n";
	echo"<font class=bt2>现在转换主题. 本转换可能经历多次跳转, 请不要关闭浏览器.</font><br>\n";
	echo"<font class=bt3>现在开始转换 id 从 $start 到 $end 的主题.</font><br><br>";
	echo "<div style='padding-left:100px;line-height:90%'>";
	$query = mssql_query("SELECT * FROM {$dvpre}Topic WHERE TopicID BETWEEN $start AND $end");
	while($t = mssql_fetch_assoc($query)) {
		$t = daddslashes($t);
		$t['DateAndTime'] = timeconv($t['DateAndTime']);
		$t['LastPostTime'] = timeconv($t['LastPostTime']);
		$lastpost = explode('$', $t['LastPost']);
		$t['LastPost'] = $lastpost[0];
		$sql ="INSERT INTO {$pre}threads
				(tid,subject,lastpost,fid,replies,author,lastposter,dateline,views)
				VALUES ('$t[TopicID]', '$t[Title]','$t[LastPostTime]','$t[Boardid]','$t[Child]','$t[PostUsername]','$t[LastPost]','$t[DateAndTime]','$t[hits]')";
		mysql_query($sql) or exit($sql.mysql_error());
		$converted = 1;
	}
	if($converted) {
		$end ++;
		echo "转换 [主题] 操作进行中，请稍候……";
		echo "</div>";
		redirect("dvsql2discuzv2.php?action=threads&start=$end");
	} else {
		echo "转换 [主题] 即将完成，即将进行 [帖子] 数据转换，请稍候……";
		echo "</div>";
		redirect("dvsql2discuzv2.php?action=posts&tableid=0");
	}
} elseif ($action == "posts") {
	$tablearray = explode(',', str_replace(' ', '', $bbstable));
	$tablecount = count($tablearray);
	$posttable = $dvpre.$tablearray[$tableid];
	if(!$start) {
		if($tableid == 0) {
			mysql_query("TRUNCATE TABLE $pre"."posts");
		}
		$query = mssql_query("SELECT MIN(AnnounceID) AS Expr1 FROM $posttable");
		$start_array=mssql_fetch_assoc($query);
		$start=$start_array['Expr1'];
	}
	$end = $start + $many;
	$converted = 0;
	echo "<title>4 --&gt; 5 ID: $start --&gt; $end 转换中……</title>\n";
	echo"<font class=bt1><b>正在进行转换第 4 步(共 5 步) 如果您的数据很多,则这一步需要时间较长</b></font><br><br>\n";
	echo"<font class=bt2>现在转换贴子. 本转换可能经历多次跳转, 请不要关闭浏览器.</font><br>\n";
	echo"<font class=bt3>现在开始转换 id 从 $start 到 $end 的主题.</font><br><br>";
	echo "<div style='padding-left:100px'>";
	$query = mssql_query("SELECT AnnounceID,BoardID,RootID,UserName,PostUserid,Topic,DateAndTime,ip,cast(Body AS TEXT) AS Body FROM $posttable WHERE AnnounceID BETWEEN $start AND $end");
	while($p = mssql_fetch_assoc($query)) {
			$p = daddslashes($p);
			$p['Topic'] = $p['Topic'] == '(空)' ? '' : $p['Topic'];
			$p['DateAndTime'] = timeconv($p['DateAndTime']);
			$p['Body'] = preg_replace("/(\[upload\=(jpg|png|gif)\])(.+?)(\[\/upload\])/i", "[img]$attachurl/\\3[/img]", strip_tags($p['Body']));
			$sql="INSERT INTO {$pre}posts
					(pid,fid,tid,author,subject,dateline,message,usesig,useip)
					VALUES ('','$p[BoardID]','$p[RootID]','$p[UserName]','$p[Topic]','$p[DateAndTime]','$p[Body]',1,'$p[ip]')";
			mysql_query($sql);
			$error = mysql_error();
		$converted = 1;
	}
	if($converted) {
		$end ++;
		echo "转换 [帖子] 操作进行中，请稍候……";
		echo "</div>";
		redirect("dvsql2discuzv2.php?action=posts&start=$end&tableid=$tableid");
	} elseif($tableid < $tablecount - 1) {
		$nextid=$tableid + 1;
		echo "转换 [帖子] 操作进行中，请稍候……";
		echo "</div>";
		redirect("dvsql2discuzv2.php?action=posts&tableid=".$nextid);
	} else {
		echo "转换 [帖子] 完成，操作即将完成，请稍候……";
		echo "</div>";
		redirect("dvsql2discuzv2.php?action=finish");
	}
} elseif ($action == "finish") {
	echo "<title>5 --&gt; 5 结束数据转换</title>\n";
	echo"<font class=bt1><b>正在进行转换第 5 步(共 5 步)</b></font><br><br>\n";
	echo"恭喜您,转换成功!";
}
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