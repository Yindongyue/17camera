<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center" style="table-layout: fixed"> 
<tr><td class="nav" width="90%" nowrap>&nbsp;<a href="index.php"><?=$bbname?></a> &raquo; 提示信息</td>
<td align="right" width="10%"><a href="#bottom"><img src="<?=IMGDIR?>/arrow_dw.gif" border="0" align="absmiddle"></a></td>        
</tr></table><br>

<table cellspacing="0" cellpadding="0" border="0" width="500" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">

<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header"><td><?=$bbname?> 提示信息</td></tr>
<tr><td bgcolor="<?=ALTBG2?>" align="center">

<table border="0" width="90%" cellspacing="0" cellpadding="0">
<tr><td align="center" class="smalltxt">
<br><?=$show_message?>
<? if($url_forward) { ?>
<br><br><a href="<?=$url_forward?>">如果您的浏览器没有自动跳转，请点击这里</a>
<? } elseif(stristr($show_message, '返回')) { ?>
<br><br><a href="###" onclick="history.go(-1)">[ 点击这里返回上一页 ]</a>
<? } ?>
<br><br>

</td></tr></table>
</td></tr></table>
</td></tr></table>
<br><br>
<? include template('footer'); ?>
