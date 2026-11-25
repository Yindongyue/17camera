<?php 

 function sendemail($sendto,$strSubject, $strContent) 
    { 
		ini_set("SMTP", "61.241.93.7"); 
		ini_set("sendmail_from", "master@17camera.com"); 
		$aaa=$sendto;
		$bbb=$strSubject;
		$ccc=$strContent;
		$headers = "MIME-Version: 1.0\n" ; 
		$headers .= "Reply-To: master@17camera.com\n"; 
		$headers .= "X-Sender: Admin\n"; 
		$headers .= "X-Mailer: MyMailer v1.1\n"; 
		$headers .= "X-Priority: 3\n"; 
		$headers .= "Return-Path: \n"; 
		$headers .= "Content-Type: text/html;charset=iso-8859-1\n"; 
		$result=mail($aaa,$bbb,$ccc, $headers); 
		ini_restore("SMTP");   
		if($result)
		{ 
         return true; 
		 }
		 else
		 {
		  return false;
		 }
    } 

?>