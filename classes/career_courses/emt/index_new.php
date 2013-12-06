<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_vars.php');

$page_title = 'EMT';

$course_name = 'EMT';
$course_abbr = 'EMT';
$course_title = 'Emergency Medical Technician';
$course_types = array('Full-time', 'Part-time');

$buttons['Skills Videos'] = true;

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_top.php');
?>

<div class="content">
	<h2>Accelerated EMT Program</h2>
	<p>If you want to be the best, come to Fast Response! Our EMT course is designed for anyone wanting to get into emergency medicine as an EMT. EMTs may work in an ambulance, with a fire department, in a hospital emergency room or on a search and rescue team.</p>
	<p>We believe that our five weeks of classroom training with additional field experience provide the most effective and expedient platform for our graduates to continue on to success in the EMT field. Throughout the course, students practice skills in the classroom and the Fast Response Simulation Lab.</p>
	<p>Realistic scenarios and guaranteed externships in both the ambulance and Emergency Room environment give graduates confidence in their abilities.</p>
  <p>Guaranteed externships include a one-day clinical shift in a hospital emergency department as well as two ambulance ride-along shifts with the Bay Area's largest ambulance companies.</p>

  <div style="text-align: center;">

<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_startdates.php');
$course_dates = get_course_dates_list($handle, $course_abbr, $course_types);
?>

	  <div class="article-box">
      <div class="title">
        <div class="title-border">
          <h1>Full-time Schedule</h1>
		      <h2>Day classes</h2>
        </div>
      </div>
      <div class="body">
        <ul>
          <li><span class="course-start-title">Course Start Dates</span><br />
          <?= $course_dates['Full-time'] ?>
          </li>
          <li>Five weeks of instruction</li>
          <li>Tue - Fri:<br />8:30 AM - 5:00 PM</li>
          <li>Mon:<br />Optional Tutoring</li>
        </ul>
      </div>
    </div><!-- /article-box --><div class="article-box">
      <div class="title">
        <div class="title-border">
          <h1>Part-time Schedule</h1>
		      <h2>Evening classes</h2>
        </div>
      </div>
      <div class="body">
        <ul>
          <li><div class="course-start-title">Course Start Dates</div>
          <?= $course_dates['Part-time'] ?>
          </li>
          <li>Eight weeks of instruction</li>
          <li>Mon, Tue, Thu:<br />6:00 PM - 10:00 PM</li>
          <li>Sat:<br />8:30 AM - 5:00 PM</li>
        </ul>
      </div>
    </div><!-- /article-box --><div class="article-box cols-2">
      <div class="title">
        <div class="title-border">
          <h1>Key Values</h1>
		      <h2>Included With Program</h2>
        </div>
      </div>
      <div class="body">
        <ul>
          <li>NREMT Certification pass rate of 91% on <span style="white-space: nowrap;">first attempt</span> <span style="white-space: nowrap; font-size: 90%">(3rd quarter 2013)</span></li>
		      <li>Maximum student to instructor <span style="white-space: nowrap;">ratio of 10:1</span></li>
          <li>Day and evening classes</li>
		      <li>Flexible payment options</li>
		      <li>Career services assistance</li>
          <li>Located one block from BART</li>
		      <li>Guaranteed clinical externships</li>
		      <li>Affiliated with CA Dept. of Rehabilitation and Workforce Investment Act eligible provider</li>
        </ul>
	    </div>
	  </div><!-- /article-box -->
  </div>

  <div class="bottom-image">
    <a target="_self" href="/gallery/index.php/<?= $course_abbr ?>">
      <img src="/images/photostrips/<?= strtolower($course_abbr) ?>.jpg" alt="" />
    </a>
  </div>

</div> <!-- /content -->
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_bottom.php'); ?>
