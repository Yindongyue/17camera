<?
  session_start();
  $qx=$_SESSION["qx"];
  $name=$_SESSION["name"];
  include '../conn.php';
  include '../config/path.php';
  include '../config/geturl.php';
?>
<? function SqlStr($data)
{

  $function_ret="'".str_replace("'","''",$data)."'";
  return $function_ret;
} 
if (($qx !="7") and ($qx !="4"))
{

  print "你没有权限！";
  exit();

} 

$age=$_POST["age"];
$sex=$_POST["sex"];
$sg=$_POST["height"];
$weight=$_POST["weight"];
$mtype=$_POST["mtype"];
$email=$_POST["email"];
$sw=$_POST["sw"];
$pslb=$_POST["pslb"];
$intro=$_POST["intro"];
$qq=$_POST["qq"];
$msn=$_POST["msn"];
$sql="update model set age=";
$sql=$sql.SqlStr($age).",sex=";
$sql=$sql.SqlStr($sex).",height=";
$sql=$sql.SqlStr($sg).",weight=";
$sql=$sql.SqlStr($weight).",mtype=";
$sql=$sql.SqlStr($mtype).",email=";
$sql=$sql.SqlStr($email).",sw=";
$sql=$sql.SqlStr($sw).",pslb=";
$sql=$sql.SqlStr($pslb).",intro=";
$sql=$sql.SqlStr($intro).",qq=";
$sql=$sql.SqlStr($qq).",msn=";
$sql=$sql.SqlStr($msn)."where name='".$name."';";
$result = mysql_query($sql,$db) or die("Query failed : " . mysql_error());
$rs  = mysql_affected_rows();
if($rs==1) {
?>
		<script language=javascript>
		<!--
		 location.href='showmodelname.php';
		// -->
		</script>
<?
   }else
  {
  echo "该model信息修改未成功！";
  }
?>



