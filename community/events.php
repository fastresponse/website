<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/php/dbconn.php');
$handle = db_connect('events');

function format_event($event) {
  /*
   * $event = array(
   *   'id' => integer,
   *   'date' => 'date in YYYY-MM-DD format',
   *   'longdate' => 'date in MMM DD, YYYY format',
   *   'title' => 'string',
   *   'body' => 'html?',
   *   'programs' => array(
   *     'EMT', 'CPT', ...
   *   ),
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

  if (isset($event['images']) && is_array($event['images'])) {
    $tmp = '';
    foreach ($event['images'] as $image) {
      $tmp .= "<img src='$image' alt='' class='image' />";
    }
    $event['images'] = $tmp;
  }
  else
    $event['images'] = '';

  if (isset($event['links'])) {
    $event['links'] = explode(',', $event['links']);
    $tmp = '';
    foreach ($event['links'] as $linktext => $linkurl) {
      $tmp .= "<a href='$linkurl' class='link'>$linkurl</a>";
    }
    $event['links'] = $tmp;
  }
  else
    $event['links'] = '';

  foreach ($event as $key => $val) {
    if (is_int($key) || $key == 'html') continue;
    $classes = $key;
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
    $result = format_event($result);
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
    .leftcontent2 {
      padding-right: 250px;
    }
    .rightsidebar2 {
      width: 250px;
    }
    .event {
      width: 80%;
      vertical-align: top;
      margin: 0 auto;
      border: 1px solid rgb(150, 150, 150);
      padding: 2%;
    }
    .event div {
      display: inline-block;
      vertical-align: top;
      width: 33%;
    }
    .event div.empty {
      display: none;
    }
    .event .date,
    .event .id {
      display: none;
    }
    .event .links {
      width: 100%;
      margin-top: 1%;
    }
    .event .link {
      display: inline-block;
      padding: 5px;
      border: 1px solid white;
      margin: 5px;
      text-decoration: none;
    }
    .event .title {
      font-size: 120%;
      font-weight: bold;
      letter-spacing: 0.08em;
      color: orange;
    }
    .event .body {
      width: 100%;
      padding: 0 5%;
      display: block;
    }
    .event .body p {
      margin-bottom: 0;
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
        <div style="margin-bottom: 50px;">Upcoming classes</div>
        <div>Calendar</div>
	    </div>

	    <div class="leftcontent2">

        <h1 style="text-align: center;">Community Events</h1>

        <?php foreach ($events as $event): ?>
          <pre><?php //print_r($event); ?></pre>
          <div class="event section">
          <?= $event['longdate'] ?>
          <?= $event['date'] ?>
          <?= $event['title'] ?>
          <?= $event['programs'] ?>
          <?= $event['id'] ?>
          <?= $event['body'] ?>
          <?= $event['links'] ?>
          <?= $event['images'] ?>
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
