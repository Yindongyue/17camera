<? if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>

<form method="post" name="input" action="pm.php?action=send">
<input type="hidden" name="pmsubmit" value="submit">

<table cellspacing="0" cellpadding="0" border="0" width="98%" align="center">
<tr> <td bgcolor="<?=BORDERCOLOR?>">

<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr>
<td width="100%" colspan="2" class="header">发送短消息</td>
</tr>

<tr><td bgcolor="<?=ALTBG1?>" width="18%">到:</td>
<td bgcolor="<?=ALTBG2?>" width="82%"><input type="text" name="msgto" size="50" value="<?=$touser?>"></td></tr>
<? if($buddylist) { ?>
<tr><td bgcolor="<?=ALTBG1?>" valign="top" id="buddy">好友群发:<br>
<span class="smalltxt">全部好友</span><input type="checkbox" name="chkall" onclick="for(var i = 0;i < form.elements.length; i++) {var e = form.elements[i];
if (e.name != 'chkall' && e.name != 'saveoutbox') e.checked = form.chkall.checked;}"></td>
<td bgcolor="<?=ALTBG2?>">
<table border="0" cellspacing="0" cellpadding="0" width="100%"><tr><td>
<? if(is_array($buddylist)) { foreach($buddylist as $key => $buddy) { if($key % 3 == 0) { ?>
</td></tr><tr><td width="33%" nowrap>
<? } else { ?>
</td><td width="33%" nowrap>
<? } ?>
<input type="checkbox" name="msgtobuddys[]" value="<?=$buddy['buddyname']?>"> <?=$buddy['buddyname']?>
<? } } ?>
</table>
</td></tr>
<? } ?>
<tr>
<td bgcolor="<?=ALTBG1?>">标题:</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="subject" size="65" value="<?=$subject?>"></td>
</tr>

<tr>
<td valign="top" bgcolor="<?=ALTBG1?>">内容:</td>
<td bgcolor="<?=ALTBG2?>"><textarea rows="8" name="message" cols="65" onKeyDown="javascript: ctlent();"><?=$message?></textarea>
<br><span class="smalltxt"><input type="checkbox" name="saveoutbox" value="1">保存到发件箱中 &nbsp; [完成后可按 Ctrl+Enter 发布]</span></td>
</tr>

</table>
</td></tr></table><br><center>
<input type="submit" name="pmsubmit" value="提 &nbsp; 交">
</center></form>