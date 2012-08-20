<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">

<?php include('./dbconn.php'); ?>

<head>
  <title> Career Resources | Fast Response</title>

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

  <script type="text/javascript" src="/js/jquery.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $("#menu").load("/menu/menu.html");
    } );
  </script>

</head>

<body>

  <div id="page">

    <div id="menu">
      <!-- filled in by javascript -->
    </div>

    <div id="head">
      <!--
      <img src="/images/headers/header_main.jpg" class="headerimg" alt="Fast Response School of Health Care Education" />
      -->
      <img src="/images/headers/header_main_left.jpg" class="headerimgleft" alt="Fast Response School of Health Care Education" />
      <img src="/images/headers/header_career_right.jpg" class="headerimgright" alt="" />
      <div class="clearfix"></div>
    </div>

    <div id="main">

      <div class="section">

	<div class="rightsidebar">
<?php
?>
	  <div class="quicklinks">
	    <dl>
	      <a href="/resources/volunteer.php">
	        <dt><img src="/images/volunteer.png" alt="" /></dt>
		<dd>Volunteer Opportunities</dd>
	      </a>
	    </dl>
	  </div>
	</div>

	<div class="leftcontent">
<?php
  $self = $_SERVER['PHP_SELF'];
  $defhtml = <<<DEFHTML
<h2 style="text-align: center;">Career Services</h2>
<div style="width: 70%; margin: 0 auto; padding-bottom: 3em;">
  <form action="$self" method="post">
    <div style="width: 100%; text-align: center;">
      <table border="0" style="margin: 2em auto; text-align: left;">
      <tbody>
      <tr>
	<td>
	  <label style="margin-right: 3em;">Date range:</label>
	</td>
	<td>
	  <label>Applicable course:</label>
	</td>
	<td>
	  <label>Source of job:</label>
	</td>
      </tr>
      <tr>
	<td>
	  <select name="daterange" style="margin-right: 4em;">
	    <option>Last week</option>
	    <option>Last month</option>
	    <option>Last two months</option>
	  </select>
	</td>
	<td>
	  <select name="course">
	    <option>EMT</option>
	    <option>CPT</option>
	    <option>SPT</option>
	    <option>CMA</option>
	    <option>Paramedic</option>
	  </select>
	</td>
	<td>
	  <select name="source">
	    <option>Kaiser</option>
	    <option>Sutter</option>
	  </select>
	</td>
      </tr>
      </tbody></table>
      <input type="submit" value="Find jobs" />
    </div>
  </form>
</div>
DEFHTML;

  $daterange = null;
  if (array_key_exists('daterange', $_POST))
    $daterange = $_POST['daterange'];

if ($daterange == null) {
  $out = $defhtml;
}
else {
  //$ret = do_query($daterange);

  $data = array(
    array(
      'date' => 'Date here',
      'source' => 'Source (company) with link',
      'courses' => 'CMA, CPT',
      'directions' => 'Link to popup application directions',
      'text' =>
	'Actual job posting goes here. This could go on for quite a while '.
	'and could get very long, so be sure to set a maximum width on the '.
	'table and this row and cell, but let it grow vertically. There '.
	'will be lots of rows, two rows per entry.'
    ),
    array(
      'date' => 'Date here',
      'source' => 'Source (company) with link',
      'courses' => 'EMT',
      'directions' => 'Link to popup application directions',
      'text' => 'Another job posting.'
    )
  );
    
  $ret = "";

  foreach ($data as $entry) {
    $ret .= "<tr style=\"font-size: 80%;\">\n";
    $ret .= "<td>{$entry['date']}</td>\n";
    $ret .= "<td>{$entry['source']}</td>\n";
    $ret .= "<td>{$entry['courses']}</td>\n";
    $ret .= "<td>{$entry['directions']}</td>\n";
    $ret .= "</tr><tr>\n";
    $ret .= "<td colspan=\"4\" style=\"border-bottom: solid 2px red; font-size: 115%;\">\n";
    $ret .= "{$entry['text']}\n</td>\n</tr>\n";
  }

  /*
  $ret = <<<EXAMPLE
<tr style="font-size: 80%;">
  <td>Date here</td>
  <td>Source (company) with link</td>
  <td>Courses</td>
  <td>Link to popup<br />application directions</td>
</tr>
<tr>
  <td colspan="4" style="border-bottom: solid 2px red; font-size: 115%;">
  </td>
</tr>
<tr style="font-size: 80%;">
  <td>Date here</td>
  <td>Source (company) with link</td>
  <td>Courses</td>
  <td>Link to popup<br />application directions</td>
</tr>
<tr>
  <td colspan="4" style="border-bottom: solid 2px red; font-size: 115%;">
    A second posting.
  </td>
</tr>
EXAMPLE;
  */

  $out = <<<QUERYHTML
<h2 style="text-align: center;">Job Listings</h2>
<div style="width: 70%; margin: 0 auto; padding-bottom: 3em;">
  <table border="0" style="margin: 2em auto; text-align: left;">
  <tbody>
  $ret
  </tbody></table>
</div>
QUERYHTML;
}

echo $out;
?>
	</div> <!-- /leftcontent -->

      </div> <!-- /section -->

    </div> <!-- /main -->

    <div id="footer">
      <ul>
	<li><a href="/">Home</a></li>
	<li><a href="/classes/">Courses</a></li>
	<li><a href="https://fastresponse.securegw.com/cgi-bin/er/calendar_month.cgi">Calendar</a></li>
	<li><a href="/school/map_parking_and_directions">Location</a></li>
	<li><a href="/school/parking">Parking</a></li>
	<li><a href="/school/contact_us">Contact Us</a></li>
	<li><a href="http://www.facebook.com/FastResponseSchool">Visit Us On Facebook <img src="/buttons/PG_facebook_button.png" alt="Our Facebook Page"></a></li>
      </ul>
      <div id="copyright">&copy; 2009-2012 Fast Response. All Rights Reserved</div>
    </div> <!-- /footer -->

  </div> <!-- /page -->

</body>
</html>
