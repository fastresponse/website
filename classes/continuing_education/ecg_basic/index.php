<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">

<head>
  <title>ECG Basic | Fast Response</title>

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
      <img src="/images/headers/header_ecg_basic_right.jpg" class="headerimgright" alt="" />
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
	      <a href="http://www.ssreg.com/fastresponse/classes/classes.asp?catID=4116"><div>Register For This Course</div></a>
	    </div>
      <div class="basic-button innerglow-lightblue glow-red">
	      <a href="/pdfs/ECG Basic - Study Guide.pdf"><div>Download Study Guide</div></a>
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
    $course_abbr = 'ECG-B';
    include('../ceu_include.php');
    ?>

	  <h1>ECG Recognition</h1>

	  <img width="202" height="242" alt="" src="/images/ecg.png" style="float: left; margin-right: 1em; margin-bottom: 2em;" />

	  <h2>ECG BASIC ARRHYTHMIA</h2>

	  <h4>3-Lead ECG:</h4>

	  <p>Our 2-day course of basic 3-lead ECG interpretation is taught by instructors who work in some of the same clinical settings where you will be working. This class can serve as a refresher course or as an introduction to arrhythmia recognition for medical professionals. We highly recommend taking this course in preparation for ACLS certification.</p>

	  <p>Starting with a review of anatomy and physiology of the heart, the course quickly moves into a review of ECG waveforms and sinus cardiac rhythms. With this basic knowledge in place, an in-depth study of dysrhythmias and their origins are covered. Each member of the class practices measuring, analyzing, and identifying rhythms using static ECG strips.</p>

	  <div style="clear: left;">
	    <ul class="bullets">
	      <li>Provides 14 CEUs.</li>
	      <li>Refresher or intro course.</li>
	      <li>No prerequisite necessary.</li>
	      <li>Great course for laypeople.</li>
	    </ul>
	  </div>

	</div> <!-- /leftcontent -->

      </div> <!-- /section -->

      <div class="section" style="margin-top: 5em;">
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
