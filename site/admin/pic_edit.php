<?
session_start();
include '../config/geturl.php';
include '../conn.php';
include '../config/path.php';
include '../funlib/deldir.php';
?>
<? if (isset($_SESSION['qx'])){
  $qx =$_SESSION['qx'];
}
if ($qx !="4"){
  //print "你没有权限！";
 // exit();
} 
?>
<? 
for ($k=1; $k<=10; $k=$k+1)  {
    $chec = "checkbox1".$k;
    $pid2=trim($_POST[$chec]);
	$hiddenF = "hiddenField".$k;
	$pid=trim($_POST[$hiddenF]);
    if ($pid2!="")    {
 	   $today = date("Y-m-d H:i:s"); 
       $sql="update photo set tj='1' , tj_dat='".$today."' where pid=".$pid;
       $result = mysql_query($sql,$db); 
    }else{	
	   $sql="update photo set tj='0' where pid=".$pid;
       $result = mysql_query($sql,$db); 	  
	}   
} 
$delnum = 0; 
for ($k=1; $k<=10; $k=$k+1){
    $chec2 = "checkbox2".$k;
    $pid=trim($_POST[$chec2]);
	$hiddenF2 = "hiddenField2".$k;
	$jhhao=trim($_POST[$hiddenF2]);	
	$hiddenF3 = "hiddenField3".$k;
	$pic=trim($_POST[$hiddenF3]);	
      if ($pid!=""){
	      $sql="delete from photo where pid=".$pid;		 
		  $result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error());
		  @unlink ($photo_path.$jhhao."\\".$pic);		 
		  $sql = "select pic from photozt where pid=".$pid;
		  $result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error());
		  while ($rs = mysql_fetch_array($result)) {
		     @unlink ($photo_path.$jhhao."\\".$rs['pic']);
		   }	
		  $sql="delete from photozt where pid=".$pid;
		  $result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error());
		  $delnum += 1;
       }
}	
if($delnum != 0){
?>	   
<script language=javascript>
<!--
alert("删除了 <?php echo $delnum ?> 组图片");
 history.go(-1)
// -->
</script>
<? }else{ ?>	   
<script language=javascript>
<!--
 history.go(-1)
// -->
</script>
<? }?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>无标题文档</title>
</head>
<body>
</body>
</html>

