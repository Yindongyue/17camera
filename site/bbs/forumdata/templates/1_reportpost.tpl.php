<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center" style="table-layout: fixed"> 
<tr><td class="nav" width="90%" nowrap>&nbsp;<a href="index.php"><?=$bbname?></a> <?=$navigation?> &raquo; 报告帖子</td>
<td align="right" width="10%"><a href="#bottom"><img src="<?=IMGDIR?>/arrow_dw.gif" border="0" align="absmiddle"></a></td>        
</tr></table><br>

<form method="post" name="input" action="misc.php?action=report">
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">

<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header">
<td colspan="2">报告帖子</td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>" width="21%">用户名:</td>
<td bgcolor="<?=ALTBG2?>"><?=$discuz_userss?>  <span class="smalltxt">[<a href="logging.php?action=logout">退出登录</a>]</span></td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>" valign="top" width="21%">我的意见:</td>
<td bgcolor="<?=ALTBG2?>"><textarea rows="9" cols="60" name="reason">
我对这个帖子有异议，特向您报告</textarea>
</tr>

</table>
</td></tr></table><br>
<input type="hidden" name="tid" value="<?=$tid?>">
<input type="hidden" name="fid" value="<?=$fid?>">
<input type="hidden" name="pid" value="<?=$pid?>">
<center><input type="submit" name="reportsubmit" value="报告帖子"></center>
</form>
<? include template('footer'); ?>
