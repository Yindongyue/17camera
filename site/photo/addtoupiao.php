<?php
session_start();
include '../conn.php';
include '../config/path.php';
?>
<?php
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
  $pid=trim($_GET["pid"]);
  $sql="select tps,tpz from toupiao where pid=".$pid;
  $result = mysql_query($sql,$db);
  $rstp = mysql_fetch_array($result);  
  if (($rstp==0))
  {
    $tps=1;
    $tpz=$username;
    $sql="insert into toupiao (pid,tps,tpz) values (".$pid.",".$tps.",'".$tpz."')";
	$result = mysql_query($sql,$db);
	header("Location: "."showphoto.php?pid=".$pid);
  }
    else
  {
    $tpz=$username;
    $sql="select * from toupiao where tpz like '%".$tpz."%' and pid=".$pid;
	$result = mysql_query($sql,$db);
    $rstptp = mysql_fetch_array($result); 
    if (($rstptp==0))
    {
    $tps=$rstp["tps"]+1;
    $tpz=$rstp["tpz"]."，".$tpz;
    $sql="update toupiao set tps=".$tps.",tpz='".$tpz."' where pid=".$pid;
	$result = mysql_query($sql,$db);
	header("Location: "."showphoto.php?pid=".$pid);
    }
    else
    {
?>
<script language=javascript>
<!--
alert("您已投票，请勿重复投票，谢谢！");
 history.go(-1)
// -->
</script>
<?     
} } } 
?>
	
	
	
  
  