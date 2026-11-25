<?
session_start();
include '../config/geturl.php';
include '../conn.php';
include '../config/path.php';
if (isset($_SESSION['qx'])){
  $qx =$_SESSION['qx'];
}
if ($qx !="4"){
  print "你没有权限！";
  exit();
} 
$pagesize = 24;
if(isset($_POST["users"])){
$users=trim($_POST["users"]);
}else{
$users=trim($_GET["users"]);
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title></title>
</head>
<div align="center">
  <p>相册推荐－－－封面图 </p>
  <p>&nbsp;</p>
</div>
<table width="506" border="0" align="center">
  <tr>
    <td width="500">
	<form name="form1" enctype="multipart/form-data" method="post" action="xc_tj.php">
        <p> 相册作者： 
          <input name="users" type="text" id="users" value="<? echo $users; ?>">
          <input type="submit" name="Submit" value="确定">
        </p>
      </form></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<p><table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	  <td height="10"></td>
	</tr>
  </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	 <?   
		$sql="select tj_pic,username,dat from users where xc_tj='1' order by tj_dat desc limit 0,1";
		$result_tj = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
		$rs_tj = mysql_fetch_array($result_tj); 
	?>
	 <td align="center" valign="top"><img src="/pic/<?   echo $rs_tj["tj_pic"]; ?>" width="200"  border="0"></td>
	</tr>
  </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	  <td height="5"></td>
	</tr>
  </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr> 
	  <td height="18" align="center" valign="bottom" class="main">当前推荐相册封面图片	</td>
	</tr>
  </table>&nbsp;</p>
<table width="95%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><? 
		if(isset($_GET['page'])){
		  $page = $_GET['page'];
		  $sql="select names,leib,pid,dj,pic,users,jhhao from photo where users='".$users."' order by pid desc limit ". ($page-1)*$pagesize .", $pagesize";
		}else{
		  $page = 1;
		  $sql="select names,leib,pid,dj,pic,users,jhhao from photo where users='".$users."' order by pid desc";
		}
		$result = mysql_query($sql,$db);
		$rs = mysql_fetch_array($result);
		if (isset($_GET['amount'])){
		  $amount = intval($_GET['amount'] );
		}else if  (isset($_POST['amount'])) {
		   $amount = intval($_POST['amount'] );
		}else {
		   $amount = mysql_num_rows($result);
		}
		if( $amount ){
		   if( $amount < $pagesize ){ $page_count = 1; }               //如果总数据量小于$PageSize，那么只有一页
		   if( $amount % $pagesize ){                                  //取总数据量除以每页数的余数
			   $page_count = (int)($amount / $pagesize) + 1;           //如果有余数，则页数等于总数据量除以每页数的结果取整再加一
		   }else{
			   $page_count = $amount / $pagesize;                      //如果没有余数，则页数等于总数据量除以每页数的结果
		   }
		}else{
		   $page_count = 0;
		}
		if ($page<1) $page=1;
		if ($rs==0) print "还没有作品";
		for ($ipage=1; $ipage<=$pagesize; $ipage=$ipage+1)
		{
		?>
      <table width="100%" border="0">
        <tr>
			<? 
			$k=1;
			for ($k=1; $k<=6; $k=$k+1){
			  if (!($rs==0)){       
				$a="<table><tr align='center' valign='top'><td width='25%'><table width='130' border='1' cellpadding='0' cellspacing='0' bordercolor='#CCCCCC' style='border-collapse: collapse'><tr><td height='110' align='center' valign='middle'><a href='xc_tj_show.php?pid=".$rs["pid"]."&pic=".$rs['pic']."&jhhao=".$rs['jhhao']."&users=".$users."&names=".$rs['names']."'><img src='".$url_path.$rs['jhhao']."/".$rs["pic"]."' width='100' border='0'></a></td> </tr></table><table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td height='3'></td></tr></table><table width='130' border='1' cellpadding='0' cellspacing='0' bordercolor='#CCCCCC' style='border-collapse: collapse'><tr><td height='60' align='center' bgcolor='#F5F5F5' class='main'>[".$rs["names"]."]"."<br>点击：".$rs["dj"]."</td></tr></table></td></tr></table>";
			   }else{
				$a="";
			  } 
			  ?>
			  <td align="left" valign="bottom"><?  echo $a; ?></td>
			  <? 
			  if (!($rs==0)){
				$rs = mysql_fetch_array($result);
				$ipage=$ipage+1;		
			  }   
			} 
		   ?>
       </tr>
      </table>
     <? } ?>
    </td>
  </tr>
</table>
 <? if (!($rs==0)){ ?>
<table width="95%" border="0" cellspacing="0" cellpadding="0">
 <p> 
  <tr> 
	<td width="82%" height="45" valign="top"> 
	  <div align="right">&nbsp;<span class="main">&nbsp;<font size="2">共<? echo $page_count ?>页，分<? echo $pagesize ?>条显示，当前页是：<? echo $page ?>/<? echo $page_count ?>页， 
		<?  // 翻页链接
		$page_string = '';
		if( $page == 1 ){
		   $page_string .= '第一页|上一页|';
		}else{
		   $page_string .= '<a href=?page=1'.'&users='.$users.'&amount='.$amount.'#01 class="main">第一页</a>|<a href=?page='.($page-1).'&users='.$users.'&amount='.$amount.'#01 class="main">上一页</a>|';
		}
		if( ($page == $page_count) || ($page_count == 0) ){
		   $page_string .= '下一页|尾页';
		}else{
		   $page_string .= '<a href=?page='.($page+1).'&users='.$users.'&amount='.$amount.'#01 class="main">下一页</a>|<a href=?page='.$page_count.'&users='.$users.'&amount='.$amount.'#01 class="main" >尾页</a>';
		}
		echo $page_string;
		?>   
	  </font></span><font size="2"><span > 
		</span></font></div></td>
    <? //	$page+=1; ?>											
	<td width="18%" height="45" valign="top"> <div align="right"></div></td>
  </tr>
</table>
 <? }?>
</html>