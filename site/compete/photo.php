<?php
include '../conn.php';
include '../config/path2.php';
?>
<?php
$go=trim($_GET["go"]);
$pagesize = 16;


if (isset($_GET['page']))
{
$page = intval($_GET['page'] );
if ($go=="search")
{

  $xiangj=trim($_POST["xiangj"]);
  $leib=trim($_GET["leib"]);
  $names=trim($_POST["names"]);
  $sql="select names,leib,pid,dj,pic,users from photo2 where xiangj like'%".$xiangj."' and leib like '%".$leib."' and names like '%".$names."%' order by review_dat desc limit ". ($page-1)*$pagesize .", $pagesize";
  
}
  else
{

  $leib=trim($_GET["leib"]);
  $sql="select names,leib,pid,dj,pic,users from photo2 where leib='".$leib."' order by review_dat desc limit ". ($page-1)*$pagesize .", $pagesize";

} 
}
 else
{
if (isset($_POST['page']))
{
 $page = intval($_POST['page'] );
if ($go=="search")
{

  $xiangj=trim($_POST["xiangj"]);
  $leib=trim($_GET["leib"]);
  $names=trim($_POST["names"]);
  $sql="select names,leib,pid,dj,pic,users from photo2 where xiangj like'%".$xiangj."' and leib like '%".$leib."' and names like '%".$names."%' order by review_dat desc limit ". ($page-1)*$pagesize .", $pagesize";

}
  else
{

  $leib=trim($_GET["leib"]);
  $sql="select names,leib,pid,dj,pic,users from photo2 where leib='".$leib."' order by review_dat desc limit ". ($page-1)*$pagesize .", $pagesize";

} 
}
else
{
  $page = 1;
if ($go=="search")
{

  $xiangj=trim($_POST["xiangj"]);
  $leib=trim($_GET["leib"]);
  $names=trim($_POST["names"]);
  $sql="select names,leib,pid,dj,pic,users from photo2 where xiangj like'%".$xiangj."' and leib like '%".$leib."' and names like '%".$names."%' order by review_dat desc";

}
  else
{
  
  $leib=trim($_GET["leib"]);
  $sql="select names,leib,pid,dj,pic,users from photo2 where leib='".$leib."' order by review_dat desc";

} 
}
}


  $result = mysql_query($sql,$db);
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


if ($page<1)
{

  $page=1;
} 
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>※逸憩摄影※17camera.com※</title>
<link href="../images/main.css" rel="stylesheet" type="text/css">
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?php include '../top.php';include '../top2.php'; ?>
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
          <td width="723"><table width="100%" border="0" cellspacing="0" cellpadding="0">
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
                                    <table width="85%" border="0" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td width="18%" valign="middle"><img src="../images/j04.gif" width="11" height="11"></td>
                                        <td width="82%" height="16" valign="bottom" class="da02"><a href="photo.php?leib=1"  class="orange">人 
                                          像 类</a></td>
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
                                        <td width="82%" height="16" valign="bottom" class="da02"><a href="photo.php?leib=2" class="orange">风 
                                          景 类</a></td>
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
                                        <td width="82%" height="16" valign="bottom" class="da02"><a href="photo.php?leib=3" class="orange">生 
                                          态 类</a></td>
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
                                        <td width="82%" height="16" valign="bottom" class="da02"><a href="photo.php?leib=4" class="orange">纪 
                                          实 类</a></td>
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
                                        <td width="82%" height="16" valign="bottom" class="da02"><a href="photo.php?leib=5" class="orange">生 
                                          活 类</a></td>
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
                                        <td width="82%" height="16" valign="bottom" class="da02"><a href="photo.php?leib=6" class="orange">旅 
                                          游 类</a></td>
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
                                        <td width="82%" height="16" valign="bottom" class="da02"><a href="photo.php?leib=7" class="orange">微 
                                          距 类</a></td>
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
                                        <td width="82%" height="16" valign="bottom" class="da02"><a href="photo.php?leib=8" class="orange">人 
                                          文 类</a></td>
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
                                        <td width="82%" height="16" valign="bottom" class="da02"><a href="photo.php?leib=9" class="orange">建 
                                          筑 类</a></td>
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
                                        <td width="18%" valign="top"><img src="../images/j04.gif" width="11" height="11"></td>
                                        <td width="82%" height="16" valign="bottom" class="da02"><a href="photo.php?leib=10" class="orange">静 
                                          物 类</a></td>
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
                                        <td width="18%" valign="top"><img src="../images/j04.gif" width="11" height="11"></td>
                                        <td width="82%" height="16" valign="bottom" class="da02"><a href="photo.php?leib=11" class="orange">夜 
                                          景 类</a></td>
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
                                        <td width="18%" valign="top"><img src="../images/j04.gif" width="11" height="11"></td>
                                        <td width="82%" height="16" valign="bottom" class="da02"><a href="photo.php?leib=12" class="orange">人 
                                          体 类</a></td>
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
                                        <td width="92%"><form name="form2" method="post" action="photo.php?go=search&" style="MARGIN: 0px; PADDING-BOTTOM: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; PADDING-TOP: 0px"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr align="center" valign="bottom"><td width="27%"><select name="xiangj" id="xiangj" style="BORDER-RIGHT: #9a9999 1px solid; BORDER-TOP: #9a9999 1px solid; FONT-SIZE: 12px; BORDER-LEFT: #9a9999 1px solid; WIDTH: 100px; height=18px; BORDER-BOTTOM: #9a9999 1px solid; BACKGROUND-COLOR: #ffffff"><option value="%">品牌不限</option>
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
                                                <td width="27%"> <select name="leib" id="leib">
                                                    <option value="%">类别不限</option>
                                                    <option value="1">人像类</option>
                                                    <option value="2">风景类</option>
                                                    <option value="3">生态类</option>
                                                    <option value="4">纪实类</option>
                                                    <option value="5">生活类</option>
                                                    <option value="6">旅游类</option>
                                                    <option value="7">微距类</option>
                                                    <option value="8">人文类</option>
                                                    <option value="9">建筑类</option>
                                                    <option value="10">静物类</option>
                                                    <option value="11">夜景类</option>
                                                    <option value="12">人体类</option>
                                                  </select> </td>
                                                <td width="27%"><input name=names id="serach2" 
                  style="BORDER-RIGHT: #9a9999 1px solid; BORDER-TOP: #9a9999 1px solid; FONT-SIZE: 12px; BORDER-LEFT: #9a9999 1px solid; WIDTH: 100px; height=18px; BORDER-BOTTOM: #9a9999 1px solid; BACKGROUND-COLOR: #ffffff" 
                  size=10 maxsize="32">
                                                </td>
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
                                        <td><table width="360" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="27" background="../images/fototi.gif"><table width="360" border="0" cellspacing="0" cellpadding="0">
                                                  <tr>
                                                    <td width="10">&nbsp;</td>
                                                    <td width="350" valign="bottom" class="white"><strong>
                                                   <? 
if ($leib=="1")
{
  $b="人&nbsp;像&nbsp;类";
} 
if ($leib=="2")
{
  $b="风&nbsp;景&nbsp;类";
} 
if ($leib=="3")
{
  $b="生&nbsp;态&nbsp;类";
} 
if ($leib=="4")
{
  $b="纪&nbsp;实&nbsp;类";
} 
if ($leib=="5")
{
  $b="生&nbsp;活&nbsp;类";
} 
if ($leib=="6")
{
  $b="旅&nbsp;游&nbsp;类";
} 
if ($leib=="7")
{
  $b="微&nbsp;距&nbsp;类";
} 
if ($leib=="8")
{
  $b="人&nbsp;文&nbsp;类";
} 
if ($leib=="9")
{
  $b="建&nbsp;筑&nbsp;类";
} 
if ($leib=="10")
{
  $b="静&nbsp;物&nbsp;类";
} 
if ($leib=="11")
{
  $b="夜&nbsp;景&nbsp;类";
} 
if ($leib=="12")
{
  $b="人&nbsp;体&nbsp;类";
} 

if ($go=="search")
{
  $b="搜索结果"; } ?><a name="01"></a>〖 <? echo $b; ?> 〗</strong></td>
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
                                    <table width="95%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td>
<? if ($rs==0)
{
  print "还没有作品";
} 
for ($ipage=1; $ipage<=$pagesize; $ipage=$ipage+1)
{
?>
                                          <table width="100%" border="0">
                                            <tr> 
 <? 
    $k=1;
    for ($k=1; $k<=4; $k=$k+1)
    {

      if (!($rs==0))
      {
        
		$sql="select flag,jhhao from users2 where username='".$rs["users"]."'";
        $result2 = mysql_query($sql,$db);
		$rs_jh = mysql_fetch_array($result2);
        $jh=$rs_jh["jhhao"];
        $str="";
	 if ($rs_jh["flag"]==2) $str="<img src='/images/Icon_2.gif' alt='资深会员'>";
     if ($rs_jh["flag"]==3) $str="<img src='/images/ioc03.gif' alt='VIP会员'>";
     if ($rs_jh["flag"]==4) $str="<img src='/images/Icon_4.gif' alt='管理员'>";
       $a="<table border='0' cellspacing='0' cellpadding='0'><tr align='center' valign='top'><td width='25%'><table width='130' border='1' cellpadding='0' cellspacing='0' bordercolor='#CCCCCC' style='border-collapse: collapse'><tr><td height='110' align='center' valign='middle'><a href='showphoto.php?pid=".$rs["pid"]."' target='_blank''><img src='".$url_path.$jh."/".$rs["pic"]."' width='100' border='0'></a></td> </tr></table><table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td height='3'></td></tr></table><table width='130' border='1' cellpadding='0' cellspacing='0' bordercolor='#CCCCCC' style='border-collapse: collapse'><tr><td height='60' align='center' bgcolor='#F5F5F5' class='main'>[".$rs["names"]."]<br>作者：<a href='person.php?username=".$rs["users"]."'class='main' target='_blank'>".$rs["users"]."</a>".$str."<br>点击：".$rs["dj"]."</td></tr></table></td></tr></table>";
       }
        else
      {

        $a="";
      } ?>
  <td width="25%" align="left" valign="bottom"><?  echo $a; ?></td>
<? 
      if (!($rs==0))
      {

          $rs = mysql_fetch_array($result);
        $ipage=$ipage+1;
		
      } 
  
    } 

 ?>
                                            </tr>
                                          </table>
                                          <? 
    if (($rs==0))
    {
      //break;
    } 

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
   $page_string .= '<a href=?page=1'.'&leib='.$leib.'&amount='.$amount.'#01 class="main">第一页</a>|<a href=?page='.($page-1).'&leib='.$leib.'&amount='.$amount.'#01 class="main">上一页</a>|';
}
if( ($page == $page_count) || ($page_count == 0) ){
   $page_string .= '下一页|尾页';
}
else{
   $page_string .= '<a href=?page='.($page+1).'&leib='.$leib.'&amount='.$amount.'#01 class="main">下一页</a>|<a href=?page='.$page_count.'&leib='.$leib.'&amount='.$amount.'#01 class="main" >尾页</a>';
}
echo $page_string;
?>   
										  </font></span><font size="2"><span > 
                                            </span></font></div></td>
<? //	$page+=1; ?>											
                                        <td width="18%" height="45" valign="top"> 
                                 <form name="form1" method="POST" action="photo.php?leib=<? echo $leib;echo "&amount="; echo $amount;?>" >
                                            <div align="right"> 
                                              <input type="text" id="page" name="page" size="3" >
                                              <input type="submit" name="Submit22" value="G O">
                                            </div>
                                          </form>
                                          <div align="right"> 
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
