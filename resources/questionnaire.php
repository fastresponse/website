<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">

<head>
  <title>Career Services Questionnaire | Fast Response</title>

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
	url: "/php/ajax/ajax.questionnaire_mailer.php",
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
	    result = (msg === 'OK') ? '<div class="success">Your message has been sent. Thank you!</div>' : msg;

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

    #contactform input.inpt, 
    #contactform input.mailaddr, 
    #contactform input.date, 
    #contactform textarea, 
    #contactform select {
      margin-bottom: 9px !important; border: 1px solid; background-color: #f5f5f5;
      border-color: #ccc #ddd #ddd #ccc; width: 80%; padding: 4px;
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
      background: #f5f5f5 url('/school/info/images/required.gif') 99% 50% no-repeat;
    }

    #contactform input.mailaddr,
    #contactform input.date {
      width: 30%;
    }

    #contactform input.btn { background: none; border: none;}

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
	      <legend>Career Services Workshop Questionnaire - Registration</legend>

	      <p>
		In order to register for our Career Services workshop, please fill out this form and submit it.
	      </p>
	      <p>
		A Career Services Representative will contact you to arrange a meeting time.
	      </p>

	      <!--
              <p style="font-size: small; line-height: 1em; text-align: right; width: 95%;">
		<q>Setting goals is the first step in turning the invisible into the visible.</q>
		<cite>-Tony Robbins</cite>
		<br /><br />
		<q>People with clear, written goals, accomplish far more in a shorter period of time than people without them could ever imagine.</q>
		<cite>-Brian Tracy</cite>
	      </p>
	      -->

	      <form id="ajax-contact-form" method="post" action="/resources/questionnaire_mailer.php">

		<label>Full Name</label><input class="required inpt" type="text" name="name" value="" /><br />
		<label>E-Mail</label><input class="required inpt" type="text" name="email" value="" /><br />
		<label>Phone Number (xxx-xxx-xxxx)</label><input class="required inpt" type="text" name="phone" value="" /><br />
		<label>Course Title</label>
		<select name="subject" id="subject" class="select" style="width: 30.7%;">
		  <option value="">Select your course</option>
		  <option value="EMT">EMT</option>
		  <option value="Sterile Processing">Sterile Processing</option>
		  <option value="Clinical Medical Assistant">Clinical Medical Assistant</option>
		  <option value="Phlebotomy">Phlebotomy</option>
		  <option value="Paramedic">Paramedic</option>
		  <!-- <option value="Ward Clerk">Ward Clerk</option> -->
		  <option value="Other Courses">Other Course(s)</option>
		</select>
		<br />

		<label>Graduation Date</label><input class="date" type="text" name="graddate" value="" /><br />
		<label>
		  Preferred Workshop Date<br />
		  <span style="font-size: 80%;">(Every 1<sup>st</sup> and 3<sup>rd</sup> Thursday)</span>
		</label><input class="date" type="text" name="workshopdate" value="" /><br />
		

		<hr />

		<p>Consider your answers to these questions and write your <u>specific</u> career goals.</p>
		<ol>
		  <li>What do I want to do with my new career training?</li>
		  <li>What geographical location or setting do I want to be employed in?</li>
		  <li>Will I need more continuing education units or training?</li>
		  <li>How long do I need for the goal, e.g. 2 months or 1 year?</li>
		</ol>
		<br />

		<label>Short Term (0-12 months):<br />1-3 Goals</label>
		<textarea class="textbox" name="shortterm" rows="6" cols="30"></textarea>

		<label>Long Term (1-5 years):<br />1-3 Goals</label>
		<textarea class="textbox" name="longterm" rows="6" cols="30"></textarea>

		<div id="note"></div>

		<label id="load"></label>
		<!--
		<input name="submit" type="image" class="btn" src="/school/info/images/submit.gif" value="Send" />
		-->
		<input name="submit" type="image" value="Send" class="buttontext" src="/images/submitbutton.png" style="border: none; color: white; cursor: pointer; width: 200px; height: 85px;" />

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
