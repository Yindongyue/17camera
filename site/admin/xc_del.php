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

<?php 
$username=Trim(Request("username"));
sql="delete from photo where users='".$username."'";
$result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
?>

<script language=javascript>
<!--
alert("该相册已经全部清空！" );
window.close()
// -->
</script>

