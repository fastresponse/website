<?php
  $self = $_SERVER['PHP_SELF'];
  $dir = dirname($self);

  // this is the name of the immediate parent dir
  // example: "/blah/place/file.php" -> $course = "place"
  // NOTE: should use DIRECTORY_SEPARATOR instead of a literal '/'
  // but this failed to work when running apache on windows
  $course = trim(strrchr($dir, '/'), '/');

  $query_args = array();
  parse_str($_SERVER['QUERY_STRING'], $query_args);

  // each course's index.php sets the following variables:
  // $course_title - properly capitalized name of course
  // $header_img - name of header file (without path)
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">

<head>

<?php echo "<title>$course_title Resources | Fast Response</title>\n" ?>

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
    setSection( "main", ["course_info", "career_services", "class_materials"] );
    setSection( "career_services", ["resumes", "interviews", "jobsearch"] );
  </script>

</head>

<body>

  <div id="page">

    <div id="menu">
      <!-- filled in by javascript -->
    </div>

    <div id="head">
      <img src="/images/headers/header_main_left.png" class="headerimgleft" alt="Fast Response School of Health Care Education" />
      <?php echo "<img src='/images/headers/$header_img' class='headerimgright' alt='' />\n" ?>
      <div class="clearfix"></div>
    </div>

    <div id="main">

      <div class="section">

	<div class="rightsidebar2">
          <div class="quicklinks2">

	    <a href="#" class="btn2 buttontext" onClick="showSubSection('main', 'course_info');">
	      <div></div><div></div><div></div><div></div>
	      <?php echo "<div>$course_title Forms</div>\n" ?>
	      <img src="/images/buttons/testenvelope.png" alt="" />
	    </a>

	    <a href="#" class="btn2 buttontext" onClick="showSubSection('main', 'career_services');">
	      <div></div><div></div><div></div><div></div>
	      <div>Career Services</div>
	      <img src="/images/buttons/testenvelope.png" alt="" />
	    </a>

	    <a href="#" class="btn2 buttontext" onClick="showSubSection('main', 'class_materials');">
	      <div></div><div></div><div></div><div></div>
	      <div>Class Materials</div>
	      <img src="/images/buttons/testenvelope.png" alt="" />
	    </a>

	    <a href="../../school/info" class="btn2 buttontext">
	      <div></div><div></div><div></div><div></div>
	      <div>Contact Us</div>
	      <img src="/images/buttons/testenvelope.png" alt="" />
	    </a>

          </div>
	</div>

	<div class="leftcontent2">

	  <div id="course_info">
	    <?php
              echo "<h2>$course_title Forms</h2>\n";
	      include_once("../$course/info.php")
	    ?>
	  </div>

	  <div id="career_services" class="hidden">
	    <div class="rightsidebar2">
	      <div class="quicklinks2">
		<a href="#" class="btn2 buttontext" onClick="showSubSection('career_services', 'resumes');">
		  <div></div><div></div><div></div><div></div>
		  <div>Resumes</div>
		  <img src="/images/buttons/testenvelope.png" alt="" />
		</a>

		<a href="#" class="btn2 buttontext" onClick="showSubSection('career_services', 'interviews');">
		  <div></div><div></div><div></div><div></div>
		  <div>Interview Skills</div>
		  <img src="/images/buttons/testenvelope.png" alt="" />
		</a>

		<a href="#" class="btn2 buttontext" onClick="showSubSection('career_services', 'jobsearch');">
		  <div></div><div></div><div></div><div></div>
		  <div>Job Search</div>
		  <img src="/images/buttons/testenvelope.png" alt="" />
		</a>

              </div>
	    </div>
	    <div class="leftcontent2">
	      <?php echo "<h2>$course_title Career Services</h2>\n"; ?>

	      <div id="resumes">
		<h3>Resumes</h3>
		<p>Your resume is an extension of yourself. It's very important to keep it up to date.</p>
	      </div>

	      <div id="interviews" class="hidden">
		<h3>Interviews</h3>
	      </div>

	      <div id="jobsearch" class="hidden">
		<h3>Job Search</h3>
		<?php
		  require_once('dbconn.php');
		  $handle = db_connect();
		  require_once('joblist.php');
		  echo joblist($handle, 'Any', $course);
		?>
	      </div>

	    </div>
	  </div>

	  <div id="class_materials" class="hidden">
            <?php echo "<h2>$course_title Class Materials</h2>\n"; ?>
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
