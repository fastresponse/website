<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/php/dbconn.php');

if (version_compare(phpversion(), '5.5.0', '<')) {
  require_once($_SERVER['DOCUMENT_ROOT'] . '/php/array_column.php');
}

if (empty($handle)) $handle = db_connect();

function get_course_dates($handle, $course_abbr, $course_types, $count_max = false) {
  $max = 0;
  $types_list = array();

  $date_query = function($handle, $course_abbr, $type) {
    $results = basic_query($handle,
      array(
        "DATE_FORMAT(thedate, '%M %D, %Y') as date"
      ),
      'start_dates',
      array(
        'type = :type',
        'course = :course',
        "thedate >= '" . date('Y-m-d') . "'",
      ),
      'thedate ASC',
      0,
      array(':type' => $type, ':course' => $course_abbr)
    );
    $results = array_column($results, 'date');
    return $results;
  };

  foreach ($course_types as $type) {
    $tmp = $date_query($handle, $course_abbr, $type);

    if ($count_max && count($tmp) > $max) {
      $max = count($tmp);
    }

    $types_list[$type] = $tmp;
  }

  if ($count_max)
    return array($max, $types_list);

  return $types_list;
}

function get_course_dates_list($handle, $course_abbr, $course_types) {
  $output = array();

  list($max, $types_list) =
    get_course_dates($handle, $course_abbr, $course_types, true)
  ;

  foreach ($types_list as $type => $date_list) {

    if (!count($date_list)) {
      $date_list[] = 'TBA';
    }

    $lineht = $max / count($date_list) * 1.25;

    $date_list_html = array();

    // add html to every value
    foreach ($date_list as $date) {
      $date_list_html[] = 
	      "<div class='course-start-date' style='line-height: $lineht';>$date</div>"
      ;
    }

    $output[$type] = implode("\n", $date_list_html);

    /* ** using a fractional line-height instead of adding line breaks **
    if (count($date_list) < $max) {
      $output[$type] .= str_repeat( '<br />', $max - count($date_list) );
    }
    */
  }

  return $output;
}

?>
