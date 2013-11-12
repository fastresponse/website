<?php

require_once('class.ziplookup.php');

$dest = filter_input(INPUT_POST, 'zip', FILTER_SANITIZE_NUMBER_INT);

if (!$dest)
  return false;

$ziplookup = new ZipLookup($dest);

if (!$ziplookup->send_zip_lookup())
  return false;

$result = $ziplookup->get_distance();

if (!$result)
  return false;

echo $result;

?>
