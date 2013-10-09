<?php
  require_once($_SERVER['DOCUMENT_ROOT'] . '/php/dbconn.php');
  $handle = db_connect('start_dates');

  require_once($_SERVER['DOCUMENT_ROOT'] . '/php/calendar/calendar.php');
  $calendar = Calendar::factory();
  $calendar->standard('today')->standard('prev-next')->standard('holidays');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">

<head>
  <title>Upcoming Course Dates | Fast Response</title>

  <base href="/" />

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="robots" content="INDEX, FOLLOW">
  <meta name="googlebot" content="INDEX, FOLLOW">

  <link type="image/x-icon" rel="shortcut icon" href="/misc/favicon.ico" />

  <link type="text/css" rel="stylesheet" media="all" href="/css/template.css" />
  <link type="text/css" rel="stylesheet" media="all" href="/css/nicemenus.css" />
  <link type="text/css" rel="stylesheet" media="all" href="/css/buttons.css" />
  <link type="text/css" rel="stylesheet" media="print" href="/sites/all/themes/fastresponse/css/print.css" /> 
  <!--[if lte IE 6]><style type="text/css" media="all">@import "/sites/all/themes/fastresponse/css/ie6.css";</style><![endif]-->
  <!--[if IE 7]><style type="text/css" media="all">@import "/sites/all/themes/fastresponse/css/ie7.css";</style><![endif]-->
  <!--[if lte IE 8]><style type="text/css" media="all">@import "/css/buttons-ie.css";</style><![endif]-->


  <script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-18170901-1']);
    _gaq.push(['_trackPageview']);

    (function() {
     var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
     ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
     var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
     })();

  </script>

  <!--<script type="text/javascript" src="/js/jquery.js"></script>-->

  <style type="text/css">
    .course {
      width: 32%;
      display: inline-block;
      vertical-align: top;
      margin-top: 1em;
      margin-bottom: 1em;
    }
    #calendar {
      text-align: center;
      margin-left: auto;
      margin-right: auto;
    }
  </style>

</head>

<body>

  <div id="page">

    <div id="menu">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/menu/menu.php'); ?>
    </div>

    <div id="head">
      <img src="/images/headers/header_main_left.png" class="headerimgleft" alt="Fast Response School of Health Care Education" />
      <img src="/images/headers/header_phlebotomy_right.jpg" class="headerimgright" alt="" />
      <div class="clearfix"></div>
    </div>

    <div id="main">

      <div class="section">

	      <div class="rightsidebar2">
	        <div class="quicklinks2">
	          <a href="/pdfs/Fast Response Catalog 2013.pdf" class="btn3 lines-2">
	            <div>Course<br />Catalog</div>
	            <div></div><div></div><div></div><div></div>
	          </a>
	          <a href="http://www.ssreg.com/fastresponse/calendar.asp?page=Calendar" class="btn3 lines-2">
	            <div>CEU<br />Calendar</div>
	            <div></div><div></div><div></div><div></div>
	          </a>
	          <a href="/school/info/" class="btn2 lines-1">
	            <img src="/images/buttons/envelope-icon.png" alt="" />
	            <div>Contact Us</div>
	            <div></div><div></div><div></div><div></div>
	          </a>
	          <a href="http://www.facebook.com/FastResponseSchool" class="btn2 lines-2">
	            <img src="/images/buttons/facebook-icon.png" alt="Visit Us On Facebook" />
	            <div>Visit Us On<br />Facebook</div>
	            <div></div><div></div><div></div><div></div>
	          </a>
	        </div> <!-- /quicklinks -->
	      </div>

	      <div class="leftcontent2">

	        <h1 style="text-align: center; text-shadow: 2px 3px 8px #650010;">Upcoming Course Dates</h1>

          <div class="section">
	        <?php
            foreach (array('EMT', 'CPT', 'CMA', 'SPT', 'Paramedic') as $course) {
	            echo "<div class=\"course\">\n";
	            echo "<h2>$course</h2>\n";
	            echo "<ul class=\"bullets\">\n";
	            $dates = query_course_dates($handle, $course, null, null);
	            if (!is_array($dates) || !count($dates)) {
		            echo "<li class=\"red\">No classes currently scheduled</li>\n";
              }
	            else {
		            foreach ($dates as $onedate) {
		              echo "<li>{$onedate['type']}: {$onedate['showdate']}</li>\n";
		              $event = $calendar->event()
		                ->condition('timestamp', strtotime($onedate['showdate']))
		                ->title('')
		                ->output("{$onedate['course']} {$onedate['type']}")
		                ->add_class('red')
		              ;
		              $calendar->attach($event);
		            }
	            }
	            echo "</ul>\n";
	            echo "</div>\n";
	          }
	        ?>
          </div>

	        <div class="section">
	          <table id="calendar">
	            <thead>
	              <tr class="cal-nav">
		              <th class="prev-month">
		                <a href="<?= htmlspecialchars($calendar->prev_month_url()) ?>"><?= $calendar->prev_month() ?></a>
		              </th>
		              <th colspan="5" class="current-month"><?= $calendar->month() ?> <?= $calendar->year ?>
		              </th>
		              <th class="next-month"><a href="<?= htmlspecialchars($calendar->next_month_url()) ?>"><?= $calendar->next_month() ?></a>
		              </th>
		            </tr>
		            <tr class="weekdays">
		              <?php foreach ($calendar->days() as $day): ?>
		                <th><?= $day ?></th>
		              <?php endforeach ?>
		            </tr>
	            </thead>
	            <tbody>
	            <?php
		          foreach ($calendar->weeks() as $week) {
		            echo "<tr>\n";
		            foreach ($week as $day) {
		              list($number, $current, $data) = $day;
		              
		              $classes = array();
		              $output  = '';
		              
		              if (is_array($data)) {
		                $classes = $data['classes'];
		                $title   = $data['title'];
		                $output  = empty($data['output']) ? '' :
			                '<ul class="output"><li>' .
                      implode('</li><li>', $data['output']) . '</li></ul>';
		              }
		              echo "<td class=\"day " . implode(' ', $classes) . "\">\n";
		              echo "<span class=\"date\" title=\"" .
                       implode(' / ', $title) . "\"> $number </span>\n";
		              echo "<div class=\"day-content\">\n";
		              echo "$output\n";
		              echo "</div>\n";
		              echo "</td>\n";
		            }
		            echo "</tr>\n";
		          }
		          ?>
		          </tbody>
	          </table>
	        </div>


	      </div> <!-- /leftcontent -->

      </div> <!-- /section -->

      <div class="clearfix"></div>

    </div> <!-- /main -->

    <div id="footer">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/menu/footer.php'); ?>
    </div> <!-- /footer -->

  </div> <!-- /page -->

</body>
</html>
