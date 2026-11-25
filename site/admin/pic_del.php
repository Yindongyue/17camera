<?
  session_start();
  include '../config/geturl.php';
  include '../conn.php';
  include '../config/path.php';
  include '../funlib/deldir.php';

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
$jhhao=trim($_GET["username"]);


//检测文件是否存在
    if (!(file_exists($photo_path.$jhhao."\\".$pic)))
	 {
     echo "图片".$pic."不存在";
     exit;
     }

  else
    {

  $sql="delete from photo where pid=".$pid;
  $result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error());
  unlink ($photo_path.$jhhao."\\".$pic);
  $sql = "select pic from photozt where pid=".$pid;
  $result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error());
  while ($rs = mysql_fetch_array($result)) {
	 @unlink ($photo_path.$jhhao."\\".$rs['pic']);
   }	
  $sql="delete from photozt where pid=".$pid;
  $result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error());

?>
<script language=javascript>
<!--
alert("该组图片已经删除！" );
window.close()
// -->
</script>

<? 
} 

?>
