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
  <link type="text/css" rel="stylesheet" media="all" href="/css/template.css" />
  <link type="text/css" rel="stylesheet" media="all" href="/css/nicemenus.css" />
  <link type="text/css" rel="stylesheet" media="print" href="/sites/all/themes/fastresponse/css/print.css" /> 
  <!--[if lte IE 6]><style type="text/css" media="all">@import "/sites/all/themes/fastresponse/css/ie6.css";</style><![endif]-->
  <!--[if IE 7]><style type="text/css" media="all">@import "/sites/all/themes/fastresponse/css/ie7.css";</style><![endif]-->
  <!--[if lte IE 8]><style type="text/css" media="all">@import "/css/buttons-ie.css";</style><![endif]-->

  <?php include_once($_SERVER['DOCUMENT_ROOT'] . '/php/analytics_google.php'); ?>

  <script type="text/javascript" src="/js/jquery-1.10.2.min.js"></script>


  <style type="text/css">
    .link-column {
      display: inline-block;
      margin: 0 10px 20px;
      text-align: center;
      vertical-align: top;
      width: 260px;
      direction: ltr;
    }
    .link-column.cols-2 {
      width: 540px;
    }
    .link-column .title {
      letter-spacing: 0.1em;
      font-family: Century Gothic, sans-serif;
      font-weight: bold;
      text-align: center;
      vertical-align: top;
      background-color: rgb(10, 30, 60);
      padding: 10px 27px;
      border-radius: 75px;
      -moz-border-radius: 75px;
      -webkit-border-radius: 75px;
    }
    .link-column .title>div {
      text-shadow: 2px 2px 5px rgb(0, 0, 0);
      /*font-size: 115%;*/
      margin: 0 auto;
      padding: 0.5em;
      border: 2px solid rgb(200, 200, 200);
      border-radius: 15px;
      -moz-border-radius: 15px;
      -webkit-border-radius: 15px;
      box-shadow: 0px 1px 1px 1px #111111;
      -moz-box-shadow: 0px 1px 1px 1px #111111;
      -webkit-box-shadow: 0px 1px 1px 1px #111111;
      /*
      background-color: rgb(0, 15, 35);
      background-color: rgba(0, 0, 0, 0.3);
      */
      overflow: hidden;
    }
    .link-column:hover .title>div {
      /*color: rgb(255, 255, 153);
      color: rgb(221, 0, 51);
      */
    }
    .link-column .title h1 {
      font-size: 115%;
      margin: 0 auto;
    }
    .link-column .title h2 {
      font-size: 65%;
      margin: 0 auto;
    }
    .link-column .body {
      width: 65%;
      font-size: 90%;
      text-align: center;
      margin-left: auto;
      margin-right: auto;
      padding: 5px;
      border: 5px solid rgb(10, 30, 60);
      border-bottom-right-radius: 15px;
      border-bottom-left-radius: 15px;
      background-color: rgb(5, 15, 30);
      background-image: -webkit-linear-gradient(top, rgb(10, 30, 60), rgb(0, 0, 0));
      background-image: -moz-linear-gradient(top, rgb(10, 30, 60), rgb(0, 0, 0));
      background-image: -ms-linear-gradient(top, rgb(10, 30, 60), rgb(0, 0, 0));
      background-image: -o-linear-gradient(top, rgb(10, 30, 60), rgb(0, 0, 0));
      background-image: linear-gradient(to bottom, rgb(10, 30, 60), rgb(0, 0, 0));
    }
    .link-column a {
      display: block;
      padding: 10px 5px;
      text-decoration: none;
      font-family: Century Gothic, sans-serif;
      font-weight: bold;
      height: 30px;
      line-height: 15px;
    }
    .link-column a:hover {
      color: rgb(221, 0, 51);
    }
    .link-column.cols-2 .body {
      text-align: center;
      width: 80%;
    }
    .link-column.cols-2 a {
      display: inline-block;
      text-align: center;
      vertical-align: middle;
      width: 46%;
    }
    .link-column.cols-2 .placeholder {
      padding: 0;
      height: 0;
    }
    .link-column.placeholder {
      width: 0;
      margin: 0;
    }

    #head {
      border-bottom: none;
    }
    #main {
      padding-bottom: 0;
    }
    #headimg {
      width: 100%;
    }
    #blurb {
      display: inline-block;
      font-weight: bold;
      font-style: italic;
      text-align: justify;
      box-sizing: border-box;
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
      padding: 5% 20%;
    }
    .approved,
    .disclaimer {
      text-align: center;
    }
    .leftsidebar2 .approved {
      margin: 50px auto 20px;
    }
    .rightcontent2 .approved,
    .rightcontent2 .disclaimer {
      display: none;
    }
    .head-left {
      float: left;
      width: 50%;
      float: none;
      display: inline-block;
      width: 69%;
    }
    .head-center {
      display: inline-block;
      width: 39%;
      vertical-align: text-bottom;
    }
    .head-right {
      display: inline-block;
      width: 30%;
      vertical-align: text-top;
    }
    #mainslideshow {
      display: inline-block;
      margin: 0 auto 2%;
      border-radius: 50px;
      -moz-border-radius: 50px;
      -webkit-border-radius: 50px;
    }
    .banners {
      text-align: center;
      display: inline-block;
    }
    .banners.banners-4 .banner {
      width: 24.5%;
    }
    .banners.banners-3 .banner {
      width: 33.3%;
    }
    .banners.banners-2 .banner {
      width: 49.5%;
    }
    .banners.banners-1 .banner {
      width: 90.0%;
      float: none;
    }
    .banners .banner {
      clear: both;
      display: inline-block;
      box-sizing: border-box;
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
      width: 100%;
      margin: 9% auto 0;
    }
    .banners .banner.left {
    }
    .banners .banner.right {
    }
    .banners .banner.center {
    }
    .banners .banner .btn {
      padding-left: 1em;
      padding-right: 1em;
      width: 100%;
      background-image: none;
      background-color: rgb(42, 72, 115);
      background: -webkit-linear-gradient(top, rgb(85, 115, 145), rgb(0, 30, 85));
      border-bottom: 3px solid rgba(0,0,0, 0.8);
    }
    .banners .banner .btn>div {
      width: 100%;
      text-align: center;
      font-size: 100%;
      font-family: Georgia, serif;
      font-style: italic;
      text-shadow: -1px 1px 3px rgba(0,0,0,0.5), 1px -1px 3px rgba(0,0,0,0.5);
    }
    .leftsidebar2 {
      width: 420px;
      text-align: center;
      padding: 0 15px 0 5px;
    }
    .rightcontent2 {
      padding-left: 440px;
    }

    @media (max-width: 1023px) and (min-width: 640px) {
      #headimg {
        width: 65%;
        margin: 0 auto;
      }
      .leftsidebar2 {
        width: 100%;
        padding: 0;
      }
      .rightcontent2 {
        padding: 0;
      }
      #blurb {
        padding: 1% 5% 2%;
      }
      .leftsidebar2 .approved,
      .leftsidebar2 .disclaimer {
        display: none;
      }
      .rightcontent2 .approved,
      .rightcontent2 .disclaimer {
        display: block;
      }
      #mainslideshow {
        display: none;
      }
      .banners {
        margin-bottom: 5%;
      }
      .banners .banner {
        width: auto;
        margin: 3% 3% 0;
      }
    }
    @media handheld, (max-width: 639px) {
      #menu {
        display: none;
      }
      #head {
        border-top: none;
      }
      #head .leftsidebar2 {
        width: 100%;
        padding: 0;
      }
      #head .rightcontent2 {
        padding: 0;
      }
      #headimg {
        width: 100%;
        margin: 0;
      }
      #blurb {
        padding: 1% 5% 5%;
        text-align: left;
      }
      .approved,
      .disclaimer {
        /*text-align: left;*/
      }

      #main {
        padding: 0;
      }
      #main .leftsidebar2 {
        display: none;
      }
      #main .rightcontent2 {
        padding-left: 0;
      }
      .link-column .title h1 {
        font-size: 100%;
      }
      .link-column,
      .link-column.cols-2 {
        width: 98%;
        margin-left: 0;
        margin-right: 0;
      }
      .link-column .body,
      .link-column.cols-2 .body {
        width: 65%;
      }
      .link-column a,
      .link-column.cols-2 a {
        width: 95%;
      }
    }

  </style>

</head>

<body>

  <div id="page">

    <div id="menu">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/menu/menu.php'); ?>
    </div>

    <div id="head">
      <div class="leftsidebar2">
	      <img src="/images/headers/header_main_left.png" alt="Fast Response School Of Health Care Education" id="headimg" />
      </div>
      <div class="rightcontent2">
	      <div id="blurb">Fast Response offers the Bay Area's most comprehensive education and resources for healthcare professionals including entry-level courses, certifications, and continuing education units.</div>
      </div>
      <div class="clearfix"></div>
    </div> <!-- /head -->

    <div id="main">

      <div class="leftsidebar2">

        <div id="mainslideshow" class="glow-lightblue">
          <!-- filled in by javascript -->
        </div>

        <div class="banners">

	        <div class="banner">
	          <a href="/school/info/" class="btn buttontext lines-1">
	            <div>
	              Contact an Admissions Representative Now!
	            </div>
	            <span></span>
	          </a>
	        </div>

	        <div class="banner">
	          <a href="/classes/continuing_education/cpr/" class="btn buttontext lines-1 glow-yellow">
	            <div>
	              <div style="display: inline; font-weight: bold; font-size: 110%;" class="red">NEW</div> Low BLS Prices
	            </div>
	            <span></span>
	          </a>
	        </div>

          <div class="banner">
            <a href="/classes/career_courses/paramedic/" class="btn buttontext lines-1 glow-red">
              <div>
                Paramedic Academy Applications due <div style="display: inline; white-space: nowrap;">Jan 1st</div>
              </div>
              <span></span>
            </a>
          </div>

	        <div class="clearfix"></div>
        </div> <!-- /banners -->

        <div class="approved">
	        <h4 style="text-align: center; letter-spacing: 0.08em;">This school has been approved by the <a style="display: block;" href="http://www.bppe.ca.gov/about_us/contact.shtml">Bureau of Private and <span style="white-space: nowrap;">Postsecondary Education</span>.</a></h4>
        </div>

        <div class="disclaimer section">
	        <h5 style="text-align: center; margin: 1em auto 1em;">All prices and content subject to change.</h5>
        </div>

      </div> <!-- /leftsidebar2 -->

      <div class="rightcontent2">

        <div class="section" style="margin-top: 0; text-align: center; direction: ltr;">
         
          <!-- whitespace between link-column divs is shown in output,
               so this structure is important for correct alignment -->

          <div class="link-column">
            <div class="title">
              <div>
                <h1>About Us</h1>
                <h2>Fast Response</h2>
              </div>
            </div>
            <div class="body">
              <a href="/school/about.php">Who We Are</a>
              <a href="/school/location/">Location</a>
              <a href="/school/info/">Contact Us</a>
              <!--<a href="/community/events.php">Community Events</a>-->
              <a href="/gallery/index.php">Photo Galleries</a>
            </div>
          </div><!-- /link-column --><div class="link-column">
            <div class="title">
              <div>
                <h1>Career Courses</h1>
                <h2>For Everyone</h2>
              </div>
            </div>
            <div class="body">
              <a href="/classes/career_courses/emt/">Emergency Medical Technician</a>
              <a href="/classes/career_courses/phlebotomy/">Certified Phlebotomy Technician</a>
              <a href="/classes/career_courses/medical_assistant/">Clinical Medical Assistant</a>
              <a href="/classes/career_courses/paramedic/">Paramedic</a>
              <a href="/classes/career_courses/sterile_processing_tech/">Sterile Processing Technician</a>
            </div>
          </div><!-- /link-column --><div class="link-column">
            <div class="title">
              <div>
                <h1>Student Resources</h1>
                <h2>Current &amp; Past Students</h2>
              </div>
            </div>
            <div class="body">
              <a href="/resources/emt/">EMT Resources</a>
              <a href="/resources/cpt/">CPT Resources</a>
              <a href="/resources/cma/">CMA Resources</a>
              <!--<a href="/resources/paramedic/">Paramedic Resources</a>-->
              <a href="/resources/spt/">SPT Resources</a>
            </div>
          </div><!-- /link-column --><!--<div class="link-column">
            <div class="title">
              <div>
                <h1>Test</h1>
                <h2>Subheading</h2>
              </div>
            </div>
            <div class="body">
              <a href="/">Test 1</a>
              <a href="/">Test 2</a>
              <a href="/">Test 3</a>
              <a href="/">Test 4</a>
              <a href="/">Test 5</a>
            </div>
          </div>--><!-- /link-column --><div class="link-column cols-2">
            <div class="title">
              <div>
                <h1>Continuing Education</h1>
                <h2>EMS &amp; Hospital Personnel</h2>
              </div>
            </div>
            <div class="body">
              <a href="/classes/continuing_education/cpr/">Healthcare Provider CPR (BLS)</a>
              <a href="/classes/continuing_education/ecg_basic/">ECG Basic</a>
              <a href="/classes/continuing_education/acls/">Advanced Cardiac Life Support (ACLS)</a>
              <a href="/classes/continuing_education/12_lead_ecg">ECG 12-Lead</a>
              <a href="/classes/continuing_education/pals/">Pediatric Advanced Life Support (PALS)</a>
              <a href="/classes/continuing_education/ecg_tech/">ECG Technician</a>
              <a href="/classes/continuing_education/acls_prep/">ACLS Preparation</a>
              <a href="/classes/continuing_education/itls/">International Trauma Life Support (ITLS)</a>
              <a href="/classes/continuing_education/emt_r/">EMT Refresher</a>
              <a href="/classes/continuing_education/NREMT/">NREMT</a>
            </div>
          </div><!-- /link-column -->

          <div class="approved">
	          <h4 style="letter-spacing: 0.08em;">This school has been approved by the <a style="display: block;" href="http://www.bppe.ca.gov/about_us/contact.shtml">Bureau of Private and <span style="white-space: nowrap;">Postsecondary Education</span>.</a></h4>
          </div>

          <div class="disclaimer section">
	          <h5 style="margin: 1em auto 1em;">All prices and content subject to change.</h5>
          </div>

        </div>
      </div> <!-- /rightcontent2 -->

      <div class="clearfix"></div>

    </div> <!-- /main -->

    <div id="footer">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/menu/footer.php'); ?>
    </div> <!-- /footer -->

  </div> <!-- /page -->

</body>
</html>
