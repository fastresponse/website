<?php

// This script receives the POST data from /resources/current_employment.php,
// and emails the data to us

require("../../php/phpmailer/class.phpmailer.php");

error_reporting (E_ERROR);

session_start();

if (empty($_POST)) {
  return;
}

function friendly_field_name($arg) {
  $arg = str_replace("_", " ", $arg);
  $arg = str_replace("-", " ", $arg);
  $arg = ucfirst($arg);
  return $arg;
}

// Use this in the form doc to set which fields we care about:
// <input type="hidden" name="fields" value="name,course,date,etc" />
// <input type="hidden" name="required_fields" value="name,date" />
// these are name= values of input elements

$fields = explode(',' , $_SESSION['form fields']);
$fields = array_flip($fields);

$required_fields = explode(',' , $_SESSION['form required fields']);

$errors = array();

foreach ($fields as $key => $val) {
  $val = stripslashes(trim($_POST[$key]));
  $fields[$key] = $val;
  if (in_array($key, $required_fields) && !$val) {
    $errors[] = $key;
  }
}

//--- settings ---//

$autorespond = $_SESSION['form autorespond'] || 0;
$autofrom = $_SESSION['form fromemail'];
$autoname = $_SESSION['form fromname'] || 'Fast Response School of Health Care Education';
$autosubject = $_SESSION['form theirsubject'];
$oursubject = $_SESSION['form oursubject'];
$replyfile = './' . $_SESSION['form reply file'];

$to = $autofrom;

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

$error_text = '';

if (count($errors)) {
  $error_text = "The following fields are required but missing:\n";
  foreach ($errors as $val) {
    $error_text .= friendly_field_name($val) . ", ";
  }
  $error_text = substr($error_text, 0, -2);
  $error_text .= ".\n";
}

if ($error_text) {
  echo '<div class="error">'.nl2br($error_text).'</div>';
  return;
}

//--- end of validation of input ---//



//--- create and send email to us from user ---//

$messages = "";

foreach ($fields as $key => $val) {
  $messages .= friendly_field_name($key) . ": $val\n";
}

$mail = new PHPMailer(); 

$mail->SetFrom($fields['email');
$mail->AddReplyTo($fields['email'], $fields['name']);
$mail->AddAddress($to, $fields['name']);
$mail->Subject = $oursubject;
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
if ($sentok && $autorespond) {
  $messages = file_get_contents($replyfile);

  $mail = new PHPMailer(); 

  $mail->SetFrom($autofrom, $autoname);
  $mail->AddReplyTo($autofrom, $autoname);
  $mail->AddAddress($fields['email'], $fields['name']);
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
}

// clean up
session_destroy();

?>
