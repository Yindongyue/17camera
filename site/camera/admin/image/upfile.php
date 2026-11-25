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
 alert("您忘了选择第1张上传图片!");
   return false; 
  } 
 if(document.upload_file2.value == "") 
  {	
 alert("您忘了选择第2张上传图片!");
   return false; 
  }  		
}
</SCRIPT>

<body bgcolor="#FFFFFF">
<form name="form" method="post" onSubmit="return formCheck(this)" action="upfile2.php?id=<? echo $id; ?>&cid=<? echo $cid; ?>" enctype="multipart/form-data">
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
        <div align="center" class="unnamed2"><span class="aa">缩略图：</span>
          <input type="file" name="upload_file1" class="HIGHTABLE" size="50">
          <span class="aa"> (宽&lt;211,高=120)</span><br>
          <br>
          <span class="aa">放大图：</span> 
          <input type="file" name="upload_file2" class="HIGHTABLE" size="50">
          <span class="aa">(宽*高=500*481)</span></div>
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

