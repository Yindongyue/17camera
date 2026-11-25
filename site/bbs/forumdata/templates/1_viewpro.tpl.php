<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center" style="table-layout: fixed"> 
<tr><td class="nav" width="90%" nowrap>&nbsp;<a href="index.php"><?=$bbname?></a> &raquo; 查看资料</td>
<td align="right" width="10%"><a href="#bottom"><img src="<?=IMGDIR?>/arrow_dw.gif" border="0" align="absmiddle"></a></td>        
</tr></table><br>

<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr><td colspan="2" class="header"><?=$memberinfo['username']?> 的个人资料</td>
</tr><tr><td bgcolor="<?=ALTBG2?>">

<table border="0" cellspacing="0" cellpadding="6" width="98%">
<tr><td width="70%">

<table border="0" cellspacing="0" cellpadding="<?=TABLESPACE?>" width="98%">
<tr><td colspan="2" align="center" class="smalltxt"><a href="pm.php?action=send&username=<?=$memberinfo['usernameenc']?>" target="_blank">[ 发短消息 ]</a> 
&nbsp; &nbsp; <a href="memcp.php?action=buddylist&buddy=<?=$memberinfo['usernameenc']?>&buddysubmit=yes">[ 加为好友 ]</a> &nbsp; &nbsp; 
<a href="search.php?srchuname=<?=$memberinfo['usernameenc']?>&srchfid=all&srchfrom=0&searchsubmit=yes">[ 搜索帖子 ]</a> &nbsp; &nbsp;
<? if($isadmin) { ?>
<a href="admincp.php?action=memberprofile&extr=<?=$memberinfo['usernameenc']?>&direct=1" target="_blank">[ 编辑用户 ]</a> &nbsp; &nbsp;
<? } ?>
<a href="###" onclick="history.go(-1);">[ 返回上一页 ]</a>

<br><br></td></tr>
<tr><td width="45%" class="bold">注册日期:</td><td width="55%"><?=$memberinfo['regdate']?></td></tr>
<? if($isadmin) { ?>
<tr><td width="45%" class="bold">注册 IP:</td><td width="55%"><?=$memberinfo['regip']?> - <?=$memberinfo['iplocation']?></td></tr>
<? } ?>
<tr><td width="45%" class="bold">上次访问:</td><td width="55%"><?=$memberinfo['lastvisit']?></td></tr>
<tr><td colspan="2"><hr noshade size="0" width="95%" color="<?=BORDERCOLOR?>"></td></tr>
<tr><td width="45%" class="bold">积分:</td><td width="55%"><?=$memberinfo['credit']?> 点</td></tr>
<tr><td width="45%" class="bold">用户组:</td><td width="55%"><?=$memberinfo['status']?> - <?=$memberinfo['grouptitle']?></td></tr>
<tr><td width="45%" class="bold">等级:</td><td width="55%"><?=$stars?></td></tr>
<tr><td width="45%" class="bold">发贴:</td><td width="55%"><?=$memberinfo['postnum']?> (占全部帖子的 <?=$percent?>%)</td></tr>
<tr><td width="45%" class="bold">平均每日发帖:</td><td width="55%"><?=$postperday?> 篇</td></tr>
<tr><td colspan="2"><hr noshade size="0" width="95%" color="<?=BORDERCOLOR?>"></td></tr>
<tr><td width="45%" class="bold">性别:</td><td width="55%">
<? if($memberinfo['gender'] == 1) { ?>
男
<? } elseif($memberinfo['gender'] == 2) { ?>
女
<? } else { ?>
保密
<? } ?>
</td></tr>
<tr><td width="45%" class="bold">来自:</td><td width="55%"><?=$memberinfo['location']?></td></tr>
<tr><td width="45%" class="bold">生日:</td><td width="55%"><?=$memberinfo['bday']?></td></tr>
<tr><td width="45%" class="bold">自我介绍:</td><td width="55%"><?=$memberinfo['bio']?></td></tr>
</table>

</td><td width="30%">
<table cellspacing="0" cellpadding="0" border="0" width="100%" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header"><td colspan="2">个人信息</td></tr>
<tr bgcolor="<?=ALTBG2?>"><td align="center" colspan="2"><br><?=$memberinfo['avatar']?><br><br></td></tr>
<tr><td bgcolor="<?=ALTBG1?>" width="20%">主页:</td><td bgcolor="<?=ALTBG2?>">
<a href="<?=$memberinfo['site']?>" target="_blank"><?=$memberinfo['site']?></a></td></tr>

<tr><td bgcolor="<?=ALTBG1?>">Email:</td><td bgcolor="<?=ALTBG2?>">
<? if($memberinfo['email'] && $memberinfo['showemail']) { ?>
<a href="mailto:<?=$memberinfo['email']?>"><?=$memberinfo['email']?></a>
<? } else { ?>
&nbsp;
<? } ?>
</td></tr>

<tr><td bgcolor="<?=ALTBG1?>" width="20%">OICQ:</td><td bgcolor="<?=ALTBG2?>"><?=$memberinfo['oicq']?></td></tr>
<tr><td bgcolor="<?=ALTBG1?>" width="20%">ICQ:</td><td bgcolor="<?=ALTBG2?>"><?=$memberinfo['icq']?></td></tr>
<tr><td bgcolor="<?=ALTBG1?>" width="20%">Yahoo:</td><td bgcolor="<?=ALTBG2?>"><?=$memberinfo['yahoo']?></td></tr>
<tr><td bgcolor="<?=ALTBG1?>" width="20%">MSN:</td><td bgcolor="<?=ALTBG2?>"><?=$memberinfo['msn']?></td></tr>
</table></td></tr></table>

</td></tr></table>


</td></tr></table></td></tr></table>
<? include template('footer'); ?>
