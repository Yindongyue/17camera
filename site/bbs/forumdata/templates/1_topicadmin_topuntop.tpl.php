<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center" style="table-layout: fixed"> 
<tr><td class="nav" width="90%" nowrap>&nbsp;<a href="index.php"><?=$bbname?></a> <?=$navigation?> &raquo;
<? if($thread['topped']) { ?>
解除置顶
<? } else { ?>
主题置顶
<? } ?>
</td>
<td align="right" width="10%"><a href="#bottom"><img src="<?=IMGDIR?>/arrow_dw.gif" border="0" align="absmiddle"></a></td>        
</tr></table><br>

<form method="post" action="topicadmin.php?action=top">
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">

<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header">
<td colspan="2">
<? if($thread['topped']) { ?>
解除置顶
<? } else { ?>
主题置顶
<? } ?>
</td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>" width="21%">用户名:</td>
<td bgcolor="<?=ALTBG2?>"><?=$discuz_userss?>  <span class="smalltxt">[<a href="logging.php?action=logout">退出登录</a>]</span></td>
</tr>
<tr>
<td bgcolor="<?=ALTBG1?>" width="21%">级别:</td>
<td bgcolor="<?=ALTBG2?>">
<? if($thread['topped']) { ?>
<input type="radio" name="level" value="0" checked> 解除置顶 &nbsp; &nbsp; 
<input type="radio" name="level" value="1"> <img src="<?=IMGDIR?>/star.gif"> &nbsp; &nbsp;
<? } else { ?>
<input type="radio" name="level" value="1" checked> <img src="<?=IMGDIR?>/star.gif"> &nbsp; &nbsp;
<? } ?>
<input type="radio" name="level" value="2"> <img src="<?=IMGDIR?>/star.gif"><img src="<?=IMGDIR?>/star.gif"> &nbsp; &nbsp;
<? if($issupermod) { ?>
<input type="radio" name="level" value="3"> <img src="<?=IMGDIR?>/star.gif"><img src="<?=IMGDIR?>/star.gif"><img src="<?=IMGDIR?>/star.gif"> (全论坛置顶)
<? } ?>
</td></tr>

</table>
</td></tr></table><br>
<input type="hidden" name="fid" value="<?=$fid?>">
<input type="hidden" name="tid" value="<?=$tid?>">
<center><input type="submit" name="topsubmit" value="置顶/解除置顶"></center>
</form>
<? include template('footer'); ?>
