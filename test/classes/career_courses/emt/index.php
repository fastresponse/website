<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/php/templateload.php');
$template = new TemplateRenderer();

$vars = array(
  'title' => 'EMT',
  'headerimg' => 'header_emt_right.jpg',
  'buttons' => array(
    array(
      'text' => "Course Info\nPacket",
      'link' => '/pdfs/EMT - Course Info Packet.pdf',
      'target' => '_blank',
    ),
    array(
      'text' => "Performance\nFace Sheet",
      'link' => '/pdfs/EMT - Performance Fact Sheet.pdf',
      'target' => '_blank',
    ),
    array(
      'text' => "Student\nResources",
      'link' => '/resources/emt/',
    ),
    array(
      'text' => "Skills Videos",
      'link' => '/resources/emt/?section=videos',
    ),
    array(
      'text' => "Photo Gallery",
      'link' => '/photos/emt/index.html#emt',
    ),
    array(
      'text' => "Contact Us",
      'link' => '/school/info/',
      'img' => '/images/buttons/envelope-icon.png',
    ),
    array(
      'text' => "Visit Us On\nFacebook",
      'link' => 'http://www.facebook.com/FastResponseSchool',
      'img' => '/images/buttons/facebook-icon.png',
    ),
  ),
  'announcements' => array(
    /*
    array(
      title => 'Course Start Dates',
      subs => array (
	array(
	  'subtitle' => 'Full Time',
	  'text' => query_next_date($handle, $course, $type),
	),
      ),
    ),
    */
  ),
));
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/php/dbconn.php');
$handle = db_connect('start_dates');
$course = 'EMT';
$dates = array('Full-time', 'Part-time');
foreach ($type in $dates) {
  $vars['announcements']['Course Start Dates'][] = array(
    'subtitle' => $type,
    'text' => query_next_date($handle, $course, $type),
  );
}

$template->display('course.twig', $vars);
?>

	<div class="leftcontent2">

	    <div class="column smallauto">
	      <div class="announcement red">
		<h3 class="yellow">Course Start Dates</h3>
		<div class="yellow underline">Full Time</div>
		<?php
		  $next = query_next_date($handle, 'EMT', 'Full-time');
		  echo "<div>{$next['showdate']}</div>";
		?>
		<div class="yellow underline">Part Time</div>
		<?php
		  $next = query_next_date($handle, 'EMT', 'Part-time');
		  echo "<div>{$next['showdate']}</div>";
		?>
	      </div>
	    </div>

	    <h1>Emergency Medical Technician</h1>

	    <div>
	      <h4>Accelerated EMT Program</h4>
	      <p>If you want to be the best, come to Fast Response! Our EMT course is designed for anyone wanting to get into emergency medicine as an EMT. EMTs may work in an ambulance, with a fire department, in a hospital emergency room or on a search and rescue team.</p>
	      <img alt="EMT Auto Extrication" align="left" width="315" height="214" src="/sites/default/files/fckuploads/image/EMT-Auto-Extrication2.png" />
	      <p>We believe that our five weeks of classroom training with additional field experience provide the most effective and expedient platform for our graduates to continue on to success in the EMT field. Throughout the course, students practice skills in the classroom and the Fast Response Simulation Lab.</p>

	      <p>Realistic scenarios and guaranteed externships in both the ambulance and Emergency Room environment give graduates confidence in their abilities.</p>
	    </div>

	    <div class="section" style="clear: left;">
	      <div style="width: 45%; display: inline-block;">
		<h3>Included in the program:</h3>
		<ul class="bullets">
		  <li>Dynamic, relevant classroom training</li>
		  <li>Maximum student to instructor ratio of 10:1</li>
		  <li>Simulation Lab provides practical training scenarios</li>
		  <li>Preparation for the National Registry Examination (NREMT)</li>
		  <li>Guaranteed Clinical Externship - 18 hours with both Ambulance and Emergency Room experience</li>
		</ul>
	      </div>
	      <div style="width: 9%; display: inline-block;"></div>
	      <div style="width: 37%; display: inline-block; vertical-align: top; margin-top: 2em;" class="listbox">
		<ul class="checkmark">
		  <li>Complete course lasts only seven weeks</li>
		  <li>Flexible payment options available</li>
		  <li>Career assistance upon graduation</li>
		  <li>Start a new career path!</li>
		  <li>Affiliated with California Dept. of Rehabilitation and Workforce Investment Act eligible provider</li>
		</ul>
	      </div>
	    </div>

	  </div> <!-- /leftcontent -->

	  <div style="margin: 3em 0; font-weight: bold;">
	    <h3>Student Testimonials:</h3>

	    <p>
	    <q>Great class, learned a great deal, looking forward to work, and very happy I did it.</q>
	    <br />
	    <cite>-Lina G.</cite>
	    </p>

	    <p>
	    <q>Our instructor is very good at lecturing &ndash; the right balance of fun and information. He maintained a high energy level and positive attitude.</q>
	    <br />
	    <cite>-Alex T.</cite>
	    </p>

	    <p>
	    <q>Having input from people who have been in the field was great. Ruthie is an excellent skills instructor.</q>
	    <br />
	    <cite>-Nicole L.</cite>
	    </p>
	  </div>

	</div> <!-- /section -->

	<div class="photos">
	  <a target="_self" href="/photos/emt/index.html#emt">
	    <img alt="" width="880" height="250" src="/sites/default/files/fckuploads/image/EMT-3_images.jpg" />
	  </a>
	  <p><a target="_self" href="/photos/emt/index.html#emt">
	    Actual Photo From Class - Click Here to View Gallery
	  </a></p>
	</div>

	<div style="margin: 1.5em auto 0 auto;">
	  <h3 style="text-align: center;">*Call us, drop by our office, or click <a style="color:#C30;" href="/school/info/">HERE</a> to begin your new career!*</h3>

	  <div class="bgimg fontsans" style="width: 20.25em; height: 2.25em; font-size: 220%;">
	    <div style="width: 20.25em; height: 2.25em; line-height: 2.25em;">
	      Call <a href="tel://1-800-637-7387">(800) 637-7387</a> or
	      <a href="tel://1-510-849-4009">(510) 849-4009</a>
	    </div>
	    <img src="/images/cloudbg.png" alt="phone number" />
	  </div>

	</div>

      </div> <!-- /main -->

    <div id="footer">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/menu/footer.php'); ?>
    </div> <!-- /footer -->

  </div> <!-- /page -->

</body>
</html>
