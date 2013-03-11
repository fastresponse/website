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

  if (!$button_lines)
    $button_lines = 1;

  // each course's index.php sets the following variables:
  // $course_title - properly capitalized name of course
  // $course_abbr - abbreviation for course
  // $header_img - name of header file (without path)
  // $button_lines - number of lines of text for buttons containing $course in their text, either 1 or 2

  $cover_dir = "../$course/covers/";
  $resume_dir = "../$course/resumes/";

  $cover_files = array();
  $resume_files = array();

  if (is_dir($cover_dir))
    $cover_files = scandir($cover_dir);
  if (is_dir($resume_dir))
    $resume_files = scandir($resume_dir);
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
  <script type="text/javascript" src="/js/vidchooser.js"></script>

  <script type="text/javascript">
    // this "main" does not refer to an element ID, it's just a group name
    setSection( "main", [
      "carsvcs", "resumes", "interviews",
      "jobsearch", "extcert", "videos"
    ] );
    setSection( "sidebar_buttons", [
      "sidebar_btn_carsvcs", "sidebar_btn_resumes", "sidebar_btn_interviews",
      "sidebar_btn_jobsearch", "sidebar_btn_extcert", "sidebar_btn_videos"
    ] );

    setSection( "resumes", [
      "resumeguidelines", "coverguidelines", "resumekeywords",
      "resume1", "resume2", "resume3", "resume4", "resume5",
      "resume6", "resume7", "resume8", "resume9", "resume10",
      "cover1", "cover2", "cover3", "cover4", "cover5",
      "cover6", "cover7", "cover8", "cover9", "cover10",
      "courseresume1", "courseresume2", "courseresume3", "courseresume4", "courseresume5",
      "courseresume6", "courseresume7", "courseresume8", "courseresume9", "courseresume10",
      "coursecover1", "coursecover2", "coursecover3", "coursecover4", "coursecover5",
      "coursecover6", "coursecover7", "coursecover8", "coursecover9", "coursecover10"
    ] );
    setSection( "interview", ["interviewguidelines", "interviewquestions", "interviewthankyou"] );
  </script>

  <style type="text/css">
    #cs_general h4 {
      margin-bottom: 0;
      text-decoration: underline;
    }
    #cs_general ul {
      margin: 0;
      padding-left: 20px;
      list-style-type: none;
    }
    #cs_general ul ul {
      list-style-type: disc;
    }
    iframe {
      width: 100%;
      height: 100%;
      position: relative;
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
  </style>

</head>

<body onLoad="showSubSection('main', '<?= $section ?>'); classOnSubSection('sidebar_buttons', 'sidebar_btn_<?= $section ?>', 'glow-yellow');">

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

      <div class="section" style="position: relative;">

	<div class="rightsidebar2">
          <div class="quicklinks2">

	    <a href="#" id="sidebar_btn_carsvcs" class="btn3 lines-2 glow-yellow" onClick="showSubSection('main', 'carsvcs'); classOnSubSection('sidebar_buttons', this.id, 'glow-yellow');">
	      <div>CAREER<br />SERVICES</div>
	      <div></div><div></div><div></div><div></div>
	    </a>

	    <a href="#" id="sidebar_btn_resumes" class="btn3 lines-1" onClick="showSubSection('main', 'resumes'); classOnSubSection('sidebar_buttons', this.id, 'glow-yellow');">
	      <div>RESUMES</div>
	      <div></div><div></div><div></div><div></div>
	    </a>

	    <a href="#" id="sidebar_btn_interviews" class="btn3 lines-2" onClick="showSubSection('main', 'interviews'); classOnSubSection('sidebar_buttons', this.id, 'glow-yellow');">
	      <div>INTERVIEW<br />SKILLS</div>
	      <div></div><div></div><div></div><div></div>
	    </a>

	    <a href="#" id="sidebar_btn_jobsearch" class="btn3 lines-1" onClick="showSubSection('main', 'jobsearch'); classOnSubSection('sidebar_buttons', this.id, 'glow-yellow');">
	      <div>JOB SEARCH</div>
	      <div></div><div></div><div></div><div></div>
	    </a>

	    <a href="#" id="sidebar_btn_extcert" class="btn3 lines-2" onClick="showSubSection('main', 'extcert'); classOnSubSection('sidebar_buttons', this.id, 'glow-yellow');">
	      <div>EXTERNSHIP &amp;<br />CERTIFICATION</div>
	      <div></div><div></div><div></div><div></div>
	    </a>

            <?php if (file_exists("../$course/videos.php")): ?>
	      <a href="#" id="sidebar_btn_videos" class="btn3 lines-2" onClick="showSubSection('main', 'videos'); classOnSubSection('sidebar_buttons', this.id, 'glow-yellow');">
		<div>SKILLS<br />VIDEOS</div>
		<div></div><div></div><div></div><div></div>
	      </a>
            <?php endif; ?>

          </div>
	</div>

	<div class="leftcontent2" style="position: relative;">

          <!-- show by default (because it doesn't have the "hidden" class -->
	  <div id="carsvcs">
	    <h1><?= $course_title ?> Career Services</h1>
	    <?php include_once("../universal/job_seeking_skills.php") ?>
	    <!--
	    <div class="column borderbox" style="width: 47%; margin-right: 0; padding-right: 6%;">
	      <?php //include_once("../universal/job_seeking_skills.php") ?>
	    </div>
	    <div class="column borderbox" style="width: 47%; margin-left: 0; padding-left: 6%; border-left: dotted 1px rgba(150,150,150,0.5); margin-bottom: 1em;">
	      <?php //include_once("../universal/job_search_sites.php") ?>
	    </div>
	    -->
	  </div>

	  <div id="resumes" class="hidden">
	    <div class="column" style="width: 70%; float: left;">

	      <div id="resumeguidelines">
		<?php include_once("../universal/resume_guidelines.php") ?>
	      </div>

	      <div id="resumekeywords" class="hidden">
		<?php include_once("../universal/resume_keywords.php") ?>
	      </div>

	      <div id="coverguidelines" class="hidden">
		<?php include_once("../universal/cover_guidelines.php") ?>
	      </div>

	      <div id="cover1" class="hidden paper">
		<?php include("../universal/covers/referred.php") ?>
	      </div>

	      <div id="cover2" class="hidden paper">
		<?php include("../universal/covers/not_referred.php") ?>
	      </div>
<?php
  $i = 1;
  foreach ($cover_files as $file) {
    if ($file == "." || $file == "..") continue;
?>
    <div id="coursecover<?= $i ?>" class="hidden paper">
    <?php include($cover_dir . $file); ?>
    </div>
<?php
    $i++;
  }
?>
	      <div id="resume1" class="hidden paper">
		Show universal resume 1 here.
	      </div>
	      <div id="resume2" class="hidden paper">
		Show universal resume 2 here. Or maybe do a file include.
	      </div>
<?php
  $i = 1;
  foreach ($resume_files as $file) {
    if ($file == "." || $file == "..") continue;
?>
    <div id="courseresume<?= $i ?>" class="hidden paper">
    <?php include($resume_dir . $file); ?>
    </div>
<?php
    $i++;
  }
?>
	    </div>

	    <div class="column" style="width: 20%; margin: 0 1% 0 3%;">

	      <h2><span class="underline pointer" onClick="showSubSection('resumes', 'resumeguidelines');">Resume Guidelines</span></h2>

	      <h2><span class="underline pointer" onClick="showSubSection('resumes', 'resumekeywords');">Resume Keywords</span></h2>

	      <h2>Resume Examples</h2>
	      <ul class="underline pointer">
		<li><span onClick="showSubSection('resumes', 'resume1');">Resume 1</span></li>
		<li><span onClick="showSubSection('resumes', 'resume2');">Resume 2</span></li>
<?php
  $i = 1;
  foreach ($resume_files as $file) {
    if ($file == "." || $file == "..") continue;
?>
    <li><span onClick="showSubSection('resumes', 'courseresume<?= $i ?>');"><?= $course_abbr ?> Resume <?= $i ?></span></li>
<?php
    $i++;
  }
?>
	      </ul>

	      <div style="min-height: 1em;"></div>

	      <h2><span class="underline pointer" onClick="showSubSection('resumes', 'coverguidelines');">Cover Letter Guidelines</span></h2>

	      <h2>Cover Letter Examples</h2>
	      <ul class="underline pointer">
		<li><span onClick="showSubSection('resumes', 'cover1');">Cover Letter (referred)</span></li>
		<li><span onClick="showSubSection('resumes', 'cover2');">Cover Letter (not referred)</span></li>
<?php
  $i = 1;
  foreach ($cover_files as $file) {
    if ($file == "." || $file == "..") continue;
?>
    <li><span onClick="showSubSection('resumes', 'coursecover<?= $i ?>');"><?= $course_abbr ?> Cover Letter <?= $i ?></span></li>
<?php
    $i++;
  }
?>
	      </ul>

	    </div>

	  </div>

	  <div id="interviews" class="hidden">
	    <div class="column" style="width: 70%; float: left;">
	      <div id="interviewguidelines">
		<?php include_once("../universal/interview_guidelines.php"); ?>
	      </div>
	      <div id="interviewquestions" class="hidden">
		<?php include_once("../$course/interview_questions.php"); ?>
	      </div>
	      <div id="interviewthankyou" class="hidden paper">
		<?php include_once("../universal/interview_thankyou.php"); ?>
	      </div>
	    </div>
	    <div class="column" style="width: 20%; margin: 0 1% 0 3%;">
	      <h2><span class="underline pointer" onClick="showSubSection('interview', 'interviewguidelines');">Interview Guidelines</span></h2>
	      <h2><span class="underline pointer" onClick="showSubSection('interview', 'interviewquestions');">Interview Question Examples</span></h2>
	      <h2><span class="underline pointer" onClick="showSubSection('interview', 'interviewthankyou');">Thank You Letter Example</span></h2>
	    </div>
	  </div>

	  <div id="jobsearch" class="hidden">
	    <h2>Job Search</h2>

	    <div class="column col4">Health</div>
	    <div class="column col4">Careers</div>
	    <div class="column col4">Webpage</div>
	    <div class="column col4">Listings</div>

	    <?php
	      require_once($root . '/php/dbconn.php');
	      $handle = db_connect();
	      require_once($root . '/php/joblist.php');
	      echo joblist($handle, 'Any', $course);
	    ?>
	  </div>

	  <div id="extcert" class="hidden">
            <h1>Externship and Certification</h1>
	    <?php include_once("../$course/externship_certification.php") ?>
	  </div>

	  <?php if (file_exists("../$course/videos.php")): ?>
	    <div id="videos" class="hidden" style="position: relative;">
	      <h1><?= $course_title ?> Videos</h1>
	      <?php include_once("../$course/videos.php") ?>
	    </div>
	  <?php endif; ?>

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
