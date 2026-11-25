<?
  session_start();
  include '../conn.php';
  include '../config/path.php';
  include '../config/geturl.php';
  $loginname=$_SESSION['loginname'];
  $jh=$_SESSION["jh"];
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>※逸憩摄影※17camera.com※</title>
<link href="../images/main.css" rel="stylesheet" type="text/css">
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<? include "../top.php"?>
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
                                  <td width="130" height="279" align="center" valign="top" bgcolor="#FFFFFF"> 
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td height="10"></td>
                                      </tr>
                                    </table>
                                    <table width="85%" border="0" cellpadding="0" cellspacing="0">
                                      <tr> 
                                        <td width="18%" valign="middle"><img src="../images/j04.gif" width="11" height="11"></td>
                                        <td width="82%" height="16" valign="bottom" class="da02"><a href="pic_mod/modi_ps.php" target="_blank" class="orange">密码修改</a></td>
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
                                    <table width="85%" border="0" cellpadding="0" cellspacing="0">
                                      <tr> 
                                        <td width="18%" valign="middle"><img src="../images/j04.gif" width="11" height="11"></td>
                                        <td width="82%" height="16" valign="bottom" class="da02"><a href="pic_mod/modi_user.php" target="_blank" class="orange">资料修改</a></td>
                                      </tr>
                                    </table>
                                    <table width="85%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td height="1" bgcolor="#DDDDDD"></td>
                                      </tr>
                                    </table>
                                    <table width="80%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td height="5"></td>
                                      </tr>
                                    </table>
                                    <table width="85%" border="0" cellpadding="0" cellspacing="0">
                                      <tr> 
                                        <td width="18%" valign="middle"><img src="../images/j04.gif" width="11" height="11"></td>
                                        <td width="82%" height="16" valign="bottom" class="da02"><a href="../photo/newphoto.php" target="_blank" class="orange">上传相片</a></td>
                                      </tr>
                                    </table>
                                    <table width="85%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td height="1" bgcolor="#DDDDDD"></td>
                                      </tr>
                                    </table>
                                    <table width="80%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td height="5"></td>
                                      </tr>
                                    </table>
                                    <table width="85%" border="0" cellpadding="0" cellspacing="0">
                                      <tr> 
                                        <td width="18%" valign="middle"><img src="../images/j04.gif" width="11" height="11"></td>
                                        <td width="82%" height="16" valign="bottom" class="da02"><a href="shenqing.php" target="_blank" class="orange">申请高级会员</a></td>
                                      </tr>
                                    </table>
                                    <table width="85%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td height="1" bgcolor="#DDDDDD"></td>
                                      </tr>
                                    </table>
                                    <table width="80%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td height="5"></td>
                                      </tr>
                                    </table>
                                    <table width="85%" border="0" cellpadding="0" cellspacing="0">
                                      <tr> 
                                        <td width="18%" valign="middle"><img src="../images/j04.gif" width="11" height="11"></td>
                                        <td width="82%" height="16" valign="bottom" class="da02"><a href="logout.php" class="orange">退出</a></td>
                                      </tr>
                                    </table>
                                    <table width="85%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td height="1" bgcolor="#DDDDDD"></td>
                                      </tr>
                                    </table>
                                    <table width="80%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td height="5"></td>
                                      </tr>
                                    </table>
                                    
                                  </td>
                                  <td width="1" background="../images/shudian.gif" bgcolor="#C0C0C0"></td>
                                  <td width="591" align="center" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td>&nbsp;</td>
                                      </tr>
                                    </table>
                                    <table width="95%" border="1" cellpadding="0" cellspacing="0" bordercolor="#E3E3E3" style="border-collapse: collapse">
                                      <tr> 
                                        <td width="8%"><img src="../images/fotoser.gif" width="93" height="35"></td>
                                        <td width="92%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr align="center" valign="bottom"> 
                                              <td width="27%"><select name="select" style="BORDER-RIGHT: #9a9999 1px solid; BORDER-TOP: #9a9999 1px solid; FONT-SIZE: 12px; BORDER-LEFT: #9a9999 1px solid; WIDTH: 100px; height=18px; BORDER-BOTTOM: #9a9999 1px solid; BACKGROUND-COLOR: #ffffff">
                                                  <option value="品牌不限">品牌不限</option>
                                                  <option value="canon">佳能</option>
                                                  <option value="nikon">尼康</option>
                                                  <option value="fujifilm">富士</option>
                                                  <option value="kodak">柯达</option>
                                                  <option value="sony">索尼</option>
                                                  <option value="ricoh">理光</option>
                                                  <option value="casio">卡西欧</option>
                                                  <option value="sigma">适马</option>
                                                  <option value="samsung">三星</option>
                                                  <option value="pentax">宾得</option>
                                                  <option value="olympus">奥林巴斯</option>
                                                  <option value="minolta">美能达</option>
                                                  <option value="panasonic">松下</option>
                                                  <option value="其他品牌">其他品牌</option>
                                                </select></td>
                                              <td width="27%"> <select name="select2" style="BORDER-RIGHT: #9a9999 1px solid; BORDER-TOP: #9a9999 1px solid; FONT-SIZE: 12px; BORDER-LEFT: #9a9999 1px solid; WIDTH: 100px; height=18px; BORDER-BOTTOM: #9a9999 1px solid; BACKGROUND-COLOR: #ffffff">
                                                  <option value="分类不限">分类不限</option>
                                                  <option value="人像类">人像类</option>
                                                  <option value="风景类">风景类</option>
                                                  <option value="生态类">生态类</option>
                                                  <option value="纪实类">纪实类</option>
                                                  <option value="生活类">生活类</option>
                                                  <option value="旅游类">旅游类</option>
                                                  <option value="微距类">微距类</option>
                                                  <option value="人文类">人文类</option>
                                                  <option value="建筑类">建筑类</option>
                                                  <option value="静物类">静物类</option>
                                                  <option value="夜景类">夜景类</option>
                                                  <option value="人体类">人体类</option>
                                                </select> </td>
                                              <td width="27%"><font 
                              color=#000000> 
                                                <input name=serach id="serach" 
                  style="BORDER-RIGHT: #9a9999 1px solid; BORDER-TOP: #9a9999 1px solid; FONT-SIZE: 12px; BORDER-LEFT: #9a9999 1px solid; WIDTH: 100px; height=18px; BORDER-BOTTOM: #9a9999 1px solid; BACKGROUND-COLOR: #ffffff" 
                  size=10 maxsize="32">
                                                </font></td>
                                              <td width="19%"> <input name="imageField" type="image" src="../images/serti.gif" width="70" height="20" border="0"></td>
                                            </tr>
                                          </table></td>
                                      </tr>
                                    </table>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td>&nbsp;</td>
                                      </tr>
                                    </table>
                                    <table width="95%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td><table width="360" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td height="27" background="../images/fototi.gif"><table width="360" border="0" cellspacing="0" cellpadding="0">
                                                  <tr> 
                                                    <td width="10">&nbsp;</td>
                                                    <td width="350" valign="bottom" class="white"><? echo $loginname ?>你好！</td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                          </table></td>
                                      </tr>
                                    </table>
                                    <table width="95%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td>&nbsp;</td>
                                      </tr>
                                    </table>
                                    <table width="95%" border="0" align="center" cellspacing="1" bgcolor="#999999">
                                      <tr valign="bottom" bgcolor="#FFFFFF" class="main"> 
                                        <td width="150"> 
                                          <div align="center"></div></td>
                                        <td width="180" height="18"> 
                                          <div align="center">图片名</div></td>
                                        <td width="103"> 
                                          <div align="center">大小</div></td>
                                        <td width="186"> 
                                          <div align="center">上传日期</div></td>
                                        <td width="67"> 
                                          <div align="center">删除</div></td>
                                        <td width="65"> 
                                          <div align="center">详情</div></td>
                                      </tr>
 <?

$pagesize=15;
if (isset($_GET['page']))
{
$page = intval($_GET['page'] );  
$sql="select * from photo where users='".$loginname."' order by pid desc limit ". ($page-1)*$pagesize .", $pagesize";
}
 else if (isset($_POST['page']))
{
 $page = intval($_POST['page'] );
 $sql="select * from photo where users='".$loginname."' order by pid desc limit ". ($page-1)*$pagesize .", $pagesize";
}
else
{ 
  $page = 1;
  $sql="select * from photo where users='".$loginname."' order by pid desc";
} 
$result = mysql_query($sql,$db) or die("Query failed : " . mysql_error());
$rs = mysql_fetch_array($result);
if ($rs==0)
{
  print "还没有上传图片";
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
                                      <tr bgcolor="#FFFFFF" class="main"> 
                                        <td height="180"> 
                                          <div align="center">
                                            <table width="130" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" style="border-collapse: collapse">
                                              <tr> 
                                                <td height="130" align="center" valign="middle"><img src=<?     echo $url_path; ?><?     echo $jh; ?>/<?     echo $rs["pic"]; ?> width="120"></td>
                                              </tr>
                                            </table>
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr> 
                                                <td height="3"></td>
                                              </tr>
                                            </table>
                                            <table width="130" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" style="border-collapse: collapse">
                                              <tr> 
                                                <td height="10" align="center" valign="bottom" bgcolor="#F5F5F5" class="main">&nbsp;</td>
                                              </tr>
                                            </table>
                                            
                                            
                                          </div></td>
                                        <td> 
                                          <div align="center"><?     echo $rs["names"]; ?></div></td>
                                        <td> 
                                          <div align="center"><?     echo intval($rs["sizes"]/1024); ?>k</div></td>
                                        <td> 
                                          <div align="center"><?     echo $rs["dat"]; ?></div></td>
                                        <td> 
                                          <div align="center"><a href="pic_mod/pic_del.php?pid=<?     echo $rs["pid"]; ?>&pic=<?     echo $rs["pic"]; ?>" class="orange">删除</a></div></td>
                                        <td> 
                                          <div align="center"><a href="../photo/showphoto.php?pid=<?     echo $rs["pid"]; ?>" target="_blank" class="orange">详情</a></div></td>
                                      </tr>
  <? 
    $rs=mysql_fetch_array($result);

    if (($rs==0))
    {
      break;
    } 
} 
?>
                                    </table>
                                    <table width="95%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td>&nbsp;</td>
                                      </tr>
                                    </table>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                                            <p> 
                                            <tr> 
                                              <td width="82%" height="45" valign="top"> 
                                              <div align="right">&nbsp;<span class="main">&nbsp;<font size="2">共<? echo $page_count ?>页，分<? echo $pagesize ?>条显示，当前页是：<? echo $page ?>/<? echo $page_count ?>页， 
 <?	// 翻页链接
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
                                                  </span><span > </span></div></td>
                                              <td width="18%" height="45" valign="top"> 

                                              </td>
                                            </tr>
                                          </table></td>
                                      </tr>
                                    </table></td>
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
</body>
</html>
