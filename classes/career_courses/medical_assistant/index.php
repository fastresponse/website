<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_vars.php');

$page_title = 'Medical Assistant';

$course_name = 'Medical Assistant';
$course_abbr = 'CMA';
$course_title = 'Clinical Medical Assistant';
$course_types = array('AM');

$links = array(
  'Immunizations for Medical Assistants',
);

$zip_radius = 50;

$sections['left'] = array_diff($sections['left'],
  array('Certifications')
);

array_splice(
  $sections['left'], 1, 0, array('Announcements')
);
array_splice(
  $sections['right'], 2, 0, array('Certifications')
);

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_template.php');
?>
