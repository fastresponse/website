<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_vars.php');

$page_title = 'Pharmacy Technician';

$course_name = 'Pharmacy Technician';
$course_abbr = 'PHARM-TECH';
$course_title = 'Pharmacy Technician';
$course_types = array('Full-time', 'Part-time');

$links = array(
  'Immunizations',
);

$zip_radius = 50;

$sections['left'] = array_diff($sections['left'],
  array('Gallery Link', 'Testimonials')
);

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_template.php');
?>
