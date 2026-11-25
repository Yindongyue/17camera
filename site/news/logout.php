<?
session_start();
 //session_unset();
// session_destroy();
?>
<? 
include '../config/path.php';
if (isset($_SESSION['qx']))
{
  $qx =$_SESSION['qx'];
}
if($qx =="5"){
   $url ="/index.php";
}elseif($qx =="4"){
  $url ="/admin/admin_index.php";
}
 header("Location: ".$url);
?>

