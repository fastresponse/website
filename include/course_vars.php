<?php

  require_once($_SERVER['DOCUMENT_ROOT'] . '/php/mobile-detect/Mobile_Detect.php');
  $detect = new Mobile_Detect;
  $mobile = $detect->isMobile();
  $device = (
    $detect->isTablet() ? 'tablet' : (
      $detect->isMobile() ? 'phone' : 'desktop'
    )
  );

  if (!isset($category)) $category = 'postsec';
  // categories: 'postsec', 'ceu'

  require_once($_SERVER['DOCUMENT_ROOT'] . '/php/dbconn.php');
  if (!isset($handle)) $handle = db_connect();

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

  $course_dates_type = 'separate';
  $course_dates_limit = 0;

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


  switch ($category) {

  case 'ceu':

    $sections['mobile headers'] = array(
      'Page Logo',
      'Page Title',
      'Slideshow',
    );

    $sections['mobile'] = array(
      'Contact Info',
      'Course Description',
      'Prerequisites',
      'Class Start Dates',
      'Class Schedules',
      'Tuition and Fees',
      'Contact Info',
    );

    $sections['head'] = array(
    );

    $sections['topleft'] = array(
      'Page Logo',
    );
    $sections['topright'] = array(
    );
    $sections['topcenter'] = array(
      'Page Title',
    );

    $sections['left'] = array(
      'Slideshow',
      'Announcements',
      'Contact Info',
      'CEU Promotions',
    );

    $sections['right'] = array(
      'Course Approvals',
      'Registration',
      'Books',
      'CEU Announcements',
      'Staff',
    );

    $sections['center'] = array(
      //'Send to a Friend',
      'Course Description',
      'Class Start Dates',
      'Class Schedules',
      //'FAQs List',
      'Prerequisites',
      'Tuition And Fees',
    );
  break;


  default:
  case 'postsec':

    $sections['mobile headers'] = array(
      'Page Logo',
      'Page Title',
      'Slideshow',
    );

    $sections['mobile'] = array(
      'Contact Form',
      'Course Description',
      'Prerequisites',
      'Admissions Procedures',
      'Class Start Dates',
      'Class Schedules',
      'Tuition and Fees',
      'Contact Form',
    );

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
      'Announcements',
      'Contact Form',
      'Gallery Link',
      'Certifications',
      'Externship',
      'Testimonials',
    );

    $sections['right'] = array(
      'Course Approvals',
      //'Events',
      //'Calendar',
      'Links',
      'Immunizations',
      'Staff',
      //'FAQs Menu',
      //'Misc',
    );

    $sections['center'] = array(
      //'Send to a Friend',
      'Course Description',
      'Class Start Dates',
      'Class Schedules',
      //'FAQs List',
      'Prerequisites',
      'Admissions Procedures',
      'Tuition And Fees',
      //'Financing',
    );
  break;

  }



  // turns 'Contact Form' into 'contact_form.php'
  // if this file exists in the current dir (course-specific) then use that
  // otherwise use the one in $course_incl_dir
  //
  // this func will be called in course_template.php to give each page time to
  // reconfigure things if wanted
  function translate_includes() {
    global $sections, $category, $course_incl_dir;
    foreach ($sections as &$sect) {
      foreach ($sect as &$chunk) {
        $fname = str_replace(' ', '_', strtolower($chunk)) . '.php';
        $dir = $course_incl_dir;
        if (file_exists(getcwd() . DIRECTORY_SEPARATOR . $fname)) {
          $dir = getcwd() . DIRECTORY_SEPARATOR;
        }
        $chunk = $dir . $fname;
      }
    }
  }

  function query_links_from_db() {
    global $handle, $global_links, $links;

    // pre-lookup links
    // from:
    // 0 => 'text 1', 1 => 'text 2'
    // to:
    // 'text 1' => array('link' => 'http://etc.com', 'target' => '_blank')

    $query_links = function($dbh, $textarr) {
      $textstr = "'" . implode("','", $textarr) . "'";
      return basic_query($dbh,
        array('text', 'link', 'target'),
        'buttons',
        array('text in (' . $textstr . ')'),
        'FIELD(text, ' . $textstr . ')',
        0, array()
      );
    };

    $new_global = array();
    foreach ($query_links($handle, $global_links) as $link_data) {
      $new_global[$link_data['text']] = array(
        'link' => $link_data['link'],
        'target' => $link_data['target']
      );
    }
    $global_links = $new_global;

    $new_links = array();
    foreach ($query_links($handle, $links) as $link_data) {
      $new_links[$link_data['text']] = array(
        'link' => $link_data['link'],
        'target' => $link_data['target']
      );
    }
    $links = $new_links;
  }



?>
