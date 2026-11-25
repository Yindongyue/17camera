<?
  session_start();
  $loginname=$_SESSION["loginname"];
  include '../../conn.php';
 if ($loginname=="")
{
?>
连接已超时，请重新<a href="../denglu.php">登陆</a>！
<? 
  exit();
} 

$tele=trim($_POST["tele"]);
$web=trim($_POST["web"]);
$qq=trim($_POST["qq"]);
$msn=trim($_POST["msn"]);
$address=trim($_POST["address"]);
$sql="update users set tele='".$tele."',web='".$web."',qq='".$qq."',msn='".$msn."',address='".$address."' WHERE username='".$loginname."'";
$result = mysql_query($sql,$db) or die("Query failed : " . mysql_error());
$rs=mysql_affected_rows();
if($rs==1) 
  {
 ?>  
 <script language=vbs>
<!--
        MsgBox "修改完成 !"
         window.close()
-->
 </script>
<?php   
	    }
?>


