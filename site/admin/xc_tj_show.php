<?
  session_start();
  include '../config/geturl.php';
  include '../conn.php';
  include '../config/path.php';
  include '../config/dirinfo.php';
?>
<? if (isset($_SESSION['qx']))
{
  $qx =$_SESSION['qx'];
}
if ($qx !="4")
{

 // print "你没有权限！";
  //exit();

} 
if (isset($_POST["pid"]))
	{
	  $pid =trim($_POST["pid"]);
	}
else if(isset($_GET["pid"]))
	{
	  $pid =trim($_GET["pid"]);
	} 
if (isset($_POST["jhhao"]))
	{
	  $jhhao =trim($_POST["jhhao"]);
	}
else if(isset($_GET["jhhao"]))
	{
	  $jhhao =trim($_GET["jhhao"]);
	} 
if (isset($_POST["users"]))
	{
	  $users =trim($_POST["users"]);
	}
else if(isset($_GET["users"]))
	{
	  $users =trim($_GET["users"]);
	} 
if (isset($_POST["names"]))
	{
	  $names =trim($_POST["names"]);
	}
else if(isset($_GET["names"]))
	{
	  $names =trim($_GET["names"]);
	} 
$sql="select id from photozt where pid='".$pid."' order  by id ";
$result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
$result_rows = mysql_affected_rows();
if($result_rows ==0) 
{
?>
<script language=javascript>
<!--
//alert("此作品无组图！");
// window.close()
// -->
</script>

<? 
}
$sql="select pic from photo where pid='".$pid."'";
$result = mysql_query($sql,$db) or die("Could not connect : " . mysql_error()); 
$rs = mysql_fetch_array($result);
$pic=$rs['pic']; 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>无标题文档</title>
</head>

<body>
<p>&nbsp;</p>
<table align="center"  width="40%"  border="0">
  <tr>
    <td width="100"><font size="4">作品名称:</font></td>
    <td><font size="4"><? echo $names;?></font></td>
    <td width="60"><font size="4">作者:</font></td>
    <td><font size="4"><? echo $users; ?></font></td>
  </tr>
</table>
<p>&nbsp;</p>
<form name="form2" method="post"  action="pic_particular_del.php? pid=<? echo $pid; ?>">  
<table align="center" width="13%" border="1" cellpadding="0" cellspacing="4" bordercolor="#CCCCCC"style="font-size:12px">
                    <tr> 
                      <td align="center" valign="top"><p><img width="300" src="<? echo $url_path; ?><? echo $jhhao; ?>/<? echo $pic; ?>"></p>
                      <p>第1幅 || pid: <?php echo $pid ?><br>
                        <br>
                      </p></td>
					  <?php if($_SESSION["qx"] == "4") { ?>
					   <td><div align="center"><a href="xc_tj_up.php?username=<? echo $users ; ?>&pic=<? echo $pic; ?>&jhhao=<?php echo $jhhao; ?>" class="orange">推荐</a></div></td>
                      <?php } ?>
                    </tr>
  </table>
                  <br>
<?php
$sz = 2;
$sql="select pic,id from photozt where pid=".$pid;
$result4 = mysql_query($sql,$db);
//$rs_zt = mysql_fetch_array($result4);
while($rs_zt = mysql_fetch_array($result4))
{
?>
            <table align="center" width="13%" border="1" cellpadding="0" cellspacing="4" bordercolor="#CCCCCC"style="font-size:12px">
                    <tr> 
                    
                      <td align="center" valign="top"><p><img  width="300" src="<?   echo $url_path; ?><?   echo $jhhao; ?>/<?   echo $rs_zt["pic"]; ?>"></p>
                      <p>第<?   echo $sz; ?>幅  || id: <?php echo $rs_zt["id"]?><br>
                        <br>
                      </p></td>
					  <?php if(($_SESSION["qx"] == "4") || ($rs["users"] == $_SESSION['loginname'])){ ?>
					   <td><div align="center"><a href="xc_tj_up.php?username=<? echo $users ; ?>&pic=<? echo  $rs_zt["pic"]; ?>&jhhao=<?php echo $jhhao; ?>" class="orange">推荐</a></div></td>
                      <?php } ?>
                    </tr>
  </table>
                  <br>
<?   
$sz=$sz+1;
} 
?>
<input type="hidden" name="result_rows" value="<?php echo $result_rows ?>">
</form>
</body>
</html>

