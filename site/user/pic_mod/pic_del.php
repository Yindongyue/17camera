<?
  session_start();
  include '../../conn.php';
  include '../../config/path.php';
  include '../../config/geturl.php';

$pid=trim($_GET["pid"]);
$pic=trim($_GET["pic"]);
  if(isset($_SESSION['jh']))
  {
   $jhhao=$_SESSION['jh'];
  }
?>
<?
//检测文件是否存在
$filename = $photo_path.$jhhao."\\".$pic;
if (!(unlink($filename)))
{
  print $pic."该文件不存在，请与管理员联系！";
  exit();
}
  else
{ 
  $sql="delete from photo where pid=".$pid;
  $result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
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
window.location.href="../user_index.php"
// -->
</script>

<? 
} 

?>
