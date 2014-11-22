<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">

<head>
  <title>Courses | Fast Response</title>

  <base href="/" />

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="robots" content="INDEX, FOLLOW">
  <meta name="googlebot" content="INDEX, FOLLOW">

  <link type="image/x-icon" rel="shortcut icon" href="/misc/favicon.ico" />

  <link type="text/css" rel="stylesheet" media="all" href="/css/template.css" />
  <link type="text/css" rel="stylesheet" media="all" href="/css/nicemenus.css" />
  <link type="text/css" rel="stylesheet" media="all" href="/css/buttons.css" />
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

  <style type="text/css">
    #class-sections .section {
      width: 95%;
      margin: 3em auto;
      border: solid 1px white;
      border-radius: 1em;
      padding: 2% 0;
    }
    #class-sections .section div {
      display: inline-block;
      margin: 0 auto;
      width: 32%;
      vertical-align: middle;
    }
    #class-sections .section div * {
      display: inline-block;
      margin: 0 auto;
      width: 100%;
      vertical-align: top;
    }
    #class-sections .section h2 {
      text-align: center;
    }
    #class-sections .section ul {
      font-size: 120%;
      line-height: 2em;
    }
    #class-sections .section li {
      list-style-type: disc;
    }
    #class-sections .section img {
      height: auto;
      width: auto;
      vertical-align: middle;
      margin-top: auto;
      margin-bottom: auto;
    }
  </style>

</head>

<body>

  <div id="page">

    <div id="menu">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/menu/menu.php'); ?>
    </div>

    <div id="head">
      <!--
      <img src="/images/headers/header_main.jpg" class="headerimg" alt="Fast Response School of Health Care Education" />
      -->
      <img src="/images/headers/header_main_left.png" class="headerimgleft" alt="Fast Response School of Health Care Education" />
      <img src="/images/headers/header_phlebotomy_right.jpg" class="headerimgright" alt="" />
      <div class="clearfix"></div>
    </div>

    <div id="main">

      <div class="section">

	<div class="rightsidebar2">
	  <div class="quicklinks2">
      <div class="basic-button glow-lightblue innerglow-lightblue">
	      <a href="/pdfs/Fast Response Catalog 2014.pdf"><div>Course Catalog</div></a>
      </div>
      <div class="basic-button image-button glow-lightblue">
        <a href="/school/info/"><div>Contact Us</div><img src="/images/buttons/envelope-icon.png" alt="" /></a>
      </div>
      <div class="basic-button image-button glow-lightblue">
        <a href="http://www.facebook.com/FastResponseSchool"><div>Visit Us On Facebook</div><img src="/images/buttons/facebook-icon.png" alt="" /></a>
      </div>
	  </div> <!-- /quicklinks -->
	</div>

	<div class="leftcontent2" id="class-sections">

	  <h1 style="text-align: center; text-shadow: 2px 3px 8px #650010;">Courses offered at Fast Response School of Health Care Education</h1>

	  <div class="section">
	    <a name="career"></a>
	    <div>
	      <h2>Career Courses</h2>
	    </div>
	    <div>
	      <ul class="bullets">
          <?php
          $courses = array(
            'EMT', 'Phlebotomy', 'Pharmacy Tech',
            'Medical Assistant', 'Paramedic',
            'Sterile Processing Tech',
          );
          foreach ($courses as $name):
            $path = str_replace(' ', '_', strtolower($name));
          ?>
          <li><a href="/classes/career_courses/<?= $path ?>"><?= $name ?></a></li>
          <?php endforeach; ?>
        </ul>
	    </div>
	    <div>
	      <img alt="EMT Auto Extrication" src="/images/EMT-Auto-Extrication2.png" />
	    </div>
	  </div>

	  <div class="section">
	    <a name="continuing"></a>
	    <div>
	      <h2>Continuing Education Courses</h2>
	    </div>
	    <div>
	      <ul class="bullets">
          <?php
          $courses = array(
            'CPR', 'ACLS', 'PALS', 'ECG Basic',
            'ECG 12-Lead' => '12_lead_ecg',
            'ECG Technician' => 'ecg_tech',
            'ACLS Preparation' => 'acls_prep',
            'ITLS',
            'EMT Refresher' => 'emt_r',
          );
          foreach ($courses as $key => $value):
            if (is_numeric($key)) {
              $name = $value;
              $path = str_replace(' ', '_', strtolower($name));
            }
            else {
              $name = $key;
              $path = $value;
            }
          ?>
          <li><a href="/classes/continuing_education/<?= $path ?>"><?= $name ?></a></li>
          <?php endforeach; ?>
        </ul>
	    </div>
	    <div>
	      <img alt="Stethoscope" src="/images/ecg.png" style="height: 300px;"/>
	    </div>
	  </div>

	  <div class="section">
	    <a name="community"></a>
	    <div>
	      <h2>Community Courses</h2>
	    </div>
	    <div>
	      <ul class="bullets">
		      <li><a href="/community/cpr">CPR</a></li>
		      <li><a href="/community/first_aid">First Aid</a></li>
        </ul>
	    </div>
	    <div>
	      <img alt="CPR" src="/images/CPR_Class.jpg" />
	    </div>
	  </div>

	</div> <!-- /leftcontent -->

      </div> <!-- /section -->

      <div class="clearfix"></div>

    </div> <!-- /main -->

    <div id="footer">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/menu/footer.php'); ?>
    </div> <!-- /footer -->

  </div> <!-- /page -->

</body>
</html>
