<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">

<head>
  <title>PALS | Fast Response</title>

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
      <img src="/images/headers/header_pals_right.jpg" class="headerimgright" alt="" />
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
	      <a href="http://www.ssreg.com/fastresponse/classes/classes.asp?catID=4109&pcatID=4108"><div>Register For &quot;Provider&quot;</div></a>
	    </div>
      <div class="basic-button innerglow-lightblue glow-lightblue">
	      <a href="http://www.ssreg.com/fastresponse/classes/classes.asp?catID=4110&pcatID=4108"><div>Register For &quot;Renewal&quot;</div></a>
	    </div>
      <div class="basic-button innerglow-lightblue glow-red">
	      <a href="/pdfs/PALS - Study Guide.pdf"><div>Download Study Guide</div></a>
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
$course_abbr = 'PALS';

$announcement_sections[] = <<<SECT1
<h3 style="margin-top: 0; text-align: center;"><strong class="underline">2010 AHA PALS Student Manual</strong></h3>
<div class="yellow">Order online <a href="http://www.emergencystuff.com/product-p/901052.htm" class="yellow">here</a> or purchase at Fast Response for <span style="display: inline-block; border: 1px dashed red; padding: 0 2px;">$60</span>.</div>
<div style="margin-top: 1em; font-size: 90%;">* Required for class.<br />* Not included in course fees.</div>
SECT1;
    include('../ceu_include.php');
    ?>

	  <h1>Pediatric Advanced Life Support (PALS)</h1>

	  <img width="174" height="148" alt="" src="/images/pals2.png" style="float: left; margin-right: 1em; margin-bottom: 2em;" />

	  <p>The Pediatric Advanced Life Support (PALS) course has been designed by the American Heart Association (AHA) to provide healthcare providers with the information and strategies needed to recognize and prevent cardiopulmonary arrest in infants and children, as well as identify and treat patients in a prearrest condition, such as respiratory failure or hypotensive shock. This course includes airway management, CPR review, and core case practice and testing. Our instructors are friendly, professional and experienced. This class offers hands-on practice using a supportive team approach.</p>

	  <div style="clear: left;">

	    <div style="width: 48%; display: inline-block; vertical-align: top;">
	      <h2 class="yellow">PALS &quot;Provider&quot;</h2>
	      <ul class="bullets">
		<li><span style="text-decoration: underline;">Two days</span>, 9:00am-5:00pm.</li>
		<li>For new medical professionals or those with expired PALS cards.</li>
		<li>Provides 14 CEUs.</li>
		<li>AHA certification is valid for two years.</li>
	      </ul>
	    </div>

	    <div style="width: 48%; display: inline-block;">
	      <h2 class="yellow">PALS &quot;Renewal&quot;</h2>
	      <ul class="bullets">
		<li><span class="green" style="font-weight: bold; font-style: italic;">Need to possess a current AHA PALS card and bring it to class.</span></li>
		<li><span style="text-decoration: underline;">One day</span>, 9:00am-5:00pm.</li>
		<li>AHA Certification is valid for two years.</li>
		<li>7 CEUs are issued to the student upon the completion of this class.</li>
	      </ul>
	    </div>

	  </div>

	</div> <!-- /leftcontent -->

      </div> <!-- /section -->

      <div class="section">
	<div class="bgimg fontsans" style="width: 20.25em; height: 2.25em; font-size: 220%;">
	  <div style="width: 20.25em; height: 2.25em; line-height: 2.25em;">
	    Call <a href="tel://1-800-637-7387">(800) 637-7387</a> or
	    <a href="tel://1-510-849-4009">(510) 849-4009</a>
	  </div>
	  <img src="/images/cloudbg.png" alt="phone number" />
	</div>
      </div>

      <div class="clearfix" style="min-height: 0.1em;"></div>

    </div> <!-- /main -->

    <div id="footer">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/menu/footer.php'); ?>
    </div> <!-- /footer -->

  </div> <!-- /page -->

</body>
</html>
