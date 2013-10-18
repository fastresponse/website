<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/php/dbconn.php');
$handle = db_connect('start_dates');

header('Content-type: text/json');
echo '[';

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

for ($i = 0, $total = count($dates), $stop = $total - 1; $i < $total; $i++) {
  if ($i < $stop)
    $dates[$i] .= ', ';
  echo $dates[$i];
}

echo ']';

?>
