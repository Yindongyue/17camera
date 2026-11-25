<?
  session_start();
  include '../config/geturl.php';
  include '../conn.php';
  include '../config/path.php';
  include '../config/dirinfo.php';
?>
<? if (isset($_SESSION['qx'])){
  $qx =$_SESSION['qx'];
}
if ($qx !="4"){
  print "你没有权限！";
  exit();
} ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>无标题文档</title>
</head>
<body>
<table width="500" border="0">
  <tr>
    <td><form name="form1" method="GET" action="admin_user.php">
        用户名 
        <input name="username" type="text" id="username">
        <input type="submit" name="Submit" value="查找">
      </form></td>
  </tr>
</table>
<p>&nbsp;</p>
<form name="form2" method="post" action="user_del.php?f=all">
  <table width="770" border="0" align="center" cellspacing="1" bgcolor="#000000">
    <tr bgcolor="#FFFFFF"> 
      <td width="136"> <div align="center"><font size="2">会员名</font></div></td>
      <td width="89"> <div align="center"><font size="2">类型</font></div></td>
      <td width="127"> <div align="center"><font size="2">注册日期</font></div></td>
      <td width="102"> <div align="center"><font size="2">已使用空间(k)</font></div></td>
      <td width="46"> <div align="center"><font size="2"></font></div></td>
      <td width="124"> <div align="center"><font size="2">删除</font></div></td>
      <td width="62"> <div align="center"><font size="2">详细</font></div></td>
      <td width="50"> <div align="center"><font size="2">相册</font></div></td>
    </tr>
     <?
		if (isset($_POST["username"]))
		{
		  $username=trim($_POST["username"]);
		}
		  else if(isset($_GET["username"]))
		{
		  $username=trim($_GET["username"]);
		} 
		
		$pagesize = 50;
		
		if (isset($_GET['page'])){
		 $page = intval($_GET['page'] );
		  if ($username!=""){
			 $sql="select * from users where username='".$username."' order by  userid  desc limit ". ($page-1)*$pagesize .", $pagesize";
		   }else{
			$sql="select * from users order by  userid  desc limit ". ($page-1)*$pagesize .", $pagesize";
		   } 
		}else if (isset($_POST['page'])){
		 $page = intval($_POST['page'] );
		   if ($username!=""){ 
			 $sql="select * from users where username='".$username."' order by userid desc limit ". ($page-1)*$pagesize .", $pagesize";
		   }else{
			$sql="select * from users order by userid desc limit ". ($page-1)*$pagesize .", $pagesize";
		   } 
		}else{ 
		  $page = 1;
		  if ($username!=""){
		  $sql="select * from users where username='".$username."' order  by userid desc";
		  }else{
		   $sql="select * from users order by userid desc";
		  }
		} 
		$result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
		$rs = mysql_fetch_array($result); 
		if (isset($_GET['amount'])){
		  $amount = intval($_GET['amount'] );
		}else if  (isset($_POST['amount'])){
		  $amount = intval($_POST['amount'] );
		}else{
		  $amount = mysql_num_rows($result);
		}
		if( $amount ){
		   if( $amount < $pagesize )  $page_count = 1;                 //如果总数据量小于$PageSize，那么只有一页
		   if( $amount % $pagesize ){                                  //取总数据量除以每页数的余数
			   $page_count = (int)($amount / $pagesize) + 1;           //如果有余数，则页数等于总数据量除以每页数的结果取整再加一
		   }else{
			   $page_count = $amount / $pagesize;                      //如果没有余数，则页数等于总数据量除以每页数的结果
		   }
		}else{
		   $page_count = 0;
		}
		if ($page<1) $page=1;
		for ($ipage=1; $ipage<=$pagesize; $ipage=$ipage+1){
		?>
     <tr bgcolor="#FFFFFF"> 
      <td> <div align="center"><font size="2"><? echo $rs["username"]; ?></font></div></td>
	  <td> <div align="center"><font size="2"> 
	  <?     
		 $str="";
		 $str2="";
		 if ($rs["flag"]==1)  $str2='普通会员';
		 if ($rs["flag"]==2) {$str="<img src='/images/Icon_2.gif' alt='资深会员'>";$str2='资深会员';}
		 if ($rs["flag"]==3) {$str="<img src='/images/ioc03.gif' alt='VIP会员'>";$str2='VIP会员';}
		 if ($rs["flag"]==4) {$str="<img src='/images/Icon_4.gif' alt='管理员'>";$str2='管理员';}
		 if ($rs["flag"]==5) {$str="<img src='/images/Icon_4.gif' alt='新闻管理员'>";$str2='新闻管理员';}
		 if ($rs["flag"]==6) {$str="<img src='/images/Icon_4.gif' alt='器材管理员'>";$str2='器材管理员';}
		 if ($rs["flag"]==7) {$str="<img src='/images/Icon_4.gif' alt='MODEL管理员'>";$str2='MODEL管理员';}
		 echo $str.$str2;
      ?></font></div></td>
      <td> <div align="center"><font size="2"><?=$rs["dat"]; ?></font></div></td>
      <td> <div align="center"><font size="2">      
	  <? if ($rs["status"]!=1){
        $sizes="未激活";
		print $sizes;
		echo $rs["status"];
      }else{
      ?>
      <div align="center"><font size="2"> 
	  <?php 
		$photo_path2=$photo_path.$rs["jhhao"]."\\";
		$photo_path2;
		$dirsizes = dirsize("$photo_path2");
		$sizes = intval($dirsizes["filesize"]/1024)."K";  
		echo $sizes;
	   }
	  ?>
	  </font></div></td>        
	 <td> </td> 
      <td> <div align="center"><font size="2"> <input name="checkbox<?  echo $ipage; ?>" type="checkbox" id="checkbox<?  echo $ipage; ?>" value="<?  echo $rs["jhhao"]; ?>"></font></div></td>
      <td> <div align="center"><font size="2"><a href="user_full.php?userid=<?       echo $rs["userid"]; ?>&sizes=<?       echo $sizes; ?>" target="_blank">详细</a></font></div></td>
      <td> <div align="center"><font size="2"><a href="../photo/person.php?username=<?       echo $rs["username"]; ?>" target="_blank">相册</a></font></div></td>
    </tr>
	<? 
	  $rs = mysql_fetch_array($result);
	  if($rs == 0) break;
	 } 
	?>
</table>  
<table width="95%" border="0" cellspacing="0" cellpadding="0">
   <p> 
    <tr> 
      <td width="82%" height="45" valign="top"> 
       <div align="right">&nbsp;<span class="main">&nbsp;<font size="2">共<? echo $page_count ?>页，分<? echo $pagesize ?>条显示，当前页是：<? echo $page ?>/<? echo $page_count ?>页， 
		<? // 翻页链接
		$page_string = '';
		if( $page == 1 ){
		   $page_string .= '第一页|上一页|';
		}else{
		   $page_string .= '<a href=?page=1'.'&username='.$username.'&amount='.$amount.' class="main">第一页</a>|<a href=?page='.($page-1).'&username='.$username.'&amount='.$amount.' class="main">上一页</a>|';
		}
		if( ($page == $page_count) || ($page_count == 0) ){
		   $page_string .= '下一页|尾页';
		}else{
		   $page_string .= '<a href=?page='.($page+1).'&username='.$username.'&amount='.$amount.' class="main">下一页</a>|<a href=?page='.$page_count.'&username='.$username.'&amount='.$amount.' class="main" >尾页</a>';
		}
		echo $page_string;
		?>
		</font></span><font size="2"><span ></span></font></div></td>
      <td width="18%" height="45" valign="top"></td>
    </tr>
  </table>
  <table width="718" border="0">
    <tr>
      <td width="712"> <div align="right">
          <input type="submit" name="Submit2" value="删除">
        </div></td>
    </tr>
  </table>
</form>
</body>
</html>

