<?
  session_start();
  include '../config/geturl.php';
  include '../conn.php';
  include '../config/path.php';
  include '../funlib/deldir.php';
?>
<? if (isset($_SESSION['qx']))
{
  $qx =$_SESSION['qx'];
}
if ($qx !="4")
{

  print "你没有权限！";
  exit();

} ?>

<? 
$delnum = 0;
if (trim($_GET["f"])=="all")
{
  for ($k=1; $k<=50; $k=$k+1)
  {
     $chec = "checkbox".$k;
    $userid=trim($_POST[$chec]);
    if ($userid!="")
    {
	  $sql="select username from users where jhhao='".$userid."'";
	  $result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error());
	  $rs = mysql_fetch_array($result); 
	  $sql="delete from photo where users='".$rs[username]."'";
	  $result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
	  $sql="delete from photozt where users='".$rs[username]."'";
	  $result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error());
	  $sql="delete from users where jhhao='".$userid."'";
	  $result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
	  $delnum += 1;
	    if (!(file_exists($photo_path.$userid)) || ($userid==""))
		 {
		 //echo "目录不存在";
		 //exit;
		 }
	  else
		{
		deldirs($photo_path.$userid);
		}
      
    } 
  } 

  printf ("删除了 %d名用户\n", $delnum);
}
  else
{

      $jhhao=trim($_GET["jhhao"]);
  if ($jhhao!="")
    {
	  $sql="select username from users where jhhao='".$jhhao."'";
	  $result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error());
	  $rs = mysql_fetch_array($result); 
	  $sql="delete from photo where users='".$rs[username]."'";
	  $result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
	  $sql="delete from photozt where users='".$rs[username]."'";
	  $result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error());
      $sql="delete from users where jhhao='".$jhhao."'";
      $result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
     
	  	    if (!(file_exists($photo_path.$jhhao)) || ($jhhao==""))
		 {
		 //echo "目录不存在";
		 //exit;
		 }
	  else
		{
		 deldirs($photo_path.$jhhao);
		}
	  }
} 

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>无标题文档</title>
</head>

<body>

</body>
</html>

