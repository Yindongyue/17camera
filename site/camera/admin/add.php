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
?>
<html>
<style type="text/css">
<!--
.white {  font-size: 13px; text-decoration: none}
-->
</style>

<link href="../mainv5.css" rel="stylesheet" type="text/css">
<script language="JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<title>产品管理后台</title><span class="white"></span> 
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#667277" class="white">
  <tr align="left"> 
    <td> 
      <p><a href="pwd.php" target="_blank"><font color="#FFFFFF">修改管理员密码</font></a><br>
        <br>
      </p>
      <? 
if ($id!="")
{
?>
      <a href="add.php?id=<?   echo $id; ?>"><font color="#FFFFFF"><<</font></a>
      <? } ?>
      <table width="88%" height="20" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr> 
          <td>
            <div align="center"> 
 <? 
$sql="select * from ca_sorts";
$result=mysql_query($sql,$db) or die("Query failed : " . mysql_error());
$rs = mysql_fetch_array($result);
while(!($rs==0))
{
?>
              <a href="add.php?id=<?   echo $rs["sortid"]; ?>"><?   echo $rs["sort"]; ?> </a>- 
              <?   $rs=mysql_fetch_array($result);

} 
?>
            </div>
          </td>
        </tr>
      </table>
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="20" valign="bottom"> 
            <? if ($id!="")
{
?>
            <font onClick="MM_openBrWindow('sort.php?id=<?   echo $id; ?>','','width=250,height=20')"><a href="#"><font color="#000000">添加分类</font></a></font> 
            <font onClick="MM_openBrWindow('modsort.php?id=<?   echo $id; ?>','','width=250,height=20')"><a href="#"><font color="#000000">修改分类</font></a></font> 
            <a href="delsort.php?id=<?   echo $id; ?>" onClick='javascript:return window.confirm("您确认删除吗？")'><font color="#000000">删除分类</font></a> 
            <? } ?>
          </td>
        </tr>
        <tr>
          <td>&nbsp; </td>
        </tr>
      </table>
<? 
if (isset($id) && isset($_POST["xingh"]))
{

  $xingh=trim($_POST["xingh"]);
  $names=trim($_POST["name"]);
  $classs=trim($id);
  $fs=trim($_POST["fs"]);
  $xs=trim($_POST["xs"]);
  $ccd=trim($_POST["ccd"]);
  $zdfbl=trim($_POST["zdfbl"]);
  $qtfbl=trim($_POST["qtfbl"]);
  $iso=trim($_POST["iso"]);
  $gxbj=trim($_POST["gxbj"]);
  $smbj=trim($_POST["smbj"]);
  $zddj=trim($_POST["zddj"]);
  $sddj=trim($_POST["sddj"]);
  $djfw=trim($_POST["djfw"]);
  $wj=trim($_POST["wj"]);
  $bph=trim($_POST["bph"]);
  $km=trim($_POST["km"]);
  $gq=trim($_POST["gq"]);
  $bg=trim($_POST["bg"]);
  $sg=trim($_POST["sg"]);
  $bgbc=trim($_POST["bgbc"]);
  $cg=trim($_POST["cg"]);
  $kj=trim($_POST["kj"]);
  $lp=trim($_POST["lp"]);
  $yk=trim($_POST["yk"]);
  $sjj=trim($_POST["sjj"]);
  $zp=trim($_POST["zp"]);
  $sp=trim($_POST["sp"]);
  $cc=trim($_POST["cc"]);
  $ys=trim($_POST["ys"]);
  $hz=trim($_POST["hz"]);
  $gxqj=trim($_POST["gxqj"]);
  $yjxs=trim($_POST["yjxs"]);
  $ljk=trim($_POST["ljk"]);
  $dc=trim($_POST["dc"]);
  $zl=trim($_POST["zl"]);
  $gg=trim($_POST["gg"]);
  $spsc=trim($_POST["spsc"]);
  $bz=trim($_POST["bz"]);
  $pic=trim($_POST["pic"]);
  $bpic=trim($_POST["bpic"]);
  $sql="INSERT into ca_product (xingh,name,class,fs,xs,ccd,zdfbl,qtfbl,iso,gxbj,smbj,zddj,sddj,djfw,wj,bph,km,gq,bg,sg,bgbc,cg,kj,lp,yk,sjj,zp,sp,cc,ys,hz,gxqj,yjxs,ljk,dc,zl,gg,spsc,bz,pic,bpic) 
                      VALUES ( '".$xingh."','".$names."','".$classs."','".$fs."','".$xs."','".$ccd."','".$zdfbl."','".$qtfbl."','".$iso."','".$gxbj."','".$smbj."','".$zddj."','".$sddj."','".$djfw."','".$wj."','".$bph."','".$km."','".$gq."','".$bg."','".$sg."','".$bgbc."','".$cg."','".$kj."','".$lp."','".$yk."','".$sjj."','".$zp."','".$sp."','".$cc."','".$ys."','".$hz."','".$gxqj."','".$yjxs."','".$ljk."','".$dc."','".$zl."','".$gg."','".$spsc."','".$bz."','".$pic."','".$bpic."')";
  $result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
} 

?>
      <form name="form2" method="post" action="add.php?id=<? echo $id; ?>">
        <p><font color="#FFFFFF">产品录入</font><font color="#FFCC00"> 
 

          </font></p>
        <table width="459" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="213"> <div align="right"><font color="#FFFFFF">大图:</font></div></td>
            <td width="246"> <input type="text" name="bpic">
              <font color="#990000">带后缀</font> </td>
          </tr>
          <tr> 
            <td width="213"> <div align="right"><font color="#FFFFFF">小图:</font></div></td>
            <td width="246"> <input type="text" name="pic">
            </td>
          </tr>
          <tr> 
            <td colspan="2"> <div align="right">
                <table width="80%" border="1" cellpadding="0" cellspacing="0" bordercolor="#999999" style="border-collapse: collapse">
                  <tr bgcolor="#E3E3E3"> 
                    <td width="37%" height="20" align="center" class="black">项 
                      目</td>
                    <td width="63%" align="center" bgcolor="#E3E3E3" class="black">数 
                      据</td>
                  </tr>
                  <tr> 
                    <td height="20" align="center" valign="bottom" class="main">产品型号</td>
                    <td align="left" valign="bottom"> 
                      <input name="xingh" type="text" id="xingh"></td>
                  </tr>
                  <tr> 
                    <td height="20" align="center" valign="bottom" class="main">发售年份</td>
                    <td align="left" valign="bottom"><input name="fs" type="text" id="fs"></td>
                  </tr>
                  <tr> 
                    <td height="20" align="center" valign="bottom" class="main">像 
                      素</td>
                    <td align="left" valign="bottom"><input name="xs" type="text" id="xs"></td>
                  </tr>
                  <tr> 
                    <td height="20" align="center" valign="bottom" class="main">CCD尺寸</td>
                    <td align="left" valign="bottom"><input name="ccd" type="text" id="ccd"></td>
                  </tr>
                  <tr> 
                    <td height="20" align="center" valign="bottom" class="main">最大有效分辨率</td>
                    <td align="left" valign="bottom"><input name="zdfbl" type="text" id="zdfbl"></td>
                  </tr>
                  <tr> 
                    <td height="20" align="center" valign="bottom" class="main">其它分辨率</td>
                    <td align="left" valign="bottom"><input name="qtfbl" type="text" id="qtfbl"></td>
                  </tr>
                  <tr> 
                    <td height="20" align="center" valign="bottom" class="main">ISO 
                      感光度</td>
                    <td align="left" valign="bottom"><input name="iso" type="text" id="iso"></td>
                  </tr>
                  <tr> 
                    <td height="20" align="center" valign="bottom" class="main">光学变焦</td>
                    <td align="left" valign="bottom"><input name="gxbj" type="text" id="gxbj"></td>
                  </tr>
                  <tr> 
                    <td height="20" align="center" valign="bottom" class="main">数码变焦</td>
                    <td align="left" valign="bottom"><input name="smbj" type="text" id="smbj"></td>
                  </tr>
                  <tr> 
                    <td height="20" align="center" valign="bottom" class="main">自动对焦</td>
                    <td align="left" valign="bottom"><input name="zddj" type="text" id="zddj"></td>
                  </tr>
                  <tr> 
                    <td height="20" align="center" valign="bottom" class="main">手动对焦</td>
                    <td align="left" valign="bottom"><input name="sddj" type="text" id="sddj"></td>
                  </tr>
                  <tr> 
                    <td height="20" align="center" valign="bottom" class="main">一般对焦范围</td>
                    <td align="left" valign="bottom"><input name="djfw" type="text" id="djfw"></td>
                  </tr>
                  <tr> 
                    <td height="20" align="center" valign="bottom" class="main">微 
                      距</td>
                    <td align="left" valign="bottom"><input name="wj" type="text" id="wj"></td>
                  </tr>
                  <tr> 
                    <td height="20" align="center" valign="bottom" class="main">白平衡</td>
                    <td align="left" valign="bottom"><input name="bph" type="text" id="bph"></td>
                  </tr>
                  <tr> 
                    <td height="20" align="center" valign="bottom" class="main">快门速度</td>
                    <td align="left" valign="bottom"><input name="km" type="text" id="km"></td>
                  </tr>
                  <tr> 
                    <td height="20" align="center" valign="bottom" class="main">光圈范围</td>
                    <td align="left" valign="bottom"><input name="gq" type="text" id="gq"></td>
                  </tr>
                  <tr> 
                    <td height="20" align="center" valign="bottom" class="main">曝光模式</td>
                    <td align="left" valign="bottom"><input name="bg" type="text" id="bg"></td>
                  </tr>
                  <tr> 
                    <td height="20" align="center" valign="bottom" class="main">闪光灯</td>
                    <td align="left" valign="bottom"><input name="sg" type="text" id="sg"></td>
                  </tr>
                  <tr> 
                    <td height="20" align="center" valign="bottom" class="main">曝光补偿</td>
                    <td align="left" valign="bottom"><input name="bgbc" type="text" id="bgbc"></td>
                  </tr>
                  <tr> 
                    <td height="20" align="center" valign="bottom" class="main">测光方式</td>
                    <td align="left" valign="bottom"><input name="cg" type="text" id="cg"></td>
                  </tr>
                  <tr> 
                    <td height="20" align="center" valign="bottom" class="main">口 
                      径</td>
                    <td align="left" valign="bottom"><input name="kj" type="text" id="kj"></td>
                  </tr>
                  <tr> 
                    <td height="20" align="center" valign="bottom" class="main">连 
                      拍</td>
                    <td align="left" valign="bottom"><input name="lp" type="text" id="lp"></td>
                  </tr>
                  <tr> 
                    <td height="20" align="center" valign="bottom" class="main">遥 
                      控</td>
                    <td align="left" valign="bottom"><input name="yk" type="text" id="yk"></td>
                  </tr>
                  <tr> 
                    <td height="20" align="center" valign="bottom" class="main">三脚架使用</td>
                    <td align="left" valign="bottom"><input name="sjj" type="text" id="sjj"></td>
                  </tr>
                  <tr> 
                    <td height="20" align="center" valign="bottom" class="main">自 
                      拍</td>
                    <td align="left" valign="bottom"><input name="zp" type="text" id="zp"></td>
                  </tr>
                  <tr> 
                    <td height="20" align="center" valign="bottom" class="main">视频输出</td>
                    <td align="left" valign="bottom"><input name="sp" type="text" id="sp"></td>
                  </tr>
                  <tr> 
                    <td height="20" align="center" valign="bottom" class="main">存储媒介</td>
                    <td align="left" valign="bottom"><input name="cc" type="text" id="cc"></td>
                  </tr>
                  <tr> 
                    <td height="20" align="center" valign="bottom" class="main">压缩格式</td>
                    <td align="left" valign="bottom"><input name="ys" type="text" id="ys"></td>
                  </tr>
                  <tr> 
                    <td height="20" align="center" valign="bottom" class="main">画质选择</td>
                    <td align="left" valign="bottom"><input name="hz" type="text" id="hz"></td>
                  </tr>
                  <tr> 
                    <td height="20" align="center" valign="bottom" class="main">光学取景器</td>
                    <td align="left" valign="bottom"><input name="gxqj" type="text" id="gxqj"></td>
                  </tr>
                  <tr> 
                    <td height="20" align="center" valign="bottom" class="main">液晶显示屏</td>
                    <td align="left" valign="bottom"><input name="yjxs" type="text" id="yjxs"></td>
                  </tr>
                  <tr> 
                    <td height="20" align="center" valign="bottom" class="main">外部连接口</td>
                    <td align="left" valign="bottom"><input name="ljk" type="text" id="ljk"></td>
                  </tr>
                  <tr> 
                    <td height="20" align="center" valign="bottom" class="main">使用电池</td>
                    <td align="left" valign="bottom"><input name="dc" type="text" id="dc"></td>
                  </tr>
                  <tr> 
                    <td height="20" align="center" valign="bottom" class="main">重 
                      量</td>
                    <td align="left" valign="bottom"><input name="zl" type="text" id="zl"></td>
                  </tr>
                  <tr> 
                    <td height="20" align="center" valign="bottom" class="main">尺寸规格</td>
                    <td align="left" valign="bottom"><input name="gg" type="text" id="gg"></td>
                  </tr>
                  <tr> 
                    <td height="20" align="center" valign="bottom" class="main">视频输出</td>
                    <td align="left" valign="bottom"><input name="spsc" type="text" id="spsc"></td>
                  </tr>
                  <tr> 
                    <td height="20" align="center" valign="bottom" class="main">备 
                      注</td>
                    <td align="left" valign="bottom"><textarea name="bz" cols="30" rows="3" id="bz"></textarea></td>
                  </tr>
                </table>
              </div>
              <div align="right"></div></td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td> <input type="submit" name="Submit2" value="提 交"> </td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
        <p>&nbsp;  </p>
        
</form>

      <? 
	  
$pagesize = 8;  
if (isset($_GET['page']))
{
$page = intval($_GET['page'] );
  $sql="select * from ca_product where class='".$id."'  order by  id  desc limit ". ($page-1)*$pagesize .", $pagesize";
}
else
{ 
  $page = 1;
  $sql="select * from ca_product where class='".$id."' ";
} 
$result=mysql_query($sql,$db) or die("Query failed : " . mysql_error());
$rs = mysql_fetch_array($result);
      if (($rs==0))
      {
        echo "此类暂无产品！";
		exit;
      } 

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

 for ($ipage=1; $ipage<=$pagesize; $ipage=$ipage+1)
{
?> 
      <table width="99%" border="0" cellspacing="0" cellpadding="0" align="center">
         <tr>
          <td width="29%" height="98" bgcolor="#FFFFFF"> 
            <div align="center"><a href="full.php?id=<?       echo $rs["id"]; ?>" target="_blank"><img src="image/<?       echo $rs["pic"]; ?>" width="90" height="78" border="0"></a></div>
          </td>
          <td colspan="2" height="98" bgcolor="#FFFFFF">型号:<?       echo $rs["xingh"]; ?>,产品名:<?       echo $rs["name"]; ?></td>
          <td width="30%" height="98" bgcolor="#FFFFFF"><a href="image/upfile.php?id=<?       echo $rs["id"]; ?>&cid=<?       echo $id; ?>">上传图片</a> 
            <a href="del.php?id=<?       echo $rs["id"]; ?>&cid=<?       echo $id; ?>" onClick='javascript:return window.confirm("您确认删除吗？")'>删除</a> 
            <?       if ($rs["tj"]!="2")
      {
?> <a href="tj.php?id=<?         echo $rs["id"]; ?>&cid=<?         echo $id; ?>">精品推荐</a> 
            <?       }
        else
      {

?> <a href="deltj.php?id=<?         echo $rs["id"]; ?>&cid=<?         echo $id; ?>"> <? 

        print "取消推荐";
?> </a> <?       } ?></td>
</tr></table>
      <? 
      $rs=mysql_fetch_array($result);

      if (($rs==0))
      {
        break;
      } 
    } 
?>
 <br>
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
               <tr> 
          <td width="82%" valign="bottom"> 
            <div align="right"><span >&nbsp;&nbsp;</span><font size="2"><span > 
 <? 
 // 翻页链接
$page_string = '';
if( $page == 1 ){
   $page_string .= '第一页|上一页|';
}
else{
   $page_string .= '<a href=?page=1'.'&id='.$id.'&amount='.$amount.' class="main">第一页</a>|<a href=?page='.($page-1).'&id='.$id.'&amount='.$amount.' class="main">上一页</a>|';
}
if( ($page == $page_count) || ($page_count == 0) ){
   $page_string .= '下一页|尾页';
}
else{
   $page_string .= '<a href=?page='.($page+1).'&id='.$id.'&amount='.$amount.' class="main">下一页</a>|<a href=?page='.$page_count.'&id='.$id.'&amount='.$amount.' class="main" >尾页</a>';
}
echo $page_string;
?>
              </span></font></div>
          </td>
        </tr>
      </table> <br>    
    </td>
  </tr>
</table>

</html>

