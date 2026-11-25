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
<?php 
if (($_POST["admin"]!=""))
{
  $admin=$_POST["admin"];
} 
if (($_POST["password"]!=""))
{
  $password=$_POST["password"];
} 
if(isset($_POST["admin"]) &&  isset($_POST["password"]))
{
$sql = "UPDATE new_admin SET admin= '".$admin."' , password= '".$password."' WHERE a_id=1";
$result = mysql_query($sql,$db) or die("Could not update : " . mysql_error()); 
$rs  = mysql_affected_rows();
  if($rs==1) 
  {
?>
<SCRIPT LANGUAGE="JavaScript">
alert("修改成功"); 
</SCRIPT>
<?php 
   }
}
?>
<? 
$sql="SELECT * FROM new_admin";
$result = mysql_query($sql,$db) or die("select failed : " . mysql_error()); 
$rs = mysql_fetch_array($result);
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
<p>&nbsp;</p>
<form method="post" action="" name="form1">
  <table align="center" width="400">
    <tr valign="baseline"> 
      <td nowrap align="right" width="30%">管理员:</td>
      <td> 
        <input type="text" name="admin" value="<? echo $rs["admin"]; ?>" size="15">
</td>
    </tr>
    <tr valign="baseline"> 
      <td nowrap align="right" width="30%">密码:</td>
      <td> 
        <input type="text" name="password" value="<? echo $rs["password"]; ?>" size="15">
      </td>
    </tr>
    <tr valign="baseline"> 
      <td nowrap align="right" width="30%">&nbsp;</td>
      <td> 
        <input type="submit" value="修改密码">
      </td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="true">
  <input type="hidden" name="MM_recordId" value="<? echo $rs["a_id"]; ?>">
</form>
<p>&nbsp;</p>
</body>
</html>
<? 

?>

