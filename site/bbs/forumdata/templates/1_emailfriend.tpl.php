<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center" style="table-layout: fixed"> 
<tr><td class="nav" width="90%" nowrap>&nbsp;<a href="index.php"><?=$bbname?></a> <?=$navigation?> &raquo; 推荐给朋友</td>
<td align="right" width="10%"><a href="#bottom"><img src="<?=IMGDIR?>/arrow_dw.gif" border="0" align="absmiddle"></a></td>        
</tr></table><br>

<form method="post" action="misc.php?action=emailfriend">
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">

<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header">
<td colspan="2">推荐给朋友</td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>" width="21%">您的名字:</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="fromname" size="25" maxlength="40" value="<?=$discuz_userss?>"></td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>">您的 Email:</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="fromemail" size="25" value="<?=$email?>"></td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>">接收者名字:</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="sendtoname" size="25"></td>
</tr>
<tr>
<td bgcolor="<?=ALTBG1?>">接收者 Email:</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="sendtoemail" size="25"></td>
</tr>
<tr>
<td bgcolor="<?=ALTBG1?>">标题:</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="subject" size="65" value="向您推荐: <?=$thread['subject']?>"></td>
</tr>
<tr>
<td bgcolor="<?=ALTBG1?>" valign="top">内容:</td>
<td bgcolor="<?=ALTBG2?>"><textarea rows="9" cols="65" name="message">
你好！我在 <?=$bbname?> (<?=$boardurl?>)<?="\n"?>看到了这篇帖子，认为很有价值，特推荐给你。<?="\n"?><?=$thread['subject']?><?="\n"?>地址 <?=$threadurl?><?="\n"?><?="\n"?>希望你能喜欢。</textarea></td>
</tr>
</table>
</td></tr></table><br>
<center><input type="submit" name="sendsubmit" value="提 &nbsp; 交"></center>
<input type="hidden" name="tid" value="<?=$tid?>">
</form>
<? include template('footer'); ?>
