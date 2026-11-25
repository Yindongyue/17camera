<? 
session_start();
$username=trim($_POST['names']);
$password=trim($_POST['pass']);
$password=md5($password);
for ($i=1; $i<=strlen($username); $i=$i+1)
{

  $us=substr($username,$i-1,1);
  if ($us=="'" || $us=="%" || $us=="<" || $us==">" || $us=="&")
  {

    print "错误！用户名不能含有特殊字符！";
    exit();

  } 


} 
for ($i=1; $i<=strlen($password); $i=$i+1)
{

  $us=substr($password,$i-1,1);
  if ($us=="'" || $us=="%" || $us=="<" || $us==">" || $us=="&")
  {

    print "错误！密码不能含有特殊字符！";
    exit();

  } 
}
include '../conn.php';
$sql="select * from users where username='".$username."' and password='".$password."'";
$result_session = mysql_query($sql,$db);
$rs_session = mysql_fetch_array($result_session);
if (($rs_session==0))
{
?>
<script language=javascript>
<!--
alert("输入的用户名或密码有误，或您还没有成为会员，\n\n请先注册，谢谢！");
 history.go(-1)
// -->
</script>

<? 
}
  else
if ($rs_session["status"]!="1")
{
?>
<script language=javascript>
<!--
alert("输入的用户名还未激活，\n\n请先激活，谢谢！");
 history.go(-1)
// -->
</script>
 
<? 
}
  else
{

$_SESSION['loginname'] = $username;
$_SESSION['password2'] = $password;
$_SESSION['qx'] = $rs_session["flag"];
$_SESSION['jh'] = $rs_session["jhhao"];
$url=trim($_POST['urll']);
 if ($url=="")
  {
   header("Location: "."/index.php");
  }
    else
  {

    header("Location: ".$url);
  } 
}
?>
  
