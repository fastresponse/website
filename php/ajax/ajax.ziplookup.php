<?php

require($_SERVER['DOCUMENT_ROOT'] . '/php/lib/class.ziplookup.php');

$dest = filter_input(INPUT_POST, 'zip', FILTER_SANITIZE_NUMBER_INT);

if (!$dest) {
  return false;
}

$ziplookup = new ZipLookup($dest);

if (!$ziplookup->send_zip_lookup('distance')) {
  return false;
}

$dist = $ziplookup->get_distance();
if (!$dist) {
  return false;
}

$ziplookup->send_zip_lookup('info');

$city = $ziplookup->get_city();

$result = array('dist' => $dist, 'city' => $city);

if (!$result) {
  return false;
}

echo json_encode($result);

?>
