<? 
if (isset($_GET["cid"]))
{
$cid = $_GET["cid"];
}
else
{
$cid = $_POST["cid"];
}

if (isset($_GET["id"]))
{
$id = $_GET["id"];
}
else
{
$id = $_POST["id"];
}
?>

<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="../../css.css">
<style type="text/css">
<!--
.aa {  font-size: 9pt}
-->
</style>
</head>
<SCRIPT language=JavaScript>
function formCheck(document)
{
 if(document.upload_file1.value == "") 
  {	
 alert("您没有选择上传图片!");
   return false; 
  } 	
}
</SCRIPT>

<body bgcolor="#FFFFFF">
<form name="form" method="post" onSubmit="return formCheck(this)" action="fileup2.php?id=<? echo $id; ?>&cid=<? echo $cid; ?>" enctype="multipart/form-data">
  <table width="75%" border="0" cellspacing="1" cellpadding="0" align="center" bgcolor="#0000FF">
    <tr bgcolor="#000099"> 
      <td> 
        <div align="center"><font color="#FFFFFF"><b class="aa"> 图 片 上 传</b></font></div>
      </td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td class="unnamed2" height="30">&nbsp;</td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="30"> 
        <div align="center" class="unnamed2">
          <input type="file" name="upload_file1" class="HIGHTABLE" size="50">
          <span class="aa"> </span><br>
          <br>
          
      </td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="30"> 
        <div align="center"> 
          <input type="submit" name="Submit" value="上 传 图 片">          　　　　 
          <input type="reset" name="Submit2" value="Reset">
        </div>
      </td>
    </tr>
  </table>
</form>
</body>
</html>

