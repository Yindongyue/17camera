<?
  session_start();
  include '../config/geturl.php';
  include '../conn.php';
  include '../config/path.php';

if (isset($_SESSION['qx']))
{
  $qx =$_SESSION['qx'];
}
if ($qx !="4")
{
  print "你没有权限！";
  exit();
} 
?>
<? 
if(isset($_GET["username"]))
{
$username=$_GET["username"];
}
if(isset($_GET["jhhao"]))
{
$jhhao=$_GET["jhhao"];
}
if(isset($_GET["pic"]))
{
$pic=$_GET["pic"];
}
$addday=date("Y-m-d H:i:s"); 
$sql="update users set xc_tj='1',tj_pic='".$jhhao."/".$pic."',tj_dat='".$addday."' where username='".$username."'";
$result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error());

?>
<br>
<script language=javascript>
<!--
//alert("推荐成功！");
 history.go(-2);
// -->
</script>
