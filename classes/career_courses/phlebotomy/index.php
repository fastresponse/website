<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_vars.php');

$page_title = 'Phlebotomy';

$course_name = 'Phlebotomy';
$course_abbr = 'CPT';
$course_title = 'Certified Phlebotomy Technician';
$course_types = array('Full-time', 'Part-time');

$links = array(
  'Immunizations',
);

// instead of Success Stories section,
// have a small testimonial video
/*
$sections['left'][] = 'Testimonial Video';
*/
$sections['left'] = array_diff($sections['left'],
  array('Externship', 'Testimonials')
);

$sections['left'][] = 'Advanced CPT';

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_template.php');
?>
