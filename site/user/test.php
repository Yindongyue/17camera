<?php 
include "../funlib/class.smtp.php";
include "../funlib/example.php";
$message ="textsdsd";
$to ="zhangyu@beelink.com";
$subject = "testdsdsd";
 $aaa = sendmail($message,"zhangyu@beelink.com",$subject);	
 echo $aaa;

?>