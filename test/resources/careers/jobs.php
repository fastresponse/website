<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">

<?php
  include_once('../dbconn.php');
  $handle = db_connect();
?>

<head>
  <title>Career Resources Administration | Fast Response</title>

  <base href="/" />

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="robots" content="INDEX, FOLLOW">
  <meta name="googlebot" content="INDEX, FOLLOW">

  <link type="image/x-icon" rel="shortcut icon" href="/misc/favicon.ico" />

  <link type="text/css" rel="stylesheet" media="all" href="/css/template.css" />
  <link type="text/css" rel="stylesheet" media="all" href="/css/buttons.css" />
  <link type="text/css" rel="stylesheet" media="all" href="/css/careers.css" />
  <link type="text/css" rel="stylesheet" media="all" href="/css/nicemenus.css" />
  <link type="text/css" rel="stylesheet" media="print" href="/sites/all/themes/fastresponse/css/print.css" /> 
  <!--[if lte IE 6]><style type="text/css" media="all">@import "/sites/all/themes/fastresponse/css/ie6.css";</style><![endif]-->
  <!--[if IE 7]><style type="text/css" media="all">@import "/sites/all/themes/fastresponse/css/ie7.css";</style><![endif]-->
  <!--[if lte IE 8]><link type="text/css" rel="stylesheet" media="all" href="/css/buttons-ie.css" /><![endif]-->


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

  <script type="text/javascript" src="/js/datetimepicker.js"></script>
  <script type="text/javascript" src="/js/joblist.js"></script>
  <script type="text/javascript" src="/js/frlib.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $("#menu").load("/menu/menu.html");
    } );
    $(document).ready(function() {
      $("#footer").load("/menu/footer.html");
    } );
  </script>

</head>

<body>

  <div id="page">

    <div id="menu">
      <!-- filled in by javascript -->
    </div>

    <div id="head">
      <img src="/images/headers/header_main_left.png" class="headerimgleft" alt="Fast Response School of Health Care Education" />
      <img src="/images/headers/header_career_right.jpg" class="headerimgright" alt="" />
      <div class="clearfix"></div>
    </div>

    <div id="main">

      <div class="section">

	<div class="rightsidebar2">
          <div class="quicklinks2">

	    <a href="." class="btn2 buttontext">
	      <div></div><div></div><div></div><div></div>
	      <div>Back to Career Services</div>
	      <img src="/images/buttons/testenvelope.png" alt="" />
	    </a>

	    <a href="../../school/info/" class="btn2 buttontext">
	      <div></div><div></div><div></div><div></div>
	      <div>Contact Us</div>
	      <img src="/images/buttons/testenvelope.png" alt="" />
	    </a>

	  </div>
	</div>

	<div class="leftcontent2">
<?php
  include_once('./joblist.php');
  echo joblist($handle, 'Any');
?>
	</div> <!-- /leftcontent -->

      </div> <!-- /section -->

      <div class="clearfix" style="min-height: 0.1em;"></div>

    </div> <!-- /main -->

    <div id="footer">
    </div> <!-- /footer -->

  </div> <!-- /page -->

</body>
</html>
