<?php

/*
	[17camera!] mail_config.php - mail sending configuration
	This is NOT a freeware, use is subject to license terms

	For further information, please read faq.txt

	Version: 0.9.1
	Author: 17camera (master@17camera.com)
	Copyright: 17camera Studio (www.17camera.com)
	Last Modified: 2002/12/5 10:00
*/

$sendmail_silent = 1;		// 屏蔽邮件发送中的全部错误提示(推荐), 1=是, 0=否
$mailsend = 1;			// 邮件发送方式	0=不发送任何邮件
				//		1=通过 PHP 函数及 UNIX sendmail 发送(推荐此方式)
				//		2=通过 SOCKET 连接 SMTP 服务器发送(支持 ESMTP 验证)
				//		3=通过 PHP 函数 SMTP 发送 Email(仅 win32 下有效, 不支持 ESMTP)
				//
				// 可通过 utilities/testmail.php 测试您的系统支持哪种邮件发送方式

if($mailsend == 1) {

	// 通过 PHP 函数及 UNIX sendmail 发信(无需配置)

} elseif($mailsend == 2) {	// 通过 17camera! SMTP 模块发信

	$mailcfg['server'] = 'smtp.21cn.com';			// SMTP 服务器
	$mailcfg['port'] = '25';				// SMTP 端口, 默认不需修改
	$mailcfg['auth'] = 1;					// 是否需要 AUTH LOGIN 验证, 1=是, 0=否
	$mailcfg['from'] = 'Discuz <myaccount@21cn.com>';	// 发信人地址 (如果需要验证,必须为本服务器地址)
	$mailcfg['auth_username'] = 'myaccount';		// 验证用户名
	$mailcfg['auth_password'] = 'password';			// 验证密码

} elseif($mailsend == 3) {	// 通过 PHP 函数及 SMTP 服务器发信

	$mailcfg['server'] = 'smtp.your.com';		// SMTP 服务器, 以下设置仅对 WIN32 系统有效
	$mailcfg['port'] = '25';			// SMTP 端口, 默认不需修改

}

?>