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
if (($qx !="7") and ($qx !="4"))
{
  //print "你没有权限！";
  //exit();
} ?>
<?
$pid=trim($_GET["pid"]);
$pic=trim($_GET["pic"]);
$jhhao=trim($_GET["jhhao"]);
//检测文件是否存在
    if (!(file_exists($photo_path.$jhhao."\\".$pic)))
	 {
     echo "图片".$pic."不存在";
     exit;
     }
  else
    {
  $sql="delete from mmphoto where pid=".$pid;
  $result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error());
  unlink ($photo_path.$jhhao."\\".$pic);
  $url=trim($_GET['urll']);
   if ($url=="")
  {
   header("Location: "."/index.php");
  }
    else
  {
    header("Location: ".$url);
  } 

} 

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>无标题文档</title>
</head>

<body>

</body>
</html>
