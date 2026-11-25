<?php
	session_start();
	include 'config/path.php';
	include 'conn.php';
	include 'top3.php';
	$sql="select * from ca_product order by id desc limit 0,3";
	$rs_dc_query = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
	$rs_dc = mysql_fetch_array($rs_dc_query); 
?>
<SCRIPT language=JavaScript>
	//window.open('temp.htm','',"width=480,height=320,left=0,top=0,resizable=1,scrollbars=1");
</SCRIPT>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>※逸憩摄影※17camera.com※</title>
<link href="images/main.css" rel="stylesheet" type="text/css">
<style type="text/css">
#heroSlider { position:relative; width:591px; height:286px; overflow:hidden; }
#heroSlider .hero-main { position:relative; width:591px; height:206px; }
#heroSlider .hero-foot { position:relative; width:591px; height:80px; }
#heroSlider img.hero-slide { position:absolute; left:0; top:0; opacity:0; filter:alpha(opacity=0); transition:opacity .6s ease; }
#heroSlider img.hero-slide.on { opacity:1; filter:alpha(opacity=100); }
#heroSlider .hero-nav { position:absolute; left:8px; bottom:6px; z-index:5; font:11px/16px Verdana,Tahoma; }
#heroSlider .hero-nav a { display:inline-block; height:16px; line-height:16px; padding:0 5px; margin-right:4px; background:rgba(0,0,0,.45); color:#fff; text-decoration:none; }
#heroSlider .hero-nav a.on { background:#b00; }
#heroSlider .hero-nav a:hover { background:#000; }
</style>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<SCRIPT language=JavaScript src="image.js"></SCRIPT>
<div id="floater" style="position:absolute; width:120px; height:511px; z-index:1; left: 761px; top: 100px;"><a href="user/zhuce.php" target="_blank"><img src="images/ad01.gif" alt="免费注册会员" width="120" height="511" border="0"></a></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="4" bgcolor="#C2C0C1"></td>
  </tr>
</table>
<table width="760" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="36" align="left" valign="top" bgcolor="#F5F5F5">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="right" valign="top"><img src="images/sens_left_back1.gif" width="36" height="207"></td>
        </tr>
      </table>
    </td>
    <td width="724" align="left" valign="top"> 
      <table width="724" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="1" bgcolor="#CFCFCF"></td>
          <td width="723"><table width="723" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td width="130" valign="top" background="images/sens_main_1pixcel_line.gif"> 
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><img src="images/sens_main_top_bt02.gif" width="130" height="206"></td>
                    </tr>
                  </table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td height="1" background="images/hendian.gif"></td>
                    </tr>
                  </table>
                </td>
                <td width="1" background="images/shudian.gif"></td>
                <td width="591" align="left" valign="top">
                  <div id="heroSlider">
                    <div class="hero-main">
                      <img class="hero-slide on" src="images/sens_main_top_baner.gif" width="591" height="206" alt="">
                      <img class="hero-slide" src="images/sens_main_top_baner1.gif" width="591" height="206" alt="">
                    </div>
                    <div class="hero-foot">
                      <img class="hero-slide on" src="images/sens_main_top_baner_footer.gif" width="591" height="80" alt="">
                      <img class="hero-slide" src="images/sens_main_top_baner_footer1.gif" width="591" height="80" alt="">
                    </div>
                    <div class="hero-nav">
                      <a href="javascript:;" data-dir="-1" title="上一张">‹</a><a href="javascript:;" data-i="0" class="on">1</a><a href="javascript:;" data-i="1">2</a><a href="javascript:;" data-dir="1" title="下一张">›</a>
                    </div>
                  </div>
                </td>
                <td width="1" background="images/shudian.gif"></td>
              </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="1" background="images/hendian.gif"></td>
              </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td background="images/sens_main_1pixcel_line.gif">
                       <table width="723" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="722" height="101" align="left" valign="top"><table width="722" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                  <td width="260" height="64" align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td height="10"></td>
                                      </tr>
                                    </table>
                                    <table width="235" border="1" cellpadding="0" cellspacing="0" bordercolor="#666666" bgcolor="#FFFFFF" style="border-collapse: collapse">
                                      <tr>
                                        <td align="center" valign="top"><table width="235" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td height="180" align="center" valign="middle" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr>
                                                    <td><img src="images/jzsxti.gif" width="107" height="25"></td>
                                                  </tr>
                                                </table>
                                                <table width="220" border="0" cellspacing="0" cellpadding="0">
                                                  <tr> 
                                                    <td align="center"> 
														<? 
														$sql="select * from photo where tj='1'";
														$result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
														$no=mysql_num_rows($result)-1;
														$chcNum=mt_rand(0,$no);
														mysql_data_seek($result, $chcNum);
														$rs1 = mysql_fetch_array($result); 																								
														   if (($rs1==0)){														
															  print "暂无推荐";
															} else{															
															  $sql="select flag,jhhao from users where username='".$rs1["users"]."'";
															  $result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
															  $rs_jh= mysql_fetch_array($result);  
															  $jh2=$rs_jh["jhhao"]; ?>
                                                          <a href="photo/showphoto.php?pid=<? echo $rs1["pid"]; ?>" target="_blank"><img src=<?       echo $url_path; ?><?  echo $rs_jh["jhhao"]; ?>/<?  echo $rs1["pic"]; ?> height="165" border="0"></a> 
														<? } ?>  
                                                    </td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td height="10"></td>
                                            </tr>
                                          </table>
                                          <table width="210" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td width="110" align="left" valign="bottom" class="main"><? echo $rs1["names"]; ?></td>
                                             <td width="110" align="right" valign="bottom" class="main">作者：<a href="photo/person.php?username=<? echo $rs1["users"]; ?>" target="_blank" class="main"><? echo $rs1["users"]; ?></a> 
                                                
                                              </td>
                                            </tr>
                                          </table>
                                                                                
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="5"></td>
                                            </tr>
                                          </table> </td>
                                      </tr>
                                    </table>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td height="10"></td>
                                      </tr>
                                    </table></td>
                                  <td width="1" bgcolor="#C0C0C0"></td>
                                  <td width="461" align="center" valign="top" bgcolor="#FFFFFF">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td height="45" align="center"> 
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="1%">&nbsp;</td>
                                              <td width="98%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr>
                                                    <td width="82%"><img src="images/newshowti.gif" width="134" height="32"></td>
                                                    <td width="18%" valign="bottom" class="main"><a href="camera/index.php" class="main">更多新品>></a></td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                          </table>
                                          <table width="431" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="431" height="1" background="images/hendian.gif"></td>
                                            </tr>
                                          </table>
                                        </td>
                                      </tr>
                                    </table>
                                    <table width="130" border="0" cellpadding="0" cellspacing="0">
                                    <? 
									  $k=1;
									  for ($k=1; $k<=3; $k=$k+1)
									  {
										if (!($rs_dc==0)){
											
											$sql="select sort from ca_sorts where sortid=".$rs_dc["class"]."";
											$result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
											$rs1 = mysql_fetch_array($result);									
									        $a="<table width='145' border='0' cellspacing='0' cellpadding='0'><tr><td width='141' align='right' valign='top'> <table width='130' border='1' cellpadding='0' cellspacing='0' bordercolor='#CCCCCC' style='border-collapse: collapse'><tr><td align='center' valign='top'><a href='/camera/dc.php?id=".$rs_dc["id"]."&camera=".$rs1["sort"]."' target='_blank' class='orange'><img src='/camera/admin/image/".$rs_dc["pic"]."' width='126' height='90' border='0'></a></td></tr></table><table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td height='3'></td></tr></table><table width='130' border='1' cellpadding='0' cellspacing='0' bordercolor='#CCCCCC' style='border-collapse: collapse'><tr><td align='center' valign='top'><table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td width='12%' align='center' valign='bottom' class='main'>·</td><td width='88%' height='18' valign='bottom' class='main'>".$rs1["sort"]."</td></tr></table><table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td width='12%' align='center' valign='bottom' class='main'>·</td><td width='88%' height='18' valign='bottom' class='main'>".$rs_dc["xs"]."万象素</td></tr></table><table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td width='12%' align='center' valign='bottom' class='main'>·</td><td width='88%' height='18' valign='bottom' class='main'>".$rs_dc["gxbj"]."倍光学变焦</td></tr></table></td></tr></table><table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td height='3'></td></tr></table><table width='130' border='1' cellpadding='0' cellspacing='0' bordercolor='#CCCCCC' style='border-collapse: collapse'><tr><td height='20' align='center' valign='middle' bgcolor='#F5F5F5' class='main'><a href='/camera/dc.php?id=".$rs_dc["id"]."&camera=".$rs1["sort"]."' target='_blank' class='orange'><strong>".$rs_dc["xingh"]."</strong></a></td></tr></table></td><td width='12'>&nbsp;</td></tr></table>";
										} else{
										    $a="";
										} 
									 ?>
                                        <td valign="bottom" > <div align="center">  <? echo $a; ?></div></td>
									 <? 
										if (!($rs_dc==0)){
										  $rs_dc=mysql_fetch_array($rs_dc_query);
										} 
									  } 
									 ?>                                        
                                      </tr>
                                    </table>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td height="5"></td>
                                      </tr>
                                    </table>                                    
                                  </td>
                                </tr>
                              </table>
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                  <td height="1" bgcolor="#C0C0C0"></td>
                                </tr>
                              </table> 
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td background="images/sens_main_width2.gif">&nbsp;</td>
                                </tr>
                              </table>
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td height="102" align="left" valign="top" bgcolor="#FFFFFF"><table width="722" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="551" height="586" align="center" valign="top"> 
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="10"></td>
                                            </tr>
                                          </table>
                                          <table width="528" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td><img src="images/newti.gif" width="528" height="24"></td>
                                            </tr>
                                          </table>
                                          <table width="528" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="1" height="290" bgcolor="#ADADAD"></td>
                                              <td width="526" align="center" valign="top"><table width="98%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr>
                                                    <td> <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr> 
                                                          <td height="5"></td>
                                                        </tr>
                                                      </table>
 													  <table width="95%" border="0" cellspacing="0" cellpadding="0">
													   <tr> 
														<td>
														<? 
														$sql="select names,leib,pid,dj,pic,users from photo order by pid desc";
														$result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
														$rs = mysql_fetch_array($result); 
														$pagesize = 2;
														if ($rs==0){
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
															  if (!($rs==0)){																
																$sql="select flag,jhhao from users where username='".$rs["users"]."'";
																$result2 = mysql_query($sql,$db);
																$rs_jh = mysql_fetch_array($result2);
																$jh2=$rs_jh["jhhao"];
																$str="";
																if ($rs_jh["flag"]==2) $str="<img src='/images/Icon_2.gif' alt='资深会员'>";
																if ($rs_jh["flag"]==3) $str="<img src='/images/ioc03.gif' alt='VIP会员'>";
																if ($rs_jh["flag"]==4) $str="<img src='/images/Icon_4.gif' alt='管理员'>";
																 $a="<table border='0' cellspacing='0' cellpadding='0'><tr align='center' valign='top'><td width='25%'><table width='130' border='1' cellpadding='0' cellspacing='0' bordercolor='#CCCCCC' style='border-collapse: collapse'><tr><td height='110' align='center' valign='middle'><a href='photo/showphoto.php?pid=".$rs["pid"]."' target='_blank''><img src='".$url_path.$jh2."/".$rs["pic"]."' width='100' border='0'></a></td> </tr></table><table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td height='3'></td></tr></table><table width='130' border='1' cellpadding='0' cellspacing='0' bordercolor='#CCCCCC' style='border-collapse: collapse'><tr><td height='60' align='center' bgcolor='#F5F5F5' class='main'>[".$rs["names"]."]<br>作者：<a href='photo/person.php?username=".$rs["users"]."'class='main' target='_blank'>".$rs["users"]."</a>".$str."<br>点击：".$rs["dj"]."</td></tr></table></td></tr></table>";
															   }else{														
																$a="";
															   } ?>
														         <td width="25%" align="left" valign="bottom"><?  echo $a; ?></td>
														 <? 
															  if (!($rs==0)) {
																  $rs = mysql_fetch_array($result);	
															  }   
															} 
														 ?>
															</tr>
														  </table>
                                                   <? } ?>									
														</td>
													  </tr>
													</table>                                                      
                                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr> 
                                                          <td height="5"></td>
                                                        </tr>
                                                      </table>
                                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                          <td width="84%">&nbsp;</td>
                                                          <td width="16%"><a href="photo/index.php"><img src="images/more11.jpg" border="0"></a></td>
                                                        </tr>
                                                      </table>
                                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr> 
                                                          <td height="5"></td>
                                                        </tr>
                                                      </table></td>
                                                  </tr>
                                                </table></td>
                                              <td width="1" bgcolor="#ADADAD"></td>
                                            </tr>
                                          </table>
                                          <table width="528" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="1" bgcolor="#ADADAD"></td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="10"></td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="1" background="images/hendian.gif"></td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td background="images/movie01.gif"><a href="http://www.nb-ml.com"><img src="images/ml.gif" width="551" height="78" border="0"></a></td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="1" background="images/hendian.gif"></td>
                                            </tr>
                                          </table> 
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td>&nbsp;</td>
                                            </tr>
                                          </table>
                                          <table width="530" border="0" cellspacing="0" cellpadding="0">
                                            <tr align="center" valign="top"> 
                                              <td width="265" align="left"> 
                                                <table width="96%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr>
                                                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                          <td width="84%"><img src="images/newsti.gif" width="84" height="21"></td>
                                                          <td width="16%" align="left" valign="bottom" class="main"><a href="news/news_index.php" class="main">更多>></a></td>
                                                        </tr>
                                                      </table>
                                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                          <td height="1" background="images/hendian.gif"></td>
                                                        </tr>
                                                      </table>
                                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                              <tr> 
                                                                <td height="10"> 
																 <?
																	$sql = "SELECT n_id, b_id, n_title, n_hit, n_data FROM news where b_id=12 ORDER BY n_id DESC";
																	$result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
																	$rsn = mysql_fetch_array($result); 
																	$i=1;
																 ?>																																  
                                                                </td>
                                                              </tr>
                                                            </table>
                                                            <? while(!($rsn==0) && $i<8){?>
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                              <tr> 
                                                                <td width="8%" height="16" align="center"><img src="images/shortcut_arrow.gif" width="12" height="11"></td>
                                                                <td width="92%" height="18" valign="bottom" class="main"><A HREF="news/moban_zx.php?n_id=<?     echo $rsn["n_id"]; ?>&b_id=<?     echo $rsn["b_id"]; ?>" target="_blank" class="main"> 
                                                                   <? if (strlen($rsn["n_title"])>30){																	
																		  print substr($rsn["n_title"],0,30)."...";
																		}else{																	
																		  print $rsn["n_title"];
																		} 																	
																	?>
                                                                  </A> </td>
                                                              </tr>
                                                            </table>
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                              <tr> 
                                                                <td height="4"></td>
                                                              </tr>
                                                            </table>
																  <?  $rsn=mysql_fetch_array($result);
																	   $i=$i+1;
																     } 
																  ?>                                                            
                                                          </td>
                                                        </tr>
                                                      </table></td>
                                                  </tr>
                                                </table></td>
                                              <td width="265" align="right"><table width="96%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr> 
                                                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr> 
                                                          <td width="84%"><img src="images/sytechti.gif" width="84" height="21"></td>
                                                          <td width="16%" align="left" valign="bottom" class="main"><a href="news/article_index.php" class="main">更多>></a></td>
                                                        </tr>
                                                      </table>
                                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr> 
                                                          <td height="1" background="images/hendian.gif"></td>
                                                        </tr>
                                                      </table>
                                                      <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                              <tr> 
                                                                <td height="10"> 
																 <?
																	$sql = "SELECT n_hit, n_title,n_data,b_id,n_id FROM news where b_id=4 or b_id=5 or b_id=7 or b_id=11  ORDER BY n_id DESC";
																	$result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
																	$rsn = mysql_fetch_array($result); 
																	$i=1;
																 ?>                                                                  
                                                                </td>
                                                              </tr>
                                                            </table>
                                                            <? while(!($rsn==0) && $i<8){?>
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                              <tr> 
                                                                <td width="8%" height="16" align="center"><img src="images/shortcut_arrow.gif" width="12" height="11"></td>
                                                                <td width="92%" height="18" valign="bottom" class="main"><A HREF="news/moban_zx.php?n_id=<?     echo $rsn["n_id"]; ?>&b_id=<?     echo $rsn["b_id"]; ?>" target="_blank" class="main"> 
                                                                  <? if (strlen($rsn["n_title"])>30) {
																		  print substr($rsn["n_title"],0,30)."...";
																		} else{																	
																		  print $rsn["n_title"];
																		} 																	
																  ?>
                                                                  </A> </td>
                                                              </tr>
                                                            </table>
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                              <tr> 
                                                                <td height="4"></td>
                                                              </tr>
                                                            </table>
															  <?  $rsn=mysql_fetch_array($result);
																   $i=$i+1;
															     } 
															  ?>
                                                            
                                                          </td>
                                                        </tr>
                                                      </table>                                                        
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
                                        <td width="1" background="images/shudian.gif"></td>
                                        <td width="170" align="center" valign="top">
										  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td><img src="images/mamberti.gif" width="170" height="36"></td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="2" bgcolor="#CCCCCC"></td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="15"></td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td align="center">
												<? if(isset($_SESSION["loginname"])) {?>                                                
                                                <table width="100%" border="0">
                                                  <tr> 
                                                    <td><div align="center" class="main"><? echo $_SESSION["loginname"]; ?>，你已经登陆</div></td>
                                                  </tr>
                                                  <tr> 
                                                    <td><div align="center" class="main"><a href="user/pic_mod/modi_user.php" target="_blank" class="main">资料修改</a></div></td>
                                                  </tr>
                                                  <tr> 
                                                    <td><div align="center" class="main"><a href="user/pic_mod/modi_ps.php" target="_blank" class="main">密码修改</a></div></td>
                                                  </tr>
                                                  <tr> 
                                                    <td><div align="center"><a href="user/user_index.php" target="_blank" class="main">个人中心</a></div></td>
                                                  </tr>
                                                  <tr>
                                                    <td><div align="center"> 
													 <? switch ($_SESSION["qx"]) {
                                                              case 4:													                                                        
                                                              $statuz = "<a href='admin/admin_index.php' target='_blank' class='main'>管理员口</a> ";
														      break;
															  case 5:													                                                        
                                                              $statuz = "<a href='news/m_login.php' target='_blank' class='main'>新闻管理</a> ";
														      break;
															  case 6:													                                                        
                                                              $statuz = "<a href='camera/admin/login.php' target='_blank' class='main'>器材管理</a> ";
														      break;
															  case 7:													                                                        
                                                              $statuz = "<a href='model/m_login.php' target='_blank' class='main'>MODEL管理</a> ";
														      break;
													     }
														echo $statuz;
													  ?>                                                        
                                                      </div>
												    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td><div align="center"><a href="user/logout.php" class="main">退出</a></div></td>
                                                  </tr>
                                                </table>
												  <? }else{?>                                                
                                                <form name="form1" method="post" action="user/check.php" style="MARGIN: 0px; PADDING-BOTTOM: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; PADDING-TOP: 0px">
                                                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr> 
                                                      <td width="39%" align="center" valign="bottom" class="main">用户名</td>
                                                      <td width="61%" valign="bottom"><font color=#000000><input name=names id="users2"  style="BORDER-RIGHT: #9a9999 1px solid; BORDER-TOP: #9a9999 1px solid; FONT-SIZE: 12px; BORDER-LEFT: #9a9999 1px solid; WIDTH: 90px; height=17px; BORDER-BOTTOM: #9a9999 1px solid; BACKGROUND-COLOR: #ffffff" size=10 maxsize="32"></font></td>
                                                    </tr>
                                                  </table>
                                                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr> 
                                                      <td height="10"></td>
                                                    </tr>
                                                  </table>
                                                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr> 
                                                      <td width="39%" align="center" valign="bottom" class="main">密&nbsp;&nbsp;码</td>
                                                      <td width="61%" valign="bottom"><font color=#000000> 
                                                        <input name=pass type="password" id="ps2"  style="BORDER-RIGHT: #9a9999 1px solid; BORDER-TOP: #9a9999 1px solid; FONT-SIZE: 12px; BORDER-LEFT: #9a9999 1px solid; WIDTH: 90px; height=17px; BORDER-BOTTOM: #9a9999 1px solid; BACKGROUND-COLOR: #ffffff" size=10 maxsize="32"> </font></td>
                                                    </tr>
                                                  </table>
                                                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr> 
                                                      <td height="12"></td>
                                                    </tr>
                                                  </table>
                                                  <table width="80%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr align="center" valign="bottom"> 
                                                      <td width="49%"><input name="imageField" type="image" src="images/login_button.gif" width="45" height="18" border="0"></td>
                                                      <td width="51%"><a href="user/zhuce.php" target="_blank"><img src="images/button_reg.gif" width="45" height="18" border="0"></a></td>
                                                    </tr>
                                                  </table>
                                                </form>
											   <? } ?>
                                              </td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td>&nbsp;</td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td><img src="images/tjzjti.gif" width="170" height="36"></td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="10"></td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
											 <?   
												$sql="select tj_pic,username,dat from users where xc_tj='1' order by tj_dat desc limit 0,1";
												$result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
												$rs = mysql_fetch_array($result); 
											?>
                                             <td align="center" valign="top"><a href="photo/person.php?username=<?   echo $rs["username"]; ?>" target="_blank"><img src="<? echo $wwwpath ?>pic/<?   echo $rs["tj_pic"]; ?>" width="142" height="185" border="0"></a></td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="5"></td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="18" align="center" valign="bottom" class="blue"><strong><a href="photo/person.php?username=<?   echo $rs["username"]; ?>" class="blue">[<?   echo $rs["username"]; ?>]个人专辑</a></strong></td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td height="18" align="center" valign="bottom" class="blue"><strong><?   echo $rs["dat"]; ?> 建立</strong></td>
                                            </tr>
                                          </table> 
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td height="18" align="center" valign="bottom" class="main">照片： 
												<? 
													$sql="select count(*) from photo where users='".$rs["username"]."'";
													$result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
													$rs1 = mysql_fetch_array($result); 
												    echo $rs1[0]; 
												?>组</td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td>&nbsp;</td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td><img src="images/modelti.gif" width="170" height="36"></td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td height="10"></td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
											<? 
												$sql="select name from model where tj='1' order by tj_dat desc limit 0,1";
												$result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
												$rsm = mysql_fetch_array($result); 
												  if (!($rsm==0)){
												   $sql="select * from mmphoto where name='".$rsm["name"]."' limit 0,1";
												   $result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
												   $rsm2 = mysql_fetch_array($result); 
													if (!($rsm2==0)){
													  $jh2=$rsm2["jhhao"];
											?>
                                               <td align="center" valign="top"><a href="model/" target="_blank"><img src="<? echo $wwwpath ?>pic/<?       echo $rsm2["jhhao"]; ?>/<?       echo $rsm2["pic"]; ?>" width='142' border='0'></a></td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td height="5"></td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="18" align="center" valign="top"><a href="model/model.php?name=<?       echo $rsm["name"]; ?>"style="TEXT-DECORATION: none" class="orange"><strong><?       echo $rsm["name"]; ?></strong></a></td>
                                            </tr>
												<?   } 
													}
												?>                                            
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td>&nbsp;</td>
                                            </tr>
                                          </table></td>
                                      </tr>
                                    </table></td>
                                </tr>
                              </table></td>
                            <td width="1" background="images/shudian.gif"></td>
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
      <TD width=36 height=162 align="left" valign="top" background=images/sens_footer_left_b01.gif><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="1" bgcolor="#CFCFCF"> </td>
          </tr>
        </table></TD>
      <TD vAlign=top width=722> <TABLE cellSpacing=0 cellPadding=0 width="722">
          <TBODY>
            <TR> 
              <TD width=720 
          bgColor=#dddddd height=21><img src="images/ditop.gif" width="723" height="21"></TD>
            </TR>
            <TR> 
              <TD bgColor=#f2f2f2><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="16%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><img src="images/biglogo.gif" width="347" height="113"></td>
                        </tr>
                        <tr>
                          <td><img src="images/sens_footer_logo2.gif" width="347" height="28"></td>
                        </tr>
                      </table></td>
                    <td width="84%"><img src="images/ditu.gif" width="376" height="141"></td>
                  </tr>
                </table> </TD>
            </TR>
          </TBODY>
        </TABLE></TD>
      <TD align="left" valign="top" background="images/sens_main_1pixcel_line.gif"><img src="images/diyou.gif" width="243" height="162"></TD>
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
<script type="text/javascript">
(function(){
  var root=document.getElementById('heroSlider');
  if(!root){ return; }
  var mains=root.getElementsByTagName('img');
  var mainImgs=[], footImgs=[];
  for(var i=0;i<mains.length;i++){
    if(mains[i].parentNode.className=='hero-main'){ mainImgs.push(mains[i]); }
    else if(mains[i].parentNode.className=='hero-foot'){ footImgs.push(mains[i]); }
  }
  var links=root.getElementsByTagName('a');
  var dots=[];
  for(var j=0;j<links.length;j++){
    if(links[j].getAttribute('data-i')!==null){ dots.push(links[j]); }
  }
  var total=mainImgs.length, cur=0, timer=null;
  function paint(){
    for(var k=0;k<total;k++){
      mainImgs[k].className='hero-slide'+(k==cur?' on':'');
      footImgs[k].className='hero-slide'+(k==cur?' on':'');
      if(dots[k]){ dots[k].className=(k==cur?'on':''); }
    }
  }
  function go(i){ cur=(i+total)%total; paint(); }
  function next(){ go(cur+1); }
  function stop(){ if(timer){ clearInterval(timer); timer=null; } }
  function play(){ stop(); timer=setInterval(next,6000); }
  root.onclick=function(e){
    var t=(e||window.event).target||(e||window.event).srcElement;
    while(t && t!==root && t.tagName!='A'){ t=t.parentNode; }
    if(!t || t===root){ return; }
    var d=t.getAttribute('data-dir');
    if(d){ go(cur+parseInt(d,10)); } else { go(parseInt(t.getAttribute('data-i'),10)||0); }
    play();
    return false;
  };
  root.onmouseover=function(){ stop(); };
  root.onmouseout=function(e){
    e=e||window.event;
    if(!e.relatedTarget || !root.contains(e.relatedTarget)){ play(); }
  };
  paint(); play();
})();
</script>
</body>
</html>