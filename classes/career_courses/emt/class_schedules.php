<section id="class_schedules">
<?php
$course_dates = get_course_dates_list($handle, $course_abbr, $course_types);
?>

<script type="text/javascript">
jQuery.fn.sameHeight || document.write(
  '<script src="/js/jquery.sameheight.js"><\/script>'
);
</script>

<script type="text/javascript">
jQuery(document).ready(function() {
  jQuery('.sameheight1').sameHeight();
  jQuery('.sameheight2').sameHeight();
});
</script>

<article class="module article-box">
  <header class="title">
    <div class="title-border">
      <h1>Class Schedules</h1>
    </div>
  </header>
  <section class="body">
    <div class="col">
      <h1>Full-time Start Dates</h1>
      <div class="course-start-date sameheight1">
        <?= $course_dates['Full-time'] ?>
      </div>
      <h1>Full-time Class Hours</h1>
      <div class="course-start-date sameheight2">
        Tue - Fri, 8:30 AM - 5:00 PM<br />
        Mon, Optional Tutoring<br />
      </div>
      <ul>
        <li>Five weeks of instruction</li>
        <li>168 hours instruction and skills practice</li>
        <li>24-32 hours of field externship</li>
      </ul>
    </div><div class="col">
      <h1>Part-time Start Dates</h1>
      <div class="course-start-date sameheight1">
        <?= $course_dates['Part-time'] ?>
      </div>
      <h1>Part-time Class Hours</h1>
      <div class="course-start-date sameheight2">
        Mon Tue Thu, 6:00 PM - 10:00 PM<br />
        Sat, 8:30 AM - 5:00 PM<br />
        Wed, Optional Tutoring<br />
      </div>
      <ul>
        <li>Eight weeks of instruction</li>
        <li>168 hours instruction and skills practice</li>
        <li>24-32 hours of field externship</li>
      </ul>
    </div>
  </section>
</article>

<?php if (false): ?>
<article class="module article-box">
  <header class="title">
    <div class="title-border">
      <h1>Course Hours</h1>
    </div>
  </header>
  <section class="body">
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
  </section>
</article>
<?php endif; ?>
</section>
