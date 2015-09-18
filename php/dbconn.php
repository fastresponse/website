<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/php/dbsettings.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/php/frlib.php');

/* all functions related to database connections and queries */

error_reporting(E_ALL);

function handleit($e) {
  /*
  echo '<pre style="text-align: left; white-space: pre-wrap">';
  print_r($e->getMessage());
  echo "\n";
  print_r($e->getTrace());
  echo "\n";
  echo '</pre>';
  */
}
set_exception_handler('handleit');

function db_connect($table = '') {

  list($local_testing, $host, $user, $pass, $dbname) = dbsettings($table);

  try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
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

function basic_query(
  $dbh, $select, $table, $where, $order, $limit, $params
) {
  if ($dbh == null) return;

  if (!($select && count($select) && $table)) return;

  $query = 'SELECT ' . implode(', ', $select);
  $query.= ' FROM ' . $table;

  if ($where && count($where))
    $query.= ' WHERE ' . implode(' AND ', $where);
  if ($order)
    $query.= ' ORDER BY ' . $order;
  if ($limit)
    $query.= ' LIMIT ' . $limit;

  $sth = $dbh->prepare($query, array() );
  $sth->execute($params);

  /*
  if ($limit == 0) {
    $data = $sth->fetchAll();
  }
  else {
    $data = $sth->fetch();
  }
  */
  if ($limit == 1) {
    $data = $sth->fetch();
  }
  else {
    $data = $sth->fetchAll();
  }

  $data = htmlsafe($data);

  return $data;
}

function query_set_values($dbh, $column, $table) {
  $query = "SHOW COLUMNS FROM `$table` LIKE '$column'";
  $results = db_query($dbh, $query, array());
  if (empty($results))
    return array();

  $values = $results[0]['Type'];
  // string: set('one','two','three','four')
  // string: enum('one','two')

  $leftparenpos = strpos($values, '(');

  $values = substr($values, $leftparenpos+2, -2);
  // string: one','two','three','four
  
  $values = explode("','", $values);
  // array('one', 'two', 'three', 'four')

  return $values;
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
    WHERE name = :name
    LIMIT 1"
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
    "SELECT DATE_FORMAT(postdate, '%d-%b-%Y') AS showdate, id,
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

function update_jobposting($dbh, $jobid, $date, $courses, $company, $jobtitle,
$requirements, $contact, $apply, $text) {
  $i_jobpost =
    "UPDATE jobpostings
    SET postdate = :postdate, courses = :courses, company = :company, jobtitle = :jobtitle,
    requirements = :requirements, contact = :contact, apply = :apply, text = :text
    WHERE id = :jobid"
  ;

  // mysql REQUIRES YYYY-MM-DD date format, so convert whatever we get
  $date = date('Y-m-d', strtotime($date));

  if (is_array($courses))
    $courses = arr_to_set($courses);

  $params = array(
    ':jobid' => $jobid,
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


function delete_jobposting($dbh, $jobid) {
  $d_jobpost =
    "DELETE FROM jobpostings
    WHERE id = :id"
  ;

  $params[':id'] = $jobid;

  return db_insert($dbh, $d_jobpost, $params);
}

function create_query_dates($course, $type, $sort = 'thedate') {
  $q_date =
    "SELECT DATE_FORMAT(thedate, '%M %D, %Y') AS showdate, " .
    "thedate, course, type FROM start_dates"
  ;

  if ($course) {
    $params[':course'] = $course;
    $q_where[] = 'course = :course';
  }
  
  if ($type) {
    $params[':type'] = $type;
    $q_where[] = 'type = :type';
  }

  $q_where[] = "thedate >= '" . date('Y-m-d') . "'";

  if (isset($q_where) && count($q_where)) {
    $q_date .= ' WHERE ' . implode(' AND ', $q_where);
  }

  switch ($sort) {
    default:
    case 'thedate':
      $sort = 'thedate';
      break;
    case 'course':
    case 'type':
      $sort = "$sort,thedate";
  }
    
  $q_date .= " ORDER BY $sort ASC";

  return array($q_date, $params);
}

function query_course_dates($dbh, $course, $type, $sort = 'thedate') {
  $query_data = create_query_dates($course, $type, $sort);
  $q_date = $query_data[0];
  $params = $query_data[1];
  $result = db_query($dbh, $q_date, $params, 0);
  return $result;
}

function query_next_date($dbh, $course, $type) {
  $query_data = create_query_dates($course, $type);
  $q_date = $query_data[0] . ' LIMIT 1';
  $params = $query_data[1];
  $result = db_query($dbh, $q_date, $params, 1);
  if (!is_array($result) || !count($result))
    $result = array('showdate' => 'TBA');
  return $result;
}

function query_course_date(
  $dbh, $course, $type, $when = 'after', $date = null, $limit = 1
) {

  if (!isset($date)) {
    $date = '' . date('Y-m-d') . '';
  }
  elseif (is_array($date)) {
    if (count($date) != 2) {
      // not sure what to do here
    }
  }
  else {
    settype($date, "string");
  }

  if (!$limit || $limit < 1) $limit = 0;

  $params = array(':course' => $course);

  switch ($when) {
    default:
    case 'after':
      $sort = 'ASC';
      $whenrange = '>= :date';
      $params[':date'] = $date;
    break;

    case 'before':
      $sort = 'DESC';
      $whenrange = '<= :date';
      $params[':date'] = $date;
    break;

    case 'between':
      $whenrange = 'BETWEEN CAST(:startdate AS DATE) AND CAST(:enddate AS DATE)';
      $params[':startdate'] = $date[0];
      $params[':enddate'] = $date[1];
    break;
  }

  if (is_array($type)) {
    $type_line = 'FIND_IN_SET(type, \'' . implode(',', $type) . '\')';
  }
  else {
    $type_line = 'type = :type';
    $params[':type'] = $type;
  }

  $result = basic_query($dbh,
    array(
      "DATE_FORMAT(thedate, '%M %D, %Y') as showdate",
      'thedate',
      'status',
    ),
    'start_dates',
    array(
      'course = :course',
      $type_line,
      'thedate ' . $whenrange,
    ),
    'thedate ' . $sort,
    $limit,
    $params
  );

  if (!is_array($result) || !count($result))
    $result = array('showdate' => 'TBA', 'thedate' => 0, 'status' => '');
  return $result;
}

function query_next_course_date(
  $dbh, $course, $type, $date = null, $limit = 1
) {
  return query_course_date($dbh, $course, $type, 'after', $date, $limit);
}

function query_prev_course_date(
  $dbh, $course, $type, $date = null, $limit = 1
) {
  return query_course_date($dbh, $course, $type, 'before', $date, $limit);
}

function query_prev_date($dbh, $course, $type, $thisdate) {
  $q_date =
    "SELECT DATE_FORMAT(thedate, '%M %D, %Y') AS showdate, " .
    "thedate, course, type FROM start_dates"
  ;

  if ($course) {
    $params[':course'] = $course;
    $q_where[] = 'course = :course';
  }
  
  if ($type) {
    $params[':type'] = $type;
    $q_where[] = 'type = :type';
  }

  $params[':thisdate'] = $thisdate;
  $q_where[] = 'thedate <= :thisdate';

  if (isset($q_where) && count($q_where)) {
    $q_date .= ' WHERE ' . implode(' AND ', $q_where);
  }

  $q_date .= ' ORDER BY thedate DESC LIMIT 1';

  $result = db_query($dbh, $q_date, $params, 1);
  if (!is_array($result) || !count($result))
    $result = array('showdate' => 'TBA');
  return $result;
}

function query_promo($dbh, $code) {
  $q_promo =
    "SELECT DATE_FORMAT(start_date, '%M %D, %Y') AS start, " .
    "DATE_FORMAT(end_date, '%M %D, %Y') AS end, " .
    "code, title, header, body, buttons, start_date, end_date " .
    "FROM promos " .
    "WHERE code = :code LIMIT 1"
  ;

  $params[':code'] = $code;

  $result = db_query($dbh, $q_promo, $params, 1);
  return $result;
}

function query_button($dbh, $text) {
  $q_button =
    "SELECT * FROM buttons " .
    "WHERE text = :text LIMIT 1"
  ;

  $params[':text'] = $text;

  $result = db_query($dbh, $q_button, $params, 1);
  return $result;
}

function query_promo_dates($dbh, $date1 = null, $date2 = null) {
  $q_promos =
    "SELECT DATE_FORMAT(start_date, '%M %D, %Y') AS start, " .
    "DATE_FORMAT(end_date, '%M %D, %Y') as end, " .
    "code, title, header, body, buttons, start_date, end_date " .
    "FROM promos"
  ;
  $params = array();

  // if last arg is not null, then previous arg must exist, right?
  // both dates given
  // = all promos w/ promo_date between date1 and date2
  if ($date2) {
    $params[':end_date'] = $date2;
    $q_where[] = '((end_date is NULL) OR (end_date <= :end_date))';
    $params[':start_date'] = $date1;
    $q_where[] = '((start_date is NULL) OR (start_date >= :start_date))';
  }
  // only one date given
  // = all promos where date1 between promo start and promo end
  else if ($date1) {
    $params[':cur_date'] = $date1;
    $q_where[] = '((end_date is NULL) OR (:cur_date <= end_date))';
    $q_where[] = '((start_date is NULL) OR (:cur_date >= start_date))';
  }

  if (isset($q_where) && count($q_where)) {
    $q_promos .= ' WHERE ' . implode(' AND ', $q_where);
  }

  $q_promos .= ' ORDER BY start_date ASC';

  $result = db_query($dbh, $q_promos, $params);
  return $result;
}

function query_start_dates($dbh, $limit, $year, $month, $day) {
  $select = array('course', 'type', 'thedate AS date');
  $table = 'start_dates';
  $order = null;

  $params = array();
  $where = array();

  if ($year) {
    $params[':year'] = $year;
    $where[] = '(YEAR(date) == :year)';
  }
  if ($month) {
    $params[':month'] = $month;
    $where[] = '(MONTH(date) == :month)';
  }
  if ($day) {
    $params[':day'] = $day;
    $where[] = '(DAY(date) == :day)';
  }

  if ($limit && $limit > 0) {
    $params[':limit'] = $limit;
    $limit = ':limit';
  }

  $result = basic_query(
    $dbh, $select, $table, $where, $order, $limit, $params
  );
  return $result;
}

function query_events_full($dbh, $limit, $date_start, $date_end) {
  $select = array(
    "DATE_FORMAT(date, '%M %D, %Y') as longdate",
    'id', 'date', 'title', 'body', 'thumbnail',
    'programs', /*'imagesize',*/ 'images', 'links',
  );
  $table = 'events';
  $order = 'date DESC';

  $params = array();
  $where = array();

  if ($date_start && $date_end) {
    $params[':datestart'] = $date_start;
    $params[':dateend'] = $date_end;
    $where[] = 'date BETWEEN :datestart AND :dateend';
  }

  if ($limit && $limit > 0) {
    $params[':limit'] = $limit;
    $limit = ':limit';
  }

  $result = basic_query(
    $dbh, $select, $table, $where, $order, $limit, $params
  );
  return $result;
}

function query_events_summary($dbh, $limit, $date_start, $date_end) {
  $select = array('date', 'title', 'thumbnail');
  $table = 'events';
  $order = 'date DESC';

  $params = array();
  $where = array();

  if ($date_start && $date_end) {
    $params[':datestart'] = $date_start;
    $params[':dateend'] = $date_end;
    $where[] = 'date BETWEEN :datestart AND :dateend';
  }

  if ($limit && $limit > 0) {
    $params[':limit'] = $limit;
    $limit = ':limit';
  }

  $result = basic_query(
    $dbh, $select, $table, $where, $order, $limit, $params
  );
  return $result;
}

function query_external($dbh, $course, $type, $dept = false, $loc = false) {
  $select = array('site');
  if ($dept) $select[] = 'department';
  if ($loc) $select[] = 'location';

  $results = basic_query($dbh,
    $select, # select
    'external_sites', # from
    array(
      'FIND_IN_SET(:course, courses) > 0',
      'FIND_IN_SET(:type, type) > 0'
    ), # where
    'site, location, department', # order by
    0, # limit
    array(
      ':course' => $course,
      ':type' => $type
    ) # replacement parameters
  );

  foreach ($results as &$r) {
    $r['site_department'] = $r['site'];
    if (!empty($r['location'])) {
      $r['site_department'] .= ' ' . $r['location'];
    }
    if (!empty($r['department'])) {
      $r['site_department'] .= ' ' . $r['department'];
    }
  }

  return $results;
}

?>
