<?php
// variable defaults
$max = 8;
$date_start = date('Y-m-') . '01';
$date_end = date('Y-m-') . '31';

$page_title = 'Community Events';

$jquery = true;

$stylesheets = array(
  '/js/eventCalendar/css/eventCalendar.css',
  //'/js/eventCalendar/css/eventCalendar_theme_responsive.css',
  '/community/events.css',
);

$javascripts = array(
  '/js/eventCalendar/js/jquery.eventCalendar.js'
  //'/js/jquery.eventCalendar.min.js',
);

include($_SERVER['DOCUMENT_ROOT'] . '/include/std_head.php');


$page_header = 'Community Events';

include($_SERVER['DOCUMENT_ROOT'] . '/include/std_body.php');
?>

      <div class="rightsidebar2">
        <div id="event-calendar"></div>
	      <script type="text/javascript">
	        $(document).ready(function() {
	          $("#event-calendar").eventCalendar({
	            eventsjson: '/js/eventCalendar/json/event.humanDate.json.php',
	            jsonDateFormat: 'human',
	            eventsLimit: 0,
	            startWeekOnMonday: false,
	            alwaysHideDescription: true,
	            txt_NextEvents: "Upcoming Classes and Events"
	          });
	        });
	      </script>
      </div>

      <div class="leftcontent2">

        <div id="events_div">
          <?php
            ob_start();
            include($_SERVER['DOCUMENT_ROOT'] . '/php/ajax/ajax.events.php');
            echo ob_get_clean();
          ?>
        </div>

        <!--
        <script type="text/javascript">
          $(document).ready(function() {
            /*
            $.ajax({
              url: "/php/ajax/ajax.events.php",
              type: "POST",
              data: { date_start: "", date_end: "", max: 8 },
              dataType: "html",
              success: function(data, txt_status, jqxhr) {
                $("#events_div").html(data);
              },
              error: function(jqxhr, txt_status, txt_error) {
                console.log("Error: "+txt_status+", "+txt_error);
              }
            });
            */
          });
        </script>
        -->
	    </div> <!-- /leftcontent -->

<?php include($_SERVER['DOCUMENT_ROOT'] . '/include/std_footer.php'); ?>
