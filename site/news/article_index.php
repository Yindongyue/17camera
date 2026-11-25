<?
include '../config/path.php';
include 'ubb.php';
include '../conn.php';
$rsi__MMColParam="1";
$sql = "SELECT n_id, n_title, n_content, n_path FROM news WHERE n_i = ".str_replace("'","''",$rsi__MMColParam)."  and (b_id=4 or b_id=5 or b_id=7 or b_id=11)ORDER BY n_id DESC";
$result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
$rsi = mysql_fetch_array($result); 
$CursorType =0;
$CursorLocation = 2;
$LockType = 3;
$rsi_numRows=0;
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
<? include  '../top.php'; ?><table width="760" border="0" cellspacing="0" cellpadding="0">
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
                      <td> 
                        <table width="723" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="722" height="101" align="left" valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                  <td height="1" bgcolor="#C0C0C0"></td>
                                </tr>
                              </table> 
                              <table width="722" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                  <td width="570" align="center" valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td>&nbsp;</td>
                                      </tr>
                                    </table>
                                    <table width="92%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td width="64%" valign="top"> 
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td class="zi"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr> 
                                                    <td width="184" style="word-break:break-all"><a href="moban.php?<? 
echo $MM_keepNone.MM_joinChar($MM_keepNone)."n_id=".$rsi["n_id"] ; ?>" target="_blank"><img src="pic/<? echo $rsi["n_path"] ; ?>" width="170" border="0" align="left"></a></td>
                                                    <td width="317" valign="top" style="word-break:break-all"> 
                                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr> 
                                                          <td align="right"><img src="../images/tebietuijian.gif" width="170" height="52"></td>
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
                                                        <tr> 
                                                          <td><span class="main"> 
                                                            <?  echo ubbcode(substr($rsi["n_content"],0,200))."..."; ?>
                                                            </span></td>
                                                        </tr>
                                                      </table>
                                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr> 
                                                          <td height="7"></td>
                                                        </tr>
                                                      </table>
                                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr> 
                                                          <td width="78%">&nbsp;</td>
                                                          <td width="22%"><A HREF="moban.php?<? echo $MM_keepNone.MM_joinChar($MM_keepNone)."n_id=".$rsi["n_id"]; ?>" target="_blank" class="orange">详细内容&gt;&gt;</A></td>
                                                        </tr>
                                                      </table></td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                          </table>
                                          
                                        </td>
                                      </tr>
                                    </table>
                                  </td>
                                  <td width="1" background="../images/shudian.gif"></td>
                                  <td width="183" align="center" valign="top" bgcolor="#F5F5F5"> 
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
                                  <td height="1" background="../images/hendian.gif"></td>
                                </tr>
                              </table>
                              <table width="722" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                  <td width="542" align="center" valign="top"> 
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="3%">&nbsp;</td>
                                        <td width="97%" height="35" valign="bottom"><img src="../images/mjmzti.gif" width="175" height="23"></td>
                                      </tr>
                                    </table>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td height="5"></td>
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
                                    </table> <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td height="10"></td>
                                      </tr>
                                    </table>
                                    <table width="95%" border="0" cellspacing="0" cellpadding="0">
                                      <tr align="center" valign="top"> 
                                        <td width="33%">
 <? 
$sql = "SELECT * FROM news where b_id=16 and  n_i =1 ORDER BY n_data DESC limit 0,3";
$result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
$rsn = mysql_fetch_array($result); 
$CursorType =0;
$CursorLocation = 2;
$LockType = 3;
$rsn_numRows=0;
?>
                                         <? while(!($rsn==0))
{
?> <table width="137" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="113" align="left" valign="top" background="../images/jiazuobg.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr>
                                                    <td height="7"></td>
                                                  </tr>
                                                </table>
                                                <table width="136" border="0" cellspacing="0" cellpadding="0">
                                                  <tr>
                                                    <td width="16"></td>
                                                    <td width="120" align="left" valign="top"><a href="moban.php?n_id=<?   echo $rsn["n_id"]; ?>&b_id=<?   echo $rsn["b_id"]; ?>" target="_blank"><img src="pic/<?   echo $rsn["n_path"]; ?>" width="120" height="90" border="0"></a></td>
                                                  </tr>
                                                </table>
                                                <table width="137" border="0" cellspacing="0" cellpadding="0">
                                                  <tr>
                                                    <td height="16"></td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                          </table>
                                        </td>
                                        <td width="33%"><?   $rsn=mysql_fetch_array($result);

  if (($rsn==0))
  {
    break;
  } ?>
<table width="137" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td height="113" align="left" valign="top" background="../images/jiazuobg.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr> 
                                                    <td height="7"></td>
                                                  </tr>
                                                </table>
                                                <table width="136" border="0" cellspacing="0" cellpadding="0">
                                                  <tr> 
                                                    <td width="16"></td>
                                                    <td width="120" align="left" valign="top"><a href="moban.php?n_id=<?   echo $rsn["n_id"]; ?>&b_id=<?   echo $rsn["b_id"]; ?>" target="_blank"><img src="pic/<?   echo $rsn["n_path"]; ?>" width="120" height="90" border="0"></a></td>
                                                  </tr>
                                                </table>
                                                <table width="137" border="0" cellspacing="0" cellpadding="0">
                                                  <tr> 
                                                    <td height="16"></td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                          </table></td>
                                        <td width="34%">
                                          <?   $rsn=mysql_fetch_array($result);

  if (($rsn==0))
  {
    break;
  } ?>
                                          <table width="137" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td height="113" align="left" valign="top" background="../images/jiazuobg.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr> 
                                                    <td height="7"></td>
                                                  </tr>
                                                </table>
                                                <table width="136" border="0" cellspacing="0" cellpadding="0">
                                                  <tr> 
                                                    <td width="16"></td>
                                                    <td width="120" align="left" valign="top"><a href="moban.php?n_id=<?   echo $rsn["n_id"]; ?>&b_id=<?   echo $rsn["b_id"]; ?>" target="_blank"><img src="pic/<?   echo $rsn["n_path"]; ?>" width="120" height="90" border="0"></a></td>
                                                  </tr>
                                                </table>
                                                <table width="137" border="0" cellspacing="0" cellpadding="0">
                                                  <tr> 
                                                    <td height="16"></td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                          </table>
<?   break;

} ?></td>
                                      </tr>
                                    </table>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td>&nbsp;</td>
                                      </tr>
                                    </table>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td height="1" background="../images/hendian.gif"></td>
                                      </tr>
                                    </table>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td height="10" bgcolor="#F5F5F5"></td>
                                      </tr>
                                    </table> 
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td width="49%" align="right" valign="top"> 
                                          <table width="96%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr> 
                                                    <td width="77%" height="30" valign="bottom"><img src="../images/shumaaf.gif" width="175" height="23"></td>
                                                    <td width="18%" align="left" valign="bottom" class="main"><a href="more.php?b_id=4&id=%CA%FD%C2%EB%B0%B5%B7%BF" class="main">更多&gt;&gt;</a></td>
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
                                                          <td height="10"> 
 <? 
$sql = "SELECT n_id, b_id, n_title, n_hit, n_data FROM news where b_id=4 ORDER BY n_data DESC";
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
                                                      <? while(!($rsn==0) && $i<=8)
{
?>
                                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr> 
                                                          <td width="8%" height="16" align="center"><img src="../images/shortcut_arrow.gif" width="12" height="11"></td>
                                                          <td width="92%" valign="bottom" class="main"><A HREF="moban.php?n_id=<?   echo $rsn["n_id"]; ?>&b_id=<?   echo $rsn["b_id"]; ?>" target="_blank" class="main"> 
                                                            <? if (strlen($rsn["n_title"])>30)
																{																	
																  print yiqi_cut($rsn["n_title"],30);
																}else{																	
																  print $rsn["n_title"];
																} 																	
															?>
                                                            </A> </td>
                                                        </tr>
                                                      </table>
                                                      <?   $rsn=mysql_fetch_array($result);

  $i=$i+1;
} 
?>
                                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr> 
                                                          <td height="1"></td>
                                                        </tr>
                                                      </table>
                                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr> 
                                                          <td height="1"></td>
                                                        </tr>
                                                      </table>
                                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr> 
                                                          <td height="10"></td>
                                                        </tr>
                                                      </table></td>
                                                  </tr>
                                                </table> 
                                              </td>
                                            </tr>
                                          </table>
                                          
                                        </td>
                                        <td width="2%" valign="top"></td>
                                        <td width="49%" align="center" valign="top"> 
                                          <table width="96%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr> 
                                                    <td width="77%" height="30" valign="bottom"><img src="../images/sheyjch.gif" width="175" height="23"></td>
                                                    <td width="18%" align="left" valign="bottom" class="main"><a href="more.php?b_id=5&id=%C9%E3%D3%B0%BB%F9%B4%A1" class="main">更多&gt;&gt;</a></td>
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
                                                          <td height="10"> 
 <? 
$sql = "SELECT n_id, b_id, n_title, n_hit, n_data FROM news where b_id=5 ORDER BY n_data DESC";
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
                                                      <? while(!($rsn==0) && $i<=8)
{
?>
                                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr> 
                                                          <td width="8%" height="16" align="center"><img src="../images/shortcut_arrow.gif" width="12" height="11"></td>
                                                          <td width="92%" valign="bottom" class="main"><A HREF="moban.php?n_id=<?   echo $rsn["n_id"]; ?>&b_id=<?   echo $rsn["b_id"]; ?>" target="_blank" class="main"> 
                                                           <? if (strlen($rsn["n_title"])>30)
																{																	
																  print yiqi_cut($rsn["n_title"],30);
																}else{																	
																  print $rsn["n_title"];
																} 																	
															?>
                                                            </A> </td>
                                                        </tr>
                                                      </table>
                                                      <?   $rsn=mysql_fetch_array($result);

  $i=$i+1;
} 
?>
                                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr> 
                                                          <td height="1"></td>
                                                        </tr>
                                                      </table>
                                                      
                                                    </td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                          </table>
                                          
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="1"></td>
                                            </tr>
                                          </table>
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td height="10"></td>
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
                                        <td align="right" valign="top"> 
                                          <table width="96%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr> 
                                                    <td width="77%" height="30" valign="bottom"><img src="../images/qczbti.gif" width="175" height="23"></td>
                                                    <td width="18%" align="left" valign="bottom" class="main"><a href="more.php?b_id=7&id=%C6%F7%B2%C4%D7%B0%B1%B8" class="main">更多&gt;&gt;</a></td>
                                                  </tr>
                                                </table>
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr> 
                                                    <td height="1" background="../images/hendian.gif"></td>
                                                  </tr>
                                                </table>
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr> 
                                                    <td> 
                                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr> 
                                                          <td height="1"></td>
                                                        </tr>
                                                      </table>
                                                      
                                                    </td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                          </table>
                                          <table width="96%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr> 
                                                    <td height="10"> 
<? 
$sql = "SELECT n_id, b_id, n_title, n_hit, n_data FROM news where b_id=7 ORDER BY n_data DESC";
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
                                                <? while(!($rsn==0) && $i<=8)
{
?>
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr> 
                                                    <td width="8%" height="16" align="center"><img src="../images/shortcut_arrow.gif" width="12" height="11"></td>
                                                    <td width="92%" valign="bottom" class="main"><A HREF="moban.php?n_id=<?   echo $rsn["n_id"]; ?>&b_id=<?   echo $rsn["b_id"]; ?>" target="_blank" class="main"> 
														<? if (strlen($rsn["n_title"])>30)
															{																	
															  print yiqi_cut($rsn["n_title"],30);
															}else{																	
															  print $rsn["n_title"];
															} 																	
														?> 
												   </A> </td>
                                                  </tr>
                                                </table>
                                                <?   $rsn=mysql_fetch_array($result);

  $i=$i+1;
} 
?>
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr> 
                                                    <td height="1"></td>
                                                  </tr>
                                                </table>
                                                
                                              </td>
                                            </tr>
                                          </table> 
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td height="10"></td>
                                            </tr>
                                          </table></td>
                                        <td width="2%" valign="top"></td>
                                        <td width="49%" align="center" valign="top"> 
                                          <table width="96%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr> 
                                                    <td width="77%" height="30" valign="bottom"><img src="../images/seyouhuati.gif" width="175" height="23"></td>
                                                    <td width="18%" align="left" valign="bottom" class="main"><a href="more.php?b_id=11&id=%C9%AB%D3%D1%B5%C4%BB%B0" class="main">更多&gt;&gt;</a></td>
                                                  </tr>
                                                </table>
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr> 
                                                    <td height="1" background="../images/hendian.gif"></td>
                                                  </tr>
                                                </table>
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr> 
                                                    <td valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr> 
                                                          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                              <tr> 
                                                                <td height="10"> 
<? 
$sql = "SELECT n_id, b_id, n_title, n_hit, n_data FROM news where b_id=11 ORDER BY n_data DESC";
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
                                                            <? while(!($rsn==0) && $i<=8)
{
?>
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                              <tr> 
                                                                <td width="8%" height="16" align="center"><img src="../images/shortcut_arrow.gif" width="12" height="11"></td>
                                                                <td width="92%" valign="bottom" class="main"><A HREF="moban.php?n_id=<?   echo $rsn["n_id"]; ?>&b_id=<?   echo $rsn["b_id"]; ?>" target="_blank" class="main"> 
																  <? if (strlen($rsn["n_title"])>30)
																		{																	
																		  print yiqi_cut($rsn["n_title"],30);
																		}else{																	
																		  print $rsn["n_title"];
																		} 																	
																   ?>                                                                 
                                                                  </A> </td>
                                                              </tr>
                                                            </table>
                                                            <?   $rsn=mysql_fetch_array($result);

  $i=$i+1;
} 
?>
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                              <tr> 
                                                                <td height="1"></td>
                                                              </tr>
                                                            </table>
                                                            
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
                                              <td height="10"></td>
                                            </tr>
                                          </table></td>
                                      </tr>
                                    </table></td>
                                  <td width="1" background="../images/shudian.gif"></td>
                                  <td width="170" align="center" valign="top">
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
                                                                <option value="n_title" selected>--标&nbsp;&nbsp;&nbsp; 
                                                                题--</option>
                                                                <option value="n_author">--作&nbsp;&nbsp;&nbsp; 
                                                                者--</option>
                                                                <option value="n_content">--内&nbsp;&nbsp;&nbsp; 
                                                                容--</option>
                                                              </select> </td>
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
                                          </table> </td>
                                      </tr>
                                    </table>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td height="7"></td>
                                      </tr>
                                    </table>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td><img src="../images/hotwen.gif" width="179" height="24"></td>
                                      </tr>
                                    </table>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td height="10"></td>
                                      </tr>
                                    </table>
                                    <table width="170" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td> 
 <? 
$sql = "SELECT n_hit, n_title,n_data,b_id,n_id FROM news where b_id=4 or b_id=5 or b_id=7 or b_id=11  ORDER BY n_hit DESC";
$result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
$rsn = mysql_fetch_array($result); 
$CursorType =0;
$CursorLocation = 2;
$LockType = 3;
$rsn_numRows=0;
$i=1; ?>
                                          <? while(!($rsn==0) && $i<11)
{
?>
                                          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td width="8%" align="left"><img src="../images/ball7.gif" width="6" height="18"></td>
                                              <td height="18" valign="top" class="main"><A HREF="moban.php?n_id=<?   echo $rsn["n_id"]; ?>&b_id=<?   echo $rsn["b_id"]; ?>" target="_blank" class="main"> 
                                                <?  echo yiqi_cut($rsn["n_title"],22); ?>
                                                </A> </td>
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
                                        <td height="7"></td>
                                      </tr>
                                    </table> 
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td><img src="../images/softti.gif" width="179" height="24"></td>
                                      </tr>
                                    </table>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td height="10"></td>
                                      </tr>
                                    </table>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td height="10"> 
  <? 
$sql = "SELECT n_id, b_id, n_title, n_hit, n_data FROM news where b_id=17 ORDER BY n_data DESC";
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
                                    <? while(!($rsn==0) && $i<11)
{
?>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td width="8%"><img src="../images/ball7.gif" width="6" height="18"></td>
                                        <td width="92%" height="18" valign="top" class="main"><A HREF="moban.php?n_id=<?   echo $rsn["n_id"]; ?>&b_id=<?   echo $rsn["b_id"]; ?>" target="_blank" class="main"> 
                                          <?   echo yiqi_cut($rsn["n_title"],22); ?>
                                          </A> </td>
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
