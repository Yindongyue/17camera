<?php

/*
	[17camera!] attachment.php - attachment downloading
	This is NOT a freeware, use is subject to license terms

	Version: 2.2.0
	Author: 17camera (master@17camera.com)
	Copyright: 17camera Studio (www.17camera.com)
	Last Modified: 2002/12/6 17:00
*/

require './include/common.php';

$discuz_action = 14;

$query = $db->query("SELECT a.*, t.fid FROM $table_attachments a LEFT JOIN $table_threads t ON a.tid=t.tid WHERE aid='$aid'");
$attach = $db->fetch_array($query);
if($allowgetattach && $attach['creditsrequire'] && $attach['creditsrequire'] > $credit && !$ismoderator) {
	showmessage('attachment_nopermission');
}

$query = $db->query("SELECT * FROM $table_forums WHERE fid='$attach[fid]'");
$forum = $db->fetch_array($query);
if(!$forum['getattachperm'] && !$allowgetattach) {
	showmessage('group_nopermission');
} elseif($forum['getattachperm'] && !strstr($forum['getattachperm'], "\t$groupid\t")) {
	showmessage('attachment_forum_nopermission');
}

$db->query("UPDATE $table_attachments SET downloads=downloads+1 WHERE aid='$aid'");
$filename = $discuz_root.$attachdir.'/'.$attach['attachment'];

//fix,plus:附件安全下载以及增强
if(is_readable($filename) && $attach) { 
    $filesize = filesize($filename); 
    ob_end_clean(); 
    header('Content-Encoding: none'); 
    header('Cache-Control: private'); 
    header('Content-Length: '.$filesize); 

    if (stristr($attach['filetype'],"image")){ 
        $imagesize =@getimagesize ("$filename"); 
        if ($imagesize){ 
            header('Content-Disposition: '.(strpos($HTTP_SERVER_VARS['HTTP_USER_AGENT'], 'MSIE') ? 'inline; ' : 'attachment; ').'filename='.$attach['filename']); 
            header('Content-Type: '.$attach['filetype']); 
            readfile($filename); 
        } 
    }else{ 
//        if (strstr($_SERVER["HTTP_USER_AGENT"], "MSIE")){ 
//             header("Content-Disposition: attachment;filename=".$attach['filename'].'%20'); // For IE 
//        }else{ 
             header("Content-Disposition: attachment; filename=".$attach['filename']);  
//        } 
        header('Content-Type: '.$attach['filetype']); 
        readfile($filename); 
    } 
//fix,plus:end


} else {
	showmessage('attachment_nonexistence');
}

?>