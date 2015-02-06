<?php

$category = 'ceu';

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_vars.php');

$page_title = 'EMT Skills Verification';

$course_name = 'EMT Skills Verification';
$course_abbr = 'EMT-Skills';
$course_title = 'EMT Skills Verification';
$course_types = array('Skills');

$links = array(
);

module_remove(array('Books', 'CEU Promotions', 'CEU Announcements'));
module_insert('EMT', 'right', 1);
module_move('Staff', 'left', 3);

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_template.php');
?>
