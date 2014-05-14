<div id="class_schedules" class="module article-box">
  <div class="title">
    <div class="title-border">
      <h1>Full-time Schedule</h1>
      <h2>Five Month Course</h2>
    </div>
  </div>
  <div class="body">
    <table><tr>
    <td>
      <?php
      $course_dates = get_course_dates_list($handle, 'CPT', array('Full-time','Part-time'), $combined = true);
      ?>
      <h2 class="course-start-title">Phlebotomy Start Dates</h2>
      <?= $course_dates['all'] ?>
      <h2 style="font-size: 120%;" class="red">All students begin with phlebotomy</h2>
    </td>
    <td>
      <h2 class="course-start-title">Phlebotomy Class Hours</h2>
      <div class="course-start-date">Mon - Fri, 9:00 AM - 4:30 PM</div>
      <ul style="margin-top: 5px; margin-bottom: 20px;">
        <li>65 hours of instruction and laboratory practice</li>
        <li>80 hours of clinical externship</li>
      </ul>
      <h2 class="course-start-title">Medical Assistant Class Hours</h2>
      <div class="course-start-date">Mon - Fri, 9:00 AM - 12:00 PM</div>
      <ul style="margin-top: 5px;">
        <li>270 hours of instruction and laboratory practice</li>
        <li>160 hours of clinical externship</li>
      </ul>
    </td>
    </tr></table>
  </div>
</div><!-- /article-box -->
