<?php
/***************************************
** Filename.......: test.php
** Project........: SMTP Class
** Last Modified..: 30 September 2001
***************************************/

	/***************************************
    ** Include the class. The header() makes
	** the output look lovely.
    ***************************************/
	
	//header('Content-Type: text/html');

	/***************************************
    ** Setup some parameters which will be 
	** passed to the smtp::connect() call.
    ***************************************/
function sendmail($message,$to,$subject)
{
		$params['host'] = 'smtp.beelink.org';				// The smtp server host/ip
		$params['port'] = 25;						// The smtp server port
		$params['helo'] = exec('127.0.0.1');			// What to use when sending the helo command. Typically, your domain/hostname
		//$params['helo'] = 'smtp.beelink.org';
		$params['auth'] = TRUE;						// Whether to use basic authentication or not
		$params['user'] = '';				// Username for authentication
		$params['pass'] = '';				// Password for authentication

		/***************************************
		** These parameters get passed to the 
		** smtp->send() call.
		***************************************/

		$send_params['recipients']	= array("$to");							// The recipients (can be multiple)
		$send_params['headers']		= array(
//										"Content-type: text/html; charset=utf-8",
										'From: Alex  <zy.beelink.org >',	// Headers
										"To: $to", "Subject: $subject"
									   );
		$send_params['from']		= 'zy.beelink.org';									// This is used as in the MAIL FROM: cmd
																						// It should end up as the Return-Path: header
	

		$send_params['body']		= $message;										// The body of the email


	/***************************************
    ** The code that creates the object and
	** sends the email.
    ***************************************/

		if(is_object($smtp = smtp::connect($params)) AND $smtp->send($send_params)){
		    
			echo 'Email sent successfully!'."\r\n\r\n";
			return TRUE;

		// Any recipients that failed (relaying denied for example) will be logged in the errors variable.
			print_r($smtp->errors);

		}else{
		   print_r($params);
		   echo "sdf,,,,,,,,,";
		   print_r($smtp->errors);
			echo 'Error sending mail'."\r\n\r\n";
		  return FALSE;
		// The reason for failure should be in the errors variable
			
		}
}
?>