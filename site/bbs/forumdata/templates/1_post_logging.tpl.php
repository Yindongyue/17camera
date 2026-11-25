<? if(!defined('IN_DISCUZ')) exit('Access Denied'); if($discuz_user) { ?>
<tr><td bgcolor="<?=ALTBG1?>">用户名:</td>
<td bgcolor="<?=ALTBG2?>"><?=$discuz_userss?> <span class="smalltxt">[<a href="logging.php?action=logout">退出登录</a>]</span></td>
</tr>
<? } else { ?>
<tr><td bgcolor="<?=ALTBG1?>">用户名:</td>
<td bgcolor="<?=ALTBG2?>" class="smalltxt"><input type="text" name="username" tabindex="1" size="25" maxlength="25" value="<?=$username?>"> &nbsp;<a href="register.php">立即注册</a></td>
</tr><tr>
<td bgcolor="<?=ALTBG1?>">密码:</td>
<td bgcolor="<?=ALTBG2?>" class="smalltxt"><input type="password" name="password" tabindex="2" size="25" value="<?=$password?>"> &nbsp;<a href="member.php?action=lostpw">取回密码</a></td>
</tr>
<? } ?>
