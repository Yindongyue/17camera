<? 
include 'ubb.php';
include '../conn.php';
$rsr__MMColParam="1";
if (isset($_GET["n_id"]))
{
  $rsr__MMColParam=trim($_GET["n_id"]);
} ?>
<? 
$sql="UPDATE news  SET n_hit =n_hit+1 WHERE n_id =".$rsr__MMColParam."";
$result = mysql_query($sql,$db) or die("Could not update hit : " . mysql_error()); 

$sql= "SELECT * FROM news WHERE n_id =".$rsr__MMColParam."";
$result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
$rsn = mysql_fetch_array($result); 
$CursorType =0;
$CursorLocation = 2;
$LockType = 3;
$rsn_numRows=0;
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>※逸憩摄影※17camera.com※</title>
<link href="../images/main.css" rel="stylesheet" type="text/css">
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<? include  "../top.php"; ?><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td width="3%" height="1"> <table width="36" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td height="1"></td>
        </tr>
      </table></td>
    <td width="97%" height="1" background="../images/sens_top_menu_line.gif"> <table width="724" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="1" height="1" bgcolor="#CFCFCF"></td>
          <td width="723" height="1" background="../images/sens_top_menu_line.gif"></td>
        </tr>
      </table></td>
  </tr>
</table>
<table width="760" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="36" align="left" valign="top" bgcolor="#F5F5F5"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td align="right" valign="top"><img src="../images/sens_left_back1.gif" width="36" height="207"></td>
        </tr>
      </table></td>
    <td width="1" align="left" valign="top" bgcolor="#CFCFCF"></td>
    <td width="722" align="left" valign="top"><table width="722" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="548" align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="25">&nbsp;</td>
                    </tr>
                  </table>
                  <table width="90%" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr> 
                      <td height="30" class="main"> <div align="center"><b class="big"><font size="3"><? echo $rsn["n_title"]; ?></font></b></div></td>
                    </tr>
                    <tr> 
                  <td class="main"> <div align="center" class="main">日期:<? echo $rsn["n_data"]; ?>　作者:<? echo $rsn["n_author"]; ?>　阅读:<? echo $rsn["n_hit"]; ?></div></td>
                  </tr>
                  </table>
                  <table width="90%" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr> 
                      <td class="main">&nbsp;</td>
                    </tr>
                    <tr> 
                      <td class="zi"><? echo ubbcode($rsn["n_content"]); ?></td>
                    </tr>
                    <tr> 
                      <td class="main"><div align="center"> 
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr> 
                              <td width="76%" height="22">&nbsp;</td>
                              <td width="24%" valign="bottom" class="da02">【<a href="javascript:window.close()" class="da02">关闭网页</a>】</td>
                            </tr>
                          </table>
                        </div></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
          <td width="1" background="../images/shudian.gif"></td>
          <td width="179" align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td bgcolor="#f5f5f5"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td>&nbsp;</td>
                    </tr>
                  </table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td align="center" valign="top"><a href="more.php?b_id=4&id=%CA%FD%C2%EB%B0%B5%B7%BF"><img src="../images/digianfang.gif" width="111" height="27" border="0"></a></td>
                    </tr>
                    <tr> 
                      <td height="5" align="center" valign="top"></td>
                    </tr>
                    <tr> 
                      <td align="center" valign="top"><a href="more.php?b_id=5&id=%C9%E3%D3%B0%BB%F9%B4%A1"><img src="../images/shjichu.gif" width="111" height="27" border="0"></a></td>
                    </tr>
                    <tr> 
                      <td height="5" align="center" valign="top"></td>
                    </tr>
                    <tr> 
                      <td align="center" valign="top"><a href="more.php?b_id=16&id=%C3%FB%BC%D2%C3%FB%D7%F7"><img src="../images/mjmz.gif" width="111" height="27" border="0"></a></td>
                    </tr>
                    <tr> 
                      <td height="5" align="center" valign="top"></td>
                    </tr>
                    <tr> 
                      <td align="center" valign="top"><a href="more.php?b_id=7&id=%C6%F7%B2%C4%D7%B0%B1%B8"><img src="../images/qczb.gif" width="111" height="27" border="0"></a></td>
                    </tr>
                    <tr> 
                      <td height="5" align="center" valign="top"></td>
                    </tr>
                    <tr> 
                      <td align="center" valign="top"><a href="more.php?b_id=11&id=%C9%AB%D3%D1%B5%C4%BB%B0"><img src="../images/sydh.gif" width="111" height="27" border="0"></a></td>
                    </tr>
                    <tr> 
                      <td height="5" align="center" valign="top">&nbsp;</td>
                    </tr>
                  </table></td>
              </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td><img src="../images/serchti.gif" width="179" height="24"></td>
              </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td height="10" bgcolor="#FFFFFF"></td>
              </tr>
            </table>
            <table width="170" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td align="center" valign="top"><table width="155" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td valign="top"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td width="11%" class="main">&nbsp;</td>
                            <td width="89%" height="18" class="main">关键字搜索</td>
                          </tr>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td><form name="form1" method="get" action="search.php" style="MARGIN: 0px; PADDING-BOTTOM: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; PADDING-TOP: 0px">
                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                  <tr> 
                                    <td align="center" valign="bottom"> <select name="xxx" size="1" style="BORDER-RIGHT: #9a9999 1px solid; BORDER-TOP: #9a9999 1px solid; FONT-SIZE: 12px; BORDER-LEFT: #9a9999 1px solid; WIDTH: 120px; height=17px; BORDER-BOTTOM: #9a9999 1px solid; BACKGROUND-COLOR: #ffffff">
                                        <option value="n_title" selected>--标&nbsp;&nbsp;&nbsp; 
                                        题--</option>
                                        <option value="n_author">--作&nbsp;&nbsp;&nbsp; 
                                        者--</option>
                                        <option value="n_content">--内&nbsp;&nbsp;&nbsp; 
                                        容--</option>
                                      </select> </td>
                                  </tr>
                                  <tr> 
                                    <td height="7" align="center" valign="bottom"></td>
                                  </tr>
                                  <tr> 
                                    <td align="center" valign="bottom"> <input type="text" name="sss"  style="BORDER-RIGHT: #9a9999 1px solid; BORDER-TOP: #9a9999 1px solid; FONT-SIZE: 12px; BORDER-LEFT: #9a9999 1px solid; WIDTH: 120px; height=17px; BORDER-BOTTOM: #9a9999 1px solid; BACKGROUND-COLOR: #ffffff" size=10 maxsize="32"> 
                                    </td>
                                  </tr>
                                  <tr> 
                                    <td height="15" align="center" valign="bottom"></td>
                                  </tr>
                                  <tr> 
                                    <td align="center" valign="bottom"> <input name="imageField2" type="image" src="../images/serti.gif" width="70" height="20" border="0"> 
                                    </td>
                                  </tr>
                                </table>
                              </form></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td height="7"></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
    <td width="1" align="left" valign="top" background="../images/shudian.gif"></td>
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
                </table> </TD>
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
</body>
</html>

