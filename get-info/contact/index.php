<?php

include_once('../includes/functions.php');
include_once('../includes/vars.php');

error_reporting(0);

require($_SERVER['DOCUMENT_ROOT'] . '/php/lib/class.autoreply_emailer.php');

$emailer_ob = new AutoreplyEmailer();

if ($emailer_ob->validate_variables()) {
  $emailer_ob->send_email_to_us();
}

$success = $emailer_ob->get_status();

if ($success) {
  $emailer_ob->send_email_to_them();
  header('Location: ' . BASE_URL . 'thankyou.php');
  exit;
}

$go_back = BASE_URL;
if (isset($_SERVER['HTTP_REFERER']))
  $go_back = $_SERVER['HTTP_REFERER'];

?>

<html>
<head>
  <meta http-equiv="refresh" content="5; url=<?= $go_back ?>">
  <title>Please try again</title>
</head>
<body>

<div class="error"><?= $emailer_ob->get_output() ?></div>

</body>
</html>

<?php
  header('Refresh: 5; URL=' . $go_back);
?>
