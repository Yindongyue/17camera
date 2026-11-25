<?
session_start();
include '../config/geturl.php';
include '../conn.php';
include '../config/path.php';
?>
<? if (isset($_SESSION['qx'])){
  $qx =$_SESSION['qx'];
}
if ($qx !="4"){
  print "你没有权限！";
  exit();
} 
?>
<? 
$userid= intval($_GET['userid'] );
if ($userid!=""){
  $sql="select * from users where userid=".$userid;
  $result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
  $rs = mysql_fetch_array($result); 
}else{
  print "操作错误，请重试！";
  exit();
} 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>无标题文档</title>
</head>
<body>
<form name="form1" method="post" action="user_full_up.php">
  <table width="700" border="0" align="center" cellspacing="1" bgcolor="#000000">
    <tr bgcolor="#FFFFFF"> 
      <td width="65"><font size="2">会员名：</font></td>
      <td width="104"><?=$rs['username']?></td>
      <td width="77"><font size="2">密码</font></td>
      <td width="132"><font size="2"> <input name="password" type="text" id="password" value="<?=$rs["password"]?>" size="16"> </font></td>
      <td width="65"><font size="2">会员类型</font></td>
      <td width="152"><font size="2"> 
        <select name="flag" id="flag">
          <option value=<?=$rs["flag"]?>>
          <?  if ($rs["flag"]=="1") echo "普通会员";
			  if ($rs["flag"]=="2") echo "资深会员";
			  if ($rs["flag"]=="3") echo "VIP会员";
			  if ($rs["flag"]=="4") echo "管理员";
			  if ($rs["flag"]=="5") echo "新闻管理员";
			  if ($rs["flag"]=="6") echo "器材管理员";
			  if ($rs["flag"]=="7") echo "MODEL管理员"; 
	      ?></option>
          <option value="1">普通会员</option>
          <option value="2">资深会员</option>
          <option value="3">VIP会员</option>
          <option value="4">管理员</option>
		  <option value="5">新闻管理员</option>
		  <option value="6">器材管理员</option>
		  <option value="7">MODEL管理员</option>
        </select></font></td></tr>
    <tr bgcolor="#FFFFFF"> 
      <td><font size="2">性别</font></td>
      <td><select name="sex" id="sex">
          <option value=<?=$rs["sex"]?>><?=$rs["sex"]?></option>
          <option value="男">男</option>
          <option value="女">女</option>
          </select></td>
      <td><font size="2">电话</font></td>
      <td><font size="2"> <input name="tele" type="text" id="tele" value="<?=$rs["tele"]?>" size="16"></font></td>
      <td><font size="2">地址</font></td>
      <td><font size="2"> <input name="address" type="text" id="address" value="<?=$rs["address"]?>" size="30"></font></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td><font size="2">EMAIL</font></td>
      <td><font size="2"> <input name="email" type="text" id="email" value="<?=$rs["email"]?>" size="20"> </font></td>
      <td><font size="2">WEB</font></td>
      <td><font size="2"> 
        <input name="web" type="text" id="web" value="<?=$rs["web"]?>" size="20">
        </font></td>
      <td><font size="2">&nbsp;</font></td>
      <td><font size="2">&nbsp; </font></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td><font size="2">缴费日期</font></td>
      <td><font size="2"> 
        <input name="jf_dat" type="text" id="jf_dat" value="<?=$rs["jf_dat"]?>" size="10">
        </font></td>
      <td><font size="2">缴费金额</font></td>
      <td><font size="2"> 
        <input name="jf_je" type="text" id="jf_je" value="<?=$rs["jf_je"]?>" size="16">
        </font></td>
      <td><font size="2">缴费到期</font></td>
      <td><font size="2"> 
        <input name="jf_dq" type="text" id="jf_dq" value="<?=$rs["jf_dq"]?>" size="10">
        (注意格式) </font></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td><font size="2">QQ</font></td>
      <td><font size="2"> 
        <input name="qq" type="text" id="qq" value="<?=$rs["qq"]?>" size="20">
        </font></td>
      <td><font size="2">MSN</font></td>
      <td><font size="2"> 
        <input name="msn" type="text" id="msn" value="<?=$rs["msn"]?>" size="20">
        </font></td>
      <td><font size="2">&nbsp;</font></td>
      <td><font size="2">&nbsp;</font></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td><font size="2">状态</font></td>
      <td><font size="2">
	   <select name="status" id="status">
          <option value=<?=$rs["status"]?>>	<? if ($rs["status"]=="1") echo "激活"; if ($rs["status"]=="0") echo "未激活";?></option>
          <option value="1">激活</option>
          <option value="0">未激活</option>
        </select>
      </font></td>
      <td><font size="2">已使用空间</font></td>
      <td><?=$_GET["sizes"]?></td>
      <td><font size="2">&nbsp;</font></td>
      <td><font size="2">&nbsp;</font></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="确定">
        <input name="userid" type="hidden" id="userid" value="<?= $userid ?>"></td>
      <td>&nbsp;</td>
      <td><a href="user_del.php?userid=<?=$rs["userid"]?>&jhhao=<?=$rs["jhhao"]?>">删除此会员</a></td>
    </tr>
  </table>
</form>
</body>
</html>