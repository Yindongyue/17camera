<?php

/*
	[17camera!] include/poll.php - show poll in thread viewing page
	This is NOT a freeware, use is subject to license terms

	Version: 2.2.0
	Author: 17camera (master@17camera.com)
	Copyright: 17camera Studio (www.17camera.com)
	Last Modified: 2002/12/5 10:00
*/


if(!defined('IN_DISCUZ')) {
        exit('Access Denied');
}

$pollopts = unserialize($thread['pollopts']);
$polloptions = array();
foreach($pollopts['options'] as $option) {
	$totalvotes += $option[1];
	$polloptions[] = array(	'option'	=> dhtmlspecialchars($option[0]),
				'votes'		=> $option[1],
				'width'		=> @round($option[1] * 300 / $polloptions['max']) + 2,
				'percent'	=> @sprintf ("%01.2f", $option[1] * 100 / $polloptions['total'])
				);
}

$allowvote = $allowvote && $discuz_user && !in_array($discuz_user, $pollopts['voters']);
$optiontype = $pollopts['multiple'] ? 'checkbox' : 'radio';

?>