<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/php/dbconn.php');

if (version_compare(phpversion(), '5.5.0', '<')) {
  require_once($_SERVER['DOCUMENT_ROOT'] . '/php/array_column.php');
}

if (empty($handle)) $handle = db_connect();

function get_course_dates_list($handle, $course_abbr, $course_types, $combine = false) {
  $max = 0;
  $prev_date = null;
  $types_list = array();
  $output = array();

  global $course_dates_type, $course_dates_limit;

  $date_and_status = function($arr) {
    if (!isset($arr) || !is_array($arr) || !isset($arr['showdate']))
      return '';
    $out = '' . $arr['showdate'] . '';
    if (isset($arr['status']) && strlen($arr['status'])) {
      $out = $out . ' (' . $arr['status'] . ')';
    }
    return $out;
  };

  if ($combine) {
    $result = query_course_date(
      $handle, $course_abbr, $course_types, null, null, $course_dates_limit
    );
    $tmp = array();
    if ($course_dates_limit == 1) {
      //$tmp = array($result['showdate']);
      if ($result['showdate'] != 'TBA') {
        $tmp = array( $result['showdate'] . ' (' . $result['status'] . ')' );
      }
    }
    else {
      //$tmp = array_column($result, 'showdate');
      if ($result[0]['showdate'] != 'TBA') {
        for ($i = 0; $i < count($result); $i++) {
          $tmp[] = $result[$i]['showdate'] . ' (' . $result[$i]['status'] . ')';
        }
      }
    }
    $max = count($tmp);
    $types_list['all'] = $tmp;
  }

  else {
    foreach ($course_types as $type) {
      $result = query_course_date(
        $handle, $course_abbr, $type, 'after', $prev_date, $course_dates_limit
      );
      $tmp = array();
      if ($course_dates_limit == 1) {
        //$tmp = array($result['showdate']);
        if ($result['showdate'] != 'TBA') {
          //$tmp = array( $result['showdate'] . ' (' . $result['status'] . ')' );
          $tmp[] = $date_and_status($result);
        }
      }
      else {
        //$tmp = array_column($result, 'showdate');
        if ($result[0]['showdate'] != 'TBA') {
          for ($i = 0; $i < count($result); $i++) {
            //$tmp[] = $result[$i]['showdate'] . ' (' . $result[$i]['status'] . ')';
            $tmp[] = $date_and_status($result[$i]);
          }
        }
      }
      if (count($tmp) > $max) {
        $max = count($tmp);
      }
      $types_list[$type] = $tmp;
      /*   
      array(
        'FT' => array('February 2nd, 2015 (open)', 'March 18th, 2015 (full)'),
        'PT' => array('August 17th, 2015 (almost full)'),
      )
      */
      if ($course_dates_type == 'sequential') {
        $prev_date = $result['thedate'];
      }
    }
  }

  // separate loop necessary because we count max entries per type

  if ($max == 0) $max = 1;

  foreach ($types_list as $type => $date_list) {
    if (!count($date_list)) {
      $date_list[] = 'TBA';
    }
    $lineht = $max / count($date_list) * 1.25;
    $lineht = "style='line-height: $lineht;'";
    $lineht = ''; // temporary turn off
    $date_list_html = array();
    // format values as html
    foreach ($date_list as $date) {
      $date_list_html[] = 
	      /*"<div class='course-start-date' $lineht>$date</div>"*/
        "$date<br />"
      ;
    }
    $output[$type] = implode("\n", $date_list_html);
  }

  return $output;
}

?>
