<div id="class_schedules" class="module article-box">
<?php
$course_dates = get_course_dates_list($handle, $course_abbr, $course_types);
?>
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
      <?= $course_dates['Full-time'] ?>
      <h2 class="course-start-title">Full-time Class Hours</h2>
      <div class="course-start-date">Mon - Fri, 9:00 AM - 4:30 PM</div>
      <ul style="margin-top: 5px;">
        <li>Two weeks of instruction</li>
        <li>65 hours instruction and laboratory practice</li>
        <li>80 hours of clinical externship</li>
      </ul>
    </td>
    <td>
      <h2 class="course-start-title">Part-time Start Dates</h2>
      <?= $course_dates['Part-time'] ?>
      <h2 class="course-start-title">Part-time Class Hours</h2>
      <div class="course-start-date">Mon - Fri, 6:00 PM - 10:00 PM</div>
      <ul style="margin-top: 5px;">
        <li>Four weeks of instruction</li>
        <li>65 hours of instruction and laboratory practice</li>
        <li>80 hours of clinical externship</li>
      </ul>
    </td>
    </tr></table>
  </div>
</div><!-- /article-box -->
