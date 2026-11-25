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
<table width="780" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr> 
    <td><table width="780" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="259"><img src="images/artery-4_imags/top-logo.gif" width="259" height="181"></td>
          <td width="448"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td><img src="images/artery-4_imags/top-1.gif" width="448" height="52"></td>
              </tr>
              <tr> 
                <td><img src="images/artery-4_imags/top-2.gif" width="448" height="129"></td>
              </tr>
            </table></td>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td><img src="images/artery-4_imags/top-3.gif" width="73" height="37"></td>
              </tr>
              <tr> 
                
              <td><a href="mailto:<?=$adminemail?>"><img src="images/artery-4_imags/top-4.gif" width="73" height="15" border="0"></a></td>
              </tr>
              <tr> 
                
              <td><a href="javascript:window.external.AddFavorite('<?=$siteurl?>','<?=$sitename?>')" ><img src="images/artery-4_imags/top-5.gif" width="73" height="14" border="0"></a></td>
              </tr>
              <tr> 
                
              <td><a href="faq.php"><img src="images/artery-4_imags/top-6.gif" width="73" height="14" border="0"></a></td>
              </tr>
              <tr> 
                <td><img src="images/artery-4_imags/top-7.gif" width="73" height="101"></td>
              </tr>
            </table></td>
        </tr>
      </table>
  
  </td>
  </tr>
  <tr> 
    
  <td><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
      <tr>
        <td align="center" bgcolor="#FFFFFF"><span class="bold">&raquo;</span>
<? if($discuz_user) { ?>
<span class="bold"><?=$discuz_userss?>: &nbsp;</span><a href="logging.php?action=logout">退出</a> | <a href="pm.php" target="_blank">短消息</a> | <a href="memcp.php">控制面板</a>
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
<?=$pluglink?> | <a href="faq.php">帮助</a> 
        </td>
  </tr>
</table>
    <br>
    <br>
