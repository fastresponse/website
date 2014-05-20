<div id="class_schedules">
<?php
$course_dates = get_course_dates_list($handle, $course_abbr, $course_types);
?>

<div class="module article-box">
  <div class="title">
    <div class="title-border">
      <h1>Class Schedules</h1>
    </div>
  </div>
  <div class="body">
    <table><tr>
    <td>
      <h2 class="course-start-title">Full-time Start Dates</h2>
      <?= $course_dates['Full-time'] ?>
      <h2 class="course-start-title">Full-time Class Hours</h2>
      <div class="course-start-date">Tue - Fri, 8:30 AM - 5:00 PM</div>
      <div class="course-start-date">Mon, Optional Tutoring</div>
      <ul style="margin-top: 5px;">
        <li>Five weeks of instruction</li>
        <li>168 hours instruction and skills practice</li>
        <li>24-32 hours of field externship</li>
      </ul>
    </td>
    <td>
      <h2 class="course-start-title">Part-time Start Dates</h2>
      <?= $course_dates['Part-time'] ?>
      <h2 class="course-start-title">Part-time Class Hours</h2>
      <div class="course-start-date">Mon Tue Thu, 6:00 PM - 10:00 PM</div>
      <div class="course-start-date">Sat, 8:30 AM - 5:00 PM</div>
      <div class="course-start-date">Wed, Optional Tutoring</div>
      <ul style="margin-top: 5px;">
        <li>Eight weeks of instruction</li>
        <li>168 hours instruction and skills practice</li>
        <li>24-32 hours of field externship</li>
      </ul>
    </td>
    </tr></table>
  </div>
</div>

<?php if (false): ?>
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
      <div style="font-weight: bold; margin-bottom: 10px;" class="yellow">In-class didactic and laboratory instruction and practice:</div>
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
<?php endif; ?>
</div>
