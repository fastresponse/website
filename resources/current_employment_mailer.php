<?php

// This script receives POST data and emails it to us

require($_SERVER['DOCUMENT_ROOT'] . '/php/phpmailer/class.phpmailer.php');
require($_SERVER['DOCUMENT_ROOT'] . '/php/frlib.php');

error_reporting(0);

if (empty($_POST)) {
  echo '<div class="error";>No data.</div>';
  return;
}

$formvalues = array(
  'email', 'sid', 'name', 'phone', 'course', 
  'graddate', 'empname', 'position', 'empphone', 'hiredate', 
  'empaddr', 'startpay', 'currentpay', 'hoursperweek', 'comments', 
  'ok_testimonial', 'releaseok', 'testimonial',
);

$longvalues = array(
  'empaddr', 'comments', 'testimonial',
);

$requiredvalues = array(
  'name' => 'Please enter your name.',
  'course' => 'Please enter the course you took.',
  'graddate' => 'Please enter your graduation date.',
  'hiredate' => 'Please enter your date of hire.',
);

foreach ($_POST as $key => $value) {
  if (in_array($key, $formvalues) && $value) {
    $value = trim(stripslashes($value));
    $$key = $value;
  }
  if (in_array($key, $longvalues) && $value) {
    $$key = "\n" . $$key;
  }
}

//--- settings ---//

$autorespond = 0;
$autofrom = 'career.services@fastresponse.org';
$autosubject = 'Post-graduate Employment Survey';
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
  case 'course':
    if (!$$key || $$key == 'Select One')
      $error .= $value . "\n";
  break;
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

$testimonial_text = '';
if ($ok_testimonial == 'on' && $releaseok == 'on' && strlen($testimonial)) {
  $testimonial_text = "\nTestimonial: $testimonial\n";
}

foreach ($formvalues as $key) {
  if (!$$key)
    $$key = "not given";
}

$messages = "From: $email\n";
$messages.= "Name: $name\n";
$messages.= "Student ID: $sid\n";
$messages.= "Phone: " . phone_format(phone_strip($phone)) . "\n";
$messages.= "Course: $course\n";
$messages.= "Graduation date: $graddate\n";
$messages.= "Position: $position\n";
$messages.= "Employer name: $empname\n";
$messages.= "Employer address: " . str_replace("\n", "  \n", $empaddr) . "\n";
$messages.= "Hire date: $hiredate\n";
$messages.= "Starting pay: $startpay\n";
$messages.= "Current pay: $currentpay\n";
$messages.= "Hours per week: $hoursperweek\n";
$messages.= "Additional comments: " . str_replace("\n", "  \n", $comments) . "\n";
$messages.= $testimonial_text;

$mail = new PHPMailer(); 

$mail->SetFrom($email);
$mail->AddReplyTo($email, $name);
$mail->AddAddress($to, $name);
$mail->Subject = "Post-graduate Employment Survey";
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

$sentok = $mail->Send();

if ($sentok) {
  echo 'OK';
}
else {
  echo '<div class="error">Error sending.</div>';
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
