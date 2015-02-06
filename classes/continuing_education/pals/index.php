<?php

$category = 'ceu';

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_vars.php');

$page_title = 'PALS';

$course_name = 'PALS';
$course_abbr = 'PALS';
$course_title = 'Pediatric Advanced Life Support';
$course_types = array('Provider', 'Renewal');

$links = array(
  'PALS Initial Certification',
  'PALS Renewal',
);

module_move('Books', 'center', 3);

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_template.php');
?>
