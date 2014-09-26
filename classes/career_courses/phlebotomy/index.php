<?php
  require_once($_SERVER['DOCUMENT_ROOT'] . '/php/dbconn.php');
  $handle = db_connect('start_dates');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">

<head>
  <title>Phlebotomy | Fast Response</title>

  <base href="/" />

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

  <style type="text/css">
    .offerbanner {
      float: right;
      margin: 1em 2% 0.5%;
      border: double 4px yellow;
      border-radius: 1em;
      -moz-border-radius: 1em;
      -webkit-border-radius: 1em;
      padding: 0.5% 1%;
      max-width: 30%;
    }
    .offerbanner h3 {
      color: red;
      margin: 0;
      letter-spacing: 0.15em;
      word-spacing: 0.15em;
      font-style: italic;
    }
    .announcement {
      font-size: 80%;
    }
    .announcement div {
      font-size: 115%;
    }
  </style>

</head>

<body style="font-family: Arial, sans-serif;">

  <div id="page">

    <div id="menu">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/menu/menu.php'); ?>
    </div>

    <div id="head">
      <img src="/images/headers/header_main_left.png" class="headerimgleft" alt="Fast Response School of Health Care Education" />
      <img src="/images/headers/header_phlebotomy_right.jpg" class="headerimgright" alt="" />
      <div class="clearfix"></div>
    </div>

    <div id="main">

      <div class="section">

	<div class="rightsidebar2">
	  <div class="quicklinks2">
      <div class="basic-button innerglow-lightblue glow-lightblue">
	      <a href="/pdfs/CPT - Course Info Packet.pdf" target="_blank"><div>Course Info Packet</div></a>
	    </div>
      <div class="basic-button innerglow-lightblue glow-lightblue">
	      <a href="/resources/cpt/" class="btn3 lines-2"><div>Student Resources</div></a>
	    </div>
      <div class="basic-button innerglow-lightblue glow-lightblue">
	      <a href="/gallery/index.php/Phlebotomy" class="btn3 lines-2"><div>Photo Gallery</div></a>
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

	  <div class="column smallauto">
	    <div class="announcement red">
        <?php
          require_once(
            $_SERVER['DOCUMENT_ROOT'] . '/include/course/class_start_dates.php'
          );
          $course_dates = get_course_dates_list(
            $handle, 'CPT', array('Full-time', 'Part-time')
          );
        ?>
	      <h3 class="yellow">Course Start Dates</h3>
	      <div class="yellow underline">Full Time</div>
        <?= $course_dates['Full-time'] ?>
	      <?php
		    //$next = query_next_date($handle, 'CPT', 'Full-time');
		    //echo "<div>{$next['showdate']}</div>";
	      ?>
	      <div class="yellow underline">Part Time</div>
        <?= $course_dates['Part-time'] ?>
	      <?php
		    //$next = query_next_date($handle, 'CPT', 'Part-time');
		    //echo "<div>{$next['showdate']}</div>";
	      ?>
	    </div>
	  </div>

    <?php if (false): ?>
	  <div class="announcement banner yellow" style="max-width: 35%; float: right;">
	    <h3 style="font-style: italic;">Free ECG and CPR classes included!</h3>
	  </div>
    <?php endif; ?>

	  <div style="margin-bottom: 2em;">
	    <h1 style="display: inline-block; vertical-align: top;">Phlebotomy</h1>

	    <!--
	    <div style="display: inline-block; border: 2px solid #2211CC; border-radius: 1em; padding: 1em; font-weight: bold; float: right;">
	      <span style="font-size: 1em; color: red">
		<a href="http://www.healthexamsinc.com" style="color: red;">Health Exams Inc</a> is hiring CA Certified Phlebotomy Technicians!<br>
		Candidates must have an active CA Phlebotomy Certificate.
	      </span>
	      <br>
	      <span style="font-size: 0.8em; color: rgb(255,255,153); letter-spacing: 0.2em;">
		Please send resumes to: <a href="mailto:humanresources@heiexam.com" style="color: rgb(255, 255, 153);">humanresources@heiexam.com</a>
	      </span>
	    </div>
	    -->
	  </div>

	  <div style="min-height: 387px;">
	    <img src="/images/PHLEB1.jpg" alt="Phlebotomist" style="float: left; width: 20%; margin: 1% 2% 1% 0;" />

	    <p style="width: 90%;">An important member of the clinical laboratory team, the phlebotomist works directly with patients to collect and process blood specimens for laboratory testing. Topics covered in the course include anatomy and physiology, laboratory safety, infection control precautions, bloodborne pathogens, specimen collection, and proper needle disposal.</p>
	    <p style="width: 90%;">We offer two phlebotomy courses at Fast Response: our Phlebotomy Technician course and an Advanced Phlebotomy Certification course.</p>

	    <div style="display: inline-block; width: 78%;">
	      <div style="display: inline-block; vertical-align: top; max-width: 47%;">
		<h2>Phlebotomy Technician (CPT-1)</h2>
		<p>Designed for anyone wanting to obtain a CPT-1 certification in phlebotomy. Ideal for those just starting out, changing careers, or seeking to increase their employability.</p>
		<ul class="bullets">
		  <li>Dynamic, relevant classroom training</li>
		  <li>Small classes with a maximum 8:1 ratio for skills instruction!</li>
		  <li>100 hour program including 40 hours of Clinical Externship</li>
		  <li>Ongoing refresher courses</li>
		</ul>
	      </div>
	      <div style="display: inline-block; vertical-align: top; max-width: 47%; margin-left: 5%;">
		<h2>Advanced CPT-1 Certification</h2>
		<p>A 20-hour accelerated course meant for those already practicing phlebotomy who need to obtain their CPT-1 under the new CA State standards.</p>
		<ul class="bullets">
		  <li>1040 hours of phlebotomy experience in California within the past 5 years, documented by an M.D.</li>
		  <li>Experience must include at least 50 venipunctures and 10 skin punctures.</li>
		  <li>High School Diploma, GED, or college coursework.</li>
		</ul>
	      </div>
	    </div>
	  </div>

	  <div style="margin: 2em 0;">
	    <div style="width: 60%; display: inline-block; vertical-align: top; font-weight: bold; clear: left; margin-right: 4%;">
	      <h3>Student Testimonials:</h3>

	      <p>
	      <q>This class is great! I would definitely recommend this course to anyone interested in the health field.</q>
	      <br />
	      <cite>-K. Gloria</cite>
	      </p>

	      <p>
	      <q>I really like the way the lectures had good explanations and humor as well!</q>
	      <br />
	      <cite>-V. Sanchez</cite>
	      </p>

	      <p>
	      <q>The instructors were very complete with both lectures and homework. I am very impressed with this program, nothing needs improvement!</q>
	      <br />
	      <cite>-S. David</cite>
	      </p>

	      <p>
	      <q>The lectures were presented very well. I understood everything, and the material was very clear to me.</q>
	      <br />
	      <cite>-I. Fernandez</cite>
	      </p>

	    </div>

	    <div style="width: 30%; display: inline-block; vertical-align: top; margin-top: 1em;" class="listbox">
	      <ul class="checkmark">
		<li>Flexible payment options available</li>
		<li>Career services</li>
		<li>Day and evening classes</li>
		<li>Clinical externships guaranteed</li>
		<li>Expand your earning potential</li>
		<li>Affiliated with California Dept. of Rehabilitation and Workforce Investment Act eligible provider</li>
	      </ul>
	    </div>

	  </div>

	</div> <!-- /leftcontent -->
	<div class="clearfix"></div>

      </div> <!-- /section -->

      <div class="photos" style="clear: none;">
	<a target="_self" href="/photos/phleb/index.html#phleb">
	  <!-- margin-left needed because of rightsidebar being tall -->
	  <img alt="" width="520" height="270" src="/images/phlebotomy_gallery.png" style="margin-left: 12%;"/>
	</a>
	<p><a target="_self" href="/photos/phleb/index.html#phleb">
	  Photos From Class - Click Here to View Gallery
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
