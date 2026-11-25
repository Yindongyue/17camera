<?
  session_start();
  include '../config/geturl.php';
  include '../conn.php';
  include '../config/path.php';

?>
<? if (isset($_SESSION['qx']))
{
  $qx =$_SESSION['qx'];
}
if ($qx !="4")
{

  print "你没有权限！";
  exit();

}?>
<? 
$id=trim($_POST["userid"]);
$password=trim($_POST["password"]);
$address=trim($_POST["address"]);
$web=trim($_POST["web"]);
$email=trim($_POST["email"]);
$sex=trim($_POST["sex"]);
$tele=trim($_POST["tele"]);
$flag=trim($_POST["flag"]);
$jf_dat=trim($_POST["jf_dat"]);
$jf_je=trim($_POST["jf_je"]);
$jf_dq=trim($_POST["jf_dq"]);
$qq=trim($_POST["qq"]);
$msn=trim($_POST["msn"]);
$status=trim($_POST["status"]);
$sql="update users set  status='".$status."',password='".$password."',address='".$address."',web='".$web."',email='".$email."',sex='".$sex."',tele='".$tele."',flag='".$flag."',jf_dat='".$jf_dat."',jf_je='".$jf_je."',jf_dq='".$jf_dq."',qq='".$qq."',msn='".$msn."' where userid=".$id;
  $result = mysql_query($sql,$db); 
  $rs = mysql_affected_rows(); 
  if(isset($rs))  echo "修改完成";
?>


