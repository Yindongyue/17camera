<?
  session_start();
?>
<? if ( $_SESSION['loginname']=="" || $_SESSION['password2']=="")
{
?> 
<div align="center"><a href="denglu.php">登陆</a> </div>
<? } ?>
