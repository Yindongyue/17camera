<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); include template('memcp_navbar'); ?>
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr>
<td bgcolor="<?=ALTBG1?>" align="center" class="smalltxt">
<span class="bold">您好 <?=$discuz_userss?> ，欢迎进入控制面板，这里提供相关的资料设定与论坛快捷功能等。</span>
<br><br>
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">

<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header">
<td colspan="4">账号信息:</td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>" width="15%">用户名:</td>
<td bgcolor="<?=ALTBG2?>" width="35%"><?=$discuz_userss?></td>
<td bgcolor="<?=ALTBG1?>" width="15%">积分:</td>
<td bgcolor="<?=ALTBG2?>" width="35%"><?=$credit?> 点</td>
</tr>
<tr>
<td bgcolor="<?=ALTBG1?>" valign="top">头衔:</td>
<td bgcolor="<?=ALTBG2?>" valign="top"><?=$status?> - <?=$grouptitle?></td>
<td bgcolor="<?=ALTBG1?>" valign="top">头像:</td>
<td bgcolor="<?=ALTBG2?>"><?=$avatar?></td>
</tr>
</table>
</td></tr></table>
</td>
</tr>

</table>
</td></tr></table><br>

<form name="buddyaa" method="post" action="memcp.php?action=buddylist">
<table border="0" cellspacing="0" cellpadding="0" width="<?=TABLEWIDTH?>" align="center">
<tr><td>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td valign="top" align="left"><table cellspacing="0" cellpadding="0" border="0" width="100%" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>" width="20%">

<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr>
<td class="header">好友列表</td>
</tr>
<tr><td bgcolor="<?=ALTBG1?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="98%">
<tr>
<td bgcolor="<?=ALTBG2?>" align="center" colspan="3" class="smalltxt"><span class="bold">在线</span></td>
</tr>
<? if(is_array($buddyonline)) { foreach($buddyonline as $buddy) { ?>
<tr bgcolor="<?=ALTBG1?>" onMouseOver="this.style.backgroundColor='<?=ALTBG2?>'" onMouseOut="this.style.backgroundColor='<?=ALTBG1?>'">
<td width="15" align="center"><a href="pm.php?action=send&username=<?=$buddy['buddyenc']?>" target="_blank"><img src="<?=IMGDIR?>/buddy_sendpm.gif" border="0" alt="发送短消息"></a></td>
<td align="center"><a href="viewpro.php?username=<?=$buddy['buddyenc']?>" target="_blank"><?=$buddy['buddy']?></a></td>
<td width="15" align="center"><a href="memcp.php?action=buddylist&delete=<?=$buddy['buddyenc']?>"><img src="<?=IMGDIR?>/buddy_delete.gif" border="0" alt="删除该好友"></a></td></tr>
<? } } ?>
<tr>
<td bgcolor="<?=ALTBG2?>" align="center" colspan="3" class="smalltxt"><span class="bold">离线</span></td>
</tr>
<? if(is_array($buddyoffline)) { foreach($buddyoffline as $buddy) { ?>
<tr bgcolor="<?=ALTBG1?>" onMouseOver="this.style.backgroundColor='<?=ALTBG2?>'" onMouseOut="this.style.backgroundColor='<?=ALTBG1?>'">
<td width="15" align="center"><a href="pm.php?action=send&username=<?=$buddy['buddyenc']?>" target="_blank"><img src="<?=IMGDIR?>/buddy_sendpm.gif" border="0" alt="发送短消息"></a></td>
<td align="center"><a href="viewpro.php?username=<?=$buddy['buddyenc']?>" target="_blank"><?=$buddy['buddy']?></a></td>
<td width="15" align="center"><a href="memcp.php?action=buddylist&delete=<?=$buddy['buddyenc']?>"><img src="<?=IMGDIR?>/buddy_delete.gif" border="0" alt="删除该好友"></a></td></tr>
<? } } ?>
</table>
<tr>
<td bgcolor="<?=ALTBG2?>" align="center">
<input type="text" name="buddy" size="10"> <input type="submit" name="buddysubmit" value="添加">
</td>
</tr>

</table>
</td></tr></table></form></td>
<td width="10"></td>
<td align="right" valign="top" width="80%">
<table cellspacing="0" cellpadding="0" border="0" width="100%" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">

<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header">
<td colspan="3">最近的五条短消息</td>
</tr>
<tr class="header">
<td width="55%" align="center">标题</td>
<td width="20%" align="center">来自</td>
<td width="25%" align="center">时间</td>
</tr>
<? if($msgexists) { if(is_array($msglist)) { foreach($msglist as $message) { ?>
<tr>
<td bgcolor="<?=ALTBG2?>" onMouseOver ="this.style.backgroundColor='<?=ALTBG1?>'" onMouseOut ="this.style.backgroundColor='<?=ALTBG2?>'">
<a href="pm.php?action=view&pmid=<?=$message['pmid']?>" target="_blank"><?=$message['subject']?></a></td>
<td bgcolor="<?=ALTBG1?>" align="center"><?=$message['msgfrom']?></td>
<td bgcolor="<?=ALTBG2?>" align="center" class="smalltxt"><?=$message['dateline']?></td>
</tr>
<? } } } else { ?>
<tr><td bgcolor="<?=ALTBG1?>" colspan="4">目前收件箱中没有消息。
</td></tr>
<? } ?>
</table>
</td></tr></table>
<br>
<table cellspacing="0" cellpadding="0" border="0" width="100%"
align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">

<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header">
<td colspan="5">最近被回复的五个订阅主题</td>
</tr>
<tr>
<td class="header" width="5%"></td>
<td class="header" width="47%" align="center">标题</td>
<td class="header" width="15%" align="center">论坛</td>
<td class="header" width="8%" align="center">回复</td>
<td class="header" width="25%" align="center">最后发表</td>
</tr>
<? if($subsexists) { if(is_array($subslist)) { foreach($subslist as $subs) { ?>
<tr>
<td bgcolor="<?=ALTBG1?>" width="5%" align="center">
<? if($subs['icon']) { ?>
<img src="<?=SMDIR?>/<?=$subs['icon']?>">
<? } else { ?>
&nbsp;
<? } ?>
</td>
<td bgcolor="<?=ALTBG2?>" onMouseOver ="this.style.backgroundColor='<?=ALTBG1?>'" onMouseOut ="this.style.backgroundColor='<?=ALTBG2?>'"><a href="viewthread.php?tid=<?=$subs['tid']?>"><?=$subs['subject']?></a></td>
<td bgcolor="<?=ALTBG1?>" align="center"><a href="forumdisplay.php?fid=<?=$subs['fid']?>"><?=$subs['name']?></a></td>
<td bgcolor="<?=ALTBG2?>" align="center">12</td>
<td bgcolor="<?=ALTBG1?>" align="center">
<table cellpadding="0" cellspacing="0" border="0" width="100%"><tr align="right">
<td class="smalltxt" nowrap><?=$subs['lastpost']?><br>
by
<? if($subs['lastposter'] != 'Guest') { ?>
<a href="viewpro.php?username=<?=$subs['lastposterenc']?>"><?=$subs['lastposter']?></a>
<? } else { ?>
游客
<? } ?>
</td><td nowrap>&nbsp;<a href="redirect.php?tid=<?=$subs['tid']?>&goto=lastpost<?=$highlight?>"><img src="<?=IMGDIR?>/lastpost.gif" border="0"></a>
</td></tr></table></td>
</tr>
<? } } } else { ?>
<tr><td bgcolor="<?=ALTBG1?>" colspan="6">目前没有被订阅的主题。</td></tr>
<? } ?>
</table>
</td></tr></table><br><br>
</td></tr>
</table>
</td></tr>
</table>
<? include template('footer'); ?>
