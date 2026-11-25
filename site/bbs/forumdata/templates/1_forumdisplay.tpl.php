<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center" style="table-layout: fixed"> 
<tr><td class="nav" width="90%" nowrap>&nbsp;<a href="index.php"><?=$bbname?></a> <?=$navigation?></td>
<td align="right" width="10%"><a href="#bottom"><img src="<?=IMGDIR?>/arrow_dw.gif" border="0" align="absmiddle"></a></td>        
</tr></table><br>

<table width="<?=TABLEWIDTH?>" cellspacing="0" cellpadding="<?=TABLESPACE?>" align="center">
<tr class="mediumtxt"><td class="smalltxt">(版主: <span class="bold">
<? if($moderatedby) { ?>
<?=$moderatedby?>
<? } else { ?>
*空缺中*
<? } ?>
</span>)</td><td align="right" class="smalltxt"><img src="<?=IMGDIR?>/showdigest.gif" border="0" align="absmiddle">
<? if($filter == 'digest') { ?>
<a href="forumdisplay.php?fid=<?=$fid?>">查看全部主题</a>
<? } else { ?>
<a href="forumdisplay.php?fid=<?=$fid?>&filter=digest">查看本版精华</a>
<? } if($ismoderator && $topicsnum) { ?>
&nbsp; &nbsp; <img src="<?=IMGDIR?>/delthread.gif" border="0" align="absmiddle"> <a href="###" onclick="this.document.delthread.submit();">删除选定主题</a>
<? } ?>
</td></tr>
<tr><td></td></tr>
</table>
<? if($whosonlinestatus) { ?>
<table border="0" cellspacing="0" cellpadding="0" width="<?=TABLEWIDTH?>" bgcolor="<?=BORDERCOLOR?>" align="center">
<tr><td>
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header"><td width="92%">正在浏览此论坛的会员</td><td width="8%" align="center" nowrap><a href="javascript: this.location.reload();"><font class="navtd" style="font-weight: normal">刷 新</font></a></td></tr>

<tr><td bgcolor="<?=ALTBG2?>" colspan="2" onMouseOver ="this.style.backgroundColor='<?=ALTBG1?>'" onMouseOut ="this.style.backgroundColor='<?=ALTBG2?>'">
<table cellspacing="0" cellpadding="0" border="0" width="98%" align="center">

<tr><td nowrap>
<? if(is_array($whosonline)) { foreach($whosonline as $key => $online) { if($key % 7 == 0) { ?>
</td></tr><tr><td width="15%" nowrap>
<? } else { ?>
</td><td width="15%" nowrap>
<? } ?>
<img src="<?=IMGDIR?>/<?=$online['icon']?>" align="absmiddle">
<a href="viewpro.php?username=<?=$online['usernameenc']?>" title="时间: <?=$online['lastactivity']?><?="\n"?>
动作: <?=$online['action']?><?="\n"?>
论坛: <?=$forum['name']?>"><?=$online['username']?></a>
<? } } ?>
</td></tr></table></td></tr>
</table></td></tr></table>
<? } if(!empty($newpmexists)) { include template('pmprompt'); } if($subexists) { include template('forumdisplay_subforum'); } ?>
<form method="post" name="delthread" action="topicadmin.php?action=delthread&fid=<?=$fid?>&page=<?=$page?>">
<table width="<?=TABLEWIDTH?>" cellspacing="0" cellpadding="0" align="center">
<tr><td class="multi"><?=$multipage?></td>
<td align="right">
<a href="post.php?action=newthread&fid=<?=$fid?>"><img src="<?=IMGDIR?>/newtopic.gif" border="0"></a>
<? if($allowpostpoll) { ?>
&nbsp;<a href="post.php?action=newthread&fid=<?=$fid?>&poll=yes"><img src="<?=IMGDIR?>/poll.gif" border="0"></a>
<? } ?>
</td></tr></table>

<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center" bgcolor="<?=BORDERCOLOR?>"><tr><td>
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%" >
<tr class="header">
<td width="4%">&nbsp;</td>
<td width="4%">&nbsp;</td>
<td width="47%" align="center">标题</td>
<td width="14%" align="center" nowrap>作者</td>
<td width="6%" align="center" nowrap>回复</td>
<td width="6%" align="center" nowrap>查看</td>
<td width="19%" align="center">最后发表</td>
</tr>
<? if($separatepos) { ?>
<tr class="category"><td>&nbsp;</td><td colspan="6"><span class="bold">重要主题</span></td></tr>
<? } if($topicsnum) { if(is_array($threadlist)) { foreach($threadlist as $key => $thread) { if($separatepos == $key && $key != 0) { ?>
<tr class="category"><td>&nbsp;</td><td colspan="6"><span class="bold">普通主题</span></td></tr>
<? } ?>
<tr>
<td bgcolor="<?=ALTBG2?>" align="center"><a href="viewthread.php?tid=<?=$thread['tid']?>" target="_blank"><img src="<?=IMGDIR?>/<?=$thread['folder']?>" border="0"></a></td>
<td bgcolor="<?=ALTBG1?>" align="center"><?=$thread['icon']?></td>
<td bgcolor="<?=ALTBG2?>" onMouseOver ="this.style.backgroundColor='<?=ALTBG1?>'" onMouseOut ="this.style.backgroundColor='<?=ALTBG2?>'">
<? if($ismoderator) { ?>
<input type="checkbox" name="delete[]" value="<?=$thread['tid']?>">
<? } if($thread['new']) { ?>
<a href="redirect.php?tid=<?=$thread['tid']?>&goto=newpost<?=$highlight?>"><img src="<?=IMGDIR?>/firstnew.gif" border="0" align="absmiddle"></a>
<? } if(substr($thread['closed'], 0, 5) == 'moved') { ?>
移动:&nbsp;
<? } elseif($thread['digest']) { ?>
<img src="<?=IMGDIR?>/digest.gif" align="absmiddle"> 精华<b>
<? echo substr('III', - $thread['digest']); ?>
</b>:&nbsp;
<? } elseif($thread['topped']) { ?>
<img src="<?=IMGDIR?>/pin.gif" align="absmiddle"> 置顶<b>
<? echo substr('III', - $thread['topped']); ?>
</b>:&nbsp;
<? } elseif($thread['pollopts']) { ?>
<img src="<?=IMGDIR?>/pollsmall.gif" align="absmiddle"> 投票:&nbsp;
<? } ?>
<a href="viewthread.php?tid=<?=$thread['tid']?>"><?=$thread['subject']?>
<? if($thread['creditsrequire']) { ?>
- [积分<span class="bold"><?=$thread['creditsrequire']?></span>点]
<? } ?>
</a><?=$thread['multipage']?>
<? if($ismoderator && $modshortcut) { ?>
<div align="right" class="smalltxt">
[<a href="topicadmin.php?action=delete&tid=<?=$thread['tid']?>">删</a><a href="topicadmin.php?action=close&tid=<?=$thread['tid']?>">关</a><a href="topicadmin.php?action=move&tid=<?=$thread['tid']?>">移</a><a href="topicadmin.php?action=top&tid=<?=$thread['tid']?>">顶</a><a href="topicadmin.php?action=bump&tid=<?=$thread['tid']?>">提</a><a href="topicadmin.php?action=digest&tid=<?=$thread['tid']?>">精</a>]
</div>
<? } ?>
</td><td bgcolor="<?=ALTBG1?>" align="center">
<? if($thread['author'] != 'Guest') { ?>
<a href="viewpro.php?username=<?=$thread['authorenc']?>"><?=$thread['author']?></a>
<? } else { ?>
游客
<? } ?>
<br><span class="smalltxt"><?=$thread['dateline']?></span></td>
<td bgcolor="<?=ALTBG2?>" align="center"><?=$thread['replies']?></td>
<td bgcolor="<?=ALTBG1?>" align="center"><?=$thread['views']?></td>
<td bgcolor="<?=ALTBG2?>">
<table cellpadding="0" cellspacing="0" border="0" width="100%"><tr align="right">
<td nowrap><font class="smalltxt"><?=$thread['lastpost']?><br>
by
<? if($thread['lastposter'] != 'Guest') { ?>
<a href="viewpro.php?username=<?=$thread['lastposterenc']?>"><?=$thread['lastposter']?></a>
<? } else { ?>
游客
<? } ?>
</font></td><td nowrap>&nbsp;<a href="redirect.php?tid=<?=$thread['tid']?>&goto=lastpost<?=$highlight?>"><img src="<?=IMGDIR?>/lastpost.gif" border="0"></a>
</td></tr></table></td></tr>
<? } } } else { ?>
<tr><td colspan="7" bgcolor="<?=ALTBG1?>">本论坛或指定的范围内尚无主题。</td></tr>
<? } ?>
</table></td></tr></table>

<table width="<?=TABLEWIDTH?>" cellspacing="0" cellpadding="0" align="center">
<tr><td class="multi" valign="top"><?=$multipage?></td><td align="right"><br>
<a href="post.php?action=newthread&fid=<?=$fid?>"><img src="<?=IMGDIR?>/newtopic.gif" border="0"></a>
<? if($allowpostpoll) { ?>
&nbsp;<a href="post.php?action=newthread&fid=<?=$fid?>&poll=yes"><img src="<?=IMGDIR?>/poll.gif" border="0"></a>
<? } ?>
</td></tr></table></form>
<? if($fastpost) { ?>
<script language="JavaScript">
var postmaxchars = <?=$maxpostsize?>;
var isadmin = <?=$isadmin?>;
function validate(theform) {
        if (theform.subject.value == "" || theform.message.value == "") {
                	alert("请完成标题和内容栏。");
                	return false; }
        	if (postmaxchars != 0 && isadmin != 1) {
                if (theform.message.value.length > <?=$maxpostsize?>) {
                        	alert("您的帖子长度超过限制\n\n当前长度: "+theform.message.value.length+" 字节\n系统限制: <?=$maxpostsize?> 字节");
                        	return false; }
                	else { return true; }
        	} else { return true; }
}
</script>
<form method="post" name="input" action="post.php?action=newthread&fid=<?=$fid?>" onSubmit="return validate(this)">
<input type="hidden" name="topicsubmit" value="submit">
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center" bgcolor="<?=BORDERCOLOR?>"><tr><td>
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr><td colspan="2" class="header">快速发新话题</td></tr>
<tr>
<td width="18%" bgcolor="<?=ALTBG1?>">标题:</td>
<td width="82%" bgcolor="<?=ALTBG2?>"><input type="text" name="subject" size="80" value="" tabindex="1"></td>
</tr>
<tr>
<td width="18%" bgcolor="<?=ALTBG1?>" valign="top">选项:<br><span class="smalltxt">
<input type="checkbox" name="parseurloff" value="1"> 禁用 URL 识别<br>
<input type="checkbox" name="smileyoff" value="1" <?=$smileyoffcheck?>> 禁用 <a href="faq.php?page=messages#6" target="_blank">Smilies</a><br>
<input type="checkbox" name="bbcodeoff" value="1" <?=$codeoffcheck?>> 禁用 <a href="faq.php?page=misc#1" target="_blank">UBB 代码</a><br>
<input type="checkbox" name="usesig" value="1" <?=$usesigcheck?>> 使用个人签名<br>
<input type="checkbox" name="emailnotify" value="1"> 接收新回复邮件通知</span>
</td>
<td width="82%" bgcolor="<?=ALTBG2?>" valign="middle" class="smalltxt"><textarea rows="7" cols="90" name="message" onKeyDown="javascript: ctlent();" tabindex="2"></textarea><br>
<input type="submit" name="topicsubmit" value="发表帖子" tabindex="3">&nbsp; &nbsp;
<input type="submit" name="previewpost" value="预览帖子" tabindex="4">&nbsp; &nbsp;
<input type="reset" name="topicsreset" value="清空内容" tabindex="5">&nbsp; &nbsp;[完成后可按 Ctrl+Enter 发布]</td>
</tr></table></td></tr></table></form>
<? } ?>
<br>
<form method="post" action="forumdisplay.php?fid=<?=$fid?>">
<table width="<?=TABLEWIDTH?>" cellspacing="0" cellpadding="0" align="center">
<tr class="mediumtxt"><td align="left" class="smalltxt">
<span class="bold">论坛跳转: </span>
<select onchange="if(this.options[this.selectedIndex].value != '') {
window.location=('forumdisplay.php?fid='+this.options[this.selectedIndex].value+'&sid=<?=$sid?>') }">
<?=$forumselect?>
</select>
</td><td align="right" class="smalltxt">
查看 <select name="filter">
<option value="digest" <?=$check['digest']?>>精华主题</option>
<option value="0" <?=$check[0]?>>全部主题</option>
<option value="86400" <?=$check[86400]?>>1 天以来</option>
<option value="172800" <?=$check[172800]?>>2 天以来</option>
<option value="604800" <?=$check[604800]?>>1 周以来</option>
<option value="2592000" <?=$check[2592000]?>>1 个月以来</option>
<option value="7948800" <?=$check[7948800]?>>3 个月以来</option>
<option value="15897600" <?=$check[15897600]?>>6 个月以来</option>
<option value="31536000" <?=$check[31536000]?>>1 年以来</option>
</select>&nbsp;&nbsp;<select name="ascdesc">
<option value="ASC" <?=$check['asc']?>>按升序排列</option>
<option value="DESC" <?=$check['desc']?>>按降序排列</option>
</select>&nbsp;
<input type="submit" value="提 &nbsp; 交">
</td></tr></table></form><br>
<table width="365" align="center">
<tr class="mediumtxt"><td class="smalltxt"><img src="<?=IMGDIR?>/red_folder.gif" alt="有新回复" align="absmiddle">&nbsp; 有新回复</td><td class="smalltxt">(&nbsp;<img src="<?=IMGDIR?>/hot_red_folder.gif" alt="多于 <?=$hottopic?> 篇回复" align="absmiddle">&nbsp; 多于 <?=$hottopic?> 篇回复 )</td><td class="smalltxt"><img src="<?=IMGDIR?>/lock_folder.gif" alt="关闭的主题" align="absmiddle">&nbsp; 关闭的主题</td></tr>
<tr class="mediumtxt"><td class="smalltxt"><img src="<?=IMGDIR?>/folder.gif" alt="无新回复" align="absmiddle">&nbsp; 无新回复</td><td class="smalltxt">(&nbsp;<img src="<?=IMGDIR?>/hot_folder.gif" alt="多于 <?=$hottopic?> 篇回复" align="absmiddle">&nbsp; 多于 <?=$hottopic?> 篇回复 )</td><td class="smalltxt">&nbsp;</td></tr>
</table><br>
<? include template('footer'); ?>
