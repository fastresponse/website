<?php

error_reporting (0);

require($_SERVER['DOCUMENT_ROOT'] . '/php/lib/class.autoreply_emailer.php');

$emailer_ob = new AutoreplyEmailer();

if ($emailer_ob->validate_variables()) {
  $emailer_ob->send_email_to_us();
}

$success = $emailer_ob->get_status();
$output = $emailer_ob->get_output();

if ($success) {
  $class = 'success';
  $emailer_ob->send_email_to_them();
}
else {
  $class = 'error';
}

$output = '<div class="' . $class . '">' . $output . '</div>';

$data = array('success' => $success, 'output' => $output);
header('Content-Type: application/json');
echo json_encode($data, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);

?>
