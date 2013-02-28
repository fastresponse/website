<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">

<?php
  error_reporting(E_NONE);

  $emailaddr = $_GET['emailaddr'];
  if (!$emailaddr)
    $emailaddr = 'anonymous@fastresponse.org';
?>

<head>
  <title>Current Employment Survey | Fast Response</title>

  <base href="/" />

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="robots" content="INDEX, FOLLOW">
  <meta name="googlebot" content="INDEX, FOLLOW">

  <link type="image/x-icon" rel="shortcut icon" href="/misc/favicon.ico" />

  <link type="text/css" rel="stylesheet" media="all" href="/css/template.css" />
  <link type="text/css" rel="stylesheet" media="all" href="/css/nicemenus.css" />
  <link type="text/css" rel="stylesheet" media="print" href="/sites/all/themes/fastresponse/css/print.css" /> 
  <!--[if lte IE 6]><style type="text/css" media="all">@import "/sites/all/themes/fastresponse/css/ie6.css";</style><![endif]-->
  <!--[if IE 7]><style type="text/css" media="all">@import "/sites/all/themes/fastresponse/css/ie7.css";</style><![endif]-->


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

  <script type="text/javascript" src="/js/jquery.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $("#menu").load("/menu/menu.html");
    } );
    $(document).ready(function() {
      $("#footer").load("/menu/footer.html");
    } );
  </script>

  <script type="text/javascript" src="/js/frlib.js"></script>

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
	      $('input').val("");
	      $('textarea').val("");
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
    #contactform form { width: 100%; margin: 0; padding: 10px; margin-top: 20px; }

    #contactform fieldset {
      width: 100%;
      padding: 10px 0; margin: 15px 0; border: 1px solid white; border-radius: 5px
    }
    #contactform fieldset legend {
      font: normal bold 18px/26px "Trebuchet MS",Verdana,Tahoma; padding: 3px 25px;
      margin-left: 30px; text-transform: uppercase; border: 0px solid #ddd;
    }
    #contactform fieldset legend span {
      font: normal 10px/18px Arial,Verdana,Tahoma; text-transform: uppercase; display: block;
    }

    #contactform form label {
      display: block; float: left; padding: 6px 10px 0 0;
      margin: 0px; text-align: right; width: 15%;
    }

    #contactform form label.wide {
      padding-top: 0;
      width: 20%;
    }

    #contactform input.inpt, 
    #contactform input.mailaddr, 
    #contactform input.date, 
    #contactform textarea, 
    #contactform select {
      margin-bottom: 9px !important; border: 1px solid; background-color: #f5f5f5;
      border-color: #ccc #ddd #ddd #ccc; width: 30%; padding: 4px;
    }

    #contactform input.inpt, 
    #contactform input.mailaddr, 
    #contactform input.date, 
    #contactform textarea, 
    #contactform select { border-radius: 4px; }

    #contactform input.inpt:focus,
    #contactform input.mailaddr:focus,
    #contactform input.date:focus,
    #contactform select:focus,
    #contactform textarea:focus	{ background: #fff; }

    #contactform br { clear: left;}
    #contactform input.required {
      background: #f5f5f5 url('/images/required.gif') 99% 50% no-repeat;
    }

    #contactform input.mailaddr,
    #contactform input.date {
      width: 30%;
    }

    #contactform input.btn { background: none; border: none;}

    #contactform input[type=radio] {
      vertical-align: text-bottom;
    }
    #contactform input[type=checkbox] {
      vertical-align: middle;
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
      width: 100%;
      margin: 1em 0;
      padding: 0;
      position: relative;
      /* needed to counteract the padding on the form */
      left: -10px;
    }

    p {
      width: 65%;
      margin-left: auto;
      margin-right: auto;
      text-align: justify;
      font-family: serif;
      font-size: large;
      line-height: 1.25em;
    }

    ol {
      width: 65%;
      margin-left: auto;
      margin-right: auto;
    }

    .quicklinks dd {
      margin-bottom: 0;
      text-align: left;
    }
    .quicklinks dt {
      color: #FF2020;
      text-decoration: underline;
      font-size: 110%;
      margin-top: 1em;
      text-align: left;
    }
    .quicklinks .title {
      color: #FF2020;
      text-decoration: underline;
      font-size: 120%;
      text-align: center;
    }
    .quicklinks dd dl {
      display: inline;
      margin: 0;
    }
    .quicklinks dd dl dt {
      display: inline;
      margin: 0;
      text-decoration: none;
      color: #FF6600;
    }
    .quicklinks dd dl dd {
      display: inline;
      margin: 0;
    }

  </style>

</head>

<body>

  <div id="page">

    <div id="menu">
      <!-- filled in by javascript -->
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
	      <legend>Graduate Survey</legend>

	      <p>
	        If you would be willing to provide the following information about your current employment status, it would be very helpful to us in finding new ways to assist past, present, and future students. All of your information is completely confidential and will not be released to any third party. Your participation is greatly appreciated. Thank you for your assistance.
	      </p>

	      <form id="ajax-contact-form" method="post" action="current_employment_mailer.php">

		<input type='hidden' name='emailaddr' value='<?= $emailaddr ?>' /><br />

		<label>Name</label><input class="required inpt" type="text" name="name" value="" /><br />
		<label>Course</label><input class="required inpt" type="text" name="course" value="" /><br />
		<label>Graduation Date</label><input class="required date" type="text" name="graddate" value="" /><br />

		<label class="wide">Are you currently working in a job position relevant to your course of study?</label>
		<input type="radio" name="relevantjob" value="yes" onClick="removeClass('relyes', 'hidden'); addClass('relno', 'hidden'); removeClass('submitbutton', 'hidden');" />Yes
		<div style="display: inline-block; min-width: 1em;"></div>
		<input type="radio" name="relevantjob" value="no" onClick="removeClass('relno', 'hidden'); addClass('relyes', 'hidden'); removeClass('submitbutton', 'hidden');" />No
		<br />

		<div id="relyes" class="hidden">
		  <hr style="margin: 1em 0;" />
		  <label>Position</label><input class="inpt" type="text" name="position" value="" /><br />
		  <label>Employer Name</label><input class="inpt" type="text" name="empname" value="" /><br />
		  <label>Employer Address</label><input class="inpt" type="text" name="empaddr" value="" /><br />
		  <label>Hire Date</label><input class="inpt" type="text" name="hiredate" value="" /><br />
		  <label>Starting Pay</label><input class="inpt" type="text" name="startpay" value="" />
		  <input type="radio" name="startpaymethod" value="per hour" checked="checked" onClick="checkRadio('curpaymethod1');" id="startpaymethod1" />per hour
		  <div style="display: inline-block; min-width: 1em;"></div>
		  <input type="radio" name="startpaymethod" value="yearly salary" onClick="checkRadio('curpaymethod2');" id="startpaymethod2" />yearly salary
		  <br />
		  <label>Current Pay</label><input class="inpt" type="text" name="currentpay" value="" />
		  <input type="radio" name="curpaymethod" value="per hour" checked="checked" onClick="checkRadio('startpaymethod1');" id="curpaymethod1" />per hour
		  <div style="display: inline-block; min-width: 1em;"></div>
		  <input type="radio" name="curpaymethod" value="yearly salary" onClick="checkRadio('startpaymethod2');" id="curpaymethod2" />yearly salary
		  <br />
		  <label>Hours Per Week</label><input class="inpt" type="text" name="hoursperweek" value="" /><br />
		  <hr style="margin: 1em 0;" />
		</div>

		<div id="relno" class="hidden">
		  <hr style="margin: 1em 0;" />
		  <label class="wide">I would like additional assistance</label>
		  <input type="radio" name="wantassistance" value="yes" onClick="removeClass('assistanceopts', 'hidden');" />Yes
		  <div style="display: inline-block; min-width: 1em;"></div>
		  <input type="radio" name="wantassistance" value="no" checked="checked" onClick="addClass('assistanceopts', 'hidden');" />No
		  <br />
		  <div id="assistanceopts" class="hidden">
		    <div style="min-height: 0.2em;"></div>
		    <label class="wide">with:</label>
		    <input type="checkbox" name="assistancetypes[]" value="resume" />Resume PUT THIS TEXT IN A SPAN WITH WIDTH=4EM
		    <input type="checkbox" name="assistancetypes[]" value="coverletter" />Cover Letter
		    <br />
		    <label class="wide">&nbsp;</label>
		    <input type="checkbox" name="assistancetypes[]" value="interview" />Interview Skills
		    <input type="checkbox" name="assistancetypes[]" value="opportunities" />Finding Job Opportunities
		    <br />
		  </div>
		  <label class="wide">I am willing to travel outside the Bay Area</label>
		  <input type="radio" name="traveloutofbay" value="yes" />Yes
		  <div style="display: inline-block; min-width: 1em;"></div>
		  <input type="radio" name="traveloutofbay" value="no" checked="checked" />No
		  <br />
		  <label class="wide">I am willing to travel outside the state</label>
		  <input type="radio" name="traveloutofstate" value="yes" />Yes
		  <div style="display: inline-block; min-width: 1em;"></div>
		  <input type="radio" name="traveloutofstate" value="no" checked="checked" />No
		  <br />
		  <hr style="margin: 1em 0;" />
		</div>

		<div id="note"></div>

		<label id="load"></label>

		<input id="submitbutton" name="submit" type="image" value="Send" class="hidden buttontext" src="/images/submitbutton.png" style="border: none; color: white; cursor: pointer; width: 200px; height: 85px;" />

	      </form>
	    </fieldset>
	  </div>
	
	</div> <!-- /leftcontent -->

      </div> <!-- /section -->

      <div class="clearfix" style="min-height: 1em;"></div>

    </div> <!-- /main -->

    <div id="footer">
    </div> <!-- /footer -->

  </div> <!-- /page -->

</body>
</html>
