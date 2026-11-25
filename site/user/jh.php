<? include "../config/path.php" ;
    include '../conn.php';
$jh=trim($_GET["jh"]);
$username=trim($_GET["username"]);
$sql="select * from users where jhhao='".$jh."'";
$result = mysql_query($sql,$db) or die("Query failed : " . mysql_error());
$rs = mysql_fetch_array($result);
if (($rs==0))
{
  print "无此会员";
  exit();
}
  else
{
  $sql="update users set flag = '1', status='1' where jhhao='".$jh."'";
  $result = mysql_query($sql,$db) or die("Query failed : " . mysql_error());
} 
mkdir ($photo_path.$jh, 0700);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>帐号激活</title>
</head>

<body>
帐号已经激活！请访问：<a href=<?php echo $wwwpath3; ?> target="_blank"> <?php echo $wwwpath3; ?></a> 
</body>
</html>

