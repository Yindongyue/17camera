<?php
include '../conn.php';
include '../config/path.php';
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
                      <td><img src="../images/06zuo.gif" width="130" height="206"></td>
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
                      <td><img src="../images/model.gif" width="591" height="206"></td>
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
                      <td>
<table width="723" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="722" height="101" align="left" valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                  <td height="1" bgcolor="#C0C0C0"></td>
                                </tr>
                              </table> 
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td background="../images/sens_main_width2.gif">&nbsp;</td>
                                </tr>
                              </table>
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td height="102" align="center" valign="top" bgcolor="#FFFFFF">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td><img src="../images/modeltop.gif" width="722" height="36"></td>
                                      </tr>
                                    </table>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td height="10"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td>&nbsp;</td>
                                            </tr>
                                          </table>
<? 
$pagesize = 16;

if (isset($_GET['page']))
{
$page = intval($_GET['page'] );
  
  $sql="select * from model order by dat desc limit ". ($page-1)*$pagesize .", $pagesize";
}
 else if (isset($_POST['page']))
{
 $page = intval($_POST['page'] );
  $sql="select * from model order by dat desc limit ". ($page-1)*$pagesize .", $pagesize";
}
else
{ 
  $page = 1;
 $sql="select * from model order by dat desc";
} 
$result = mysql_query($sql,$db) or die("Query failed : " . mysql_error());
$rs = mysql_fetch_array($result);
if ($rs==0)
{
  print "还没有注册MODEL";
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
$pagerows =4;
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
        $sql="select * from mmphoto where name='".$rs["name"]."' limit 0,1";
		$result2 = mysql_query($sql,$db) or die("Query failed : " . mysql_error());
        $rs2 = mysql_fetch_array($result2);    
        $jh=$rs2["jhhao"];
        $a="<table border='0' cellspacing='0' cellpadding='0'><tr align='center' valign='top'><td width='25%'><table width='120' border='1' cellpadding='0' cellspacing='0' bordercolor='#CCCCCC' style='border-collapse: collapse'><tr><td height='110' align='center' valign='middle'><a href='model.php?name=".$rs["name"]."' target='_blank''><img src='".$url_path.$jh."/".$rs2["pic"]."' width='100' border='0'></a></td> </tr></table><table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td height='3'></td></tr></table><table width='120' border='1' cellpadding='0' cellspacing='0' bordercolor='#CCCCCC' style='border-collapse: collapse'><tr><td height='18' align='center' valign='bottom' bgcolor='#F5F5F5' class='main'>[".$rs["name"]."]</td></tr></table></td></tr></table>";       
       }
        else
      {
        $a="";
       } ?>
                                            <td width="25%" align="left" valign="bottom"><?       echo $a; ?></td>
    <? 
      if (!($rs==0))
      {
        $rs=mysql_fetch_array($result);
      } 
   } 

 ?>
                                          </tr>
                                        </table>
										<? } ?></td>
                                      </tr>
                                    </table>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td><table width="98%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td><table width="100%" border="0">
                                                <tr>
                                                  
                                        </tr>
                                            </table></td>
                                          </tr>
                                        </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="84%" height="25"><table width="100%" border="0" cellspacing="0" cellpadding="0">
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
   $page_string .= '<a href=?page=1'.'&username='.$username.'&amount='.$amount.' class="main">第一页</a>|<a href=?page='.($page-1).'&username='.$username.'&amount='.$amount.' class="main">上一页</a>|';
}
if( ($page == $page_count) || ($page_count == 0) ){
   $page_string .= '下一页|尾页';
}
else{
   $page_string .= '<a href=?page='.($page+1).'&username='.$username.'&amount='.$amount.' class="main">下一页</a>|<a href=?page='.$page_count.'&username='.$username.'&amount='.$amount.' class="main" >尾页</a>';
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
                                                <form name="form1" method="post" class="box" action="index.php?amount=<?   echo $amount; ?>" >
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
                                              <div align="center"></div></td>
                                             
                                            </tr>
                                          </table></td>
                                      </tr>
                                    </table> 
                                    
                                  </td>
                                </tr>
                              </table></td>
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
                          <td><img src="../images/biglogo.gif" width="347" height="113"></td>
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