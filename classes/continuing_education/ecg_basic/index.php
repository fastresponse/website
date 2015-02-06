<?php

$category = 'ceu';

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_vars.php');

$page_title = 'ECG Basic';

$course_name = 'ECG Basic';
$course_abbr = 'ECG-B';
$course_title = 'ECG Basic Rhythm Recognition';
$course_types = array('Basic');

$links = array(
  'ECG Basic',
);

module_move('Books', 'center', 3);

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_template.php');
?>
