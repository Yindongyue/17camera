<?php
session_start();
include '../conn.php';
include '../config/geturl.php';
include '../config/path.php';
include '../config/qx.php';
include '../config/dirinfo.php';
?>
<?php
  
  $name=$_POST["name"];
  $sm=$_POST["sm"];
  $sql="select jhhao from model where name='".$name."'";
  $result = mysql_query($sql,$db) or die("Query failed : " . mysql_error());
  $rs = mysql_fetch_array($result);
if (!($rs==0))
{
  $jh=$rs["jhhao"];
}
  else
{
?>
这个MODEL MM还没注册！
<? 
  exit;
 // header("Location: error.htm");
} 
echo "<p align='center'>";
?>
<?php
if (isset($_SESSION['loginname']))
{
$users = $_SESSION['loginname'];
}

if (isset($_SESSION['qx']))
{
$flag = $_SESSION['qx'];
}
if ($flag=="1")
{
  $file_size_max = $pt_sc;
  $num=$pt;  
}
  else
if ($flag=="2")
{
  $file_size_max = $zs_sc;
  $num=$zs;
}
  else
if ($flag=="3")
{
  $file_size_max = $vip_sc;
  $num=$vip;
}
  else
if ($flag=="4")
{
  $file_size_max = $admin_sc;
  $num=$admin;  
} 

if (isset($_SESSION['picnum']))
{
$picnum = $_SESSION['picnum'];
}

for($i=1;$i<=$picnum;$i++)
{
  $upload_file=$_FILES['upload_file'.$i]['tmp_name'];
  
  $rest = strtolower(substr($_FILES['upload_file'.$i]['name'],-3,3));
  $rest2 = strtolower(substr($_FILES['upload_file'.$i]['name'],-4,3));
  if($rest == "php"or $rest == "asp"or $rest == "exe" or $rest2 == "php") 
  {
  echo "不支持此文件格式";
   exit;
  }
  $file_name_head = date("YmdHis").$i; 
  $_FILES['upload_file'.$i]['name'] =$file_name_head.$_FILES['upload_file'.$i]['name'];
  $upload_file_name=$_FILES['upload_file'.$i]['name'];  //文件名
  $pic = $upload_file_name;
  $upload_file_size = $_FILES['upload_file'.$i]['size'];
   
if($upload_file){
//$file_size_max = 1000*1000;// 1M限制文件上传最大容量(bytes)
$store_dir = $photo_path. $jh."/" ;// 上传文件的储存位置
$accept_overwrite = 1;//是否允许覆盖相同文件
// 检查文件大小
if ($upload_file_size > $file_size_max) {
echo "对不起，你的图片".$i."容量大于规定";
exit;
}
//检查总容量
$dirsize = dirsize($store_dir);
if ($dirsize["filesize"] + $upload_file_size > $num) {
echo "对不起，文件太大，已经超过允许空间大小";
exit;
}
// 检查读写文件
if (file_exists($store_dir . $upload_file_name) && !$accept_overwrite) {
echo "图片".$i."存在相同文件名的文件";
exit;
}
//复制文件到指定目录
if (!move_uploaded_file($upload_file,$store_dir.$upload_file_name)) {
echo "复制图片".$i."失败";
exit;
}
//更新数据库

$adddat=date("Y-m-d H:i:s");
$sql="insert into mmphoto (name,sizes,pic,scz,dat,jhhao,sm) values ('".$name."','".$sizes."','".$pic."','".$_SESSION['loginname']."','".$adddat."','".$jh."','".$sm."')";
$result = mysql_query($sql,$db) or die("Query failed : " . mysql_error());
$rs  = mysql_affected_rows();
if($rs!=1) echo "图片".$i."未上传到数据库";

$Erroe=$_FILES['upload_file'.$i]['error'];
switch($Erroe){
case 0:
echo "图片".$i."上传成功<br>"; break;
case 1:
echo "上传的图片".$i."超过了 php.ini 中 upload_max_filesize 选项限制的值."; break;
case 2:
echo "上传图片".$i."的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值。";break;
case 3:
echo "图片".$i."只有部分被上传";break;
case 4:
echo "没有图片被上传";break;
}
}
}
echo  "</p>";
?>

<p align="center">
<a href="../index.php">上传完毕返回</a> &nbsp;&nbsp;
<a href="addnewphoto.php">上传其它model图片</a></p>