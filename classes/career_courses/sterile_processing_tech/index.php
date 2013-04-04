<?php
  require_once($_SERVER['DOCUMENT_ROOT'] . '/php/dbconn.php');
  $handle = db_connect('start_dates');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">

<head>
  <title>Sterile Processing Technician | Fast Response</title>

  <base href="/" />

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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


  <script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-18170901-1']);
    _gaq.push(['_trackPageview']);

    (function() {
     var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
     ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
     var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
     })();

  </script>

  <!--<script type="text/javascript" src="/js/jquery.js"></script>-->

</head>

<body>

  <div id="page">

    <div id="menu">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/menu/menu.php'); ?>
    </div>

    <div id="head">
      <img src="/images/headers/header_main_left.png" class="headerimgleft" alt="Fast Response School of Health Care Education" />
      <img src="/images/headers/header_spt_right.jpg" class="headerimgright" alt="" />
      <div class="clearfix"></div>
    </div>

    <div id="main">

      <div class="section">

	<div class="rightsidebar2">
	  <div class="quicklinks2">
	    <a href="/pdfs/SPT - Course Info Packet.pdf" target="_blank" class="btn3 lines-2">
	      <div>Course Info<br />Packet</div>
              <div></div><div></div><div></div><div></div>
	    </a>
	    <a href="/pdfs/SPT - Performance Fact Sheet.pdf" target="_blank" class="btn3 lines-2">
	      <div>Performance<br />Fact Sheet</div>
              <div></div><div></div><div></div><div></div>
	    </a>
	    <a href="/resources/spt/" class="btn3 lines-2">
	      <div>Student<br />Resources</div>
              <div></div><div></div><div></div><div></div>
	    </a>
	    <a href="/photos/spt/index.html#spt" class="btn3 lines-1">
	      <div>Photo Gallery</div>
              <div></div><div></div><div></div><div></div>
	    </a>
	    <a href="/school/info" class="btn2 lines-1">
	      <img src="/images/buttons/envelope-icon.png" alt="" />
	      <div>Contact Us</div>
              <div></div><div></div><div></div><div></div>
	    </a>
	    <a href="http://www.facebook.com/FastResponseSchool" class="btn2 lines-2">
	      <img src="/images/buttons/facebook-icon.png" alt="" />
	      <div>Visit Us On<br />Facebook</div>
              <div></div><div></div><div></div><div></div>
	    </a>
	  </div>
	</div>

	<div class="leftcontent2">

          <div class="column smallauto">
	    <div class="announcement red">
	      <h3 class="yellow">Course Start Dates</h3>
	      <div class="yellow underline">Full-time</div>
	      <?php
		$next = query_next_date($handle, 'SPT', 'Full-time');
		echo "<div>{$next['showdate']}</div>";
	      ?>
	    </div>
	  </div>

	  <h1>Sterile Processing Technician</h1>

	  <div>
	    <p>Sterile Processing Technicians provide a critical service in the healthcare environment. These technicians focus on infection control and aseptic techniques to disinfect the wide variety of surgical instruments and tools required for surgical procedures.</p>
	    <img style="margin-right: 2em;" width="350" height="230" align="left" alt="SPT" src="/images/spt2.jpg" />
	    <p>This course will introduce the student to the roles and responsibilities of Sterile Processing Technicians. The student will obtain basic knowledge and broad perspective of Sterile Processing as well as the flow of the operating room.</p>
	    <p>Sterile Processing Technician is a 400 hour program with 200 hours of classroom didactics and skills lab practice and 200 hours of externship.</p>
	    <p>Classes are held four days a week--Monday, Wednesday, and Thursday (6pm-10pm) and an 8 hour class on Saturdays. The course lasts 10 weeks.</p>
	  </div>

	  <div class="section" style="clear: left;">
	    <div style="width: 45%; display: inline-block;">
	      <h3>Included in the program:</h3>
	      <ul class="bullets">
		<li>Certification readiness for the IASCHMM</li>
		<li>Sort, disassemble, clean and disinfect trays, instruments, carts, supplies and equipment</li>
		<li>Ensure use of effective and safe sterilization procedures</li>
		<li>Provide instrument sets for surgical procedures and case carts for booked and emergency surgery</li>
		<li>Document and maintain records of instruments and trays that have been processed for surgery</li>
	      </ul>
	    </div>
	    <div style="width: 9%; display: inline-block;"></div>
	    <div style="width: 37%; display: inline-block; vertical-align: top; margin-top: 2em;" class="listbox">
	      <ul class="checkmark">
		<li>Flexible payment options available</li>
		<li>Career assistance upon graduation</li>
		<li>Start a new career path!</li>
		<li>Affiliated with California Dept. of Rehabilitation and Workforce Investment Act eligible provider</li>
	      </ul>
	    </div>
	  </div>

	</div> <!-- /leftcontent -->
        <div class="clearfix"></div>

      </div> <!-- /section -->

      <div class="photos">
	<a target="_self" href="/photos/spt/index.html#spt">
	  <img alt="" width="880" height="250" src="/sites/default/files/fckuploads/image/EMT-3_images.jpg" />
	</a>
	<p><a target="_self" href="/photos/spt/index.html#spt">
	  Actual Photo From Class - Click Here to View Gallery
	</a></p>
      </div>

      <div style="margin: 1.5em auto 0 auto;">
	<h3 style="text-align: center;">*Call us, drop by our office, or click <a style="color:#C30;" href="/school/info/">HERE</a> to begin your new career!*</h3>

	<div class="bgimg fontsans" style="width: 20.25em; height: 2.25em; font-size: 220%;">
	  <div style="width: 20.25em; height: 2.25em; line-height: 2.25em;">
	    Call <a href="tel://1-800-637-7387">(800) 637-7387</a> or
	    <a href="tel://1-510-849-4009">(510) 849-4009</a>
	  </div>
	  <img src="/images/cloudbg.png" alt="phone number" />
	</div>

      </div>

    </div> <!-- /main -->

    <div id="footer">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/menu/footer.php'); ?>
    </div> <!-- /footer -->

  </div> <!-- /page -->

</body>
</html>
