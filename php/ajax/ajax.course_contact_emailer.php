<?php

// This script receives POST data from a basic form, emails the data to us,
// then creates and sends an autoreply email to the user

error_reporting (0);

$error_output = null;
$success_output = null;

if (empty($_POST)) {
  $error_output = 'Error sending message. Please try again later.';
  exit;
}

require($_SERVER['DOCUMENT_ROOT'] . '/php/phpmailer/class.phpmailer.php');

// sanitize the input and put each $_POST['var'] into $form_var
extract(
  filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING),
  EXTR_SKIP | EXTR_PREFIX_ALL,
  'form'
);

$var_list = array(
  'form_program', 'form_name', 'form_email',
  'form_phone', 'form_zip', 'form_city',
  'form_emt', 'form_questions', 'form_comments',
  'form_source', 'form_whenreachme', 'form_timeframe',
);

foreach ($var_list as $var) {
  if (!isset($$var)) $$var = null;
}

// status variables
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

if (!$form_email || !ValidateEmail($form_email)) {
  $error_msgs[] = "Please enter a valid e-mail address.";
}

if (!$form_phone || FALSE === ($form_phone = FormatPhone($form_phone)) ) {
  $error_msgs[] = "Please enter a valid phone number with area code.";
}

if (!$form_program || !$courses[$form_program]) {
  $error_msgs[] = "Please select your course of interest.";
}

if ($form_program == 'Paramedic' && !$form_emt) {
  $error_msgs[] = "Please confirm that you are currently an EMT.";
}

//--- end of validation of input ---//


if (count($error_msgs)) {
  $error_output =  '<div class="error">'.implode("<br />\n", $error_msgs).'</div>';
}

else {

  //--- create and send email to us from user ---//

  $messages = <<<ENDMSGS
<b>Program:</b> $form_program
<b>Name:</b> $form_name
<b>Email:</b> $form_email
<b>Phone:</b> $form_phone

ENDMSGS;

  if ($form_city) $messages .= "<b>City:</b> $form_city\n";
  if ($form_zip) $messages .= "<b>Zip:</b> $form_zip\n";

  if ($form_whenreachme) {
    $messages .= "<b>When to reach me:</b> $form_whenreachme";
    if ($form_timeframe) {
      $messages .= ", $form_timeframe";
    }
    $messages .= "\n";
  }
  else if ($form_timeframe) {
    $messages .= "<b>When to reach me:</b> $form_timeframe\n";
  }

  if ($form_emt) $messages .= "<b><u>$form_emt</u></b>\n";

  if ($form_questions) $messages .= "<b>Questions:</b> $form_questions\n";
  if ($form_comments) $messages .= "<b>Comments:</b>\n$form_comments\n";
  if ($form_source) $messages .= "<b>Source:</b> $form_source\n";


  //$to = $courses[$subject]['email'];
  $to = $courses['Generic']['email'];

  $mail = new PHPMailer(); 

  $mail->SetFrom($form_email, $form_name);
  $mail->AddAddress($to);
  $mail->Subject = "New Lead: $form_program";
  $mail->Body = nl2br($messages);
  $mail->IsMail();
  $mail->IsHTML();

  $to_us_ok = $mail->Send();

  if ($to_us_ok) {
    $success_output = '<div class="success">Your request has been sent. Thank you!</div>';
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
    $mail->AddAddress($form_email, $form_name);
    $mail->Subject = $send_to_them_subject;
    $mail->MsgHTML($messages);
    $mail->AltBody = strip_tags($messages);
    $mail->IsMail();

    $to_them_ok = $mail->Send();

    if ($to_them_ok) {
      // we don't actually do anything here
    }
  }

} //--- end of sending emails ---//


//--- handle output back to JS ---//

if ($error_output) {
  $output = $error_output;
  $success = false;
}
else {
  $output = $success_output;
  $success = true;
}

$data = array('success' => $success, 'output' => $output);
header('Content-Type: application/json');
echo json_encode($data, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
?>
