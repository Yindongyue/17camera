<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center" style="table-layout: fixed"> 
<tr><td class="nav" width="90%" nowrap>&nbsp;<a href="index.php"><?=$bbname?></a> <?=$navigation?> &raquo; 编辑帖子</td>
<td align="right" width="10%"><a href="#bottom"><img src="<?=IMGDIR?>/arrow_dw.gif" border="0" align="absmiddle"></a></td>        
</tr></table><br>

<script language="JavaScript">
var postmaxchars = <?=$maxpostsize?>;
var isadmin = "<?=$isadmin?>";
function checklength(theform) {
        if (postmaxchars != 0) { message = "系统限制: <?=$maxpostsize?> 字节"; }
        else { message = ""; }
        alert("\n当前长度: "+theform.message.value.length+" 字节\n\n"+message);
}
function validate(theform) {
        if (theform.message.value == "" && theform.subject.value == "") {
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
<form method="post" name="input" action="post.php?action=edit" <?=$enctype?> onSubmit="return validate(this)">
<input type="hidden" name="editsubmit" value="submit">
<input type="hidden" name="page" value="<?=$page?>">

<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">

<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr>
<td colspan="2" class="header">编辑帖子</td>
</tr>
<? include template('post_logging'); if($allowsetviewperm && $isfirstpost) { ?>
<tr>
<td bgcolor="<?=ALTBG1?>">浏览所需 积分:</td>
<td bgcolor="<?=ALTBG2?>"><input type="text" name="viewperm" size="6" value="<?=$thread['creditsrequire']?>"> 点 (0 为不限制)</td>
</tr>
<? } ?>
<tr>
<td bgcolor="<?=ALTBG1?>" width="20%">标题:</td>
<td bgcolor="<?=ALTBG2?>">
<input type="text" name="subject" size="45" value="<?=$postinfo['subject']?>" tabindex="3">
<input type="hidden" name="origsubject" value="<?=$postinfo['subject']?>">
</td></tr>

<tr>
<td bgcolor="<?=ALTBG1?>">图标:</td><td bgcolor="<?=ALTBG2?>"><?=$icons?></td>
</tr>
<? include template('post_bbinsert'); if($polloptions) { ?>
<input type="hidden" name="poll" value="yes">
<tr>
<td bgcolor="<?=ALTBG1?>" valign="top">投票选项:<br>
<span class="smalltxt">每个选项一行，最多十行<br><br>
<input type="checkbox" name="multiplepoll" value="1"
<? if($polloptions['multiple']) { ?>
checked
<? } ?>
> 多选投票
</span></td><td bgcolor="<?=ALTBG2?>">
<? if(is_array($polloptions['options'])) { foreach($polloptions['options'] as $key => $option) { ?>
<input type="text" name="polloptions[<?=$key?>]" value="<?=$option[0]?>" size="55"><br>
<? } } ?>
</textarea></td>
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

<td bgcolor="<?=ALTBG2?>" class="smalltxt">
<textarea rows="18" cols="85" name="message" tabindex="4" onSelect="javascript: storeCaret(this);" onClick="javascript: storeCaret(this);" onKeyUp="javascript: storeCaret(this);" onKeyDown="javascript: ctlent();"><?=$postinfo['message']?></textarea>
<br><br>
<input type="checkbox" name="parseurloff" value="1" <?=$urloffcheck?>> 禁用 URL 识别<br>
<input type="checkbox" name="smileyoff" value="1" <?=$smileyoffcheck?>> 禁用 <a href="faq.php?page=messages#6" target="_blank">Smilies</a><br>
<input type="checkbox" name="bbcodeoff" value="1" <?=$codeoffcheck?>> 禁用 <a href="faq.php?page=misc#1" target="_blank">UBB 代码</a><br>
<input type="checkbox" name="usesig" value="1" <?=$usesigcheck?>> 使用个人签名<br>
<input type="checkbox" name="delete" value="1"> <b>!删除本贴</b></td>
</tr>
<? if($allowpostattach) { if($postinfo['aid']) { ?>
<tr>
<td bgcolor="<?=ALTBG1?>" valign="top">附件 <span class="smalltxt">(小于 <?=$maxattachsize_kb?> kb)</span>:</td>
<td bgcolor="<?=ALTBG2?>" class="smalltxt">当前附件: <?=$attachicon?> <a href="attachment.php?aid=<?=$postinfo['aid']?>" target="_blank"><?=$postattach['filename']?></a> (<?=$attachsize?>, 下载次数 <?=$postattach['downloads']?>)<br>
<input type="radio" checked name="attachedit" value="" onclick="this.form.attach.disabled=this.checked;if(<?=$allowsetattachperm?>) {this.form.attachperm.disabled=this.checked;this.form.origattachperm.disabled=!this.checked;}"> <span class="bold">保留附件</span>
<? if($allowsetattachperm) { ?>
&nbsp;所需 积分 <input type="text" name="origattachperm" value="<?=$postattach['creditsrequire']?>" size="5">
<? } ?>
<br><input type="radio" name="attachedit" value="delete" onclick="this.form.attach.disabled=this.checked;if(<?=$allowsetattachperm?>) {this.form.origattachperm.disabled=this.form.attachperm.disabled=this.checked}"> <span class="bold">删除附件</span><br>
<input type="radio" name="attachedit" value="new" onclick="this.form.attach.disabled=!this.checked;if(<?=$allowsetattachperm?>) {this.form.origattachperm.disabled=this.checked;this.form.attachperm.disabled=!this.checked;}"> <span class="bold">上传新附件</span>
<? if($allowsetattachperm) { ?>
&nbsp;所需 积分 <input type="text" name="attachperm" value="0" size="5" disabled>&nbsp;
<? } ?>
<input type="file" name="attach" size="20" disabled>
<? if($attachextensions) { ?>
<br><br>可用扩展名: <?=$attachextensions?>
<? } ?>
</td></tr>
<? } else { ?>
<tr>
<td bgcolor="<?=ALTBG1?>">附件 <span class="smalltxt">(小于 <?=$maxattachsize_kb?> kb)</span>:</td>
<td bgcolor="<?=ALTBG2?>" class="smalltxt"><input type="hidden" name="attachedit" value="new">
<? if($setattachperm) { ?>
&nbsp;所需 积分 <input type="text" name="attachperm" value="0" size="5">&nbsp;
<? } ?>
<input type="file" name="attach" size="20">
<? if($attachextensions) { ?>
<br><br>可用扩展名: <?=$attachextensions?>
<? } ?>
</td></tr>
<? } } ?>
</table>
</td></tr></table><br>
<input type="hidden" name="fid" value="<?=$fid?>">
<input type="hidden" name="tid" value="<?=$tid?>">
<input type="hidden" name="pid" value="<?=$pid?>">
<input type="hidden" name="postsubject" value="<?=$postinfo['subject']?>">
<center><input type="submit" name="editsubmit" value="编辑帖子" tabindex="5">
<input type="submit" name="previewpost" value="预览帖子" tabindex="6"></center>
</form>
<? include template('footer'); ?>
