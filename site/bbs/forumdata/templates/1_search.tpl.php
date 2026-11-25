<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center" style="table-layout: fixed"> 
<tr><td class="nav" width="90%" nowrap>&nbsp;<a href="index.php"><?=$bbname?></a> &raquo; 搜索</td>
<td align="right" width="10%"><a href="#bottom"><img src="<?=IMGDIR?>/arrow_dw.gif" border="0" align="absmiddle"></a></td>        
</tr></table><br>
<? if(!$searchsubmit && !$page) { ?>
<form method="get" action="search.php">
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center">
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%" class="smalltxt">
<tr class="header"><td>关键字</td><td>用户名</td></tr>

<tr>
<td bgcolor="<?=ALTBG2?>" width="60%">
<input type="text" name="srchtxt" size="25" maxlength="40">
&nbsp; &nbsp;关键字中可使用通配符 "*"<br><br>匹配多个关键字全部，可用空格或 "AND" 连接。如 win32 AND unix<br>匹配多个关键字其中部分，可用 "|" 或 "OR" 连接。如 win32 OR unix</td>

<td bgcolor="<?=ALTBG2?>" width="40%"><input type="text" name="srchuname" size="25" maxlength="40">
<br><br>用户名中可使用通配符 "*"，如 *user*</td>
</tr>

<tr class="header"><td>搜索范围</td><td>排序类型</td></tr>

<tr>
<td bgcolor="<?=ALTBG2?>">

<table cellspacing="0" cellpadding="0" border="0" width="100%" class="smalltxt"><tr><td width="40%">
<br><select name="srchfid">
<option value="all">搜索所有开放的论坛</option>
<option value="">&nbsp;</option><?=$forumselect?></select><br><br>
<input type="radio" name="titleonly" value="1" checked> 只搜索标题<br>
<input type="radio" name="titleonly" value=""
<? if($allowsearch != 2) { ?>
disabled
<? } ?>
> 搜索帖子内容
</td><td>
<br><select name="srchfrom">
<option value="0" selected="selected">全部时间</option>
<option value="86400">1 天前</option>
<option value="172800">2 天前</option>
<option value="432000">1 周前</option>
<option value="1296000">1 个月前</option>
<option value="5184000">3 个月前</option>
<option value="8640000">6 个月前</option>
<option value="31536000">1 年前</option>
</select><br><br>
<input type="radio" name="before" value="" checked> 之后<br>
<input type="radio" name="before" value="1"> 之前
</td></tr></table>
</td>

<td bgcolor="<?=ALTBG2?>">
<br><select name="orderby">
<option value="lastpost" selected="selected">最后回复时间</option>
<option value="replies">被回复次数</option>
<option value="views">被浏览次数</option>
</select><br>
<br><input type="radio" name="dispmode" value="nav" <?=$navcheck?>> 页码导航<br>
<input type="radio" name="dispmode" value="gradual" <?=$gradcheck?>> 渐进链接</td>
</tr>

</table></td></tr></table><br>
<center><input type="submit" name="searchsubmit" value="提 &nbsp; 交"></center>
</form>
<? } else { ?>
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center">
<tr><td class="multi">
<? if($found) { if($dispmode == 'gradual') { ?>
<a href="<?=$mplink?>"><< &nbsp; &nbsp; &nbsp;下 <?=$tpp?> 条匹配结果 &nbsp; &nbsp; &nbsp;>></a>
<? } else { ?>
<?=$multipage?> &nbsp; &nbsp; 共 <?=$total?> 个结果
<? } } ?>
</td></tr>
<tr><td bgcolor="<?=BORDERCOLOR?>">
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%" style="table-layout: fixed; word-wrap: break-word">
<tr class="header">
<td align="center" width="43%">标题</td>
<td align="center" width="14%">论坛</td>
<td align="center" width="12%">作者</td>
<td align="center" width="6%">回复</td>
<td align="center" width="6%">查看</td>
<td align="center" width="19%">最后发表</td>
</tr>
<? if($found) { if(is_array($threadlist)) { foreach($threadlist as $thread) { ?>
<tr>
<td bgcolor="<?=ALTBG2?>" onMouseOver ="this.style.backgroundColor='<?=ALTBG1?>'" onMouseOut ="this.style.backgroundColor='<?=ALTBG2?>'">
<? if($thread['digest']) { ?>
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
<a href="viewthread.php?tid=<?=$thread['tid']?><?=$highlight?>" target="_blank"><?=$thread['subject']?></a><?=$thread['multipage']?></td>
<td bgcolor="<?=ALTBG1?>" align="center"><a href="forumdisplay.php?fid=<?=$thread['fid']?>"><?=$thread['forumname']?></a></td>
<td bgcolor="<?=ALTBG2?>" align="center">
<? if($thread['author'] != 'Guest') { ?>
<a href="viewpro.php?username=<?=$thread['authorenc']?>"><?=$thread['author']?></a>
<? } else { ?>
游客
<? } ?>
<br><span class="smalltxt"><?=$thread['dateline']?></span></td>
<td bgcolor="<?=ALTBG1?>" align="center"><?=$thread['replies']?></td>
<td bgcolor="<?=ALTBG2?>" align="center"><?=$thread['views']?></td>
<td bgcolor="<?=ALTBG1?>" align="center">
<table cellpadding="0" cellspacing="0" border="0" width="100%"><tr align="right">
<td nowrap><font class="smalltxt"><?=$thread['lastpost']?><br>
by
<? if($thread['lastposter'] != 'Guest') { ?>
<a href="viewpro.php?username=<?=$thread['lastposterenc']?>"><?=$thread['lastposter']?></a>
<? } else { ?>
游客
<? } ?>
</font></td><td nowrap>&nbsp;<a href="redirect.php?tid=<?=$thread['tid']?>&goto=lastpost<?=$highlight?>"><img src="<?=IMGDIR?>/lastpost.gif" border="0"></a>
</td></tr></table>
</td>
</tr>
<? } } } else { ?>
<tr><td bgcolor="<?=ALTBG1?>" colspan="6"><span class="mediumtxt ">对不起，没有找到匹配结果。</span></td></tr>
<? } ?>
</table></td></tr>
<tr><td height="3"></td></tr>
<tr><td class="multi">
<? if($found) { if($dispmode == 'gradual') { ?>
<a href="<?=$mplink?>"><< &nbsp; &nbsp; &nbsp;下 <?=$tpp?> 条匹配结果 &nbsp; &nbsp; &nbsp;>></a>
<? } else { ?>
<?=$multipage?>
<? } } ?>
</td></tr>
</table>
<? } include template('footer'); ?>
