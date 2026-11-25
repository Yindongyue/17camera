<? 
include '../config/email_count.php';
$name=trim($_POST["name"]);
$username=trim($_POST["username"]);
$phone=trim($_POST["phone"]);
$email=trim($_POST["email"]);
$leix=trim($_POST["leix"]);
$nianx=trim($_POST["nianx"]);
$huik=trim($_POST["huik"]);
$bz=trim($_POST["bz"]);

//jmail
$txl="";
$txt=$txt."会员要求升级通知：<br>";
$txt=$txt."---------------------------------------------------------------<br>";
$txt=$txt."会员名：".$username."<br>";
$txt=$txt."名字：".$name."<br>";
$txt=$txt."电话：".$phone."<br>";
$txt=$txt."EMAIL：".$email."<br>";
$txt=$txt."申请会员类型：".$leix."<br>";
$txt=$txt."申请年限：".$nianx."<br>";
$txt=$txt."汇款方式：".$huik."<br>";
$txt=$txt."备注：".$bz."<br>";

/* 
//上面为邮件正文
// $jmail is of type "jmail.smtpmail"
$jmail_serveraddress=$mails;
//指定发送邮件的服务器地址
$jmail_recipient=$jmail_recipient.$master.",";
//收件人地址，这里是从表单中获取来了，当然可以换成其他地址：如 jmail.addrecipient "webmaster@zgsj.com"
$jmail_subject="会员要求升级通知！（浏览器模式打开）";
//邮件主题
$jmail_body=$txt;
//邮件正文
$jmail_contenttype="text/html";
//指定为html格式的邮件
$jmail_sender=$master;
//发件人,必须是本邮件系统内存在的信箱名字，否则不能发送成功！
$jmail_priority=2;
//优先级
$jmail_headers=$jmail_headers."From: ".$jmail_sender;
mail($jmail_recipient,$jmail_subject,$jmail_body,$jmail_headers);

$jmail=null;
 */
?>
<div align="center">表单已经递交，请等候管理员回复。</div>