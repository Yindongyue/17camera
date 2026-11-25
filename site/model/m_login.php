<?
  session_start();
if (isset($_SESSION['qx']))
{
  $qx =$_SESSION['qx'];
}
if(($qx !="7") and ($qx !="4"))
{
  print "你没有权限！";
   exit();
}

?>
<html>
<head>
<title>MODEL管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="pipi.css" type="text/css">
</head>
<body bgcolor="#FFFFFF" text="#000000">
<form name="form1" method="post" action="check.php">
  <table width="400" border="1" align="center" height="200">
    <tr> 
      <td bgcolor="#99CC00" height="100"> 
        <div align="center"> 
          <p><br>
            <br>
            用户: 
            <input type="text" name="admin" size="10">
            <br>
            <br>
            密码: 
            <input type="password" name="password" size="10">
          </p>
          <p> 　　 
            <input type="submit" name="Submit" value="用户登陆">
          </p>
        </div>
      </td>
    </tr>
  </table>
</form>
</body>
</html>


