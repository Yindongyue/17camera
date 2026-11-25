<? if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?=CHARSET?>">
<meta name="robots" content="index,follow">
<meta name="keywords" content="17camera!,Board,17camera Studio,PHP,MySQL,FORUM">
<meta name="generator" content="17camera!  with Templates 2.0">
<meta name="description" content="<?=$bbname?> - Powered by 17camera! Board ">
<meta name="MSSmartTagsPreventParsing" content="TRUE">
<meta http-equiv="MSThemeCompatible" content="Yes">
<?=$url_redirect?>

<title><?=$bbname?><?=$navtitle?> - powered by 17camera!</title>
<? include template('css'); ?>
<script language="JavaScript" src="include/common.js"></script>

</head>
<body leftmargin="0" rightmargin="0" topmargin="0">
<table border="0" align="center" cellpadding="0" cellspacing="12">
  <tr>
    <td><table width="780" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="D3B286">
        <tr> 
          <td width="403"><img src="images/artery-3_imags/top-1.gif" width="403" height="21"></td>
          <td><img src="images/artery-3_imags/top-2.gif" width="377" height="21"></td>
        </tr>
        <tr> 
          <td><img src="images/artery-3_imags/top-3.gif" width="403" height="120"></td>
          <td><img src="images/artery-3_imags/top-4.gif" width="377" height="120"></td>
        </tr>
        <tr> 
          <td><img src="images/artery-3_imags/top-5.gif" width="403" height="35"></td>
          <td><img src="images/artery-3_imags/top-6.gif" width="377" height="35"></td>
        </tr>
        <tr> 
          <td><img src="images/artery-3_imags/top-7.gif" width="403" height="43"></td>
          <td><img src="images/artery-3_imags/top-8.gif" width="377" height="43"></td>
        </tr>
      </table>
      <table width="780" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="D3B286">
        <tr> 
          <td width="19" valign="bottom" background="images/artery-3_imags/left-bg.gif"><img src="images/artery-3_imags/left-bg_1.gif" width="19" height="19"></td>
          <td valign="top"> <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
              <tr> 
                
          <td height="100%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
                <td align="center"><span class="bold">&raquo;</span>
<? if($discuz_user) { ?>
<?=$discuz_userss?>: &nbsp;<a href="logging.php?action=logout">退出</a> | <a href="pm.php" target="_blank">短消息</a> | <a href="memcp.php">控制面板</a>
<? if(0) { ?>
| <a href="memo.php">备忘录</a>
<? } if($isadmin) { ?>
| <a href="admincp.php" target="_blank">系统设置</a>
<? } } else { ?>
<span class="bold">游客: &nbsp;</span><a href="register.php">注册</a> | <a href="logging.php?action=login">登录</a>
<? } if($memliststatus) { ?>
| <a href="member.php?action=list">会员</a>
<? } if($allowsearch) { ?>
| <a href="search.php">搜索</a>
<? } if($statstatus) { ?>
| <a href="stats.php">统计</a>
<? } ?>
<?=$pluglink?> | <a href="faq.php">帮助</a> <br><br>
                </td>
  </tr>
</table>
