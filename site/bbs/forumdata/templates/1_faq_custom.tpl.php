<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center" style="table-layout: fixed"> 
<tr><td class="nav" width="90%" nowrap>&nbsp;<a href="index.php"><?=$bbname?></a> &raquo; <a href="faq.php">帮助</a> &raquo; <?=$customfaq['title']?></td>
<td align="right" width="10%"><a href="#bottom"><img src="<?=IMGDIR?>/arrow_dw.gif" border="0" align="absmiddle"></a></td>        
</tr></table><br>

<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center">
<tr>
<td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr>
<td width="100%" class="header"><?=$customfaq['title']?></td>
</tr>
<tr>
<td width="100%" bgcolor="<?=ALTBG2?>" class="smalltxt">
<ul>
<? if(is_array($customfaq['item'])) { foreach($customfaq['item'] as $id => $item) { ?>
<li><a href="faq.php?page=custom#<?=$id?>"><?=$item['subject']?></a></li>
<? } } ?>
</td>
</tr>
</table>
</table>
<br>
<? if(is_array($customfaq['item'])) { foreach($customfaq['item'] as $id => $item) { ?>
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr><td width="100%" class="header"><?=$item['subject']?><a name=#<?=$id?>></a></td></tr>
<tr><td width="100%" bgcolor="<?=ALTBG2?>" class="smalltxt">
<?=$item['message']?>
</td></tr></table></td></tr></table>
<br>
<? } } include template('footer'); ?>
