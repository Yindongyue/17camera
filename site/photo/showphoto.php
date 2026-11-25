<?php
session_start();
include '../conn.php';
include '../config/path.php';
?>
<?php
$sz=2;
$pid=trim($_GET["pid"]);
$sql="select * from photo where pid=".$pid;
$result = mysql_query($sql,$db);
if( @mysql_num_rows($result)==0){
 echo "无图片";
 exit;
 }
$rs = mysql_fetch_array($result);
$sql="select flag,jhhao from users where username='".$rs["users"]."'";
$result2 = mysql_query($sql,$db);
$rs_jh = mysql_fetch_array($result2);
$jh=$rs_jh["jhhao"];
$str="";
	 if ($rs_jh["flag"]==2) $str="<img src='/images/Icon_2.gif' alt='资深会员'>";
     if ($rs_jh["flag"]==3) $str="<img src='/images/ioc03.gif' alt='VIP会员'>";
     if ($rs_jh["flag"]==4) $str="<img src='/images/Icon_4.gif' alt='管理员'>";

?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>※逸憩摄影※17camera.com※</title>
<link href="../images/main.css" rel="stylesheet" type="text/css">
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?php include '../top.php'; include '../top2.php';?>


<table width="760" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="36" bgcolor="#F5F5F5">&nbsp;</td>
    <td width="1" bgcolor="#CFCFCF"></td>
    <td width="723" valign="top"><table width="723" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="722" height="101" align="left" valign="top"><table width="721" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td align="center" valign="top" bgcolor="#FFFFFF"> 
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td>&nbsp;</td>
                    </tr>
                  </table>
                  <table width="96%" border="1" cellpadding="0" cellspacing="0" bordercolor="#E3E3E3" style="border-collapse: collapse">
                    <tr> 
                      <td width="8%"><img src="../images/fotoser.gif" width="93" height="35"></td>
                      <td width="92%"><form name="form2" method="post" action="photo.php?go=search" style="MARGIN: 0px; PADDING-BOTTOM: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; PADDING-TOP: 0px">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr align="center" valign="bottom"> 
                              <td width="27%"><select name="xiangj" id="xiangj" style="BORDER-RIGHT: #9a9999 1px solid; BORDER-TOP: #9a9999 1px solid; FONT-SIZE: 12px; BORDER-LEFT: #9a9999 1px solid; WIDTH: 100px; height=18px; BORDER-BOTTOM: #9a9999 1px solid; BACKGROUND-COLOR: #ffffff">
                                  <option value="%">品牌不限</option>
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
                              <td width="27%"><font 
                              color=#000000> 
                                <input name=names id="serach2" 
                  style="BORDER-RIGHT: #9a9999 1px solid; BORDER-TOP: #9a9999 1px solid; FONT-SIZE: 12px; BORDER-LEFT: #9a9999 1px solid; WIDTH: 100px; height=18px; BORDER-BOTTOM: #9a9999 1px solid; BACKGROUND-COLOR: #ffffff" 
                  size=10 maxsize="32">
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
                  <table width="96%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td><table width="360" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td height="27" background="../images/fototi.gif"><table width="360" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                  <td width="10">&nbsp;</td>
                                  <td width="350" valign="bottom" class="white">
<strong>
<?php
$sql="select lb_name from leib where leib='".$rs["leib"]."'";
$result3 = mysql_query($sql,$db);
$rs1 = mysql_fetch_array($result3);
?>
〖 <? echo $rs1["lb_name"]; ?>  〗
                            </strong></td>
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
                  <table width="13%" border="1" cellpadding="0" cellspacing="4" bordercolor="#CCCCCC"style="font-size:12px">
                    <tr> 
                      <td align="center" valign="top"><p><img src="<? echo $url_path; ?><? echo $jh; ?>/<? echo $rs["pic"]; ?>"></p>
                      <p>第1幅<br>
                        <br>
                      </p></td>
					  <?php if(($_SESSION["qx"] == "4") || ($rs["users"] == $_SESSION['loginname'])){ ?>
					   <td><div align="center"><a href="/admin/pic_particular_del.php?pid=<? echo $rs["pid"]; ?>&pic=<? echo $rs["pic"]; ?>&jhhao=<?php echo $jh; ?>" class="orange">删除</a></div></td>
                      <?php } ?>
                    </tr>
                  </table>
                  <br>
<?php
$sql="select pic,id from photozt where pid=".$pid;
$result4 = mysql_query($sql,$db);
//$rs_zt = mysql_fetch_array($result4);
while($rs_zt = mysql_fetch_array($result4))
{
?>
            <table width="13%" border="1" cellpadding="0" cellspacing="4" bordercolor="#CCCCCC"style="font-size:12px">
                    <tr> 
                    
                      <td align="center" valign="top"><p><img src="<?   echo $url_path; ?><?   echo $jh; ?>/<?   echo $rs_zt["pic"]; ?>"></p>
                      <p>第<?   echo $sz; ?>幅<br>
                        <br>
                      </p></td>
					  <?php if(($_SESSION["qx"] == "4") || ($rs["users"] == $_SESSION['loginname'])){ ?>
					   <td><div align="center"><a href="/admin/pic_particular_del.php?id=<? echo $rs_zt["id"]; ?>&pid=<? echo $rs["pid"]; ?>&pic=<? echo $rs_zt["pic"]; ?>&jhhao=<?php echo $jh; ?>" class="orange">删除</a></div></td>
                      <?php } ?>
                    </tr>
                  </table>
                  <br>
<?   
$sz=$sz+1;
} 
?>
                       
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                  </table>
                  <table width="95%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="25" align="center" valign="top" class="main"><strong><font size="3"><?   echo $rs["names"]; ?></font></strong></td>
                    </tr>
                  </table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td height="18" align="center" valign="bottom" class="orange"> 
                        <p>使用相机：<span class="main"><? echo $rs["xiangj"]; ?>&nbsp;</span><span class="main"><? echo $rs["xingh"]; ?></span>&nbsp;&nbsp;镜头：<span class="main"><? echo $rs["jingt"]; ?></span>&nbsp;&nbsp;&nbsp;使用胶片：<span class="main"><? echo $rs["jiaop"]; ?></span>&nbsp;&nbsp;作者：<a href="person.php?username=<? echo $rs["users"]; ?>" target="_blank" class="green"><? echo $rs["users"]; ?></a><? echo $str; ?>&nbsp;发表时间：<span class="main"><? echo $rs["dat"]; ?></span>&nbsp;&nbsp;浏览人次：<span class="main"><? echo $rs["dj"]; ?></span> 
                          <br>
                        </p>
                      </td>
                    </tr>
                  </table>
                  <table width="95%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td> 
<? if ($_SESSION["qx"] == "4")
{
?>
                          <br> <div align="center" class="orange">
                          <form name="form3" method="post" action="../admin/photo_leib.php?pid=<?   echo $pid; ?>">
                            管理员：<a href="../admin/pic_del.php?pid=<?   echo $rs["pid"]; ?>&pic=<?   echo $rs["pic"]; ?>&username=<?   echo $jh; ?>" class="green">删除此组相片</a> 
                            <a href="../admin/pic_tj.php?pid=<?   echo $rs["pid"]; ?>&pic=<?   echo $rs["pic"]; ?>" class="green">推荐此组相片</a>&nbsp;&nbsp;&nbsp; 
                            <select name="leib" id="leib">
                              <option value="<?   echo $rs["leib"]; ?>"><?   echo $rs1["lb_name"]; ?></option>
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
                            </select>
                            <input type="submit" name="Submit" value="更改">
                          </form>
                          <br>
                          <? } ?>
                        </div>
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
                      <td height="20" valign="bottom" bgcolor="#CCCCCC" class="main"><strong>&nbsp;【拍摄心得】</strong></td>
                    </tr>
                  </table>
                  <table width="95%" border="1" cellpadding="10" cellspacing="0" bordercolor="#CCCCCC" style="border-collapse: collapse">
                    <tr>
                      <td valign="top" class="zi"> 
<? if ($rs["sm"]!="")
{
  echo $rs["sm"]; 
 }
  else
{
echo "--"; 
 } ?>  
                    
                      </td>
                    </tr>
                  </table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td>&nbsp;</td>
                    </tr>
                  </table>
				  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:12px">
                    <tr> 
                      <td align="center" valign="top"><font color="#0000FF">如果您认为这张作品不错,请在此处馈赠一票</font><font color="#FF0000">(*参与投票者仅限本站会员)</font> 
                        <form name="form10" method="post" action="addtoupiao.php?pid=<? echo $pid; ?>" style="MARGIN: 0px; PADDING-BOTTOM: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; PADDING-TOP: 0px">
                          <table width="86%" border="0" cellspacing="0" cellpadding="0">
                            <tr class="main"> 
                              <td width="19%" align="right">用户名</td>
                              <td width="22%">&nbsp; <INPUT name=username id="username" 
                              style="BORDER-RIGHT: gray 1px solid; BORDER-TOP: gray 1px solid; BORDER-LEFT: gray 1px solid; BORDER-BOTTOM: gray 1px solid;WIDTH: 90px;height=17px" size=18 value= "<?=$_SESSION["loginname"]; ?>" ></td>
                              <td width="6%" align="right">密&nbsp;&nbsp;码</td>
                              <td width="23%">&nbsp; 
							  
<? if(isset($_SESSION['password2']))
{
  $pass="********";
}
  else
{

  $pass="";
}
?>
							
							  <INPUT name=password type="password" id="ps2" 
                              style="BORDER-RIGHT: gray 1px solid; BORDER-TOP: gray 1px solid; BORDER-LEFT: gray 1px solid; BORDER-BOTTOM: gray 1px solid; height=17px;WIDTH: 90px" value="<? echo $pass; ?>"  
                              size=18></td>
                              <td width="30%"><input name="imageField2" type="image" src="../images/toupiao.gif" width="100" height="21" border="0"></td>
                            </tr>
                          </table>
                          <table width="95%" border="0" cellspacing="0" cellpadding="0">
                            <tr> 
                              <td height="6"></td>
                            </tr>
                          </table>
                          <b> </b><font color="#000000"> </font> 
                        </form></td>
                    </tr>
                  </table>
<?php
$sql="select tps,tpz from toupiao where pid=".$pid;
$result5 = mysql_query($sql,$db);
$num_rows = mysql_num_rows($result5);
$rstp = mysql_fetch_array($result5);
if (($rstp==0))
{
?>			 
                    <table width="95%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td height="20" valign="bottom" bgcolor="#CCCCCC" class="main"><strong>&nbsp;【该作品得票<font color="#FF0000">0</font>票】</strong>投票者:</td>
                    </tr>
                  </table>
                  <table width="95%" border="1" cellpadding="10" cellspacing="0" bordercolor="#CCCCCC" style="border-collapse: collapse">
                    <tr> 
                      <td valign="top" class="zi"> 
                        暂无
                      </td>
                    </tr>
                  </table>
 <? }
  else
{
  
?>
				

                  <table width="95%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td height="20" valign="bottom" bgcolor="#CCCCCC" class="main"><strong>&nbsp;【该作品得票<font color="#FF0000"><?   echo $rstp["tps"]; ?></font>票】</strong>投票者:</td>
                    </tr>
                  </table>
                  <table width="95%" border="1" cellpadding="10" cellspacing="0" bordercolor="#CCCCCC" style="border-collapse: collapse">
                    <tr> 
                      <td valign="top" class="zi"> 
                        <?   echo $rstp["tpz"]; ?>
                      </td>
                    </tr>
                  </table>
 <? } ?>
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
}
else{
   $page = 1;
}
$page_size = 8;
$sql="select count(*)  from review where pid='".$pid."'";
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
}
else{
   $page_count = 0;
    print "<br><br><b><center><span class='main'>现在还没有评论。</span></center></b><br><br> ";
}
// 翻页链接
$page_string = '';
if( $page == 1 ){
   $page_string .= '第一页|上一页|';
}
else{
   $page_string .= '<a href=?page=1'.'&pid='.$pid.'#01>第一页</a>|<a href=?page='.($page-1).'&pid='.$pid.'#01>上一页</a>|';
}
if( ($page == $page_count) || ($page_count == 0) ){
   $page_string .= '下一页|尾页';
}
else{
   $page_string .= '<a href=?page='.($page+1).'&pid='.$pid.'#01>下一页</a>|<a href=?page='.$page_count.'&pid='.$pid.'#01>尾页</a>';
}

?>
 </font> </p>
 <?
 if( $amount ){
   $sql = "select * from review  where pid='".$pid."' order by id desc limit ". ($page-1)*$page_size .", $page_size";
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
							  
<? if($_SESSION['password2'] != "")
{
  $pass="********";
}
  else
{

  $pass="";
}
?>
							
							  <INPUT name=password type="password" id="ps2" 
                              style="BORDER-RIGHT: gray 1px solid; BORDER-TOP: gray 1px solid; BORDER-LEFT: gray 1px solid; BORDER-BOTTOM: gray 1px solid; height=17px;WIDTH: 90px" value="<? echo $pass; ?>"  
                              size=18></td>
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
                  <b> </b> </td>
              </tr>
            </table></td>
          <td width="1" background="../images/shudian.gif"></td>
        </tr>
      </table></td>
  </tr>
</table>


<?php require '../bottom.php'; ?>
<?  $sql="update photo set dj=dj+1 where pid=".$pid;
  $result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error());?>
</body>
</html>