<?php

$category = 'ceu';

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_vars.php');

$page_title = 'EMT Refresher';

$course_name = 'EMT Refresher';
$course_abbr = 'EMT-R';
$course_title = 'EMT Refresher';
$course_types = array('Refresher');

$links = array(
  'Register for EMT Refresher',
);

module_move('Books', 'center', 3);
module_insert('EMT', 'right', 1);

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_template.php');
?>
