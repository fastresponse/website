<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/php/video_list.php');

if (isset($_GET) && isset($_GET['set']))
  $which = $_GET['set'];

$dataset = array(
  'all' => array(
    'page title' => 'Video Gallery',
    'page header' => 'Fast Response Videos',
    'categories' => array('.*'),
  ),
  'emt' => array(
    'page title' => 'EMT Videos',
    'page header' => 'EMT Skills Videos from Fast Response',
    'categories' => array('emt skills'),
  ),
);

if (!isset($which) || !array_key_exists($which, $dataset) ) $which = 'all';

$page_title = $dataset[$which]['page title'];
$page_header = $dataset[$which]['page header'];
$video_list = get_videos($dataset[$which]['categories']);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title><?= $page_title ?> | Fast Response</title>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta charset="utf-8" />
  <meta name="robots" content="INDEX, FOLLOW" />
  <meta name="googlebot" content="INDEX, FOLLOW" />

  <meta name="viewport" content="width=device-width,initial-scale=1" />

  <link type="image/x-icon" rel="shortcut icon" href="/misc/favicon.ico" />

<!--
  <link type="text/css" rel="stylesheet" media="all" href="/css/reset.css" />
  <link type="text/css" rel="stylesheet" media="all" href="/css/base.css" />
  <link type="text/css" rel="stylesheet" media="all" href="/css/footer.css" />
-->
  <link type="text/css" rel="stylesheet" media="all" href="/css/template.css" />
  <link type="text/css" rel="stylesheet" media="all" href="/css/nicemenus.css" />
  <link type="text/css" rel="stylesheet" media="all" href="/css/buttons.css" />

  <link type="text/css" rel="stylesheet" media="screen" href="/js/zoombox/zoombox.css" /> 

  <!--[if lte IE 8]><style type="text/css" media="all">@import "/css/buttons-ie.css";</style><![endif]-->

  <!--<script type="text/javascript" src="/js/jquery-1.10.2.min.js"></script>-->

  <style type="text/css">
    figure {
      display: inline-block;
      text-align: center;
      width: 170px;
      height: 125px;
      vertical-align: top;
    }
  </style>

</head>

<body>
<div id="page">

  <nav id="menu">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/menu/menu.php'); ?>
  </nav>

  <header id="head">
    <img src="/images/headers/header_main_left.png" alt="" />
  </header>

  <main id="main">

    <header>
      <h1><?= $page_header ?></h1>
    </header>

    <section>
      <?php foreach ($video_list as $vid): ?>
      <figure>
        <a class="zoombox zgallery1" title="<?= $vid['title'] ?>" href="http://view.vzaar.com/<?= $vid['num'] ?>/player">
          <img src="http://view.vzaar.com/<?= $vid['num'] ?>/thumb" alt="<?= $vid['title'] ?>" />
        </a>
        <figcaption><?= $vid['title'] ?></figcaption>
      </figure>
      <?php endforeach; ?>
    </section>

  </main>

  <footer id="footer">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/menu/footer.php'); ?>
  </footer>

</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script> 
<script type="text/javascript" src="/js/zoombox/zoombox.js"></script> 
<script type="text/javascript">
  $(function() {
    $('a.zoombox').zoombox({
      theme       : 'zoombox',        //available themes: 
                                      //zoombox,lightbox, prettyphoto, 
                                      //darkprettyphoto, simple
      opacity     : 0.8,              // Black overlay opacity
      duration    : 800,              // Animation duration
      animation   : true,             // Do we have to animate the box?
      width       : 600,              // Default width
      height      : 400,              // Default height
      gallery     : true,             // Allow gallery thumb view
    });
  });
</script>

</body>
</html>
