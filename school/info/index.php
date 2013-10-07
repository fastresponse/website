<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">

<head>
  <title>Contact Info | Fast Response</title>

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

  <link type="text/css" rel="stylesheet" media="all" href="/css/form.css" />

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
	url: "/school/info/contact.php",
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

    p {
      width: 65%;
      margin-left: auto;
      margin-right: auto;
      text-align: justify;
      font-family: serif;
      font-size: large;
      line-height: 1.25em;
    }

    .quicklinks dd {
      margin-bottom: 0;
      text-align: left;
    }
    .quicklinks dt {
      color: #FF2020;
      color: #D22828;
      text-decoration: underline;
      font-size: 110%;
      margin-top: 1em;
      text-align: left;
    }
    .quicklinks .title {
      color: #FF2020;
      color: #D22828;
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
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/menu/menu.php'); ?>
    </div>

    <div id="head">
      <img src="/images/headers/header_main_left.png" class="headerimgleft" alt="Fast Response School of Health Care Education" />
      <img src="/images/headers/header_contact_right.png" class="headerimgright" alt="" />
      <div class="clearfix"></div>
    </div>

    <div id="main">

      <div class="section">

	<div class="rightsidebar" style="width: 28%;">
	  <div class="quicklinks">
	    <dl style="border: solid 1px white; border-radius: 5px; padding: 4%;">
	      <div class="title">Contact Information:</div>

	      <dt>Admissions (Career Courses)</dt>
	      <dd><dl>
		<dt>Hours:</dt> <dd>9-5, M-F</dd> <br />
		<dt>Phone:</dt> <dd>1-510-809-3654</dd> <br />
		<dt>Toll Free:</dt> <dd>1-800-637-7387</dd> <br />
		<dt>Fax:</dt> <dd>1-866-572-3363</dd> <br />
		<dt>Email:</dt> <dd><a href="mailto: admissions@fastresponse.org">admissions@fastresponse.org</a></dd> <br />
	      </dl></dd>

	      <dt>Front Desk, Continuing Education,<br />and General Inquiries</dt>
	      <dd><dl>
		<dt>Hours:</dt> <dd>9-5, M-F</dd> <br />
		<dt>Phone:</dt> <dd>1-510-849-4009</dd> <br />
		<dt>Fax:</dt> <dd>1-866-290-2739</dd> <br />
		<dt>Email:</dt> <dd><a href="mailto: info@fastresponse.org">info@fastresponse.org</a></dd> <br />
		<dt>Address:</dt> <br />
		<!-- this needs to be block so the margin applies to every line -->
		<dd style="display: block; margin-left: 0.5em;">
		Fast Response School of<br />
		Health Care Education<br />
		2075 Allston Way<br />
		Berkeley, CA 94704<br />
		</dd>
              </dl></dd>

	      <dt>EMT Program</dt>
	      <dd><dl>
		<dt>Email:</dt> <dd><a href="mailto: emt@fastresponse.org">emt@fastresponse.org</a></dd> <br />
	      </dl></dd>

	      <dt>Sterile Processing Program</dt>
	      <dd><dl>
		<dt>Email:</dt> <dd><a href="mailto: spt@fastresponse.org">spt@fastresponse.org</a></dd> <br />
	      </dl></dd>

	      <dt>Medical Assistant Program</dt>
	      <dd><dl>
		<dt>Email:</dt> <dd><a href="mailto: ma@fastresponse.org">ma@fastresponse.org</a></dd> <br />
	      </dl></dd>

	      <dt>Phlebotomy Program</dt>
	      <dd><dl>
		<dt>Email:</dt> <dd><a href="mailto: phlebotomy@fastresponse.org">phlebotomy@fastresponse.org</a></dd> <br />
	      </dl></dd>

	      <dt>Employment Inquiries</dt>
	      <dd><dl>
		<dt>Email:</dt> <dd><a href="mailto: applications@fastresponse.org">applications@fastresponse.org</a></dd> <br />
	      </dl></dd>

	    </dl>
	  </div>
	</div>

	<div class="leftcontent" style="margin: 2em 0; width: 71%;">

	  <div class="form">
	    <fieldset>
	      <legend>Contact Us For More Information</legend>

	      <p>
		At Fast Response we strive to provide the highest quality education possible.
	      </p>
	      <p>
		For career courses, please call our Admissions Department, or enter your information below and one of our Admissions Representatives will contact you soon.
	      </p>
              <p>
		For continuing education courses, please contact our Front Desk. We will be happy to answer all of your questions.
	      </p>

	      <form id="ajax-contact-form" method="post" action="/school/info/contact.php">

		<label>Full Name</label><input class="required inpt" type="text" name="name" value="" /><br />
		<label>E-Mail</label><input class="required inpt" type="text" name="email" value="" /><br />
		<label>Phone Number (xxx-xxx-xxxx)</label><input class="required inpt" type="text" name="phone" value="" /><br />
		<label>Course of Interest </label>
		<select name="subject" id="subject" class="select" >
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

		<label>How did you hear about us?</label>
		<select name="reference" id="reference" class="select">
		  <option value="">Select Source</option>
		  <option value="Google">Google</option>
		  <option value="Bing">Bing</option>
		  <option value="Yahoo">Yahoo</option>
		  <option value="Facebook">Facebook</option>
		  <option value="EMS-1">EMS-1 Website/Ad</option>
		  <option value="Internet-Other">Internet-Other</option>
		  <option value="Friend/Relative">Friend/Relative</option>
		  <option value="Coworker">Coworker</option>
		  <option value="Former student">Former student</option>
		  <option value="CalWorks">CalWorks</option>
		  <option value="DHS/EMSA">DHS/EMSA</option>
		  <option value="Employer">Employer</option>
		  <option value="Walk/Drive">Walk-In/Drive-By</option>
		  <option value="Flier">Flyer/Brochure</option>
		  <option value="career">Career Fair</option>
		  <option value="Youth Bridges">Youth Bridges</option>
		  <option value="Other">Other/Not specified</option>
		</select>
		<br />

		<hr />

		<label>When would you like us to contact you?</label>
		<select name="whenreachme">
		  <option value="Any Day">Any Day</option>
		  <option value="Weekdays">Weekdays</option>
		  <option value="Weekends">Weekends</option>
		</select>
		<br />

		<label>Select Time Frame</label>
		<select name="time">
		  <option value="anytime">Anytime</option>
		  <option value="9a-10a">9am-10am</option>
		  <option value="10a-11a">10am-11am</option>
		  <option value="11a-12p">11am-12pm</option>
		  <option value="12p-1p">12pm-1pm</option>
		  <option value="1p-2p">1pm-2pm</option>
		  <option value="2p-3p">2pm-3pm</option>
		  <option value="3p-4p">3pm-4pm</option>
		  <option value="4p-5p">4pm-5pm</option>
		  <option value="5p-6p">5pm-6pm</option>
		  <option value="6p">6pm or later</option>
		</select>
		<br />

		<hr />

		<label>Mailing Address:</label>
		<input type="text" name="streetaddress1" class="mailaddr" /> Street Address<br />
		<label>&nbsp;</label>
		<input type="text" name="streetaddress2" class="mailaddr" /> Street Address (Cont.)<br /> 
		<label>&nbsp;</label>
		<input type="text" name="streetaddress3" class="mailaddr" /> City, State, Zip Code<br />	

		<br />

		<label>Please enter any comments or questions</label>
		<textarea class="textbox" name="message" rows="6" cols="30"></textarea>
		<br />

		<!--
		<label class="wide">Would you like to receive a monthly EMS email newsletter from us?</label>
		<input type="radio" name="newsletter" value="Yes" checked="checked" />Yes
		<div style="display: inline-block; min-width: 1em;"></div>
		<input type="radio" name="newsletter" value="No" />No

		<br />

		<hr />
		-->

		<div id="note"></div>

		<label id="load"></label>
		<input name="submit" type="image" value="Send" class="buttontext" src="/images/submitbutton.png" style="border: none; color: white; cursor: pointer; width: 200px; height: 85px;" />

	      </form>
	    </fieldset>
	  </div>
	
	</div> <!-- /leftcontent -->

      </div> <!-- /section -->

      <div class="clearfix" style="min-height: 1em;"></div>

    </div> <!-- /main -->

    <div id="footer">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/menu/footer.php'); ?>
    </div> <!-- /footer -->

  </div> <!-- /page -->

  <!-- Google Code for Autoreply form Conversion Page -->
  <script type="text/javascript">
  /* <![CDATA[ */
  var google_conversion_id = 1004366580;
  var google_conversion_language = "en";
  var google_conversion_format = "3";
  var google_conversion_color = "000000";
  var google_conversion_label = "-fkCCMzGlQUQ9NX13gM";
  var google_conversion_value = 0;
  var google_remarketing_only = false;
  /* ]]> */
  </script>
  <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
  </script>
  <noscript>
  <div style="display:inline;">
  <img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/1004366580/?value=0&amp;label=-fkCCMzGlQUQ9NX13gM&amp;guid=ON&amp;script=0"/>
  </div>
  </noscript>

</body>
</html>
