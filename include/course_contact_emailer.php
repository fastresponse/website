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

extract(
  filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING),
  EXTR_SKIP | EXTR_PREFIX_ALL,
  'form'
);

$to_us_ok = 0;
$to_them_ok = 0;

//--- settings ---//

$debug_write_to_file = false;
$debug_write_filename = 'debug_output.txt';

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

function FormatPhone($phone) {
  // replace extra chars common in phone numbers with spaces
  $test = strtr($phone, '()-.+x', '      ');
  // strip all spaces
  $test = str_replace(' ', '', $test);

  // validate: only numbers left
  if (FALSE !== filter_var((int)$test, FILTER_VALIDATE_INT)) {

    // chop off a leading 1 if present
    if (strlen($test) == 11 && substr($test, 0, 1) == '1') {
      $test = substr($test, 1);
    }

    // insert hyphens for AAA-PPP-SSSS format, then return it
    if (strlen($test) == 10) {
      $test =
	      substr($test, 0, 3) . '-' .
        substr($test, 3, 3) . '-' .
        substr($test, 6)
      ;
      return $test;
    }

    else {
      // we're not sure what format they entered the phone number in,
      // so just return the original text they entered.
      // it's guaranteed the only non-digits are ()-.+x and space
      return $phone;
    }

  }

  return FALSE;
}

$error_msgs = array();

if (!$form_name) {
  $error_msgs[] = "Please enter your name.";
}

if (!$form_email) {
  $error_msgs[] = "Please enter a valid e-mail address.";
}

if ($form_email && !ValidateEmail($form_email)) {
  $error_msgs[] = "Please enter a valid e-mail address.";
}

if (!$form_phone) {
  $error_msgs[] = "Please enter a valid phone number with area code.";
}

if ($form_phone && FALSE === ($form_phone = FormatPhone($form_phone)) ) {
  $error_msgs[] = "Please enter a valid phone number with area code.";
}

if (!$form_program) {
  $error_msgs[] = "Please select your course of interest.";
}

if ($form_program && !$courses[$form_program]) {
  $error_msgs[] = "Please select a valid course.";
}

if (count($error_msgs)) {
  $error_output =  '<div class="error">'.implode("<br />\n", $error_msgs).'</div>';
}

//--- end of validation of input ---//



//--- create and send email to us from user ---//

$messages = <<<ENDMSGS
<b>Name:</b> $form_name
<b>Email:</b> $form_email
<b>Phone:</b> $form_phone
<b>Zip:</b> $form_zip
<b>Program:</b> $form_program
<b>Comments:</b>
$form_comments
ENDMSGS;


//$to = $courses[$subject]['email'];
$to = $courses['Generic']['email'];

if ($debug_write_to_file) {
  $output  = "From: $form_name ($form_email)\n";
  $output .= "To: $form_name ($to)\n";
  $output .= "Subject: New Lead: $form_program\n";
  $output .= "Body:\n\n$messages\n";

  file_put_contents($debug_write_filename, $output);

  $to_us_ok = true;
}
else {
  $mail = new PHPMailer(); 

  $mail->SetFrom($form_email, $form_name);
  $mail->AddAddress($to);
  $mail->Subject = "New Lead: $form_program";
  $mail->Body = nl2br($messages);
  $mail->IsMail();
  $mail->IsHTML();

  $to_us_ok = $mail->Send();
}

if ($to_us_ok) {
  $success_output = 'Your request has been sent. Thank you!';
}

//--- end send email to us from user ---//



//--- send html autoreply email to user ---//

// only send if the email to us succeeded and send_to_them_auto is on
if ($to_us_ok && $send_to_them_auto) {

  $messages = file_get_contents(
    //$send_to_them_dir . $courses[$subject]['page']
    $send_to_them_dir . $courses['Generic']['page']
  );

  if ($debug_write_to_file) {
    $output  = "\n\n\n";
    $output .= "From: $send_to_them_name ($send_to_them_email)\n";
    $output .= "To: $form_name ($form_email)\n";
    $output .= "Subject: $send_to_them_subject\n";
    $output .= "Body (text):\n\n " . strip_tags($messages) . "\n\n";
    $output .= "Body (html):\n\n$messages\n";

    file_put_contents($debug_write_filename, $output, FILE_APPEND);

    $to_them_ok = true;
  }
  else {
    $mail = new PHPMailer(); 

    $mail->SetFrom($send_to_them_from, $send_to_them_name);
    $mail->AddAddress($form_email, $form_name);
    $mail->Subject = $send_to_them_subject;
    $mail->MsgHTML($messages);
    $mail->AltBody = strip_tags($messages);
    $mail->IsMail();
  }

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
