<?php

// This script receives the POST data from /resources/questionnaire.html,
// and emails the data to us

require("../php/phpmailer/class.phpmailer.php");

error_reporting (E_ERROR);

if (empty($_POST)) {
  return;
}

$name = stripslashes($_POST['name']);
$course = trim($_POST['course']);
$graddate = stripslashes($_POST['graddate']);
$relevantjob = stripslashes($_POST['relevantjob']);
$position = stripslashes($_POST['position']);
$empname = stripslashes($_POST['empname']);
$empaddr = stripslashes($_POST['empaddr']);
$hiredate = stripslashes($_POST['hiredate']);
$startpay = stripslashes($_POST['startpay']);
$startpaymethod = stripslashes($_POST['startpaymethod']);
$currentpay = stripslashes($_POST['currentpay']);
$curpaymethod = stripslashes($_POST['curpaymethod']);
$hourperweek = stripslashes($_POST['hourperweek']);
$wantassistance = stripslashes($_POST['wantassistance']);
$traveloutofbay = stripslashes($_POST['traveloutofbay']);
$traveloutofstate = stripslashes($_POST['traveloutofstate']);

//--- settings ---//

$autorespond = 0;
$autofrom = 'career.services@fastresponse.org';
$autosubject = 'Graduate Employment Survey';
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

if (!$name) {
  $error .= "Please enter your name.\n";
}

if (!$course) {
  $error .= "Please enter the course you took.\n";
}

if (!$graddate) {
  $error .= "Please enter your graduation date.\n";
}

if (!$relevantjob || ($relevantjob != "yes" && $relevantjob != "no")) {
  $error .= "Please indicate whether you are working in a position relevant to your course.\n";
}

if ($error) {
  echo '<div class="error">'.nl2br($error).'</div>';
  return;
}

//--- end of validation of input ---//



//--- create and send email to us from user ---//

$messages = "From: $email\n";
$messages.= "Name: $name\n";
$messages.= "Course: $email\n";
$messages.= "Graduation Date: $graddate\n";
$messages.= "Relevant job: " . ucfirst($relevantjob) . "\n";

if ($relevantjob == "yes") {
  $messages.= "Position: $position\n";
  $messages.= "Employer name: $empname\n";
  $messages.= "Employer address: $empaddr\n";
  $messages.= "Hire date: $hiredate\n";
  $messages.= "Starting pay: $startpay $startpaymethod\n";
  $messages.= "Current pay: $currentpay $curpaymethod\n";
  $messages.= "Hours per week: $hoursperweek\n";
}
else {
  $messages.= "Additional assistance: " . ucfirst($wantassistance) . "\n";
  $messages.= "Travel out of Bay Area: " . ucfirst($traveloutofbay) . "\n";
  $messages.= "Travel out of State: " . ucfirst($traveloutofstate) . "\n";
}

$mail = new PHPMailer(); 

$mail->SetFrom($email);
$mail->AddReplyTo($email, $name);
$mail->AddAddress($to, $name);
$mail->Subject = "Graduate Employment Survey";
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

$sentok = $mail->Send();

if ($sentok) {
  // we don't actually do anything here
}

?>
