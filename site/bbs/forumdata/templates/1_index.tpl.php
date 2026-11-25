<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center" style="table-layout: fixed"> 
<tr><td class="nav" width="90%" nowrap>&nbsp;<a href="index.php"><?=$bbname?></a> <?=$navigation?></td>
<td align="right" width="10%"><a href="#bottom"><img src="<?=IMGDIR?>/arrow_dw.gif" border="0" align="absmiddle"></a></td>        
</tr></table><br>

<table cellspacing="<?=TABLESPACE?>" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center"> 
<tr class="mediumtxt"><td class="smalltxt">
您的 积分 <span class="bold"><?=$credit?></span> 点 / 头衔: 
<span class="bold"><?=$grouptitle?></span>
<br>
现在时间是 <?=$currenttime?>, 您上次访问是在 <?=$lastvisittime?>
</td><td align="right" nowrap class="smalltxt">
共 <span class="bold"><?=$threads?></span> 篇主题 / <span class="bold"><?=$posts?></span> 篇帖子 / <span class="bold"><?=$totalmembers?></span> 位会员<br>
<a href="search.php?srchfrom=<?=$newthreads?>&searchsubmit=yes">查看新帖</a> | 
<a href="member.php?action=markread">标记已读</a>
<? if($discuz_user) { ?>
| <a href="search.php?srchuname=<?=$discuz_userenc?>&srchfrom=604800&searchsubmit=yes">我的话题</a>
<? } ?>
| 欢迎新会员 <a href="viewpro.php?username=<?=$memberenc?>"><span class="bold"><?=$lastmember?></span></a><br>
</td></tr></table>
<? if(empty($gid)) { ?>
<table border="0" cellspacing="0" cellpadding="0" width="<?=TABLEWIDTH?>" bgcolor="<?=BORDERCOLOR?>" align="center">
<tr><td>
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%">
<tr class="header"><td colspan="3"><?=$bbname?> 公告</td></tr>
<tr bgcolor="<?=ALTBG2?>" align="center">
<td colspan="3" align="center">
<? if(empty($announcements)) { ?>
到目前为止没有论坛公告。
<? } else { ?>
<marquee direction="left" scrollamount="3" onMouseOver="this.stop();" onMouseOut="this.start();">
<?=$announcements?>
</marquee>
<? } ?>
</td></tr></table></td></tr></table>
<? } if(!empty($newpmexists)) { include template('pmprompt'); } if(is_array($forumlist)) { foreach($forumlist as $key => $forum) { if($forum['type'] == 'group' && $forumlist[($key + 1)]['type'] == 'forum') { if($key) { ?>
</table></td></tr></table><br><br>
<? } else { ?>
<br><br>
<? } ?>
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center"> 
<tr><td bgcolor="<?=BORDERCOLOR?>"> 
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%" align="center"> 
<tr align="center"><td colspan="6" class="header"><a href="index.php?gid=<?=$forum['fid']?>"><font color="<?=HEADERTEXT?>"><span class="bold"><?=$forum['name']?></span></font></a></td></tr>
<tr class="category" align="center">
<td width="5%">&nbsp;</td>
<td width="46%">论坛</td>
<td width="8%">主题</td>
<td width="8%">贴数</td>
<td width="15%">最后发表</td>
<td width="18%">版主</td>
</tr>
<? } elseif($forum['permission']) { ?>
<tr align="center">
<td bgcolor="<?=ALTBG1?>"><?=$forum['folder']?></td>
<td bgcolor="<?=ALTBG2?>" align="left" onMouseOver ="this.style.backgroundColor='<?=ALTBG1?>'" onMouseOut ="this.style.backgroundColor='<?=ALTBG2?>'">
<?=$forum['icon']?><a href="forumdisplay.php?fid=<?=$forum['fid']?>"><span class="bold"><?=$forum['name']?></span></a>
<br><span class="smalltxt"><?=$forum['description']?></span></td>
<td bgcolor="<?=ALTBG1?>"><?=$forum['threads']?></td>
<td bgcolor="<?=ALTBG2?>"><?=$forum['posts']?></td>
<td bgcolor="<?=ALTBG1?>">
<? if($forum['permission'] == 1) { ?>
私密论坛
<? } else { if(is_array($forum['lastpost'])) { ?>
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr><td align="right" class="smalltxt" title="标题: <?=$forum['lastpost'][0]?>" nowrap>
<?=$forum['lastpost'][1]?><br>by <?=$forum['lastpost'][2]?></td>
<td nowrap>&nbsp;<a href="redirect.php?fid=<?=$forum['fid']?>&goto=lastpost"><img src="<?=IMGDIR?>/lastpost.gif" border="0"></a></td>
</tr></table>
<? } else { ?>
从未
<? } } ?>
</td><td bgcolor="<?=ALTBG2?>" style="word-break: keep-all"><?=$forum['moderator']?></td>
</tr>
<? } } } if(empty($gid) && $_DCACHE['forumlinks'] && $whosonlinestatus) { if(empty($forumlist)) { ?>
<br><br>
<? } else { ?>
</table></td></tr></table><br><br>
<? } ?>
<table cellspacing="0" cellpadding="0" border="0" width="<?=TABLEWIDTH?>" align="center"> 
<tr><td bgcolor="<?=BORDERCOLOR?>"> 
<table border="0" cellspacing="<?=BORDERWIDTH?>" cellpadding="<?=TABLESPACE?>" width="100%" align="center">
<? } if(empty($gid) && $_DCACHE['forumlinks']) { ?>
<tr><td colspan="3" class="header"><img src="<?=IMGDIR?>/indexicon.gif" align="absmiddle"> <span class="bold">联盟论坛</span></td></tr>
<? if(is_array($_DCACHE['forumlinks'])) { foreach($_DCACHE['forumlinks'] as $flink) { if($flink['type'] == 1) { ?>
<tr>
                        <td bgcolor="<?=ALTBG1?>" width="5%" align="center" valign="middle"><img src="<?=IMGDIR?>/forumlink.gif"></td>
                        <td bgcolor="<?=ALTBG2?>" width="77%" valign="middle" onMouseOver="this.style.backgroundColor='<?=ALTBG1?>'" onMouseOut="this.style.backgroundColor='<?=ALTBG2?>'"><?=$flink['content']?></td>
                        <td bgcolor="<?=ALTBG2?>" width="18%" align="center" valign="middle"><img src="<?=$flink['logo']?>" border="0"></a></td>
                        </tr>
<? } elseif($flink['type'] == 2) { ?>
<tr>
                        <td bgcolor="<?=ALTBG1?>" width="5%" align="center" valign="middle"><img src="<?=IMGDIR?>/forumlink.gif"></td>
                        <td bgcolor="<?=ALTBG2?>" width="95%" colspan="2" valign="middle" style="word-break: keep-all" onMouseOver="this.style.backgroundColor='<?=ALTBG1?>'" onMouseOut="this.style.backgroundColor='<?=ALTBG2?>'">&nbsp; <?=$flink['content']?></td>
                        </tr>
<? } else { ?>
<tr>
                        <td bgcolor="<?=ALTBG1?>" width="5%" align="center" valign="middle"><img src="<?=IMGDIR?>/forumlink.gif"></td>
                        <td bgcolor="<?=ALTBG2?>" width="95%" colspan="2" valign="middle" style="word-break: keep-all" onMouseOver="this.style.backgroundColor='<?=ALTBG1?>'" onMouseOut="this.style.backgroundColor='<?=ALTBG2?>'">&nbsp; <?=$flink['content']?></td></tr>
<? } } } } if(empty($gid) && $whosonlinestatus) { ?>
<tr><td colspan="3" class="header">
<table cellspacing="0" cellpadding="0" border="0" width="100%" align="center">
<tr class="smalltxt" style="color: <?=HEADERTEXT?>"><td><img src="<?=IMGDIR?>/indexicon.gif" align="absmiddle"> <span class="bold"><a href="member.php?action=online" style="color: <?=HEADERTEXT?>">在线用户</a></span> - 
<a name="#online"></a>
<? if($detailstatus) { ?>
&nbsp;<span class="bold"><?=$membercount?></span> 位会员, <span class="bold"><?=$guestcount?></span> 位游客. 共 <span class="bold"><?=$onlinenum?></span> 人在线 | 最高纪录是 <span class="bold"><?=$onlineinfo[0]?></span> 于 <span class="bold"><?=$onlineinfo[1]?></span>.</td>
<td align="right"><a href="index.php?showoldetails=no#online" style="color: <?=HEADERTEXT?>">[关闭在线列表]</a></td>
<? } else { ?>
&nbsp;共 <span class="bold"><?=$onlinenum?></span> 人在线 | 最高纪录是 <span class="bold"><?=$onlineinfo[0]?></span> 于 <span class="bold"><?=$onlineinfo[1]?></span>.</td>
<td align="right"><a href="index.php?showoldetails=yes#online" style="color: <?=HEADERTEXT?>">[打开在线列表]</a></td>
<? } ?>
</tr></table></tr><tr>
<td bgcolor="<?=ALTBG1?>" width="5%" align="center"><img src="<?=IMGDIR?>/online.gif"></td>
<td bgcolor="<?=ALTBG2?>" colspan="5" onMouseOver ="this.style.backgroundColor='<?=ALTBG1?>'" onMouseOut ="this.style.backgroundColor='<?=ALTBG2?>'">
<table cellspacing="0" cellpadding="0" border="0" width="98%" align="center" class="smalltxt">
<tr><td colspan="6" valign="middle">
<img src="<?=IMGDIR?>/online_admin.gif"> 论坛管理员 &nbsp; &nbsp; &nbsp;
<img src="<?=IMGDIR?>/online_supermod.gif"> 版主 &nbsp; &nbsp; &nbsp;
<img src="<?=IMGDIR?>/online_moderator.gif"> 版主 &nbsp; &nbsp; &nbsp;
<img src="<?=IMGDIR?>/online_member.gif"> 会员</td></tr>
<? if($detailstatus) { ?>
<tr><td colspan="7"><hr noshade size="0" width="100%" color="<?=BORDERCOLOR?>" align="center"></td></tr><tr><td nowrap>
<? if($whosonline) { if(is_array($whosonline)) { foreach($whosonline as $key => $online) { if($key % 7 == 0) { ?>
</td></tr><tr><td width="15%" nowrap>
<? } else { ?>
</td><td width="15%" nowrap>
<? } ?>
<img src="<?=IMGDIR?>/<?=$online['icon']?>" align="absmiddle">
<a href="viewpro.php?username=<?=$online['usernameenc']?>" title="时间: <?=$online['lastactivity']?><?="\n"?>
动作: <?=$online['action']?>
<? if($online['fid']) { ?>
<?="\n"?>论坛: <?=$online['fid']?>
<? } ?>
"><?=$online['username']?></a>
<? } } } else { ?>
&nbsp; &nbsp; 当前只有游客在线
<? } } ?>
</td></tr></table></td></tr>
<? } ?>
</table></td></tr></table><br><br>
<table width="<?=TABLEWIDTH?>" align="center">
<tr class="mediumtxt" ><td align="center" class="smalltxt">
<img src="<?=IMGDIR?>/red_forum.gif" align="absmiddle">&nbsp; 有新贴的论坛&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
<img src="<?=IMGDIR?>/forum.gif" align="absmiddle">&nbsp; 无新贴的论坛</td></tr></table><br>
<? include template('footer'); ?>
