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
    setSection( "materials", ["syllabus", "videos", "skillsheets"] );
    setSection( "career_services", ["resumes", "interviews", "jobsearch"] );
    setSection( "sidebar_cs", ["sidebar_cs_main", "sidebar_cs_sub"] );
    setSection( "resumes", [
      "resume1", "resume2", "resume3", "resume4", "resume5", "resume6", "resume7", "resume8", "resume9", "resume10",
      "cover1", "cover2", "cover3", "cover4", "cover5", "cover6", "cover7", "cover8", "cover9", "cover10"
    ] );
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
	      <div class="column" style="min-width: 20%; max-width: 25%; width: auto; float: left;">

		<h2>Cover Letter Guidelines</h2>
		<p>First impressions count in the job search, and that’s why a dynamite cover letter can mean the difference between success and failure in your healthcare job search. But what makes a winning healthcare cover letter?</p>

		<h3>Get to the Point</h3>
		<p>State the purpose of your letter in the first paragraph. Small talk is generally a waste of space. Three paragraphs is a good length.</p>

		<h3>Tailor Your Letter to the Reader</h3>
		<p>Focus on the needs of the specific healthcare organization, not on your own requirements as a job seeker. Visityour potential employer’s website and read their mission statement to learn more about the organization. Then use your cover letter to demonstrate how your skills and experience can benefit the organization.</p>

		<h3>Maintain the Right Tone</h3>
		<p>A cover letter should be businesslike, friendly and enthusiastic.Health professionals have the opportunity to reveal their passion through a cover letter, but the document shouldn’t become too syrupy, or it loses its objectivity and professionalism.</p>

		<h3>Make It Memorable</h3>
		<p>New graduates can make their cover letters stand out by personalizing their stories. If you decided to model your career after an Emergency Medical Technician who helped a family member, tell that story rather than making the generic claim that you’ve always wanted to help people. If your story is unique, its no longer like everyone else.</p>

		<h3>Highlight Your Biggest Successes</h3>
		<p>Your cover letter shouldn’t just summarize your career or repeat the same information from your resume. You want it to highlight the successes and achievements or &quot;triples and home runs&quot; of your career that are most related to the types of positions for which you are applying.</p>

		<h3>Use Power Phrases</h3>
		<p>Use strong action words to convey your experiences and illustrate your qualifications with phrases like &quot;I have decreased costs by...&quot; or &quot;I have increased productivity by...&quot; Don’t be shy about selling yourself, since that’s the purpose of a cover letter.</p>

		<h3>Show Your Team Spirit</h3>
		<p>If you have room for a few extra sentences in your cover letter, emphasize your teamwork and communication skills. Today teamwork and communication are vitally important in almost every healthcare position.</p>

		<h3>Spice Up Your Writing</h3>
		<p>A poor example to begin a cover letter is &quot;I am writing in response to your advertisement for a Phlebotomy Technician and have enclosed my resume for your review.&quot; The better opener could be &quot;Your ad on Monster for a Phlebotomy Technician captured my attention and motivated me to learn more about this employment opportunity.&quot; Then describe how your qualifications match the employer’s needs.</p>

		<h3>Follow Up</h3>
		<p>An unforgivable error some job seekers make is failing to follow up after sending their cover letter and resume. If the name of a hiring manager or current employee is available, follow-up, as soon as possible after submitting your application materials.</p>

		<h3>Avoid</h3>
		<ul>
		  <li>Addressing a letter recipient by anything other than his name. Avoid &quot;Dear Hiring Manager&quot; at all costs.</li>
		  <li>Writing a canned, generic letter that looks like it was copied from a book.</li>
		  <li>Starting the first paragraph and too many other sentences with &quot;I.&quot;</li>
		  <li>Making spelling errors and typos.</li>
		  <li>Handwriting a cover letter.</li>
		  <li>Using printer paper or paper that is different from your resume paper. Instead utilize resume paper.</li>
		  <li>Including irrelevant personal information or job experience.</li>
		  <li>Overstating your accomplishments or contradicting your resume.</li>
		</ul>

<?php
  $resume_dir = "../$course/resumes/";
  $resume_files = scandir($resume_dir);
  $i = 1;
  foreach ($resume_files as $file) {
    if ($file == "." || $file == "..") continue;
    $cover_list[] =
      "<li><span onClick=\"showSubSection('covers', 'coursecover$i');\">" .
      "$course_abbr Resume $i</span></li>\n";
    $cover_divs[] = "<div id=\"coursecover$i\" class=\"hidden\">\n" .
      read_file() . "\n" .
      "</div>\n";
    $resume_list[] =
      "<li><span onClick=\"showSubSection('resumes', 'courseresume$i');\">" .
      "$course_abbr Resume $i</span></li>\n";
    $resume_divs[] = "<div id=\"courseresume$i\" class=\"hidden\">\n" .
      read_file() . "\n" .
      "</div>\n";
  }
?>

		<h2>Cover Letter Examples</h2>
		<ul class="underline pointer">
		  <li><span onClick="showSubSection('resumes', 'cover1');">Cover Letter 1</span></li>
		</ul>

		<h2>Resume Examples</h2>
		<ul class="underline pointer">
		  <li><span onClick="showSubSection('resumes', 'resume1');">Resume 1</span></li>
		  <li><span onClick="showSubSection('resumes', 'resume2');">Resume 2</span></li>
		</ul>

		<?php include_once("../$course/resumes.php") ?>
	      </div>

	      <div class="column" style="max-width: 70%; width: auto; margin: 0 1% 0 3%;">
	        <div id="cover1" class="hidden">
		  Show cover 1 here.
		</div>
	        <div id="resume1" class="hidden">
		  Show resume 1 here.
		</div>
	        <div id="resume2" class="hidden">
		  Show resume 2 here. Or maybe do a file include.
		</div>
	      </div>

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

	      <?php include_once("../$course/interview.php"); ?>
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
