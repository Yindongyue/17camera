<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center" style="table-layout: fixed"> 
<tr><td class="nav" width="90%" nowrap>&nbsp;<a href="index.php"><?=$bbname?></a> &raquo; 取回密码</td>
<td align="right" width="10%"><a href="#bottom"><img src="<?=IMGDIR?>/arrow_dw.gif" border="0" align="absmiddle"></a></td>        
</tr></table><br>

<form method="post" action="member.php?action=lostpasswd">
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">

<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header">
<td colspan="2">取回密码</td>
</tr>

<tr bgcolor="<?=ALTBG1?>">
<td width="21%">用户名:</td>
<td><input type="text" name="username" size="25"></td>
</tr>

<tr bgcolor="<?=ALTBG2?>">
<td>Email:</td>
<td><input type="text" name="email" size="25"><br>
</tr>

</table>
</td></tr></table><br>
<center><input type="submit" name="lostpwsubmit" value="提 &nbsp; 交"></center>
</form>
</table></td></tr></table>
<? include template('footer'); ?>
