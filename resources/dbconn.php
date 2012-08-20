<?php

function handleit($ex) {
  // do nothing
}
set_exception_handler('handleit');

function do_query($query) {
  $user = 'careersvcs';
  $pass = 'F4stR3sponse';
  $dbname = 'career_services';

  $dbh = new PDO("mysql:host=localhost;dbname=$dbname", $user, $pass);

  // SET UP PREPARED STATEMENTS

  // close db connection
  $dbh = null;
}

?>
