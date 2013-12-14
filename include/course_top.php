<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">

<head>
<title><?= $page_title ?> | Fast Response</title>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="robots" content="INDEX, FOLLOW">
  <meta name="googlebot" content="INDEX, FOLLOW">

  <link type="image/x-icon" rel="shortcut icon" href="/misc/favicon.ico" />

  <link type="text/css" rel="stylesheet" media="all" href="/css/template.css" />
  <link type="text/css" rel="stylesheet" media="all" href="/css/nicemenus.css" />
  <link type="text/css" rel="stylesheet" media="all" href="/css/buttons.css" />
  <link type="text/css" rel="stylesheet" media="all" href="/include/css/course_pages.css" />
  <link type="text/css" rel="stylesheet" media="all" href="/include/css/course_contact.css" />
  <link type="text/css" rel="stylesheet" media="print" href="/sites/all/themes/fastresponse/css/print.css" /> 
  <!--[if lte IE 6]><style type="text/css" media="all">@import "/sites/all/themes/fastresponse/css/ie6.css";</style><![endif]-->
  <!--[if IE 7]><style type="text/css" media="all">@import "/sites/all/themes/fastresponse/css/ie7.css";</style><![endif]-->
  <!--[if lte IE 8]><style type="text/css" media="all">@import "/css/buttons-ie.css";</style><![endif]-->

  <?php include_once('analytics_google.php'); ?>

  <?= $head_code ?>

</head>

<body>

  <div id="page">

    <div id="menu">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/menu/menu.php'); ?>
    </div>

    <div id="head">
      <div class="left sidebar" id="logo-container">
	      <img src="/images/headers/header_main_left.png" alt="Fast Response School Of Health Care Education" />
      </div>
      <div class="right content" id="title-container">
	      <h1 class="course-title"><?= $course_title ?></h1>
      </div>
      <div class="clearfix"></div>
    </div> <!-- /head -->

    <div id="main">

      <div class="left sidebar" style="position: relative;">

        <img src="/images/headers/<?= strtolower($course_abbr) ?>_header.jpg" class="course-header-image glow-lightblue" alt="" />

        <div id="contact-form-div">
          <?php include_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_contact.php'); ?>
	      </div>

        <?php if ($sections['Testimonials']): ?>
	      <div class="student-testimonials">
          <?php include_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_testimonials.php'); ?>
	      </div>
        <?php endif; ?>

        <?php if ($sections['Extra']): ?>
        <div class="course-extra">
          <?php include_once(getcwd() . '/extra_sections.php'); ?>
        </div>
        <?php endif; ?>

      </div> <!-- /left sidebar -->

	    <div class="right sidebar">
	      <div class="quicklinks2">
          <?php if ($buttons['Course Info Packet']): ?>
          <div class="basic-button innerglow-lightblue glow-lightblue">
            <a href="/pdfs/<?= $course_abbr ?> - Course Info Packet.pdf" target="_blank"><div>Course Info Packet</div></a>
          </div>
          <?php endif; ?>
          <?php if ($buttons['Student Resources']): ?>
          <div class="basic-button glow-lightblue innerglow-lightblue">
            <a href="/resources/<?= strtolower($course_abbr) ?>/"><div>Student Resources</div></a>
          </div>
          <?php endif; ?>
          <?php if ($buttons['Skills Videos']): ?>
          <div class="basic-button glow-lightblue innerglow-lightblue">
            <a href="/resources/<?= strtolower($course_abbr) ?>/?section=videos"><div>Skills Videos</div></a>
          </div>
          <?php endif; ?>
          <?php if ($buttons['Photo Gallery']): ?>
          <div class="basic-button glow-lightblue innerglow-lightblue">
            <a href="/gallery/index.php/<?= $course_abbr ?>"><div>Photo Gallery</div></a>
          </div>
          <?php endif; ?>
          <?php if ($buttons['Contact Us']): ?>
          <div class="basic-button image-button glow-lightblue">
            <a href="/school/info/"><div>Contact Us</div><img src="/images/buttons/envelope-icon.png" alt="" /></a>
          </div>
          <?php endif; ?>
          <?php if ($buttons['Facebook']): ?>
          <div class="basic-button image-button glow-lightblue">
            <a href="http://www.facebook.com/FastResponseSchool"><div>Visit Us On Facebook</div><img src="/images/buttons/facebook-icon.png" alt="" /></a>
          </div>
          <?php endif; ?>
	      </div> <!-- /quicklinks -->
	    </div> <!-- /right sidebar -->


