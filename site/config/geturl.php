<?
  session_start();
if( !(isset($_SESSION['loginname']) && $_SESSION['password2']))
{

  $url= $_SERVER['SCRIPT_NAME'] ;
  header("Location: "."../user/denglu.php?urll=".$url);
} 
?>
