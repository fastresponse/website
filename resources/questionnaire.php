<?php

// This script receives the POST data from /resources/questionnaire.html,
// and emails the data to us

require("../php/phpmailer/class.phpmailer.php");

error_reporting (E_ERROR);

if (empty($_POST)) {
  return;
}

$name = stripslashes($_POST['name']);
$email = trim($_POST['email']);
$phone = stripslashes($_POST['phone']);
$subject = stripslashes($_POST['subject']);
$graddate = stripslashes($_POST['graddate']);
$workshopdate = stripslashes($_POST['workshopdate']);
$shortterm = stripslashes($_POST['shortterm']);
$longterm = stripslashes($_POST['longterm']);

//--- settings ---//

$autorespond = 0;
$autofrom = 'career.services@fastresponse.org';
$autosubject = 'Career Services Workshop Registration';
$autoname = 'Fast Response Career Services';

$replydir = './';

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
    'email' => 'career.services@fastresponse.org',
    'page' => 'reply.html',
  ),
  'Sterile Processing' => array(
    'email' => 'career.services@fastresponse.org',
    'page' => 'reply.html',
  ),
  'Clinical Medical Assistant' => array(
    'email' => 'career.services@fastresponse.org',
    'page' => 'reply.html',
  ),
  'Phlebotomy' => array(
    'email' => 'career.services@fastresponse.org',
    'page' => 'reply.html',
  ),
  'Paramedic' => array(
    'email' => 'career.services@fastresponse.org',
    'page' => 'reply.html',
  ),
  'Other Courses' => array(
    'email' => 'career.services@fastresponse.org',
    'page' => 'reply.html',
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

if (!$graddate) {
  $error .= "Please enter your graduation date.\n";
}

if (!$workshopdate) {
  $error .= "Please enter your preferred workshop date.\n";
}

if (!$shortterm) {
  $error .= "Please fill out your short-term goals.\n";
}

if (!$longterm) {
  $error .= "Please fill out your long-term goals.\n";
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
$messages.= "Graduation Date: $graddate\n";
$messages.= "Preferred Workshop Date: $workshopdate\n";
$messages.= "Short term Goals: shortterm$\n";
$messages.= "Long term Goals: longterm$\n";

/*
$messages.= "WhentoReach: $whenreachme\n";
$messages.= "WhatTime: $time\n";
*/

$to = $courses[$subject]['email'];

$mail = new PHPMailer(); 

$mail->SetFrom($email);
$mail->AddReplyTo($email, $name);
$mail->AddAddress($to, $name);
$mail->Subject = "Career Services Registration - $subject";
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
