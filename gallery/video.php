<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title></title>

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
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script> 

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

    <a class="zoombox zgallery1" title="Skin Assessment" href="http://view.vzaar.com/1003688/player">
      <img src="http://view.vzaar.com/1003688/thumb" alt="EMT Skin Assessment" />
    </a>
    
  </main>

  <footer id="footer">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/menu/footer.php'); ?>
  </footer>

</div>

<script type="text/javascript" src="/js/zoombox/zoombox.js"></script> 
<script type="text/javascript">
  $(function() {
    $('a.zoombox').zoombox({
      theme       : 'zoombox',        //available themes: 
                                      //zoombox,lightbox, prettyphoto, 
                                      //darkprettyphoto, simple
      opacity     : 0.8,              // Black overlay opacity
      duration    : 800,              // Animation duration
      animation   : true,             // Do we have to animate the box ?
      width       : 600,              // Default width
      height      : 400,              // Default height
      gallery     : true,             // Allow gallery thumb view
    });
  });
</script>

</body>
</html>
