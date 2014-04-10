<div id="class_schedules">
<?php
//include_once($_SERVER['DOCUMENT_ROOT'] . '/include/course_startdates.php');
$course_dates = get_course_dates_list($handle, $course_abbr, $course_types);
?>
<div class="module article-box">
  <div class="title">
    <div class="title-border">
      <h2>Five Week Course</h2>
      <h1>Full-time Schedule</h1>
		  <h2>Daytime</h2>
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
</div>
<div class="module article-box">
  <div class="title">
    <div class="title-border">
      <h2>Eight Week Course</h2>
      <h1>Part-time Schedule</h1>
		  <h2>Evening</h2>
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
      <li>Wed:<br />Optional Tutoring</li>
    </ul>
  </div>
</div>
<div class="module article-box">
  <div class="title">
    <div class="title-border">
      <h1>Course Hours</h1>
    </div>
  </div>
  <div class="body">
    <dl class="alternate">
      <div class="highlight"><dt>AHA Healthcare Provider CPR</dt><dd>5 hours</dd></div>
      <hr style="width: 75%;"/>
      <div style="clear: both; font-weight: bold; margin-bottom: 10px;" class="yellow">In-class didactic and laboratory instruction and practice:</div>
      <div class="highlight"><dt>EMT Foundations</dt><dd>40 hours</dd></div>
      <div class="highlight"><dt>Trauma Emergencies</dt><dd>40 hours</dd></div>
      <div class="highlight"><dt>Medical Emergencies</dt><dd>40 hours</dd></div>
      <div class="highlight"><dt>Specialties</dt><dd>40 hours</dd></div>
      <div class="highlight"><dt>Cumulative Final</dt><dd>40 hours</dd></div>
      <div class="highlight yellow" style="padding-bottom: 5px;"><dt>Total Instruction</dt><dd>168 hours</dd></div>
      <hr style="width: 75%; margin-bottom: 20px; margin-top: -15px;"/>
      <div class="highlight"><dt>Emergency Department externship</dt><dd>8 hours</dd></div>
      <div class="highlight"><dt>Ambulance externship</dt><dd>16 hours</dd></div>
    </dl>
  </div>
</div>
</div>
