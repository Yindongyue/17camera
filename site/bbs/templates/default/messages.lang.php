<?php

// Message Pack for 17camera! Version 1.0.0
// Created by 17camera

$credittitle = '积分';
$creditunit = '点';

$language = array
(
	'undefined_action' => '未定义操作，请返回。',
	'group_nopermission' => '对不起，您的级别〔{$grouptitle}〕无法进行此操作。',
	'not_loggedin' => '对不起，您还没有登录，无法进行此操作。',
	'board_closed' => '抱歉，本论坛暂时关闭，详情请<a href=\"mailto:$adminemail\">联系管理员</a>。',

	'login_invalid' => '用户名无效或密码错误，现在将以游客身份转入论坛首页。',
	'login_succeed' => '欢迎您回来，{$discuz_userss}。现在将转入登录前页面。',
	'logout_succeed' => '您已退出论坛，现在将以游客身份转入退出前页面。',

	'user_banned' => '对不起，本论坛不欢迎你的来访。',

	'forum_nonexistence' => '指定的论坛不存在，请返回。',
	'forum_passwd_wrong' => '您输入的密码不正确，不能访问这个论坛。',
	'forum_nopermission' => '对不起，本论坛只有特定用户可以访问，请返回。',

	'thread_nonexistence' => '指定的主题不存在或已被删除，请返回。',
	'thread_nopermission' => '对不起，本贴要求 $credittitle 高于 $thread[creditsrequire] $creditunit 才可浏览，请返回。',
	'thread_poll_closed' => '本主题已关闭，无法继续投票，请返回。',
	'thread_poll_voted' => '您已参与过这个投票，请返回。',
	'thread_poll_invalid' => '您没有选择投票选项，请返回修改。',
	'thread_poll_succeed' => '您的投票成功提交，现在将转入主题页。',
	'thread_karma_range_invalid' => '您的给分超过 $minkarmarate 到 $maxkarmarate 的范围限制。',
	'thread_karma_member_invalid' => '对不起，您不能给自己发表的贴子评分，请返回。',
	'thread_karma_ctrl' => '对不起，您最近 24 小时评分数超过 $maxrateperday $creditunit 限制，请返回。',
	'thread_karma_duplicate' => '对不起，您不能对同一个帖子重复评分，请返回。',
	'thread_karma_succeed' => '感谢您的参与，".stripslashes($username)." 的 $credittitle $score {$creditunit}。<br>现在将转入主题页面。',
	'thread_report_disable' => '对不起，管理员关闭了报告贴子功能，请返回。',
	'thread_report_succeed' => '您的意见已经报告给版主和管理员，现在将转入主题页面。',

	'attachment_nopermission' => '对不起，本附件要求 $credittitle 高于 $attach[creditsrequire] $creditunit 才可下载，请返回。',
	'attachment_forum_nopermission' => '对不起，只有特定用户可以下载本论坛的附件，请返回。',
	'attachment_nonexistence' => '附件文件不存在或无法读入，请与管理员联系。',

	'post_hide_nopermission' => '对不起，只有版主才能使用 [hide] 代码，请返回修改。',
	'post_forum_nopermission' => '对不起，本论坛只有特定用户可以发帖，请返回。',
	'post_thread_closed' => '对不起，本主题已关闭，不再接受新回复。',
	'post_subject_toolang' => '对不起，您的标题超过 100 个字符，请返回修改标题长度。',
	'post_message_toolang' => '对不起，您的贴子超过 $maxpostsize 个字符的限制，请返回修改。',
	'post_sm_isnull' => '您没有输入标题或内容，请返回填写。',
	'post_flood_ctrl' => '两次发表间隔少于 $floodctrl 秒，请不要灌水！<a href=\"forumdisplay.php?fid=$fid\">点击这里</a> 继续。',
	'post_poll_option_toomany' => '对不起，您的投票选项超过 10 个，请返回修改。',
	'post_edit_nopermission' => '对不起，您没有权力编辑或删除这个贴子，请返回。',
	'post_edit_delete_succeed' => '主题删除成功，现在将转入主题列表。',
	'post_attachment_toobig' => '对不起，您的附件大小超过论坛限制，请返回修改。',
	'post_attachment_ext_notallowed' => '对不起，不支持上传此类扩展名的附件，请返回修改。',
	'post_attachment_save_error' => '附件文件无法保存到服务器，可能是目录属性设置问题，请与管理员联系。',
	'post_edit_succeed' => '您的帖子编辑成功，现在将转入主题页。<br><br><a href=\"forumdisplay.php?fid=$fid\">[ 需要转入主题列表请点击这里 ]</a>',
	'post_reply_succeed' => '非常感谢，您的回复已经发布，现在将转入主题页。<br><br><a href=\"forumdisplay.php?fid=$fid\">[ 需要转入主题列表请点击这里 ]</a>',
	'post_newthread_succeed' => '非常感谢，您的帖子已经发布，现在将转入主题页。<br><br><a href=\"forumdisplay.php?fid=$fid\">[ 需要转入主题列表请点击这里 ]</a>',

	'register_disable' => '对不起，目前论坛禁止新用户注册，请返回。',
	'register_succeed' => '非常感谢您的注册，现在将以会员身份登录论坛。',

	'profile_username_toolang' => '对不起，您的用户名超过 15 个字符，请返回输入一个较短的用户名。',
	'profile_passwd_notmatch' => '两次输入的密码不一致，请返回检查后重试。',
	'profile_passwd_wrong' => '原密码不正确，您不能修改密码！',
	'profile_account_duplicate' => '该用户名或 Email 地址已经被注册了，请返回重新填写。',
	'profile_email_duplicate' => '该 Email 地址已经被注册了，请返回重新填写。',
	'profile_username_illegal' => '用户名包含敏感字符或被系统屏蔽，请返回重新填写。',
	'profile_passwd_illegal' => '密码空或包含非法字符，请返回重新填写。',
	'profile_email_illegal' => 'Email 地址无效，请返回重新填写。',
	'profile_sig_toolang' => '您的签名长度超过 $maxsigsize 字符的限制，请返回修改。',
	'profile_avatar_toobig' => '您设置的头像超过了系统定义的宽 $maxavatarsize 像素，高 $maxavatarsize 像素，请返回重新填写。',
	'profile_avatardir_nonexistence' => '头像目录 ./images/avatars 不存在，请联系管理员。',
	'profile_avatar_succeed' => '您头像设置已成功更新，现在将转入个人资料页。',
	'profile_email_identify' => '确认 Email 已经发送，请用邮件中的账号信息登录。',
	'profile_succeed' => '您已经成功保存个人资料，现在将转入控制面板首页。',

	'buddy_add_invalid' => '$buddy 已经存在于您的好友列表中，请返回。',
	'buddy_add_nonexistence' => '会员 $buddy 不存在，请返回修改。',
	'buddy_add_succeed' => '好友成功加入，现在将转入控制面板首页。',
	'buddy_delete_succeed' => '好友成功删除，现在将转入控制面板首页。',

	'redirect_nextnewset_nonexistence' => '没有比当前更新的主题，请返回。',
	'reditect_nextoldset_nonexistence' => '没有比当前更早的主题，请返回。',

	'favorite_exists' => '您过去已经收藏过这个主题，请返回。',
	'favorite_add_succeed' => '指定主题已成功添加到收藏夹中，现在将回到上一页。',
	'favorite_update_succeed' => '收藏夹已成功更新，现在将转入更新后的收藏夹。',
	'subscription_exists' => '您过去已经订阅过这个主题，请返回。',
	'subscription_add_succeed' => '您选择的主题已经成功订阅，现在将回到上一页。',
	'subscription_update_succeed' => '订阅列表已经成功更新，现在将转入更新后的订阅列表。',

	'search_ctrl' => '对不起，$searchctrl 秒内只能进行一次搜索，请返回。',
	'search_invalid' => '您没有指定要搜索的关键字或用户名，请返回重新填写。',
	'search_forum_invalid' => '您没有指定搜索论坛的范围，请返回重新填写。',

	'member_nonexistence' => '指定的用户不存在或已被删除，请返回。',
	'member_list_disable' => '对不起，管理员禁止了会员列表功能。',
	'email_friend_invalid' => '相关项目没有填写完整，请返回修改。',
	'email_friend_succeed' => '您的推荐已经通过 Email 发给朋友，现在将转入原贴。',
	'announcement_nonexistence' => '目前没有公告供查看，请返回。',
	'mark_read_succeed' => '所有论坛已被标记已读，现在将转入论坛首页。',

	'getpasswd_account_notmatch' => '用户名或 Email 地址不匹配，请返回修改。',
	'getpasswd_id_illegal' => '您所用的 ID 不存在或已经超过 10 天的有效期，无法取回密码。',
	'getpasswd_send_succeed' => '取回密码的方法已经通过 Email 发送到您的信箱中，<br>请在 10 天之内到论坛修改您的密码。',
	'getpasswd_succeed' => '新密码已设置为：$newpasswd1 请妥善保管！',

	'pm_box_isfull' => '您的信箱已满，在阅读短消息前必须删除一些不用的信息。',
	'pm_nonexistence' => '对不起，短消息不存在或已被删除。',
	'pm_send_nonexistence' => '收件人 $msgto 不存在，请返回修改。',
	'pm_send_invalid' => '您的消息没有填写完整，请返回修改。',
	'pm_send_toomany' => '收件人数量超过 $maxpmsend 人，请返回修改。',
	'pm_send_ignore' => '$member[username] 拒绝接受您的短消息，请返回修改。',
	'pm_send_succeed' => '短消息发送成功，现在将转入消息列表。',
	'pm_delete_succeed' => '指定消息成功删除，现在将转入消息列表。',
	'pm_ignore_succeed' => '忽略列表已成功更新，现在将转入消息列表。',

	'admin_nopermission' => '对不起，您没有权限使用管理功能。',
	'admin_delthread_invalid' => '您没有选择要删除的主题，请返回。',
	'admin_delpost_invalid' => '您没有选择要删除的贴子，请返回。',
	'admin_move_invalid' => '您没有选择目标论坛，请返回修改。',
	'admin_split_invalid' => '这个主题没有回复，无法分割，请返回。',
	'admin_split_subject_invalid' => '您没有输入标题，请返回填写。',
	'admin_split_new_invalid' => '您没有选择要分割入新主题的贴子，请返回检查。',
	'admin_succeed' => '管理操作成功，现在将转入主题列表。'

);

?>