<?php

/*
	[17camera!] include/forum.php - misc forums' functions
	This is NOT a freeware, use is subject to license terms

	Version: 2.2.0
	Author: 17camera (master@17camera.com)
	Copyright: 17camera Studio (www.17camera.com)
	Last Modified: 2002/12/5 10:00
*/


if(!defined('IN_DISCUZ')) {
        exit('Access Denied');
}

function forum(&$forum) {
	global $timeformat, $dateformat, $discuz_user, $status, $groupid, $lastvisit, $moddisplay, $timeoffset, $hideprivate, $onlinehold;

	if($forum['icon']) {
		$forum['icon'] = '<a href="forumdisplay.php?fid='.$forum['fid'].'">'.image($forum['icon'], '', 'align="left"').'</a>';
	}

	$forum['lastpost'] = explode("\t", $forum['lastpost']);
	$forum['folder'] = $lastvisit < $forum['lastpost'][1] ? '<img src="'.IMGDIR.'/red_forum.gif">' : '<img src="'.IMGDIR.'/forum.gif">';

	if($forum['lastpost'][0]) {
		$forum['lastpost'][1] = gmdate("$dateformat $timeformat", $forum['lastpost'][1] + $timeoffset * 3600);
		if($forum['lastpost'][2] != 'Guest') {
			$forum['lastpost'][2] = "<a href=\"viewpro.php?username=".rawurlencode($forum['lastpost'][2])."\">".$forum['lastpost'][2]."</a>";
		}
	} else {
		$forum['lastpost'] = '';
	}

	$forum['moderator'] = moddisplay($forum['moderator'], $moddisplay).'&nbsp;';

	if(!$forum['viewperm'] || ($forum['viewperm'] && strstr($forum['viewperm'], "\t$groupid\t"))) {
		$forum['permission'] = 2;
	} elseif(!$hideprivate) {
		$forum['permission'] = 1;
	} else {
		$forum = NULL;
		//$forum['permission'] = 0;
	}

}

function forumselect() {
	global $db, $groupid, $allowview;
	$forumlist = '';
	$forums = $GLOBALS['_DCACHE']['forums'];
	if(!is_array($forums)) {
		$query = $db->query("SELECT fid, type, name, fup, viewperm FROM $GLOBALS[table_forums] WHERE status='1' ORDER BY displayorder");
		while($forum = $db->fetch_array($query)) {
			$forum['name'] = strip_tags($forum['name']);
			$forums[$forum['fid']] = $forum;
		}
	}

	foreach($forums as $fid1 => $forum1) {
		if($forum1['type'] == 'group') {
			$forumlist .= '<option value="">'.$forum1['name'].'</option>';
			foreach($forums as $fid2 => $forum2) {
				if($forum2['fup'] == $fid1 && $forum2['type'] == 'forum' && ((!$forum2['viewperm'] && $allowview) || ($forum2['viewperm'] && strstr($forum2['viewperm'], "\t$groupid\t")))) {
					$forumlist .= '<option value="'.$fid2.'">&nbsp; &gt; '.$forum2['name'].'</option>';
					foreach($forums as $fid3 => $forum3) {
						if($forum3['fup'] == $fid2 && $forum3['type'] == 'sub' && ((!$forum3['viewperm'] && $allowview) || ($forum3['viewperm'] && strstr($forum3['viewperm'], "\t$groupid\t")))) {
							$forumlist .= '<option value="'.$fid3.'">&nbsp; &nbsp; &nbsp; &gt; '.$forum3['name'].'</option>';
						}
					}
				}
			}
			$forumlist .= '<option value="">&nbsp;</option>';
		} elseif(!$forum1['fup'] && $forum1['type'] == 'forum' && ((!$forum1['viewperm'] && $allowview) || ($forum1['viewperm'] && strstr($forum1['viewperm'], "\t$groupid\t")))) {
			$forumlist .= '<option value="'.$fid1.'"> &nbsp; &gt; '.$forum1['name'].'</option>';
			foreach($forums as $fid2 => $forum2) {
				if($forum2['fup'] == $fid1 && $forum2['type'] == 'sub' && ((!$forum2['viewperm'] && $allowview) || ($forum2['viewperm'] && strstr($forum2['viewperm'], "\t$groupid\t")))) {
					$forumlist .= '<option value="'.$fid2.'">&nbsp; &nbsp; &nbsp; &gt; '.$forum2['name'].'</option>';
				}
			}
			$forumlist .= '<option value="">&nbsp;</option>';
		}

	}

	return $forumlist;
}

function moddisplay($mod, $moddisplay) {
	if($moddisplay == 'selectbox') {
		$modlist .= '<img src="'.IMGDIR.'/moderate.gif" align="absmiddle"><select name="modlist" style="width: 85">';
		//$modlist .= '<option value=""></option>';
		//$modlist .= '<option value="">----------</option>';
		if($mod) {
			$mods = explode(',', $mod);
			for($i = 0; $i < count($mods); $i++) {
				$mods[$i] = trim($mods[$i]);
				$modlist .= '<option value="'.rawurlencode($mods[$i]).'">'.$mods[$i].'</option>';
			}
		}
		$modlist .= '</select>';
		return $modlist;
	} else {
		if($moddisplay == 'forumdisplay') {
			$modicon = '<img src="'.IMGDIR.'/online_moderator.gif" align="absmiddle"> ';
		} else {
			$modicon = '';
		}
		if($mod != '') {
			$mods = explode(',', $mod);
			$modlist = $comma = '';
			for($i = 0; $i < count($mods); $i++) {
				$mods[$i] = trim($mods[$i]);
				$modlist .= "$comma$modicon<a href=\"viewpro.php?username=".rawurlencode($mods[$i])."\">$mods[$i]</a>";
				$comma = ', ';
			}
		} else {
			$modlist = '';
		}
		return $modlist;
	}
}

?>