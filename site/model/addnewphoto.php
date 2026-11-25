<?php
session_start();
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
        alert("您忘了填写model名字了!");
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
                                        <td height="30">&nbsp;</td>
                                      </tr>
                                    </table> 									
							<?php  if (!isset($_POST['picnum'])){?>
							<form name="form2" method="post" action="#01" onSubmit="return formCheck1(this)">
										<TABLE width=500 border=0 align=center cellPadding=3 cellSpacing=1 bgColor=silver class="main">
										 <TR> 
                                            <TD align=right bgColor=#f7f7f7 class="main">请先确定图片数量</TD>
                                           <TD colspan="3" bgColor=white class="main">	    
                                              <input type="text" name="picnum" id="name" size=18 
                              style="BORDER-RIGHT: gray 1px solid; BORDER-TOP: gray 1px solid; BORDER-LEFT: gray 1px solid; BORDER-BOTTOM: gray 1px solid"  >							   
                                              <input type="submit" name="Submit" value="确定" ></TD>
										 </TR>   
										  </table> 
                                  </form>
									<?php }?>
                                    <form name="form1" method="post" enctype="multipart/form-data"  action="addnewphoto2.php" onSubmit="return formCheck(this)">
                                      <a name="01"></a>　　　　 　 　　 
                                      <TABLE width=500 border=0 
                        align=center cellPadding=3 cellSpacing=1 bgColor=silver class="main">
                                        <TBODY>
                                          <TR> 
                                            <TD align=right bgColor=#f7f7f7 class="main"><FONT 
                              color=#ff6633><B>*</B></FONT>model名字</TD>
                                            <TD width="403" bgColor=white>
							  <select name="name" id="name">
							   <option value=" " >   </option>
          <? 
$sql ="SELECT name FROM model";
$result2 = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
while ( $rsb = mysql_fetch_array($result2)) 
{
?>
          <option value="<?   echo trim($rsb["name"]); ?>" >
          <?   echo trim($rsb["name"]); ?>
          </option>
          <? 
} 
?>
        </select>
							  </TD>
                                          </TR>
                                          <TR> 
                                            <TD align=right width=68 bgColor=#f7f7f7><FONT 
                              color=#ff6633><B>*</B></FONT>作品上传</TD>
                                            <TD bgColor=white>
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
                                              <span class="orange"><font color="#FF0000"><strong>文件名请不要有空格 
                                            也不要使用中文</strong></font></span></TD></TR>
                                          <TR>
                                            <TD align=right bgColor=#f7f7f7>说明 
                                            </TD>
                                            <TD bgColor=white><textarea name="sm" cols="30" rows="3" id="sm"></textarea></TD>
                                          </TR>
                                          <TR> 
                                            <TD align=right bgColor=#f7f7f7>上传者</TD>
                                            <TD bgColor=white><?=$_SESSION['loginname']?></TD>
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