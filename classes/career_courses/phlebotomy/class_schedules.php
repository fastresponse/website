<div id="class_schedules">
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

<div class="module article-box">
  <div class="title">
    <div class="title-border">
      <h1>Full-time Schedule</h1>
      <h2>Two Week Course</h2>
    </div>
  </div>
  <div class="body">
    <table><tr>
    <td>
      <h2 class="course-start-title">Full-time Start Dates</h2>
      <div class="course-start-date sameheight1">
        <?= $course_dates['Full-time'] ?>
      </div>
      <h2 class="course-start-title">Full-time Class Hours</h2>
      <div class="course-start-date">Mon - Fri, 9:00 AM - 4:30 PM</div>
      <ul style="margin-top: 5px;">
        <li>Two weeks of instruction</li>
        <li>65 hours instruction and laboratory practice</li>
        <li>80+ hours of clinical externship</li>
      </ul>
    </td>
    <td>
      <h2 class="course-start-title">Part-time Start Dates</h2>
      <div class="course-start-date sameheight1">
        <?= $course_dates['Part-time'] ?>
      </div>
      <h2 class="course-start-title">Part-time Class Hours</h2>
      <div class="course-start-date">Mon - Thu, 6:00 PM - 10:00 PM</div>
      <ul style="margin-top: 5px;">
        <li>Four weeks of instruction</li>
        <li>65 hours of instruction and laboratory practice</li>
        <li>80+ hours of clinical externship</li>
      </ul>
    </td>
    </tr></table>
  </div>
</div><!-- /article-box -->
