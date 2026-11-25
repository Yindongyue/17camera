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

if (isset($_GET["sort"]))
{
$sort = $_GET["sort"];
}
else
{
$sort = $_POST["sort"];
}

if ($sort!="")
{
  $sql="select * from ca_sorts where sort='".$sort."'";
$result=mysql_query($sql,$db) or die("Query failed : " . mysql_error());
$rs = mysql_fetch_array($result);
  if (!($rs==0))
  {
    print " 该型号已经存在！";
    exit();
  }
    else
  {
    $sql="insert into ca_sorts (sort) values('".$sort."') ";
    $result=mysql_query($sql,$db) or die("Query failed : " . mysql_error());
	$rs=mysql_affected_rows();
	   if (!($rs==0))
	   {
       print "<font size='2'>添加成功!<a href='javascript:window.close()'>关闭窗口</a></font> ";
       exit();
	   }
  } 
} 
?>
<html>
<head>
<title>添加分类</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body bgcolor="#FFFFFF">
<form method="post" action="sort.php?id=<? echo $id; ?>">
  <input type="text" name="sort">
  <input type="submit" name="Submit" value="提交">
</form>
</body>
</html>

