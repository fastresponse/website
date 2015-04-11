<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_vars.php');

$page_title = 'Paramedic Academy';

$course_name = 'Paramedic';
$course_abbr = 'Paramedic';
$course_title = 'Paramedic Academy';
$course_types = array('Application Deadline', 'Anatomy and Physiology', 'Academy Start');
$course_gallery = 'Paramedic';

$course_dates_type = 'sequential';
$course_dates_limit = 1;

$links = array(
  'Academy Application',
  'Immunizations for Paramedics',
  'Paramedic Application Process',
  //'Paramedic Anatomy and Physiology',
);

$zip_radius = 75;

// don't include the testimonials section in left sidebar
$sections['left'] = array_diff($sections['left'],
  array('Testimonials')
);

// example of adding to the bottom of the right sidebar:
//$sections['right'][] = 'Testimonials';

// insert at the 4th position:
array_splice(
  $sections['center'], 4, 0, array('Anatomy and Physiology')
);

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_template.php');
?>
