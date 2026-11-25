<?
if($action == "")
{
?>
<html>
<head>
<meta http-equiv="Content-Language" content="zh-cn">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>邮件群发器(design by dcross)</title>
<style>A {
FONT-SIZE: 12px; COLOR: #000000; TEXT-DECORATION: none
}
A:hover {
	COLOR: #ffcc00
}
A.blue {
	COLOR: darkblue
}
body, p, td {
	FONT-SIZE: 12px
}
input {
	BACKGROUND-COLOR: white; BORDER-BOTTOM: #000000 1px solid; BORDER-LEFT: #000000 1px solid; BORDER-RIGHT: #000000 1px solid; BORDER-TOP: #000000 1px solid; FONT-SIZE: 9pt; 
}
textarea {
	BACKGROUND-COLOR: white; BORDER-BOTTOM: #000000 1px solid; BORDER-LEFT: #000000 1px solid; BORDER-RIGHT: #000000 1px solid; BORDER-TOP: #000000 1px solid; FONT-SIZE: 9pt; 
}	
</style>
</head>

<body style="BORDER-RIGHT: #cccccc 1px solid; BORDER-TOP: #000000 1px solid; MARGIN: 0pt; OVERFLOW: hidden; BORDER-LEFT: #cccccc 1px solid; BORDER-BOTTOM: #cccccc 1px solid" bgColor="#009ace" leftMargin="0" topMargin="10">
<br>
<br>
<br>
<br>
<br>
<table width="70%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000" style="border-collapse: collapse; border-style: dotted; border-width: 1">
  <tr> 
    <td height="20" bgcolor="#000000"> 
      <div align="center"><font color="#FFFFFF">邮件群发器（导出地址）</font></div></td>
  </tr>
  <tr> 
    <td bgcolor="#ffad00"> 
      <form name="form1" method="post" action="?action=output">
        <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#FFAD00">
          <tr> 
            <td width="18%"><div align="right">选择省份：</div></td>
            <td width="82%">                          <option selected></option>
              <select size="1" name="province">
                <option selected>全国</option>
                <option>黑龙江</option>
                <option>安徽</option>
                <option>北京</option>
                <option>重庆</option>
                <option>山东</option>
                <option>吉林</option>
                <option>辽宁</option>
                <option>内蒙古自治区</option>
                <option>西藏</option>
                <option>山西</option>
                <option>河北</option>
                <option>宁夏回族自治区</option>
                <option>湖南</option>
                <option>湖北</option>
                <option>浙江</option>
                <option>上海</option>
                <option>江西</option>
                <option>江苏</option>
                <option>四川</option>
                <option>海南</option>
                <option>福建</option>
                <option>陕西</option>
                <option>天津</option>
                <option>甘肃</option>
                <option>广东</option>
                <option>广西</option>
                <option>云南</option>
                <option>贵州</option>
                <option>青海</option>
                <option>新疆维吾尔自治区</option>
                <option>香港</option>
                <option>台湾</option>
                <option>澳门</option>
                <option>河南</option>
              </select></td>
          </tr>
          <tr> 
            <td colspan="2"><div align="center"><br>
                <input type="submit" name="Submit" value="导出邮件地址" onMouseOver ="this.style.backgroundColor='#FFC864'" onMouseOut ="this.style.backgroundColor='#f3f3f3'" style="cursor:hand;">
              </div></td>
          </tr>
        </table>
      </form></td>
  </tr><tr> 
    <td bgcolor="#ffad00"> 
      <form name="form2" method="post" action="?action=output2">
        <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#FFAD00">
          <tr> 
            <td width="18%"><div align="right">选择省份：</div></td>
            <td width="82%">                          <option selected></option>
              <select size="1" name="province">
                <option selected>全国</option>
                <option>黑龙江</option>
                <option>安徽</option>
                <option>北京</option>
                <option>重庆</option>
                <option>山东</option>
                <option>吉林</option>
                <option>辽宁</option>
                <option>内蒙古自治区</option>
                <option>西藏</option>
                <option>山西</option>
                <option>河北</option>
                <option>宁夏回族自治区</option>
                <option>湖南</option>
                <option>湖北</option>
                <option>浙江</option>
                <option>上海</option>
                <option>江西</option>
                <option>江苏</option>
                <option>四川</option>
                <option>海南</option>
                <option>福建</option>
                <option>陕西</option>
                <option>天津</option>
                <option>甘肃</option>
                <option>广东</option>
                <option>广西</option>
                <option>云南</option>
                <option>贵州</option>
                <option>青海</option>
                <option>新疆维吾尔自治区</option>
                <option>香港</option>
                <option>台湾</option>
                <option>澳门</option>
                <option>河南</option>
              </select></td>
          </tr>
          <tr> 
            <td colspan="2"><div align="center"><br>
                <input type="submit" name="Submit2" value="导出详细资料" onMouseOver ="this.style.backgroundColor='#FFC864'" onMouseOut ="this.style.backgroundColor='#f3f3f3'" style="cursor:hand;">
              </div></td>
          </tr>
        </table>
      </form></td>
  </tr>
</table>
<?
include "foot.php";
?>
<?
}
if($action == "output")
{
	$content = "";		//初始化内容

	$link = mssql_connect ("localhost", "sa", "");
	mssql_select_db("BBS", $link);
	if($province == "全国")
	{
		$SQL = "select * from [bbs_userinfo]";	
	}
	else
	{
		$SQL = "select * from [bbs_userinfo] where province='$province'";
	}
    $rs = mssql_query($SQL, $link);
    do {
        while ($row = mssql_fetch_row($rs)) 
		{
				$content .= $row[0].",".$row[1].",".$row[7].",".$row[5]."\n";	
        }
    } while (mssql_next_result($rs));
    mssql_free_result($rs);
    mssql_close ($link);

	$filename = $province."email"; //要保存的文件名 
	$ext = "csv";

	$mime_type='application/octetstream';
	header ('Content-Type:'.$mime_type);
	header('Content-Disposition: inline; filename="' . $filename . '.' . $ext . '"');
	header('Expires: 0');
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	header('Pragma: public');
	echo $content;
}
if($action == "output2")
{
	$content = "";		//初始化内容

	$link = mssql_connect ("localhost", "sa", "");
	mssql_select_db("BBS", $link);
	if($province == "全国")
	{
		$SQL = "select * from [bbs_userinfo]";	
	}
	else
	{
		$SQL = "select * from [bbs_userinfo] where province='$province'";
	}
    $rs = mssql_query($SQL, $link);
    do {
        while ($row = mssql_fetch_row($rs)) 
		{
				$content .= $row[0].",".$row[1].",".$row[2].",".$row[3].",".$row[4].",".$row[5].",".$row[6].",".$row[7].",".$row[8].",".$row[9].",".$row[10].",".$row[11].",".$row[12].",".$row[13].",".$row[14].",".$row[15].",".$row[16].",".$row[17].",".$row[18].",".$row[19].",".$row[20].",".$row[21].",".$row[22].",".$row[23].",".$row[24].",".$row[25].",".$row[26].",".$row[27]."\n";	
        }
    } while (mssql_next_result($rs));
    mssql_free_result($rs);
    mssql_close ($link);

	$filename = $province."完整数据"; //要保存的文件名 
	$ext = "csv";

	$mime_type='application/octetstream';
	header ('Content-Type:'.$mime_type);
	header('Content-Disposition: inline; filename="' . $filename . '.' . $ext . '"');
	header('Expires: 0');
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	header('Pragma: public');
	echo $content;
}
?>