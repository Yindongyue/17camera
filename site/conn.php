<?php
$db = mysql_connect('127.0.0.1:3307','17pub','17171717');
//if(!$db) echo "fail";
//else echo "success";
mysql_select_db("17pub",$db) or die("Could not select database");
mysql_query("SET NAMES utf8mb4",$db);
?>