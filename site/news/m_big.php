<?
  session_start();
include '../conn.php';
include 'code.php';
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
if(isset($_POST[b_type]))
{
$b_type = $_POST[b_type];
$sql = "insert into big (b_type) values ('".$b_type."')";
$result = mysql_query($sql,$db) or die("Query failed : " . mysql_error());
$rs  = mysql_affected_rows();
  if($rs==1) 
  {
  ?>
<SCRIPT LANGUAGE="JavaScript">
alert("添加大类<?php echo "“".$b_type."”"?>成功"); 
</SCRIPT>
<?
   }
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
<br>
<table width="400" border="1" align="center" height="40">
  <tr>
    <td bgcolor="#99CC00">
      <div align="center">管理大类</div>
    </td>
  </tr>
</table>
<table width="400" align="center" height="200" border="0">
  <tr> 
    <td height="40" width="82">&nbsp;</td>
    <form name="form2" method="POST" action="">
      <td height="40" width="308"> 
        <input type="text" name="b_type" size="15">
        <input type="submit" name="Submit2" value="添加大类">
        <input type="hidden" name="MM_insert" value="true">
      </td>
    </form>
  </tr>
  <tr> 
    <td height="80" width="82">&nbsp;</td>
    <form name="form1" method="POST" action="m_big_del.php">
      <td height="80" width="308"> 删除大类以后所有相关小类和文章都将删除<br>
        <br>
        <select name="b_id">
          <? 
$sql ="SELECT * FROM big";
$result2 = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
while ( $rsb = mysql_fetch_array($result2)) 
{
?>
          <option value="<?   echo trim($rsb["b_id"]); ?>" >
          <?   echo trim($rsb["b_type"]); ?>
          </option>
          <? 
} 
?>
        </select>
        <input type="submit" name="Submit" value="删除大类">
      </td>
    </form>
  </tr>
  <tr> 
    <td height="60" width="82">&nbsp;</td>
    <form name="form3" method="POST" action="m_big_up.php">
      <td height="60" width="308"> 
<select name="big">
          <? 
$result2 = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
while ( $rsb = mysql_fetch_array($result2)) 
{
?>
          <option value="<?   echo trim($rsb["b_id"]); ?>" >
          <?   echo trim($rsb["b_type"]); ?>
          </option>
          <? 
} 
?>
        </select>        
<input type="text" size="15" name="uptype">
        <input type="submit" name="Submit3" value="修改大类">
</td>
    </form>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<? 

?>

