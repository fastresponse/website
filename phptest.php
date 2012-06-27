<html><head><title></title></head><body>

<?php

print_r(pathinfo("school/info/email_replies/blah.html"));
echo "<br>";
if (file_exists("school/info/email_replies/blah.html"))
  echo "True";
else
  echo "False";

?>

</body></html>
