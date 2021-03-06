<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">

<head>
  <title>Sitemap | Fast Response</title>

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

  <script type="text/javascript" src="/js/jquery.js"></script>

  <script type="text/javascript">
    function reloadStylesheets() {
      var queryString = '?reload=' + new Date().getTime();
      $('link[rel="stylesheet"]').each(function () {
	this.href = this.href.replace(/\?.*|$/, queryString);
      });
    }
  
    $(document).ready(function() {
      /* load the menu list for use as the sitemap
	 change the ID so it's different and remove the menu css
      */
      $("#sitemap > ul").attr("id", "sitemap-menu");
      $("#sitemap *").removeClass();
      reloadStylesheets();
    } );
  </script>

  <style type="text/css">
    #sitemap-menu {
      display: inline-block;
      width: 100%;
      padding-left: 0;
      margin-left: 0;
      box-sizing: border-box;
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
    }
    #sitemap-menu ul {
      margin-left: 0;
      padding-left: 1em;
    }
    #sitemap-menu>li {
      /* margin-bottom: 2em; */
      font-size: 140%;
      display: inline-block;
      width: 19.5%; /* depends on 5 columns */
      vertical-align: top;
      box-sizing: border-box;
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
    }
    #sitemap-menu>li>ul>li {
      margin-top: 0.5em;
      /* 85% of 140% = 119% */
      font-size: 85%;
      box-sizing: border-box;
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
    }
    #sitemap-menu>li>ul>li>ul>li {
      /* 84% of 119% = 100% */
      font-size: 84%;
      line-height: 1.4em;
      box-sizing: border-box;
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
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

      <div class="section">

	<div id="sitemap">
	  <?php include($_SERVER['DOCUMENT_ROOT'] . '/menu/menu.php'); ?>
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
