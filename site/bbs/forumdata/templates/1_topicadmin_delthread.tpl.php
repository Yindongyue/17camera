<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center" style="table-layout: fixed"> 
<tr><td class="nav" width="90%" nowrap>&nbsp;<a href="index.php"><?=$bbname?></a> <?=$navigation?> &raquo; 删除选定主题</td>
<td align="right" width="10%"><a href="#bottom"><img src="<?=IMGDIR?>/arrow_dw.gif" border="0" align="absmiddle"></a></td>        
</tr></table><br>

<form method="post" action="topicadmin.php?action=delthread">
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">

<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header">
<td colspan="2">删除选定主题</td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>" width="21%">用户名:</td>
<td bgcolor="<?=ALTBG2?>"><?=$discuz_userss?>  <span class="smalltxt">[<a href="logging.php?action=logout">退出登录</a>]</span></td>
</tr>

</table>
</td></tr></table><br>
<?=$deleteid?>
<input type="hidden" name="page" value="<?=$page?>">
<input type="hidden" name="fid" value="<?=$fid?>">
<center><input type="submit" name="delthreadsubmit" value="删除主题"></center>
</form>
<? include template('footer'); ?>
