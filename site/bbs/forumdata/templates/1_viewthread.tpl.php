<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center" style="table-layout: fixed"> 
<tr><td class="nav" width="90%" nowrap>&nbsp;<a href="index.php"><?=$bbname?></a> <?=$navigation?></td>
<td align="right" width="10%"><a href="#bottom"><img src="<?=IMGDIR?>/arrow_dw.gif" border="0" align="absmiddle"></a></td>
</tr></table><br>
<? if($polloptions) { include template('viewthread_poll'); } if($newpmexists) { include template('pmprompt'); } ?>
<form name="delpost" method="post" action="topicadmin.php?action=delpost&fid=<?=$fid?>&tid=<?=$tid?>&page=<?=$page?>">
<table width="<?=TABLEWIDTH?>" cellspacing="0" cellpadding="0" align="center">
<tr><td class="multi"><?=$multipage?>
<? if($thread['creditsrequire']) { ?>
&nbsp; 浏览所需 积分 <span class=\"bold\"><?=$thread['creditsrequire']?></span> 点
<? } ?>
</td><td align="right"><a href="post.php?action=newthread&fid=<?=$fid?>"><img src="<?=IMGDIR?>/newtopic.gif" border="0"></a>
<? if($allowpostpoll) { ?>
&nbsp;<a href="post.php?action=newthread&fid=<?=$fid?>&poll=yes"><img src="<?=IMGDIR?>/poll.gif" border="0"></a>
<? } if(!$thread['closed'] || ($thread['closed'] && !$ismoderator)) { ?>
&nbsp;<a href="post.php?action=reply&fid=<?=$fid?>&tid=<?=$tid?>"><img src="<?=IMGDIR?>/reply.gif" border="0"></a>
<? } ?>
</td></tr></table>

<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">

<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header"><td width="21%">作者:</td>

<td><table cellspacing="0" cellpadding="0" border="0" width="100%" class="smalltxt" style="table-layout: fixed; word-wrap: break-word">
<tr style="color: <?=HEADERTEXT?>"><td class="bold">标题: <?=$thread['subject']?></td>
<td align="right" width="150" nowrap>
<? if($highlightstatus) { ?>
<a href="viewthread.php?tid=<?=$tid?>&page=<?=$page?>" style="color: <?=HEADERTEXT?>;font-weight: normal">取消高亮</a> |
<? } ?>
<a href="redirect.php?fid=<?=$fid?>&tid=<?=$tid?>&goto=nextoldset" style="color: <?=HEADERTEXT?>;font-weight: normal">上一主题</a> | 
<a href="redirect.php?fid=<?=$fid?>&tid=<?=$tid?>&goto=nextnewset" style="color: <?=HEADERTEXT?>;font-weight: normal">下一主题</a></td>
</tr></table></td>

</tr></table></td></tr></table>
<? if(is_array($postlist)) { foreach($postlist as $post) { ?>
<a name="pid<?=$post['pid']?>"><table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%" style="table-layout: fixed; word-wrap: break-word">
<tr bgcolor="<?=$post['thisbg']?>">
<td valign="top" width="21%">
<? if($ismoderator) { ?>
<a href="topicadmin.php?action=getip&fid=<?=$fid?>&tid=<?=$tid?>&pid=<?=$post['pid']?>"><img src="<?=IMGDIR?>/ip.gif" border="0" align="right" alt="查看 IP"></a>
<? } if($post['author'] == 'Guest') { ?>
<span class="bold"">游客</span><br><span class="smalltxt">未注册
<? } elseif(!$post['username']) { ?>
<span class="bold""><?=$post['author']?></span><br><span class="smalltxt">该用户已被删除
<? } else { ?>
<span class="bold""><?=$post['author']?></span><br><span class="smalltxt"><?=$post['authortitle']?>
<? } ?>
<br><?=$post['stars']?><br><br>
<? if($post['avatar']) { ?>
<table width="95%" border="0" cellspacing="0" cellpadding="0" style="table-layout: fixed">
<tr><td align="center"><?=$post['avatar']?></td></tr></table><br>
<? } else { ?>
<br><br>
<? } ?>
积分 <?=$post['credit']?><br>
发贴 <?=$post['postnum']?><br>
性别&nbsp;
<? if($post['gender'] == 1) { ?>
男
<? } elseif($post['gender'] ) { ?>
女
<? } else { ?>
保密
<? } ?>
<br>
注册 <?=$post['regdate']?>
<? if($post['location']) { ?>
<br>来自 <?=$post['location']?>
<? } ?>
<br>
<? if($vtonlinestatus && $post['author'] != 'Guest') { if($timestamp - $post['lastvisit'] <= 5 * $onlinehold) { ?>
状态 <b>在线</b>
<? } else { ?>
状态 离线
<? } } ?>
</span>
</td>
<td height="100%">
<table height="100%" width="100%" border="0" cellspacing="0" cellpadding="0" style="table-layout: fixed;word-wrap: break-word">
<tr><td valign="top"><?=$post['karma']?>
<span class="bold"><span class="smalltxt"><?=$post['subject']?></span></span>
<?=$post['message']?>
<? if($post['aaid']) { ?>
<br><br><?=$post['attachicon']?>
<? if($post['attachimg'] == 0) { ?>
&nbsp;附件: <a href="attachment.php?aid=<?=$post['aaid']?>" target="_blank"><?=$post['filename']?></a> (<?=$post['attachsize']?>)<br><span class="smalltxt">该附件被下载次数 <?=$post['downloads']?>
<? if($post['creditsrequire']) { ?>
, 下载附件所需 积分 <?=$post['creditsrequire']?> 点
<? } ?>
</span><br>
<? } elseif($post['attachimg'] == 1) { ?>
&nbsp;本贴包含图片附件: <br><br><a href="<?=$attachurl?>/<?=$post['attachment']?>" target="_blank"><img src="<?=$attachurl?>/<?=$post['attachment']?>" border="0" alt="点击查看全图" onload="javascript:if(this.width>screen.width-333) this.width=screen.width-333"></a>
<? } elseif($post['attachimg'] == 2) { ?>
&nbsp;本贴包含 flash 附件: <br><br><embed width="400" height="300" src="<?=$attachurl?>/<?=$post['attachment']?>" type="application/x-shockwave-flash"></embed>
<? } } if($post['signature']) { ?>
<br><br></td></tr><tr><td valign="bottom"><img src="images/common/sigline.gif"><br><?=$post['signature']?>
<? } ?>
</td></tr></table>
</td></tr>
<tr bgcolor="<?=$post['thisbg']?>"><td valign="middle">
<table border="0" cellspacing="0" cellpadding="0" width="100%" class="smalltxt"><tr><td>
<? if($ismoderator) { ?>
<input type="checkbox" name="delete[]" value="<?=$post['pid']?>">
<? } if($post['icon']) { ?>
<img src="<?=SMDIR?>/<?=$post['icon']?>" align="absmiddle">
<? } else { ?>
<img src="<?=IMGDIR?>/lastpost.gif" align="absmiddle">
<? } ?>
<?=$post['dateline']?></td><td align="right"><span class="bold" align="right">#<?=$post['number']?></span></td></tr></table></td><td valign="middle">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr class="smalltxt"><td align="left">
<? if($post['author'] != 'Guest') { ?>
<a href="viewpro.php?username=<?=$post['authorenc']?>"><img src="<?=IMGDIR?>/profile.gif" border="0" alt="查看资料"></a>&nbsp;
<? if($post['showemail']) { ?>
<a href="mailto:<?=$post['email']?>"><img src="<?=IMGDIR?>/email.gif" border="0" alt="发送邮件"></a>&nbsp;
<? } if($post['site']) { ?>
<a href="<?=$post['site']?>" target="_blank"><img src="<?=IMGDIR?>/site.gif" border="0" alt="访问主页"></a>&nbsp;
<? } ?>
<a href="search.php?srchuname=<?=$post['authorenc']?>&srchfid=all&srchfrom=0&searchsubmit=yes"><img src="<?=IMGDIR?>/find.gif" border="0" alt="搜索该用户的全部帖子"></a>&nbsp;
<a href="pm.php?action=send&username=<?=$post['authorenc']?>" target="_blank"><img src="<?=IMGDIR?>/pm.gif" border="0" alt="发短消息"></a>&nbsp;
<? if($post['oicq']) { ?>
<a href="http://search.tencent.com/cgi-bin/friend/user_show_info?ln=<?=$post['oicq']?>" target="_blank"><img src="<?=IMGDIR?>/oicq.gif" alt="OICQ" border="0"></a>&nbsp;
<? } if($post['icq']) { ?>
<a href="http://wwp.icq.com/scripts/search.dll?to=<?=$post['icq']?>" target="_blank"><img src="http://web.icq.com/whitepages/online?icq=<?=$post['icq']?>&img=5" alt="ICQ 状态" border="0"></a>&nbsp;
<? } if($post['yahoo']) { ?>
<a href="http://edit.yahoo.com/config/send_webmesg?.target=<?=$post['yahoo']?>&.src=pg" target="_blank"><img src="<?=IMGDIR?>/yahoo.gif" alt="Yahoo" border="0"></a>&nbsp;
<? } } ?>
</td><td align="right">
&nbsp;<a href="post.php?action=edit&fid=<?=$fid?>&tid=<?=$tid?>&pid=<?=$post['pid']?>&page=<?=$page?>"><img src="<?=IMGDIR?>/edit.gif" border="0" alt="编辑帖子"></a>
<? if(!$thread['closed'] || $ismoderator) { ?>
&nbsp;<a href="post.php?action=reply&fid=<?=$fid?>&tid=<?=$tid?>&repquote=<?=$post['pid']?>"><img src="<?=IMGDIR?>/quote.gif" border="0" alt="引用回复"></a>
<? } if($discuz_user && $reportpost) { ?>
&nbsp;<a href="misc.php?action=report&fid=<?=$fid?>&tid=<?=$tid?>&pid=<?=$post['pid']?>"><img src="<?=IMGDIR?>/report.gif" border="0" alt="向版主反应这个帖子"></a>
<? } if($allowkarma && $maxkarmarate) { ?>
&nbsp;<select name="fid" onchange="if(this.options[this.selectedIndex].value != '') {
window.location=('misc.php?action=karma&tid=<?=$tid?>&pid=<?=$post['pid']?>&username=<?=$post['authorenc']?>&score='+this.options[this.selectedIndex].value+'&sid=<?=$sid?>') }" align="absmiddle">
<option value="">评分</option>
<option value="">----</option>
<?=$karmaoptions?>
</select>
<? } ?>
</td></tr></table>
</td></tr>
</table>
</td></tr></table></a>
<? } } ?>
<table width="<?=TABLEWIDTH?>" cellspacing="0" cellpadding="0" align="center">
<tr>
<td class="multi" valign="top"><?=$multipage?></td><td align="right"><br>
<a href="post.php?action=newthread&fid=<?=$fid?>"><img src="<?=IMGDIR?>/newtopic.gif" border="0"></a>
<? if($allowpostpoll) { ?>
&nbsp;<a href="post.php?action=newthread&fid=<?=$fid?>&poll=yes"><img src="<?=IMGDIR?>/poll.gif" border="0"></a>
<? } if(!$thread['closed'] || ($thread['closed'] && !$ismoderator)) { ?>
&nbsp;<a href="post.php?action=reply&fid=<?=$fid?>&tid=<?=$tid?>"><img src="<?=IMGDIR?>/reply.gif" border="0"></a>
<? } ?>
</td></tr></table></form>

<br><table width="310" cellspacing="0" cellpadding="0" align="center">
<td align="center" bgcolor="<?=BORDERCOLOR?>" width="30%">
<table border="0" cellspacing="<?=BORDERWIDTH?>" width="100%">
<tr><td bgcolor="<?=ALTBG2?>" align="center" class="smalltxt" nowrap>
<a href="viewthread.php?fid=<?=$fid?>&tid=<?=$tid?>&action=printable" target="_blank">可打印版本</a> | 
<a href="misc.php?action=emailfriend&tid=<?=$tid?>">推荐给朋友</a> | 
<a href="memcp.php?action=subscriptions&subadd=<?=$tid?>">订阅主题</a> | 
<a href="memcp.php?action=favorites&favadd=<?=$tid?>">收藏主题</a>
</td></tr></table></td></tr></table><br>
<? if($fastpost) { ?>
<script language="JavaScript">
var postmaxchars = <?=$maxpostsize?>;
var isadmin = <?=$isadmin?>;
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
<form method="post" name="input" action="post.php?action=reply&fid=<?=$fid?>&tid=<?=$tid?>" onSubmit="return validate(this)">
<input type="hidden" name="replysubmit" value="submit">
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center" bgcolor="<?=BORDERCOLOR?>"><tr><td>
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr><td colspan="2" class="header">快速回复主题</td></tr>
<tr>
<td width="18%" bgcolor="<?=ALTBG1?>">标题:</td>
<td width="82%" bgcolor="<?=ALTBG2?>" class="smalltxt"><input type="text" name="subject" size="80" value="" tabindex="1"> &nbsp; (选填内容)</td>
</tr>
<tr>
<td width="18%" bgcolor="<?=ALTBG1?>" valign="top">选项:<br><span class="smalltxt">
<input type="checkbox" name="parseurloff" value="1"> 禁用 URL 识别<br>
<input type="checkbox" name="smileyoff" value="1"> 禁用 <a href="faq.php?page=messages#6" target="_blank">Smilies</a><br>
<input type="checkbox" name="bbcodeoff" value="1"> 禁用 <a href="faq.php?page=misc#1" target="_blank">UBB 代码</a><br>
<input type="checkbox" name="usesig" value="1" <?=$usesigcheck?>> 使用个人签名<br>
<input type="checkbox" name="emailnotify" value="1"> 接收新回复邮件通知</span>
</td>
<td width="82%" bgcolor="<?=ALTBG2?>" class="smalltxt"><textarea rows="7" cols="90" name="message" onKeyDown="javascript: ctlent();" tabindex="2"></textarea><br>
<input type="submit" name="replysubmit" value="发表帖子" tabindex="3">&nbsp;&nbsp;&nbsp;
<input type="submit" name="previewpost" value="预览帖子" tabindex="4">&nbsp;&nbsp;&nbsp;
<input type="reset" name="topicsreset" value="清空内容" tabindex="5">&nbsp; &nbsp;[完成后可按 Ctrl+Enter 发布]</td>
</tr></table></td></tr></table></form>
<? } ?>
<br><table width="<?=TABLEWIDTH?>" cellspacing="0" cellpadding="0" align="center">
<tr class="mediumtxt"><td align="left" class="smalltxt">
<span class="bold">论坛跳转:</span>
<select onchange="if(this.options[this.selectedIndex].value != '') {
window.location=('forumdisplay.php?fid='+this.options[this.selectedIndex].value+'&sid=<?=$sid?>') }">
<?=$forumselect?>
</select>
</td><td align="right" class="smalltxt">
<? if($ismoderator) { ?>
<span class="bold">管理选项:</span>
<select name="action" id="action" onchange="if(this.options[this.selectedIndex].value != '') { if(this.options[this.selectedIndex].value != 'delpost') {
window.location=('topicadmin.php?tid=<?=$tid?>&fid=<?=$fid?>&action='+this.options[this.selectedIndex].value+'&sid=<?=$sid?>');
} else { this.document.delpost.submit(); } }">
<option value="" selected>管理选项</option>
<option value="delpost">删除帖子</option>
<option value="delete">删除主题</option>
<option value="close">
<? if($thread['closed']) { ?>
打开主题
<? } else { ?>
关闭主题
<? } ?>
</option>
<option value="move">移动主题</option>
<option value="digest">
<? if($thread['digest']) { ?>
解除精华
<? } else { ?>
加入精华
<? } ?>
</option>
<option value="top">
<? if($thread['topped']) { ?>
解除置顶
<? } else { ?>
主题置顶
<? } ?>
</option>
<option value="split">分割主题</option>
<option value="merge">合并主题</option>
<option value="bump">提升主题</option>
</select>
<? } ?>
</td>
</tr></table><br><br>
<? include template('footer'); ?>
