<?php
include '../conn.php';
include '../config/path.php';
?>
<?php
$sql="select leib,dat from leib order by dat desc limit 0 , 5 ";
$result= mysql_query($sql,$db);
$myrows = mysql_fetch_array($result);
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>※逸憩摄影※17camera.com※</title>
<link href="../images/main.css" rel="stylesheet" type="text/css">
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?php include '../top.php';include '../top2.php'; ?>
<table width="760" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="36" align="left" valign="top" bgcolor="#F5F5F5">&nbsp;</td>
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
                      <td>
<table width="723" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="722" height="101" align="left" valign="top"><table width="722" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                  <td width="160" height="64" align="center" valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td><img src="../images/fenleiti.gif" width="92" height="24"></td>
                                      </tr>
                                    </table>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td height="1" background="../images/hendian.gif"></td>
                                      </tr>
                                    </table>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td height="10"></td>
                                      </tr>
                                    </table> 
                                    <table width="80%" border="0" cellspacing="0" cellpadding="0">
                                      <tr align="center" valign="bottom" class="main"> 
                                        <td height="22">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="25%" align="center"><img src="../images/dot2.gif" width="7" height="7"></td>
                                              <td width="75%" valign="bottom" class="main"><a href="photo.php?leib=1" class="main">人像类</a></td>
                                            </tr>
                                          </table>
                                        </td>
                                        <td width="50%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td width="25%" align="center"><img src="../images/dot2.gif" width="7" height="7"></td>
                                              <td width="75%" valign="bottom" class="main"><a href="photo.php?leib=2" class="main">风景类</a></td>
                                            </tr>
                                          </table></td>
                                      </tr>
                                      <tr align="center" valign="bottom" class="main">
                                        <td height="22"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td width="25%" align="center"><img src="../images/dot2.gif" width="7" height="7"></td>
                                              <td width="75%" valign="bottom" class="main"><a href="photo.php?leib=3" class="main">生态类</a></td>
                                            </tr>
                                          </table></td>
                                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td width="25%" align="center"><img src="../images/dot2.gif" width="7" height="7"></td>
                                              <td width="75%" valign="bottom" class="main"><a href="photo.php?leib=4" class="main">纪实类</a></td>
                                            </tr>
                                          </table></td>
                                      </tr>
                                      <tr align="center" valign="bottom" class="main">
                                        <td height="22">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td width="25%" align="center"><img src="../images/dot2.gif" width="7" height="7"></td>
                                              <td width="75%" valign="bottom" class="main"><a href="photo.php?leib=5" class="main">生活类</a></td>
                                            </tr>
                                          </table>
                                        </td>
                                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td width="25%" align="center"><img src="../images/dot2.gif" width="7" height="7"></td>
                                              <td width="75%" valign="bottom" class="main"><a href="photo.php?leib=6" class="main">旅游类</a></td>
                                            </tr>
                                          </table></td>
                                      </tr>
                                      <tr align="center" valign="bottom" class="main">
                                        <td height="22">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td width="25%" align="center"><img src="../images/dot2.gif" width="7" height="7"></td>
                                              <td width="75%" valign="bottom" class="main"><a href="photo.php?leib=7" class="main">微距类</a></td>
                                            </tr>
                                          </table>
                                        </td>
                                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td width="25%" align="center"><img src="../images/dot2.gif" width="7" height="7"></td>
                                              <td width="75%" valign="bottom" class="main"><a href="photo.php?leib=8" class="main">人文类</a></td>
                                            </tr>
                                          </table></td>
                                      </tr>
                                      <tr align="center" valign="bottom" class="main">
                                        <td height="22">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td width="25%" align="center"><img src="../images/dot2.gif" width="7" height="7"></td>
                                              <td width="75%" valign="bottom" class="main"><a href="photo.php?leib=9" class="main">建筑类</a></td>
                                            </tr>
                                          </table>
                                        </td>
                                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td width="25%" align="center"><img src="../images/dot2.gif" width="7" height="7"></td>
                                              <td width="75%" valign="bottom" class="main"><a href="photo.php?leib=10" class="main">静物类</a></td>
                                            </tr>
                                          </table></td>
                                      </tr>
                                      <tr align="center" valign="bottom" class="main">
                                        <td height="22"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td width="25%" align="center"><img src="../images/dot2.gif" width="7" height="7"></td>
                                              <td width="75%" valign="bottom" class="main"><a href="photo.php?leib=11" class="main">夜景类</a></td>
                                            </tr>
                                          </table></td>
                                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td width="25%" align="center"><img src="../images/dot2.gif" width="7" height="7"></td>
                                              <td width="75%" valign="bottom" class="main"><a href="photo.php?leib=12" class="main">人体类</a></td>
                                            </tr>
                                          </table></td>
                                      </tr>
                                    </table>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td>&nbsp;</td>
                                      </tr>
                                    </table></td>
                                  <td width="1" bgcolor="#C0C0C0"></td>
                                  <td width="561" align="center" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td height="25" align="left" valign="top" background="../images/sens_main_width2.gif"><img src="../images/jiazuoti.gif" width="125" height="24"></td>
                                      </tr>
                                    </table> 
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td height="10"></td>
                                      </tr>
                                    </table>
                                    <table width="98%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td><table width="100%" border="0">
                                            <tr> 
<?php
$sql="select * from photo where tj='1' order by review_dat desc";
$rs1= mysql_query($sql,$db);
$num_rows = mysql_num_rows($rs1);
$k=1;
for ($k=1; $k<=4; $k=$k+1)
{
   $myrow = mysql_fetch_array($rs1); 
  if (!($num_rows==0))
  {
     $sql="select jhhao from users where username='".$myrow["users"]."'";
	 $rs_jh= mysql_query($sql,$db);
	 $myrow2 = mysql_fetch_array($rs_jh);
     $jh=$myrow2["jhhao"];
     $a="<table border='0' cellspacing='0' cellpadding='0'><tr align='center' valign='top'><td width='25%'><table width='120' border='1' cellpadding='0' cellspacing='0' bordercolor='#CCCCCC' style='border-collapse: collapse'><tr><td height='110' align='center' valign='middle'><a href='showphoto.php?pid=".$myrow["pid"]."' target='_blank''><img src='".$url_path.$jh."/".$myrow["pic"]."' width='100' border='0'></a></td> </tr></table><table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td height='3'></td></tr></table><table width='120' border='1' cellpadding='0' cellspacing='0' bordercolor='#CCCCCC' style='border-collapse: collapse'><tr><td height='18' align='center' valign='bottom' bgcolor='#F5F5F5' class='main'>[".$myrow["names"]."]</td></tr></table></td></tr></table>";
 
  }
    else
  {

    $a="";
  } 
  ?>                                          
											
       <td width="25%" align="left" valign="bottom"><?php echo $a; ?></td>
  <? 
} 
?>
                                            </tr>
                                          </table></td>
                                      </tr>
                                    </table>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td width="84%" height="25">&nbsp;</td>
                                        <td width="16%"><a href="photo_j.php?leib=<?=$myrows["leib"]?>"><img src="../images/more11.jpg" width="67" height="14" border="0"></a></td>
                                      </tr>
                                    </table></td>
                                </tr>
                              </table>
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
                                        <td><img src="../images/updateti.gif" width="722" height="36"></td>
                                      </tr>
                                    </table>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td height="10"></td>
                                      </tr>
                                    </table>
                                    <?
									$sql="select leib,dat from leib order by dat desc limit 0 , 5 ";
									$result= mysql_query($sql,$db);
									while ($myrows = mysql_fetch_array($result)) 
									{ ?>
									<table width="700" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="89%"><a href="photo.php?leib=<?=$myrows["leib"]?>"><img src="../images/foto<?=$myrows["leib"]?>.gif" width="92" height="24" border="0"></a></td>
                                              <td width="11%"><a href="photo.php?leib=<?=$myrows["leib"]?>" target="_blank"><img src="../images/more11.jpg" border="0"></a></td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="1" background="../images/hendian.gif"></td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td height="10"></td>
                                            </tr>
                                          </table> 
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td align="center" valign="top">
                                                <table width="100%" border="0">
                                                  <tr> 
                                                  
                                               <?php
//$sql= "select * from photo where leib='".$myrows["leib"]."' order by review_dat desc";
$sql= "select * from photo where leib='".$myrows["leib"]."' order by pid desc";
$rs1= mysql_query($sql,$db);
$num_rows = mysql_num_rows($rs1);
$k=1;
for ($k=1; $k<=5; $k=$k+1)
{
   $myrow = mysql_fetch_array($rs1); 
  if (!($num_rows==0))
  {
     $sql="select flag,jhhao  from users where username='".$myrow["users"]."'";
	 $rs_jh= mysql_query($sql,$db);
	 $myrow2 = mysql_fetch_array($rs_jh);
     $jh=$myrow2["jhhao"];
	 $str="";
	 if ($myrow2["flag"]==2) $str="<img src='/images/Icon_2.gif' alt='资深会员'>";
     if ($myrow2["flag"]==3) $str="<img src='/images/ioc03.gif' alt='VIP会员'>";
     if ($myrow2["flag"]==4) $str="<img src='/images/Icon_4.gif' alt='管理员'>";
	 
     
$a="<table border='0' cellspacing='0' cellpadding='0'><tr align='center' valign='top'><td width='25%'><table width='130' border='1' cellpadding='0' cellspacing='0' bordercolor='#CCCCCC' style='border-collapse: collapse'><tr><td height='110' align='center' valign='middle'><a href='showphoto.php?pid=".$myrow["pid"]."' target='_blank'><img src='".$url_path.$jh."/".$myrow["pic"]."' width='100' border='0'></a></td> </tr></table><table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td height='3'></td></tr></table><table width='130' border='1' cellpadding='0' cellspacing='0' bordercolor='#CCCCCC' style='border-collapse: collapse'><tr><td height='35' align='center' valign='bottom' bgcolor='#F5F5F5' class='main'>[".$myrow["names"]."]<br>作者：<a href='person.php?username=".$myrow["users"]."'class='main' target='_blank'>".$myrow["users"]."</a>".$str."<br>点击：".$myrow["dj"]."</td></tr></table></td></tr></table>";

  }
    else
  {

    $a="";
  } 
  ?>                                          
											
       <td width="25%" align="left" valign="bottom"><?php echo $a; ?></td>
  <? 
} 
?>  
                                     
                                                  </tr>
                                                </table> </td>
                                            </tr>
                                          </table></td>
                                      </tr>
                                    </table>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td>&nbsp;</td>
                                      </tr>
                                    </table>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td>&nbsp;</td>
                                      </tr>
                                    </table> 
									<? } ?>
                                    
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
<?php require '../bottom.php'; ?>
</body>
</html>