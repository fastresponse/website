<div id="class_schedules" class="module article-box">
  <?php
  $course_dates = get_course_dates_list($handle, $course_abbr, $course_types);
  ?>
  <div class="title">
    <div class="title-border">
      <h1>Class Schedules</h1>
    </div>
  </div>
  <div class="body">
    <div class="col">
      <h2 class="course-start-title">Part-time Start Dates</h2>
      <div class="course-start-date">
        <?= $course_dates['Part-time'] ?>
      </div>
      <h2 class="course-start-title">Part-time Class Hours</h2>
      <div class="course-start-date">
        Mon Wed Thu, 6:00 PM - 10:00 PM<br />
        Sat, 9:00 AM - 6:00 PM<br />
      </div>
    </div><hr class="hide-large" /><div class="col">
      <ul style="margin-top: 5px;">
        <li>Ten weeks of instruction and skills practice</li>
        <ul>
          <li>Total of 200 hours</li>
        </ul>
        <li>Ten weeks of field externship</li>
        <ul>
          <li>Full-time, 8 hours per day, Mon - Fri</li>
          <li>Total of 400 hours</li>
        </ul>
      </ul>
    </div>
  </div>
</div>
