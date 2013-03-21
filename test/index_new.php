<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">

<head>
  <title>Fast Response</title>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="robots" content="INDEX, FOLLOW">
  <meta name="googlebot" content="INDEX, FOLLOW">

  <link type="image/x-icon" rel="shortcut icon" href="/misc/favicon.ico" />

  <link type="text/css" rel="stylesheet" media="all" href="/css/buttons.css" />
  <link type="text/css" rel="stylesheet" media="all" href="css/template.css" />
  <link type="text/css" rel="stylesheet" media="all" href="css/nicemenus.css" />
  <link type="text/css" rel="stylesheet" media="print" href="/sites/all/themes/fastresponse/css/print.css" /> 
  <!--[if lte IE 6]><style type="text/css" media="all">@import "/sites/all/themes/fastresponse/css/ie6.css";</style><![endif]-->
  <!--[if IE 7]><style type="text/css" media="all">@import "/sites/all/themes/fastresponse/css/ie7.css";</style><![endif]-->
  <!--[if lte IE 8]>
  <link type="text/css" rel="stylesheet" media="all" href="/css/buttons-ie.css" />
  <![endif]-->


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

  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

  <script type="text/javascript" src="/js/fadeslideshow.js">

  /***********************************************
  * Ultimate Fade In Slideshow v2.0- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
  * This notice MUST stay intact for legal use
  * Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
  ***********************************************/

  </script>

  <script type="text/javascript">

  var mygallery=new fadeSlideShow({
    //ID of blank DIV on page to house Slideshow
    wrapperid: "mainslideshow",
    //width/height of gallery in pixels.
    //Should reflect dimensions of largest image
    //dimensions: [550, 298],
    dimensions: [412, 225],
    imagearray: [
      ["/slideshow/412x225/slide01.jpg", "", "", ""],
      ["/slideshow/412x225/slide02.jpg", "", "", ""],
      ["/slideshow/412x225/slide03.jpg", "", "", ""],
      ["/slideshow/412x225/slide04.png", "", "", ""],
      ["/slideshow/412x225/slide05.jpg", "", "", ""],
      ["/slideshow/412x225/slide06.jpg", "", "", ""],
      ["/slideshow/412x225/slide07.png", "", "", ""],
      ["/slideshow/412x225/slide08.jpg", "", "", ""],
      ["/slideshow/412x225/slide09.png", "", "", ""]
    ],
    displaymode: {type:'auto', pause:4500, cycles:0,
      wraparound:true, randomize:false},
    //remember last viewed slide and recall within same session?
    persist: false,
    //transition duration (milliseconds)
    fadeduration: 800,
    descreveal: "none",
    togglerid: ""
  });

  </script>

  <script type = "text/javascript" src="/js/jquery.js"></script>

  <style type="text/css">
    table {
      width: 100%;
      vertical-align: top;
      text-align: center;
      margin-left: auto;
      margin-right: auto;
      margin-bottom 30px;
      border-collapse: collapse;
    }
    thead, tbody, tfoot, tr {
      width: 100%;
    }
    th {
      letter-spacing: 0.1em;
      font-family: Century Gothic, sans-serif;
      font-size: 125%;
      font-weight: bold;
      text-shadow: 2px 3px 8px #350010;
      text-align: center;
      vertical-align: top;
    }
    th>div {
      text-shadow: 2px 3px 8px #650010;
      height: 2.5em;
      width: 90%;
      margin: 0 auto;
      padding-bottom: 0.25em;
      border-bottom: 1px solid white;
    }
    th div div.sub {
      font-size: 0.65em;
    }
    td {
      text-align: center;
      padding-top: 3em;
    }
    tr:first-child td {
      padding-top: 2em;
    }

    table .btn {
      width: 45%;
    }

    .logotext {
      float: left;
      width: 45%;
    }
    .logotext img {
      display: block;
      width: 60%;
    }
    .logotext p {
      font-weight: bold;
      font-style: italic;
      width: 90%;
      margin: 0 auto;
    }
    #mainslideshow {
      float: right;
      max-width: 50%;
      margin-right: 3%;
      z-index: 0;
    }
    #banners .section {
      width: 100%;
      border-bottom: 1px solid white;
      border-bottom: none;
      margin: 0 0 3em;
    }
    #banners .banner {
      margin: 1.2em 2em;
      margin-top: 0;
    }
    #banners .banner.left {
      float: left;
    }
    #banners .banner.right {
      float: right;
    }
    #banners .banner .btn {
      padding-left: 1em;
      padding-right: 1em;
    }
    #banners .banner .btn>div {
      width: 100%;
      text-align: center;
    }

  </style>

</head>

<body>

  <div id="page">

    <div id="menu">
      <?php include('./menu/menu.php'); ?>
    </div>

    <div id="head" style="border-bottom: none;">
      <div class="logotext">
	<img src="/images/headers/header_main_left.png" alt="Fast Response School Of Health Care Education" />
	<p>Fast Response offers the Bay Area's most comprehensive education and resources for healthcare professionals including entry-level courses, certifications, and continuing education units.</p>
      </div>

      <div id="mainslideshow">
	<!-- filled in by javascript -->
      </div>

      <div class="clearfix"></div>
    </div> <!-- /head -->

    <div id="banners">
      <div class="section">
	<div class="banner left" style="max-width: 46%;">
	  <a href="school/info/" class="btn buttontext lines-1">
	    <div style="font-size: 120%; font-family: Georgia, serif; font-style: italic; text-shadow: -1px 1px 3px rgba(0,0,0,0.5), 1px -1px 3px rgba(0,0,0,0.5);">
	      Contact an Admissions Representative Now!
	    </div>
	    <span></span>
	  </a>
	</div>
	<div class="banner right" style="max-width: 50%; width: 412px; margin-right: 3%;">
	  <a href="classes/continuing_education/cpr/" class="btn buttontext lines-1" style="width: 100%;">
	    <div style="font-size: 150%; letter-spacing: 0.15em; word-spacing: 0.35em; font-family: Georgia, serif; font-style: italic;">
	      <div style="display: inline; font-weight: bold; text-transform: uppercase; font-style: italic; text-shadow: -1px 1px 1px rgba(0,0,0,0.5), 1px -1px 1px rgba(0,0,0,0.5);" class="red">New</div> Low BLS Prices
	    </div>
	    <span></span>
	  </a>
	</div>
	
	<div class="clearfix"></div>
      </div>
    </div>

    <div id="main">
      <div class="section">
	<table>
	  <colgroup span="4" style="width: 25%;">
	  </colgroup>
	  <thead>
	    <tr style="background-color: #444455;">
	      <th colspan="1"><div>Career Courses</div></th>
	      <th colspan="2"><div>Continuing Education<div class="sub">(EMS &amp; Hospital Personnel)</div></div></th>
	      <th colspan="1"><div>Student Resources</div></th>
	    </tr>
	  </thead>
	  <tbody>
	    <tr>
	      <td>
	        <a href="classes/career_courses/emt/" class="btn buttontext lines-2">
		  <div>Emergency Medical<br />Technician</div>
		  <span></span>
		</a>
	      </td>
	      <td>
		<a href="classes/continuing_education/cpr" class="btn buttontext lines-2">
		  <div>Healthcare Provider<br />CPR (BLS)</div>
		  <span></span>
		</a>
	      </td>
	      <td>
		<a href="classes/continuing_education/acls" class="btn buttontext lines-2">
		  <div>Advanced Cardiac<br />Life Support (ACLS)</div>
		  <span></span>
		</a>
	      </td>
	      <td>
		<a href="resources/emt/" class="btn buttontext lines-1">
		  <div>EMT Resources</div>
		  <span></span>
		</a>
	      </td>
	    </tr>
	    <tr>
	      <td>
		<a href="classes/career_courses/phlebotomy/" class="btn buttontext lines-2">
		  <div>Phlebotomy<br />Technician</div>
		  <span></span>
		</a>
	      </td>
	      <td>
		<a href="classes/continuing_education/pals" class="btn buttontext lines-2">
		  <div>Pediatric Advanced<br />Life Support (PALS)</div>
		  <span></span>
		</a>
	      </td>
	      <td>
		<a href="classes/continuing_education/emt_r" class="btn buttontext lines-1">
		  <div>EMT Refresher</div>
		  <span></span>
		</a>
	      </td>
	      <td>
		<a href="resources/cpt/" class="btn buttontext lines-1">
		  <div>CPT Resources</div>
		  <span></span>
		</a>
	      </td>
	    </tr>
	    <tr>
	      <td>
		<a href="classes/career_courses/medical_assistant/" class="btn buttontext lines-2">
		  <div>Clinical Medical<br />Assistant</div>
		  <span></span>
		</a>
	      </td>
	      <td>
		<a href="classes/continuing_education/ecg_basic" class="btn buttontext lines-1">
		  <div>ECG Basic</div>
		  <span></span>
		</a>
	      </td>
	      <td>
		<a href="classes/continuing_education/12_lead_ecg" class="btn buttontext lines-1">
		  <div>ECG 12-Lead</div>
		  <span></span>
		</a>
	      </td>
	      <td>
		<a href="resources/cma/" class="btn buttontext lines-1">
		  <div>CMA Resources</div>
		  <span></span>
		</a>
	      </td>
	    </tr>
	    <tr>
	      <td>
		<a href="classes/career_courses/paramedic/" class="btn buttontext lines-1">
		  <div>Paramedic</div>
		  <span></span>
		</a>
	      </td>
	      <td>
		<a href="classes/continuing_education/ecg_tech" class="btn buttontext lines-1">
		  <div>ECG Technician</div>
		  <span></span>
		</a>
	      </td>
	      <td>
		<a href="classes/continuing_education/itls" class="btn buttontext lines-2">
		  <div>International Trauma<br />Life Support (ITLS)</div>
		  <span></span>
		</a>
	      </td>
	      <td>
		<a href="resources/spt/" class="btn buttontext lines-1">
		  <div>SPT Resources</div>
		  <span></span>
		</a>
	      </td>
	    </tr>
	    <tr>
	      <td>
		<a href="classes/career_courses/sterile_processing_tech/" class="btn buttontext lines-2">
		  <div>Sterile Processing<br />Technician</div>
		  <span></span>
		</a>
	      </td>
	      <td></td>
	      <td></td>
	      <td></td>
	    </tr>
	  </tbody>
	</table>
      </div>

      <div class="section">
	<h4 style="text-align: center; max-width: 75%; margin: 1em auto 1em; letter-spacing: 0.12em;">This school has been approved by the <a style="white-space: nowrap;" href="http://www.bppe.ca.gov/about_us/contact.shtml">Bureau of Private and Postsecondary Education.</a></h4>
      </div>

      <div class="clearfix vspacer"></div>

    </div> <!-- /main -->

    <div id="footer">
      <?php include('./menu/footer.php'); ?>
    </div> <!-- /footer -->

  </div> <!-- /page -->

</body>
</html>
