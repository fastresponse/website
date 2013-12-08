<html><head><title></title></head><body>

<?php

$test = '+1 (510) 849-4009';

echo "$test<br>\n";

$test = strtr($test, '()-+', '    ');

echo "$test<br>\n";

$test = str_replace(' ', '', $test);

echo "$test<br>\n";

if (strlen($test) == 11 && substr($test, 0, 1) == '1') {
  $test = substr($test, 1);
  echo "$test<br>\n";
}

if (strlen($test) == 10) {
  $test = substr($test, 0, 3) . '-' . substr($test, 3, 3) . '-' . substr($test, 6);
  echo "$test<br>\n";
}


?>

</body></html>
