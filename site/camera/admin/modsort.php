<? 
include '../../conn.php';
if (isset($_GET["id"]))
{
$id = $_GET["id"];
}
else
{
$id = $_POST["id"];
}

if (isset($_GET["sort2"]))
{
$sort2 = $_GET["sort2"];
}
else
{
$sort2 = $_POST["sort2"];
}

?>
<html>
<head>
<title>修改分类</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body bgcolor="#FFFFFF" text="#000000">
<? 
$sql="select * from ca_sorts where sortid=".$id;
$result=mysql_query($sql,$db) or die("Query failed : " . mysql_error());
$rs = mysql_fetch_array($result);
if ($sort2!="")
{
   $sql="update ca_sorts set sort='".$sort2."' where sortid=".$id;
    $result=mysql_query($sql,$db) or die("Query failed : " . mysql_error());
    $rs = mysql_affected_rows();
	if($rs!=0)
	{
    print "<font size='2'>修改成功!<a href='javascript:window.close()'>关闭窗口</a></font> ";
    exit();
    }
} 

?>
<form name="form1" method="post" action="modsort.php?id=<? echo $id; ?>">
  <font size="2">原分类:</font> 
  <input type="text" name="textfield" value="<? echo $rs["sort"]; ?>"><br>
  <font size="2">修改成: </font>
<input type="text" name="sort2">
  <br>
  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
  <input type="submit" name="Submit" value="提交">
</form>
</body>
</html>

