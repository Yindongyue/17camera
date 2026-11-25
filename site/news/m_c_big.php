<?
session_start();
include '../conn.php';
$b_id=$_GET['b_id'];
if (isset($_SESSION['qx']))
{
  $qx =$_SESSION['qx'];
}
if(($qx !="5") and ($qx !="4"))
{
 // print "你没有权限！";
  // exit();
}
function MM_joinChar($firstItem)
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
<? 
$sql ="SELECT * FROM big";
$result2 = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
?>

<html>
<head>
<title>新闻中心</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="pipi.css" type="text/css">
</head>
<body bgcolor="#FFFFFF" text="#000000">
<table width="760" border="1" align="center" height="30">
  <tr>  
    <td bgcolor="#99CC00"> 
      <div align="center"><a href="m_add_d.php">添加新闻</a></div>
    </td>
    <td bgcolor="#99CC00"> 
      <div align="center"><a href="m_list.php">新闻管理</a></div>
    </td>
    <td bgcolor="#99CC00"> 
      <div align="center"><a href="m_big.php">大类管理</a></div>
    </td>
    <td bgcolor="#99CC00"> 
       <div align="center"><a href="m_user.php">用户管理</a></div>
    </td>
    <td bgcolor="#99CC00"> 
      <div align="center"><a href="m_review.php">评论管理</a></div>
    </td>
    <td bgcolor="#99CC00"> 
      <div align="center"><a href="fileup.php" target="_blank">新闻图片上传</a></div>
    </td>
    <td bgcolor="#99CC00"> 
      <div align="center"><a href="logout.php">退出管理</a></div>
    </td>
  </tr>
</table>
<form name="form" method="post" action="m_list_del.php">
  <table width="620" border="1" align="center" height="30">
    <tr> 
      <td bgcolor="#99CC00" height="30">　分类导航:  
        <? 
while ( $rs2 = mysql_fetch_array($result2)) 
{
 $i += 1;
 if ($rs2==0 && $i ==1 ) 
{
 echo "还没有分类 ";
 exit;
 }
?>   
       | <A HREF="m_c_big.php?<?   echo $MM_keepNone.MM_joinChar($MM_keepNone)."b_id=".$rs2["b_id"]; ?>"><?   echo $rs2["b_type"]; ?></A>  

 <? 
 }  
?>
      </td>
    </tr>
  </table>
<? 
$pagesize = 20;

if (isset($_GET['page']))
{
$page = intval($_GET['page'] );
$sql = "SELECT n_id, n_title, n_data, n_i FROM news where b_id = ".$b_id." ORDER BY n_data DESC limit ". ($page-1)*$pagesize .", $pagesize";
}
 else if (isset($_POST['page']))
{
 $page = intval($_POST['page'] );
$sql = "SELECT n_id, n_title, n_data, n_i FROM news  where b_id = ".$b_id."  ORDER BY n_data DESC limit ". ($page-1)*$pagesize .", $pagesize";
}
else
{ 
  $page = 1;
  $sql = "SELECT n_id, n_title, n_data, n_i FROM news  where b_id = ".$b_id."  ORDER BY n_data DESC";
} 
$result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
$rs = mysql_fetch_array($result); 

if ($rs==0 && $page == 1)
{
  print "还没有内容";
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
?>
<? 
$checknum=0;
for ($ipage=1; $ipage<=$pagesize; $ipage=$ipage+1)
{
$checknum+=1;
?>  
  <table width="620" align="center" cellpadding="0" border="0" cellspacing="0" height="20">
    <tr> 
      <td width="70" valign="top"> 
        <div align="center"> 
          <input type="checkbox" name="check<?php echo $checknum ?>" value="<?   echo $rs["n_id"] ?>">
        </div>
      </td>
      <td width="530"> 
   <?   if ($rs["n_i"]==1){
              echo"<font color='green'>[首页图片新闻]</font>";
	     } else {
			 echo "";
	     }
   ?>
   
<A HREF="m_up.php? <? echo $MM_keepNone.MM_joinChar($MM_keepNone)."n_id=".$rs["n_id"];?>"> <? echo $rs["n_title"] ?></A>

</td>
    </tr>
  </table>
 <?  
  $rs=mysql_fetch_array($result);
  if ($rs==0) break;
} 
?>	
  <table width="620" border="0" align="center">
    <tr bgcolor="#FFFFFF"> 
      <td width="93" valign="bottom"> 
        <div align="center"> 
          <input type="checkbox" name="all"  onClick="selectall(this.form);">
          全选</div>
      </td>
      <td width="389"> 
        <input type="submit" name="Submit" value="删除新闻">
		
<SCRIPT LANGUAGE="JavaScript">
function selectall(form){
if(form.all.checked){
<?   for($i=1;$i<=$checknum;$i++){     ?>

form.check<?php echo $i ?>.checked=true;
<?php }?>
}
else{
<?   for($i=1;$i<=$checknum;$i++){     ?>
form.check<?php echo $i ?>.checked=false;
<?php }?>
}
}
</script>
      </td>
      <td width="104"> 
        <div align="center"> </div>
      </td>
    </tr>
  </table>
  <table width="620" border="1" align="center" height="25">
    <tr> 
      <td bgcolor="#99CC00"> 
 <div align="right">&nbsp;<span class="main">&nbsp;<font size="2">共<? echo $page_count ?>页，分<? echo $pagesize ?>条显示，当前页是：<? echo $page ?>/<? echo $page_count ?>页&nbsp; &nbsp;&nbsp;
<?                                           
	// 翻页链接
$page_string = '';
if( $page == 1 ){
   $page_string .= '第一页|上一页|';
}
else{
   $page_string .= '<a href=?page=1'.'&b_id='.$b_id.'&amount='.$amount.' class="main">第一页</a>|<a href=?page='.($page-1).'&b_id='.$b_id.'&amount='.$amount.' class="main">上一页</a>|';
}
if( ($page == $page_count) || ($page_count == 0) ){
   $page_string .= '下一页|尾页';
}
else{
   $page_string .= '<a href=?page='.($page+1).'&b_id='.$b_id.'&amount='.$amount.' class="main">下一页</a>|<a href=?page='.$page_count.'&b_id='.$b_id.'&amount='.$amount.' class="main" >尾页</a>';
}
echo $page_string;
?>   &nbsp;&nbsp;
   </font> <span > 
            </span></div>				
     </td>
    </tr>
  </table>
</form>
</body>
</html>