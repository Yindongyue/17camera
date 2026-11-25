<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center" style="table-layout: fixed"> 
<tr><td class="nav" width="90%" nowrap>&nbsp;<a href="index.php"><?=$bbname?></a> <?=$navigation?> &raquo; 参与评分</td>
<td align="right" width="10%"><a href="#bottom"><img src="<?=IMGDIR?>/arrow_dw.gif" border="0" align="absmiddle"></a></td>        
</tr></table><br>

<form method="post" action="misc.php?action=karma">
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">

<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header">
<td colspan="2">参与评分</td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>" width="21%">用户名:</td>
<td bgcolor="<?=ALTBG2?>"><?=$discuz_userss?>  <span class="smalltxt">[<a href="logging.php?action=logout">退出登录</a>]</span></td>
</tr>
<tr>
<td bgcolor="<?=ALTBG1?>" width="21%">作者:</td>
<td bgcolor="<?=ALTBG2?>"><a href="viewpro.php?username=<?=$encodename?>"><?=$username?></a></td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>" width="21%">评分:</td>
<td bgcolor="<?=ALTBG2?>">积分 <?=$score?> 点</td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>" width="21%">标题:</td>
<td bgcolor="<?=ALTBG2?>"><a href="viewthread.php?tid=<?=$tid?>"><?=$thread['subject']?></a></td>
</tr>

</table>
</td></tr></table><br>
<input type="hidden" name="tid" value="<?=$tid?>">
<input type="hidden" name="pid" value="<?=$pid?>">
<input type="hidden" name="username" value="<?=$username?>">
<input type="hidden" name="score" value="<?=$score?>">
<center><input type="submit" name="karmasubmit" value="提 &nbsp; 交"></center>
</form>
<? include template('footer'); ?>
