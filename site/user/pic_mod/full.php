<?
  session_start();
  session_register("jh_session");
?>
<? $@LANGUAGE="VBSCRIPT"$CODEPAGE="CP_ACP"; ?>
<!--#include file="../../conn.php"-->
<!--#include file="../../config/path.php"-->
<? 
$pid=trim(${"pid"});
// $rs is of type "adodb.recordset"

$sql="select * from photo where pid=".$pid."";
mysql_query($rs_CommandText,$rs_ActiveConnection);$conn
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>无标题文档</title>
</head>

<body>
<table width="770" border="0">
  <tr>
    <td><img src=<? echo $url_path; ?><? echo $jh_session; ?>/<? echo $rs["pic"]; ?>></td>
  </tr>
</table>
<table width="770" border="0" cellpadding="1" cellspacing="1" bgcolor="#000000">
  <tr bgcolor="#FFFFFF"> 
    <td width="77" height="22">图片名：</td>
    <td width="114"><? echo $rs["names"]; ?></td>
    <td width="94">大小</td>
    <td width="90"><? echo intval($rs["sizes"]/1024); ?>k</td>
    <td width="90">上传时间</td>
    <td colspan="3"><? echo $rs["dat"]; ?></td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td height="22">使用相机</td>
    <td><? echo $rs["xiangj"]; ?></td>
    <td>型号</td>
    <td><? echo $rs["xingh"]; ?></td>
    <td>使用镜头</td>
    <td width="90"><? echo $rs["jingt"]; ?></td>
    <td width="90">使用胶片</td>
    <td width="91"><? echo $rs["jiaop"]; ?></td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td height="22">使用光圈</td>
    <td><? echo $rs["guangq"]; ?></td>
    <td>曝光时间</td>
    <td><? echo $rs["baog"]; ?></td>
    <td>作品类别</td>
	<? 
if ($rs["leib"]="1"$then$b="人像类";
$if$rs["leib"]="2"$then$b="风景类";
$if$rs["leib"]="3"$then$b="生态类";
$if$rs["leib"]="4"$then$b="纪实类";
$if$rs["leib"]="5"$then$b="生活类";
$if$rs["leib"]="6"$then$b="旅游类";
$if$rs["leib"]="7"$then$b="微距类";
$if$rs["leib"]="8"$then$b="人文类";
$if$rs["leib"]="9"$then$b="建筑类";
$if$rs["leib"]="10"$then$b="静物类";
$if$rs["leib"]="11"$then$b="夜景类";
$if$rs["leib"]="12"$then$b="人体类";
)
{

  $td><$%=$b; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?   
  $conn.$close; ?>} 

