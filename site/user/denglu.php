<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>无标题文档</title>
</head>

<body>
<div align="center">你还未登陆 ，请登陆。</div>
<form name="form1" method="post" action="check.php">
  <table width="300" border="0" align="center">
    <tr>
      <td width="101">用户</td>
      <td width="189"><input name="names" type="text" id="names"></td>
    </tr>
    <tr>
      <td>密码</td>
      <td><input name="pass" type="password" id="pass"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="登陆">
        <input name="urll" type="hidden" id="urll" value="<? echo trim($_GET['urll']); ?>"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
