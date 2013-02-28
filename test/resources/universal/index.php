<?php
  $self = $_SERVER['PHP_SELF'];
  $root = $_SERVER['DOCUMENT_ROOT'];
  $dir = dirname($self);

  // this is the name of the immediate parent dir
  // example: "/blah/place/file.php" -> $course = "place"
  // NOTE: should use DIRECTORY_SEPARATOR instead of a literal '/'
  // but this failed to work when running apache on windows
  $course = trim(strrchr($dir, '/'), '/');

  $query_args = array();
  parse_str($_SERVER['QUERY_STRING'], $query_args);

  if (!$button_lines)
    $button_lines = 1;

  // each course's index.php sets the following variables:
  // $course_title - properly capitalized name of course
  // $header_img - name of header file (without path)
  // $button_lines - number of lines of text for buttons containing $course in their text, either 1 or 2
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">

<head>

  <title><?= $course_title ?> Resources | Fast Response</title>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="robots" content="INDEX, FOLLOW">
  <meta name="googlebot" content="INDEX, FOLLOW">

  <link type="image/x-icon" rel="shortcut icon" href="/misc/favicon.ico" />

  <link type="text/css" rel="stylesheet" media="all" href="/css/template.css" />
  <link type="text/css" rel="stylesheet" media="all" href="/css/buttons.css" />
  <link type="text/css" rel="stylesheet" media="all" href="/css/nicemenus.css" />
  <link type="text/css" rel="stylesheet" media="all" href="/css/careers.css" />
  <link type="text/css" rel="stylesheet" media="print" href="/sites/all/themes/fastresponse/css/print.css" /> 
  <!--[if lte IE 6]><style type="text/css" media="all">@import "/sites/all/themes/fastresponse/css/ie6.css";</style><![endif]-->
  <!--[if IE 7]><style type="text/css" media="all">@import "/sites/all/themes/fastresponse/css/ie7.css";</style><![endif]-->
  <!--[if lte IE 8]><link type="text/css" rel="stylesheet" media="all" href="/css/buttons-ie.css" /><![endif]-->


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

  <script type="text/javascript" src="/js/joblist.js"></script>
  <script type="text/javascript" src="/js/frlib.js"></script>
  <script type="text/javascript">
    // this "main" does not refer to an element ID, it's just a group name
    setSection( "main", ["course_info", "career_services", "class_materials"] );
    setSection( "career_services", ["resumes", "interviews", "jobsearch"] );
    setSection( "sidebar", ["sidebar_all", "sidebar_career_services"] );
    setSection( "sidebar_cs", ["sidebar_cs_main", "sidebar_cs_sub"] );
  </script>

</head>

<body>

  <div id="page">

    <div id="menu">
      <!-- filled in by javascript -->
    </div>

    <div id="head">
      <img src="/images/headers/header_main_left.png" class="headerimgleft" alt="Fast Response School of Health Care Education" />
      <img src='/images/headers/<?= $header_img ?>' class='headerimgright' alt='' />
      <div class="clearfix"></div>
    </div>

    <div id="main">

      <div class="section">

	<div class="rightsidebar2">
          <div class="quicklinks2" id="sidebar_all">

	    <a href="#" class="btn3 lines-<?= $button_lines ?>" onClick="showSubSection('main', 'course_info'); showSubSection('sidebar_cs', 'sidebar_cs_main');">
	      <div><?= $course ?> Forms</div>
	      <div></div><div></div><div></div><div></div>
	    </a>

	    <a href="#" class="btn3 lines-2" onClick="showSubSection('main', 'class_materials'); showSubSection('sidebar_cs', 'sidebar_cs_main');">
	      <div>Class<br />Materials</div>
	      <div></div><div></div><div></div><div></div>
	    </a>

	    <a href="#" class="btn3 lines-2" id="sidebar_cs_main" onClick="showSubSection('main', 'career_services'); showSubSection('sidebar_cs', 'sidebar_cs_sub');">
	      <div>Career<br />Services</div>
	      <div></div><div></div><div></div><div></div>
	    </a>

            <div class="hidden" id="sidebar_cs_sub">
	      <a href="#" class="btn3 lines-1" onClick="showSubSection('career_services', 'resumes');">
		<div>Resumes</div>
		<div></div><div></div><div></div><div></div>
	      </a>

	      <a href="#" class="btn3 lines-2" onClick="showSubSection('career_services', 'interviews');">
		<div>Interview<br />Skills</div>
		<div></div><div></div><div></div><div></div>
	      </a>

	      <a href="#" class="btn3 lines-1" onClick="showSubSection('career_services', 'jobsearch');">
		<div>Job Search</div>
		<div></div><div></div><div></div><div></div>
	      </a>
            </div>

	    <a href="../../school/info" class="btn2 lines-1">
	      <div>Contact Us</div>
	      <div></div><div></div><div></div><div></div>
              <img src="/images/buttons/envelope-icon.png" alt="" />
	    </a>

          </div>

	  <div class="quicklinks2 hidden" id="sidebar_career_services">

	    <a href="#" class="btn3 lines-2" onClick="showSubSection('sidebar', 'sidebar_all'); showSubSection('main', 'course_info');">
	      <div>Return to<br />Course Info</div>
	      <div></div><div></div><div></div><div></div>
	    </a>

	    <a href="#" class="btn3 lines-1" onClick="showSubSection('career_services', 'resumes');">
	      <div>Resumes</div>
	      <div></div><div></div><div></div><div></div>
	    </a>

	    <a href="#" class="btn3 lines-2" onClick="showSubSection('career_services', 'interviews');">
	      <div>Interview<br />Skills</div>
	      <div></div><div></div><div></div><div></div>
	    </a>

	    <a href="#" class="btn3 lines-1" onClick="showSubSection('career_services', 'jobsearch');">
	      <div>Job Search</div>
	      <div></div><div></div><div></div><div></div>
	    </a>

	  </div>
	</div>

	<div class="leftcontent2">

          <!-- show by default (because it doesn't have the "hidden" class -->
	  <div id="course_info">
            <h1><?= $course_title ?> Forms</h1>
	    <?php include_once("../$course/info.php") ?>
	  </div>

	<div id="career_services" class="hidden">
	    <h1><?= $course_title ?> Career Services</h1>

	    <div id="resumes">
	      <h2>Resumes</h2>
	      <h3>General resumes:</h3>
	      <ul>
		<li onClick="">General Resume 1</li>
	      </ul>
	      <?php include_once("../$course/resumes.php") ?>
	    </div>

	    <div id="interviews" class="hidden">
	      <h2>Interview Guidelines</h2>
	      <h3>Before the Interview:</h3>
	      <ul>
		<li>Prepare by learning as much as you can about the organization via their website.</li>
		<li>Practice writing and verbalizing your answers to questions related to the job opening.</li>
		<li>Prepare to answer behavioral interview questions. Give specific examples of when you demonstrated particular behaviors or skills. The STAR answer technique includes stating the: Situation or Task, Action you took, and Results you achieved.</li>
		<li>Know the date, time, address, directions, and name of the interviewer. Plan to arrive 15 -30 minutes early in case of unexpected delays.</li>
	      </ul>

	      <h3>During the Interview:</h3>
	      <ul>
		<li>Offer to shake hands at the beginning and end of the interview.  Do not sit until the interviewer offers you a chair or seats himself first.</li>
		<li>Dress professionally for the interview. Conservative clothing like dark pants, a solid colored pressed shirt, and close - toe shoes, is a good choice for the health care field. Pay careful attention to grooming details including nails and hair. Jewelry should be very minimal and small.</li>
		<li>Pay careful attention to the interviewer's questions. If clarification is needed, state what you think the interviewer asked or ask for more information before responding.</li>
		<li>Show enthusiasm, sincerity, tact and courtesy. Address the interviewer as Mr. Smith, Ms. Lopez, or Dr. Khan, unless they tell you otherwise.</li>
		<li>Salary and benefits should be left to the interviewer to bring up. Generally, the interviewer will not want to discuss salary until she has formed a favorable impression of the interviewee. It is helpful to find out what the position pays when you are researching the organization prior to your interview.</li>
		<li>Bring a pen and pocket notebook to write information down that may be given to you and to make notes to yourself after the interview, <span style="white-space: nowrap;">self-improvement and follow-up.</span></li>
	      </ul>

	      <h3>After the Interview:</h3>
	      <ul>
		<li>Send a thank you email or letter to the interviewer(s) within 24 hours.</li>
		<li>It is a good idea to obtain business cards of the interviews, before leaving the interview.</li>
	      </ul>
	    </div>

	    <div id="jobsearch" class="hidden">
	      <h2>Job Search</h2>
	      <?php
		require_once($root . '/php/dbconn.php');
		$handle = db_connect();
		require_once($root . '/php/joblist.php');
		echo joblist($handle, 'Any', $course);
	      ?>
	    </div>

	  </div>

	  <div id="class_materials" class="hidden">
	    <h1><?= $course_title ?> Class Materials</h1>
	    <?php include_once("../$course/materials.php") ?>
	  </div>

	</div> <!-- /leftcontent -->

      </div> <!-- /section -->

      <div class="clearfix" style="min-height: 0.1em;"></div>

    </div> <!-- /main -->

    <div id="footer">
    </div> <!-- /footer -->

  </div> <!-- /page -->

</body>
</html>
