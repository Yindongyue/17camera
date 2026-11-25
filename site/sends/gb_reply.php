<?
include "inc/db_mysql.inc.php";
include "inc/class.FastTemplate.php";
include "global.php";
include "config.php";
include "inc/class.smtp.php";
include "example.php";

session_start();
if(!$_SESSION["sessionAdmin"])
{
	header("location:gb_admin.php");
	exit;	
}

if($action=="")
{
	include "head.php";
	$sql_view = "select * from fin_gb where id=$_GET[id]";
	$db->query($sql_view);
	$db->next_record();
	$name = $db->f("guest");
	$email = $db->f("email");
	$topic = $db->f("topic");
	$content = $db->f("content");
	$addr = $db->f("addr");
	$tel = $db->f("tel");
	$ip = $db->f("ip");
	$reply = $db->f("reply");
?>
<script language="javascript">
function suggestion_submit()
{
	var frm = document.suggestion ;

	if (frm.reply.value.length==0)
	{
		alert("请输入回复！");
		frm.reply.select();
		return;
	}
	frm.submit();
}
</script>
    <tr>
      <td width="760" colspan="4" bgcolor="#FFFFFF" height="1"></td>
    </tr>
    <tr>
      <td width="760" colspan="4">
      <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber3">
        <tr>
          <td width="175" bgcolor="#ffffef" valign="top">
          <div align="center">
            <center>
            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="160" id="AutoNumber18">
              <tr>
                <td width="100%"><br>
                <img border="0" src="images/lt10.gif" width="160" height="116"></td>
              </tr>
              <tr>
                <td width="100%">　</td>
              </tr>
              <tr>
                <td width="100%">　</td>
              </tr>
              <tr>
                <td width="100%">　</td>
              </tr>
              <tr>
                <td width="100%">　</td>
              </tr>
              <tr>
                <td width="100%">　</td>
              </tr>
            </table>
            </center>
          </div>
          </td>
          <td width="8" bgcolor="#FE9B02"></td>
          <td width="577" valign="top">
          <div align="right">
            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="570" id="AutoNumber19">
              <tr>
                <td width="100%" height="5"></td>
              </tr>
              <tr>
                <td width="100%">您的位置：<A HREF="index.php">资助信息网</A> -&gt; 爱心热线</td>
              </tr>
              <tr>
                <td width="100%" height="10"></td>
              </tr>
              <tr>
                <td width="100%" background="images/windowbar_background.gif" height="22">
                <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber20">
                  <tr>
                    <td width="76">
                    <img border="0" src="images/windowbar_left.gif" width="76" height="22"></td>
                    <td width="461" align="center">提交留言</td>
                    <td width="33">
                    <img border="0" src="images/windowbar_right.gif" width="33" height="22"></td>
                  </tr>
                </table>
                </td>
              </tr>
              <tr>
                <td width="100%">
                <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#98C757" width="100%" id="AutoNumber21" background="images/lightbg.gif">
				<FORM METHOD=POST ACTION="<?=$PHP_SELF?>?action=reply&id=<?=$_GET['id']?>" id="suggestion" name="suggestion">

                  <tr>
                    <td width="9%" rowspan="2" align="center" height="50"> 个人<br>
                    资料</td>
                    <td width="91%" height="25" colspan="2"> &nbsp;姓&nbsp; 名： <?=$name?>		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E-Mail： <?=$email?>
                      </td>
                  </tr>
                  <tr>
                    <td width="91%" height="25" colspan="2"> &nbsp;地&nbsp; 址： <?=$addr?>		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;联系电话：<?=$tel?></td>
                  </tr>
                  <tr>
                    <td width="9%" rowspan="4" align="center"> 留言<br>
                    内容</td>
                    <td width="91%" height="25" colspan="2"> &nbsp;主&nbsp; 题： <?=$topic?>
                      </td>
                  </tr>
                  <tr>
                    <td width="91%" colspan="2"> &nbsp;详细内容：<br>
                    &nbsp;<?=$content?>
                      </td>
                  </tr> 
				  <tr>
                    <td width="91%" colspan="2"> &nbsp;回复：<br>
                    &nbsp;<textarea name="reply" cols="60" rows="6"><?=$reply?></textarea>
                      <font color="#ff0000"></font></td>
                  </tr> 
                    <td width="91%" height="25" colspan="2"> &nbsp;IP&nbsp; 地址： <?=$ip?>
                      <font color="#ff0000" ></font></td>
                  </tr>
				</FORM>
                  </table>
                </td>
              </tr>
              <tr>
                <td width="100%" background="images/windowbar02_background.gif" height="22">
                <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber23">
                  <tr>
                    <td width="9">
                    <img border="0" src="images/windowbar02_left.gif" width="9" height="22"></td>
                    <td width="552" align="center"><a href="javascript:suggestion_submit();">[提交]</a>&nbsp; <a href="javascript:document.suggestion.reset();">[重置]</a>&nbsp; <A HREF="gb_list.php">[返回]</A></td>
                    <td width="9">
                    <img border="0" src="images/windowbar02_right.gif" width="9" height="22"></td>
                  </tr>
                </table>
                </td>
              </tr>
              <tr>
                <td width="100%">　</td>
              </tr>
              </table>
          </div>
          </td>
        </tr>
      </table>
      </td>
    </tr>
<?
}
if($action == "reply")
{
	$sql_view = "select * from fin_gb where id=$_GET[id]";
	$db->query($sql_view);
	$db->next_record();
	$name = $db->f("guest");
	$email = $db->f("email");
	$topic = $db->f("topic");
	$content = $db->f("content");


	$safe_reply=safeConvert($reply);

	$db->query("UPDATE fin_gb set reply='$safe_reply' where id=$_GET[id]");

	$mail_content = $name."您好！\r";

	$mail_content .= "您的问题：".$topic."\r";
	$mail_content .= "&nbsp;&nbsp;&nbsp;&nbsp;".$content."\r\r\r";

	$mail_content .= "回复内容：\r";
	$mail_content .= $reply;

	$to = $email;
	$subject = "您在资助网上提问的回答";
	$boolean=sendmail($mail_content,$to,$subject);

	echo "
	<meta http-equiv=\"refresh\" content=\"0   URL=gb_adminlist.php\">
	";
	exit;

}

include "foot.php";
?>