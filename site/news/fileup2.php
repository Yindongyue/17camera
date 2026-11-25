<?php
session_start();
//include('../../../conn.php');
//include '../../../config/geturl.php';
include '../config/path.php';
//include '../../../config/qx.php';
//include '../../../config/dirinfo.php';
?>
<?php  
  $id=$_GET["id"];
  $cid=$_GET["cid"];
  echo "<p align='center'>";
 ?>
<?php

//if (isset($_SESSION['qx']))
//{
//$flag = $_SESSION['qx'];
//}
//if ($flag!="4")
//{
  //exit; 
//}
$picnum = 1;
$p1="";
$p2="";
for($i=1;$i<=$picnum;$i++)
{
  $upload_file=$_FILES['upload_file'.$i]['tmp_name'];
  
  $rest = strtolower(substr($_FILES['upload_file'.$i]['name'],-3,3));
    if($rest == "php"or $rest == "asp"or $rest == "exe") 
     {
      echo "不支持此文件格式";
      exit;
     }
    $file_name_head = date("YmdHis").$i; 
    $_FILES['upload_file'.$i]['name'] =$file_name_head.$_FILES['upload_file'.$i]['name'];
    $upload_file_name=$_FILES['upload_file'.$i]['name'];  //文件名
     if($i==1){
      $p1 = $upload_file_name;
        }
	 if ($i==2){
	  $p2 = $upload_file_name;
        }  
    $upload_file_size = $_FILES['upload_file'.$i]['size'];
   
    if($upload_file){
   //$file_size_max = 1000*1000;// 1M限制文件上传最大容量(bytes)
    $store_dir = $photo_path2 ;// 上传文件的储存位置
   $accept_overwrite = 1;//是否允许覆盖相同文件
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
echo "上传文件名为：".$upload_file_name;
?>

<p align="center">
<p align="center">
【<A  href="javascript:window.close()">关闭网页</A>】 &nbsp;&nbsp;
<a href="fileup.php?id=<? echo $cid; ?>">上传其它图片</a></p>
