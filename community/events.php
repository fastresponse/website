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
	            txt_NextEvents: "Upcoming Classes and Events"
	          });
	        });
	      </script>
      </div>

      <div class="leftcontent2">

        <h1 style="text-align: center;">Community Events</h1>

        <script type="text/javascript">
          // $.ajax call to /php/events_ajax.php
          // what to show by default?? <?php include(/php/events_ajax.php) ?> ???
        </script>
	    </div> <!-- /leftcontent -->

      <div class="clearfix"></div>
    </div> <!-- /main -->

    <div id="footer">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/menu/footer.php'); ?>
    </div> <!-- /footer -->

  </div> <!-- /page -->

</body>
</html>
