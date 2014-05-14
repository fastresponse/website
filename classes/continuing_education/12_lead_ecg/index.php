<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">

<head>
  <title>12-Lead ECG | Fast Response</title>

  <base href="/" />

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="Expires" content="Fri, 1 Mar 2013 12:00:00 GMT">
  <meta name="robots" content="INDEX, FOLLOW">
  <meta name="googlebot" content="INDEX, FOLLOW">

  <link type="image/x-icon" rel="shortcut icon" href="/misc/favicon.ico" />

  <link type="text/css" rel="stylesheet" media="all" href="/css/template.css" />
  <link type="text/css" rel="stylesheet" media="all" href="/css/nicemenus.css" />
  <link type="text/css" rel="stylesheet" media="all" href="/css/buttons.css" />
  <link type="text/css" rel="stylesheet" media="print" href="/sites/all/themes/fastresponse/css/print.css" /> 
  <!--[if lte IE 6]><style type="text/css" media="all">@import "/sites/all/themes/fastresponse/css/ie6.css";</style><![endif]-->
  <!--[if IE 7]><style type="text/css" media="all">@import "/sites/all/themes/fastresponse/css/ie7.css";</style><![endif]-->
  <!--[if lte IE 8]><style type="text/css" media="all">@import "/css/buttons-ie.css";</style><![endif]-->

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/php/analytics_google.php'); ?>

  <script type="text/javascript" src="/js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="/js/jquery.toggledisplay.js"></script>

</head>

<body>

  <div id="page">

    <div id="menu">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/menu/menu.php'); ?>
    </div>

    <div id="head">
      <img src="/images/headers/header_main_left.png" class="headerimgleft" alt="Fast Response School of Health Care Education" />
      <img src="/images/headers/header_12lead_ecg_right.jpg" class="headerimgright" alt="" />
      <div class="clearfix"></div>
    </div>

    <div id="main">

      <div class="section">

	<div class="rightsidebar2">
	  <div class="quicklinks2">
      <div class="basic-button innerglow-lightblue glow-lightblue">
	      <a href="http://www.ssreg.com/fastresponse/calendar.asp?page=Calendar"><div>View Calendar</div></a>
	    </div>
      <div class="basic-button innerglow-lightblue glow-lightblue">
        <a style="cursor: pointer;" onClick="jQuery('#ceu-announce,#ceu-promos,#promobtn1,#promobtn2').toggleDisplay('inline-block'); return 1;"><div id="promobtn1">Current Promotions</div><div id="promobtn2" style="display: none;">CEU Notices</div></a>
      </div>
      <div class="basic-button innerglow-lightblue glow-lightblue">
	      <a href="http://www.ssreg.com/fastresponse/classes/default.asp?page=Catalog"><div>Register For This Course</div></a>
	    </div>
      <div class="basic-button image-button glow-lightblue">
        <a href="/school/info/"><div>Contact Us</div><img src="/images/buttons/envelope-icon.png" alt="" /></a>
      </div>
      <div class="basic-button image-button glow-lightblue">
        <a href="http://www.facebook.com/FastResponseSchool"><div>Visit Us On Facebook</div><img src="/images/buttons/facebook-icon.png" alt="" /></a>
      </div>
	  </div>
	</div>

	<div class="leftcontent2">

<?php
$course_abbr = 'ECG-12';
include('../ceu_include.php');
?>

	  <h1>ECG Recognition</h1>

	  <img width="193" height="231" alt="" src="/images/12lead.png" style="float: left; margin-right: 1em; margin-bottom: 2em;" />

	  <p style="width: 80%; text-align: justify;">Our advanced ECG course will teach you how to quickly and easily recognize significant cardiac events such as S-T segment Elevation Myocardial Infarction (STEMI). Also covered in this course: identification of artifacts, proper 12-lead electrode placement, and acquisition techniques. The ECG Basic Arrhythmia course or equivalent is a prerequisite to this course.</p>

	  <ul class="bullets" style="width: 80%; position: relative; left: 2em; margin-top: 2em;">
	    <li>One day - 6 hours long.</li>
	    <li>Provides 6 CEUs.</li>
	    <li>Refresher or Intro course.</li>
	    <li>Fast Response Course Guide provided on first day of class.</li>
	  </ul>

	</div> <!-- /leftcontent -->

      </div> <!-- /section -->

      <div class="section" style="clear: left;">
	<div class="bgimg fontsans" style="width: 20.25em; height: 2.25em; font-size: 220%;">
	  <div style="width: 20.25em; height: 2.25em; line-height: 2.25em;">
	    Call <a href="tel://1-800-637-7387">(800) 637-7387</a> or
	    <a href="tel://1-510-849-4009">(510) 849-4009</a>
	  </div>
	  <img src="/images/cloudbg.png" alt="phone number" />
	</div>
      </div>

      <div class="clearfix"></div>

    </div> <!-- /main -->

    <div id="footer">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/menu/footer.php'); ?>
    </div> <!-- /footer -->

  </div> <!-- /page -->

</body>
</html>
