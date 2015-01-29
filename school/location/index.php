<?php

  $dir = dirname($_SERVER['PHP_SELF']);
  if (substr($dir, -1) != '/') $dir .= '/';

  $query_args = array();
  parse_str($_SERVER['QUERY_STRING'], $query_args);
  $allowed_sections = array(
    'maps', 'directions', 'transit', 'parking',
  );
  if (!array_key_exists('section', $query_args) ||
      !in_array($query_args['section'], $allowed_sections)) {
	$section = 'maps';
  }
  else {
    $section = $query_args['section'];
  }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">

<head>
  <title>Maps, Directions, Transit, Parking | Fast Response</title>

  <base href="/" />

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="robots" content="INDEX, FOLLOW">
  <meta name="googlebot" content="INDEX, FOLLOW">

  <link type="image/x-icon" rel="shortcut icon" href="/misc/favicon.ico" />

  <link type="text/css" rel="stylesheet" media="all" href="/css/template.css" />
  <link type="text/css" rel="stylesheet" media="all" href="/css/nicemenus.css" />
  <link type="text/css" rel="stylesheet" media="print" href="/sites/all/themes/fastresponse/css/print.css" /> 
  <!--[if lte IE 6]><style type="text/css" media="all">@import "/sites/all/themes/fastresponse/css/ie6.css";</style><![endif]-->
  <!--[if IE 7]><style type="text/css" media="all">@import "/sites/all/themes/fastresponse/css/ie7.css";</style><![endif]-->


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

  <script type="text/javascript" src="/js/frlib.js"></script>

  <script type="text/javascript">
    setSection( "location", [
      "locationmaps", "locationdirections", "locationtransit", "locationparking"
    ] );
    setSection( "location_nav", [
      "locationmaps_nav", "locationdirections_nav",
      "locationtransit_nav", "locationparking_nav"
    ] );
  </script>

  <style type="text/css">
    .smallnavbar div {
      font-size: 110%;
      line-height: 2.25em;
    }
  </style>

</head>

<body onLoad="resizeIframe(findObj('locationparking')); if (!navigated) navigateToSection('location', 'location<?= $section ?>', 'location_nav', 'location<?= $section ?>_nav', 'highlight'); setSource('location<?= $section ?>', '<?= $dir . $section ?>.html', 'false');">

  <div id="page">

    <div id="menu">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/menu/menu.php'); ?>
    </div>

    <div id="head">
      <img src="/images/headers/header_main_left.png" class="headerimgleft" alt="Fast Response School of Health Care Education" />
      <img src="/images/headers/header_map_right.jpg" class="headerimgright" alt="" />
      <div class="clearfix"></div>
    </div>

    <div id="main">

      <div class="section">
	<div class="smallnavbar" style="margin-bottom: 2em;">
	  <div id="locationmaps_nav" class="column col4 underline pointer highlight" onClick="navigateToSection('location', 'locationmaps', 'location_nav', this.id, 'highlight'); setSource('locationmaps', '<?= $dir ?>maps.html', false);">
	    Maps
	  </div>
	  <div id="locationdirections_nav" class="column col4 underline pointer" onClick="navigateToSection('location', 'locationdirections', 'location_nav', this.id, 'highlight'); setSource('locationdirections', '<?= $dir ?>directions.html', false);">
	    Directions
	  </div>
	  <div id="locationtransit_nav" class="column col4 underline pointer" onClick="navigateToSection('location', 'locationtransit', 'location_nav', this.id, 'highlight'); setSource('locationtransit', '<?= $dir ?>transit.html', false);">
	    Transit
	  </div>
	  <div id="locationparking_nav" class="column col4 underline pointer" onClick="navigateToSection('location', 'locationparking', 'location_nav', this.id, 'highlight'); setSource('locationparking', '<?= $dir ?>parking.html', false);">
	    Parking
	  </div>
	</div>
      </div>

      <div class="section">

	<div class="column" style="width: 25%; font-weight: bold;">
	  <h3>Our address is:</h3>
	  <p>
	  <address style="padding-left: 0.5em;">
	    Fast Response School of Health Care Education<br />
	    2075 Allston Way, Suite B<br />
	    Berkeley, California 94704
	  </address>
	  </p>
	  <p style="color: #DD0033;">
	  Please note that any information on this page may change at any time!
	  </p>
	  <p>
	  We encourage you to <a href="/school/info/">contact us</a> if you have any questions about how to find our location. We'll be happy to assist you.
	  </p>
	</div>

        <div class="column iframefill" style="height: 450px; width: 65%;">

	  <iframe id="locationmaps" allowtransparency="true" frameborder="0"></iframe>
	  <iframe id="locationdirections" allowtransparency="true" frameborder="0"></iframe>
	  <iframe id="locationtransit" allowtransparency="true" frameborder="0"></iframe>
	  <iframe id="locationparking" allowtransparency="true" frameborder="0"></iframe>

	</div>

      </div> <!-- /section -->
      <div class="clearfix"></div>

    </div> <!-- /main -->

    <div id="footer">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/menu/footer.php'); ?>
    </div> <!-- /footer -->

  </div> <!-- /page -->

</body>
</html>
