<div id="class_schedules" class="module article-box">
  <div class="title">
    <div class="title-border">
      <h1>Part-time Schedule</h1>
      <h2>Ten Week Course</h2>
    </div>
  </div>
  <div class="body">
    <table><tr>
    <td>
      <?php
        $course_dates = get_course_dates_list($handle, $course_abbr, $course_types);
      ?>
      <h2 class="course-start-title">Class Start Dates</h2>
      <?= $course_dates['Part-time'] ?>
    </td>
    <td>
      <h2 class="course-start-title">Class Hours</h2>
      <div class="course-start-date">Tue - Thu, 6:00 PM - 10:00 PM</div>
      <ul style="margin-top: 20px;">
        <li>246 hours of didactic instruction</li>
        <li>160 hours of clinical externship</li>
      </ul>
    </td>
    </tr></table>
  </div>
</div><!-- /article-box -->
