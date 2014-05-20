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

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_template.php');
?>
