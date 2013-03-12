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
      "cover1", "cover2",
      "courseresume",
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
    .companypages {
      color: #CCCCEE;
      border-color: #335588;
      margin: 2em auto;
      padding: 5px;
      width: 90%;
    }
    .companypages:hover {
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

<body onLoad="showSubSection('main', '<?= $section ?>'); classOnSubSection('sidebar_buttons', 'sidebar_btn_<?= $section ?>', 'glow-yellow');">

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
	      <a href="#" id="sidebar_btn_videos" class="btn3 lines-1" onClick="showSubSection('main', 'videos'); classOnSubSection('sidebar_buttons', this.id, 'glow-yellow');">
		<div>SKILLS VIDEOS</div>
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

	    <div class="smallnavbar" style="margin-bottom: 2em;">
	      <div class="column col6 underline pointer" onClick="showSubSection('resumes', 'resumeguidelines');">
		Resume<br />Guidelines
	      </div>
	      <div class="column col6 underline pointer" onClick="showSubSection('resumes', 'resumekeywords');">
		Resume<br />Keywords
	      </div>
	      <div class="column col6 underline pointer" onClick="showSubSection('resumes', 'courseresume');">
		Sample<br />Resume
	      </div>
	      <div class="column col6 underline pointer" onClick="showSubSection('resumes', 'coverguidelines');">
		Cover Letter<br />Guidelines
	      </div>
	      <div class="column col6 underline pointer" onClick="showSubSection('resumes', 'cover1');">
		Sample Cover -<br />Referred
	      </div>
	      <div class="column col6 underline pointer" onClick="showSubSection('resumes', 'cover2');">
		Sample Cover -<br />Not Referred
	      </div>
	    </div>

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

	    <div id="courseresume" class="hidden paper">
	    <?php include($resume_dir . 'resume1.php'); ?>
	    </div>
              
<?php
  // disabling this because there are no course specific cover letters
  if (0) {
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
  }
?>

<?php
  // disabling this because there is only one course specific resume
  if (0) {
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
  }
?>

<?php
  if (0) {
  $i = 1;
  foreach ($resume_files as $file) {
    if ($file == "." || $file == "..") continue;
?>
    <li><span onClick="showSubSection('resumes', 'courseresume<?= $i ?>');"><?= $course_abbr ?> Resume <?= $i ?></span></li>
<?php
    $i++;
  }
  }
?>

<?php
  if (0) {
  $i = 1;
  foreach ($cover_files as $file) {
    if ($file == "." || $file == "..") continue;
?>
    <li><span onClick="showSubSection('resumes', 'coursecover<?= $i ?>');"><?= $course_abbr ?> Cover Letter <?= $i ?></span></li>
<?php
    $i++;
  }
  }
?>
	  </div>

	  <div id="interviews" class="hidden">

	    <div class="smallnavbar" style="margin-bottom: 2em;">
	      <div class="column col3 underline pointer" onClick="showSubSection('interview', 'interviewguidelines');">
		Interview<br />Guidelines
	      </div>
	      <div class="column col3 underline pointer" onClick="showSubSection('interview', 'interviewquestions');">
		Sample Interview<br />Questions
	      </div>
	      <div class="column col3 underline pointer" onClick="showSubSection('interview', 'interviewthankyou');">
		Sample Thank You<br />Letters
	      </div>
	    </div>

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

	  <div id="jobsearch" class="hidden">
	    <h2 class="textcenter">Job Search</h2>
	    <h4 class="textcenter">Click an entry to expand</h4>

<?php
  $all_companies = query_companies_name_web($handle);
  $current = 0;
  if ((count($all_companies) % 5) == 0)
    $per_line = 5;
  elseif ((count($all_companies) % 3) == 0)
    $per_line = 3;
  elseif ((count($all_companies) % 6) == 0)
    $per_line = 6;
  else
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
	    <div class="companypages borderbox radius1em pointer textcenter"
	      onClick="toggleClassArr(['companytitle', <?= implode($company_ids, ', '); ?>], 'hidden');"
	    >
	      <h5 id="companytitle">EMS Employers list</h5>

              <?= implode($company_weblinks, "\n"); ?>

	      <!--
	      <div id="company1" class="column col4 hidden">
	        <a href="#">Kaiser Permanente</a>
	      </div>
	      <div id="company2" class="column col4 hidden">
	        <a href="#">Company 2</a>
	      </div>
	      <div id="company3" class="column col4 hidden">
	        <a href="#">Company 3</a>
	      </div>
	      <div id="company4" class="column col4 hidden">
	        <a href="#">Company 4</a>
	      </div>
	      <div id="company5" class="column col4 hidden">
	        <a href="#">Company 5</a>
	      </div>
	      <div id="company6" class="column col4 hidden">
	        <a href="#">Company 6</a>
	      </div>
	      <div id="company7" class="column col4 hidden">
	        <a href="#">Company 7</a>
	      </div>
	      <div id="company8" class="column col4 hidden">
	        <a href="#">Company 8</a>
	      </div>
	      <div id="company9" class="column col4 hidden">
	        <a href="#">Company 9</a>
	      </div>
	      <div id="company10" class="column col4 hidden">
	        <a href="#">Company 10</a>
	      </div>
	      <div id="company11" class="column col4 hidden">
	        <a href="#">Company 11</a>
	      </div>
	      <div id="company12" class="column col4 hidden">
	        <a href="#">Company 12</a>
	      </div>
	      -->
	    </div>

	    <?php
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
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/menu/footer.php'); ?>
    </div> <!-- /footer -->

  </div> <!-- /page -->

</body>
</html>
