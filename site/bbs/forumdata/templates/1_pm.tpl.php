<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center" style="table-layout: fixed"> 
<tr><td class="nav" width="90%" nowrap>&nbsp;<a href="index.php"><?=$bbname?></a> &raquo; 短消息</td>
<td align="right" width="10%"><a href="#bottom"><img src="<?=IMGDIR?>/arrow_dw.gif" border="0" align="absmiddle"></a></td>        
</tr></table><br>

<br><table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center">
<tr><td width="200" valign="top">

<table cellspacing="0" cellpadding="0" border="0" width="98%">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header"><td colspan="3" align="center">快捷方式</td></tr>
<tr><td bgcolor="<?=ALTBG1?>" width="20" align="center"><img src="<?=IMGDIR?>/pm_folder.gif"></td><td bgcolor="<?=ALTBG2?>">
<? if($action == 'send') { ?>
<b>发送短消息</b>
<? } else { ?>
<a href="pm.php?action=send">发送短消息</a>
<? } ?>
</td></tr>
<tr><td bgcolor="<?=ALTBG1?>" width="20" align="center"><img src="<?=IMGDIR?>/pm_folder.gif"></td><td bgcolor="<?=ALTBG2?>">
<? if($action == 'ignore') { ?>
<b>忽略列表</b>
<? } else { ?>
<a href="pm.php?action=ignore">忽略列表</a>
<? } ?>
</td></tr>
</table></td></tr></table><br>

<table cellspacing="0" cellpadding="0" border="0" width="98%">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header"><td colspan="2" align="center">文件夹</td></tr>
<tr><td bgcolor="<?=ALTBG1?>" width="20" align="center"><img src="<?=IMGDIR?>/pm_folder.gif"></td><td bgcolor="<?=ALTBG2?>">
<? if($folder == 'inbox') { ?>
<b>收件箱</b>
<? } else { ?>
<a href="pm.php?folder=inbox">收件箱</a>
<? } ?>
</td></tr>
<tr><td bgcolor="<?=ALTBG1?>" width="20" align="center"><img src="<?=IMGDIR?>/pm_folder.gif"></td><td bgcolor="<?=ALTBG2?>">
<? if($folder == 'outbox') { ?>
<b>发件箱</b>
<? } else { ?>
<a href="pm.php?folder=outbox">发件箱</a>
<? } ?>
</td></tr>
<tr><td bgcolor="<?=ALTBG1?>" width="20" align="center"><img src="<?=IMGDIR?>/pm_folder.gif"></td><td bgcolor="<?=ALTBG2?>">
<? if($folder == 'track') { ?>
<b>消息跟踪</b>
<? } else { ?>
<a href="pm.php?folder=track">消息跟踪</a>
<? } ?>
</td></tr>
</table></td></tr></table><br>

<table cellspacing="0" cellpadding="0" border="0" width="98%">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header"><td colspan="3" align="center">空间使用</td></tr>
<tr bgcolor="<?=ALTBG2?>"><td colspan="3" class="smalltxt">
<b>&raquo;</b> 共有短消息: <?=$pm_total?><br>
<b>&raquo;</b> 短消息上限: <?=$maxpmnum?>
</td></tr><tr bgcolor="<?=ALTBG1?>"><td colspan="3">
<table cellspacing="2" cellpadding="0" border="0" width="100%" height="15" align="center">
<tr><td width="<?=$storage_percent?>" class="header" style="font-size: 1px">&nbsp;</td><td style="font-size: 1px">&nbsp;</td></tr></table>
</td></tr>

<tr bgcolor="<?=ALTBG2?>" class="smalltxt">
<td width="33%" align="left">0%</td>
<td width="34%" align="center">50%</td>
<td width="33%" align="right">100%</td>
</tr>
</table></td></tr></table><br><br>

</td><td align="right" valign="top">
<? if(empty($action)) { include template('pm_folder'); } elseif($action == 'view') { include template('pm_view'); } elseif($action == 'send') { include template('pm_send'); } elseif($action == 'ignore') { include template('pm_ignore'); } ?>
</td></tr></table>
<? include template('footer'); ?>
