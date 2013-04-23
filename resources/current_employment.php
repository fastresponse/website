<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">

<?php
  error_reporting(0);

  require($_SERVER['DOCUMENT_ROOT'] . '/php/frlib.php');

  $all_courses = array(
    'Select One' => '',
    'EMT' => '',
    'Phlebotomy' => '',
    'Medical Assistant' => '',
    'Sterile Processing' => '',
    'Paramedic' => '',
  );
  $emailaddr = 'anonymous@fastresponse.org';
  $firstname = $lastname = $studentphone = '';
  $studentid = '';
  $graddate = '';
  $program = $studentcourse = null;

  foreach ($_GET as $key => $value) {
    switch ($key) {
      case 'em':
	if ($value && filter_var($value, FILTER_VALIDATE_EMAIL))
	  $emailaddr = $value;
      break;

      case 'sid':
	$studentid = str_replace(',', '', $value);
      break;

      case 'fn':
	$firstname = $value;
      break;

      case 'ln':
	$lastname = $value;
      break;

      case 'co':
	$studentcourse = $value;
      break;

      case 'pr':
	$program = $value;
      break;

      case 'pn':
	$studentphone = phone_format(phone_strip($value));
      break;

      case 'gd':
	$tmpdate = date_create_from_format(
	  'm/d/Y', $value, timezone_open('America/Los_Angeles')
	);
	$graddate = date_format($tmpdate, 'd-M-Y');
      break;
    }
  }

  $studentname = $firstname . ' ' . $lastname;

  if ($program && !$studentcourse) {
    switch ($program) {
    case 'EMT-FT':
    case 'EMT-PT':
      $studentcourse = 'EMT';
    break;

    case 'PHL-FT':
    case 'PHL-PT':
    case 'PHL-ADV':
      $studentcourse = 'Phlebotomy';
    break;

    case 'MAC-AM':
    case 'MAC-PM':
      $studentcourse = 'Medical Assistant';
    break;

    case 'SPT-IAHCSMM':
    case 'SPT-CBSPD':
      $studentcourse = 'Sterile Processing';
    break;

    case 'PAR':
      $studentcourse = 'Paramedic';
    break;
    }
  }

  if (!$studentcourse || !in_array($studentcourse, array_keys($all_courses)))
    $studentcourse = 'Select One';
  $all_courses[$studentcourse] = "selected='selected'";

?>

<head>
  <title>Post-graduation Employment Survey | Fast Response</title>

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

  <script type="text/javascript" src="/js/frlib.js"></script>
  <script type="text/javascript" src="/js/datetimepicker.js"></script>

  <!-- Code for new formmail/autoreply -->

  <!-- JQuery -->
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>

  <script type="text/javascript">  
  /* <![CDATA[ */    
  $(document).ready(function() {
    var close_note = $("#note");
    close_note.click(function () {
      jQuery("#note").slideUp(500, function () {
	jQuery(this).hide();
      });
    });

    $("#ajax-contact-form").submit(function() {
      $('#load').append('<center><img src="/images/ajax-loader.gif" alt="Currently Loading" id="loading" /></center>');

      var fem = $(this).serialize(),
      note = $('#note');

      $.ajax({
	type: "POST",
	url: "/resources/current_employment_mailer.php",
	data: fem,
	success: function(msg) {
	  if ( note.height() ) {
	    note.slideUp(500, function() {
	      $(this).hide();
	    });
	  } 
	  else note.hide();

	  $('#loading').fadeOut(300, function() {
	    $(this).remove();
	    if (msg === 'OK') {
	      //$('input').val("");
	      //$('textarea').val("");
	    }
	    // Message Sent? Show the 'Thank You' message and hide the form
	    result = (msg === 'OK') ? '<div class="success">Your responses have been saved. Thank you for participating!</div>' : msg;

	    var i = setInterval(function() {
	      if ( !note.is(':visible') ) {
		note.html(result).slideDown(500);
		clearInterval(i);
	      }
	    }, 40);    
	  }); // end loading image fadeOut
	}
      });

      return false;
    });
  });
  /* ]]> */
  </script>  
  <!-- End form code -->

  <style type="text/css">

    /* For new formmail/autoreply */

    #contactform { width: 100%; font: normal 11px/18px Verdana,Tahoma, Sans-serif; }
    #contactform,
    #contactform * {
      box-sizing: border-box;
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
    }
    #contactform form { width: 100%; margin: 0; padding: 0; }

    #contactform fieldset {
      max-width: 800px;
      padding: 10px 0; margin: 15px auto; border: 1px solid white; border-radius: 5px
    }
    #contactform fieldset legend {
      font: normal bold 18px/26px "Trebuchet MS",Verdana,Tahoma; padding: 3px 25px;
      margin-left: 30px; text-transform: uppercase; border: 0px solid #ddd;
    }
    #contactform fieldset legend span {
      font: normal 10px/18px Arial,Verdana,Tahoma; text-transform: uppercase; display: block;
    }

    #contactform div.box {
      float: left;
      margin: 7.5px 0;
      position: relative;
    }

    #contactform div.clearbox {
      clear: left;
      margin-bottom: 0.8em;
    }

    #contactform label {
      display: inline-block;
      padding: 0 10px 0 0;
      margin: 0;
      text-align: right;
      width: 140px;
      vertical-align: top;
      line-height: 26px;
    }

    #contactform input,
    #contactform textarea, 
    #contactform select {
      background-color: #f5f5f5;
      margin: 0;
      padding: 4px;
      border: 1px solid;
      border-color: #ccc #ddd #ddd #ccc;
      border-radius: 4px;
      vertical-align: top;
    }

    #contactform input { width: 225px; }
    #contactform select { width: 225px; }
    #contactform textarea { width: 590px; resize: none; }
    #contactform textarea[name=empaddr] { width: 225px; height: 71px; }
    #contactform a.reviewlink { display: inline-block; width: 225px; }
    #contactform .spacer { width: 225px; display: inline-block; }

    #contactform input:focus,
    #contactform select:focus,
    #contactform textarea:focus	{ background-color: #ffffff; }

    #contactform br { clear: left; }
    #contactform .required {
      background: #f5f5f5 url('/images/required.gif') 99% 50% no-repeat;
    }

    #contactform input[type=radio] {
      vertical-align: text-bottom;
    }
    #contactform input[type=checkbox] {
      vertical-align: middle;
      width: auto;
      min-width: auto;
      padding: 0;
    }
    #contactform input[type=submit] {
      font-size: 120%;
      width: 140px;
      height: 3em;
      cursor: pointer;
      margin-bottom: 1em;
      color: #F0F0F0;
      font-size: 14px;
      font-family: "Trebuchet MS", Helvetica, sans-serif;
      font-weight: bold;
      letter-spacing: 0.12em;
      text-shadow: 1px -1px 3px rgba(15, 0, 15, 0.7),
		  -1px 1px 3px rgba(15, 0, 15, 0.7);
      background: #103068;
      background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(rgba(255,255,255,0.20)), to(rgba(255,255,255,0)));
      background-image: -webkit-linear-gradient(top, rgba(255,255,255,0.2), rgba(255,255,255,0));
      background-image: -moz-linear-gradient(top, rgba(255,255,255,0.2), rgba(255,255,255,0));
      background-image: -ms-linear-gradient(top, rgba(255,255,255,0.2), rgba(255,255,255,0));
      background-image: -o-linear-gradient(top, rgba(255,255,255,0.2), rgba(255,255,255,0));
      background-image: linear-gradient(to bottom, rgba(255,255,255,0.20), rgba(255,255,255,0));
      border: 3px solid rgba(0,0,0,0.50);
      border-top: none;
      border-bottom: none;
      border-radius: 15px;
      -moz-border-radius: 15px;
      -webkit-border-radius: 15px;
      box-shadow: 3px 3px 15px 1px rgba(140, 0, 30, 0.5),
		  3px -3px 15px 1px rgba(140, 0, 30, 0.5),
		  -3px 3px 15px 1px rgba(140, 0, 30, 0.5),
		  -3px -3px 15px 1px rgba(140, 0, 30, 0.5);
      -moz-box-shadow: 3px 3px 15px 1px rgba(140, 0, 30, 0.5),
		  3px -3px 15px 1px rgba(140, 0, 30, 0.5),
		  -3px 3px 15px 1px rgba(140, 0, 30, 0.5),
		  -3px -3px 15px 1px rgba(140, 0, 30, 0.5);
      -webkit-box-shadow: 3px 3px 15px 1px rgba(140, 0, 30, 0.5),
		  3px -3px 15px 1px rgba(140, 0, 30, 0.5),
		  -3px 3px 15px 1px rgba(140, 0, 30, 0.5),
		  -3px -3px 15px 1px rgba(140, 0, 30, 0.5);
    }
    #contactform input[type=submit]:hover {
      background-color: #062070;
      text-shadow: 1px -1px 5px rgba(30, 20, 20, 0.8),
		  -1px 1px 5px rgba(30, 20, 20, 0.8);
    }

    #contactform #note { width: 90%; margin: 0 auto; }

    /* Error / Success / Notice ----------------------------------------------------------- */

    #contactform .notes { background: #f0f0f0; border: 1px solid #b8b8b8; }
    #contactform .success { background: #ccfcd1; border: 1px solid #60a400; }
    #contactform .error { background: #f9e3e3; border: 1px solid #e79e9e; }
    #contactform .notice { background: #fcf0cc; border: 1px solid #ecc735; }

    #contactform .notes,
    #contactform .notice,
    #contactform .success,
    #contactform .error { padding: 10px; font-size: 10px; color: #000;}

    #contactform .notes span,
    #contactform .notice span,
    #contactform .success span,
    #contactform .error span { font-weight: bold; font-size: 1.2em;}

    #contactform .notes p,
    #contactform .success p,
    #contactform .error p,
    #contactform .notice p { margin: 0px; padding: 0px; }

    #contactform .success,
    #contactform .error {
      margin: 1em auto;
      font-size: 110%;
      font-weight: bold;
    }

    hr {
      margin: 0;
      padding: 0;
      position: relative;
      clear: left;
    }

    p {
      margin-left: 11%;
      margin-right: 11%;
      font-family: serif;
      font-size: large;
      line-height: 1.25em;
    }

    .calimg {
      vertical-align: top;
      height: 20px;
      width: 20px;
      position: absolute;
      right: 5px;
      top: 2px;
      cursor: pointer;
      border: 0;
    }

  </style>

</head>

<body>

  <div id="page">

    <div id="menu">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/menu/menu.php'); ?>
    </div>

    <div id="head">
      <img src="/images/headers/header_main_left.png" class="headerimgleft" alt="Fast Response School of Health Care Education" />
      <img src="/images/headers/header_career_right.jpg" class="headerimgright" alt="" />
      <div class="clearfix"></div>
    </div>

    <div id="main">

      <div class="section">

	<div>

	  <div id="contactform">
	    <fieldset>
	      <legend>Post-graduation Employment Survey</legend>

	      <p>Your responses to this survey will greatly help our accreditation efforts and allow us to better serve our students.</p>
	      <p>Thank you for your participation.</p>

	      <form id="ajax-contact-form" method="post" action="/resources/current_employment_mailer.php">

		<input type='hidden' name='email' value='<?= $emailaddr ?>' />
		<input type='hidden' name='sid' value='<?= $studentid ?>' />

		<hr style="margin-top: 0;"/>
		<div class="clearbox"></div>

		<div class="box">
		  <label for="name">Name</label><input class="inpt" type="text" name="name" value="<?= $studentname ?>" />
		</div>
		<div class="box">
		  <label for="phone">Phone number</label><input class="inpt" type="text" name="phone" value="<?= $studentphone ?>" />
		</div>

		<div class="box">
		  <label>Course</label><select name="course">
		    <?php
		      foreach ($all_courses as $course => $selected)
			echo "<option value='$course' $selected>$course</option>\n";
		    ?>
		  </select>
		</div>
		<div class="box">
		  <label>Graduation Date</label><input id="cal" type="text" name="graddate" class="date" readonly="readonly" value="<?= $graddate ?>" />
		  <img src="/images/cal.gif" alt="Pick a date" class="calimg" onClick="NewCal('cal', 'ddmmmyyyy');" />
		</div>
		
		<div class="clearbox"></div>
		<hr />
		<div class="clearbox"></div>

		<div class="box">
		  <label>Employer Name</label><input class="inpt" type="text" name="empname" value="" />
		</div>
		<div class="box">
		  <label>Position</label><input class="inpt" type="text" name="position" value="" />
		</div>
		<div class="box">
		  <label>Employer Phone</label><input class="inpt" type="text" name="empphone" value="" />
		</div>
		<div class="box">
		  <label>Hire Date</label><input id="cal2" type="text" name="hiredate" class="date" readonly="readonly" value="" />
		  <img src="/images/cal.gif" alt="Pick a date" class="calimg" onClick="NewCal('cal2', 'ddmmmyyyy');" />
		</div>
		<div class="box">
		  <label>Employer Address</label><textarea name="empaddr" cols="61" rows="3"></textarea>
		</div>


		<div class="box">
		  <label>Starting Pay</label><select name="startpay">
		    <option value="10-15" selected="selected">$10 - $15</option>
		    <option value="16-20">$16 - $20</option>
		    <option value="21-25">$21 - $25</option>
		    <option value="26-30">$26 - $30</option>
		    <option value="over 30">More than $30</option>
		  </select>
		</div>
		<div class="box">
		  <label>Current Pay</label><select name="currentpay">
		    <option value="10-15" selected="selected">$10 - $15</option>
		    <option value="16-20">$16 - $20</option>
		    <option value="21-25">$21 - $25</option>
		    <option value="26-30">$26 - $30</option>
		    <option value="over 30">More than $30</option>
		  </select>
		</div>

		<div class="box">
		  <label></label><div class="spacer"></div>
		</div>
		<div class="box">
		  <label>Hours Per Week</label><select name="hoursperweek">
		    <option value="less than 20">Less than 20</option>
		    <option value="20-30">20 - 30</option>
		    <option value="31-40" selected="selected">31 - 40</option>
		    <option value="41-50">41 - 50</option>
		    <option value="51-60">51 - 60</option>
		    <option value="over 60">More than 60</option>
		  </select>
		</div>

		<div class="clearbox"></div>
		<hr />
		<div class="clearbox"></div>

		<div class="box">
		  <label>Comments</label><textarea name="comments" cols="61" rows="5"></textarea>
		</div>

		<div class="box" style="margin: 15px 0;">
		  <label></label>
		  <input name="ok_testimonial" type="checkbox" class="inpt" onClick="toggleClass('release-box', 'hidden');" />
		  <label style="width: auto;">I would like to provide a testimonial for Fast Response.</label>

		  <div id="release-box" class="hidden">
		    <label></label>
		    <input name="releaseok" type="checkbox" class="inpt" onClick="toggleClass('testimonial-box', 'hidden');" />
		    <label style="width: auto; padding-top: 0;">I have read the <a href="/resources/release.php" target="_blank" onClick="return openWindow('/resources/release.php');">release of liability</a> and agree to be bound by it.</label>
		    <br />
		    <div id="testimonial-box" class="hidden">
		      <label>Testimonial</label>
		      <textarea name="testimonial" cols="61" rows="5"></textarea>
		      <br />
		    </div>
		  </div>
		</div>

		<div class="box">
		  <label>Reviews</label>
		  <a href="http://www.yelp.com/biz/fast-response-school-of-health-care-education-berkeley" class="reviewlink" target="_blank"><img src="/images/buttons/yelp-icon.png" alt="" style="vertical-align: middle; margin-left: -6px; border: 0;" />Review us on Yelp</a>
		</div>

		<div class="clearbox"></div>
		<hr />
		<div class="clearbox"></div>

		<!--
		<div class="box">
		  <label></label>
		  <input name="opt-out" type="checkbox" class="inpt" />
		  <label style="width: auto;">Please remove me from all future emails from Fast Response.</label>
		</div>
		-->

		<div style="clear: left; height: 2em; width: 140px;"></div>

		<div id="note"></div>

		<label id="load"></label>

		<input id="submitbutton" name="submit" type="submit" value="SUBMIT" class="buttontext" />

	      </form>
	    </fieldset>
	  </div>
	
	</div> <!-- /leftcontent -->

      </div> <!-- /section -->

      <div class="clearfix"></div>

    </div> <!-- /main -->

    <div id="footer">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/menu/footer.php'); ?>
    </div> <!-- /footer -->

  </div> <!-- /page -->

</body>
</html>
