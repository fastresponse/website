<?php

$category = 'ceu';

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_vars.php');

$page_title = 'ITLS';

$course_name = 'ITLS';
$course_abbr = 'ITLS';
$course_title = 'International Trauma Life Support';
$course_types = array('Provider', 'Refresher');

$links = array(
  'ITLS Provider',
  'ITLS Refresher',
);

module_insert('Certification', 'right', 1);
module_remove(array('CEU Promotions', 'CEU Announcements'));

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_template.php');
?>
