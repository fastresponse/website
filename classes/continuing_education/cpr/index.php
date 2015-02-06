<?php

$category = 'ceu';

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_vars.php');

$page_title = 'BLS';

$course_name = 'BLS';
$course_abbr = 'BLS';
$course_title = 'Basic Life Support (CPR)';
$course_types = array('Provider', 'Renewal', 'eLearning Skills');

$links = array(
  'BLS Initial Certification',
  'BLS Renewal',
  'BLS eLearning',
);

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_template.php');
?>
