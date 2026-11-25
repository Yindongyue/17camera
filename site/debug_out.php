<?php
session_start();
session_register("loginname");

echo $_SESSION["loginname"];
echo "<br>";
echo $HTTP_SESSION_VARS["loginname"];
?>
