<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center" style="table-layout: fixed"> 
<tr><td class="nav" width="90%" nowrap>&nbsp;<a href="index.php"><?=$bbname?></a> <?=$navigation?> &raquo; 查看 IP</td>
<td align="right" width="10%"><a href="#bottom"><img src="<?=IMGDIR?>/arrow_dw.gif" border="0" align="absmiddle"></a></td>        
</tr></table><br><br>

<table cellspacing="0" cellpadding="0" border="0" width="60%" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">

<tr>
<td class="header" colspan="3">查看 IP</td>
</tr>
<tr bgcolor="<?=ALTBG2?>">
<td align="center">此用户的 IP 地址是 <span class="bold"><?=$useip?></span> - <?=$iplocation?>
</td>
<tr bgcolor="<?=ALTBG1?>"><td align="center">
<? if($isadmin) { ?>
<a href="admincp.php?action=ipban&extr=<?=$useip?>&direct=1" target="_blank">[ 禁止此 IP ]</a>
<? } else { ?>
<a href="###" onclick="history.go(-1)">返回上一页</a>
<? } ?>
</td></tr>
</table></td></tr></table></form>
<? include template('footer'); ?>
