<? 
include '../../conn.php';
if (isset($_GET["cid"]))
{
$cid = $_GET["cid"];
}
else
{
$cid = $_POST["cid"];
}

if (isset($_GET["id"]))
{
$id = $_GET["id"];
}
else
{
$id = $_POST["id"];
}
$sql="update ca_product set tj='0' where id=".$id;
$result=mysql_query($sql,$db) or die("Could not delete : " . mysql_error()); 
header("Location: "."add.php?id=".$cid);
?>
