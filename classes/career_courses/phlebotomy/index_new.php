<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_vars.php');

$page_title = 'Phlebotomy';

$course_name = 'Phlebotomy';
$course_abbr = 'CPT';
$course_title = 'Certified Phlebotomy Technician';
$course_types = array('Full-time', 'Part-time');

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_top.php');
?>

<div class="content">
	<p>An important member of the clinical laboratory team, the phlebotomist works directly with patients to collect and process blood specimens for laboratory testing. Topics covered in the course include anatomy and physiology, laboratory safety, infection control precautions, bloodborne pathogens, specimen collection, and proper needle disposal.</p>
	<p>In addition to our day and evening CPT-1 certification courses, we also offer an advaned CPT-1 course for those already practicing phlebotomy who need to become certified under new CA State standards.</p>

  <div style="text-align: center;">

<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_startdates.php');
$course_dates = get_course_dates_list($handle, $course_abbr, $course_types);
?>

	  <div class="article-box">
      <div class="title">
        <div class="title-border">
          <h2>Two Week Course</h2>
          <h1>Full-time Schedule</h1>
		      <h2>Day classes</h2>
        </div>
      </div>
      <div class="body">
        <ul>
          <li><span class="course-start-title">Course Start Dates</span><br />
          <?= $course_dates['Full-time'] ?>
          </li>
          <li>Two weeks of instruction</li>
          <li>Mon - Fri:<br />9:00 AM - 4:30 PM</li>
        </ul>
      </div>
    </div><!-- /article-box --><div class="article-box">
      <div class="title">
        <div class="title-border">
          <h2>Four Week Course</h2>
          <h1>Part-time Schedule</h1>
		      <h2>Evening classes</h2>
        </div>
      </div>
      <div class="body">
        <ul>
          <li><div class="course-start-title">Course Start Dates</div>
          <?= $course_dates['Part-time'] ?>
          </li>
          <li>Four weeks of instruction</li>
          <li>Mon - Thu:<br />6:00 PM - 10:00 PM</li>
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
		      <li>Maximum student to instructor <span style="white-space: nowrap;">ratio of 8:1</span></li>
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
      <img src="/images/photostrips/<?= strtolower($course_abbr) ?>.png" alt="" />
    </a>
  </div>

</div> <!-- /content -->
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_bottom.php'); ?>
