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
  array('Gallery Link', 'Testimonials')
);

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_template.php');
?>
