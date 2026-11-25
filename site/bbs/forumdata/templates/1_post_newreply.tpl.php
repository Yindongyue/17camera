<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center" style="table-layout: fixed"> 
<tr><td class="nav" width="90%" nowrap>&nbsp;<a href="index.php"><?=$bbname?></a> <?=$navigation?> &raquo; 发表回复</td>
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
<form method="post" name="input" action="post.php?action=reply&fid=<?=$fid?>&tid=<?=$tid?>" <?=$enctype?> onSubmit="return validate(this)">
<input type="hidden" name="replysubmit" value="submit">

<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">

<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr>
<td colspan="2" class="header">发表回复</td>
</tr>
<? include template('post_logging'); ?>
<tr>
<td bgcolor="<?=ALTBG1?>" width="20%">标题:</td>
<td bgcolor="<?=ALTBG2?>" class="smalltxt"><input type="text" name="subject" size="45" value="<?=$subject?>" tabindex="3">&nbsp;&nbsp;(可选)</td>
</tr>
<tr><td bgcolor="<?=ALTBG1?>">图标:</td><td bgcolor="<?=ALTBG2?>"><?=$icons?></td></tr>
<? include template('post_bbinsert'); ?>
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
<textarea rows="18" cols="85" name="message" tabindex="4" onSelect="javascript: storeCaret(this);" onClick="javascript: storeCaret(this);" onKeyUp="javascript: storeCaret(this);" onKeyDown="javascript: ctlent();"><?=$message?></textarea>
<br><br>
<input type="checkbox" name="parseurloff" value="1"> 禁用 URL 识别<br>
<input type="checkbox" name="smileyoff" value="1" <?=$smileyoffcheck?>> 禁用 <a href="faq.php?page=messages#6" target="_blank">Smilies</a><br>
<input type="checkbox" name="bbcodeoff" value="1" <?=$codeoffcheck?>> 禁用 <a href="faq.php?page=misc#1" target="_blank">UBB 代码</a><br>
<input type="checkbox" name="usesig" value="1" <?=$usesigcheck?>> 使用个人签名<br>
<input type="checkbox" name="emailnotify" value="1"> 接收新回复邮件通知
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
<br><br>可用扩展名:<?=$attachextensions?>
<? } ?>
</td>
</tr>
<? } ?>
</table>
</td></tr></table><br>
<center><input type="submit" name="replysubmit" value="发表回复" tabindex="5">
<input type="submit" name="previewpost" value="预览帖子" tabindex="6">
</center>
</form>

<br>
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">

<table border="0" cellspacing="1" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header">
<td colspan="2">主题回顾</td>
</tr>
<? if($thread['replies'] > $ppp) { ?>
<tr bgcolor="<?=ALTBG1?>"><td colspan="2" valign="top" width="20%">本主题回复较多，请 <a href="viewthread.php?fid=<?=$fid?>&tid=<?=$tid?>">点击这里</a> 查看。</td></tr>
<? } else { if(is_array($postlist)) { foreach($postlist as $post) { ?>
<tr bgcolor="<?=$post['thisbg']?>">
<td rowspan="2" valign="top" width="20%"><span class="bold"><?=$post['author']?></span><br><br></td><td class="smalltxt">
<? if($post['icon']) { ?>
<img src="<?=SMDIR?>/<?=$post['icon']?>" align="absmiddle">
<? } ?>
&nbsp;发表于 <?=$post['dateline']?></td></tr>
<tr bgcolor="<?=$post['thisbg']?>"><td>
<table height="100%" width="100%" border="0" cellspacing="0" cellpadding="0" style="table-layout: fixed; word-wrap: break-word">
<tr><td><p><?=$post['message']?></p><br></td></tr></table></td></tr>
<? } } } ?>
</table></td></tr></table>
<? include template('footer'); ?>
