<? 
include '../conn.php';
include '../config/path.php';
include '../config/sendmailss.php';

$username=trim($_POST["username"]);
if($username=="")
{
echo "该网页不可刷新";
exit;
}
$sql="select * from users where username='".$username."'";
  $result = mysql_query($sql,$db) or die("Query failed : " . mysql_error());
  $rs = mysql_fetch_array($result);
if (!($rs==0))
{
  print "用户名已经存在，请更换后重试。";
  exit();
} 

$password=md5(trim($_POST["password"]));
$sex=trim($_POST["sex"]);
$email=trim($_POST["email"]);
$web=trim($_POST["web"]);
$tele=trim($_POST["tele"]);
$address=trim($_POST["address"]);
$qq=trim($_POST["qq"]);
$msn=trim($_POST["msn"]);
//产生随机数
$jh=md5($username."17pub");
$addday = date("Y-m-d H:i:s");
$sql="insert into users (username,password,sex,tele,address,email,web,jhhao,qq,dat,msn)values('".$username."','".$password."','".$sex."','".$tele."','".$address."','".$email."','".$web."','".$jh."','".$qq."','".$addday."','".$msn."')";
$result = mysql_query($sql,$db) or die("Query failed : " . mysql_error());
$rs  = mysql_affected_rows();
if($rs==1) {
  echo " ";
  }
  else{
  echo"未注册成功! ";
  }

//mail
$txl="";
$txt=$txt."逸憩摄影通知：<br>";
$txt=$txt."您在逸憩摄影的会员已经注册成功,但必须点击下面的链接激活，否则会员号不能使用。<br></p>";
$txt=$txt."<a href=/user/jh.php?jh=".$jh."&username=".$username.">/user/jh.php?jh=".$jh."</a><br>";
$txt=$txt."您的用户名为：".$username."<br>";
$txt=$txt."您的密码为：".trim($_POST["password"])."<br>";
$jmail_subject="逸憩摄影会员注册！（浏览器模式打开）";
$jmail_body=$txt;
if(sendemail($email,$jmail_subject,$jmail_body, $headers))
{
echo "注册成功! 请到你的邮箱激活此帐号.";
}
else
{
echo "未注册成功";
}
ini_restore("SMTP");

?>
<meta http-equiv="refresh" content="3;URL=<? echo $wwwpath3; ?>">
