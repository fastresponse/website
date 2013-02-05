<?php

/* all functions related to database connections and queries */

function handleit($ex) {
  // do nothing
}
set_exception_handler('handleit');

// translates a php array into a mysql set
function arr_to_set($data_arr) {
  $data_set = implode(',', $data_arr);
  $data_set = "'$data_set'";
  return $data_set;
}

function db_connect() {
  $local_testing = 0;
  if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1' && gethostname() == 'animal')
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

  try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
  }
  catch(PDOException $e) {
    $dbh = null;
  }

  return $dbh;
}

function db_query($dbh, $query, $params, $single = 0) {
  if ($dbh == null) return;

  $sth = $dbh->prepare($query, array() );
  $sth->execute($params);

  if ($single == 0) {
    $data = $sth->fetchAll();
  }
  else {
    $data = $sth->fetch();
  }

  return $data;
}

function query_source_list($dbh) {
  $q_list =
    "SELECT name
    FROM sources"
  ;

  $params = array();

  return db_query($dbh, $q_list, $params);
}

function query_source($dbh, $name) {
  $q_src =
    "SELECT website, directions, courses
    FROM sources
    WHERE name = :name"
  ;
  $params = array(
    ':name' => $name,
  );

  return db_query($dbh, $q_src, $params, 1);
}

function query_source_full($dbh) {
  $q_src =
    "SELECT name, website, directions, courses
    FROM sources"
  ;
  $params = array();

  return db_query($dbh, $q_src, $params);
}

function query_jobpostings($dbh, $firstdate, $lastdate, $course, $source) {
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

  return db_query($dbh, $q_jobpost, $params);
}

function insert_source($dbh, $name, $website, $directions, $courses) {
  $i_src =
    "INSERT INTO sources (name, website, directions, courses)
    VALUES (:name, :website, :directions, :courses)"
  ;

  if (is_array($courses))
    $courses = arr_to_set($courses);

  $params = array(
    ':name' => $name,
    ':website' => $website,
    ':directions' => $directions,
    ':courses' => $courses,
  );

  return db_query($dbh, $i_src, $params);
}

function insert_jobposting($dbh, $date, $courses, $source, $text) {
  $i_jobpost =
    "INSERT INTO jobpostings (postdate, courses, source, text)
    VALUES (:postdate, :courses, :source, :text)"
  ;

  if (is_array($courses))
    $courses = arr_to_set($courses);

  $params = array(
    ':postdate' => $date,
    ':courses' => $courses,
    ':source' => $source,
    ':text' => $text,
  );

  return db_query($dbh, $i_jobpost, $params);
}

// not db related: sanitize a string to use as an html div id
function sanitize_id($in) {
  $out = str_replace(" ", "_", $in);
  return $out;
}

?>
