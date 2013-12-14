<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_vars.php');

$page_title = 'Paramedic Academy';

$course_name = 'Paramedic';
$course_abbr = 'Paramedic';
$course_title = 'Paramedic Academy';
$course_types = array('Application Deadline', 'Academy Start');

$sections['Testimonials'] = false;
$sections['Extra'] = true;

$buttons['Course Info Packet'] = false;
$buttons['Student Resources'] = false;

$zip_radius = 75;

require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_top.php');
?>

<div class="content">
  <h2>Advanced Skills for EMTs</h2>
  <p>
  It is the mission of the Fast Response Paramedic Academy to produce extraordinary critical thinking paramedics who provide compassionate and proficient patient care. We do this by creating a supportive learning environment that includes the student in the learning process. We provide several opportunities for outside activities that enrich the didactic experience. The opportunities include ride alongs with local 911 EMS providers.
  </p>

  <p>
  We provide our students with an iPad loaded with EMS software to include iPCR, Title 22, local and regional EMS Regulations, as well as online learning tools. These tools will enhance the overall learning experience, while utilizing up to date technology students can expect to use in the field. This equipment will be incorporated into all aspects of clinical and field training. We have an excellent skills lab that includes a scenario based Simulation Lab, a High Fidelity ALS manikin, and an ambulance simulator. 
  </p>

  <p>
  Fast Response has developed strong relationships with Paramedics Plus, Kaiser Permanente Regional Medical Centers, and Eden Medical Center. Through contractual agreements with these facilities, Fast Response is able to guarantee immediate access to both clinical and field internships.
  </p>

  <div style="text-align: center;">

<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_startdates.php');
$course_dates = get_course_dates_list($handle, $course_abbr, $course_types);
?>

	  <div class="article-box">
      <div class="title">
        <div class="title-border">
          <h1>Full-time Schedule</h1>
          <h2>Twelve Month Course</h2>
        </div>
      </div>
      <div class="body" id="schedule">
        <ul>
          <li><span class="course-start-title">Application Deadline</span><br />
          <?= $course_dates['Application Deadline'] ?>
          </li>
          <li><span class="course-start-title">Academy Start Date</span><br />
          <?= $course_dates['Academy Start'] ?>
          </li>
          <li>608 hours of didactic instruction</li>
          <li>32 hours of didactic observation</li>
          <li>160 hours of clinical internship</li>
          <li>480 hours of field internship</li>
          <li>Mon - Wed:<br />9:00 AM - 6:00 PM</li>
        </ul>
      </div>
    </div><!-- /article-box --><div class="article-box">
      <div class="title">
        <div class="title-border">
          <h1>Certifications Included</h1>
          <h2>80 hours of instruction</h2>
        </div>
      </div>
      <div class="body" id="certs">
        <ul>
          <li>Pediatric Advanced Life Support (PALS)</li>
          <li>Advanced Cardiac Life Support (ACLS)</li>
          <li>International Trauma Life Support (ITLS)</li>
          <li>Geriatric Education for Emergency Medical Services (GEMS)</li>
          <li>Emergency Medical Patient Assessment, Care, and Transport (EMPACT)</li>
        </ul>
      </div>
    </div><!-- /article-box --><?php if (false): ?><div class="article-box">
      <div class="title">
        <div class="title-border">
          <h1>Internship Sites</h1>
        </div>
      </div>
      <div class="body">
        <ul>
<?php foreach (query_external($handle, 'Paramedic', 'internship', true) as $site): ?>
  <li><?= $site['site_department'] ?></li>
<?php endforeach; ?>
        </ul>
      </div>
    </div><!-- /article-box --><div class="article-box">
      <div class="title">
        <div class="title-border">
          <h1>Didactic Observation Sites</h1>
        </div>
      </div>
      <div class="body">
        <ul>
<?php foreach (query_external($handle, 'Paramedic', 'didactic observation', true) as $site): ?>
  <li><?= $site['site_department'] ?></li>
<?php endforeach; ?>
        </ul>
      </div>
    </div><!-- /article-box --><?php endif; ?><div class="article-box cols-2">
      <div class="title">
        <div class="title-border">
          <h1>Key Values</h1>
		      <h2>Included With Program</h2>
        </div>
      </div>
      <div class="body">
        <ul>
          <li>NREMT-P Test Preparation</li>
          <li>iPad with EMS software included</li>
		      <li>Flexible payment options</li>
		      <li>Career services assistance</li>
          <li>Located one block from BART</li>
		      <li>Guaranteed clinical and field internships</li>
		      <li style="width: 85%;">Affiliated with CA Dept. of Rehabilitation and Workforce Investment Act eligible provider</li>
        </ul>
	    </div>
	  </div><!-- /article-box -->
  </div>

<script type="text/javascript">
window.jQuery || document.write(
  '<script src="/js/jquery-1.10.2.min.js" type="text/javascript"><\/script>'
);
</script>
<script type="text/javascript">
$(document).ready(function() {
  if ($(window).width() >= 640) {
    var h1 = $('#schedule').innerHeight();
    var h2 = $('#certs').innerHeight();
    if (h1 > h2) $('#certs').innerHeight(h1);
    if (h2 > h1) $('#schedule').innerHeight(h2);
  }
});
</script>

  <div class="bottom-image">
    <a target="_self" href="/gallery/index.php/<?= $course_abbr ?>">
      <img src="/images/photostrips/<?= strtolower($course_abbr) ?>.png" alt="" />
    </a>
  </div>

</div> <!-- /content -->
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_bottom.php'); ?>
