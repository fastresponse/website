<?php

// This script receives POST data from a basic form, emails the data to us,
// then creates and sends an autoreply email to the user

error_reporting (0);

$error_output = null;
$success_output = null;

if (empty($_POST)) {
  //$error_output = 'Error sending message. Please try again later.';
  exit;
}

require($_SERVER['DOCUMENT_ROOT'] . '/php/phpmailer/class.phpmailer.php');

$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
$_POST['comments'] = nl2br($_POST['comments']);

$to_us_ok = 0;
$to_them_ok = 0;

//--- settings ---//

$send_to_us_from = 'autoreply@fastresponse.org';

$send_to_them_auto = 1;
$send_to_them_from = 'info@fastresponse.org';
$send_to_them_name = 'Fast Response School';
$send_to_them_subject = 'Welcome to Fast Response';

$send_to_them_dir = $_SERVER['DOCUMENT_ROOT'] . '/school/info/email_replies/';

$courses = array(
  // this one is a generic page to use for all emails temporarily
  'Generic' => array(
    'email' => 'autoreply@fastresponse.org',
    'page' => 'generic.html',
  ),
  'EMT' => array(
    // which of OUR email addresses should receive the user's request
    'email' => 'autoreply@fastresponse.org',
    // the webpage (in $send_to_them_dir) to email to the user
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
  $errors[] = "Please enter a valid e-mail address.";
}

if ($email && !ValidateEmail($email)) {
  $errors[] = "Please enter a valid e-mail address.";
}

if (!$phone) {
  $errors[] = "Please enter a valid phone number with area code.";
}

if ($phone && !ValidatePhone($phone)) {
  $errors[] = "Please enter a valid phone number with area code.";
}

if (!$program) {
  $errors[] = "Please select your course of interest.";
}

if ($program && !$courses[$program]) {
  $errors[] = "Please select a valid course.";
}

if (count($errors)) {
  $error_output =  '<div class="error">'.implode("<br />\n", $errors).'</div>';
}

//--- end of validation of input ---//



//--- create and send email to us from user ---//

$messages = <<<ENDMSGS
<b>Name:</b> $name
<b>Email:</b> $email
<b>Phone:</b> $phone
<b>Zip:</b> $zip
<b>Program:</b> $program
<b>Comments:</b> $comments
ENDMSGS;

//$to = $courses[$subject]['email'];
$to = $courses['Generic']['email'];

$mail = new PHPMailer(); 

$mail->SetFrom($email);
$mail->AddReplyTo($email, $name);
$mail->AddAddress($to, $name);
$mail->Subject = "Lead: $program";
$mail->Body = $messages;
$mail->IsMail();
$mail->IsHTML();

$to_us_ok = $mail->Send();

if ($to_us_ok) {
  $success_output = 'Your message has been sent. Thank you!';
}

//--- end send email to us from user ---//



//--- send html autoreply email to user ---//

// only send if the email to us succeeded and send_to_them_auto is on
if ($to_us_ok && $send_to_them_auto) {

  $messages = file_get_contents(
    //$send_to_them_dir . $courses[$subject]['page']
    $send_to_them_dir . $courses['Generic']['page']
  );

  $mail = new PHPMailer(); 

  $mail->SetFrom($send_to_them_from, $send_to_them_name);
  $mail->AddReplyTo($send_to_them_from, $send_to_them_name);
  $mail->AddAddress($email, $name);
  $mail->Subject = $send_to_them_subject;
  $mail->MsgHTML($messages);
  $mail->AltBody = strip_tags($messages);
  $mail->IsMail();

  $to_them_ok = $mail->Send();

  if ($to_them_ok) {
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
