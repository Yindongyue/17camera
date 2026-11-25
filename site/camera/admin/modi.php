<? 
include '../../conn.php';
if (isset($_GET["id"]))
{
$id = $_GET["id"];
}
else
{
$id = $_POST["id"];
}

$sql="select * from ca_product where id=".$id;
$result=mysql_query($sql,$db) or die("Query failed : " . mysql_error());
$rs = mysql_fetch_array($result);
if (($rs==0))
{
  print "错误！";
}
  else
{
  $xingh=trim($_POST["xingh"]);
  $names=trim($_POST["name"]);
  $classs=$id;
  $fs=trim($_POST["fs"]);
  $xs=trim($_POST["xs"]);
  $ccd=trim($_POST["ccd"]);
  $zdfbl=trim($_POST["zdfbl"]);
  $qtfbl=trim($_POST["qtfbl"]);
  $iso=trim($_POST["iso"]);
  $gxbj=trim($_POST["gxbj"]);
  $smbj=trim($_POST["smbj"]);
  $zddj=trim($_POST["zddj"]);
  $sddj=trim($_POST["sddj"]);
  $djfw=trim($_POST["djfw"]);
  $wj=trim($_POST["wj"]);
  $bph=trim($_POST["bph"]);
  $km=trim($_POST["km"]);
  $gq=trim($_POST["gq"]);
  $bg=trim($_POST["bg"]);
  $sg=trim($_POST["sg"]);
  $bgbc=trim($_POST["bgbc"]);
  $cg=trim($_POST["cg"]);
  $kj=trim($_POST["kj"]);
  $lp=trim($_POST["lp"]);
  $yk=trim($_POST["yk"]);
  $sjj=trim($_POST["sjj"]);
  $zp=trim($_POST["zp"]);
  $sp=trim($_POST["sp"]);
  $cc=trim($_POST["cc"]);
  $ys=trim($_POST["ys"]);
  $hz=trim($_POST["hz"]);
  $gxqj=trim($_POST["gxqj"]);
  $yjxs=trim($_POST["yjxs"]);
  $ljk=trim($_POST["ljk"]);
  $dc=trim($_POST["dc"]);
  $zl=trim($_POST["zl"]);
  $gg=trim($_POST["gg"]);
  $spsc=trim($_POST["spsc"]);
  $bz=trim($_POST["bz"]);
  $pic=trim($_POST["pic"]);
  $bpic=trim($_POST["bpic"]);
   $sql="update ca_product set xingh='".$xingh."',name='".$names."',class='".$classs."',fs='".$fs."',ccd='".$ccd."',zdfbl='".$zdfbl."',qtfbl='".$qtfbl."',iso='".$iso."',gxbj='".$gxbj."',smbj='".$smbj."',zddj='".$zddj."',sddj='".$sddj."',djfw='".$djfw."',wj='".$wj."',bph='".$bph."',km='".$km."',gq='".$gq."',bg='".$bg."',sg='".$sg."',bgbc='".$bgbc."',cg='".$cg."',kj='".$kj."',lp='".$lp."',yk='".$yk."',sjj='".$sjj."',zp='".$zp."',sp='".$sp."',cc='".$cc."',ys='".$ys."',hz='".$hz."',gxqj='".$gxqj."',yjxs='".$yjxs."',ljk='".$ljk."',dc='".$dc."',zl='".$zl."',gg='".$gg."',spsc='".$spsc."',bz='".$bz
     ."' where id=".$id;
  $result=mysql_query($sql,$db) or die("Update failed : " . mysql_error());

  ?>
  <meta http-equiv="refresh" content="1;URL=full.php?id=<? echo $id; ?>">

<a href="javascript:window.close()"><font color="#993300" >关 
                  闭 窗 口</font></a>
<? 
} 

?>
