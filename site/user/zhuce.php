<html>
<head>
<SCRIPT language=JavaScript>
function formCheck(document)
{
       if(document.username.value == "")
        {
        alert("您忘了填写用户名!");
        return false;
        }
        if(document.password.value == "")
        {
        alert("您忘了填写密码!");
        return false;
        } 
		if(document.email.value == "")
        {
        alert("您忘了填写 EMAIL!");
        return false;
        }  
		 if(document.password.value !==document.repassword.value)
        {
        alert("两次密码不一致!");
        return false;
        }  
}
</SCRIPT>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>※逸憩摄影※17camera.com※</title>
<link href="../images/main.css" rel="stylesheet" type="text/css">
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<? include "../top.php" ?>
<table width="760" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td width="36" align="left" valign="top" bgcolor="#F5F5F5"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td align="right" valign="top"><img src="../images/sens_left_back1.gif" width="36" height="207"></td>
        </tr>
      </table></td>
    <td width="724" align="left" valign="top"> <table width="724" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="1" bgcolor="#CFCFCF"></td>
          <td width="723"><table width="723" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td width="130" valign="top" background="../images/sens_main_1pixcel_line.gif"> 
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td><img src="../images/02zuo.gif" width="130" height="206"></td>
                    </tr>
                  </table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td height="1" background="../images/hendian.gif"></td>
                    </tr>
                  </table></td>
                <td width="1" background="../images/shudian.gif"></td>
                <td width="591" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td><img src="../images/sens_main_top_baner.gif" width="591" height="206"></td>
                    </tr>
                  </table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td><img src="../images/sens_main_top_baner_footer.gif" width="591" height="80"></td>
                    </tr>
                  </table></td>
                <td width="1" background="../images/shudian.gif"></td>
              </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td height="1" background="../images/hendian.gif"></td>
              </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td background="../images/sens_main_1pixcel_line.gif"> <table width="723" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td width="722" height="101" align="left" valign="top"><table width="722" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                  <td width="130" align="center" valign="top" background="../images/sens_main_1pixcel_line.gif" bgcolor="#FFFFFF">&nbsp; 
                                  </td>
                                  <td width="1" background="../images/shudian.gif" bgcolor="#C0C0C0"></td>
                                  <td width="591" align="center" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td height="30">&nbsp;</td>
                                      </tr>
                                    </table>
                                    <TABLE width=500 height="454" border=0 
                        align=center cellPadding=3 cellSpacing=1 bgColor=silver class="main">
                                      <TBODY>
                                        <TR> 
                                          <TD bgColor=white><form name="form1" method="post" action="zhuce_up2.php" onSubmit="return formCheck(this)">
                                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                  <td align="center" class="green"><font size="2"><strong>会 
                                                    员 注 册</strong></font></td>
                                                </tr>
                                              </table>
                                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                  <td>&nbsp;</td>
                                                </tr>
                                              </table>
                                              <table width="454" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" style="border-collapse: collapse">
                                                <tr class="main"> 
                                                  <td width="81" height="35" align="center">用户名：</td>
                                                  <td width="363"> <input name="username" type="text" id="username"> 
                                                    <font color="#FF0000"> *</font></td>
                                                </tr>
                                                <tr class="main"> 
                                                  <td height="35" align="center">密码：</td>
                                                  <td> <input name="password" type="password" id="password"> 
                                                    <font color="#FF0000"> *</font></td>
                                                </tr>
                                                <tr class="main"> 
                                                  <td height="35" align="center">确认密码：</td>
                                                  <td> <input name="repassword" type="password" id="repassword"> 
                                                    <font color="#FF0000"> *</font></td>
                                                </tr>
                                                <tr class="main"> 
                                                  <td height="35" align="center">性别：</td>
                                                  <td> <select name="sex" id="sex">
                                                      <option value="男">男</option>
                                                      <option value="女">女</option>
                                                    </select> <font color="#FF0000">&nbsp; 
                                                    </font></td>
                                                </tr>
                                                <tr class="main"> 
                                                  <td height="35" align="center">EMAIL：</td>
                                                  <td> <input name="email" type="text" id="email" size="20">
                                                    <font color="#FF0000"> *</font>帐号需要用此email激活<strong><font color="#FF0000">(请不要用hotmail和163.com的邮箱注册，不然会收不到认证邮件)</font></strong></td>
                                                </tr>
                                                <tr class="main"> 
                                                  <td height="35" align="center">WEB：</td>
                                                  <td> <input name="web" type="text" id="web"></td>
                                                </tr>
                                                <tr class="main"> 
                                                  <td height="35" align="center">电话：</td>
                                                  <td> <input name="tele" type="text" id="tele"></td>
                                                </tr>
                                                <tr class="main"> 
                                                  <td height="35" align="center">地址：</td>
                                                  <td> <input name="address" type="text" id="address"></td>
                                                </tr>
                                                <tr class="main"> 
                                                  <td height="35" align="center">QQ</td>
                                                  <td> <input name="qq" type="text" id="qq"></td>
                                                </tr>
                                                <tr class="main"> 
                                                  <td height="35" align="center">MSN</td>
                                                  <td> <input name="msn" type="text" id="msn"></td>
                                                </tr>
                                                <tr> 
                                                  <td height="35">&nbsp;</td>
                                                  <td height="30">
<input type="submit" name="Submit2" value="提交"> 
                                                    <input type="reset" name="Submit" value="重置">
                                                  </td>
                                                </tr>
                                              </table>
                                            </form></TD>
                                        </TR>
                                      </TBODY>
                                    </TABLE>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td>&nbsp;</td>
                                      </tr>
                                    </table>
                                    
                                  </td>
                                </tr>
                              </table></td>
                            <td width="1" background="../images/shudian.gif"></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>
<TABLE cellSpacing=0 cellPadding=0 width="100%">
  <TBODY>
    <TR> 
      <TD width=36 height=162 align="left" valign="top" background=../images/sens_footer_left_b01.gif><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td height="1" bgcolor="#CFCFCF"></td>
          </tr>
        </table></TD>
      <TD vAlign=top width=722> <TABLE cellSpacing=0 cellPadding=0 width="100%">
          <TBODY>
            <TR> 
              <TD width=720 
          bgColor=#dddddd height=21><img src="../images/ditop.gif" width="723" height="21"></TD>
            </TR>
            <TR> 
              <TD bgColor=#f2f2f2><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr> 
                    <td width="16%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr> 
                          <td height="113"><img src="../images/biglogo.gif" width="347" height="113"></td>
                        </tr>
                        <tr> 
                          <td><img src="../images/sens_footer_logo2.gif" width="347" height="28"></td>
                        </tr>
                      </table></td>
                    <td width="84%"><img src="../images/ditu.gif" width="376" height="141"></td>
                  </tr>
                </table></TD>
            </TR>
          </TBODY>
        </TABLE></TD>
      <TD align="left" valign="top" background="../images/sens_main_1pixcel_line.gif"><img src="../images/diyou.gif" width="243" height="162"></TD>
    </TR>
  </TBODY>
</TABLE>
<TABLE cellSpacing=0 cellPadding=0 width="100%">
  <TBODY>
    <TR> 
      <TD vAlign=bottom align=middle width=724 bgColor=#b7b7b7 height=25>&nbsp;</TD>
      <TD bgColor=#b7b7b7 height=17></TD>
    </TR>
  </TBODY>
</TABLE>
<map name="MapMap">
  <area shape="rect" coords="19,3,80,27" href="#">
  <area shape="rect" coords="109,4,172,26" href="#">
  <area shape="rect" coords="200,3,267,26" href="#">
  <area shape="rect" coords="299,4,364,26" href="#">
  <area shape="rect" coords="398,3,465,27" href="#">
  <area shape="rect" coords="495,2,576,28" href="#">
</map>

</body>
</html>

