<?php
session_start();
session_register("loginname");

$_SESSION["loginname"]="sdfsdfsdf";
echo $_SESSION["loginname"]; 
echo "<br>";

$HTTP_SESSION_VARS["loginname"]="3333333333333333333";
echo $HTTP_SESSION_VARS["loginname"] ;
?>
