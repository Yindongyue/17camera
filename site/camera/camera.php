<?
 include '../conn.php';

$sql="select * from ca_sorts order by sortid ";
$result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
$rs = mysql_fetch_array($result); 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>※逸憩摄影※17camera.com※</title>
<link href="../images/main.css" rel="stylesheet" type="text/css">
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?
 include '../top.php';
?>
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
                      <td><img src="../images/04zuo.gif" width="130" height="206"></td>
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
                      <td><img src="../images/qicaitop1.gif" width="591" height="206"></td>
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
                <td height="1" background="../images/hendian.gif"></td>
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
                                  <td width="130" height="279" align="center" valign="top" bgcolor="#FFFFFF"> 
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td height="10"></td>
                                      </tr>
                                    </table>
                                    <? while(!($rs==0))
{
?>
                                    <table width="85%" border="0" cellpadding="0" cellspacing="0">
                                      <tr> 
                                        <td width="18%" valign="middle"><img src="../images/j04.gif" width="11" height="11"></td>
                                        <td width="82%" height="16" valign="bottom" ><a href="camera.php?classs=<?   echo $rs["sortid"]; ?>&camera=<?   echo $rs["sort"]; ?>" class="da02"><?   echo $rs["sort"]; ?></a></td>
                                      </tr>
                                    </table>
                                    <table width="85%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td height="1" bgcolor="#DDDDDD"></td>
                                      </tr>
                                    </table>
                                    <table width="85%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td height="5"></td>
                                      </tr>
                                    </table>
                                    <?   $rs=mysql_fetch_array($result);

} 
//rs.close ?>
                                  </td>
                                  <td width="1" background="../images/shudian.gif" bgcolor="#C0C0C0"></td>
                                  <td width="591" align="center" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td>&nbsp;</td>
                                      </tr>
                                    </table> 
                                    <table width="95%" border="1" cellpadding="0" cellspacing="0" bordercolor="#E3E3E3" style="border-collapse: collapse">
                                      <tr> 
                                        <td width="8%"><img src="../images/csearchti.gif" width="93" height="35"></td>
                                        <td width="92%"><form name="form2" method="post" action="search.php" style="MARGIN: 0px; PADDING-BOTTOM: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; PADDING-TOP: 0px">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr align="center" valign="bottom"> 
                                                <td width="27%"><select name="sort" id="sort" style="BORDER-RIGHT: #9a9999 1px solid; BORDER-TOP: #9a9999 1px solid; FONT-SIZE: 12px; BORDER-LEFT: #9a9999 1px solid; WIDTH: 100px; height=18px; BORDER-BOTTOM: #9a9999 1px solid; BACKGROUND-COLOR: #ffffff">
                                                    <option value="%">品牌不限</option>
 <? 
 $result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
$rs=mysql_fetch_array($result);
while(!($rs==0))
{
?>
                                                    <option value=<?   echo $rs["sortid"]; ?>><?   echo $rs["sort"]; ?></option>
<?  
$rs=mysql_fetch_array($result);
} 
?>
                                                  </select></td>
                                                <td width="27%"> <select name="xs" id="xs" style="BORDER-RIGHT: #9a9999 1px solid; BORDER-TOP: #9a9999 1px solid; FONT-SIZE: 12px; BORDER-LEFT: #9a9999 1px solid; WIDTH: 100px; height=18px; BORDER-BOTTOM: #9a9999 1px solid; BACKGROUND-COLOR: #ffffff">
                                                    <option value="%">像素不限</option>
                                                    <option value="a">200万以下</option>
                                                    <option value="b">200-300万</option>
                                                    <option value="c">300-400万</option>
                                                    <option value="d">400-600万</option>
                                                    <option value="e">600万以上</option>
                                                  </select> </td>
                                                <td width="27%"><font 
                              color=#000000> 
                                                  <input name=serach id="serach2" 
                  style="BORDER-RIGHT: #9a9999 1px solid; BORDER-TOP: #9a9999 1px solid; FONT-SIZE: 12px; BORDER-LEFT: #9a9999 1px solid; WIDTH: 100px; height=18px; BORDER-BOTTOM: #9a9999 1px solid; BACKGROUND-COLOR: #ffffff" 
                  size=10 maxsize="32">
                                                  </font></td>
                                                <td width="19%"> <input name="imageField" type="image" src="../images/serti.gif" width="70" height="20" border="0"></td>
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
                                    <table width="95%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="5%" align="center" bgcolor="#E3E3E3" class="da02"><img src="../images/home.gif" width="15" height="12"></td>
                                        <td width="95%" height="20" valign="bottom" bgcolor="#E3E3E3" class="da02"><font color="#CC3366"><strong><? echo trim($_GET["camera"]); ?></strong></font></td>
                                      </tr>
                                    </table>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td>&nbsp;</td>
                                      </tr>
                                    </table>
                                    <table width="95%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td><img src="../images/cdti.gif" width="357" height="27"></td>
                                      </tr>
                                    </table>
                                    <table width="95%" height="15" border="0" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td></td>
                                      </tr>
                                    </table>
                                    <table width="95%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td> 
<? 
$pagesize = 16;
$pagerows =4;
if (isset($_GET["classs"]))
{
$classs = $_GET["classs"];
}
else
{
$classs = $_POST["classs"];
}
if (isset($_GET['page']))
{
$page = intval($_GET['page'] );
  $sql="select * from ca_product where class='".$classs."'  order by  id  desc limit ". ($page-1)*$pagesize .", $pagesize";
}
 else if (isset($_POST['page']))
{
 $page = intval($_POST['page'] );
  $sql="select * from ca_product where class='".$classs."'  order by id desc limit ". ($page-1)*$pagesize .", $pagesize";
}
else
{ 
  $page = 1;
 $sql="select * from ca_product where class='".$classs."'  order by id desc";
} 
$result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
$rs = mysql_fetch_array($result); 
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

if (($rs==0))
{
  print "还没有作品";
} 

for ($ipage=1; $ipage<=$pagerows; $ipage=$ipage+1)
  {

?>
                                                <table width="100%" border="0">
                                                  <tr> 
  <? 
    for ($k=1; $k<=4; $k=$k+1)
    {

      if (!($rs==0))
      {

        $a="<table border='0' cellspacing='0' cellpadding='0'><tr align='center' valign='top'><td width='25%'><table width='130' border='1' cellpadding='0' cellspacing='0' bordercolor='#CCCCCC' style='border-collapse: collapse'><tr><td height='100' align='center' valign='middle'><a href='dc.php?id=".$rs["id"]."' target='_blank' class='orange'><img src='admin/image/".$rs["pic"]."' width='126' height='90' border='0'></a></td> </tr></table><table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td height='3'></td></tr></table><table width='130' border='1' cellpadding='0' cellspacing='0' bordercolor='#CCCCCC' style='border-collapse: collapse'><tr><td height='20' align='center' bgcolor='#F5F5F5' class='main'><a href='dc.php?id=".$rs["id"]."&camera=".trim($HTTP_GET_VARS["camera"])."' target='_blank' class='orange'><strong>".$rs["xingh"]."</strong></a></td></tr></table></td></tr></table>";


      }
        else
      {

        $a="";
      } ?>
                                                    <td width="25%" align="left"><?       echo $a; ?></td>
  <? 
      if (!($rs==0))
      {
        $rs=mysql_fetch_array($result);
      } else
	  {
	  break;	  
	  }
 } 
?>
                                                  </tr>
                                                </table>
 <? 
} 
?>
                                              </td>
                                            </tr>
                                          </table>
                                    <table width="95%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td>&nbsp;</td>
                                      </tr>
                                    </table>
                                    <table width="95%" border="0" cellspacing="0" cellpadding="0">
                                            <p> 
                                            <tr> 
                                              <td width="82%" height="45" valign="top"> 
   <div align="right">&nbsp;<span class="main">&nbsp;<font size="2">共<? echo $page_count ?>页，分<? echo $pagesize ?>条显示，当前页是：<? echo $page ?>/<? echo $page_count ?>页， 
<?                                           
	// 翻页链接
$page_string = '';
if( $page == 1 ){
   $page_string .= '第一页|上一页|';
}
else{
   $page_string .= '<a href=?page=1'.'&classs='.$classs.'&username='.$username.'&amount='.$amount.' class="main">第一页</a>|<a href=?page='.($page-1).'&classs='.$classs.'&username='.$username.'&amount='.$amount.' class="main">上一页</a>|';
}
if( ($page == $page_count) || ($page_count == 0) ){
   $page_string .= '下一页|尾页';
}
else{
   $page_string .= '<a href=?page='.($page+1).'&classs='.$classs.'&username='.$username.'&amount='.$amount.' class="main">下一页</a>|<a href=?page='.$page_count.'&classs='.$classs.'&username='.$username.'&amount='.$amount.' class="main" >尾页</a>';
}
echo $page_string;
?>   
   </font> <span > 
            </span></div></td>
                                              <td width="18%" height="45" valign="top"> 
 <? 
if ($page_count>1)
{
?>
                                                <form name="form1" method="post" class="box" action="camera.php?amount=<?   echo $amount; ?>&classs=<? echo $classs ?>" >
                                                  <div align="right"> 
                                                    <input type="text" name="page" size="3">
                                                    <input type="submit" name="Submit22" value="G O">
                                                  </div>
                                                </form>
                                                <div align="right"> 
<? 
} 
?>
                                                </div></td>
                                            </tr>
                                          </table>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td>&nbsp;</td>
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

