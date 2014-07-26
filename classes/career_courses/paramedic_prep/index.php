<?php
$category = 'postsec';

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_vars.php');

$page_title = 'Paramedic Preparation';

$course_name = 'Paramedic Preparation';
$course_abbr = 'PARA-PREP';
$course_title = 'Paramedic Preparation';
$course_types = array('Full-time');

$registration_link = '';

$links = array(
  'Academy Application',
  'Immunizations for Paramedics',
  'Paramedic Application Process',
  //'Paramedic Anatomy and Physiology',
);

$zip_radius = 75;

$sections['left'] = array_diff($sections['left'],
  array('Testimonials')
);
$sections['center'] = array_diff($sections['center'],
  array('Admissions Procedures')
);
$sections['right'] = array_diff($sections['right'],
  array('Immunizations')
);
array_splice(
  $sections['right'], 1, 0, array('Registration')
);

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_template.php');
?>
