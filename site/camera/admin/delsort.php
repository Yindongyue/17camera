<? 
include '../../conn.php';
include '../../config/path.php';
if (isset($_GET["id"]))
{
$id = $_GET["id"];
}
else
{
$id = $_POST["id"];
}
?>
<? 
  $sql = "select pic,bpic from ca_product where class=".$id;
  $result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error());
  echo $photo_path3."camera\\admin\\image\\";
  while ($rs = mysql_fetch_array($result)){
		  //检测文件是否存在
		if (!(file_exists($photo_path3."camera\\admin\\image\\".$rs['pic'])))
		 {
		 echo "图片".$pic."不存在";
		 exit;
		 }
	  else
		{
		  unlink ($photo_path3."camera\\admin\\image\\".$rs['pic']);
		 }
		 
	   if (!(file_exists($photo_path3."camera\\admin\\image\\".$rs['bpic'])))
		 {
		 echo "图片".$pic."不存在";
		 exit;
		 }
	  else
		{
		  unlink ($photo_path3."camera\\admin\\image\\".$rs['bpic']);
		 }		  
  }
$sql="delete from ca_product where class=".$id;
$result=mysql_query($sql,$db) or die("Query failed : " . mysql_error());
$sql="delete from ca_sorts where sortid=".$id;
$result=mysql_query($sql,$db) or die("Query failed : " . mysql_error());

//header("Location: "."add.php?id=".$id);
?>
