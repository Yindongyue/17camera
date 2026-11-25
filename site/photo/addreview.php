<?php
session_start();
include '../conn.php';
include '../config/path.php';
$username=trim($_POST["username"]);
if (isset($_SESSION['password2']))
{
  $password=$_SESSION['password2'];
}
  else
{
  $password=md5(trim($_POST["password"]));
} 

$sql="select * from users where username='".$username."' and password='".$password."'";
$result = mysql_query($sql,$db);
$rs = mysql_fetch_array($result);
if (($rs==0))
{
?>
<script language=javascript>
<!--
alert("输入的用户名或密码有误，或您还没有成为会员，\n\n请先注册，谢谢！");
 history.go(-1)
// -->
</script>
<? }
  else
{
function changechr($str)
  {
   $function_ret=str_replace(" ","&nbsp;",str_replace(chr(13),"<br>",str_replace(">","&gt;",str_replace("<","&lt;",$str))));
   $function_ret=str_replace("[big]","<font size=7>",str_replace("[red]","<font color=CC0000>",str_replace("[b]","<b>",str_replace("[sayyes]","<div align=center><img src=",$function_ret))));
   $function_ret=str_replace("[/big]","</font>",str_replace("[/red]","</font>",str_replace("[/b]","</b>",str_replace("[/sayyes]","></img></div>",$function_ret))));
   return $function_ret;
  } 
   
  $pid=trim($_GET["pid"]);
  $content=trim($_POST["content"]);
  $today = date("Y-m-d H:i:s"); 
  $ip=${"REMOTE_ADDR"};
  $sql="insert into review (pid,content,username,dat,ip) values (".$pid.",'".changechr($content)."','".$username."','".$today."','".$ip."')";
  $result2 = mysql_query($sql,$db);

  $sql="update photo set review_dat='".$today."' where pid=".$pid;
  $result3 = mysql_query($sql,$db)  or die("Could not connect : " . mysql_error()); 

  header("Location: "."showphoto.php?pid=".$pid);
 } 

?>


