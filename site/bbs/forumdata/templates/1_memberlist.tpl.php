<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center" style="table-layout: fixed"> 
<tr><td class="nav" width="90%" nowrap>&nbsp;<a href="index.php"><?=$bbname?></a> &raquo; 会员列表</td>
<td align="right" width="10%"><a href="#bottom"><img src="<?=IMGDIR?>/arrow_dw.gif" border="0" align="absmiddle"></a></td>        
</tr></table><br>

<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center">
<tr><td class="multi"><?=$multipage?></td></tr>
<tr><td height="3"></td></tr></table>

<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header">
<td width="15%" align="center">用户名</td>
<td width="6%" align="center">性别</td>
<td width="8%" align="center">Email</td>
<td width="8%" align="center">主页</td>
<td width="13%" align="center">来自</td>
<td width="10%" align="center">注册日期</td>
<td width="18%" align="center">上次访问</td>
<td width="8%" align="center">发贴</td>
<td width="9%" align="center">积分</td>
</tr>
<? if(is_array($memberlist)) { foreach($memberlist as $member) { ?>
<tr>
<td bgcolor="<?=ALTBG1?>" align="center" nowrap><a href="viewpro.php?username=<?=$member['usernameenc']?>"><?=$member['username']?></a></td>
<td bgcolor="<?=ALTBG2?>" align="center">
<? if($member['gender'] == '1') { ?>
男
<? } elseif($member['gender'] == 2) { ?>
女
<? } else { ?>
&nbsp;
<? } ?>
</td>
<td bgcolor="<?=ALTBG1?>" align="center">
<? if($member['email'] && $member['showemail']) { ?>
<a href="mailto:<?=$member['email']?>"><img src="<?=IMGDIR?>/email.gif" border="0" alt="发送邮件"></a>
<? } else { ?>
&nbsp;
<? } ?>
</td>
<td bgcolor="<?=ALTBG2?>" align="center">
<? if($member['site']) { ?>
<a href="http://<?=$member['site']?>" target="_blank"><img src="<?=IMGDIR?>/site.gif" border="0" alt="访问主页"></a>
<? } else { ?>
&nbsp;
<? } ?>
</td>
<td bgcolor="<?=ALTBG1?>" align="center">
<? if($member['location']) { ?>
<?=$member['location']?>
<? } else { ?>
&nbsp;
<? } ?>
</td>
<td bgcolor="<?=ALTBG2?>" align="center"><?=$member['regdate']?></td>
<td bgcolor="<?=ALTBG1?>" align="center"><?=$member['lastvisit']?></td>
<td bgcolor="<?=ALTBG2?>" align="center"><?=$member['postnum']?></td>
<td bgcolor="<?=ALTBG1?>" align="center"><?=$member['credit']?> 点</td>
</tr>
<? } } ?>
<form method="post" action="member.php?action=list">
<tr>
<td bgcolor="<?=ALTBG2?>" colspan="9" class="smalltxt">
搜索用户 <input type="text" size="15" name="srchmem"> <input type="submit" value="搜索">
&nbsp; <span class="bold">或</span> &nbsp; 
用户信息以...排序: 
<a href="member.php?action=list&order=credit&desc=desc">积分</a> -
<a href="member.php?action=list&order=username">用户名</a> -
<a href="member.php?action=list&order=gender&desc=desc">性别</a> -
<a href="member.php?action=list">注册日期</a> -
<a href="member.php?action=list&admins=yes">头衔</a>
</td></tr></form>
</table></td></tr></table>
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center">
<tr><td height="3"></td></tr>
<tr><td class="multi"><?=$multipage?></td></tr></table>
<? include template('footer'); ?>
