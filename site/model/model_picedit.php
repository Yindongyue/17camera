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
<style type="text/css">
<!--
.style1 {font-size: 14px}
-->
</style>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?php include '../top.php';?><table width="760" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="36" align="left" valign="top" bgcolor="#F5F5F5">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="right" valign="top">&nbsp;</td>
        </tr>
      </table>
    </td>
    <td width="724" align="left" valign="top"> 
      <table width="724" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="1" bgcolor="#CFCFCF"></td>
          <td width="723">&nbsp;</td>
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
                      <td height="30">&nbsp;</td>
                    </tr>
                  </table>
                  <? // $rs is of type "adodb.recordset"

$sql="select pid,pic from mmphoto where name='".$name."'";
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
					<td align="center" ><a href="model_picdel.php?urll=model_picedit.php?name=<? echo $name; ?>&pic=<?php echo $rs["pic"]; ?>&pid=<?php echo $rs["pid"]; ?>&jhhao=<?php echo $jh; ?>" class="style1">删除</a>
					</td>
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