<?php

$category = 'ceu';

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_vars.php');

$page_title = 'Phlebotomy for Medical Professionals';

$course_name = 'Phlebotomy for Medical Professionals';
$course_abbr = 'PHL-MP';
$course_title = 'Phlebotomy for Medical Professionals';
$course_types = array('Refresher');

$links = array(
  'Phlebotomy for Medical Professionals'
);

module_remove(array('CEU Announcements', 'CEU Promotions'));

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_template.php');
?>
