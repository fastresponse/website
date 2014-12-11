<div id="class_schedules" class="module article-box">
<?php
  $course_dates = get_course_dates_list(
    $handle, $course_abbr, $course_types
  );
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
      <h1>Class Schedule</h1>
      <h2>Part-time, Seventeen week course</h2>
    </div>
  </div>
  <div class="body">
    <div class="col sameheight1">
      <h2 class="course-start-title">Class Start Dates</h2>
      <div class="course-start-date"><?= $course_dates['Part-time'] ?></div>
      <div class="hide-small" style="min-height: 4em;"></div>
    </div><hr class="hide-large" /><div class="col sameheight1">
      <h2 class="course-start-title">Class Hours</h2>
      <div class="course-start-date">Tue, Wed, Thu: 6:00 PM - 10:00 PM</div>
      <div class="course-start-date">Sat: 9:00 AM - 6:00 PM</div>
      <ul>
        <li>246 hours of instruction over 13 weeks</li>
        <li>160+ hours of clinical externship over 4 weeks</li>
      </ul>
    </div>
  </div>
</div><!-- /article-box -->
