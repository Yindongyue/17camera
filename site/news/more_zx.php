<?
include 'ubb.php';
include '../conn.php';
$rsi__MMColParam="1";
$sql = "SELECT n_id, n_title, n_content, n_path FROM news WHERE n_i = ".str_replace("'","''",$rsi__MMColParam)."  and  b_id=12 ORDER BY n_id DESC";
$result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
$rsi = mysql_fetch_array($result); 
$CursorType =0;
$CursorLocation = 2;
$LockType = 3;
$rsi_numRows=0;
$ii=1;
?>
<? function MM_joinChar($firstItem)
{
   if (($firstItem!=""))
  {

    $function_ret="&";
  }
    else
  {

    $function_ret="";
  } 

  return $function_ret;
} 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>※逸憩摄影※17camera.com※</title>
<link href="../images/main.css" rel="stylesheet" type="text/css">
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<? include  "../top.php"; ?>
<table width="760" border="0" cellspacing="0" cellpadding="0">
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
                            <td width="722" height="101" align="left" valign="top"><table width="722" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                  <td width="130" height="279" align="center" valign="top"> 
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
                                        <td width="421" align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td>&nbsp;</td>
                                            </tr>
                                          </table>
                                         
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td align="center">
<form name="form1" method="post" action="search.php" style="MARGIN: 0px; PADDING-BOTTOM: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; PADDING-TOP: 0px"> 
                                                  <table width="83%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr> 
                                              <td align="center" valign="bottom">&nbsp;</td>
                                                      <td width="28%" align="right"><img src="../images/swss.gif" width="64" height="15"></td>
                                                      <td width="45%" align="center"> 
                                                        <input name="xxx" type="hidden" id="xxx2" value="n_title">
                                                  <input type="text" name="sss" style="BORDER-RIGHT: #9a9999 1px solid; BORDER-TOP: #9a9999 1px solid; FONT-SIZE: 12px; BORDER-LEFT: #9a9999 1px solid; WIDTH: 120px; height=22px; BORDER-BOTTOM: #9a9999 1px solid; BACKGROUND-COLOR: #ffffff" 
                  size=10 maxsize="32">
                                                </td>
                                                      <td width="27%" align="left"> 
                                                        <input name="imageField2" type="image" src="../images/btn_search.gif" width="35" height="24" border="0"></td>
                                            </tr>
                                          </table></form>
                                              </td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="10"></td>
                                            </tr>
                                          </table>
                                          <table width="95%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="1" background="../images/hendian.gif"></td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td>&nbsp;</td>
                                            </tr>
                                          </table>
                                          <table width="96%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td align="center">
<table width="98%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr>
                                                    <td><img src="../images/lastnews.gif" width="154" height="37"></td>
                                                  </tr>
                                                </table>
                                                <table width="98%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr>
                                                    <td align="right"> 
                                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr> 
                                                          <td height="1" background="../images/hendian.gif"></td>
                                                        </tr>
                                                      </table>
                                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                          <td>&nbsp;</td>
                                                        </tr>
                                                      </table>
<? 
$pagesize = 20;

if (isset($_GET['page']))
{
$page = intval($_GET['page'] );
  
  $sql = "SELECT n_id, b_id, n_title, n_data FROM news where b_id=12 ORDER BY n_data DESC limit ". ($page-1)*$pagesize .", $pagesize";
}
 else if (isset($_POST['page']))
{
 $page = intval($_POST['page'] );
  $sql = "SELECT n_id, b_id, n_title, n_data FROM news where b_id=12 ORDER BY n_data DESC limit ". ($page-1)*$pagesize .", $pagesize";
}
else
{ 
  $page = 1;
  $sql = "SELECT n_id, b_id, n_title, n_data FROM news where b_id=12 ORDER BY n_data DESC";
} 
$result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
$rsn = mysql_fetch_array($result); 
$CursorType =0;
$CursorLocation = 2;
$LockType = 3;
$rsn_numRows=0;

if ($rsn==0)
{
  print "还没有内容";
  exit;
}
  if (isset($_GET['amount'])) 
  {
  $amount = intval($_GET['amount'] );
  }
   else if  (isset($_POST['amount'])) 
  {
   $amount = intval($_POST['amount'] );
   }
  else 
  {
   $amount = mysql_num_rows($result);
   }
if( $amount ){
   if( $amount < $pagesize ){ $page_count = 1; }               //如果总数据量小于$PageSize，那么只有一页
   if( $amount % $pagesize ){                                  //取总数据量除以每页数的余数
       $page_count = (int)($amount / $pagesize) + 1;           //如果有余数，则页数等于总数据量除以每页数的结果取整再加一
   }else{
       $page_count = $amount / $pagesize;                      //如果没有余数，则页数等于总数据量除以每页数的结果
   }
}
else{
   $page_count = 0;
}
if ($page<1)
{
  $page=1;
} 
?>
<? 

for ($ipage=1; $ipage<=$pagesize; $ipage=$ipage+1)
{
?>                                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr> 
                                                          <td width="4%" height="18"><img src="../images/shortcut_arrow.gif" width="12" height="11"></td>
                                                          <td width="76%" valign="bottom" class="main"><A HREF="moban_zx.php?n_id=<?   echo $rsn["n_id"]; ?>&b_id=<?   echo $rsn["b_id"]; ?>" target="_blank" class="main"> 
                                                             &nbsp;<?   echo $rsn["n_title"]; ?>
                                                            </A> </td>
                                                          <td width="20%" valign="bottom" class="main">[<?   echo substr($rsn["n_data"],0,10); ?>] 
                                                          </td>
                                                        </tr>
														 <tr bgcolor="#F2F2F2"> 
                                                                <td height="1"></td>
                                                                <td height="1"></td>
                                                                <td height="1"></td>
                                                              </tr>
                                                      </table>
 <?  
  $rsn=mysql_fetch_array($result);
  if ($rsn==0) break;
} 
?>
                                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr> 
                                                          <td height="2"></td>
                                                        </tr>
                                                      </table></td>
                                                  </tr>
                                                </table>
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr>
                                                    <td width="79%" height="25">
 <div align="right">&nbsp;<span class="main">&nbsp;<font size="2">当前页是：<? echo $page ?>/<? echo $page_count ?>页&nbsp; &nbsp;&nbsp;
<?                                           
	// 翻页链接
$page_string = '';
if( $page == 1 ){
   $page_string .= '第一页|上一页|';
}
else{
   $page_string .= '<a href=?page=1'.'&username='.$username.'&amount='.$amount.' class="main">第一页</a>|<a href=?page='.($page-1).'&username='.$username.'&amount='.$amount.' class="main">上一页</a>|';
}
if( ($page == $page_count) || ($page_count == 0) ){
   $page_string .= '下一页|尾页';
}
else{
   $page_string .= '<a href=?page='.($page+1).'&username='.$username.'&amount='.$amount.' class="main">下一页</a>|<a href=?page='.$page_count.'&username='.$username.'&amount='.$amount.' class="main" >尾页</a>';
}
echo $page_string;
?>   &nbsp;&nbsp;
   </font> <span > 
            </span></div>													
													
													</td>
                                                    </tr>
                                                </table></td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td>&nbsp;</td>
                                            </tr>
                                          </table></td>
                                        <td width="170" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td>&nbsp;</td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td><img src="../images/rementi.gif" width="168" height="36"></td>
                                            </tr>
                                          </table>
                                          <table width="168" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="3"></td>
                                            </tr>
                                          </table>
                                          <table width="168" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="166" align="center" valign="top"> 
                                                <table width="164" border="1" cellpadding="4" cellspacing="0" bordercolor="#BEBEBE" style="border-collapse: collapse">
                                                  <tr>
                                                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr> 
                                                          <td valign="top" class="main">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                              <tr> 
                                                                <td height="10"> 
                                                                  <? 
$sql = "SELECT n_id, b_id, n_title, n_hit, n_data FROM news where b_id=12 ORDER BY n_hit DESC";
$result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
$rsn = mysql_fetch_array($result); 
$CursorType =0;
$CursorLocation = 2;
$LockType = 3;
$rsn_numRows=0;
$i=1; ?>
                                                                </td>
                                                              </tr>
                                                            </table>
                                                            <? while(!($rsn==0) && $i<=12)
{
?>
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                              <tr> 
                                                                <td width="8%" height="16" align="center"><img src="../images/dot2.gif" width="7" height="7"></td>
                                                                <td width="92%" valign="bottom" class="main"><A HREF="moban_zx.php?n_id=<?   echo $rsn["n_id"]; ?>&b_id=<?   echo $rsn["b_id"]; ?>" target="_blank" class="main"> 
                                                                  <?   echo yiqi_cut($rsn["n_title"],20); ?>
                                                                  </A> </td>
                                                              </tr>
                                                            </table>
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                              <tr> 
                                                                <td height="5"></td>
                                                              </tr>
                                                            </table>
                                                            <?   $rsn=mysql_fetch_array($result);

  $i=$i+1;
} 
?>
                                                          </td>
                                                        </tr>
                                                      </table>
                                                      
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                              <td width="2" height="1" valign="top" bgcolor="#D9D9D9"><img src="../images/ds.gif" width="2" height="3"></td>
                                            </tr>
                                          </table>
                                          <table width="168" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td align="left" valign="top" bgcolor="#D9D9D9"><img src="../images/dx.gif" width="3" height="2"></td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td>&nbsp;</td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td><img src="../images/hdxinxi.gif" width="168" height="36"></td>
                                            </tr>
                                          </table>
                                          <table width="168" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td height="3"></td>
                                            </tr>
                                          </table>
                                          <table width="168" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td width="166" align="center" valign="top"> 
                                                <table width="164" border="1" cellpadding="4" cellspacing="0" bordercolor="#BEBEBE" style="border-collapse: collapse">
                                                  <tr> 
                                                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr> 
                                                          <td height="3"></td>
                                                        </tr>
                                                      </table>
                                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr> 
                                                          <td valign="top" class="main">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                              <tr> 
                                                                <td height="10"> 
                                                                  <? 
$sql = "SELECT n_id, b_id, n_title, n_hit, n_data FROM news where b_id=13 ORDER BY n_data DESC";
$result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
$rsn = mysql_fetch_array($result); 
$CursorType =0;
$CursorLocation = 2;
$LockType = 3;
$rsn_numRows=0;
$i=1; ?>
                                                                </td>
                                                              </tr>
                                                            </table>
                                                            <? while(!($rsn==0) && $i<=10)
{
?>
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                              <tr> 
                                                                <td width="8%" height="16" align="center"><img src="../images/dot2.gif" width="7" height="7"></td>
                                                                <td width="92%" valign="bottom" class="main"><A HREF="moban_zx.php?n_id=<?   echo $rsn["n_id"]; ?>&b_id=<?   echo $rsn["b_id"]; ?>" target="_blank" class="main"> 
                                                                  <?   echo yiqi_cut($rsn["n_title"],20); ?>
                                                                  </A> </td>
                                                              </tr>
                                                            </table>
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                              <tr> 
                                                                <td height="5"></td>
                                                              </tr>
                                                            </table>
                                                            <?   $rsn=mysql_fetch_array($result);

  $i=$i+1;
} 
?>
                                                          </td>
                                                        </tr>
                                                      </table>
                                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr> 
                                                          <td height="3"></td>
                                                        </tr>
                                                      </table></td>
                                                  </tr>
                                                </table></td>
                                              <td width="2" height="1" valign="top" bgcolor="#D9D9D9"><img src="../images/ds.gif" width="2" height="3"></td>
                                            </tr>
                                          </table></td>
                                      </tr>
                                    </table></td>
                                </tr>
                              </table>
                              
                            </td>
                            <td width="1" background="../images/shudian.gif"></td>
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

