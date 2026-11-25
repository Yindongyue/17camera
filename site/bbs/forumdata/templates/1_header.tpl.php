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

<table cellspacing="0" cellpadding="0" border="0" background="<?=IMGDIR?>/topbg.gif" width="100%" align="center">
<tr><td><a href="index.php"><?=BOARDLOGO?></a></td>
<td width="517" align="right" background="<?=IMGDIR?>/topbg_right.gif">&nbsp;</td></tr>
<tr><td colspan="2"><table width="100%" cellpadding="0" cellspacing="<?=TABLESPACE?>">
<tr><td class="navtd"><span class="bold">&raquo;</span>
<? if($discuz_user) { ?>
<span class="bold"><?=$discuz_userss?>: &nbsp;</span><a href="logging.php?action=logout"><font class="navtd">退出</font></a> 
| <a href="pm.php" target="_blank"><font class="navtd">短消息</font></a> 
| <a href="memcp.php"><font class="navtd">控制面板</font></a>
<? if(0) { ?>
| <a href="memo.php"><font class="navtd">备忘录</font></a>
<? } if($isadmin) { ?>
| <a href="admincp.php" target="_blank"><font class="navtd">系统设置</font></a>
<? } } else { ?>
<span class="bold">游客: &nbsp;</span><a href="register.php"><font class="navtd">注册</font></a> 
| <a href="logging.php?action=login"><font class="navtd">登录</font></a>
<? } if($memliststatus) { ?>
| <a href="member.php?action=list"><font class="navtd">会员</font></a>
<? } if($allowsearch) { ?>
| <a href="search.php"><font class="navtd">搜索</font></a>
<? } if($statstatus) { ?>
| <a href="stats.php"><font class="navtd">统计</font></a>
<? } ?>
<?=$pluglink?> | <a href="faq.php"><font class="navtd">帮助</font></a>

</td><td align="right"><a href="<?=$siteurl?>"><font class="navtd">返回 <?=$sitename?></font></a>
</td></tr></table></td></tr></table><br><br>
<? if(strpos(TABLEWIDTH, '%')) { ?>
<table bgcolor="#FFFFFF" width="<?=TABLEWIDTH?>" cellpadding="0" cellspacing="0" border="0" align="center">
<tr><td><br>
<? } else { ?>
<table bgcolor="#FFFFFF" cellpadding="13" cellspacing="0" border="0" align="center">
<tr><td>
<? } ?>
