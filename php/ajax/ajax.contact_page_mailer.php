<?php

// This script receives POST data from a basic form, emails the data to us,
// then creates and sends an autoreply email to the user

require($_SERVER['DOCUMENT_ROOT'] . '/php/phpmailer/class.phpmailer.php');

error_reporting (0);

$error_output = null;
$success_output = null;

if (empty($_POST)) {
  $error_output = 'Error sending message. Please try again later.';
}

$subject = stripslashes($_POST['subject']);
$name = stripslashes($_POST['name']);
$email = trim($_POST['email']);
$message = stripslashes($_POST['message']);
$phone = stripslashes($_POST['phone']);


//--- status ---//

$sentok = 0;
$auto_ok = 0;


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
  // this one is a generic page to use for all emails temporarily
  'Generic' => array(
    'email' => 'autoreply@fastresponse.org',
    'page' => 'generic.html',
  ),
  'EMT' => array(
    // which of OUR email addresses should receive the user's request
    'email' => 'autoreply@fastresponse.org',
    // the webpage (in $replydir) to email to the user
    'page' => 'emt.html',
  ),
  'Sterile Processing' => array(
    'email' => 'autoreply@fastresponse.org',
    'page' => 'spt.html',
  ),
  'Clinical Medical Assistant' => array(
    'email' => 'autoreply@fastresponse.org',
    'page' => 'cma.html',
  ),
  'Phlebotomy' => array(
    'email' => 'autoreply@fastresponse.org',
    'page' => 'phl.html',
  ),
  'Paramedic' => array(
    'email' => 'autoreply@fastresponse.org',
    'page' => 'para.html',
  ),
  'Other Courses' => array(
    'email' => 'autoreply@fastresponse.org',
    'page' => 'other.html',
  ),
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

$errors = array();

if (!$name) {
  $errors[] = "Please enter your name.";
}

if (!$email) {
  $errors[] = "Please enter an e-mail address.";
}

if ($email && !ValidateEmail($email)) {
  $errors[] = "Please enter a valid e-mail address.";
}

if (!$phone) {
  $errors[] = "Please enter a phone number.";
}

if ($phone && !ValidatePhone($phone)) {
  $errors[] = "Please enter a valid phone number with area code.";
}

if (!$subject) {
  $errors[] = "Please select your course of interest.";
}

if ($subject && !$courses[$subject]) {
  $errors[] = "Please select a valid course.";
}

if (count($errors)) {
  $error_output =  '<div class="error">'.implode("<br />\n", $errors).'</div>';
}

//--- end of validation of input ---//



//--- create and send email to us from user ---//

$messages = <<<ENDMSGS
From: $email
Name: $name
Email: $email
Phone: $phone
Reference: $reference
WhentoReach: $whenreachme
WhatTime: $time
StreetAddress1: $streetaddress1
StreetAddress2: $streetaddress2
StreetAddress3: $streetaddress3
Message: $message
ENDMSGS;

if ($subject == 'Paramedic') {
  $current_emt = $_POST['current_emt'];
  if ($current_emt != 'Yes') {
    $current_emt = 'No';
  }
  $current_emt = 'Current EMT: ' . $current_emt;
  $messages .= "\n$current_emt";
}

//$to = $courses[$subject]['email'];
$to = $courses['Generic']['email'];

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
  $success_output = 'Your message has been sent. Thank you!';
}

//--- end send email to us from user ---//



//--- send html autoreply email to user ---//

// only send if the email to us succeeded and autorespond is on
if ($sentok && $autorespond) {

  $messages = file_get_contents(
    //$replydir . $courses[$subject]['page']
    $replydir . $courses['Generic']['page']
  );

  $mail = new PHPMailer(); 

  $mail->SetFrom($autofrom, $autoname);
  $mail->AddReplyTo($autofrom, $autoname);
  $mail->AddAddress($email, $name);
  $mail->Subject = $autosubject;
  $mail->MsgHTML($messages);
  $mail->AltBody = strip_tags($messages);
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

  $auto_ok = $mail->Send();

  if ($auto_ok) {
    // we don't actually do anything here
  }
}

?>

<?php if ($error_output): ?>

<div class="error"><?= $error_output ?></div>

<?php elseif ($success_output): ?>

<div class="success"><?= $success_output ?></div>

<?php
  include($_SERVER['DOCUMENT_ROOT'] . '/php/conversion_google.php');
  include($_SERVER['DOCUMENT_ROOT'] . '/php/conversion_facebook.php');
?>

<?php endif; ?>
