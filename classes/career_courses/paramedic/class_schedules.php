<div id="class_schedules" class="module article-box">
  <div class="title">
    <div class="title-border">
      <h1>Full-time Schedule</h1>
      <h2>Twelve Month Course</h2>
    </div>
  </div>
  <div class="body">
    <ul>
      <?php
        $course_dates = get_course_dates_list($handle, $course_abbr, $course_types);
      ?>
      <li><span class="course-start-title">Application Deadline</span><br />
      <?= $course_dates['Application Deadline'] ?>
      </li>
      <li><span class="course-start-title">Paramedic Anatomy &amp; Physiology</span><br />
      <?= $course_dates['Anatomy and Physiology'] ?>
      </li>
      <li><span class="course-start-title">Academy Start Date</span><br />
      <?= $course_dates['Academy Start'] ?>
      </li>
      <li>728 hours of didactic instruction</li>
      <li>48 hours of didactic observation</li>
      <li>208+ hours of clinical internship</li>
      <li>480+ hours of field internship</li>
      <li>Mon - Wed:<br />9:00 AM - 6:00 PM</li>
    </ul>
  </div>
</div><!-- /article-box -->
