<?
session_start();
include '../../conn.php';
if (isset($_SESSION['qx']))
{
  $qx =$_SESSION['qx'];
}
if(($qx !="6") and ($qx !="4"))
{
  print "你没有权限！";
   exit();
}
include '../../conn.php';
$admin=$_POST["admin"];
$pass=$_POST["password"];

for ($i=1; $i<=strlen($admin); $i=$i+1)
{
  $us=substr($admin,$i-1,1);
  if ($us=="'" || $us=="%" || $us=="<" || $us==">" || $us=="&")
  {
?> 
<script language=javascript>
<!--
alert("错误！用户名不能含有特殊字符！");
 history.go(-1)
// -->
</script>
<? 
  } 
} 
for ($i=1; $i<=strlen($pass); $i=$i+1)
{
  $us=substr($pass,$i-1,1);
  if ($us=="'" || $us=="%" || $us=="<" || $us==">" || $us=="&")
  {
?> 
<script language=javascript>
<!--
alert("错误！密码不能含有特殊字符！");
 history.go(-1)
// -->
</script>
<? 
  } 
} 
if($admin == "" or $pass == "")  Header("Location: login.php"); 
$sql="select pass from admin where module = 'camera' and name = '".$admin."'";
$result = mysql_query($sql);
$rs = mysql_fetch_array($result); 
if(md5($pass) == $rs['pass']){
  Header("Location: add.php"); 
}else{
  Header("Location: login.php"); 
}  

?> 

