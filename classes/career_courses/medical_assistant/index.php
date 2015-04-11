<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_vars.php');

$page_title = 'Medical Assistant';

$course_name = 'Medical Assistant';
$course_abbr = 'CMA';
$course_title = 'Clinical Medical Assistant';
$course_subtitle = 'with Certified Phlebotomy Technician';
$course_types = array('AM');
$course_gallery = 'Medical-Assistant';

$links = array(
  'Immunizations',
);

$zip_radius = 50;

$sections['left'] = array_diff($sections['left'],
  array('Certifications', 'Externship')
);

array_splice(
  $sections['right'], 2, 0, array('Certifications')
);

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_template.php');
?>
