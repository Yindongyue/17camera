<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); include template('memcp_navbar'); ?>
<form method="post" action="memcp.php?action=profile" name="reg">
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr>
<td colspan="2" class="header">编辑个人资料 - 必填内容</td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>">原密码:</td>
<td bgcolor="<?=ALTBG2?>"><input type="password" name="oldpassword" size="25"> 如不需要更改密码，此处请留空</td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>">新密码:</td>
<td bgcolor="<?=ALTBG2?>"><input type="password" name="newpassword" size="25"> 如不需要更改密码，此处请留空</td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>" width="21%">Email:</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="emailnew" size="25" value="<?=$member['email']?>">
<? if($emailcheck) { ?>
<b>!如更改地址，系统将修改您的密码并重新验证其有效性，请慎用</b>
<? } ?>
</td></tr>

<tr>
<td colspan="2" class="header">编辑个人资料 - 选填内容</td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>" width="21%">性别:</td>
<td bgcolor="<?=ALTBG2?>">
<input type="radio" name="gendernew" value="1" <?=$checkmale?>> 男 &nbsp; 
<input type="radio" name="gendernew" value="2" <?=$checkfemale?>> 女 &nbsp; 
<input type="radio" name="gendernew" value="0" <?=$checkunknown?>> 保密
</td></tr>

<tr>
<td bgcolor="<?=ALTBG1?>">生日:</td>
<td bgcolor="<?=ALTBG2?>">
<input type="text" name="year" size="4" value="<?=$bday[0]?>"> 年 
<select name="month">
<option value="" <?=$month[0]?>>&nbsp;</option>
<option value="1" <?=$month[1]?>>1</option>
<option value="2" <?=$month[2]?>>2</option>
<option value="3" <?=$month[3]?>>3</option>
<option value="4" <?=$month[4]?>>4</option>
<option value="5" <?=$month[5]?>>5</option>
<option value="6" <?=$month[6]?>>6</option>
<option value="7" <?=$month[7]?>>7</option>
<option value="8" <?=$month[8]?>>8</option>
<option value="9" <?=$month[9]?>>9</option>
<option value="10" <?=$month[10]?>>10</option>
<option value="11" <?=$month[11]?>>11</option>
<option value="12" <?=$month[12]?>>12</option>
</select> 月 
<select name="day">
<option value="">&nbsp;</option>
<?=$dayselect?>
</select> 日
</td></tr>

<tr>
<td bgcolor="<?=ALTBG1?>" width="21%">来自:</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="locationnew" size="25" value="<?=$member['location']?>"></td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>" width="21%">主页:</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="sitenew" size="25" value="<?=$member['site']?>"></td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>" width="21%">OICQ:</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="oicqnew" size="25" value="<?=$member['oicq']?>"></td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>" width="21%">ICQ:</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="icqnew" size="25" value="<?=$member['icq']?>"></td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>" width="21%">Yahoo:</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="yahoonew" size="25" value="<?=$member['yahoo']?>"></td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>" width="21%">MSN:</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="msnnew" size="25" value="<?=$member['msn']?>"/></td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>" width="21%">自我介绍:</td>
<td bgcolor="<?=ALTBG2?>"><textarea rows="5" cols="30" name="bionew"><?=$member['bio']?></textarea></td>
</tr>

<tr>
<td colspan="2" class="header">编辑个人资料 - 论坛个性化设置</td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>">界面风格:</td>
<td bgcolor="<?=ALTBG2?>"><select name="styleidnew">
<option value="">--使用默认--</option>
<?=$styleselect?></select></td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>">每页主题数:</td>
<td bgcolor="<?=ALTBG2?>"><select name="tppnew">
<option value="0" <?=$tppchecked[0]?>>--使用默认--</option>
<option value="10" <?=$tppchecked[10]?>>10</option>
<option value="20" <?=$tppchecked[20]?>>20</option>
<option value="30" <?=$tppchecked[30]?>>30</option>
</select></td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>">每页贴数:</td>
<td bgcolor="<?=ALTBG2?>"><select name="pppnew">
<option value="0" <?=$pppchecked[0]?>>--使用默认--</option>
<option value="5" <?=$pppchecked[5]?>>5</option>
<option value="10" <?=$pppchecked[10]?>>10</option>
<option value="15" <?=$pppchecked[15]?>>15</option>
</select></td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>">时间格式:</td>
<td bgcolor="<?=ALTBG2?>"><input type="radio" value="24" name="timeformatnew" <?=$check24?>>24 小时
<input type="radio" value="12" name="timeformatnew" <?=$check12?>>12 小时</td>
</tr>
<? if($allowcstatus) { ?>
<tr>
<td bgcolor="<?=ALTBG1?>" width="21%">自定义头衔:</td>
<td bgcolor="<?=ALTBG2?>">
<input type="text" name="cstatusnew" size="25" value="<?=$member['customstatus']?>"></td>
</tr>
<? } ?>
<tr>
<td bgcolor="<?=ALTBG1?>">日期格式:<br><span class="smalltxt">(yyyy/mm/dd，mm/dd/yy 等)</span></td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="dateformatnew" size="25" value="<?=$member['dateformat']?>"></td>
</tr>

<tr>
<td bgcolor="<?=ALTBG1?>">其他选项:</td>
<td bgcolor="<?=ALTBG2?>">
<input type="checkbox" name="showemailnew" value="1" <?=$emailchecked?>> Email 地址可见<br>
<input type="checkbox" name="newsletternew" value="1" <?=$newschecked?>> 同意接收论坛通知 (Email 或短消息)<br>
<input type="text" name="timeoffsetnew" size="3" value="<?=$member['timeoffset']?>"> 时间较正 (北京时间 +8)，目前GMT标准时间 <?=$currtime?>
</td></tr>
<? if($allowavatar == 1) { ?>
<tr>
<td bgcolor="<?=ALTBG1?>">头像:</td>
<td bgcolor="<?=ALTBG2?>"><input type="button" value="论坛头像列表" onclick="window.location=('memcp.php?action=viewavatars&sid=<?=$sid?>')"></td>
</tr>
<? } elseif($allowavatar == 2) { ?>
<tr>
<td bgcolor="<?=ALTBG1?>">头像:</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="avatarnew" size="25" value="<?=$member['avatar']?>">&nbsp;&nbsp;<input type="button" value="论坛头像列表" onclick="window.location=('memcp.php?action=viewavatars&sid=<?=$sid?>')">
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
<td bgcolor="<?=ALTBG2?>"><textarea rows="4" cols="30" name="signew"><?=$member['signature']?></textarea></td>
</tr>

</table>
</td></tr></table><br>
<center><input type="submit" name="editsubmit" value="编辑个人资料"></center>
</form>
<? include template('footer'); ?>
