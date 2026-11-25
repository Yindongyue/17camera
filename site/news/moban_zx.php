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
<? include  "../top.php"; ?><table width="760" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="36" align="left" valign="top" bgcolor="#F5F5F5">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="right" valign="top"><img src="../images/sens_left_back1.gif" width="36" height="207"></td>
        </tr>
      </table>
    </td>
    <td width="724" align="left" valign="top"> 
      <table width="724" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="1" bgcolor="#CFCFCF"></td>
          <td width="723"><table width="723" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td width="130" valign="top" background="../images/sens_main_1pixcel_line.gif"> 
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><img src="../images/newszuo.gif" width="130" height="206"></td>
                    </tr>
                  </table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td height="1" background="../images/hendian.gif"></td>
                    </tr>
                  </table>
                </td>
                <td width="1" background="../images/shudian.gif"></td>
                <td width="591" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><img src="../images/newtop.gif" width="591" height="206"></td>
                    </tr>
                  </table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><img src="../images/newtop2.gif" width="591" height="80"></td>
                    </tr>
                  </table></td>
                <td width="1" background="../images/shudian.gif"></td>
              </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td background="../images/sens_main_1pixcel_line.gif">
<table width="723" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="722" align="left" valign="top">
<table width="722" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                  <td width="130" align="center" valign="top"> 
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td height="10"></td>
                                      </tr>
                                    </table>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td height="10"></td>
                                      </tr>
                                    </table>
                                  </td>
                                  <td width="1" background="../images/shudian.gif" bgcolor="#C0C0C0"></td>
                                  <td width="591" align="center" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td height="1" background="../images/hendian.gif"></td>
                                      </tr>
                                    </table> 
                                    <table width="591" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td width="591" align="center" valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td height="30">&nbsp;</td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td align="center" valign="top" class="green"><table width="90%" border="0" cellspacing="0" cellpadding="0" align="center">
                                                  <tr> 
                                                    <td height="30" class="main"> 
                                                      <div align="center" class="green"><b class="big"><font size="4"><? echo $rsn["n_title"]; ?></font></b></div></td>
                                                  </tr>
                                                  <tr> 
                                                    <td class="main"> <div align="center" class="main">日期:<? echo $rsn["n_data"]; ?>　作者:<? echo $rsn["n_author"]; ?>　阅读:<? echo $rsn["n_hit"]; ?></div></td>
                                                  </tr>
                                                </table>
                                                
                                              </td>
                                            </tr>
                                          </table>
                                          <table width="96%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td align="center" valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr>
                                                    <td class="zi">&nbsp;</td>
                                                  </tr>
                                                  <tr> 
                                                    <td class="zi"><? echo ubbcode($rsn["n_content"]); ?></td>
                                                  </tr>
                                                </table>
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr>
                                                    <td height="30">&nbsp;</td>
                                                  </tr>
                                                </table> 
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr> 
                                                    <td width="76%">&nbsp;</td>
                                                    <td width="24%" class="da02">【<a href="javascript:window.close()" class="da02">关闭网页</a>】</td>
                                                  </tr>
                                                  <tr>
                                                    <td>&nbsp;</td>
                                                    <td class="da02">&nbsp;</td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td height="50">&nbsp;</td>
                                            </tr>
                                          </table></td>
                                      </tr>
                                    </table></td>
                                </tr>
                              </table>
                              
                            </td>
                            <td width="1" background="/images/shudian.gif"></td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<TABLE cellSpacing=0 cellPadding=0 width="100%">
  <TBODY>
    <TR> 
      <TD width=36 height=162 align="left" valign="top" background=/images/sens_footer_left_b01.gif><table width="100%" border="0" cellspacing="0" cellpadding="0">
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

