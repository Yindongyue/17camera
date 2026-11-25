<? if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>

<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center" style="table-layout: fixed"> 
<tr><td class="nav" width="90%" nowrap>&nbsp;<a href="index.php"><?=$bbname?></a> &raquo;
<? if(!$action) { ?>
控制面板
<? } else { ?>
<a href="memcp.php">控制面板</a> &raquo;
<? if($action == 'profile') { ?>
编辑个人资料
<? } elseif($action == 'subscriptions') { ?>
订阅列表
<? } elseif($action == 'favorites') { ?>
收藏夹
<? } elseif($action == 'viewavatars') { ?>
论坛头像列表
<? } } ?>
</td><td align="right" width="10%"><a href="#bottom"><img src="<?=IMGDIR?>/arrow_dw.gif" border="0" align="absmiddle"></a></td>        
</tr></table><br>

<table cellpadding="0" cellspacing="0" border="0" bgcolor="<?=BORDERCOLOR?>" width="<?=TABLEWIDTH?>" align="center">
<tr><td>
<table cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" border="0" width="100%">
<tr align="center" bgcolor="<?=ALTBG2?>" class="smalltxt">
<? if(!$action) { ?>
<td bgcolor="<?=ALTBG1?>" width="20%">控制面板首页</td>
<? } else { ?>
<td width="20%"><a href="memcp.php">控制面板首页</a></td>
<? } if($action == 'profile') { ?>
<td bgcolor="<?=ALTBG1?>" width="20%">编辑个人资料</td>
<? } else { ?>
<td width="20%"><a href="memcp.php?action=profile">编辑个人资料</a></td>
<? } if($action == 'subscriptions') { ?>
<td bgcolor="<?=ALTBG1?>" width="20%">订阅列表</td>
<? } else { ?>
<td width="20%"><a href="memcp.php?action=subscriptions">订阅列表</a></td>
<? } if($action == 'favorites') { ?>
<td bgcolor="<?=ALTBG1?>" width="20%">收藏夹</td>
<? } else { ?>
<td width="20%"><a href="memcp.php?action=favorites">收藏夹</a></td>
<? } ?>
<td><a href="pm.php" target="_blank" width="20%">短消息</a></td>
</tr></table></td></tr></table><br>
