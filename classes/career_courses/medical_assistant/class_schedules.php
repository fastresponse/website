<div id="class_schedules" class="module article-box">
<?php
$course_dates = get_course_dates_list(
  $handle, 'CPT', array('Full-time','Part-time')
);
?>
  <div class="title">
    <div class="title-border">
      <h1>Class Schedule</h1>
      <h2>All students begin with Phlebotomy</h2>
    </div>
  </div>
  <div class="body">
    <table><tr class="bottomborder">
    <td>
      <h2 class="course-start-title">Phlebotomy Full-time Start Dates</h2>
      <?= $course_dates['Full-time'] ?>
      <h2 class="course-start-title">Phlebotomy Full-time Class Hours</h2>
      <div class="course-start-date">Mon - Fri, 9:00 AM - 4:30 PM</div>
      <h2 class="course-start-title">Medical Assistant Daytime Class Hours</h2>
      <div class="course-start-date">Mon - Fri, 9:00 AM - 12:00 PM</div>
    </td>
    <td>
      <h2 class="course-start-title">Phlebotomy Part-time Start Dates</h2>
      <?= $course_dates['Part-time'] ?>
      <h2 class="course-start-title">Phlebotomy Part-time Class Hours</h2>
      <div class="course-start-date">Mon - Fri, 6:00 PM - 10:00 PM</div>
      <h2 class="course-start-title">Medical Assistant Evening Class Hours</h2>
      <div class="course-start-date">Mon - Fri, 6:00 PM - 9:00PM</div>
    </td>
    </tr><tr>
    <td>
      <h4><a style="color: white; text-decoration: none;" href="/classes/career_courses/phlebotomy/">Phlebotomy</a></h4>
      <p>Two week full time or four week part time courses</p>
      <div>65 hours of instruction and laboratory practice</div>
      <div>80 hours of clinical externship</div>
    </td>
    <td>
      <h4>Medical Assistant</h4>
      <p>Five month course</p>
      <div>270 hours of instruction and laboratory practice</div>
      <div>160 hours of clinical externship</div>
    </td>
    </tr></table>
  </div>
</div><!-- /article-box -->
