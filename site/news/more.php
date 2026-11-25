<?
include 'ubb.php';
include '../conn.php';
$b_id=trim($_GET["b_id"])
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>※逸憩摄影※17camera.com※</title>
<link href="../images/main.css" rel="stylesheet" type="text/css">
</head>

<? 
function MM_joinChar($firstItem)
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
          <td>
<table width="723" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td width="130" valign="top" background="../images/sens_main_1pixcel_line.gif"> 
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><img src="../images/03zuo.gif" width="130" height="206"></td>
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
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td background="../images/sens_main_1pixcel_line.gif">
<table width="723" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="722" height="101" align="left" valign="top"><table border="0" cellspacing="0" cellpadding="0">
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
                                        <td width="418" align="center" valign="top"><table width="96%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td align="right"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr> 
                                                    <td>&nbsp;</td>
                                                  </tr>
                                                </table>
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr> 
                                                    <td background="../images/bg_bar.gif"> 
                                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr> 
                                                          <td width="1%" height="24" bgcolor="#B7B7B7"></td>
                                                          <td width="98%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                              <tr> 
                                                                <td width="2%">&nbsp;</td>
                                                                <td width="98%" valign="bottom" class="main"><strong><? echo trim($_GET["id"]); ?></strong></td>
                                                              </tr>
                                                            </table></td>
                                                          <td width="1%" bgcolor="#B7B7B7"></td>
                                                        </tr>
                                                      </table></td>
                                                  </tr>
                                                </table>
												
<? 
$pagesize = 20;

if (isset($_GET['page']))
{
$page = intval($_GET['page'] );
  
  $sql = "SELECT n_id, b_id, n_title, n_data FROM news where b_id= ".$b_id." ORDER BY n_data DESC limit ". ($page-1)*$pagesize .", $pagesize";
}
 else if (isset($_POST['page']))
{
 $page = intval($_POST['page'] );
  $sql = "SELECT n_id, b_id, n_title, n_data FROM news where b_id=".$b_id." ORDER BY n_data DESC limit ". ($page-1)*$pagesize .", $pagesize";
}
else
{ 
  $page = 1;
  $sql = "SELECT n_id, b_id, n_title, n_data FROM news where b_id=".$b_id." ORDER BY n_data DESC";
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
?>  																							
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
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
                                                <table width="99%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr> 
                                                    <td height="1"></td>
                                                  </tr>
                                                </table>
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr> 
                                                    <td height="3"></td>
                                                  </tr>
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
   $page_string .= '<a href=?page=1'.'&b_id='.$b_id.'&amount='.$amount.' class="main">第一页</a>|<a href=?page='.($page-1).'&b_id='.$b_id.'&amount='.$amount.' class="main">上一页</a>|';
}
if( ($page == $page_count) || ($page_count == 0) ){
   $page_string .= '下一页|尾页';
}
else{
   $page_string .= '<a href=?page='.($page+1).'&b_id='.$b_id.'&amount='.$amount.' class="main">下一页</a>|<a href=?page='.$page_count.'&b_id='.$b_id.'&amount='.$amount.' class="main" >尾页</a>';
}
echo $page_string;
?>   &nbsp;&nbsp;
   </font> <span > 
            </span></div>													
													
													</td>
                                                    </tr>										  
                                                </table>
												
                                               </td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td>&nbsp;</td>
                                            </tr>
                                          </table></td>
                                        <td width="1" background="../images/shudian.gif"></td>
                                        <td width="179" align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td bgcolor="#f5f5f5">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
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
                                                </table>
                                              </td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td><img src="../images/serchti.gif" width="179" height="24"></td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td height="10"></td>
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
                                                                  <td align="center" valign="bottom"> 
                                                                    <select name="xxx" size="1" style="BORDER-RIGHT: #9a9999 1px solid; BORDER-TOP: #9a9999 1px solid; FONT-SIZE: 12px; BORDER-LEFT: #9a9999 1px solid; WIDTH: 120px; height=17px; BORDER-BOTTOM: #9a9999 1px solid; BACKGROUND-COLOR: #ffffff">
                                                                      <option value="n_title" selected>--标&nbsp;&nbsp;&nbsp; 题--</option>
                                                                      <option value="n_author">--作&nbsp;&nbsp;&nbsp; 者--</option>
                                                                      <option value="n_content">--内&nbsp;&nbsp;&nbsp; 容--</option>
                                                                    </select>
</td>
                                                                </tr>
                                                                <tr> 
                                                                  <td height="7" align="center" valign="bottom"></td>
                                                                </tr>
                                                                <tr> 
                                                                  <td align="center" valign="bottom"> 
                                                                    <input type="text" name="sss"  style="BORDER-RIGHT: #9a9999 1px solid; BORDER-TOP: #9a9999 1px solid; FONT-SIZE: 12px; BORDER-LEFT: #9a9999 1px solid; WIDTH: 120px; height=17px; BORDER-BOTTOM: #9a9999 1px solid; BACKGROUND-COLOR: #ffffff" size=10 maxsize="32"> 
                                                                  </td>
                                                                </tr>
                                                                <tr> 
                                                                  <td height="15" align="center" valign="bottom"></td>
                                                                </tr>
                                                                <tr> 
                                                                  <td align="center" valign="bottom"> 
                                                                    <input name="imageField2" type="image" src="../images/serti.gif" width="70" height="20" border="0"> 
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
                                          </table>
                                        </td>
                                      </tr>
                                    </table> </td>
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

