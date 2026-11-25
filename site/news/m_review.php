<?
  session_start();
include '../conn.php';
if (isset($_SESSION['qx']))
{
  $qx =$_SESSION['qx'];
}
if(($qx !="5") and ($qx !="4"))
{
 // print "你没有权限！";
  // exit();
}
?>
<? 
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
<? 
$pagesize = 10;

if (isset($_GET['page']))
{
$page = intval($_GET['page'] );
$sql = "SELECT * FROM new_review  ORDER BY r_data DESC limit ". ($page-1)*$pagesize .", $pagesize";
}
 else if (isset($_POST['page']))
{
 $page = intval($_POST['page'] );
$sql = "SELECT * FROM new_review  ORDER BY r_data DESC limit ". ($page-1)*$pagesize .", $pagesize";
}
else
{ 
  $page = 1;
  $sql = "SELECT * FROM new_review  ORDER BY r_data DESC";
} 
$result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
$rs = mysql_fetch_array($result); 

if ($rs==0 && $page == 1)
{
  print "还没有没有评论";
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

   <form name="form1" method="post" action="m_r_del.php">
     <div align="center"> 
    <table width="500" border="0" cellspacing="1" cellpadding="0" align="center" bgcolor="#99CC00">
      <tr> 
        <td colspan="2" height="20"> 
          <input type="checkbox" name="check<?php echo $checknum ?>" value="<?   echo $rs["r_id"]; ?>">
          [<?   echo $rs["r_data"]; ?>]网友的评论</td>
      </tr>
      <tr bgcolor="#FFFFFF"> 
        <td height="25" width="50%">　网友名称:<font color="#663366"><?   echo $rs["r_name"]; ?></font></td>
        <td height="25">　Email:<font color="#663366"><?   echo $rs["r_email"]; ?></font></td>
      </tr>
      <tr bgcolor="#FFFFFF"> 
        <td style="word-break:break-all" colspan="2" height="30"> 
          <blockquote><font color="#663366"><br>
            <?   echo $rs["r_content"]; ?></font></blockquote>
        </td>
      </tr>
    </table>
<?  
  $rs=mysql_fetch_array($result);
  if ($rs==0) break;
} 
?>   
    <input type="submit" name="Submit" value="删除所选评论">
  </div>
</form>
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


</body>
</html>

