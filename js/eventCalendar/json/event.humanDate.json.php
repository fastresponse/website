<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/php/dbconn.php');
$handle = db_connect('start_dates');

$args = array('limit', 'year', 'month', 'day');
foreach ($args as $arg) {
  if (isset($_GET[$arg]) && $_GET[$arg])
    $$arg = $_GET[$arg];
  else
    $$arg = null;
}

//echo '[';

/*
$courses = array('EMT', 'CPT', 'CMA', 'SPT', 'Paramedic');
foreach ($courses as $course) {
  $tmp = query_course_dates($handle, $course, null, null);
  foreach ($tmp as $onedate) {
    // $onedate = array( 'thedate' => , 'showdate' => , 'course' => , 'type' => , )
    switch ($onedate['type']) {
      case 'Application Deadline':
        $type = 'deadline';
      break;
      default:
        $type = 'class-start';
    }
    $title = $course . ' ' . $onedate['type'];
    switch ($course) {
      case 'Paramedic':
      break;
      default:
        $title .= ' class begins';
    }
    $line =  '{';
    $line .= ' "date": "' . $onedate['thedate'] . ' 12:00:00",';
    $line .= ' "type": "' . $type . '",';
    $line .= ' "title": "' . $title . '",';
    $line .= ' "description": "",';
    $line .= ' "url": ""';
    $line .= ' }';

    $dates[] = $line;
  }
}
*/

$tmp = query_start_dates($handle, $limit, $year, $month, $day);

foreach ($tmp as $onedate) {
  // $onedate = array( 'date' => , 'course' => , 'type' => , )
  switch ($onedate['type']) {
    case 'Application Deadline':
      $type = 'deadline';
    break;
    default:
      $type = 'class-start';
  }
  $title = $onedate['course'] . ' ' . $onedate['type'];
  switch ($onedate['course']) {
    case 'Paramedic':
    break;
    default:
      $title .= ' class begins';
  }
  $data['date'] = $onedate['date'] . ' 12:00:00';
  $data['type'] = $type;
  $data['title'] = $title;
  $data['description'] = '';
  $data['url'] = '';
  /*
  $line =  '{';
  $line .= ' "date": "' . $onedate['thedate'] . ' 12:00:00",';
  $line .= ' "type": "' . $type . '",';
  $line .= ' "title": "' . $title . '",';
  $line .= ' "description": "",';
  $line .= ' "url": ""';
  $line .= ' }';
  */
  $dates[] = $data;
}

//print_r($dates);

/*
for ($i = 0, $total = count($dates), $stop = $total - 1; $i < $total; $i++) {
  if ($i < $stop)
    $dates[$i] .= ', ';
  echo $dates[$i];
}
*/

//echo implode(', ', $dates);

//header('Content-type: text/json');
header('Content-type: application/json');
echo json_encode($dates, JSON_PRETTY_PRINT);
//echo json_encode($dates);

//echo ']';

