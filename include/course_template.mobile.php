<?php
translate_includes();
query_links_from_db();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
<title><?= $page_title ?> | Fast Response</title>

  <meta name="description" content="<?= $page_description ?>" />

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta charset="utf-8" />
  <meta name="robots" content="INDEX, FOLLOW" />
  <meta name="googlebot" content="INDEX, FOLLOW" />

  <meta name="viewport" content="width=device-width,initial-scale=1" />

  <link type="image/x-icon" rel="shortcut icon" href="/misc/favicon.ico" />

  <!--<link type="text/css" rel="stylesheet" media="all" href="/css/template.css" />-->

  <link type="text/css" rel="stylesheet" media="all" href="/css/reset.css" />
  <link type="text/css" rel="stylesheet" media="all" href="/css/base.css" />
  <link type="text/css" rel="stylesheet" media="all" href="/css/footer.css" />
  <link type="text/css" rel="stylesheet" media="all" href="/css/article-box.css" />

  <link type="text/css" rel="stylesheet" media="all" href="/css/nicemenus.css" />
  <link type="text/css" rel="stylesheet" media="all" href="/css/buttons.css" />
  <link type="text/css" rel="stylesheet" media="all" href="/include/css/course_pages.css" />
  <link type="text/css" rel="stylesheet" media="all" href="/include/css/course_contact.css" />

  <link type="text/css" rel="stylesheet" media="print" href="/sites/all/themes/fastresponse/css/print.css" /> 

  <!--[if lte IE 8]><style type="text/css" media="all">@import "/css/buttons-ie.css";</style><![endif]-->


  <link type="text/css" rel="stylesheet" href="/js/popup/magnific-popup.css" />

  <?php include_once('analytics_google.php'); ?>

  <script type="text/javascript" src="/js/jquery-1.10.2.min.js"></script>

  <?php foreach($sections['head'] as $incl): ?>
    <?php include($incl); ?>
  <?php endforeach; ?>

  <script type="text/javascript" src="/js/popup/jquery.magnific-popup.min.js"></script>
  <script type="text/javascript" src="/js/jquery.slideshow.js"></script>
  <script type="text/javascript" src="/js/jquery.sameheight.js"></script>

  <script type="text/javascript">

    var slideshow_started = false;
    var slide_pause_time = 10000;
    var slide_fade_time = 900;

  <?php
    error_reporting(0);

    $slide_path =
      '/slideshow/' . strtolower($course_abbr) . '/'
    ;
    $files_list = array_diff(
      scandir($_SERVER['DOCUMENT_ROOT'] . $slide_path, 0),
      array('..', '.', 'Thumbs.db')
    );

    // remove first file from list, output as normal html
    $first_slide = '  <img src="' . $slide_path . array_shift($files_list) . '" alt="" />';

    // send the rest of the slides to jquery to be loaded
    // this way it only displays multiple slides if the browser supports it
    $slides_list = array();
    foreach ($files_list as $slidefile) {
      $slides_list[] = '  "' . $slide_path . $slidefile . '"';
    }

    $slideload = implode(",\n", $slides_list);
    echo <<<SLIDESOUT
    var slides_to_load = [
    $slideload
    ];
SLIDESOUT;
  ?>

    function load_slides(elem) {
      for (var i = 0; i < slides_to_load.length; i++) {
        jQuery('<img/>', {
          src: slides_to_load[i],
          alt: ''
        }).appendTo(elem);
      }
    }

    function start_slideshow() {
      if (slideshow_started || jQuery(window).width() < 1024)
        return;
      load_slides( jQuery('.course-header-slideshow') );
      jQuery(".slideshow").slideshow(slide_pause_time, slide_fade_time);
      slideshow_started = true;
    }

    jQuery(document).ready(function() {
      start_slideshow();

      //jQuery('.article-box .body').sameHeight();

      jQuery('.course-header-slideshow').magnificPopup({
        delegate: 'img',
        type: 'image',
        gallery: { enabled: true },
        image: { verticalFit: true },
        callbacks: {
          elementParse: function(item) {
            item.src = item.el.context.src;
          }
        }
      });
    });

    jQuery(window).resize(function() {
      start_slideshow();
      //jQuery('.article-box .body').sameHeight();
    });
  </script>

  <style type="text/css">
    .course-header-slideshow {
      cursor: pointer;
    }
  </style>

</head>

<body>
<div id="page">

<?php if ($device == 'phone'): ?>
  <header>
  <?php foreach($sections['mobile headers'] as $incl): ?>
    <?php include($incl); ?>
  <?php endforeach; ?>
  </header>

  <section id="main">
    <main>
    <?php foreach($sections['mobile'] as $incl): ?>
      <?php include($incl); ?>
    <?php endforeach; ?>
    </main>
  </section>
<?php else: ?>
  <nav id="menu">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/menu/menu.php'); ?>
  </nav>

  <header id="head">
    <aside class="left">
    <?php foreach($sections['topleft'] as $incl): ?>
      <?php include($incl); ?>
    <?php endforeach; ?>
    </aside>

    <aside class="right">
    <?php foreach($sections['topright'] as $incl): ?>
      <?php include($incl); ?>
    <?php endforeach; ?>
    </aside>

    <?php foreach($sections['topcenter'] as $incl): ?>
    <section>
      <?php include($incl); ?>
    </section>
    <?php endforeach; ?>

    <div class="clearfix"></div>
  </header>

  <section id="main">
    <main class="content">
    <?php foreach($sections['center'] as $incl): ?>
      <?php include($incl); ?>
    <?php endforeach; ?>
    </main>

    <aside class="left">
    <?php foreach($sections['left'] as $incl): ?>
      <section>
        <?php include($incl); ?>
      </section>
    <?php endforeach; ?>
    </aside>

	  <aside class="right">
    <?php foreach($sections['right'] as $incl): ?>
      <section>
        <?php include($incl); ?>
      </section>
    <?php endforeach; ?>
	  </aside>

    <div class="clearfix"></div>
  </section>
<?php endif; ?>

  <footer id="footer">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/menu/footer.php'); ?>
  </footer>

</div> <!-- /page -->
</body>
</html>
