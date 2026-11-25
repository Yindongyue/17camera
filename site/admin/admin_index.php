<?
  session_start();
  include '../config/geturl.php';
  session_register("qx_session");
?>
<? 
if (isset($_SESSION['qx']))
{
  $qx =$_SESSION['qx'];
}
if ($qx !="4")
{

  print "你没有权限！";
   exit();

} ?><table width="882" border="0">
  <tr>
    <td width="118"><a href="admin_user.php">会员管理</a></td>
    <td width="128"><a href="../news/m_list.php">新闻管理</a></td>
    <td width="170"><a href="admin_pic.php">图片管理</a></td>
    <td width="205"><a href="xc_tj.php">推荐相册图上传</a></td>
    <td width="108"><a href="../camera/admin/add.php">产品管理</a></td>
    <td width="99"><a href="../model/showmodelname.php">model管理</a></td>
    <td width="24">&nbsp;</td>
  </tr>
</table>

