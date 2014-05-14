<div id="class_schedules" class="module article-box">
  <div class="title">
    <div class="title-border">
      <h1>Full-time Schedule</h1>
      <h2>Twelve Month Course</h2>
    </div>
  </div>
  <div class="body">
    <table><tr>
    <td>
      <?php
        $course_dates = get_course_dates_list($handle, $course_abbr, $course_types);
      ?>
      <h2 class="course-start-title">Application Deadline</h2>
      <?= $course_dates['Application Deadline'] ?>
      <h2 class="course-start-title">Paramedic Anatomy &amp; Physiology</h2>
      <?= $course_dates['Anatomy and Physiology'] ?>
      <h2 class="course-start-title">Academy Start Date</h2>
      <?= $course_dates['Academy Start'] ?>
    </td>
    <td>
      <h2 class="course-start-title">Class Hours</h2>
      <div class="course-start-date">Mon - Wed, 9:00 AM - 6:00 PM</div>
      <ul style="margin-top: 20px;">
        <li>728 hours of didactic instruction</li>
        <li>48 hours of didactic observation</li>
        <li>208+ hours of clinical internship</li>
        <li>480+ hours of field internship</li>
      </ul>
    </td>
    </tr></table>
  </div>
</div><!-- /article-box -->
