<?php

error_reporting(E_ALL);

if (empty($_POST))
  exit;

require($_SERVER['DOCUMENT_ROOT'] . '/php/phpmailer/class.phpmailer.php');

$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

$required = array(
  'form_yourname' => 'Please enter your name.',
  'form_youremail' => 'Please enter your email address.',
  'form_friendname' => 'Please enter your friend\'s name.',
  'form_friendemail' => 'Please enter your friend\'s email address.',
);
$optional = array(
  'form_friendmessage' => null,
);

foreach ($required as $req => $errmsg) {
  if (!isset($_POST[$req])) return $errmsg;
}
foreach ($optional as $opt => $replace) {
  if (!isset($_POST[$opt])) $_POST[$opt] = $replace;
}


$mail = new PHPMailer;
$mail->IsMail();
$mail->IsHTML(true);

$mail->SetFrom($_POST['form_youremail']);
$mail->AddReplyTo($_POST['form_youremail'], $_POST['form_yourname']);
//$mail->FromName = $_POST['form_yourname'];
$mail->AddAddress($_POST['form_friendemail'], $_POST['form_friendname']);
$mail->Subject = 'Here\'s a page you might be interested in';
$mail->Body = <<<ENDBODY
  Hi {$_POST['form_friendname']},

  I thought you might be interested in this course at Fast Response:
  <a href="{$_POST['form_pageurl']}" target="_blank">{$_POST['form_pagetitle']}</a>

ENDBODY;

if (!$mail->Send()) {
  echo "<div>Error: {$mail->ErrorInfo}</div>";
  exit;
}

?>

<div>Email Sent!</div>
