<?
include '../conn.php';

$rss__varkkk="%";
if (isset($_GET["sss"]))
{
  $rss__varkkk=$_GET["sss"];
} else{
//echo "请输入查询内容！";
//exit;
}
$rss__varxxx="n_title";
if (isset($_GET["xxx"]))
{
  $rss__varxxx=$_GET["xxx"];
} 
?>
<? 
$pagesize = 16;

if (isset($_GET['page']))
{
$page = intval($_GET['page'] );
  
$sql = "SELECT n_id, n_title, n_author, n_content,n_data  FROM news  WHERE ".str_replace("'","''",$rss__varxxx)." like '%".str_replace("'","''",$rss__varkkk)."%'  ORDER BY n_data DESC limit ". ($page-1)*$pagesize .", $pagesize";
}
 else if (isset($_POST['page']))
{
 $page = intval($_POST['page'] );
$sql = "SELECT n_id, n_title, n_author, n_content,n_data  FROM news  WHERE ".str_replace("'","''",$rss__varxxx)." like '%".str_replace("'","''",$rss__varkkk)."%'  ORDER BY n_data DESC limit ". ($page-1)*$pagesize .", $pagesize";
}
else
{ 
  $page = 1;
$sql = "SELECT n_id, n_title, n_author, n_content,n_data  FROM news  WHERE ".str_replace("'","''",$rss__varxxx)." like '%".str_replace("'","''",$rss__varkkk)."%'  ORDER BY n_data DESC";
} 
$result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
$rss = mysql_fetch_array($result); 
if ($rss==0)
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
function ShowBold($theField)
{
 $Pattern=$_GET["sss"];
  $function_ret=$objRegExp.str_replace($Pattern,"<font color=red><b>$Pattern</b></font>",$theField);
  return $function_ret;
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
<html>
<head>
<title>查询</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="pipi.css" type="text/css">
<link href="../images/main.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#ffffff" text="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<? include  "../top.php"; ?>
<table width="775" height="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666"> 
<tr> 
    <td bgcolor="#FFFFFF" valign="top"><br>
 <? if ($rss==0) 
{
?>
      <table width="90%" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr> 
          <td>没有检索到关键字是<font color="#FF0000"><?   echo $_GET["sss"]; exit;?></font>的任何信息。</td>
        </tr>
      </table>
<? 
} 
 ?>

      <table width="90%" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr> 
          <td>通过对<font color="#FF0000"> 
            <?   $name=trim($_GET["xxx"]);
  switch ($name)
  {
    case "n_title":
      echo "标题";
      break;
    case "n_author":
      echo "作者";
      break;
    case "n_content":
      echo "内容";
      break;
  } 
?>
            </font>的检索共找到关键字是<font color="#FF0000"><?   echo $_GET["sss"]; ?></font>的新闻<font color="#FF0000"><?   echo $amount; ?></font>则<br>...

           </td>
        </tr>
      </table>
	  
<?

for ($ipage=1; $ipage<=$pagesize; $ipage=$ipage+1)
{
?>   
      <table width="90%" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr> 
          <td width="3%"><img src="images/arrow.gif" width="15" height="11"></td>
          <td width="97%"><span class="big"><b><font color="#663300"><A HREF="moban.php?<?   echo $MM_keepNone.MM_joinChar($MM_keepNone)."n_id=".$rss["n_id"]; ?>" target="_blank"><?   echo ShowBold($rss["n_title"]); ?></A> 　</font></b></span><font color="#999999"><?   echo ($rss["n_data"]); ?></font></td>
        </tr>
        <tr> 
          <td colspan="2"> 
            <blockquote><font color="#000066">[作者:<?   echo $rss["n_author"]; ?>] <span class="h"> 
              <?    echo ShowBold(substr($rss["n_content"],0,150))."...";  ?>
              </span></font> </blockquote>
          </td>
        </tr>
      </table>
 <?  
  $rss=mysql_fetch_array($result);
  if ($rss==0) break;
} 
if ($page_count > 1)
{
?>		
<table width="100%"    border="0">
  <tr>
    <td>
	<div align="center">&nbsp;<span class="main">&nbsp;<font size="2">共<? echo $page_count ?>页，分<? echo $pagesize ?>条显示，当前页是：<? echo $page ?>/<? echo $page_count ?>页， 
<?                                           
	// 翻页链接
$page_string = '';
if( $page == 1 ){
   $page_string .= '第一页|上一页|';
}
else{
   $page_string .= '<a href=?page=1'.'&username='.$username.'&amount='.$amount.' class="main">第一页</a>|<a href=?page='.($page-1).'&username='.$username.'&amount='.$amount.' class="main">上一页</a>|';
}
if( ($page == $page_count) || ($page_count == 0) ){
   $page_string .= '下一页|尾页';
}
else{
   $page_string .= '<a href=?page='.($page+1).'&username='.$username.'&amount='.$amount.' class="main">下一页</a>|<a href=?page='.$page_count.'&username='.$username.'&amount='.$amount.' class="main" >尾页</a>';
}
echo $page_string;
?>   
   </font> <span > 
            </span></div>

	</td>
  </tr>
</table>
<?php 
}
?>
</body>
</html>