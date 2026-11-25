<?php
session_start();
include '../config/path.php';
include '../conn.php';
include '../config/geturl.php';
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>※逸憩摄影※17camera.com※</title>
<link href="../images/main.css" rel="stylesheet" type="text/css">
</head>
<SCRIPT language=JavaScript>
function isDigit(s) 
{ 
var patrn=/^[0-9]{1,2}$/; 
if (!patrn.exec(s)) return false ;
return true ;
} 
function formCheck1(document)
{
if (!isDigit(document.picnum.value ))
        {
        alert("请填写数字!");
        return false;
        }
}
function formCheck(document)
{
	   if(document.name.value == "")
        {
        alert("您忘了填写作品名称了!");
        return false;
        }
       if(document.leib.value == "n")
        {
        alert("您忘了选择作品类别!");
        return false;
        }
		<?  if (isset($_POST['picnum'])) echo "/*";   ?>
		
		if(document.upload_file1.value == "")
        {
        alert("您忘了选择要上传图片!");
        return false;
        }		
		<? if (isset($_POST['picnum'])) echo "*/";  ?>
		
<?php  
	
	  $picnum = $_POST['picnum'];
	 for($i =1;$i<=$picnum;$i++)
	{
	$b = "document.upload_file".$i.".value";
   echo "\n\r if(".$b ." == \"\") \n\r  {	\n\r alert(\"您忘了选择第".$i."张上传图片!\");\n\r   return false; \n\r  } \n\r ";
   }
 ?>		
}
</SCRIPT>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<?php include '../top.php'; ?>
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
                      <td><img src="../images/05zuo.gif" width="130" height="206"></td>
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
                                  <td width="130" align="center" valign="top" background="../images/sens_main_1pixcel_line.gif" bgcolor="#FFFFFF">&nbsp; 
                                  </td>
                                  <td width="1" background="../images/shudian.gif" bgcolor="#C0C0C0"></td>
                                  <td width="591" align="center" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td height="30"><span class="main"><a name="01"></a></span></td>
                                      </tr>
                                    </table> 		
																
		                    <?php  if (!isset($_POST['picnum'])){?>

							<form name="form2" method="post" action="#01" onSubmit="return formCheck1(this)">
										<TABLE width=500 border=0 align=center cellPadding=3 cellSpacing=1 bgColor=silver class="main">
										 <TR> 
                                            <TD align=right bgColor=#f7f7f7 class="main"><FONT 
                              color=#ff6633><B>*</B></FONT><font color="#FF0000"><strong>请先确定图片数量</strong></font></TD>
                                            <TD colspan="3" bgColor=white class="main">	    
                                              <input type="text" name="picnum" id="name" size=18 
                              style="BORDER-RIGHT: gray 1px solid; BORDER-TOP: gray 1px solid; BORDER-LEFT: gray 1px solid; BORDER-BOTTOM: gray 1px solid"  >							   
                                           <input type="submit" name="Submit" value="确定" ></TD>
                                          </TR>   
									  </table> 
                                  </form>
									<?php }?>
                                    <form name="form1" method="post" enctype="multipart/form-data"  action="newphoto2.php" onSubmit="return formCheck(this)">
                                      　　　　 　 　　 
                                      <TABLE width=500 border=0 
                        align=center cellPadding=3 cellSpacing=1 bgColor=silver class="main">
                                        <TBODY>
                                          <TR> 
                                            <TD align=right bgColor=#f7f7f7 class="main"><FONT 
                              color=#ff6633><B>*</B></FONT>作品名称</TD>
                                            <TD colspan="3" bgColor=white><input name=name id="name" 
                              style="BORDER-RIGHT: gray 1px solid; BORDER-TOP: gray 1px solid; BORDER-LEFT: gray 1px solid; BORDER-BOTTOM: gray 1px solid" 
                              size=18></TD>
                                          </TR>
                                          <TR> 
                                            <TD align=right width=68 bgColor=#f7f7f7>使用相机</TD>
                                            <TD width="165" bgColor=white><select name="xiangj" id="xiangj" style="BORDER-RIGHT: gray 1px solid; BORDER-TOP: gray 1px solid; BORDER-LEFT: gray 1px solid; BORDER-BOTTOM: gray 1px solid">
                                                <option value="未知品牌" selected>未知品牌</option>
												<option value="Canon" >佳能</option>
                                                <option value="Nikon">尼康</option>
                                                <option value="Fujifilm">富士</option>
                                                <option value="Kodak">柯达</option>
                                                <option value="Sony">索尼</option>
                                                <option value="Ricoh">理光</option>
                                                <option value="Casio">卡西欧</option>
                                                <option value="Sigma">适马</option>
                                                <option value="Samsung">三星</option>
                                                <option value="Pentax">宾得</option>
                                                <option value="Olympus">奥林巴斯</option>
                                                <option value="Minolta">美能达</option>
                                                <option value="Panasonic">松下</option>
                                                <option value="其他品牌">其他品牌</option>
                                              </select> </TD>
                                            <TD width="50" align="right" bgColor=#f7f7f7><FONT 
                              color=#ff6633>&nbsp;</FONT>型号</TD>
                                            <TD width="188" bgColor=white><INPUT name=xingh id="xingh" 
                              style="BORDER-RIGHT: gray 1px solid; BORDER-TOP: gray 1px solid; BORDER-LEFT: gray 1px solid; BORDER-BOTTOM: gray 1px solid" 
                              size=18></TD>
                                          </TR>
                                          <TR> 
                                            <TD align=right width=68 bgColor=#f7f7f7>使用镜头</TD>
                                            <TD colspan="3" bgColor=white><INPUT name=jingt id="jingt" 
                              style="BORDER-RIGHT: gray 1px solid; BORDER-TOP: gray 1px solid; BORDER-LEFT: gray 1px solid; BORDER-BOTTOM: gray 1px solid" 
                              size=18> </TD>
                                          </TR>
                                          <TR> 
                                            <TD align=right bgColor=#f7f7f7><FONT 
                              color=#ff6633>&nbsp;</FONT>使用胶片</TD>
                                            <TD colspan="3" bgColor=white><INPUT name=jiaop id="jiaop" 
                              style="BORDER-RIGHT: gray 1px solid; BORDER-TOP: gray 1px solid; BORDER-LEFT: gray 1px solid; BORDER-BOTTOM: gray 1px solid" 
                              size=18></TD>
                                          </TR>
                                          <TR> 
                                            <TD align=right bgColor=#f7f7f7><FONT 
                              color=#ff6633>&nbsp;</FONT>使用光圈</TD>
                                            <TD colspan="3" bgColor=white><INPUT name=guanq id="guanq" 
                              style="BORDER-RIGHT: gray 1px solid; BORDER-TOP: gray 1px solid; BORDER-LEFT: gray 1px solid; BORDER-BOTTOM: gray 1px solid" 
                              size=18></TD>
                                          </TR>
                                          <TR> 
                                            <TD align=right bgColor=#f7f7f7>曝光时间</TD>
                                            <TD colspan="3" bgColor=white><input name="baog" type="text" id="baog" style="BORDER-RIGHT: gray 1px solid; BORDER-TOP: gray 1px solid; BORDER-LEFT: gray 1px solid; BORDER-BOTTOM: gray 1px solid" value="" size="18"></TD>
                                          </TR>
                                          <TR> 
                                            <TD align=right bgColor=#f7f7f7 class="main"><FONT 
                              color=#ff6633><B>*</B></FONT>作品类别</TD>
                                            <TD colspan="3" bgColor=white><select name="leib" id="leib">
											   <option value="n">选择类别</option>
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
                                              </select></TD>
                                          </TR>
                                          <TR> 
                                            <TD align=right width=68 bgColor=#f7f7f7><FONT 
                              color=#ff6633><B>*</B></FONT>作品上传</TD>
                                            <TD colspan="3" bgColor=white>
<?php 
if (!isset($_POST['picnum']))
{
//echo "<input type=file name= upload_file1 ><br>";
//$_SESSION['picnum'] = 1;
}
else
{
$_SESSION['picnum'] = $_POST['picnum'];
for($i =1;$i<=$picnum;$i++)
{
 $a="<input type=file name= upload_file".$i."><br>";
    echo  $a;
}
}
?>                                              
普通会员上传文件最大不得超过300K，资深会员上传文件不得超过600K，VIP会员不限 
                                              <span class="orange"><font color="#FF0000"><strong>文件名请不要有空格 
                                            也不要使用中文</strong></font></span></TD>
                                          </TR>
                                          <TR>
                                            <TD align=right bgColor=#f7f7f7>说明 
                                            </TD>
                                            <TD colspan="3" bgColor=white><textarea name="sm" cols="30" rows="3" id="sm"></textarea></TD>
                                          </TR>
                                          <TR> 
                                            <TD align=right bgColor=#f7f7f7>上传者</TD>
                                            <TD colspan="3" bgColor=white><?=$_SESSION['loginname']?></TD>
                                          </TR>
                                        </TBODY>
                                      </TABLE>
                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr> 
                                          <td>&nbsp;</td>
                                        </tr>
                                      </table>
                                      <table width="95%" border="0" cellspacing="0" cellpadding="0">
                                        <tr> 
                                          <td align="center"><input name="imageField" type="image" src="../images/writenew.gif" width="100" height="21" border="0"></td>
                                        </tr>
                                      </table>
                                    </form>
                                    <table width="500" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td height="30" valign="bottom" class="zi">PS：<span class="orange">*</span>为必填项<br>
                                          &nbsp;&nbsp;&nbsp;&nbsp;普通会员上传文件最大不得超过300K，资深会员上传文件不得超过600K，VIP会员不限</td>
                                      </tr>
                                    </table>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td height="30">&nbsp;</td>
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
<? include '../bottom.php' ?>