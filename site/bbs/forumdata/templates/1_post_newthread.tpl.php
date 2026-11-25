<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center" style="table-layout: fixed"> 
<tr><td class="nav" width="90%" nowrap>&nbsp;<a href="index.php"><?=$bbname?></a> <?=$navigation?> &raquo; 发新话题</td>
<td align="right" width="10%"><a href="#bottom"><img src="<?=IMGDIR?>/arrow_dw.gif" border="0" align="absmiddle"></a></td>        
</tr></table><br>

<script language="JavaScript">
var postmaxchars = <?=$maxpostsize?>;
var isadmin = <?=$isadmin?>;
function checklength(theform) {
        if (postmaxchars != 0) { message = "系统限制: <?=$maxpostsize?> 字节"; }
        else { message = ""; }
        alert("\n当前长度: "+theform.message.value.length+" 字节\n\n"+message);
}
function validate(theform) {
        if (theform.subject.value == "" || theform.message.value == "") {
                alert("请完成标题或内容栏。");
                return false; }
        if (postmaxchars != 0 && isadmin != 1) {
                if (theform.message.value.length > <?=$maxpostsize?>) {
                        alert("您的帖子长度超过限制\n\n当前长度: "+theform.message.value.length+" 字节\n系统限制: <?=$maxpostsize?> 字节");
                        return false; }
                else { return true; }
        } else { return true; }
}
</script>
<? if(isset($previewpost)) { include template('post_preview'); } ?>
<form method="post" name="input" action="post.php?action=newthread&fid=<?=$fid?>" <?=$enctype?> onSubmit="return validate(this)">
<input type="hidden" name="topicsubmit" value="submit">

<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">

<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr>
<td colspan="2" class="header">发新话题</td>
</tr>
<? include template('post_logging'); if($allowsetviewperm) { ?>
<tr>
<td bgcolor="<?=ALTBG1?>">浏览所需 积分:</td>
<td bgcolor="<?=ALTBG2?>" class="smalltxt"><input type="text" name="viewperm" size="6" value="<?=$viewperm?>"> 点 (0 为不限制)</td>
</tr>
<? } ?>
<tr>
<td bgcolor="<?=ALTBG1?>" width="20%">标题:</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="subject" size="45" value="<?=$subject?>" tabindex="3"></td>
</tr>
<tr><td bgcolor="<?=ALTBG1?>">图标:</td><td bgcolor="<?=ALTBG2?>"><?=$icons?></td></tr>
<? include template('post_bbinsert'); if($poll == 'yes' && $allowpostpoll) { ?>
<input type="hidden" name="poll" value="yes">
<tr>
<td bgcolor="<?=ALTBG1?>" valign="top">投票选项:<br>
<span class="smalltxt">每个选项一行，最多十行<br><br>
<input type="checkbox" name="multiplepoll" value="1"
<? if($multiplepoll) { ?>
checked
<? } ?>
> 多选投票
</span></td><td bgcolor="<?=ALTBG2?>">
<textarea rows="4" cols="85" name="polloptions" tabindex="5"><?=$polloptions?></textarea></td>
</tr>
<? } ?>
<tr>
<td bgcolor="<?=ALTBG1?>" valign="top">内容 <a href="###" onclick="checklength(document.input)" class="smalltxt">[字数检查]</a>:<br><br>
<span class="smalltxt">
html 状态 <?=$allowhtml?><br>
<a href="faq.php?page=messages#6" target="_blank">Smilies</a> 状态 <?=$allowsmilies?><br>
<a href="faq.php?page=misc#1" target="_blank">UBB 代码</a> 状态 <?=$allowbbcode?><br>
[img] 代码 状态 <?=$allowimgcode?>
</span><br><br><br><br>
<? include template('post_sminsert'); ?>
</td>
<td align="left" bgcolor="<?=ALTBG2?>" class="smalltxt">
<textarea rows="18" cols="85" name="message" tabindex="4" onSelect="javascript: storeCaret(this);" onClick="javascript: storeCaret(this);" onKeyUp="javascript: storeCaret(this);" onKeyDown="javascript: ctlent();"><?=$message?></textarea>
<br><br>
<input type="checkbox" name="parseurloff" value="1" <?=$urloffcheck?>> 禁用 URL 识别<br>
<input type="checkbox" name="smileyoff" value="1" <?=$smileoffcheck?>> 禁用 <a href="faq.php?page=messages#6" target="_blank">Smilies</a><br>
<input type="checkbox" name="bbcodeoff" value="1" <?=$codeoffcheck?>> 禁用 <a href="faq.php?page=misc#1" target="_blank">UBB 代码</a><br>
<input type="checkbox" name="usesig" value="1" <?=$usesigcheck?>> 使用个人签名<br>
<input type="checkbox" name="emailnotify" value="1"> 接收新回复邮件通知
<? if($ismoderator) { ?>
<br><input type="checkbox" name="toptopic" value="1"> 主题置顶
<br><input type="checkbox" name="addtodigest" value="1"> 精华帖子
<? } ?>
</td>
</tr>
<? if($allowpostattach) { ?>
<tr>
<td bgcolor="<?=ALTBG1?>">附件 <span class="smalltxt">(小于 <?=$maxattachsize_kb?> kb)</span>:</td>
<td bgcolor="<?=ALTBG2?>" class="smalltxt">
<? if($allowsetattachperm) { ?>
所需 积分 <input type="text" name="attachperm" value="0" size="5">&nbsp;
<? } ?>
<input type="file" name="attach" size="20">
<? if($attachextensions) { ?>
<br><br>可用扩展名: <?=$attachextensions?>
<? } ?>
</td>
</tr>
<? } ?>
</table>
</td></tr></table><br>
<center><input type="submit" name="topicsubmit" value="发新话题" tabindex="5">
<input type="submit" name="previewpost" value="预览帖子" tabindex="6">
</center>
</form>
<? include template('footer'); ?>
