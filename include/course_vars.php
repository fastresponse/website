<?php
  $handle = null;

  $left_sidebar_width = 320;
  $right_sidebar_width = 220;
  $sidebar_pad_inside = 25;
  $sidebar_pad_outside = 5;
  $sidebar_pad_total = $sidebar_pad_inside + $sidebar_pad_outside;
  $content_pad_left = $left_sidebar_width + $sidebar_pad_total;
  $content_pad_right = $right_sidebar_width + $sidebar_pad_total;

  $page_title = '';

  $course_name = '';
  $course_abbr = '';
  $course_title = '';
  $course_types = array('');

  $zip_radius = 50;

  $head_code = '';

  $global_links = array(
    'School Catalog',
    'Wonderlic SLE Study Guide',
    'Wonderlic SLE Sample Test',
  );  
  $links = array();
  
  $global_faqs = array(
    array('How do I do stuff?' => 'With things.'),
    array('Where is the bathroom?' => 'Down the hall.'),
    array('How much wood would a woodchuck chuck if a woodchuck could chuck wood?' =>
          'As much wood as a woodchuck could chuck if a woodchuck could chuck wood.'),
  );
  $faqs = array();
  

  /* sections */

  $course_incl_dir = $_SERVER['DOCUMENT_ROOT'] . '/include/course/';

  $sections['head'] = array(
  );

  $sections['topleft'] = array(
    'Page Logo',
  );
  $sections['topright'] = array(
    //'Promotions',
  );
  $sections['topcenter'] = array(
    'Page Title',
  );

  $sections['left'] = array(
    'Slideshow',
    'Contact Form',
    'Gallery Link',
    'Externship',
    'Testimonials',
  );

  $sections['right'] = array(
    'Course Approvals',
    'Immunizations',
    //'Events',
    //'Calendar',
    'Links',
    'Staff',
    'FAQs Menu',
    'Misc',
  );

  $sections['center'] = array(
    'Send to a Friend',
    'Course Description',
    'FAQs List',
    'Prerequisites',
    'Admissions Procedures',
    'Class Start Dates',
    'Class Schedules',
    'Certifications',
    'Tuition And Fees',
    'Financing',
  );

  // turns 'Contact Form' into 'contact_form.php'
  // if this file exists in the current dir (course-specific) then use that
  // otherwise use the one in $course_incl_dir
  //
  // this func will be called in course_template.php to give each page time to
  // reconfigure things if wanted
  function translate_includes() {
    global $sections, $course_incl_dir;
    foreach ($sections as &$sect) {
      foreach ($sect as &$chunk) {
        $fname = str_replace(' ', '_', strtolower($chunk)) . '.php';
        $dir = $course_incl_dir;
        if (file_exists(getcwd() . '/' . $fname)) {
          $dir = getcwd() . '/';
        }
        $chunk = $dir . $fname;
      }
    }
  }

?>
