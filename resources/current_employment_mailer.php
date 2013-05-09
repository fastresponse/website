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
  'email', 'sid', 'name', 'phone', 'course', 
  'graddate', 'empname', 'position', 'empphone', 'hiredate', 
  'empaddr', 'hourlywage', 'hoursperweek', 'comments', 
  'ok_testimonial', 'releaseok', 'testimonial',
);

$requiredvalues = array(
  'name' => 'Please enter your name.',
  'course' => 'Please enter the course you took.',
  'graddate' => 'Please enter your graduation date.',
  'hiredate' => 'Please enter your date of hire.',
  'empname' => 'Please enter the name of your employer.',
  'position' => 'Please enter the name of your position.',
  'hiredate' => 'Please enter the date you were hired.',
  'hoursperweek' => 'Please enter the average hours worked per week.',
);

//--- check formatting of data ---//

foreach ($_POST as $key => $value) {
  switch ($key) {
  case 'course':
    if ($value != 'Select One') $$key = $value;
    else $$key = null;
  break;
  case 'hoursperweek':
    $$key = intval(filter_var($value, FILTER_SANITIZE_NUMBER_INT));
  break;
  case 'hourlywage':
    $$key = money_strip($value);
  break;
  case 'phone':
    $$key = phone_format(phone_strip($value));
  break;
  case 'empaddr':
  case 'comments':
  case 'testimonial':
    // add a newline on the front,
    // then add 2 spaces at the beginning of each line
    $$key = str_replace("\n", "\n  ", "\n" . $value);
  break;
  default:
    if (in_array($key, $formvalues) && $value) {
      $value = trim(stripslashes($value));
      $$key = $value;
    }
  }
}

if ($hourlywage && $hoursperweek)
  $yearlysalary = $hourlywage * $hoursperweek * 52;
else
  $yearlysalary = 'not given';

//--- settings ---//

$localfile = $_SERVER['DOCUMENT_ROOT'] . '/php/mailerdebug.log';

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
  switch ($key) {
  default:
  if (!$$key)
    $$key = "not given";
  }
}

$messages = "From: $email\n";
$messages.= "Name: $name\n";
$messages.= "Student ID: $sid\n";
$messages.= "Phone: $phone\n";
$messages.= "Course: $course\n";
$messages.= "Graduation date: $graddate\n";
$messages.= "Position: $position\n";
$messages.= "Employer name: $empname\n";
$messages.= "Employer address: $empaddr\n";
$messages.= "Hire date: $hiredate\n";
$messages.= "Hours per week: $hoursperweek\n";
$messages.= "Hourly wage: $hourlywage\n";
$messages.= "Yearly salary: $yearlysalary\n";
$messages.= "Additional comments: $comments\n";
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
