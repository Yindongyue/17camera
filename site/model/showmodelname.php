<? 
include '../conn.php';
include '../config/path.php';
$sql="select * from model order by dat desc";
$result = mysql_query($sql,$db) or die("Query failed : " . mysql_error());
$rs= mysql_fetch_array($result);
?>
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>17camera.com?</title>
<link href="../images/main.css" rel="stylesheet" type="text/css">
</head>
<table width="50%" border="0" align="center"style="font-size:12px">
  <tr align="center">
    <td height="39" colspan="2"><strong>MODEL管理</strong></td>
  </tr>
  <tr align="center">
    <td width="50%" height="36">&nbsp;</td>
    <td >&nbsp;</td>
  </tr>
</table>

<table width="75%" border="1" align="center" cellspacing="0" bordercolor="#CCCCCC"style="font-size:13px">
  <tr>
    <td width="25%"><strong>当前推荐MODEL</strong></td>
    <td width="25%"> 
	  <span class="style1">
	  <?php 
	    $sql="select name from model order by tj_dat desc limit 0,1";
		$result_tj = mysql_query($sql,$db) or die("Query failed : " . mysql_error());
		$rs_tj= mysql_fetch_array($result_tj);
		echo $rs_tj['name'];
	?>
    </span></td>  
	<td width="25%"><a href="zhuce.php">添加新MODEL信息</a></td>
	<td width="25%"><a href="addnewphoto.php">上传MODEL图片</a></td>
  </tr>
</table>
<p>&nbsp;</p>

<? while(!($rs==0))
{
?>                             <table width="75%"   align="center">
								  <tr>
									 <td>
									  <?php 
										  if (!($rs==0))
										  {
											$sql="select * from mmphoto where name='".$rs["name"]."' limit 0,1";
											$result2 = mysql_query($sql,$db) or die("Query failed : " . mysql_error());
											$rs2 = mysql_fetch_array($result2);    
											$jh=$rs2["jhhao"];
											$a="<table border='0' cellspacing='0' cellpadding='0'><tr align='center' valign='top'><td ><table  border='1' cellpadding='0' cellspacing='0' bordercolor='#CCCCCC' style='border-collapse: collapse'><tr><td align='center' valign='middle'><a href='model.php?name=".$rs["name"]."' target='_blank''><img src='".$url_path.$jh."/".$rs2["pic"]."' width='120'  border='0'></a></td> </tr></table></td></tr></table>";       
										   }
											else
										  {
											$a="";
										   } 
										   echo $a;
									  ?>
									</td>
									<td>
									<table  border="1" cellspacing="0" bordercolor="#CCCCCC"style="font-size:13px">
                                <tr> 
                                  <td  colspan="2"><strong>MODEL名字：<?   echo $rs["name"]; ?></strong></td>
								   </tr>
                                <tr> 
                                  <td width="400">性别：<?   echo $rs["sex"]; ?></td>
                                  <td width="400">年龄：<?   echo $rs["age"]; ?></td>
                                  </tr>
                                <tr> 
                                  <td>身高：
                                  <?   echo $rs["height"]; ?></td>
                                  <td>三围：
                                  <?   echo $rs["sw"]; ?></td>
                                  </tr>
								<tr> 
                                  <td>体重：
                                  <?   echo $rs["weight"]; ?></td>
                                  <td>类型：
                                  <?   echo $rs["mtype"]; ?></td>
                                  </tr>
                                <tr> 
                                  <td><a href="model_picedit.php?urll=showmodelname.php&name=<?php echo $rs["name"]; ?>">编辑MODEL图片</a></td>
                                  <td><a href="output.php?name=<?php echo $rs["name"]; ?>">编辑MODEL资料</a></td>
                                  </tr>
								<tr> 
                                  <td><a href="model_tj.php?urll=showmodelname.php&name=<?php echo $rs["name"]; ?>">推荐</a></td>
                                  <td><a href="model_del.php?urll=showmodelname.php&name=<?php echo $rs["name"]; ?>">删除MODEL</a></td>
                                  </tr>
                            </table>
	</td>
    
  </tr>
</table>

                             
							  
                              <br>
                              <?   $rs=mysql_fetch_array($result);

} 
?>
