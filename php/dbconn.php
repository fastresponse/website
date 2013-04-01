<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/php/dbsettings.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/php/frlib.php');

/* all functions related to database connections and queries */

function handleit($e) {
  /*
  echo '<pre>';
  print_r($e->getMessage());
  echo "\n";
  print_r($e->getTrace());
  echo "\n";
  echo '</pre>';
  */
}
set_exception_handler('handleit');

function db_connect($which = 'career_services') {

  list($local_testing, $host, $user, $pass, $dbname) = dbsettings($which);

  try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $e) {
    $dbh = null;
    handleit($e);
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

  $data = htmlsafe($data);

  return $data;
}

function db_insert($dbh, $statement, $params) {
  if ($dbh == null) return;

  $sth = $dbh->prepare($statement, array() );
  $success = $sth->execute($params);

  return $success;
}

function query_company_list($dbh) {
  $q_list =
    "SELECT name
    FROM companies"
  ;

  $params = array();

  return db_query($dbh, $q_list, $params);
}

function query_companies_web_by_course($dbh, $course = null) {
  $q_list =
    "SELECT name, website
    FROM companies"
  ;
  $params = array();

  if ($course) {
    $q_list .= " WHERE FIND_IN_SET(:course, courses) > 0";
    $params[':course'] = $course;
  }

  return db_query($dbh, $q_list, $params);
}

function query_company($dbh, $name) {
  $q_src =
    "SELECT website, apply, courses, streetaddr, city, state, phone, contact
    FROM companies
    WHERE name = :name"
  ;
  $params = array(
    ':name' => $name,
  );

  return db_query($dbh, $q_src, $params, 1);
}

function query_company_full($dbh) {
  $q_src =
    "SELECT name, website, apply, courses, streetaddr, city, state, phone, contact
    FROM companies"
  ;
  $params = array();

  return db_query($dbh, $q_src, $params);
}

function query_jobpostings($dbh, $firstdate, $lastdate, $course, $company) {
  $q_jobpost =
    "SELECT DATE_FORMAT(postdate, '%d-%b-%Y') AS showdate,
     courses, company, jobtitle, requirements, contact, apply, text
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

  if ($company) {
    $q_jobpost .= " AND company = :company";
    $params[':company'] = $company;
  }

  $q_jobpost .= " ORDER BY postdate DESC";

  return db_query($dbh, $q_jobpost, $params);
}

function insert_company($dbh, $name, $website, $apply, $courses,
$streetaddr, $city, $state, $phone, $contact) {
  $i_src =
    "INSERT INTO companies
    (name, website, apply, courses, streetaddr, city, state, phone, contact)
    VALUES
    (:name, :website, :apply, :courses, :streetaddr, :city, :state, :phone, :contact)"
  ;

  if (is_array($courses))
    $courses = arr_to_set($courses);

  $phone = phone_strip($phone);

  $params = array(
    ':name' => $name,
    ':website' => $website,
    ':apply' => stripslashes($apply),
    ':courses' => $courses,
    ':streetaddr' => $streetaddr,
    ':city' => $city,
    ':state' => $state,
    ':phone' => $phone,
    ':contact' => stripslashes($contact),
  );

  return db_insert($dbh, $i_src, $params);
}

function insert_jobposting($dbh, $date, $courses, $company, $jobtitle,
$requirements, $contact, $apply, $text) {
  $i_jobpost =
    "INSERT INTO jobpostings
    (postdate, courses, company, jobtitle, requirements, contact, apply, text)
    VALUES
    (:postdate, :courses, :company, :jobtitle, :requirements, :contact, :apply, :text)"
  ;

  // mysql REQUIRES YYYY-MM-DD date format, so convert whatever we get
  $date = date('Y-m-d', strtotime($date));

  if (is_array($courses))
    $courses = arr_to_set($courses);

  $params = array(
    ':postdate' => $date,
    ':courses' => $courses,
    ':company' => $company,
    ':jobtitle' => stripslashes($jobtitle),
    ':requirements' => stripslashes($requirements),
    ':contact' => stripslashes($contact),
    ':apply' => stripslashes($apply),
    ':text' => stripslashes($text),
  );

  return db_insert($dbh, $i_jobpost, $params);
}

function query_next_date($dbh, $course, $type) {
  $q_date =
    "SELECT DATE_FORMAT(thedate, '%M %D, %Y') AS showdate, course, type
    FROM start_dates
    WHERE course = :course"
  ;
  $params = array(
    ':course' => $course,
  );
  
  if ($type) {
    $q_date .= " AND type = :type";
    $params[':type'] = $type;
  }

  $q_date .= " ORDER BY thedate ASC";

  $result = db_query($dbh, $q_date, $params, 1);

  if (!is_array($result) || !count($result))
    $result = array('showdate' => 'TBA');

  return $result;
}

?>
