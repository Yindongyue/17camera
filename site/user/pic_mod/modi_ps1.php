<?
  session_start();
  $loginname2=$_SESSION["loginname"];
  include '../../conn.php';
 if ($loginname2=="")
{
?>
连接已超时，请重新<a href="../denglu.php">登陆</a>！
<? 
  exit();
} 
$oldpsword=md5($_POST["oldpsword"]);
$sql="SELECT * FROM users WHERE password='".$oldpsword."' and username='".$loginname2."' ";
$result = mysql_query($sql,$db) or die("Query failed : " . mysql_error());
$rs = mysql_fetch_array($result);
if ($rs==0)
{
?>
<script language=vbs>
<!--
        MsgBox "对不起!你的原密码不正确，请仔细检查!!"
       history.go(-1)
-->
</script>
<? }
  else
{
?>
<?   if ($_POST["newpsword"]!=$_POST["newpsword1"])
  {
?> 
  <script language=javascript>
<!--
alert("你输入的新密码不一致，请仔细检查!!");
 history.go(-1)
// -->
</script> 
<?   }
    else
     {	 
       $pass2=md5($_POST["newpsword"]);
	   $sql="update users set password='".$pass2."' WHERE username='". $loginname2."'";
       $result = mysql_query($sql,$db) or die("Query failed : " . mysql_error());
	   $rs=mysql_affected_rows();
	   if($rs==1) 
	   {
	 ?>  
	 <script language=vbs>
<!--
        MsgBox "你的密码更改成功! 请牢记!"
         window.close()
-->
      </script>
	 
	 <?php   
	    }
     } 
} 
?>

