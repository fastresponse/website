<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_vars.php');

$page_title = 'EMT';

$course_name = 'EMT';
$course_abbr = 'EMT';
$course_title = 'Emergency Medical Technician';
$course_types = array('Full-time', 'Part-time');

$links = array(
  'EMT Course Info Packet',
  'EMT Skills Videos',
  'School Catalog',
);

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_template.php');
?>
