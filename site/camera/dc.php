<?
session_start();
include '../conn.php';
$sql="select * from ca_sorts order by sortid ";
$result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
$rs = mysql_fetch_array($result); 
$pid = $_GET["id"];
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>※逸憩摄影※17camera.com※</title>
<link href="../images/main.css" rel="stylesheet" type="text/css">
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<? include '../top.php';?>
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
                            <td width="722" height="101" align="left" valign="top"><table width="721" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                  <td width="130" height="279" align="center" valign="top" bgcolor="#FFFFFF"> 
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td height="10"></td>
                                      </tr>
                                    </table>
									<? while(!($rs==0))	{ ?>
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
									<?  
									    $rs=mysql_fetch_array($result);
									  } 
								    ?>
                                  </td>
                                  <td width="1" background="../images/shudian.gif" bgcolor="#C0C0C0"></td>
                                  <td width="590" align="center" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
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
													while(!($rs==0)){
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
                                                <td width="27%"><font  color=#000000> 
                                                  <input name=serach id="serach2"  style="BORDER-RIGHT: #9a9999 1px solid; BORDER-TOP: #9a9999 1px solid; FONT-SIZE: 12px; BORDER-LEFT: #9a9999 1px solid; WIDTH: 100px; height=18px; BORDER-BOTTOM: #9a9999 1px solid; BACKGROUND-COLOR: #ffffff" size=10 maxsize="32">
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
                                        <td width="95%" height="20" valign="bottom" bgcolor="#E3E3E3" class="da02"><font color="#CC3366"><strong><? echo trim($HTTP_GET_VARS["camera"]); ?></strong></font></td>
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
                                    <table width="95%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td>&nbsp;</td>
                                      </tr>
                                    </table>
                                    <table width="95%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td align="center" valign="top">
										<? 
										$sql="select * from ca_product where id=".trim($_GET["id"]);
										$result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
										$rs=mysql_fetch_array($result);
										?>
                                         <img src="admin/image/<? echo $rs["bpic"]; ?>" width="240"> 
                                        </td>
                                      </tr>
                                    </table>
                                    <table width="95%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td>&nbsp;</td>
                                      </tr>
                                    </table>
                                    <table width="80%" border="1" cellpadding="0" cellspacing="0" bordercolor="#999999" style="border-collapse: collapse">
                                      <tr bgcolor="#E3E3E3"> 
                                        <td width="23%" height="20" align="center" class="black">项 目</td>
                                        <td width="77%" align="center" bgcolor="#E3E3E3" class="black">数 据</td>
                                      </tr>
                                      <tr class="main"> 
                                        <td height="20" align="center" valign="bottom">产品型号</td>
                                        <td align="left" valign="bottom">&nbsp;<? echo $rs["xingh"]; ?></td>
                                      </tr>
                                      <tr class="main"> 
                                        <td height="20" align="center" valign="bottom">发售年份</td>
                                        <td align="left" valign="bottom">&nbsp;<? echo $rs["fs"]; ?></td>
                                      </tr>
                                      <tr class="main"> 
                                        <td height="20" align="center" valign="bottom">像 素</td>
                                        <td align="left" valign="bottom">&nbsp;<? echo $rs["xs"]; ?>万象素</td>
                                      </tr>
                                      <tr class="main"> 
                                        <td height="20" align="center" valign="bottom">CCD/CMOS尺寸</td>
                                        <td align="left" valign="bottom">&nbsp;<? echo $rs["ccd"]; ?></td>
                                      </tr>
                                      <tr class="main"> 
                                        <td height="20" align="center" valign="bottom">最大有效分辨率</td>
                                        <td align="left" valign="bottom">&nbsp;<? echo $rs["zdfbl"]; ?></td>
                                      </tr>
                                      <tr class="main"> 
                                        <td height="20" align="center" valign="bottom">其它分辨率</td>
                                        <td align="left" valign="bottom">&nbsp;<? echo $rs["qtfbl"]; ?></td>
                                      </tr>
                                      <tr class="main"> 
                                        <td height="20" align="center" valign="bottom">ISO  感光度</td>
                                        <td align="left" valign="bottom">&nbsp;<? echo $rs["iso"]; ?></td>
                                      </tr>
                                      <tr class="main"> 
                                        <td height="20" align="center" valign="bottom">光学变焦</td>
                                        <td align="left" valign="bottom">&nbsp;<? echo $rs["gxbj"]; ?></td>
                                      </tr>
                                      <tr class="main"> 
                                        <td height="20" align="center" valign="bottom">数码变焦</td>
                                        <td align="left" valign="bottom">&nbsp;<? echo $rs["smbj"]; ?></td>
                                      </tr>
                                      <tr class="main"> 
                                        <td height="20" align="center" valign="bottom">自动对焦</td>
                                        <td align="left" valign="bottom">&nbsp;<? echo $rs["zddj"]; ?></td>
                                      </tr>
                                      <tr class="main"> 
                                        <td height="20" align="center" valign="bottom">手动对焦</td>
                                        <td align="left" valign="bottom">&nbsp;<? echo $rs["sddj"]; ?></td>
                                      </tr>
                                      <tr class="main"> 
                                        <td height="20" align="center" valign="bottom">一般对焦范围</td>
                                        <td align="left" valign="bottom">&nbsp;<? echo $rs["djfw"]; ?></td>
                                      </tr>
                                      <tr class="main"> 
                                        <td height="20" align="center" valign="bottom">微  距</td>
                                        <td align="left" valign="bottom">&nbsp;<? echo $rs["wj"]; ?></td>
                                      </tr>
                                      <tr class="main"> 
                                        <td height="20" align="center" valign="bottom">白平衡</td>
                                        <td align="left" valign="bottom">&nbsp;<? echo $rs["bph"]; ?></td>
                                      </tr>
                                      <tr class="main"> 
                                        <td height="20" align="center" valign="bottom">快门速度</td>
                                        <td align="left" valign="bottom">&nbsp;<? echo $rs["km"]; ?></td>
                                      </tr>
                                      <tr class="main"> 
                                        <td height="20" align="center" valign="bottom">光圈范围</td>
                                        <td align="left" valign="bottom">&nbsp;<? echo $rs["gq"]; ?></td>
                                      </tr>
                                      <tr class="main"> 
                                        <td height="20" align="center" valign="bottom">曝光模式</td>
                                        <td align="left" valign="bottom">&nbsp;<? echo $rs["bg"]; ?></td>
                                      </tr>
                                      <tr class="main"> 
                                        <td height="20" align="center" valign="bottom">闪光灯</td>
                                        <td align="left" valign="bottom">&nbsp;<? echo $rs["sg"]; ?></td>
                                      </tr>
                                      <tr class="main"> 
                                        <td height="20" align="center" valign="bottom">曝光补偿</td>
                                        <td align="left" valign="bottom">&nbsp;<? echo $rs["bgbc"]; ?></td>
                                      </tr>
                                      <tr class="main"> 
                                        <td height="20" align="center" valign="bottom">测光方式</td>
                                        <td align="left" valign="bottom">&nbsp;<? echo $rs["cg"]; ?></td>
                                      </tr>
                                      <tr class="main"> 
                                        <td height="20" align="center" valign="bottom">口  径</td>
                                        <td align="left" valign="bottom">&nbsp;<? echo $rs["kj"]; ?></td>
                                      </tr>
                                      <tr class="main"> 
                                        <td height="20" align="center" valign="bottom">连  拍</td>
                                        <td align="left" valign="bottom">&nbsp;<? echo $rs["lp"]; ?></td>
                                      </tr>
                                      <tr class="main"> 
                                        <td height="20" align="center" valign="bottom">遥  控</td>
                                        <td align="left" valign="bottom">&nbsp;<? echo $rs["yk"]; ?></td>
                                      </tr>
                                      <tr class="main"> 
                                        <td height="20" align="center" valign="bottom">三脚架使用</td>
                                        <td align="left" valign="bottom">&nbsp;<? echo $rs["sjj"]; ?></td>
                                      </tr>
                                      <tr class="main"> 
                                        <td height="20" align="center" valign="bottom">自  拍</td>
                                        <td align="left" valign="bottom">&nbsp;<? echo $rs["zp"]; ?></td>
                                      </tr>
                                      <tr class="main"> 
                                        <td height="20" align="center" valign="bottom">视频输出</td>
                                        <td align="left" valign="bottom">&nbsp;<? echo $rs["sp"]; ?></td>
                                      </tr>
                                      <tr class="main"> 
                                        <td height="20" align="center" valign="bottom">存储媒介</td>
                                        <td align="left" valign="bottom">&nbsp;<? echo $rs["cc"]; ?></td>
                                      </tr>
                                      <tr class="main"> 
                                        <td height="20" align="center" valign="bottom">压缩格式</td>
                                        <td align="left" valign="bottom">&nbsp;<? echo $rs["ys"]; ?></td>
                                      </tr>
                                      <tr class="main"> 
                                        <td height="20" align="center" valign="bottom">画质选择</td>
                                        <td align="left" valign="bottom">&nbsp;<? echo $rs["hz"]; ?></td>
                                      </tr>
                                      <tr class="main"> 
                                        <td height="20" align="center" valign="bottom">光学取景器</td>
                                        <td align="left" valign="bottom">&nbsp;<? echo $rs["gxqj"]; ?></td>
                                      </tr>
                                      <tr class="main"> 
                                        <td height="20" align="center" valign="bottom">液晶显示屏</td>
                                        <td align="left" valign="bottom">&nbsp;<? echo $rs["yjxs"]; ?></td>
                                      </tr>
                                      <tr class="main"> 
                                        <td height="20" align="center" valign="bottom">外部连接口</td>
                                        <td align="left" valign="bottom">&nbsp;<? echo $rs["ljk"]; ?></td>
                                      </tr>
                                      <tr class="main"> 
                                        <td height="20" align="center" valign="bottom">使用电池</td>
                                        <td align="left" valign="bottom">&nbsp;<? echo $rs["dc"]; ?></td>
                                      </tr>
                                      <tr class="main"> 
                                        <td height="20" align="center" valign="bottom">重  量</td>
                                        <td align="left" valign="bottom">&nbsp;<? echo $rs["zl"]; ?></td>
                                      </tr>
                                      <tr class="main"> 
                                        <td height="20" align="center" valign="bottom">尺寸规格</td>
                                        <td align="left" valign="bottom">&nbsp;<? echo $rs["gg"]; ?></td>
                                      </tr>
                                      <tr class="main"> 
                                        <td height="20" align="center" valign="bottom">备 注</td>
                                        <td align="left" valign="bottom">&nbsp;<? echo $rs["bz"]; ?></td>
                                      </tr>
                                    </table>    
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
										  <td>&nbsp;</td>
										</tr>
									  </table>
									  <table width="95%" border="0" cellspacing="0" cellpadding="0">
										<tr>
										  <td height="25" align="center" valign="top"><a href="#02"><img src="../images/write.gif" width="100" height="21" border="0"></a></td>
										</tr>
									  </table>
									  <table width="95%" border="0" cellspacing="0" cellpadding="0">
										<tr>
										  <td width="1%" bgcolor="#CCCCCC">&nbsp;</td>
										  <td width="99%" height="20" valign="bottom" bgcolor="#CCCCCC" class="zi"><strong><a name="01"></a>【相关评论】</strong></td>
										</tr>
									  </table>
									  <table width="95%" border="0" cellspacing="0" cellpadding="0">
										<tr>
										  <td height="10"></td>
										</tr>
									  </table>
									  <table width="95%" border="0" cellspacing="0" cellpadding="0">
										<tr> 
										  <td height="10"><p><font color="#000000"> 
											<?
											if( isset($_GET['page']) ){
											   $page = intval( $_GET['page'] );
											}else{
											   $page = 1;
											}
											$page_size = 2;
											$sql="select count(*)  from ca_review where pid='".$pid."'";
											$result6 = mysql_query($sql);
											$row = mysql_fetch_row($result6);
											$amount = $row[0];
											if( $amount ){
											   if( $amount < $page_size ){ $page_count = 1; }               //如果总数据量小于$PageSize，那么只有一页
											   if( $amount % $page_size ){                                  //取总数据量除以每页数的余数
												   $page_count = (int)($amount / $page_size) + 1;           //如果有余数，则页数等于总数据量除以每页数的结果取整再加一
											   }else{
												   $page_count = $amount / $page_size;                      //如果没有余数，则页数等于总数据量除以每页数的结果
											   }
											}else{
											   $page_count = 0;
												print "<br><br><b><center><span class='main'>现在还没有评论。</span></center></b><br><br> ";
											}
											// 翻页链接
											$page_string = '';
											if( $page == 1 ){
											   $page_string .= '第一页|上一页|';
											}else{
											   $page_string .= '<a href=?page=1'.'&pid='.$pid.'#01>第一页</a>|<a href=?page='.($page-1).'&pid='.$pid.'#01>上一页</a>|';
											}
											if( ($page == $page_count) || ($page_count == 0) ){
											   $page_string .= '下一页|尾页';
											}else{
											   $page_string .= '<a href=?page='.($page+1).'&pid='.$pid.'#01>下一页</a>|<a href=?page='.$page_count.'&pid='.$pid.'#01>尾页</a>';
											}
											?>
											</font> </p>
											<?
											 if( $amount ){
											   $sql = "select * from ca_review  where pid='".$pid."' order by id desc limit ". ($page-1)*$page_size .", $page_size";
											   $result7 = mysql_query($sql);   
												while ($rs = mysql_fetch_array($result7)) 
												{  
											?>             
												 <table border="0" cellpadding="0" cellspacing="0" width="100%">
													  <tr> 
														<td width="23%" bgcolor="#CCCCCC"></td>
														<td width="77%" height="1" colspan="2" bgcolor="#CCCCCC"></td>
													  </tr>
													  <tr bgcolor="#FFFFFF"> 
														<td height="3" colspan="3"><table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" style="border-collapse: collapse">
															<tr> 
															  <td width="17%" align="center" valign="top" bgcolor="#F5F5F5" class="da02"><table width="100%" border="0" cellspacing="3" cellpadding="0">
																  <tr> 
																	<td align="center" valign="top" class="da02"><? echo $rs["username"]; ?><br> 
																	  <br> <?  echo $rs["dat"]; ?> </td>
																  </tr>
																</table></td>
															  <td width="83%" align="center"  valign="top"> 
																<table width="98%" border="0" cellspacing="3" cellpadding="0">
																  <tr> 
																	<td class="zi"><? echo $rs["content"]; ?></td>
																  </tr>
																</table>
																<div align="left" class="main">&nbsp;</div></td>
															</tr>
														  </table>
														  <table width="100%" border="0" cellspacing="0" cellpadding="0">
															<tr> 
															  <td height="10"></td>
							
															</tr>
														  </table></td>
													  </tr>
													</table>
													<?
													   }
														echo "<div align='right'><span class='orange'>此图共有回复:". $amount." </span>";
														echo "<span class='orange'>共". $page_count."页 </span>";
														echo "<span class='main'>";
														echo $page_string;
														echo "</span></div>";
													
													}
													?>										
										  </td>
										</tr>
									  </table>
									  <table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr> 
										  <td>&nbsp;</td>
										</tr>
									  </table>
									  <table width="95%" border="0" cellspacing="0" cellpadding="0">
										<tr> 
										  <td width="1%" bgcolor="#CCCCCC">&nbsp;</td>
										  <td width="99%" height="20" valign="bottom" bgcolor="#CCCCCC" class="zi"><strong>【发表评论】</strong></td>
										</tr>
									  </table>
									  <table width="95%" border="0" cellspacing="0" cellpadding="0">
										<tr> 
										  <td>&nbsp;</td>
										</tr>
									  </table>
									  <table width="95%" border="0" cellspacing="0" cellpadding="0">
										<tr> 
										  <td align="center">
										   <form name="form1" method="post" action="addreview.php?pid=<? echo $pid; ?>" style="MARGIN: 0px; PADDING-BOTTOM: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; PADDING-TOP: 0px">
											  <table width="86%" border="0" cellspacing="0" cellpadding="0">
												<tr class="main"> 
													 <td width="19%" align="right"><a name="02"></a>用户名</td>
												  <td width="22%">&nbsp; <INPUT name=username id="username" 
												  style="BORDER-RIGHT: gray 1px solid; BORDER-TOP: gray 1px solid; BORDER-LEFT: gray 1px solid; BORDER-BOTTOM: gray 1px solid;WIDTH: 90px;height=17px" size=18 value= "<?=$_SESSION["loginname"]; ?>" ></td>
												  <td width="6%" align="right">密&nbsp;&nbsp;码</td>
												  <td width="23%">&nbsp; 							  
													<? 
													if(isset($_SESSION['password2'])){
													  $pass="********";
													}else{
													  $pass="";
													}
													?>							
												  <INPUT name=password type="password" id="ps2" style="BORDER-RIGHT: gray 1px solid; BORDER-TOP: gray 1px solid; BORDER-LEFT: gray 1px solid; BORDER-BOTTOM: gray 1px solid; height=17px;WIDTH: 90px" value="<? echo $pass; ?>"  size=18></td>
												  <td width="30%"><input name="imageField2" type="image" src="../images/write.gif" width="100" height="21" border="0"></td>
												</tr>
											  </table>
											  <table width="95%" border="0" cellspacing="0" cellpadding="0">
												<tr> 
												  <td height="6"></td>
												</tr>
											  </table>
											  <b>
											  <textarea name=content cols=60 rows=9 id="content" style="BORDER-RIGHT: gray 1px solid; BORDER-TOP: gray 1px solid; BORDER-LEFT: gray 1px solid; BORDER-BOTTOM: gray 1px solid"></textarea>
											  </b><font color="#000000"> </font> 
											</form></td>
										</tr>
									  </table>
									  <b> </b> 
									  <table width="95%" border="0" cellspacing="0" cellpadding="0">
										<tr> 
										  <td height="20"></td>
										</tr>
									  </table>
                                    <table width="95%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td>&nbsp;</td>
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