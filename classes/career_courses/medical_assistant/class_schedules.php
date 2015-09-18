<div id="class_schedules" class="module article-box">
<?php
$course_dates = get_course_dates_list(
  $handle, 'CPT', array('Full-time','Part-time')
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
  jQuery('.sameheight2').sameHeight();
  jQuery('.sameheight3').sameHeight();
});
</script>

  <div class="title">
    <div class="title-border">
      <h1>Class Schedule</h1>
      <h2 class="hide-nophleb">All students begin with Phlebotomy</h2>
    </div>
  </div>
  <div class="body">
    <div class="col sameheight1">
      <div class="hide-nophleb">
        <h2 class="course-start-title">Phlebotomy Full-time Dates</h2>
        <div class="sameheight3"><?= $course_dates['Full-time'] ?></div>
        <h2 class="course-start-title">Phlebotomy Full-time Hours</h2>
        <div class="course-start-date">Mon - Fri, 9:00 AM - 4:30 PM</div>
      </div>
      <div class="show-nophleb" style="display: none;">
        <h2 class="course-start-title">Medical Assistant Dates</h2>
        <div class="course-start-date">Rotating open-entry. Contact us for details.</div>
      </div>
      <h2 class="course-start-title">Medical Assistant Class Hours</h2>
      <div class="course-start-date">Mon - Fri, 9:00 AM - 12:00 PM</div>
      <!--
      <div class="show-nophleb" style="display: none;">
        <div></div>
        <h2 class="course-start-title">Medical Assistant Evening Hours</h2>
        <div class="course-start-date">Mon - Thu, 6:00 PM - 10:00 PM</div>
      </div>
      -->
    </div><hr class="hide-large hide-nophleb" /><div class="col sameheight1">
      <div class="hide-nophleb">
        <h2 class="course-start-title">Phlebotomy Part-time Dates</h2>
        <div class="sameheight3"><?= $course_dates['Part-time'] ?></div>
        <h2 class="course-start-title">Phlebotomy Part-time Hours</h2>
        <div class="course-start-date">Mon - Thu, 6:00 PM - 10:00 PM</div>
      </div>
      <!--
      <div class="hide-nophleb">
        <div></div>
        <h2 class="course-start-title">Medical Assistant Evening Hours</h2>
        <div class="course-start-date">Mon - Thu, 6:00 PM - 10:00 PM</div>
      </div>
      -->
      <div class="show-nophleb" style="display: none;">
        <br class="hide-large" />
        <h4>Medical Assistant</h4>
        <p>Twelve week part time course</p>
        <div>180 hours of instruction and laboratory practice</div>
        <div>160 hours of clinical externship</div>
      </div>
    </div><hr class="hide-large" /><br class="hide-small" /><div class="col sameheight2 hide-nophleb">
      <h4><a style="color: white; text-decoration: none;" href="/classes/career_courses/phlebotomy/">Phlebotomy</a></h4>
      <p>Two week full time or four week part time courses</p>
      <div>65 hours of instruction and laboratory practice</div>
      <div>40 hours of clinical externship</div>
    </div><hr class="hide-large hide-nophleb" /><div class="col sameheight2 hide-nophleb">
      <h4>Medical Assistant</h4>
      <p>Twelve week part time course</p>
      <div>180 hours of instruction and laboratory practice</div>
      <div>160 hours of clinical externship</div>
    </div>
  </div>
</div><!-- /article-box -->
