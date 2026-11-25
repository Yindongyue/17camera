<?php
session_start();
include '../conn.php';
include '../config/path.php';
include '../config/qx.php';
include '../config/dirinfo.php';
$pagesize = 16;
$username=trim($_GET["username"]);
$sql="select * from users2 where username='".$username."'";
$result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
$rs = mysql_fetch_array($result);
$jh=$rs["jhhao"];//文件夹
$str="";
$str2="";
     if ($rs["flag"]==1)  $str2='普通会员';
	 if ($rs["flag"]==2) {$str="<img src='/17pub/images/Icon_2.gif' alt='资深会员'>";$str2='资深会员';}
     if ($rs["flag"]==3) {$str="<img src='/17pub/images/ioc03.gif' alt='VIP会员'>";$str2='VIP会员';}
     if ($rs["flag"]==4) {$str="<img src='/17pub/images/Icon_4.gif' alt='管理员'>";$str2='管理员';}
	 
?>



<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>※逸憩摄影※17camera.com※</title>
<link href="../images/main.css" rel="stylesheet" type="text/css">
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?php include '../top.php'; ?>
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
                                        <td width="82%" height="16" valign="bottom" class="da02"><a href="newphoto.php" class="orange">上传作品</a></td>
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
                                        <td width="82%" height="16" valign="bottom" class="da02"><a href="#" class="orange">用户基本说明</a></td>
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
                                        <td width="82%" height="16" valign="bottom" class="da02"><a href="#" class="orange">相册空间说明</a></td>
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
                                        <td width="82%" height="16" valign="bottom" class="da02"><a href="../user/shenqing.php" class="orange">申请资深会员</a></td>
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
                                        <td width="82%" height="16" valign="bottom" class="da02"><a href="#" class="orange">购买相册空间</a></td>
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
                                        <td>
<? if ($_SESSION["qx"] == "4")
{
?>
                                          <div align="right" class="orange">管理员：<a href="../admin/xc_del.php?username=<?php echo $username?>" class="green" onClick='javascript:return window.confirm("将全部清空相片，您确认操作吗?")'>删除此相册</a>&nbsp;<a href="../admin/xc_tj.php?username=<?php echo $username?>" class="green">推荐此相册</a>&nbsp;&nbsp;&nbsp;&nbsp;</div>
<? }?>                                  </td>
                                      </tr>
                                    </table> 
                                    <table width="95%" border="1" cellpadding="2" cellspacing="0" bordercolor="#E3E3E3" style="border-collapse: collapse">
                                      <tr> 
                                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td width="77%" height="22" valign="bottom" bgcolor="#E3E3E3" class="black">&nbsp;&nbsp;<span class="zi">会 
                                                员：</span><span class="orange"><?php echo $username?><?php echo $str?></span></td>
                                              <td width="23%" valign="bottom" bgcolor="#E3E3E3" class="zi">累计浏览人次：<?php echo $rs["xc_dj"]?></td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="2"></td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="1" bgcolor="#E3E3E3"></td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="5"></td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr class="zi"> 
                                              <td width="50%" height="20" valign="bottom">&nbsp;&nbsp;身份区别： <?php echo $str2; ?></td>
                                              <td width="50%" valign="bottom">注册时间：<?php echo $rs["dat"] ?></td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td height="1" background="../images/hendian.gif"></td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td height="5"></td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr class="zi"> 
                                              <td width="50%" height="20" valign="bottom">&nbsp;&nbsp;相簿空间：
                                                <?php
	 if ($rs["flag"]==1) $str= $pt/1024;
     if ($rs["flag"]==2) $str= $zs/1024;
     if ($rs["flag"]==3) $str= $vip/1024;
     if ($rs["flag"]==4) $str= $admin/1024;
	 echo intval($str);    ?>
                                                K</td>
                                              <td width="50%" height="20" valign="bottom">已用空间：
<?php 
$photo_path=$photo_path.$jh."/";
$dirsize = dirsize("$photo_path");
echo intval(($dirsize["filesize"] /1024))?>K
                                              </td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td height="1" bgcolor="#E3E3E3"></td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td height="5"></td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr class="main"> 
                                              <td width="50%" height="20" valign="bottom">&nbsp;&nbsp;发表作品：
<?php 
$sql="select * from photo2 where users='".$username."' order by review_dat desc";
$result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
$num_rows = mysql_num_rows($result);
echo $num_rows;							   
?>                                 </td>
                                              <td width="50%" height="20" valign="bottom">&nbsp;</td>
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
                                                    <td width="350" valign="bottom" class="white"><strong>〖 
                                                      个人相册 〗</strong></td>
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
                                        <td height="60">
 <?
if (isset($_GET['page']))
{
$page = intval($_GET['page'] );
 $sql="select * from photo2 where users='".$username."' order by review_dat desc limit ". ($page-1)*$pagesize .", $pagesize";
}
 else if (isset($_POST['page']))
{
 $page = intval($_POST['page'] );
 $sql="select * from photo2 where users='".$username."' order by review_dat desc limit ". ($page-1)*$pagesize .", $pagesize";
 }

else
{
  $page = 1;
  $sql="select * from photo2 where users='".$username."' order by review_dat desc";
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

if ($page<1)
{
  $page=1;
} 



if ($rs==0)
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
        
		$sql="select flag,jhhao from users2 where username='".$rs["users"]."'"or die("Could not connect : " . mysql_error()); 
        $result2 = mysql_query($sql,$db);
		$rs_jh = mysql_fetch_array($result2);
        $jh=$rs_jh["jhhao"];
        $str="";
	 if ($rs_jh["flag"]==2) $str="<img src='/17pub/images/Icon_2.gif' alt='资深会员'>";
     if ($rs_jh["flag"]==3) $str="<img src='/17pub/images/ioc03.gif' alt='VIP会员'>";
     if ($rs_jh["flag"]==4) $str="<img src='/17pub/images/Icon_4.gif' alt='管理员'>";
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
   $page_string .= '<a href=?page=1'.'&username='.$username.'&amount='.$amount.'#01 class="main">第一页</a>|<a href=?page='.($page-1).'&username='.$username.'&amount='.$amount.'#01 class="main">上一页</a>|';
}
if( ($page == $page_count) || ($page_count == 0) ){
   $page_string .= '下一页|尾页';
}
else{
   $page_string .= '<a href=?page='.($page+1).'&username='.$username.'&amount='.$amount.'#01 class="main">下一页</a>|<a href=?page='.$page_count.'&username='.$username.'&amount='.$amount.'#01 class="main" >尾页</a>';
}
echo $page_string;
?>   
										  </font></span><font size="2"><span > 
                                            </span></font></div></td>
<? //	$page+=1; ?>											
                                        <td width="18%" height="45" valign="top"> 
                                 <form name="form1" method="POST" action="person.php?username=<? echo $username;echo "&amount="; echo $amount;?>" >
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
<?php require '../bottom.php'; ?>
<?  $sql="update users set xc_dj=xc_dj+1 where username='".$username."'";
  $result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error());?>
</body>
</html>
