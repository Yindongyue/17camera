<?
session_start();
	session_register("mail_id");
	session_register("session_message");
	session_register("session_title");
	session_destroy();
?>
<html>
<head>
<meta http-equiv="Content-Language" content="zh-cn">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>邮件群发器(design by dcross)</title>
<style>A {
FONT-SIZE: 12px; COLOR: #000000; TEXT-DECORATION: none
}
A:hover {
	COLOR: #ffcc00
}
A.blue {
	COLOR: darkblue
}
body, p, td {
	FONT-SIZE: 12px
}
input {
	BACKGROUND-COLOR: white; BORDER-BOTTOM: #000000 1px solid; BORDER-LEFT: #000000 1px solid; BORDER-RIGHT: #000000 1px solid; BORDER-TOP: #000000 1px solid; FONT-SIZE: 9pt; 
}
textarea {
	BACKGROUND-COLOR: white; BORDER-BOTTOM: #000000 1px solid; BORDER-LEFT: #000000 1px solid; BORDER-RIGHT: #000000 1px solid; BORDER-TOP: #000000 1px solid; FONT-SIZE: 9pt; 
}	
</style>
</head>

<body style="BORDER-RIGHT: #cccccc 1px solid; BORDER-TOP: #000000 1px solid; MARGIN: 0pt; OVERFLOW: hidden; BORDER-LEFT: #cccccc 1px solid; BORDER-BOTTOM: #cccccc 1px solid" bgColor="#009ace" leftMargin="0" topMargin="10">
<br>
<br>
<br>
<br>
<br>
<table width="70%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000" style="border-collapse: collapse; border-style: dotted; border-width: 1">
  <tr> 
    <td height="20" bgcolor="#000000"> 
      <div align="center"><font color="#FFFFFF">邮件群发器（每5秒发送一封）</font></div></td>
  </tr>
  <tr> 
    <td bgcolor="#ffad00"> 
      <form action="send.php" method="post" enctype="multipart/form-data" name="form1">
        <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#FFAD00">
          <tr> 
            <td width="18%"><div align="right">标题：</div></td>
            <td width="82%"><input name="title" type="text" size="50"></td>
          </tr>
          <tr> 
            <td><div align="right">内容：</div></td>
            <td><textarea name="content" cols="70" rows="12"></textarea></td>
          </tr>
          <tr> 
            <td><div align="right">邮件地址文件：</div></td>
            <td><input name="file" type="file" size="50">
              　<a href="getemail.php" target="_blank">取得地址文件</a></td>
          </tr>
          <tr> 
            <td colspan="2"><div align="center"> 
                <input type="submit" name="Submit" value="提交" onMouseOver ="this.style.backgroundColor='#FFC864'" onMouseOut ="this.style.backgroundColor='#f3f3f3'" style="cursor:hand;">
                　 
                <input type="reset" name="Submit2" value="重置" onMouseOver ="this.style.backgroundColor='#FFC864'" onMouseOut ="this.style.backgroundColor='#f3f3f3'" style="cursor:hand;">
              </div></td>
          </tr>
        </table>
      </form></td>
  </tr>
</table>
<?
include "foot.php";
?>
