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

$pid=trim($_GET["pid"]);
$pic=trim($_GET["pic"]);
 $today = date("Y-m-d H:i:s"); 
$sql="update photo set tj='1' , tj_dat='".$today."' where pid=".$pid;
$result = mysql_query($sql,$db);
?>
<script language=javascript>
<!--
alert("该图片已经推荐！" );
window.close()
// -->
</script>


