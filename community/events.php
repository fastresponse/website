<?php

// load database code

require_once($_SERVER['DOCUMENT_ROOT'] . '/php/dbconn.php');
$handle = db_connect('events');


// events code

function format_event($handle, $event) {
  /*
   * $event = array(
   *   'id' => integer,
   *   'date' => 'date in YYYY-MM-DD format',
   *   'longdate' => 'date in MMM DD, YYYY format',
   *   'title' => 'string',
   *   'body' => 'html?',
   *   'thumbnail' => 'image url',
   *   'programs' => array(
   *     'EMT', 'CPT', ...
   *   ),
   *   'imagesize' => 'small/medium/large',
   *   'images' => array(
   *     'image url 1', 'image url 2', ...
   *   ),
   *   'links' => array(
   *     'link text 1' => 'link url 1',
   *     'link text 2' => 'link url 2',
   *   )
   * );
   */

  // html_entity_decode to counteract the htmlentities() that all text from
  // the db_query func is sent through
  $event['body'] =
    "<p>" .
    str_replace(
      "\n",
      "</p>\n<p>",
      html_entity_decode($event['body'])
    ) .
    "</p>"
  ;

  $event['programs'] = str_replace(',', ', ', $event['programs']);

  if (!isset($event['thumbnail']))
    $event['thumbnail'] = '';
  
  if ($event['thumbnail'] != '')
    $event['thumbnail'] = "<img src='{$event['thumbnail']}' alt='' class='event-thumbnail' />";

  if (!isset($event['imagesize']))
    $event['imagesize'] = '';

  if (isset($event['images'])) {
    $event['images'] = explode(',', $event['images']);
    $tmp = '';
    foreach ($event['images'] as $image) {
      $tmp .= "<img src='$image' alt='' class='event-image size-{$event['imagesize']}' />";
    }
    $event['images'] = $tmp;
  }
  else
    $event['images'] = '';

  if (isset($event['links'])) {
    $event['links'] = explode(',', $event['links']);
    $tmp = '';
    foreach ($event['links'] as $linktext) {
      $data = query_button($handle, $linktext);
      if (!isset($data) || !count($data)) continue;
      $linkurl = $data['link'];
      $tmp .= "<a href='$linkurl' class='event-link'>$linktext</a>";
    }
    $event['links'] = $tmp;
  }
  else
    $event['links'] = '';

  foreach ($event as $key => $val) {
    if (is_int($key) || $key == 'html' || $key == 'thumbnail') continue;
    $classes = "event-$key";
    if ($val == '') $classes .= ' empty';
    $event[$key] = "<div class='$classes'>$val</div>";
  }

  return $event;
}

function get_events($handle, $max) {
  $defs = array(
    'connerr' => array(
      'id' => 0,
      'title' => 'Events',
      'body' => 'There was a problem connecting to the server. Please try again later.',
    ),
    'notfound' => array(
      'id' => 0,
      'title' => 'Events',
      'body' => 'There were no events found.',
    ),
  );

  if (!isset($handle)) {
    $results = array($defs['connerr']);
  }
  else if (!isset($max)) {
    $results = array($defs['notfound']);
  }
  else {
    $results = query_recent_events($handle, $max);
  }

  if (!isset($results))
    $results = array($defs['notfound']);

  // loop variable by reference
  // lets us change the value in the original array
  foreach ($results as &$result) {
    $result = format_event($handle, $result);
  }
  unset($result); // break reference

  return $results;
}

$events = get_events($handle, 8);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">

<head>
  <title>Community Events | Fast Response</title>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="robots" content="INDEX, FOLLOW">
  <meta name="googlebot" content="INDEX, FOLLOW">

  <link type="image/x-icon" rel="shortcut icon" href="/misc/favicon.ico" />

  <link type="text/css" rel="stylesheet" media="all" href="/css/template.css" />
  <link type="text/css" rel="stylesheet" media="all" href="/css/buttons.css" />
  <link type="text/css" rel="stylesheet" media="all" href="/css/nicemenus.css" />
  <link type="text/css" rel="stylesheet" media="print" href="/sites/all/themes/fastresponse/css/print.css" /> 
  <!--[if lte IE 6]><style type="text/css" media="all">@import "/sites/all/themes/fastresponse/css/ie6.css";</style><![endif]-->
  <!--[if IE 7]><style type="text/css" media="all">@import "/sites/all/themes/fastresponse/css/ie7.css";</style><![endif]-->
  <!--[if lte IE 8]><style type="text/css" media="all">@import "/css/buttons-ie.css";</style><![endif]-->


  <!-- for jquery calendar -->
	<link rel="stylesheet" href="/js/eventCalendar/css/eventCalendar.css">
	<!--<link rel="stylesheet" href="/js/eventCalendar/css/eventCalendar_theme_responsive.css">-->


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


  <script src="/js/jquery-1.10.2.min.js" type="text/javascript"></script>

  <!--<script src="/js/jquery.eventCalendar.min.js" type="text/javascript"></script>-->
  <script src="/js/eventCalendar/js/jquery.eventCalendar.js" type="text/javascript"></script>


  <style type="text/css">
    .leftcontent2 {
      padding-right: 300px;
    }
    .rightsidebar2 {
      width: 300px;
    }
    .article-box {
      display: block;
      width: 95%;
      margin-left: auto;
      margin-right: auto;
    }
    .article-box .body {
      width: 75%;
      text-align: left;
    }
    
    .empty {
      display: none;
    }
    .event-date,
    .event-id {
      display: none;
    }

    .event-title {
      /*
      font-size: 120%;
      font-weight: bold;
      letter-spacing: 0.08em;
      */
    }
    .event-longdate,
    .event-programs {
      /*margin-top: 5px;*/
    }
    .event-body {
      /*
      width: 90%;
      display: block;
      */
      padding: 0 5% 1%;
    }
    .event-body p {
      margin-bottom: 0;
    }
    .event-thumbnail {
      float: right;
      max-width: 200px;
      margin: 0 10px 10px;
    }

    .event-links,
    .event-images {
      width: 100%;
      margin-top: 1%;
      text-align: center;
    }
    .event-link {
      display: inline-block;
      padding: 5px 7px;
      border: 1px solid white;
      border-radius: 5px;
      margin: 5px;
      text-decoration: none;
    }
    .event-link:hover {
      /*color: rgb(221, 0, 51);
      border-color: rgb(221, 0, 51);*/
    }
    .event-image {
      display: inline-block;
      margin: 5px;
      vertical-align: top;
      /*height: 120px;*/
    }
    .event-image.size-small {
      height: 110px;
    }
    .event-image.size-medium {
      height: 150px;
    }
    .event-image.size-large {
      height: 200px;
    }
      
  </style>

  <style type="text/css">
    .eventsCalendar-daysList {
      padding-left: 0;
    }
    .eventsCalendar-daysList li.dayWithEvents {
      background: rgba(150, 150, 150, 0.4);
    }
    .eventsCalendar-daysList li a {
      font-size: 12px;
    }
    .eventDesc.hidden,
    .eventDesc.hidden .bt {
      visibility: visible;
      max-width: none;
      max-height: none;
      overflow: auto;
      margin: 1em auto;
    }
    .eventDesc.hidden .bt {
      display: inline;
    }
    .eventsCalendar-list {
      padding-left: 20px;
    }
    .eventsCalendar-list li {
      margin-bottom: 10px;
    }
    .eventsCalendar-list li small {
      display: none;
    }
    .eventsCalendar-list .deadline,
    .eventsCalendar-list .deadline a {
      color: red;
    }
    .eventsCalendar-list .class-start,
    .eventsCalendar-list .class-start a {
      color: orange;
    }
    .eventTitle {
      margin-left: 20px;
      display: block;
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
      <img src="/images/headers/header_main_right.jpg" class="headerimgright" alt="" />
      <div class="clearfix"></div>
    </div>

    <div id="main">

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
              txt_NextEvents: "Upcoming Classes and Events:"
					  });
				  });
			  </script>
	    </div>

	    <div class="leftcontent2">

        <h1 style="text-align: center;">Community Events</h1>

        <?php foreach ($events as $event): ?>
          <pre><?php //print_r($event); ?></pre>
          <div class="event article-box">
            <div class="title">
              <div class="title-border">
                <table cellpadding="0"><tbody><tr>
                  <td class="left"><h2><?= $event['longdate'] ?></h2></td>
                  <td class="center"><h1><?= $event['title'] ?></h1></td>
                  <td class="right"><h2><?= $event['programs'] ?></h2></td>
                </tr></tbody></table>
              </div>
            </div>
            <div class="body">
              <?= $event['thumbnail'] ?>
              <?= $event['body'] ?>
              <?= $event['links'] ?>
              <?= $event['images'] ?>
            </div>
          </div>
        <?php endforeach; ?>

	    </div> <!-- /leftcontent -->

      <div class="clearfix"></div>
    </div> <!-- /main -->

    <div id="footer">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/menu/footer.php'); ?>
    </div> <!-- /footer -->

  </div> <!-- /page -->

</body>
</html>
