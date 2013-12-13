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

  $allowed_sections = array(
    'carsvcs', 'resumes', 'interviews', 'jobsearch', 'extcert', 'videos'
  );
  if (!array_key_exists('section', $query_args) ||
  !in_array($query_args['section'], $allowed_sections)) {
	  $section = 'carsvcs';
  }
  else {
    $section = $query_args['section'];
  }

  if (!isset($showjobsfrom))
    $showjobsfrom = '1 month';

  if (!isset($button_lines))
    $button_lines = 1;

  // each course's index.php sets the following variables:
  // $course_title - properly capitalized name of course
  // $course_abbr - abbreviation for course
  // $header_img - name of header file (without path)
  // $button_lines - number of lines of text for buttons containing $course in their text, either 1 or 2
  // $showjobsfrom - a description of how far back to look for job entries (passed to date_interval_create_from_date_string() )

  $cover_dir = "../$course/covers/";
  $resume_dir = "../$course/resumes/";

  $cover_files = array();
  $resume_files = array();

  if (is_dir($cover_dir))
    $cover_files = scandir($cover_dir);
  if (is_dir($resume_dir))
    $resume_files = scandir($resume_dir);

  require_once($root . '/php/dbconn.php');
  $handle = db_connect();
  require_once($root . '/php/joblist.php');
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
  <link type="text/css" rel="stylesheet" media="all" href="/css/video.css" />
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

  <script type="text/javascript" src="/js/joblist.js"></script>
  <script type="text/javascript" src="/js/frlib.js"></script>
  <script type="text/javascript" src="/js/vidchooser.js"></script>

  <style type="text/css">
    iframe {
      width: 100%;
      height: 100%;
      position: relative;
    }
    .hidden {
      display: none;
    }
    #interviewvideo {
      text-align: center;
    }
    #interviewvideo .video-title {
      color: white;
      text-decoration: none;
      letter-spacing: 0.03em;
      font-weight: bold;
      font-size: 1.5em;
      margin: 0.83em 0;
    }
    #interviewvideo .video-content {
      margin: 0 auto;
    }
    .paper {
      color: black;
      background-color: rgb(220, 220, 220);
      font-size: 110%;
      padding: 0.5em 2em;
      box-sizing: border-box;
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
    }
    .paper h2,
    .paper h4 {
      text-align: center;
    }
    .paper h3 {
      margin-bottom: 0;
    }
    .paper hr {
      border: solid 2px black;
    }
    .paper .right {
      float: right;
      text-align: right;
    }
    .companypages {
      color: #CCCCEE;
      border-color: #335588;
      margin: 2em auto;
      padding: 5px;
      width: 90%;
    }
    .companypages:hover,
    .announcement:hover {
      border-color: red;
      background-color: #000022;
    }
    .companypages div {
      min-height: 1.5em;
      line-height: 1.5em;
    }
    .companypages h5 {
      margin: 0;
      letter-spacing: 0.1em;
    }
    .companypages:hover h5 {
      color: #FFFF99;
    }
    .companypages div a {
      color: #CCCCEE;
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
      <img src='/images/headers/<?= $header_img ?>' class='headerimgright' alt='' />
      <div class="clearfix"></div>
    </div>

    <div id="main">

      <div class="section" style="position: relative;">

	<div class="rightsidebar2">
          <div class="quicklinks2">


      <div id="sidebar_btn_carsvcs" class="basic-button glow-yellow innerglow-lightblue" data-section="sidebar-buttons">
        <a href="#"><div>CAREER SERVICES</div></a>
      </div>

      <div id="sidebar_btn_resumes" class="basic-button glow-lightblue innerglow-lightblue" data-section="sidebar-buttons">
        <a href="#"><div>RESUMES</div></a>
      </div>

      <div id="sidebar_btn_interviews" class="basic-button glow-lightblue innerglow-lightblue" data-section="sidebar-buttons">
        <a href="#"><div>INTERVIEW SKILLS</div></a>
      </div>

      <div id="sidebar_btn_jobsearch" class="basic-button glow-lightblue innerglow-lightblue" data-section="sidebar-buttons">
        <a href="#"><div>JOB SEARCH</div></a>
      </div>

      <?php if (file_exists("../$course/externship_certification.php")): ?>
      <div id="sidebar_btn_extcert" class="basic-button glow-lightblue innerglow-lightblue" data-section="sidebar-buttons">
        <a href="#"><div>EXTERNSHIP &amp; CERTIFICATION</div></a>
      </div>
      <?php endif; ?>

      <?php if (file_exists("../$course/videos.php")): ?>
      <div id="sidebar_btn_videos" class="basic-button glow-lightblue innerglow-lightblue" data-section="sidebar-buttons">
        <a href="#"><div>VIDEOS</div></a>
      </div>
      <?php endif; ?>


          </div>
	</div>

	<div class="leftcontent2" style="position: relative;">

    <!-- show by default (because it doesn't have the "hidden" class -->
	  <div id="carsvcs" data-section="main">
	    <h1><?= $course_title ?> Career Services</h1>
	    <?php include_once("../universal/job_seeking_skills.php") ?>
	  </div>

	  <div id="resumes" data-section="main" class="hidden">

	    <div class="smallnavbar" style="margin-bottom: 2em;">
	      <div id="resumenav_resumeguidelines" data-section="resume-nav" class="column col6 underline pointer highlight">
		Resume<br />Guidelines
	      </div>
	      <div id="resumenav_resumekeywords" data-section="resume-nav" class="column col6 underline pointer">
		Resume<br />Keywords
	      </div>
	      <div id="resumenav_resumesample" data-section="resume-nav" class="column col6 underline pointer">
		Sample<br />Resume
	      </div>
	      <div id="resumenav_coverguidelines" data-section="resume-nav" class="column col6 underline pointer">
		Cover Letter<br />Guidelines
	      </div>
	      <div id="resumenav_coversampleref" data-section="resume-nav" class="column col6 underline pointer">
		Sample Cover -<br />Referred
	      </div>
	      <div id="resumenav_coversamplenoref" data-section="resume-nav" class="column col6 underline pointer">
		Sample Cover -<br />Not Referred
	      </div>
	    </div>

	    <div id="resumeguidelines" data-section="resumes">
	      <?php include_once("../universal/resume_guidelines.php") ?>
	    </div>

	    <div id="resumekeywords" data-section="resumes" class="hidden">
	      <?php include_once("../universal/resume_keywords.php") ?>
	    </div>

	    <div id="coverguidelines" data-section="resumes" class="hidden">
	      <?php include_once("../universal/cover_guidelines.php") ?>
	    </div>

	    <div id="coversampleref" data-section="resumes" class="hidden">
	      <?php include("../universal/covers/referred.php") ?>
	    </div>

	    <div id="coversamplenoref" data-section="resumes" class="hidden">
	      <?php include("../universal/covers/not_referred.php") ?>
	    </div>

	    <div id="resumesample" data-section="resumes" class="hidden">
	      <?php include($resume_dir . 'resume1.php'); ?>
	    </div>
              
	  </div>

	  <div id="interviews" data-section="main" class="hidden">

	    <div class="smallnavbar" style="margin-bottom: 2em;">
	      <div id="interviewnav_interviewguidelines" data-section="interview-nav" class="column col4 underline pointer highlight">
		Interview<br />Guidelines
	      </div>
	      <div id="interviewnav_interviewquestions" data-section="interview-nav" class="column col4 underline pointer">
		Sample Interview<br />Questions
	      </div>
	      <div id="interviewnav_interviewvideo" data-section="interview-nav" class="column col4 underline pointer" onClick="insertVideo('interviewvideo', 'Sample Interview', false, '600', '400');">
		Sample Interview<br />Video
	      </div>
	      <div id="interviewnav_interviewthankyou" data-section="interview-nav" class="column col4 underline pointer">
		Sample Thank You<br />Letter
	      </div>
	    </div>

	    <div id="interviewguidelines" data-section="interviews">
	      <?php include_once("../universal/interview_guidelines.php"); ?>
	    </div>
	    <div id="interviewquestions" data-section="interviews" class="hidden">
	      <?php include_once("../$course/interview_questions.php"); ?>
	    </div>
	    <div id="interviewthankyou" data-section="interviews" class="hidden">
	      <?php include_once("../universal/interview_thankyou.php"); ?>
	    </div>
	    <div id="interviewvideo" data-section="interviews" class="hidden">
	    </div>

	  </div>

	  <div id="jobsearch" data-section="main" class="hidden">
            
	    <div style="float: left; width: 100%;">
	      <div style="float: right; width: 22%;">
		<a href="/resources/current_employment.php">
		  <div class="announcement red" style="text-align: center;">
		    <div class="yellow">Help us improve Career Services</div>
		    <div>Let us know when you're hired!</div>
		  </div>
		</a>
	      </div>

	      <h2 style="margin-left: 22%; text-align: center;">Job Search</h2>
	      <h4 style="margin-left: 22%; text-align: center;">Click an entry to expand</h4>
	    </div>

<?php
  $all_companies = query_companies_web_by_course($handle, $course_abbr);
  $current = 0;
  // keeping it at an even number so that when you click the middle of
  // the box, your cursor won't then be directly on a company name
  $per_line = 4;
  foreach ($all_companies as $c) {
    $weblink = formatweblink($c);
    $current++;
    $company_ids[] = "'company" . $current . "'";
    $company_weblinks[] =
      "<div id=\"company{$current}\" class=\"column col{$per_line} hidden\">\n" .
      "  $weblink\n" .
      "</div>\n"
    ;
  }
  // round out the line
  while ($current % $per_line != 0) {
    $current++;
    $company_ids[] = "'company" . $current . "'";
    $company_weblinks[] =
      "<div id=\"company{$current}\" class=\"column col{$per_line} hidden\">\n" .
      "</div>\n"
    ;
  }
?>
	    <div class="companypages borderbox radius1em pointer textcenter" style="clear: left;"
	      onClick="toggleClassArr(['companytitle', <?= implode($company_ids, ', '); ?>], 'hidden');"
	    >
	    <h5 id="companytitle"><?= $course_title ?> Employers list</h5>

              <?= implode($company_weblinks, "\n"); ?>
	    </div>

	    <?php
	      $joblist_tmp = joblist($handle, array(
		'daterange' => $showjobsfrom, 'course' => $course
	      ) );
	      if (strlen($joblist_tmp))
		echo $joblist_tmp;
	      else
		echo "<h3 class=\"textcenter\">No entries found.</h3>\n";
	    ?>
	  </div>

	  <?php if (file_exists("../$course/externship_certification.php")): ?>
	    <div id="extcert" data-section="main" class="hidden">
	      <?php include_once("../$course/externship_certification.php") ?>
	    </div>
	  <?php endif; ?>

	  <?php if (file_exists("../$course/videos.php")): ?>
	    <div id="videos" data-section="main" class="hidden" style="position: relative;">
	      <?php include_once("../$course/videos.php") ?>
	    </div>
	  <?php endif; ?>

	  </div>

	</div> <!-- /leftcontent -->
	<div class="clearfix"></div>

      </div> <!-- /section -->

      <div class="clearfix"></div>

    </div> <!-- /main -->

    <div id="footer">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/menu/footer.php'); ?>
    </div> <!-- /footer -->

  </div> <!-- /page -->

  <script type="text/javascript">
  window.jQuery || document.write(
    '<script src="/js/jquery-1.10.2.min.js"><\/script>'
  );
  </script>

  <script type="text/javascript">
  function setClassOneElementFromSection(id, turnon, turnoff) {
    var section = $('#'+id).attr('data-section');

    // first set the whole section to the opposite
    $('[data-section="' + section + '"]')
      .removeClass(turnon).addClass(turnoff);

    // on one element, remove one set of classes and add the other
    $('#'+id).removeClass(turnoff).addClass(turnon);
  }
  $(document).ready(function() {
    $('[data-section="sidebar-buttons"]').click(function(event) {
      var tgt_id = this.id.slice(12); // remove "sidebar_btn_"
      setClassOneElementFromSection(tgt_id, '', 'hidden');
      setClassOneElementFromSection(this.id, 'glow-yellow', 'glow-lightblue');
      event.preventDefault();
    });
    $('[data-section="resume-nav"]').click(function(event) {
      var tgt_id = this.id.slice(10); // remove "resumenav_"
      setClassOneElementFromSection(tgt_id, '', 'hidden');
      setClassOneElementFromSection(this.id, 'highlight', '');
      event.preventDefault();
    });
    $('[data-section="interview-nav"]').click(function(event) {
      var tgt_id = this.id.slice(13); // remove "interviewnav_"
      setClassOneElementFromSection(tgt_id, '', 'hidden');
      setClassOneElementFromSection(this.id, 'highlight', '');
      event.preventDefault();
    });

    setClassOneElementFromSection('<?= $section ?>', '', 'hidden');
    setClassOneElementFromSection(
      'sidebar_btn_<?= $section ?>', 'glow-yellow', 'glow-lightblue'
    );
  });
  </script>

</body>
</html>
