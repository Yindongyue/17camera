<link href="../mainv5.css" rel="stylesheet" type="text/css">
<div align="center"><br>
  <br>
  <br>
<? 
include('../../conn.php');
$oldpwd=$_POST["oldpwd"];
$pwd=$_POST["pwd"];
$repwd=$_POST["repwd"];
if ($pwd!=$repwd)
{
  print "两次密码不一致!!<a href='pwd.php'>点击返回</a>";
  exit();
} 
$sql="select * from admin where pass='".$oldpwd."'";
$result=mysql_query($sql,$db) or die("Query failed : " . mysql_error());
$rs = mysql_fetch_array($result);
if (($rs==0))
{
  print "原密码错误!!<a href='pwd.php'>点击返回</a>";
}
  else
{

 $sql="update admin set pass='".$pwd."'";
 $result=mysql_query($sql,$db) or die("Query failed : " . mysql_error()); 
 $rs=mysql_affected_rows();
 if($rs!=0){
  print "密码修改成功!!<a href='javascript:window.close()'>关闭窗口</a>";
  }
} 

?> </div>

