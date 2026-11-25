<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center" style="table-layout: fixed"> 
<tr><td class="nav" width="90%" nowrap>&nbsp;<a href="index.php"><?=$bbname?></a> &raquo; 在线用户</td>
<td align="right" width="10%"><a href="#bottom"><img src="<?=IMGDIR?>/arrow_dw.gif" border="0" align="absmiddle"></a></td>        
</tr></table><br>

<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center">
<tr><td class="multi"><?=$multipage?></td></tr>
<tr><td height="3"></td></tr></table>
<? if($isadmin) { ?>
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header">
<td align="center" nowrap>用户名</td>
<td align="center" nowrap>时间</td>
<td align="center" nowrap>当前动作</td>
<td align="center" nowrap>所在论坛</td>
<td align="center" nowrap>所在主题</td>
<td align="center" nowrap>IP 地址</td>
</tr>
<? if(is_array($onlinelist)) { foreach($onlinelist as $online) { ?>
<tr align="center">
<td bgcolor="<?=ALTBG1?>">
<? if($online['username']) { ?>
<a href="viewpro.php?username=<?=$online['usernameenc']?>"><?=$online['username']?></a>
<? } else { ?>
游客
<? } ?>
</td>
<td bgcolor="<?=ALTBG2?>"><?=$online['lastactivity']?></td>
<td bgcolor="<?=ALTBG1?>"><?=$online['action']?></td>
<td bgcolor="<?=ALTBG2?>">
<? if($online['fid']) { ?>
<a href="forumdisplay.php?fid=<?=$online['fid']?>"><?=$online['name']?></a>
<? } ?>
</td>
<td bgcolor="<?=ALTBG1?>">
<? if($online['tid']) { ?>
<a href="viewthread.php?tid=<?=$online['tid']?>"><?=$online['subject']?></a>
<? } ?>
</td>
<td bgcolor="<?=ALTBG2?>"><?=$online['ip']?></td>
</tr>
<? } } ?>
</table></td></tr></table>
<? } else { ?>
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header">
<td align="center" nowrap>用户名</td>
<td align="center" nowrap>时间</td>
<td align="center" nowrap>当前动作</td>
<td align="center" nowrap>所在论坛</td>
<td align="center" nowrap>所在主题</td>
</tr>
<? if(is_array($onlinelist)) { foreach($onlinelist as $online) { ?>
<tr align="center">
<td bgcolor="<?=ALTBG1?>">
<? if($online['username']) { ?>
<a href="viewpro.php?username=<?=$online['usernameenc']?>"><?=$online['username']?></a>
<? } else { ?>
游客
<? } ?>
</td>
<td bgcolor="<?=ALTBG2?>"><?=$online['lastactivity']?></td>
<td bgcolor="<?=ALTBG1?>"><?=$online['action']?></td>
<td bgcolor="<?=ALTBG2?>">
<? if($online['fid']) { ?>
<a href="forumdisplay.php?fid=<?=$online['fid']?>"><?=$online['name']?></a>
<? } ?>
</td>
<td bgcolor="<?=ALTBG1?>">
<? if($online['tid']) { ?>
<a href="viewthread.php?tid=<?=$online['tid']?>"><?=$online['subject']?></a>
<? } ?>
</td>
</tr>
<? } } ?>
</table></td></tr></table>
<? } ?>
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center">
<tr><td class="multi"><?=$multipage?></td></tr>
<tr><td height="3"></td></tr></table>
<? include template('footer'); ?>
