<?
include "class.smtp.php";
include "example.php";

//	$link = mssql_connect ("localhost", "sa", "");
//	mssql_select_db("test", $link);

session_start();
//if(!$_SESSION["mail_id"])
//{
//	session_register("mail_id");
//}
if(!$_SESSION["search_id"])
{
	session_register("search_id");
	session_register("session_totle");

	if (!copy($file, "temp.csv")) {
		print ("failed to copy $file...<br>\n");
	}
	$fcontents = file ("temp.csv");
	$totle = sizeof($fcontents);
//	$SQL = "select * from email";
//	$rs = mssql_query($SQL, $link);
//	$totle = mssql_num_rows($rs);
	$_SESSION["session_totle"] = $totle;
}
	$_SESSION["search_id"] = $_SESSION["search_id"]+1;


if(!$_SESSION["session_message"])
{
	session_register("session_message");
	$_SESSION["session_message"]=$content;
}
if(!$_SESSION["session_title"])
{
	session_register("session_title");
	$_SESSION["session_title"]=$title;
}

//取邮件地址
$session_search_id = $_SESSION["search_id"]-1;

$totle = $_SESSION["session_totle"];

$fcontents = file ("temp.csv");
$row=explode(",",$fcontents[$session_search_id]);

if($row[0])
{
//			$_SESSION["mail_id"] = $_SESSION["mail_id"]+1;
			//发信件
//			$email = 'panliang@chenwa.com';
			$message=$_SESSION["session_message"];
			$to=trim($row[3]);
//			echo $row[3];
			$subject = $_SESSION["session_title"];
			$aaa = sendmail($message,$to,$subject);	
//			echo $aaa;
$persent = ceil($_SESSION["search_id"]/$totle*1000);
$persent = $persent/10;
//echo $_SESSION["search_id"];
?>
<html>
<head>
<meta http-equiv="Content-Language" content="zh-cn">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>邮件群发器(design by dcross)</title>
<style>A {
FONT-SIZE: 12px; COLOR: #000000; TEXT-DECORATION: none
}
A:hover {
	COLOR: #ffcc00
}
A.blue {
	COLOR: darkblue
}
body, p, td {
	FONT-SIZE: 12px
}
input {
	BACKGROUND-COLOR: white; BORDER-BOTTOM: #000000 1px solid; BORDER-LEFT: #000000 1px solid; BORDER-RIGHT: #000000 1px solid; BORDER-TOP: #000000 1px solid; FONT-SIZE: 9pt; 
}
textarea {
	BACKGROUND-COLOR: white; BORDER-BOTTOM: #000000 1px solid; BORDER-LEFT: #000000 1px solid; BORDER-RIGHT: #000000 1px solid; BORDER-TOP: #000000 1px solid; FONT-SIZE: 9pt; 
}	
</style>
</head>

<body style="BORDER-RIGHT: #cccccc 1px solid; BORDER-TOP: #000000 1px solid; MARGIN: 0pt; OVERFLOW: hidden; BORDER-LEFT: #cccccc 1px solid; BORDER-BOTTOM: #cccccc 1px solid" bgColor="#009ace" leftMargin="0" topMargin="10">
<br>
<br>
<br>
<br>
<br>
<table width="70%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000" style="border-collapse: collapse; border-style: dotted; border-width: 1">
  <tr> 
    <td height="20" bgcolor="#000000"> 
      <div align="center"><font color="#FFFFFF">邮件群发器（每5秒发送一封）</font></div></td>
  </tr>
  <tr> 
    <td bgcolor="#ffad00"> 
        <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#FFAD00">
        <tr> 
          <td width="18%">&nbsp;</td>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr> 
          <td colspan="3"> <div align="center">发送： 
              <?=$row[3]?>
              &nbsp; 
              <?if($aaa) echo "成功";else echo "失败";?>
            </div></td>
        </tr>
        <tr> 
          <td><div align="right">进度：</div></td>
          <td width="65%"><table width="90%" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
              <tr> 
                <td><table width="<?=$persent?>%" border="0" cellpadding="0" cellspacing="0" bgcolor="#0070A6">
                    <tr> 
                      <td>&nbsp;</td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
          <td width="17%"> 
            <?=$persent?>
            ％</td>
        </tr>
        <tr> 
          <td colspan="3"><div align="center">总数为 <B> 
              <?=$totle?>
              </B> 封，现在为第 <B> 
              <?=$_SESSION["search_id"]?>
              </B> 封</div></td>
        </tr>
        <tr> 
          <td colspan="3"><form name="form1" method="post" action="mail.php">
              <div align="center"> 
                <input type="submit" name="Submit" value="取消发送" onMouseOver ="this.style.backgroundColor='#FFC864'" onMouseOut ="this.style.backgroundColor='#f3f3f3'" style="cursor:hand;">
              </div>
            </form></td>
        </tr>
      </table>
	</td>
  </tr>
</table>
<?
include "foot.php";
?>
	<script>
	setTimeout("self.location='send.php'",5000);
	</script>
<?
}
else
{
	if($totle < $_SESSION["search_id"])
	{
		header("location:mail.php");
		exit;	
	}
	else
	{
		header("location:send.php");
		exit;
	}
}
//echo $row[2];
//mssql_free_result($rs);
//mssql_close ($link);
?>
