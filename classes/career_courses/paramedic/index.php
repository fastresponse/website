<?php
  require_once($_SERVER['DOCUMENT_ROOT'] . '/php/dbconn.php');
  $handle = db_connect();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">

<head>
  <title>Paramedic Academy | Fast Response</title>

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


  <?php include_once($_SERVER['DOCUMENT_ROOT'] . '/php/analytics_google.php'); ?>

  <script type="text/javascript" src="/js/frlib.js"></script>

</head>

<body style="font-family: Arial, sans-serif;">

  <div id="page">

    <div id="menu">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/menu/menu.php'); ?>
    </div>

    <div id="head">
      <img src="/images/headers/header_main_left.png" class="headerimgleft" alt="Fast Response School of Health Care Education" />
      <img src="/images/headers/header_paramedic_right.jpg" class="headerimgright" alt="" />
      <div class="clearfix"></div>
    </div>

    <div id="main">

      <div class="section">

	<div class="rightsidebar2">
	  <div class="quicklinks2">
      <div class="basic-button innerglow-lightblue glow-lightblue">
	      <a href="/gallery/index.php/Paramedic"><div>Photo Gallery</div></a>
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
	  <div class="section">

	    <div style="width: auto; min-width: 15%; max-width: 25%; float: right; margin: 0 1% 1% 1%;">
	      <div class="announcement red">
		      <h3 class="yellow">Important Dates</h3>
		      <div class="yellow underline">Application Deadline</div>
		      <?php $next = query_next_date($handle, 'Paramedic', 'Application Deadline'); ?>
	        <div><?= $next['showdate'] ?></div>
		      <div class="yellow underline">Paramedic A&amp;P Class </div>
		      <?php $next = query_next_date($handle, 'Paramedic', 'Anatomy and Physiology'); ?>
	        <div><?= $next['showdate'] ?></div>
		      <div class="yellow underline">Academy Start</div>
		      <?php $next = query_next_date($handle, 'Paramedic', 'Academy Start'); ?>
          <div><?= $next['showdate'] ?></div>
	      </div>
	    </div>

	    <div style="display: inline-block; float: right; margin-right: 2%; margin-left: 1%; border: double 4px #333366; border-radius: 1em; background-color: #070712; padding: 0.5% 1%;">
	      <h3 class="yellow" style="margin: 0; letter-spacing: 0.15em; word-spacing: 0.15em; font-style: italic;">Guaranteed Internships!</h3>
	    </div>

	    <h1>Paramedic Academy</h1>

            <p>
	      It is the mission of the Fast Response Paramedic Academy to produce extraordinary critical thinking paramedics who provide compassionate and proficient patient care. We do this by creating a supportive learning environment that includes the student in the learning process. We provide several opportunities for outside activities that enrich the didactic experience. The opportunities include ride alongs with local 911 EMS providers.
	    </p>

            <p>
	      We provide our students with an iPad loaded with EMS software to include iPCR, Title 22, local and regional EMS Regulations, as well as online learning tools. These tools will enhance the overall learning experience, while utilizing up to date technology students can expect to use in the field. This equipment will be incorporated into all aspects of clinical and field training. We have an excellent skills lab that includes a scenario based Simulation Lab, a High Fidelity ALS manikin, and an ambulance simulator. 
	    </p>

            <p>
	    Fast Response has developed strong relationships with Paramedics Plus, Kaiser Permanente Regional Medical Centers, and Eden Medical Center. Through contractual agreements with these facilities, Fast Response is able to guarantee immediate access to both clinical and field internships.
	    </p>


	  
	    <p style="font-weight: bold; color: rgb(204, 51,0);">Qualified candidates should <span style="color: orange; cursor: pointer; text-decoration: underline;" onClick="toggleClass('admissionsproc', 'hidden');">review the admissions procedures</span> and <a href="/school/info/" style="color: orange;">contact us</a> to receive an Application For Consideration.</p>
	    
	  </div>

	  <div id="admissionsproc" name="admissionsproc" class="section hidden collapsebox" style="clear: left; border: solid white; border-width: 1px 0;">

	    <h3>Fast Response Paramedic Academy admissions procedures:</h3>
	    <ul>
	      <li style="margin-top: 1em;">For interview candidacy:</li>
	      <ul>
		      <li>Complete an Application for Consideration.</li>
		      <li>Successful completion of an entrance examination (Wonderlic) with a score of 20 or greater.</li>
		      <li>Proof of age (must be 18 at <strong>Program Expected Graduation date</strong>).</li>
		      <li>Proof of legal ability to work in the United States.</li>
		      <li>Proof of minimum education requirements:</li>
		      <ul>
		        <li>High school diploma, official high school transcripts showing successful completion, GED, or official college transcripts.</li>
		        <li>Copy of current Emergency Medical Technician Certification and Health Care Provider CPR card, both individually renewed within 12 months of the
		        <span style="font-weight: bold; white-space: nowrap;">Program Expected Start Date</span>.</li>
		      </ul>
	            
		      <li>Proof of at least 1040 hours (six months full-time equivalent) EMT experience. (Pay stubs, W-2 forms, letter from supervisor, etc.).</li>
		      <li>Copy of current resume.</li>
		      <li>Copy of required essay. </li>
		      <li>Completion of an Anatomy and Physiology class or Paramedic A&amp;P.</li>
	      </ul>

	      <li style="margin-top: 1em;">If accepted after interview:</li>
	      <ul>
		      <li>Completion of an enrollment agreement.</li>
		      <li>Financial plan for funding education.</li>
		      <li>Payment either in full or of the first required installment of a payment plan.</li>
	      </ul>
	    </ul>

	    <button style="margin: 1em 0 2em 6em; font-size: 90%;" onClick="toggleClass('admissionsproc', 'hidden');">Close Procedures</button>

	  </div>

	  <div class="section" style="clear: left; margin-top: 0;">

	    <div class="column col3">
	      <div class="section listbox">
		      <ul class="checkmark">
		        <h3 style="margin-top: 0;">Included in the program:</h3>
		        <li>728 hours of didactic lecture</li>
		        <li>688 hours <span class="">guaranteed</span> internship</li>
		        <li>48 hours of didactic observation</li>
		        <li>Completion of PALS, ACLS, ITLS, GEMS, and EMPACT certifications</li>
		      </ul>
	      </div>
	    </div>

	    <div class="column col3">
	      <div class="section">
		      <ul class="bullets">
		        <h3>Internships With:</h3>
<?php foreach (query_external($handle, 'Paramedic', 'internship', true) as $site): ?>
  <li><?= $site['site_department'] ?></li>
<?php endforeach; ?>
		      </ul>
	      </div>
	      <div class="section" style="margin-top: 2em;">
		      <ul class="bullets">
		        <h3>Training Resources:</h3>
		        <li>Simulation Lab with high fidelity ALS manikin</li>
		        <li>On-site Ambulance simulator</li>
		        <li>iPad with EMS software included with cost of course</li>
		        <li>NREMT-P Test Prep</li>
		      </ul>
	      </div>
	    </div>

	    <div class="column col3">
	      <div class="section">
		      <ul class="bullets">
		        <h3>Didactic Observation Sites:</h3>
<?php foreach (query_external($handle, 'Paramedic', 'didactic observation', true) as $site): ?>
  <li><?= $site['site_department'] ?></li>
<?php endforeach; ?>
		      </ul>
	      </div>
	    </div>

	  </div>

	  <div class="section photostrip pics-3" style="text-align: center;">
	    <a href="/photos/emt/index.html#emt">
	      <img alt="" src="/images/Paramedic 01 iPads 11-2012-01.png" />
	      <img alt="" src="/images/Paramedic 01 Car Extrication 11-2012-01.png" />
	      <img alt="" src="/images/Paramedic 01 Sim Lab 11-2012-01.png" class="last" />
	    </a>
	  </div>

	  <div class="section">
	    <div style="margin: 3em auto 0 auto;">
	      <h3 style="text-align: center;">Call us or click <a style="color:#C30;" href="/school/info/">HERE</a> to talk to an Admissions Representative!</h3>

	      <div class="bgimg fontsans" style="width: 20.25em; height: 2.25em; font-size: 220%;">
		      <div style="width: 20.25em; height: 2.25em; line-height: 2.25em;">
		        Call <a href="tel://1-800-637-7387">(800) 637-7387</a> or
		        <a href="tel://1-510-849-4009">(510) 849-4009</a>
		      </div>
		      <img src="/images/cloudbg.png" alt="phone number" />
	      </div>
	    </div>
	  </div>

	</div> <!-- /leftcontent -->
	<div class="clearfix"></div>

      </div> <!-- /section -->

      <div class="clearfix vspacer"></div>

    </div> <!-- /main -->

    <div id="footer">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/menu/footer.php'); ?>
    </div> <!-- /footer -->

  </div> <!-- /page -->

</body>
</html>
