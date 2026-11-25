<?php

/*
	[17camera!] faq.php - frequently asked questions of 17camera! Board
	This is NOT a freeware, use is subject to license terms

	Version: 2.2.0
	Author: 17camera (master@17camera.com)
	Copyright: 17camera Studio (www.17camera.com)
	Last Modified: 2002/12/6 17:00
*/

require './include/common.php';

$discuz_action = 51;

if(!$page) {

	@include language('customfaq');
	include template('faq');

} elseif($page == 'usermaint') {

	include template('faq_usermaint');

} elseif($page == 'using') {

	include template('faq_using');

} elseif($page == 'messages') {

	$smilies = array();
	$query = $db->query("SELECT code, url FROM $table_smilies WHERE type='smiley'");
	while($smiley = $db->fetch_array($query)) {
		$smilies[] = $smiley;
	}

	include template('faq_messages');

} elseif($page == 'misc') {

	include template('faq_misc');

} elseif($page == 'custom') {

	@include language('customfaq');
	if(is_array($customfaq)) {
		for($i = 0; $i < count($customfaq['item']); $i++) {
			$customfaq['item'][$i]['message'] = str_replace('  ', '&nbsp; ', nl2br($customfaq['item'][$i]['message']));
		}
	}
	include template('faq_custom');

}

?>