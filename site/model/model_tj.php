<?
  session_start();
  include '../config/geturl.php';
  include '../conn.php';
  include '../config/path.php';
?>
<? if (isset($_SESSION['qx']))
{
  $qx =$_SESSION['qx'];
}
if (($qx !="7") and ($qx !="4"))
{

  print "你没有权限！";
  exit();

} 
if(isset($_GET["name"]))
{
  $name=trim($_GET["name"]);
} 
$today = date("Y-m-d H:i:s"); 
$sql="update model set tj='1' , tj_dat='".$today."' where name='".$name."'";
$result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error());
  $url=trim($_GET['urll']);
   if ($url=="")
  {
   header("Location: "."/index.php");
  }
    else
  {
    header("Location: ".$url);
  } 
?>



