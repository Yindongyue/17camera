<?
  session_start();
  include '../config/geturl.php';
  include '../conn.php';
  include '../config/path.php';
  include '../config/dirinfo.php';
  include '../funlib/deldir.php';
?>
<? if (isset($_SESSION['qx']))
{
  $qx =$_SESSION['qx'];
}
if (($qx !="7") and ($qx !="4"))
{

  print "你没有权限！";
  exit();

} ?>

<? 
if(isset($_GET["name"]))
{
  $name=trim($_GET["name"]);
} 
$sql="delete from mmphoto where name='".$name."'";
$result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error());
$sql="delete from model where name='".$name."'";
$result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error());
  $sql="select jhhao from model where name='".$name."'";
  $result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error());
  $rs = mysql_fetch_array($result); 
  if (!(file_exists($photo_path.$rs['jhhao'])) || ($rs['jhhao']==""))
	 {
     //echo "目录不存在";
     //exit;
     }
  else
    {
    deldirs($photo_path.$rs['jhhao']);
  }

  $url=trim($_GET['urll']);
   if ($url=="")
  {
   header("Location: "."index.php");
  }
    else
  {
    header("Location: ".$url);
  } 
?>
   



