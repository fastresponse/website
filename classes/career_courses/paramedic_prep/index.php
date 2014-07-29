<?php
$category = 'ceu';

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_vars.php');

$page_title = 'Paramedic Preparation';

$course_name = 'Paramedic Preparation';
$course_abbr = 'PARA-PREP';
$course_title = 'Paramedic Preparation';
$course_types = array('Full-time');

$registration_link = '';

$links = array(
  'Academy Application',
  'Immunizations for Paramedics',
  'Paramedic Application Process',
);

$zip_radius = 75;

array_splice(
  $sections['left'], 3, 0, array('Gallery Link')
);

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_template.php');
?>
