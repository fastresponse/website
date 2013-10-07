<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/php/dbconn.php');
$handle = db_connect('promos');

function format_promo($handle, $onepromo) {
  $buttons = array();

  foreach (explode(',', $onepromo['buttons']) as $text) {
    $button_result = query_button($handle, $text);
    if ($button_result) {
      /*
      if (array_key_exists('image', $button_result) && strlen($button_result['image'])) {
        $img = "  <img src='{$button_result['image']}' alt='' />\n";
        $class = "btn2";
      }
      else*/ {
        $img = "";
        $class = "btn3";
      }
      

      $text = explode('\n', $button_result['text']);
      $lines = count($text);
      $text = implode('<br />', $text);
      $class .= " lines-$lines";

      $button_result['text'] = $text;
      $button_result['html'] = 
        "<a href='{$button_result['link']}' class='$class'>\n" .
        "$img" .
        "  <div>$text</div>\n" .
	      "  <div></div><div></div><div></div><div></div>\n" .
	      "</a>\n"
      ;

      $buttons[] = $button_result;
    }
  }

  $codeid = sanitize_id($onepromo['code']);

  // html_entity_decode needed because we htmlentities() all text from
  // the db_query func by default
  $onepromo['body'] =
    "<div id='body_$codeid'>" .
    '<p>' . str_replace("\n", "</p>\n<p>",
      html_entity_decode($onepromo['body'])
    ) . '</p>' .
    "</div>\n"
  ;
  $onepromo['header'] = "<h2 id='header_$codeid'>{$onepromo['header']}</h2>\n";

  $onepromo['buttons'] = $buttons;

  if (!$onepromo['start_date'] && !$onepromo['end_date']) {
    $onepromo['dates'] = '(ongoing offer)';
  }
  else {
    $onepromo['dates'] = '(offer valid';
    if ($onepromo['start'])
      $onepromo['dates'] .= ' from ' . $onepromo['start'];
    if ($onepromo['end'])
      $onepromo['dates'] .= ' until ' . $onepromo['end'];
    $onepromo['dates'] .= ')';
  }

  $onepromo['dates'] = "<div id='dates_$codeid' class='red'>{$onepromo['dates']}</div>";

  return $onepromo;
}

function get_single_promo($handle, $code) {
  $defs = array(
    'connerr' => array(
      'title' => 'Promotions',
      'header' => 'Connection Error',
      'body' => 'There was a problem connecting to the server. Please try again later.',
      'buttons' => 'Contact Us',
    ),
    'notfound' => array(
      'title' => 'Promotions',
      'header' => 'Code Not Found',
      'body' => 'There was no promotion found with that code.',
      'buttons' => 'Contact Us',
    ),
  );

  if (!$handle)
    $result = $defs['connerr'];
  else if (!$code)
    $result = $defs['notfound'];

  $result = query_promo($handle, $code);

  if (!$result)
    $result = $defs['notfound'];

  $result = format_promo($handle, $result);

  return $result;
}

$list = null;
$code = null;
$page_data = array(
  'title' => '',
  'sections' => array(),
);

if (array_key_exists('list', $_GET)) {
  $list = $_GET['list'];
  switch ($list) {
    case 'active':
      $results = query_promo_dates($handle, date('Y-m-d'));
      $page_data['title'] = 'Active Promotions';
    break;

    case 'all':
      $results = query_promo_dates($handle);
      $page_data['title'] = 'All Promotions';
    break;

    case 'dates':
      if (!array_key_exists('start', $_GET) || !array_key_exists('end', $_GET)) {
        // error
      }
      // filter these dates
      $start_date = $_GET['start'];
      $end_date = $_GET['end'];
      $results = query_promo_dates($handle, $start_date, $end_date);
      $page_data['title'] = 'Promotions from ' . $start_date . ' to ' . $end_date;
    break;
  }

  foreach ($results as $onepromo) {
    array_push($page_data['sections'], format_promo($handle, $onepromo));
  }
}

else if (array_key_exists('code', $_GET)) {
  $code = $_GET['code'];
  $tmparr = get_single_promo($handle, $code);
  $page_data['title'] = $tmparr['title'];
  $page_data['sections'] = array($tmparr);
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">

<head>
  <title><?= $page_data['title'] ?> | Fast Response</title>

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
  #main {
    text-align: justify;
  }
  .cell {
    display: inline-block;
    vertical-align: top;
    margin: 2em 1%;
    width: 46%;
    min-width: 600px;
  }
  .cell .quicklinks2 {
    height: auto;
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

      <h1 style='text-align: center;'><?= $page_data['title'] ?></h1>
      
      <?php foreach($page_data['sections'] as $section): ?>
      <div class="cell">

	      <div class="rightsidebar2">
	        <div class="quicklinks2">
            <?php foreach($section['buttons'] as $button): ?>
              <?= $button['html'] ?>
            <?php endforeach; ?>
	        </div>
	      </div>

	      <div class="leftcontent2">
          <?= $section['header'] ?>
          <?= $section['dates'] ?>
          <?= $section['body'] ?>
	      </div> <!-- /leftcontent -->

      </div> <!-- /section -->

      <!--<div class="clearfix"></div>-->
      <?php endforeach; ?>

      <div class="clearfix" style="display: inline-block; width: 100%;"></div>
    </div> <!-- /main -->

    <div id="footer">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/menu/footer.php'); ?>
    </div> <!-- /footer -->

  </div> <!-- /page -->

</body>
</html>
