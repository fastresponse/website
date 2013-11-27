<?php
  $handle = null;

  $left_sidebar_width = 350;
  $right_sidebar_width = 180;
  $sidebar_pad_inside = 45;
  $sidebar_pad_outside = 5;
  $sidebar_pad_total = $sidebar_pad_inside + $sidebar_pad_outside;
  $content_pad_left = $left_sidebar_width + $sidebar_pad_total;
  $content_pad_right = $right_sidebar_width + $sidebar_pad_total;

  $page_title = '';

  $course_name = '';
  $course_abbr = '';
  $course_title = '';
  $course_types = array('');

  $buttons = array(
    'Course Info Packet' => true,
    'Student Resources' => true,
    'Skills Videos' => false,
    'Photo Gallery' => true,
    'Contact Us' => true,
    'Facebook' => true,
  );

  $zip_radius = 50;

  $head_code = '';
?>
