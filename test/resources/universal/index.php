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
    setSection( "materials", ["syllabus", "videos", "skillsheets"] );
    setSection( "career_services", ["resumes", "interviews", "jobsearch"] );
    setSection( "sidebar_cs", ["sidebar_cs_main", "sidebar_cs_sub"] );
    setSection( "resumes", [
      "resumeguidelines", "coverguidelines",
      "resume1", "resume2", "resume3", "resume4", "resume5", "resume6", "resume7", "resume8", "resume9", "resume10",
      "cover1", "cover2", "cover3", "cover4", "cover5", "cover6", "cover7", "cover8", "cover9", "cover10",
      "courseresume1", "courseresume2", "courseresume3", "courseresume4", "courseresume5",
      "courseresume6", "courseresume7", "courseresume8", "courseresume9", "courseresume10",
      "coursecover1", "coursecover2", "coursecover3", "coursecover4", "coursecover5",
      "coursecover6", "coursecover7", "coursecover8", "coursecover9", "coursecover10"
    ] );
    setSection( "interview", ["interviewguidelines", "interviewquestions"] );
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
          <div class="quicklinks2">

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
	      <a href="#" class="btn3 glow-yellow lines-1" onClick="showSubSection('career_services', 'resumes');">
		<div>Resumes</div>
		<div></div><div></div><div></div><div></div>
	      </a>

	      <a href="#" class="btn3 glow-yellow lines-2" onClick="showSubSection('career_services', 'interviews');">
		<div>Interview<br />Skills</div>
		<div></div><div></div><div></div><div></div>
	      </a>

	      <a href="#" class="btn3 glow-yellow lines-1" onClick="showSubSection('career_services', 'jobsearch');">
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
	</div>

	<div class="leftcontent2">

          <!-- show by default (because it doesn't have the "hidden" class -->
	  <div id="course_info">
            <h1><?= $course_title ?> Forms</h1>
	    <?php include_once("../$course/info.php") ?>
	  </div>

	  <div id="class_materials" class="hidden">
	    <h1><?= $course_title ?> Class Materials</h1>
	    <?php include_once("../$course/materials.php") ?>
	  </div>

	  <div id="career_services" class="hidden">
	    <h1><?= $course_title ?> Career Services</h1>

	    <div id="resumes">
	      <div class="column" style="width: 70%; float: left;">

		<div id="resumeguidelines">
                  <?php include_once("../universal/resume_guidelines.php") ?>
		</div>

                <div id="coverguidelines" class="hidden">
                  <?php include_once("../universal/cover_guidelines.php") ?>
		</div>

	        <div id="cover1" class="hidden">
                  <?php include("../universal/covers/referred.php") ?>
		</div>

	        <div id="cover2" class="hidden">
                  <?php include("../universal/covers/not_referred.php") ?>
		</div>
<?php
  $i = 1;
  foreach ($cover_files as $file) {
    if ($file == "." || $file == "..") continue;
?>
    <div id="coursecover<?= $i ?>" class="hidden">
    <?php include($cover_dir . $file); ?>
    </div>
<?php
    $i++;
  }
?>
	        <div id="resume1" class="hidden">
		  Show universal resume 1 here.
		</div>
	        <div id="resume2" class="hidden">
		  Show universal resume 2 here. Or maybe do a file include.
		</div>
<?php
  $i = 1;
  foreach ($resume_files as $file) {
    if ($file == "." || $file == "..") continue;
?>
    <div id="courseresume<?= $i ?>" class="hidden">
    <?php include($resume_dir . $file); ?>
    </div>
<?php
    $i++;
  }
?>
<?php
  /*
  $resume_dir = "../$course/resumes/";
  $resume_files = scandir($resume_dir);
  $i = 1;
  foreach ($resume_files as $file) {
    if ($file == "." || $file == "..") continue;
    $resume_list[] =
      "<li><span onClick=\"showSubSection('resumes', 'courseresume$i');\">" .
      "$course_abbr Resume $i</span></li>\n";
    $resume_divs[] = "<div id=\"courseresume$i\" class=\"hidden\">\n" .
      read_file() . "\n" .
      "</div>\n";
    $i++;
  }
   */
?>

	      </div>

	      <div class="column" style="width: 20%; margin: 0 1% 0 3%;">

                <h2><span class="underline pointer" onClick="showSubSection('resumes', 'resumeguidelines');">Resume Guidelines</span></h2>

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
	      </div>
	      <div class="column" style="width: 20%; margin: 0 1% 0 3%;">
                <h2><span class="underline pointer" onClick="showSubSection('interview', 'interviewguidelines');">Interview Guidelines</span></h2>
                <h2><span class="underline pointer" onClick="showSubSection('interview', 'interviewquestions');">Interview Question Examples</span></h2>
              </div>
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

	</div> <!-- /leftcontent -->

      </div> <!-- /section -->

      <div class="clearfix" style="min-height: 0.1em;"></div>

    </div> <!-- /main -->

    <div id="footer">
    </div> <!-- /footer -->

  </div> <!-- /page -->

</body>
</html>
