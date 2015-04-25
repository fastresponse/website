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

module_remove('Testimonials', 'left');
module_insert('Anatomy and Physiology', 'center', 4);

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_template.php');
?>
