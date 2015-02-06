<?php

$category = 'ceu';

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_vars.php');

$page_title = 'ACLS';

$course_name = 'ACLS';
$course_abbr = 'ACLS';
$course_title = 'Advanced Cardiovascular Life Support';
$course_types = array('Provider', 'Renewal');

$links = array(
  'ACLS Initial Certification',
  'ACLS Renewal',
);

module_move('Books', 'center', 3);

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_template.php');
?>
