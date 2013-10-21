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
  $dates[] = $data;
}

//header('Content-type: text/json');
header('Content-type: application/json');
echo json_encode($dates, JSON_PRETTY_PRINT);
