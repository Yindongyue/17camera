<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center" style="table-layout: fixed"> 
<tr><td class="nav" width="90%" nowrap>&nbsp;<a href="index.php"><?=$bbname?></a> &raquo; 注册</td>
<td align="right" width="10%"><a href="#bottom"><img src="<?=IMGDIR?>/arrow_dw.gif" border="0" align="absmiddle"></a></td>        
</tr></table><br>
<? if($bbrules && !$rulesubmit) { ?>
<form name="bbrules" method="post" action="register.php?referer=<?=$referer?>">
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">

<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr>
<td class="header">注册</td>
</tr>

<tr bgcolor="<?=ALTBG1?>">
<td width="21%"><?=$bbrulestxt?></td>
</tr>

</table>
</td></tr></table><br>
<center>
<input type="submit" name="rulesubmit" value="同 意" style="height: 23px">
<input type="button" name="return" value="不同意" style="height: 23px" onclick="javascript:history.go(-1);">
</form>
</center>

<script language="javascript">
var secs = 9;
var wait = secs * 1000;
document.bbrules.rulesubmit.value = "同 意(" + secs + ")";
document.bbrules.rulesubmit.disabled = true;
for(i = 1; i <= secs; i++) {
        window.setTimeout("update(" + i + ")", i * 1000);
}
window.setTimeout("timer()", wait);
function update(num, value) {
        if(num == (wait/1000)) {
                document.bbrules.rulesubmit.value = "同 意";
        } else {
                printnr = (wait / 1000)-num;
                document.bbrules.rulesubmit.value = "同 意(" + printnr + ")";
        }
}
function timer() {
        document.bbrules.rulesubmit.disabled = false;
        document.bbrules.rulesubmit.value = "同 意";
}
</script>
<? } else { ?>
<form method="post" action="register.php?referer=<?=$referer?>">
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">

<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr>
<td colspan="2" class="header">注册 - 必填内容</td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>" width="21%">用户名:</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="username" size="25" maxlength="25"></td>
</tr>
<? if(!$regverify) { ?>
<tr>
<td bgcolor="<?=ALTBG1?>">密码:</td>
<td bgcolor="<?=ALTBG2?>"><input type="password" name="password" size="25"></td>
</tr><tr>
<td bgcolor="<?=ALTBG1?>">确认密码:</td>
<td bgcolor="<?=ALTBG2?>"><input type="password" name="password2" size="25"></td>
</tr>
<? } ?>
<tr>
<td bgcolor="<?=ALTBG1?>">Email:</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="email" size="25"></td>
</tr>

<tr>
<td colspan="2" class="header">注册 - 选填内容</td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>">性别:</td>
<td bgcolor="<?=ALTBG2?>">
<input type="radio" name="gendernew" value="1"> 男 &nbsp; 
<input type="radio" name="gendernew" value="2"> 女 &nbsp; 
<input type="radio" name="gendernew" value="0" checked> 保密
</td></tr>

<tr>
<td bgcolor="<?=ALTBG1?>">生日:</td>
<td bgcolor="<?=ALTBG2?>">
<input type="text" name="year" size="4"> 年 
<select name="month">
<option value="">&nbsp;</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select> 月 
<select name="day">
<option value="">&nbsp;</option>
<?=$dayselect?>
</select> 日
</td></tr>

<tr>
<td bgcolor="<?=ALTBG1?>">来自:</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="locationnew" size="25"></td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>">主页:</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="site" size="25"></td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>">OICQ:</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="oicq" size="25"></td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>">ICQ:</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="icq" size="25"></td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>">Yahoo:</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="yahoo" size="25"></td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>">MSN:</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="msn" size="25"></td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>">自我介绍:</td>
<td bgcolor="<?=ALTBG2?>"><textarea rows="5" cols="30" name="bio"></textarea></td>
</tr>

<tr>
<td colspan="2" class="header">注册 - 论坛个性化设置</td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>">界面风格:</td>
<td bgcolor="<?=ALTBG2?>"><select name="styleidnew">
<option value="">--使用默认--</option>
<?=$styleselect?>
</select>
</td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>">每页主题数:</td>
<td bgcolor="<?=ALTBG2?>"><select name="tppnew">
<option value="0">--使用默认--</option>
<option value="10">10</option>
<option value="20">20</option>
<option value="30">30</option>
</select></td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>">每页贴数:</td>
<td bgcolor="<?=ALTBG2?>"><select name="pppnew">
<option value="0">--使用默认--</option>
<option value="5">5</option>
<option value="10">10</option>
<option value="15">15</option>
</select></td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>">时间格式:</td>
<td bgcolor="<?=ALTBG2?>"><input type="radio" value="24" name="timeformatnew">24 小时
<input type="radio" value="12" name="timeformatnew" checked="checked">12 小时</td>
</tr>
<? if($groupinfo['allowcstatus']) { ?>
<tr>
<td bgcolor="<?=ALTBG1?>" width="21%">自定义头衔:</td>
<td bgcolor="<?=ALTBG2?>">
<input type="text" name="cstatus" size="25"></td>
</tr>
<? } ?>
<tr>
<td bgcolor="<?=ALTBG1?>">日期格式:<br><span class="smalltxt">(yyyy/mm/ddm, mm/dd/yy 等)</span></td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="dateformatnew" size="25" value="<?=$dateformatorig?>"></td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>">其他选项:</td>
<td bgcolor="<?=ALTBG2?>">
<input type="checkbox" name="showemail" value="1" checked="checked"> Email 地址可见<br>
<input type="checkbox" name="newsletter" value="1" checked="checked"> 同意接收论坛通知 (Email 或短消息)<br>
<input type="text" name="timeoffsetnew" value="<?=$timeoffset?>" size="3"> 时间较正 (北京时间 +8)，目前GMT标准时间 <?=$currtime?><br></td>
</tr>
<? if($groupinfo['allowavatar'] == 1) { ?>
<tr>
<td bgcolor="<?=ALTBG1?>">头像:</td>
<td bgcolor="<?=ALTBG2?>"><input type="button" value="论坛头像列表" onclick="this.form.action+='&referer=memcp.php?action=viewavatars&regsubmit=yes';this.form.submit();"></td>
</tr>
<? } elseif($groupinfo['allowavatar'] == 2) { ?>
<tr>
<td bgcolor="<?=ALTBG1?>">头像:</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="avatar" size="25" value="<?=$member['avatar']?>">&nbsp;&nbsp;<input type="button" value="论坛头像列表" onclick="this.form.action+='&referer=memcp.php?action=viewavatars&regsubmit=1';this.form.submit();">
<br><span class="smalltxt">如使用 Flash 动画，请用逗号隔开 URL，宽度和高度，如“http://your.com/avatar.swf,80,40”</span></td>
</tr>
<? } ?>
<tr>
<td bgcolor="<?=ALTBG1?>">个人签名
<? if($maxsigsize) { ?>
(<?=$maxsigsize?> 字节以内)
<? } ?>
:<br><br>
<span class="smalltxt">
<a href="faq.php?page=misc#1" target="_blank">UBB 代码</a> 状态 <?=$bbcodeis?><br>
[img] 代码 状态 <?=$imgcodeis?>
</span></td>
<td bgcolor="<?=ALTBG2?>"><textarea rows="4" cols="30" name="sig"></textarea></td>
</tr>

</table>
</td></tr></table><br>
<center><input type="submit" name="regsubmit" value="注册"></center>
</form>
<? } include template('footer'); ?>
