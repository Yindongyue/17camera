<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center" style="table-layout: fixed"> 
<tr><td class="nav" width="90%" nowrap>&nbsp;<a href="index.php"><?=$bbname?></a> &raquo; 会员登录</td>
<td align="right" width="10%"><a href="#bottom"><img src="<?=IMGDIR?>/arrow_dw.gif" border="0" align="absmiddle"></a></td>        
</tr></table><br>

<form method="post" action="logging.php?action=login">
<input type="hidden" name="referer" value="<?=$referer?>">

<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">

<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header">
<td colspan="2">会员登录</td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>" width="21%">用户名:</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="username" size="25" maxlength="40" tabindex="1"> &nbsp;<span class="smalltxt"><a href="register.php">立即注册</a></span></td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>">密码:</td>
<td bgcolor="<?=ALTBG2?>"><input type="password" name="password" size="25" tabindex="2"> &nbsp;<span class="smalltxt"><a href="member.php?action=lostpasswd">取回密码</a></span></td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>">界面风格:</td>
<td bgcolor="<?=ALTBG2?>"><select name="styleid"><option value="">--使用默认--</option>
<?=$styleselect?>
</select>
</td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>">Cookie 时间:</td>
<td bgcolor="<?=ALTBG2?>" class="smalltxt">
<input type="radio" <?=$year_checked?> name="cookietime" value="31536000"> 一年 &nbsp;
<input type="radio" <?=$month_checked?> name="cookietime" value="2592000"> 一个月 &nbsp;
<input type="radio" <?=$day_checked?> name="cookietime" value="86400"> 一天 &nbsp;
<input type="radio" <?=$hour_checked?> name="cookietime" value="3600"> 一小时 &nbsp;
<input type="radio" <?=$task_checked?> name="cookietime" value="0"> 浏览器进程 &nbsp; &nbsp;
<a href="faq.php?page=usermaint#2" target="_blank">[相关帮助]</a></td>
</tr>

</table>
</td></tr></table><br>
<center><input type="submit" name="loginsubmit" value="会员登录"></center>
</form>
<? include template('footer'); ?>
