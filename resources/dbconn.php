<?php

/* all functions related to database connections and queries */

function handleit($ex) {
  // do nothing
}
set_exception_handler('handleit');

function db_query($query, $params, $single = 0) {
  $local_testing = 1;

  if ($local_testing) {
    $host = 'localhost';
    $user = 'careersvcs';
    $pass = 'F4stR3sponse';
    $dbname = 'career_services';
  }
  else {
    $host = 'sql5c40a.carrierzone.com';
    $user = 'fstrspnssi400738';
    $pass = 'F4stR3sponse';
    $dbname = 'career_services_' . $user;
  }

  $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

  $sth = $dbh->prepare($query, array() );
  $sth->execute($params);

  if ($single == 0) {
    $data = $sth->fetchAll();
  }
  else {
    $data = $sth->fetch();
  }

  // close db connection
  $dbh = null;

  return $data;
}

function query_source_list() {
  $q_list =
    "SELECT name
    FROM sources"
  ;

  $params = array();

  return db_query($q_list, $params);
}

function query_source($name) {
  $q_src =
    "SELECT website, directions, courses
    FROM sources
    WHERE name = :name"
  ;
  $params = array(
    ':name' => $name,
  );

  return db_query($q_src, $params, 1);
}

function query_jobpostings($firstdate, $lastdate, $course, $source) {
  $q_jobpost =
    "SELECT DATE_FORMAT(postdate, '%m-%d-%Y') AS showdate, courses, source, text
     FROM jobpostings
     WHERE postdate BETWEEN :firstdate AND :lastdate"
  ;
  $params = array(
    ':firstdate' => $firstdate,
    ':lastdate'  => $lastdate,
  );

  if ($course) {
    $q_jobpost .= " AND FIND_IN_SET(:course, courses) > 0";
    $params[':course'] = $course;
  }

  if ($source) {
    $q_jobpost .= " AND source = :source";
    $params[':source'] = $source;
  }

  $q_jobpost .= " ORDER BY postdate";

  return db_query($q_jobpost, $params);
}

?>
