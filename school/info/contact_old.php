<?php
require("phpmailer/class.phpmailer.php");
// Do not edit this if you are not familiar with php
error_reporting (E_ALL ^ E_NOTICE);
$post = (!empty($_POST)) ? true : false;
include 'contactsetting.php';
if($post)
	{
	function ValidateEmail($email)
	{

	$regex = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$^";
		$eregi = preg_replace($regex,'', trim($email));
		return empty($eregi) ? true : false;
}

$subject = stripslashes($_POST['subject']);
$name = stripslashes($_POST['name']);
$cname = stripslashes($_POST['name']);
$email = trim($_POST['email']);
//$subject = stripslashes($_POST['subject']);
$message = stripslashes($_POST['message']);
$phone = stripslashes($_POST['phone']);
/*
$answer = trim($_POST['answer']);
$verificationanswer="hello"; // plz  change edit your human answer
 $to=$toemail.','.$replyto;*/
$error = '';
$headers="";
$headers.="Reply-to:$email\n";
$headers .= "From: $email\n";
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers = "Content-Type: text/html; charset=iso-8859-1\n".$headers;

// Checks Name Field

if(!$name)
{
$error .= 'Please enter your name.<br />';
}

// Checks Email Field

if(!$email)
{
$error .= 'Please enter an e-mail address.<br />';
}

if($email && !ValidateEmail($email))
{
$error .= 'Please enter a valid e-mail address.<br />';
}

if(is_numeric($phone))
    {
        
if(!$phone || strlen($phone) < 8)
{
$error .= "Please enter your Phone Number with area code.<br />";
}


    }
    else
    {
       $error .="Please enter numeric characters and dashes in Phone Number field.<br />";
    }



// Checks Subject Field
if(!$subject)
{
$error .= 'Please enter your course of interest.<br />';
}

/*
if( $answer <> $verificationanswer)
{
$error .= 'Please enter the Correct verification word.<br />';
}
*/

/*
// Checks Message (length)
if(!$message || strlen($message) < 5)
{
$error .= "Please enter your message. It should have at least 5 characters.<br />";
}


*/

if(!$error)
	{
$messages="From: $email <br>";
$messages.="Name: $name <br>";
$messages.="Email: $email <br>";
$messages.="Phone: $phone <br>";
$messages.="Reference: $reference <br>";
$messages.="WhentoReach: $whenreachme <br>";
$messages.="WhatTime: $time <br>";
$messages.="StreetAddress1: $streetaddress1 <br>";
$messages.="StreetAddress2: $streetaddress2 <br>";
$messages.="StreetAddress3: $streetaddress3 <br>";
$messages.="Message: $message <br>";

$to=$toemail;
if($usesmtp==="yes")
{

$mail = new PHPMailer(); 
$mail->IsSMTP();
$mail->SMTPAuth   = yes; // enable SMTP authentication
	 $mail->Host = $smtphost; // SMTP server
					 $mail->Port       = $smtpport; 
				 $mail->Username   = $smtpusername; // SMTP account username
					 $mail->Password   = $smtppassword; // SMTP account password
$mail->AddReplyTo($email, $name);        
			$mail->SetFrom($email, $name);                
			$mail->AddAddress($to, $name);        
			$mail->Subject    = $subject;   
			$mail->reference    = $reference; 
			//$mail->AltBody    = $messages; // optional  
			$mail->MsgHTML(nl2br($messages));
$mail = $mail->Send();
}else{
$mail=mail($to,$subject,$messages,"from: $email <$email>\nReply-To: $email \nContent-type: text/html");
}

if($mail)
	{
echo 'OK';
if($autorespond =="yes")
{
	include_once("autoresponde.php");
}
	}

	}
	else
	{
	echo '<div class="error">'.$error.'</div>';
	}

}
?>