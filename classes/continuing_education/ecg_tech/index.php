<?php

$category = 'ceu';

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_vars.php');

$page_title = 'ECG Technician';

$course_name = 'ECG Technician';
$course_abbr = 'ECG-T';
$course_title = 'ECG Technician';
$course_types = array('Technician');

$links = array(
  'Register for ECG Technician',
);

//module_move('Books', 'center', 3);
//module_insert('Certification', 'left', 3);
module_insert('Certification', 'right', 1);
module_remove(array('CEU Announcements', 'CEU Promotions'));

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_template.php');
?>
