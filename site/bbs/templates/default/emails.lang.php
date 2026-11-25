<?php

// Message Pack for 17camera! Version 1.0.0
// Created by 17camera

$language = array
(
	'get_passwd_subject' =>		'[17camera!] 取回密码邮件',
	'get_passwd_content' =>		'您好 $member[username]，这是 $bbname 系统发送的\n'.
					'取回密码邮件，请访问下面的链接修改您的密码。\n'.
					'{$boardurl}member.php?action=getpasswd&id=$newpass\n'.
					'欢迎您光临 $bbname\n'.
					'$boardurl',

	'email_verify_subject' =>	'[17camera!] Email 地址确认邮件',
	'email_verify_content' =>	'您在 $bbname [ $boardurl ] 修改了注册 Email 地址，\n'.
					'这是系统发送的确认邮件，请用如下资料登录：\n'.
					'用户名：$discuz_user\n'.
					'密码：$newpassword\n'.
					'您可以登录后修改此密码。\n'.
					'非常感谢您对我们的信赖与支持，欢迎您光临 {$bbname}。',

	'activation_subject' =>		'[17camera!] 您的账号已经开通',
	'activation_content' =>		'您在 $bbname [ $boardurl ] 的申请已被接受，请用如下资料登录：\n'.
					'用户名：$username\n密码：$password2\n您可以登录后修改此密码。\n'.
					'非常感谢您对我们的信赖与支持，欢迎您光临 {$bbname}。',

	'email_notify_subject' =>	'[17camera!] $thread[subject] 已有新回复',
	'email_notify_content' =>	'您好，$username 刚刚回复了您在 $bbname 所订阅的主题，详情请访问：\n'.
					'{$boardurl}viewthread.php?tid=$tid\n'.
					'12 小时之内我们将不再向您发送本主题的回复通知\n'.
					'欢迎您光临 $bbname\n'.
					'$boardurl'
);

?>