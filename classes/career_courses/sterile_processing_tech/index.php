<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_vars.php');

$page_title = 'Sterile Processing Technician';

$course_name = 'Sterile Processing';
$course_abbr = 'SPT';
$course_title = 'Sterile Processing Technician';
$course_types = array('Part-time');
$course_gallery = 'Sterile-Processing';

$links = array(
  'Immunizations',
  'IAHCSMM CRCST Information',
);

$zip_radius = 50;

module_remove( array('Externship', 'Testimonials') );
module_move('Admissions Procedures', 'left', 4);

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_template.php');
?>
