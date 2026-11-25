<?php
include '../conn.php';
include '../config/path.php';
?>
<? 
$name=trim($_POST["name"]);
$sql="select * from model where name='".$name."'";
$result = mysql_query($sql,$db) or die("Query failed : " . mysql_error());
$rs= mysql_fetch_array($result);
if (!($rs==0))
{
  print "用户名已经存在，请更换后重试。";
  exit();
} 

$sex=trim($_POST["sex"]);
$age=trim($_POST["age"]);
$sg=trim($_POST["height"]);
$weight=trim($_POST["weight"]);
$sw=trim($_POST["sw"]);
$mtype=trim($_POST["mtype"]);
$pslb=trim($_POST["pslb"]);
$intro=trim($_POST["intro"]);
$email=trim($_POST["email"]);
$qq=trim($_POST["qq"]);
$msn=trim($_POST["msn"]);
//产生目录名
$jh="model_".md5($name."model");
if(!(@mkdir ($photo_path.$jh, 0700))){
    echo "未注册成功，无法生成目录";
	exit;
}
$today = date("Y-m-d H:i:s"); 
$sql="insert into model (name,sex,age,sw,mtype,pslb,intro,email,qq,msn,weight,height,dat,jhhao)values('".$name."','".$sex."','".$age."','".$sw."','".$mtype."','".$pslb."','".$intro."','".$email."','".$qq."','".$msn."','".$weight."','".$sg."','".$today ."','".$jh."')";
$result = mysql_query($sql,$db) or die("Query failed : " . mysql_error());
$rs  = mysql_affected_rows();
if($rs==1) {
?>
		<script language=javascript>
		<!--
		 location.href='showmodelname.php';
		// -->
		</script>
<?
  }
  else{
  echo"未注册成功! ";
  }
?>

