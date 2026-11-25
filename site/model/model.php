<?php
session_start();
include '../conn.php';
include '../config/path.php';
?>
<? $name=trim($_GET["name"]);
$sz=1;
$sql="select jhhao from model where name='".$name."'";
$result = mysql_query($sql,$db) or die("Query failed : " . mysql_error());
$rs_jh = mysql_fetch_array($result);
$jh=$rs_jh["jhhao"];
$str="";
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>※逸憩摄影※17camera.com※</title>
<link href="../images/main.css" rel="stylesheet" type="text/css">
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?php include '../top.php';?><table width="760" border="0" cellspacing="0" cellpadding="0">
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
                      <td><img src="../images/02zuo.gif" width="130" height="206"></td>
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
            
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<table width="760" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="36" bgcolor="#F5F5F5">&nbsp;</td>
    <td width="1" bgcolor="#CFCFCF"></td>
    <td width="723" valign="top"><table width="723" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="722" height="101" align="left" valign="top"><table width="721" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td align="center" valign="top" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td><img src="../images/modeltop.gif" width="722" height="36"></td>
                    </tr>
                  </table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td>&nbsp;</td>
                    </tr>
                  </table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
<? 
$sql="select * from model where name='".$name."'";
$result = mysql_query($sql,$db) or die("Query failed : " . mysql_error());
$rsxx = mysql_fetch_array($result);
?> 
                      <td><TABLE width="96%" 
      border=0 align="center" cellPadding=5 cellSpacing=1 bgColor=#cccccc class=en9pt style="font-size:12px">
                        <TBODY>
                          <TR vAlign=top>
                            <TD width=129 bgColor=#eeeeee>名字：</TD>
                            <TD width=95 bgColor=#eeeeee><NOBR>性别：</NOBR></TD>
                            <TD width=90 bgColor=#eeeeee>年龄：</TD>
                            <TD width=93 bgColor=#eeeeee>身高：</TD>
                            <TD width=93 bgColor=#eeeeee>体重：</TD>
                            <TD width=125 bgColor=#eeeeee>三围：</TD>
                          </TR>
                          <TR vAlign=top>
                            <TD class=chinesefont105pt bgColor=#ffffff 
            height=22><NOBR><STRONG><? echo $rsxx["name"]; ?></STRONG></NOBR></TD>
                            <TD bgColor=#ffffff><? echo $rsxx["sex"]; ?></TD>
                            <TD bgColor=#ffffff><? echo $rsxx["age"]; ?></TD>
                            <TD bgColor=#ffffff><? echo $rsxx["height"]; ?>cm</TD>
                            <TD bgColor=#ffffff><? echo $rsxx["weight"]; ?>KG </TD>
                            <TD bgColor=#ffffff><? echo $rsxx["sw"]; ?></TD>
                          </TR>
                          <TR vAlign=top>
                            <TD bgColor=#eeeeee>&nbsp;</TD>
                            <TD bgColor=#eeeeee>&nbsp;</TD>
                            <TD bgColor=#eeeeee colSpan=3>拍摄的类型：</TD>
                            <TD bgColor=#eeeeee>类型：</TD>
                          </TR>
                          <TR vAlign=top>
                            <TD bgColor=#ffffff height=22>&nbsp;</TD>
                            <TD bgColor=#ffffff>&nbsp;</TD>
                            <TD bgColor=#ffffff colSpan=3><? echo $rsxx["pslb"]; ?></TD>
                            <TD bgColor=#ffffff><? echo $rsxx["mtype"]; ?>MODEL</TD>
                          </TR>
                          <TR vAlign=top align=middle bgColor=#eeeeee>
                            <TD colSpan=6 height=22>&nbsp;</TD>
                          </TR>
                        </TBODY>
                      </TABLE></td>
                    </tr>
                  </table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="30">&nbsp;</td>
                    </tr>
                  </table>
                  <? // $rs is of type "adodb.recordset"

$sql="select pic from mmphoto where name='".$name."'";
$result = mysql_query($sql,$db) or die("Query failed : " . mysql_error());
$rs = mysql_fetch_array($result);
while(!($rs==0))
{
?>
                  <table width="19%" border="1" cellpadding="0" cellspacing="4" bordercolor="#CCCCCC" style="font-size:12px">
                    <tr> 
                      <td align="center" valign="top"><p><img src="<?   echo $url_path; ?><?   echo $jh; ?>/<?   echo $rs["pic"]; ?>"></p>
                      <p>第<?   echo $sz; ?>幅<br>
                        <br>
                      </p></td>
                    </tr>
                  </table>
                  <p>
                    <?   $sz=$sz+1;
  $rs=mysql_fetch_array($result);
} ?>
                  </p>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                  </table>
                  <table width="95%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="25" align="center" valign="top" class="main"><table width="95%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td>
<? if ($_SESSION["qx"] == "4")
{
?>
                            <br>
                            <div align="center" class="orange">
                              
          管理员：<a href="model_del.php?name=<?   echo $rsxx["name"]; ?>" class="green">删除此model</a> <a href="model_tj.php?name=<?   echo $rsxx["name"]; ?>" class="green">推荐此model</a>&nbsp;&nbsp;&nbsp;
                               
                              <br>
 <? } ?>
                          </div></td>
                        </tr>
                      </table>                        <strong><font size="3"></font></strong></td>
                    </tr>
                  </table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td height="18" align="center" valign="bottom" class="orange"> 
                        <p><br>
                        </p>
                      </td>
                    </tr>
                  </table>
                  <b> </b> <b> </b> </td>
              </tr>
            </table></td>
          <td width="1" background="../images/shudian.gif"></td>
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