<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/php/dbsettings.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/php/frlib.php');

/* all functions related to database connections and queries */

function handleit($e) {
  /* this is debug stuff
  echo '<pre>';
  print_r($e->getMessage());
  echo "\n";
  print_r($e->getTrace());
  echo "\n";
  echo '</pre>';
  */
}
set_exception_handler('handleit');

function db_connect() {

  list($local_testing, $host, $user, $pass, $dbname) = dbsettings();

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

function query_companies_name_web($dbh) {
  $q_list =
    "SELECT name, website
    FROM companies"
  ;
  $params = array();

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
    ':apply' => $apply,
    ':courses' => $courses,
    ':streetaddr' => $streetaddr,
    ':city' => $city,
    ':state' => $state,
    ':phone' => $phone,
    ':contact' => $contact,
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
    ':jobtitle' => $jobtitle,
    ':requirements' => $requirements,
    ':contact' => $contact,
    ':apply' => $apply,
    ':text' => $text,
  );

  return db_insert($dbh, $i_jobpost, $params);
}

?>
