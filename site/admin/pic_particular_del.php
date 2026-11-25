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
  //print "你没有权限！";
  //exit();
} ?>
<?php 
$result_rows = $_POST[result_rows]; 
$delnum = 0;  //
if (trim($_GET["f"])=="all")
{
  for ($k=1; $k<=$result_rows; $k=$k+1)
  {
      $chec = "checkbox".$k;	
      $id=trim($_POST[$chec]);
    if($id){
	  $sql="select pic,users from photozt where id = '".$id."'";
	  $result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error());
	  $rs = mysql_fetch_array($result);
	  $picname=$rs['pic']; 
	  $sql="select jhhao from users where username = '".$rs['users']."'";
	  $result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error());
	  $rs = mysql_fetch_array($result);
	  $jhhao = $rs['jhhao'];
	  $sql="delete from photozt where id = '".$id."'";
	  $result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error());
	  $delnum += 1;
      @unlink($photo_path.$jhhao."\\".$picname);	  
	}  
  } 

  printf ("删除了 %d张图片\n", $delnum);
}
else
{

   $jhha=trim($_GET["jhhao"]);
   $pid=trim($_GET["pid"]);
   $pic=trim($_GET["pic"]);
   $id=trim($_GET["id"]);
  if ($jhha!="") {
    if ($id =="") {
	      $sql="select id,pic from photozt where pid = '".$pid."' limit 0,1";
	      $result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error());
	      $rs = mysql_fetch_array($result);
		  if( mysql_num_rows($result)!=0){  
			  $sql="update  photo set pic ='".$rs['pic']."' where pid='".$pid."'";
			  $result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
			  $sql="delete from photozt where id='".$rs[id]."'";
			  $result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error());			  
			  if (file_exists($photo_path.$jhhao."\\".$pic)){
				@unlink($photo_path.$jhha."\\".$pic);
			  }
		  }else{
		      $sql="delete from photo where pid='".$pid."'";
			  $result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error());			  
			  if (file_exists($photo_path.$jhhao."\\".$pic)){
				@unlink($photo_path.$jhha."\\".$pic);
			  }
		  }	 
	 }else{
	          $sql="delete from photozt where id='".$id."'";
			  $result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error());		
			  if (file_exists($photo_path.$jhhao."\\".$pic)){
				@unlink($photo_path.$jhha."\\".$pic);
			   }
		
	 } 
  } 
?> 
<script language=javascript>
<!--
  history.go(-1)
// -->
</script>
<?  
} 

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>无标题文档</title>
</head>

<body>

</body>
</html>

