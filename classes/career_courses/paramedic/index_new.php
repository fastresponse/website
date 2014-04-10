<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_vars.php');

$page_title = 'Paramedic Academy';

$course_name = 'Paramedic';
$course_abbr = 'Paramedic';
$course_title = 'Paramedic Academy';
$course_types = array('Application Deadline', 'Academy Start');

$zip_radius = 75;

// don't include the testimonials section in left sidebar
$sections['left'] = array_diff($sections['left'],
  array('Testimonials')
);
// example of adding it back to the right sidebar:
//$sections['right'][] = 'Testimonials';

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_template.php');
?>
