<? include '../conn.php'; ?>
<? 
if (isset($HTTP_POST_VARS["b_id"]))
{
  $Command1__delbig=$HTTP_POST_VARS["b_id"];
} 
?>
<? 
$Command1_CommandText="DELETE FROM big  WHERE b_id = '".str_replace("'","''",$Command1__delbig)."'";
$result = mysql_query($Command1_CommandText,$db) or die("Delete failed : " . mysql_error());
?>
<? 
$Command3_CommandText="DELETE FROM news  WHERE b_id = '".str_replace("'","''",$Command1__delbig)."'";
$result = mysql_query($Command3_CommandText,$db) or die("Delete failed : " . mysql_error());
?>
<html>
<head>
<title>新闻中心</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="refresh" content="1;URL=m_big.php">
<link rel="stylesheet" href="pipi.css" type="text/css">
</head>

<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<p>&nbsp;</p>
<table width="400" border="1" align="center" height="200"> 
  <tr> 
    <td bgcolor="#99CC00"> 
      <div align="center">正在处理数据请稍后......</div>
    </td>
  </tr>
</table>
</body>
</html>

