<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_vars.php');

$page_title = 'EMT';

$course_name = 'EMT';
$course_abbr = 'EMT';
$course_title = 'Emergency Medical Technician';
$course_types = array('Full-time', 'Part-time');

$course_college_reqs = array('and at least 12 completed credits');

$links = array(
  'Immunizations',
  'EMT Skills Videos',
);

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_template.php');
?>
