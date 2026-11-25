<?php 
include '../conn.php';
$delnum=0;
for($i=1;$i<=20;$i++)
{
$che="check".$i;
if(isset($_POST[$che]))
{
$check = $_POST[$che];
$sql="DELETE FROM news  WHERE n_id=".$check;
$result = mysql_query($sql,$db) or die("Could not delete : " . mysql_error()); 
$delnum+=1;
}
}
?>
<html>
<head>
<title>新闻中心</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="refresh" content="1;URL=m_list.php">
<link rel="stylesheet" href="pipi.css" type="text/css">
</head>

<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<p>&nbsp;</p>
<table width="400" border="1" align="center" height="200">
  <tr> 
    <td bgcolor="#99CC00">  
      <div align="center"><?php echo "<br>";
  echo "删除了".$delnum."篇文章。";
echo "<br>"; ?></div>

    </td>
  </tr>
</table>
</body>
</html>
