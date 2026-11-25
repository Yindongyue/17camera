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
	 // print "你没有权限！";
	  //exit();
	} 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>无标题文档</title>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
</head>
<body>
<table width="500" border="0">
  <tr>
    <td><form name="form1" method="GET" action="admin_pic.php">
	    图片搜索：
     	    <select name="option">
              <option value="users">作者</option>
              <option value="names">作品名称</option>
			  <option value="pid">图片组号</option>
	        </select> 
            <input name="texts" type="text" id="names">        
            <input type="submit" name="Submit" value="查找">    
        </form>
	</td>
  </tr>
</table>
<p>&nbsp;</p>
<form name="form" method="post" action="pic_edit.php?f=all">
  <table width="718" border="0" align="center" cellspacing="1" bgcolor="#000000">
    <tr bgcolor="#FFFFFF">
      <td width="120"><div align="center"><font size="3">图片</font></div></td>
      <td width="71"><div align="center"><font size="3">组号</font></div></td>
      <td width="135"><div align="center"><font size="3">名称</font></div></td>
      <td width="110"><div align="center"><font size="3">作者</font></div></td>
      <td width="92"><div align="center"><font size="3">推荐</font></div></td>
      <td width="112"><div align="center"><font size="3">删除组图</font></div></td>
      <td width="56"><div align="center"><font size="3">详细</font></div></td>
    </tr>
    <?
		if (isset($_POST["option"])){
			  $option =trim($_POST["option"]);
		}else if(isset($_GET["option"]))	{
			  $option =trim($_GET["option"]);
		} 
		if (isset($_POST["texts"])){
			  $texts =trim($_POST["texts"]);
		}else if(isset($_GET["texts"]))	{
			  $texts =trim($_GET["texts"]);
		} 
		if (isset($_GET['page'])){
		  $page = intval($_GET['page'] );
		}else if (isset($_POST['page']))		{
		 $page = intval($_POST['page'] );	
		}
		$pagesize = 10;
		if ($page!=0){
		  if ($texts !=""){
			 $sql="select * from photo where ". $option."='".$texts."' order by  pid  desc limit ". ($page-1)*$pagesize .", $pagesize";
		   }else{
			$sql="select * from photo order by  pid  desc limit ". ($page-1)*$pagesize .", $pagesize";
		   } 
		}else{ 
		  $page = 1;
		   if ($texts !=""){
			 $sql="select * from photo where ". $option."='".$texts."' order  by pid desc";
			}else{
			 $sql="select * from photo order by pid desc";
			}
		} 
		$result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
		$rs = mysql_fetch_array($result); 		
		if (isset($_GET['amount'])) {
		  $amount = intval($_GET['amount'] );
		  }else if  (isset($_POST['amount'])){
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
		if ($page<1)  $page=1;		
	  for ($ipage=1; $ipage<=$pagesize; $ipage=$ipage+1)
		{
	  ?>
    <tr bgcolor="#FFFFFF">
      <td ><div  align="center"><font size="3"><img width="150"  src="<? echo $url_path.$rs["jhhao"]."/".$rs["pic"]; ?>"></font></div></td>
      <td><div align="center"><font size="3"><? echo $rs["pid"]; ?></font></div></td>
      <td><div align="center"><font size="3"><? echo $rs["names"];?></font></div></td>
      <td><div align="center"><font size="3"><? echo $rs["users"]; ?></font></div></td>
      <td><div align="center"><font size="3">
          <input name="checkbox1<?  echo $ipage; ?>" type="checkbox"  id="checkbox1<?  echo $ipage; ?>" <? echo ($rs["tj"] ? "checked":"") ?> value="<?  echo $rs["pid"]; ?>" >
          <input type="hidden" name="hiddenField<?  echo $ipage;?>"  id="hiddenField<?  echo $ipage;?>" value="<?  echo $rs["pid"]; ?>"> </font></div></td>
      <td><div align="center"><font size="3"><input name="checkbox2<?  echo $ipage; ?>" type="checkbox" id="checkbox2<?  echo $ipage; ?>" value="<?  echo $rs["pid"]; ?>"></font></div>
          <input type="hidden" name="hiddenField2<?  echo $ipage;?>"  id="hiddenField2<?  echo $ipage;?>" value="<?  echo $rs["jhhao"]; ?>">
			  <input type="hidden" name="hiddenField3<?  echo $ipage;?>"  id="hiddenField3<?  echo $ipage;?>" value="<?  echo $rs["pic"]; ?>"></td>
		  <?php 
		  $sql="select pid from photozt where pid = '".$rs["pid"]."'";
		  $result_zt = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
		  $rs_zt = mysql_fetch_array($result_zt); 
		  if(mysql_affected_rows()==0){
			  $particulars="<td> <div align='center'><font size='2'>详细</font></div></td>";
		  }else{
			 $particulars= " <td> <div align='center'><font size='2'><a href='pic_particular.php?pid=". $rs['pid'] ."&jhhao=".$rs['jhhao']."&names=".$rs['names']."&users=". $rs['users']."' target='_blank'>详细</a></font></div></td>";
		  }
		  echo $particulars;
		  ?>
    </tr>
    <? 
		 $rs = mysql_fetch_array($result);
		 if($rs == 0)break;
	 } 
	?>
  </table>
  <table width="95%" border="0" cellspacing="0" cellpadding="0">
    <p> 
    <tr> 
      <td width="82%" height="45" valign="top"> 
       <div align="right">&nbsp;<span class="main">&nbsp;<font size="3">共<? echo $page_count ?>页，分<? echo $pagesize ?>条显示，当前页是：<? echo $page ?>/<? echo $page_count ?>页， 
			<?  // 翻页链接
			$page_string = '';
			if( $page == 1 ){
			   $page_string .= '第一页|上一页|';
			}else{
			   $page_string .= '<a href=?page=1'.'&option='.$option.'&texts='.$texts.'&amount='.$amount.' class="main">第一页</a>|<a href=?page='.($page-1).'&option='.$option.'&texts='.$texts.'&amount='.$amount.' class="main">上一页</a>|';
			}
			if( ($page == $page_count) || ($page_count == 0) ){
			   $page_string .= '下一页|尾页';
			}else{
			   $page_string .= '<a href=?page='.($page+1).'&option='.$option.'&texts='.$texts.'&amount='.$amount.' class="main">下一页</a>|<a href=?page='.$page_count.'&option='.$option.'&texts='.$texts.'&amount='.$amount.' class="main" >尾页</a>';
			}
			echo $page_string;
			?>   
			 </font></span><font size="3"><span ></span></font></div></td>
        <td width="18%" height="45" valign="top">         
      </td>
    </tr>
  </table>
  <table width="718" border="0">
    <tr>
      <td width="712"> <div align="right">
          <input type="submit" name="Submit2" value="确定">
        </div></td>
    </tr>
  </table>
</form>
</body>
</html>

