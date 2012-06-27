<?php

// This script receives the POST data from /school/info/index.html,
// which is a basic form, emails the data to us,
// then creates and sends an autoreply email to the user

require("phpmailer/class.phpmailer.php");

error_reporting (E_ERROR);

if (empty($_POST)) {
  return;
}

$subject = stripslashes($_POST['subject']);
$name = stripslashes($_POST['name']);
$email = trim($_POST['email']);
$message = stripslashes($_POST['message']);
$phone = stripslashes($_POST['phone']);


//--- settings ---//

$autorespond = 1;
$autofrom = 'info@fastresponse.org';
$autosubject = 'Welcome to Fast Response';
$autoname = 'Fast Response School';

$replydir = 'email_replies/';

$usesmtp = 0;

// ----- //
// these settings are only used if usesmtp=1
$smtphost = 'ssl://smtp.domain.com';
$smtpport = 465;
$smtpusername = 'yourname@domain.com';
$smtppassword = 'yourpassword';
// ----- //

$courses = array(
  'EMT' => array(
    // which of OUR email addresses should receive the user's request
    'email' => 'bbridge@fastresponse.org',
    // the webpage (in $replydir) to email to the user
    'page' => 'emt.html',
  ),
  'Sterile Processing' => array(
    'email' => 'bbridge@fastresponse.org',
    'page' => 'spt.html',
  ),
  'Clinical Medical Assistant' => array(
    'email' => 'bbridge@fastresponse.org',
    'page' => 'cma.html',
  ),
  'Phlebotomy' => array(
    'email' => 'bbridge@fastresponse.org',
    'page' => 'phl.html',
  ),
  'Paramedic' => array(
    'email' => 'bbridge@fastresponse.org',
    'page' => 'para.html',
  ),
  'Other Courses' => array(
    'email' => 'bbridge@fastresponse.org',
    'page' => 'other.html',
  ),
  /*
  'Ward Clerk' => array(
    'email' => 'autoreply@fastresponse.org',
    'page' => 'wc.html',
  ),
  */
);

//--- end settings ---//



//--- validation of input ---//

function ValidateEmail($email) {
  // Email validation filter sometimes allows "blah@blah" since that is
  // technically valid. This checks for "blah@blah.com" in addition.
  /*
  $options = array("options" => array("regexp" =>
    "^.+@.+\..+$"
  ) );

  return (
    FALSE !== filter_var($email, FILTER_VALIDATE_EMAIL) &&
    FALSE !== filter_var($email, FILTER_VALIDATE_REGEXP, options)
  );
  */

  return (
    FALSE !== filter_var($email, FILTER_VALIDATE_EMAIL)
  );
}

function ValidatePhone($phone) {
  // replace extra chars common in phone numbers with spaces
  $test = strtr($phone, "()-+", "    ");
  // strip all spaces
  $test = str_replace(" ", "", $test);
  // now validate: string of at least 10 numbers
  return (
    strlen($test) >= 10 &&
    FALSE !== filter_var((int)$test, FILTER_VALIDATE_INT)
  );
}

$error = '';

if (!$name) {
  $error .= "Please enter your name.\n";
}

if (!$email) {
  $error .= "Please enter an e-mail address.\n";
}

if ($email && !ValidateEmail($email)) {
  $error .= "Please enter a valid e-mail address.\n";
}

if (!$phone) {
  $error .= "Please enter a phone number.\n";
}

if ($phone && !ValidatePhone($phone)) {
  $error .= "Please enter a valid phone number with area code.\n";
}

if (!$subject) {
  $error .= "Please select your course of interest.\n";
}

if ($subject && !$courses[$subject]) {
  $error .= "Please select a valid course.\n";
}

if ($error) {
  echo '<div class="error">'.nl2br($error).'</div>';
  return;
}

//--- end of validation of input ---//



//--- create and send email to us from user ---//

$messages = "From: $email\n";
$messages.= "Name: $name\n";
$messages.= "Email: $email\n";
$messages.= "Phone: $phone\n";
$messages.= "Reference: $reference\n";
$messages.= "WhentoReach: $whenreachme\n";
$messages.= "WhatTime: $time\n";
$messages.= "StreetAddress1: $streetaddress1\n";
$messages.= "StreetAddress2: $streetaddress2\n";
$messages.= "StreetAddress3: $streetaddress3\n";
$messages.= "Message: $message\n";

$to = $courses[$subject]['email'];

$mail = new PHPMailer(); 

$mail->SetFrom($email);
$mail->AddReplyTo($email, $name);
$mail->AddAddress($to, $name);
$mail->Subject = $subject;
$mail->Body = $messages;

if ($usesmtp) {
  $mail->IsSMTP();
  $mail->SMTPAuth = true;
  $mail->Host = $smtphost;
  $mail->Port = $smtpport;
  $mail->Username = $smtpusername;
  $mail->Password = $smtppassword;
}
else {
  $mail->IsMail();
}

$sentok = $mail->Send();

if ($sentok) {
  echo 'OK';
}

//--- end send email to us from user ---//



//--- send html autoreply email to user ---//

// only send if the email to us succeeded and autorespond is on
if (!$sentok || !$autorespond) {
  return;
}

$messages = file_get_contents(
  $replydir . $courses[$subject]['page']
);

$mail = new PHPMailer(); 

$mail->SetFrom($autofrom, $autoname);
$mail->AddReplyTo($autofrom, $autoname);
$mail->AddAddress($email, $name);
$mail->Subject = $autosubject;
$mail->MsgHTML($messages);
$mail->AltBody = strip_tags($messages);

if ($usesmtp) {
  $mail->IsSMTP();
  $mail->SMTPAuth = true;
  $mail->Host = $smtphost;
  $mail->Port = $smtpport;
  $mail->Username = $smtpusername;
  $mail->Password = $smtppassword;
}
else {
  $mail->IsMail();
}

$sentok = $mail->Send();

if ($sentok) {
  // we don't actually do anything here
}

?>
