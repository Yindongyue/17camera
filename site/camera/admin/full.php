<? 
include '../../conn.php';
if (isset($_GET["id"]))
{
$id = $_GET["id"];
}
else
{
$id = $_POST["id"];
}

$sql="select * from ca_product where id=".$id;
$result=mysql_query($sql,$db) or die("Query failed : " . mysql_error());
$rs = mysql_fetch_array($result);
?>
<html>
<head>
<title>产品修改</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
<!--
.white {  font-size: 9pt; line-height: 17px; color: #FFFFFF; text-decoration: none}
-->
</style>
</head>

<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="550" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td align="left" valign="top"> 
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td bgcolor="#7E888C" height="5"></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="1"></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td bgcolor="#7E888C" height="1"></td>
        </tr>
      </table>
      <table width="550" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="282" align="right" valign="top" bgcolor="#667277"> 
            <table width="100%" height="410" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#99A1A4" style="border-collapse: collapse">
              <tr> 
                <td align="left" valign="top" bgcolor="#667277"> 
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td class="white"><font color="#000000">产品资料修改</font></td>
                    </tr>
                  </table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td class="white">
                      
                        <form method="post" action="modi.php">
                          <div align="center"> 
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr> 
                                <td colspan="2" class="white"> <div align="right">
                                    <table width="459" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td colspan="2"> <div align="right"> 
                                            <table width="90%" border="1" cellpadding="0" cellspacing="0" bordercolor="#999999" style="border-collapse: collapse">
                                              <tr> 
                                                <td width="32%" height="20" align="center" valign="bottom" class="main">产品型号</td>
                                                <td width="68%" align="left" valign="bottom"> 
                                                  <input name="xingh" type="text" id="xingh" value="<? echo $rs["xingh"]; ?>" size="35"></td>
                                              </tr>
                                              <tr> 
                                                <td height="20" align="center" valign="bottom" class="main">发售年份</td>
                                                <td align="left" valign="bottom"><input name="fs" type="text" id="fs" value="<? echo $rs["fs"]; ?>" size="35"></td>
                                              </tr>
                                              <tr> 
                                                <td height="20" align="center" valign="bottom" class="main">像 
                                                  素</td>
                                                <td align="left" valign="bottom"><input name="xs" type="text" id="xs" value="<? echo $rs["xs"]; ?>" size="35"></td>
                                              </tr>
                                              <tr> 
                                                <td height="20" align="center" valign="bottom" class="main">CCD尺寸</td>
                                                <td align="left" valign="bottom"><input name="ccd" type="text" id="ccd" value="<? echo $rs["ccd"]; ?>" size="35"></td>
                                              </tr>
                                              <tr> 
                                                <td height="20" align="center" valign="bottom" class="main">最大有效分辨率</td>
                                                <td align="left" valign="bottom"><input name="zdfbl" type="text" id="zdfbl" value="<? echo $rs["zdfbl"]; ?>" size="35"></td>
                                              </tr>
                                              <tr> 
                                                <td height="20" align="center" valign="bottom" class="main">其它分辨率</td>
                                                <td align="left" valign="bottom"><input name="qtfbl" type="text" id="qtfbl" value="<? echo $rs["qtfbl"]; ?>" size="35"></td>
                                              </tr>
                                              <tr> 
                                                <td height="20" align="center" valign="bottom" class="main">ISO 
                                                  感光度</td>
                                                <td align="left" valign="bottom"><input name="iso" type="text" id="iso" value="<? echo $rs["iso"]; ?>" size="35"></td>
                                              </tr>
                                              <tr> 
                                                <td height="20" align="center" valign="bottom" class="main">光学变焦</td>
                                                <td align="left" valign="bottom"><input name="gxbj" type="text" id="gxbj" value="<? echo $rs["gxbj"]; ?>" size="35"></td>
                                              </tr>
                                              <tr> 
                                                <td height="20" align="center" valign="bottom" class="main">数码变焦</td>
                                                <td align="left" valign="bottom"><input name="smbj" type="text" id="smbj" value="<? echo $rs["smbj"]; ?>" size="35"></td>
                                              </tr>
                                              <tr> 
                                                <td height="20" align="center" valign="bottom" class="main">自动对焦</td>
                                                <td align="left" valign="bottom"><input name="zddj" type="text" id="zddj" value="<? echo $rs["zddj"]; ?>" size="35"></td>
                                              </tr>
                                              <tr> 
                                                <td height="20" align="center" valign="bottom" class="main">手动对焦</td>
                                                <td align="left" valign="bottom"><input name="sddj" type="text" id="sddj" value="<? echo $rs["sddj"]; ?>" size="35"></td>
                                              </tr>
                                              <tr> 
                                                <td height="20" align="center" valign="bottom" class="main">一般对焦范围</td>
                                                <td align="left" valign="bottom"><input name="djfw" type="text" id="djfw" value="<? echo $rs["djfw"]; ?>" size="35"></td>
                                              </tr>
                                              <tr> 
                                                <td height="20" align="center" valign="bottom" class="main">微 
                                                  距</td>
                                                <td align="left" valign="bottom"><input name="wj" type="text" id="wj" value="<? echo $rs["wj"]; ?>" size="35"></td>
                                              </tr>
                                              <tr> 
                                                <td height="20" align="center" valign="bottom" class="main">白平衡</td>
                                                <td align="left" valign="bottom"><input name="bph" type="text" id="bph" value="<? echo $rs["bph"]; ?>" size="45"></td>
                                              </tr>
                                              <tr> 
                                                <td height="20" align="center" valign="bottom" class="main">快门速度</td>
                                                <td align="left" valign="bottom"><input name="km" type="text" id="km" value="<? echo $rs["km"]; ?>" size="35"></td>
                                              </tr>
                                              <tr> 
                                                <td height="20" align="center" valign="bottom" class="main">光圈范围</td>
                                                <td align="left" valign="bottom"><input name="gq" type="text" id="gq" value="<? echo $rs["gq"]; ?>" size="35"></td>
                                              </tr>
                                              <tr> 
                                                <td height="20" align="center" valign="bottom" class="main">曝光模式</td>
                                                <td align="left" valign="bottom"><input name="bg" type="text" id="bg" value="<? echo $rs["bg"]; ?>" size="45"></td>
                                              </tr>
                                              <tr> 
                                                <td height="20" align="center" valign="bottom" class="main">闪光灯</td>
                                                <td align="left" valign="bottom"><input name="sg" type="text" id="sg" value="<? echo $rs["sg"]; ?>" size="35"></td>
                                              </tr>
                                              <tr> 
                                                <td height="20" align="center" valign="bottom" class="main">曝光补偿</td>
                                                <td align="left" valign="bottom"><input name="bgbc" type="text" id="bgbc" value="<? echo $rs["bgbc"]; ?>" size="35"></td>
                                              </tr>
                                              <tr> 
                                                <td height="20" align="center" valign="bottom" class="main">测光方式</td>
                                                <td align="left" valign="bottom"><input name="cg" type="text" id="cg" value="<? echo $rs["cg"]; ?>" size="45"></td>
                                              </tr>
                                              <tr> 
                                                <td height="20" align="center" valign="bottom" class="main">口 
                                                  径</td>
                                                <td align="left" valign="bottom"><input name="kj" type="text" id="kj" value="<? echo $rs["kj"]; ?>" size="35"></td>
                                              </tr>
                                              <tr> 
                                                <td height="20" align="center" valign="bottom" class="main">连 
                                                  拍</td>
                                                <td align="left" valign="bottom"><input name="lp" type="text" id="lp" value="<? echo $rs["lp"]; ?>" size="35"></td>
                                              </tr>
                                              <tr> 
                                                <td height="20" align="center" valign="bottom" class="main">遥 
                                                  控</td>
                                                <td align="left" valign="bottom"><input name="yk" type="text" id="yk" value="<? echo $rs["yk"]; ?>" size="35"></td>
                                              </tr>
                                              <tr> 
                                                <td height="20" align="center" valign="bottom" class="main">三脚架使用</td>
                                                <td align="left" valign="bottom"><input name="sjj" type="text" id="sjj" value="<? echo $rs["sjj"]; ?>" size="35"></td>
                                              </tr>
                                              <tr> 
                                                <td height="20" align="center" valign="bottom" class="main">自 
                                                  拍</td>
                                                <td align="left" valign="bottom"><input name="zp" type="text" id="zp" value="<? echo $rs["zp"]; ?>" size="35"></td>
                                              </tr>
                                              <tr> 
                                                <td height="20" align="center" valign="bottom" class="main">视频输出</td>
                                                <td align="left" valign="bottom"><input name="sp" type="text" id="sp" value="<? echo $rs["sp"]; ?>" size="35"></td>
                                              </tr>
                                              <tr> 
                                                <td height="26" align="center" valign="bottom" class="main">存储媒介</td>
                                                <td align="left" valign="bottom"><input name="cc" type="text" id="cc" value="<? echo $rs["cc"]; ?>" size="35"></td>
                                              </tr>
                                              <tr> 
                                                <td height="20" align="center" valign="bottom" class="main">压缩格式</td>
                                                <td align="left" valign="bottom"><input name="ys" type="text" id="ys" value="<? echo $rs["ys"]; ?>" size="35"></td>
                                              </tr>
                                              <tr> 
                                                <td height="26" align="center" valign="bottom" class="main">画质选择</td>
                                                <td align="left" valign="bottom"><input name="hz" type="text" id="hz" value="<? echo $rs["hz"]; ?>" size="35"></td>
                                              </tr>
                                              <tr> 
                                                <td height="20" align="center" valign="bottom" class="main">光学取景器</td>
                                                <td align="left" valign="bottom"><input name="gxqj" type="text" id="gxqj" value="<? echo $rs["gxqj"]; ?>" size="35"></td>
                                              </tr>
                                              <tr> 
                                                <td height="20" align="center" valign="bottom" class="main">液晶显示屏</td>
                                                <td align="left" valign="bottom"><input name="yjxs" type="text" id="yjxs" value="<? echo $rs["yjxs"]; ?>" size="35"></td>
                                              </tr>
                                              <tr> 
                                                <td height="20" align="center" valign="bottom" class="main">外部连接口</td>
                                                <td align="left" valign="bottom"><input name="ljk" type="text" id="ljk" value="<? echo $rs["ljk"]; ?>" size="35"></td>
                                              </tr>
                                              <tr> 
                                                <td height="20" align="center" valign="bottom" class="main">使用电池</td>
                                                <td align="left" valign="bottom"><input name="dc" type="text" id="dc" value="<? echo $rs["dc"]; ?>" size="35"></td>
                                              </tr>
                                              <tr> 
                                                <td height="20" align="center" valign="bottom" class="main">重 
                                                  量</td>
                                                <td align="left" valign="bottom"><input name="zl" type="text" id="zl" value="<? echo $rs["zl"]; ?>" size="35"></td>
                                              </tr>
                                              <tr> 
                                                <td height="20" align="center" valign="bottom" class="main">尺寸规格</td>
                                                <td align="left" valign="bottom"><input name="gg" type="text" id="gg" value="<? echo $rs["gg"]; ?>" size="35"></td>
                                              </tr>
                                              <tr> 
                                                <td height="20" align="center" valign="bottom" class="main">视频输出</td>
                                                <td align="left" valign="bottom"><input name="spsc" type="text" id="spsc" value="<? echo $rs["spsc"]; ?>" size="35"></td>
                                              </tr>
                                              <tr> 
                                                <td height="20" align="center" valign="bottom" class="main">备 
                                                  注</td>
                                                <td align="left" valign="bottom"><textarea name="bz" cols="30" rows="3" id="bz"><? echo $rs["bz"]; ?></textarea></td>
                                              </tr>
                                            </table>
                                          </div>
                                          <div align="right"></div></td>
                                      </tr>
                                      <tr> 
                                        <td width="213">&nbsp;</td>
                                        <td width="246"> <input type="submit" name="Submit22" value="修 改"> 
                                        </td>
                                      </tr>
                                    </table>
                                  </div>
                                  </td>
                              </tr>
                            </table>
                            <input type="hidden" name="id" value="<? echo $id; ?>">
                          </div>
                        </form>
                        <p><br>
                        </p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
           
          <td align="left" valign="top" bgcolor="#667277" width="268"> 
            <table width="100%" border="0" cellspacing="0" cellpadding="10">
              <tr> 
                <td align="right" valign="top" height="420" width="250">
                  <div align="center"><img src="image/<? echo $rs["bpic"]; ?>" width="260"></div>
                </td>
              </tr>
            </table>
            <? ?>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</body>
</html>

