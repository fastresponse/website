<?php

// This script receives POST data and emails it to us

require($_SERVER['DOCUMENT_ROOT'] . '/php/phpmailer/class.phpmailer.php');
require($_SERVER['DOCUMENT_ROOT'] . '/php/frlib.php');

error_reporting(0);

if (empty($_POST)) {
  echo '<div class="error";>No data.</div>';
  return;
}



//--- local testing mode ---//
$localtesting = 0;
//---//



$formvalues = array(
  'event', 'event_title', 'event_date', 'event_longdate', 'event_desc',
  'email', 'sid', 'status', 'name', 'phone',
  'course', 'graddate', 'leaddate', 'answer',
);

$requiredvalues = array(
);

//--- check formatting of data ---//

foreach ($_POST as $key => $value) {
  switch ($key) {
  case 'phone':
    $$key = phone_format(phone_strip($value));
  break;
  case 'answer':
    $$key = ucfirst($value);
  break;
  default:
    if (in_array($key, $formvalues) && $value) {
      $value = trim(stripslashes($value));
      $$key = $value;
    }
  }
}

//--- settings ---//

$localfile = $_SERVER['DOCUMENT_ROOT'] . '/php/mailerdebug.log';

$autorespond = 0;
$autofrom = 'career.services@fastresponse.org';
$autosubject = 'Event Attendance';
$autoname = 'Fast Response Career Services';

$to = $autofrom;

$replydir = './';

$usesmtp = 0;

// ----- //
// these settings are only used if usesmtp=1
$smtphost = 'ssl://smtp.domain.com';
$smtpport = 465;
$smtpusername = 'yourname@domain.com';
$smtppassword = 'yourpassword';
// ----- //

//--- end settings ---//



//--- validation of input ---//

$error = '';

foreach ($requiredvalues as $key => $value) {
  switch ($key) {
  default:
    if (!$$key)
      $error .= $value . "\n";
  }
}

if ($error) {
  echo '<div class="error">'.nl2br($error).'</div>';
  return;
}

//--- end of validation of input ---//



//--- create and send email to us from user ---//

foreach ($formvalues as $key) {
  switch ($key) {
  default:
  if (!$$key)
    $$key = "not given";
  }
}

$messages = "";
$messages.= "Attending: $answer\n";
$messages.= "Event ID: $event\n";
$messages.= "Event Title: $event_title\n";
$messages.= "Event Date: $event_date ($event_longdate)\n";
$messages.= "Event Description: $event_desc\n";
$messages.= "Email: $email\n";
$messages.= "Name: $name\n";
$messages.= "Status: $status\n";
$messages.= "Student ID: $sid\n";
$messages.= "Phone: $phone\n";
$messages.= "Course: $course\n";
$messages.= "Graduation date: $graddate\n";
$messages.= "Lead date: $leaddate\n";

$mail = new PHPMailer(); 

$mail->SetFrom($email);
$mail->AddReplyTo($email, $name);
$mail->AddAddress($to, $name);
$mail->Subject = "Event Attendance";
$mail->IsHTML(false);
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

if ($localtesting) {
  $output = "Email from student to us:\n";
  $output.= "From: {$mail->FromName} ({$mail->From})\n";
  $output.= "To: $to\n";
  $output.= "Subject: {$mail->Subject}\n";
  $output.= "Body:\n  " . str_replace("\n", "\n  ", $mail->Body) . "\n";
  $sentok = file_put_contents($localfile, $output, 0);
}
else {
  $sentok = $mail->Send();
}

if ($sentok) {
  echo 'OK';
}
else {
  echo '<div class="error">Error sending.</div>';
}

//--- end send email to us from user ---//


//--- send html autoreply email to user ---//

// only send if the email to us succeeded and autorespond is on
if (!($autorespond && ($localtesting || $sentok))) {
  return;
}

$messages = file_get_contents(
  $replydir . "reply.html"
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

if ($localtesting) {
  $output = "\n\n";
  $output.= "Email from us to student:\n";
  $output.= "From: {$mail->FromName} ({$mail->From})\n";
  $output.= "To: $to\n";
  $output.= "Subject: {$mail->Subject}\n";
  $output.= "Body:\n  " . str_replace("\n", "\n  ", $mail->Body) . "\n";
  $sentok = file_put_contents($localfile, $output, FILE_APPEND);
}
else {
  $sentok = $mail->Send();
}

if ($sentok) {
  // we don't actually do anything here
}

?>
