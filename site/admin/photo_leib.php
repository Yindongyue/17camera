<?
  session_start();
  include '../conn.php';
  include '../config/path.php';
?>
<? 
if (isset($_SESSION['qx']))
{
  $qx =$_SESSION['qx'];
}
if ($qx !="4")
{
  print "你没有权限！";
  exit();
} 

$pid=trim($HTTP_GET_VARS["pid"]);
$leib=trim($HTTP_POST_VARS["leib"]);
$sql="update photo set leib='".$leib."' where pid=".$pid;
$result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error());
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>无标题文档</title>
</head>

<body>
类别已经修改，请返回刷新 。 
</body>
</html>

