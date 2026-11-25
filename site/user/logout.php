<?
 session_start();
 session_unset();
 session_destroy();
?>
<? 
include '../config/path.php';
header("Location: ".$wwwpath3);
?>

