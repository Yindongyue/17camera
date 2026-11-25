<?
  session_start();
  $loginname=$_SESSION["loginname"];
  include '../../conn.php';
  include '../../config/geturl.php';
?>
<? 
$sql="select * from users where username='".$loginname."'";
$result = mysql_query($sql,$db) or die("Query failed : " . mysql_error());
$rs = mysql_fetch_array($result);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>※逸憩摄影※17camera.com※</title>
<link href="../../images/main.css" rel="stylesheet" type="text/css">
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="3%"><table width="36" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td height="10"></td>
              </tr>
            </table></td>
          <td width="97%" height="10" background="../../images/topchi.gif"></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="3%"><table width="36" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td height="10"></td>
              </tr>
            </table></td>
          <td width="97%" background="../../images/topbg.gif"> 
            <table width="724" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td width="1" bgcolor="#CFCFCF"></td>
                <td width="723" height="48"><a href="/"><img src="../../images/logo.gif" width="181" height="48" border="0"></a></td>
              </tr>
            </table>
          </td>
        </tr>
      </table></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td width="3%" height="1"> <table width="36" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td height="1"></td>
        </tr>
      </table></td>
    <td width="97%" height="1" background="../images/sens_top_menu_line.gif"> 
      <table width="724" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="1" height="1" bgcolor="#CFCFCF"></td>
          <td width="723" height="1" background="../images/sens_top_menu_line.gif"></td>
        </tr>
      </table></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0" background="../../images/dhbg.gif">
  <tr> 
    <td width="3%" bgcolor="#898989"> <table width="36" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td height="10"></td>
        </tr>
      </table></td>
    <td width="97%"> <table width="724" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="1" bgcolor="#F1F2F2"></td>
          <td width="723" height="30"> <table width="723" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td width="130"><img src="../../images/dh01.gif" width="130" height="30"></td>
                <td width="593"><table width="593" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td width="1" bgcolor="#DCDCDD"></td>
                      <td width="592"><img src="../../images/dh.gif" width="592" height="30" border="0" usemap="#Map"></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td width="3%" height="1"> <table width="36" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td height="1"></td>
        </tr>
      </table></td>
    <td width="97%" height="1" background="../../images/sens_top_menu_line.gif"> 
      <table width="724" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="1" height="1" bgcolor="#CFCFCF"></td>
          <td width="723" height="1" background="../images/sens_top_menu_line.gif"></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td height="4" bgcolor="#C2C0C1"></td>
  </tr>
</table>
<map name="Map">
  <area shape="rect" coords="19,3,80,27" href="../../news/news_index.asp">
  <area shape="rect" coords="109,4,172,26" href="../../photo/index.asp">
  <area shape="rect" coords="200,3,267,26" href="../../news/article_index.asp">
  <area shape="rect" coords="299,4,364,26" href="../../camera/index.asp">
  <area shape="rect" coords="398,3,465,27" href="../../photo/newphoto.asp">
  <area shape="rect" coords="495,2,576,28" href="/bbs" target="_blank">
</map>
<table width="760" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td width="36" align="left" valign="top" bgcolor="#F5F5F5"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td align="right" valign="top"><img src="../../images/sens_left_back1.gif" width="36" height="207"></td>
        </tr>
      </table></td>
    <td width="724" align="left" valign="top"> <table width="724" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="1" bgcolor="#CFCFCF"></td>
          <td width="723"><table width="723" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td width="130" valign="top" background="../../images/sens_main_1pixcel_line.gif"> 
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td><img src="../../images/02zuo.gif" width="130" height="206"></td>
                    </tr>
                  </table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td height="1" background="../../images/hendian.gif"></td>
                    </tr>
                  </table></td>
                <td width="1" background="../../images/shudian.gif"></td>
                <td width="591" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td><img src="../../images/sens_main_top_baner.gif" width="591" height="206"></td>
                    </tr>
                  </table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td><img src="../../images/sens_main_top_baner_footer.gif" width="591" height="80"></td>
                    </tr>
                  </table></td>
                <td width="1" background="../../images/shudian.gif"></td>
              </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td height="1" background="../../images/hendian.gif"></td>
              </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td background="../../images/sens_main_1pixcel_line.gif"> <table width="723" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td width="722" height="101" align="left" valign="top"><table width="722" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                  <td width="130" align="center" valign="top" background="../../images/sens_main_1pixcel_line.gif" bgcolor="#FFFFFF">&nbsp; 
                                  </td>
                                  <td width="1" background="../../images/shudian.gif" bgcolor="#C0C0C0"></td>
                                  <td width="591" align="center" valign="top" bgcolor="#FFFFFF"><table width="500" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td>&nbsp;</td>
                                      </tr>
                                    </table>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td height="30" align="center" class="green"><b>修改个人资料</b></td>
                                      </tr>
                                    </table>
                                    <table width="500" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td><form name="form1" method="post" action="modi_user1.php">
                                            <table width="400" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" style="border-collapse: collapse">
                                              <tr class="main"> 
                                                <td width="111" height="30" align="center">用户名</td>
                                                <td width="279" align="center"><? echo $loginname; ?></td>
    </tr>
                                              <tr class="main"> 
                                                <td height="30" align="center">性别</td>
                                                <td align="center"><? echo $rs["sex"]; ?></td>
    </tr>
                                              <tr class="main"> 
                                                <td height="30" align="center">Email</td>
                                                <td align="center"><? echo $rs["email"]; ?></td>
    </tr>
                                              <tr class="main"> 
                                                <td height="30" align="center">WEB</td>
                                                <td align="center"> 
                                                  <input name="web" type="text" id="web" value="<? echo $rs["web"]; ?>"></td>
    </tr>
                                              <tr class="main"> 
                                                <td height="30" align="center">电话</td>
                                                <td align="center"> 
                                                  <input name="tele" type="text" id="tele" value="<? echo $rs["tele"]; ?>"></td>
    </tr>
                                              <tr class="main"> 
                                                <td height="30" align="center">地址</td>
                                                <td align="center"> 
                                                  <input name="address" type="text" id="address" value="<? echo $rs["address"]; ?>"></td>
    </tr>
                                              <tr class="main"> 
                                                <td height="30" align="center">QQ</td>
                                                <td align="center"> 
                                                  <input name="qq" type="text" id="qq" value="<? echo $rs["qq"]; ?>"></td>
    </tr>
                                              <tr class="main"> 
                                                <td height="30" align="center">MSN</td>
                                                <td align="center"> 
                                                  <input name="msn" type="text" id="msn" value="<? echo $rs["msn"]; ?>"></td>
    </tr>
                                              <tr class="main"> 
                                                <td height="30" align="center">&nbsp;</td>
                                                <td align="center"> 
                                                  <input type="submit" name="Submit" value="修改"></td>
    </tr>
  </table>
</form></td>
                                      </tr>
                                    </table>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td>&nbsp;</td>
                                      </tr>
                                    </table>
                                    
                                  </td>
                                </tr>
                              </table></td>
                            <td width="1" background="../../images/shudian.gif"></td>
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
      <TD width=36 height=162 align="left" valign="top" background=../../images/sens_footer_left_b01.gif><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td height="1" bgcolor="#CFCFCF"></td>
          </tr>
        </table></TD>
      <TD vAlign=top width=722> <TABLE cellSpacing=0 cellPadding=0 width="100%">
          <TBODY>
            <TR> 
              <TD width=720 
          bgColor=#dddddd height=21><img src="../../images/ditop.gif" width="723" height="21"></TD>
            </TR>
            <TR> 
              <TD bgColor=#f2f2f2><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr> 
                    <td width="16%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr> 
                          <td height="113"><img src="../../images/biglogo.gif" width="347" height="113"></td>
                        </tr>
                        <tr> 
                          <td><img src="../../images/sens_footer_logo2.gif" width="347" height="28"></td>
                        </tr>
                      </table></td>
                    <td width="84%"><img src="../../images/ditu.gif" width="376" height="141"></td>
                  </tr>
                </table></TD>
            </TR>
          </TBODY>
        </TABLE></TD>
      <TD align="left" valign="top" background="../../images/sens_main_1pixcel_line.gif"><img src="../../images/diyou.gif" width="243" height="162"></TD>
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
<div align="center"></div>

</body>
</html>

