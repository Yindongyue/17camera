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
mkdir ($photo_path.$jh, 0700);
if($rs==1) {
  echo "注册成功! ";
  }
  else{
  echo"未注册成功! ";
  }

?>
<meta http-equiv="refresh" content="1;URL=<? echo $wwwpath3; ?>">
