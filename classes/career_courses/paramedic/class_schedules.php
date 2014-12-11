<div id="class_schedules" class="module article-box">

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
});
</script>

  <div class="title">
    <div class="title-border">
      <h1>Full-time Schedule</h1>
      <h2>Twelve Month Course</h2>
    </div>
  </div>
  <div class="body">
    <div class="col sameheight1">
      <?php if (false): ?>
      <h2 class="course-start-title">Application Deadline</h2>
      <?= $course_dates['Application Deadline'] ?>
      <?php endif; ?>
      <h2 class="course-start-title">Paramedic Anatomy &amp; Physiology</h2>
      <?= $course_dates['Anatomy and Physiology'] ?>
      <h2 class="course-start-title">Academy Start Date</h2>
      <?= $course_dates['Academy Start'] ?>
    </div><hr class="hide-large" /><div class="col sameheight1">
      <h2 class="course-start-title">Class Hours</h2>
      <div class="course-start-date">Mon - Wed, 9:00 AM - 6:00 PM</div>
      <ul style="margin-top: 20px;">
        <li>728 hours of didactic instruction</li>
        <li>48 hours of didactic observation</li>
        <li>208+ hours of clinical internship</li>
        <li>480+ hours of field internship</li>
      </ul>
    </div>
  </div>
</div><!-- /article-box -->
