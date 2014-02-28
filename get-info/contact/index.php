<?php
include_once('../includes/functions.php');
include_once('../includes/vars.php');

if (empty($_POST)) {
	header('Location: ' . BASE_URL);
	exit;
}

require('../includes/PHPMailerAutoload.php');

$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
$_POST['comments'] = nl2br($_POST['comments']);

//print_r($_POST);

$mail = new PHPMailer;

$mail->From = EMAIL_FROM;
$mail->FromName = 'fastresponse.org mailer';
$mail->addAddress(EMAIL_TO);
$mail->isHTML(true);

$mail->Subject = 'New Lead: Fast Response PPC';
$mail->Body    = "<b>Name</b>: {$_POST['full_name']}<br>";
$mail->Body   .= "<b>Email</b>: {$_POST['email']}<br>";
$mail->Body   .= "<b>Phone</b>: {$_POST['phone']}<br>";
if (isset($_POST['city'])) {
  $mail->Body   .= "<b>City</b>: {$_POST['city']}<br>";
}
$mail->Body   .= "<b>Zip</b>: {$_POST['zip']}<br>";
$mail->Body   .= "<b>Program</b>: {$_POST['program']}<br>";
$mail->Body   .= "<b>Questions</b>: {$_POST['chk_questions']}<br>";
$mail->Body   .= "<b>Comments</b>: {$_POST['comments']}<br>";
$mail->Body   .= "<b>Source</b>: {$_POST['source']}<br>";

if(!$mail->send()) {
	echo 'Message could not be sent. ';
	echo 'Mailer Error: ' . $mail->ErrorInfo;
	exit;
};

header('Location: ' . BASE_URL . 'thankyou.php');
exit;

?>
