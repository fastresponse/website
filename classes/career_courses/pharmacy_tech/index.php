<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_vars.php');

$page_title = 'Pharmacy Technician';

$course_name = 'Pharmacy Technician';
$course_abbr = 'PHT';
$course_title = 'Pharmacy Technician';
$course_types = array('Part-time');

$links = array(
  'Immunizations',
  'CA Board of Pharmacy',
  'Pharmacy Technician Certification Board',
);

$zip_radius = 50;

$sections['left'] = array_diff($sections['left'],
  array('Externship', 'Gallery Link', 'Testimonials')
);
$sections['center'] = array_diff($sections['center'],
  array('Admissions Procedures')
);
//array_splice(
//  $sections['left'], 5, 0, array('Admissions Procedures')
//);
$sections['left'][] = 'Admissions Procedures';
$sections['right'][] = 'Key Values';

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_template.php');
?>
