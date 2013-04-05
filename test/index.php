<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/php/templateload.php');
$template = new TemplateRenderer();

$slideshow = array(
  // 550, 298
  'dimensions' = array(412, 225),
  'images' = array(),
);
for ($i = 1; $i < 10; $i++) {
  $slideshow['images'][] =
    '/slideshow/412x225/slide'.sprintf('%02d',$i).'.jpg',
} 

$styles = <<<DONE
  <style type="text/css">
    table {
      width: 99%;
      vertical-align: top;
      text-align: center;
      margin-left: auto;
      margin-right: auto;
      margin-bottom 30px;
      border-collapse: collapse;
    }
    thead, tbody, tfoot, tr {
      width: 100%;
    }
    th {
      letter-spacing: 0.1em;
      font-family: Century Gothic, sans-serif;
      font-size: 125%;
      font-weight: bold;
      text-align: center;
      vertical-align: top;
      background-color: rgb(10, 30, 60);
      background-color: rgba(10, 30, 70, 0.75);
      padding: 0.5em 0;
    }
    th:first-child {
      border-top-left-radius: 6em;
      border-bottom-left-radius: 6em;
    }
    th:last-child {
      border-top-right-radius: 6em;
      border-bottom-right-radius: 6em;
    }
    th>div {
      text-shadow: 2px 2px 5px rgb(0, 0, 0);
      height: 2.5em;
      width: 80%;
      margin: 0 auto;
      padding-top: 0.25em;
      border: 2px solid rgb(200, 200, 200);
      border-radius: 1em;
      -moz-border-radius: 1em;
      -webkit-border-radius: 1em;
      box-shadow: 0px 1px 1px 1px #111111;
      -moz-box-shadow: 0px 1px 1px 1px #111111;
      -webkit-box-shadow: 0px 1px 1px 1px #111111;
      /*
      background-color: rgb(0, 15, 35);
      background-color: rgba(0, 0, 0, 0.3);
      */
      overflow: hidden;
    }
    th div div.sub {
      font-size: 0.65em;
    }
    td {
      text-align: center;
      padding-top: 3em;
    }
    tr:first-child td {
      padding-top: 2em;
    }

    table .btn {
      width: 45%;
    }

    .logotext {
      float: left;
      width: 45%;
    }
    .logotext img {
      display: block;
      width: 60%;
    }
    .logotext p {
      font-weight: bold;
      font-style: italic;
      width: 90%;
      margin: 0 auto;
    }
    #mainslideshow {
      float: right;
      max-width: 50%;
      margin-right: 3%;
      z-index: 0;
    }
    #banners .section {
      width: 100%;
      margin: 0 0 2em;
    }
    #banners .banner {
      margin: 0 2em 1.2em;
      display: inline-block;
      /* right up against the head section
         use padding on elements inside head to space them */
    }
    #banners .banner.left {
      float: left;
    }
    #banners .banner.right {
      float: right;
    }
    #banners .banner.center {
      margin: 0 auto 1.2em;
    }
    #banners .banner .btn {
      padding-left: 1em;
      padding-right: 1em;
    }
    #banners .banner .btn>div {
      width: 100%;
      text-align: center;
    }

  </style>
DONE;

$introtext = "Fast Response offers the Bay Area's most comprehensive education and resources for healthcare professionals including entry-level courses, certifications, and continuing education units.";

$banners = array(
  array(
    'align' : 'left',
    'link' : '/school/info/',
    'divstyle' : 'max-width: 46%',
    'text' : 'Contact an Admissions Representative Now!',
  ),
  array(
    'align' : 'right',
    'link' : '/classes/continuing_education/cpr/',
    'divstyle' : 'max-width: 50%; width: 412px; margin-right: 3%;',
    'text' : '<div style="display: inline; font-weight: bold; text-transform: uppercase; font-style: italic; text-shadow: -1px 1px 1px rgba(0,0,0,0.5), 1px -1px 1px rgba(0,0,0,0.5);" class="red">New</div> Low BLS Prices',
    'textstyle' : 'text-shadow: none; font-size: 150%; letter-spacing: 0.15em; word-spacing: 0.35em;',
  ),
  array(
    'align' : 'center',
    'link' : '/classes/career_courses/paramedic/',
    'divstyle' : 'max-width: 50%;',
    'bannerclass' : 'glow-red',
    'text' : 'Paramedic Academy Begins July 1st, 2013',
  ),
);

$content = <<<DONE
      <div class="section" style="margin-top: 0;">
	<table>
	  <colgroup span="4" style="width: 25%;">
	  </colgroup>
	  <thead>
	    <tr>
	      <th colspan="1"><div>Career Courses<div class="sub">For Everyone</div></div></th>
	      <th colspan="2"><div>Continuing Education<div class="sub">EMS &amp; Hospital Personnel</div></div></th>
	      <th colspan="1"><div>Student Resources<div class="sub">Current &amp; Past Students</div></th>
	    </tr>
	  </thead>
	  <tbody>
	    <tr>
	      <td>
	        <a href="/classes/career_courses/emt/" class="btn buttontext lines-2">
		  <div>Emergency Medical<br />Technician</div>
		  <span></span>
		</a>
	      </td>
	      <td>
		<a href="/classes/continuing_education/cpr" class="btn buttontext lines-2">
		  <div>Healthcare Provider<br />CPR (BLS)</div>
		  <span></span>
		</a>
	      </td>
	      <td>
		<a href="/classes/continuing_education/ecg_basic" class="btn buttontext lines-1">
		  <div>ECG Basic</div>
		  <span></span>
		</a>
	      </td>
	      <td>
		<a href="/resources/emt/" class="btn buttontext lines-1">
		  <div>EMT Resources</div>
		  <span></span>
		</a>
	      </td>
	    </tr>
	    <tr>
	      <td>
		<a href="/classes/career_courses/phlebotomy/" class="btn buttontext lines-2">
		  <div>Phlebotomy<br />Technician</div>
		  <span></span>
		</a>
	      </td>
	      <td>
		<a href="/classes/continuing_education/acls" class="btn buttontext lines-2">
		  <div>Advanced Cardiac<br />Life Support (ACLS)</div>
		  <span></span>
		</a>
	      </td>
	      <td>
		<a href="/classes/continuing_education/12_lead_ecg" class="btn buttontext lines-1">
		  <div>ECG 12-Lead</div>
		  <span></span>
		</a>
	      </td>
	      <td>
		<a href="/resources/cpt/" class="btn buttontext lines-1">
		  <div>CPT Resources</div>
		  <span></span>
		</a>
	      </td>
	    </tr>
	    <tr>
	      <td>
		<a href="/classes/career_courses/medical_assistant/" class="btn buttontext lines-2">
		  <div>Clinical Medical<br />Assistant</div>
		  <span></span>
		</a>
	      </td>
	      <td>
		<a href="/classes/continuing_education/pals" class="btn buttontext lines-2">
		  <div>Pediatric Advanced<br />Life Support (PALS)</div>
		  <span></span>
		</a>
	      </td>
	      <td>
		<a href="/classes/continuing_education/ecg_tech" class="btn buttontext lines-1">
		  <div>ECG Technician</div>
		  <span></span>
		</a>
	      </td>
	      <td>
		<a href="/resources/cma/" class="btn buttontext lines-1">
		  <div>CMA Resources</div>
		  <span></span>
		</a>
	      </td>
	    </tr>
	    <tr>
	      <td>
		<a href="/classes/career_courses/paramedic/" class="btn buttontext lines-1">
		  <div>Paramedic</div>
		  <span></span>
		</a>
	      </td>
	      <td>
		<a href="/classes/continuing_education/acls_prep" class="btn buttontext lines-1">
		  <div>ACLS Preparation</div>
		  <span></span>
		</a>
	      </td>
	      <td>
		<a href="/classes/continuing_education/itls" class="btn buttontext lines-2">
		  <div>International Trauma<br />Life Support (ITLS)</div>
		  <span></span>
		</a>
	      </td>
	      <td>
		<a href="/resources/spt/" class="btn buttontext lines-1">
		  <div>SPT Resources</div>
		  <span></span>
		</a>
	      </td>
	    </tr>
	    <tr>
	      <td>
		<a href="/classes/career_courses/sterile_processing_tech/" class="btn buttontext lines-2">
		  <div>Sterile Processing<br />Technician</div>
		  <span></span>
		</a>
	      </td>
	      <td>
		<a href="/classes/continuing_education/emt_r" class="btn buttontext lines-1">
		  <div>EMT Refresher</div>
		  <span></span>
		</a>
	      </td>
	      <td>
		<a href="/classes/continuing_education/nremt" class="btn buttontext lines-1">
		  <div>NREMT</div>
		  <span></span>
		</a>
	      </td>
	      <td></td>
	    </tr>
	  </tbody>
	</table>
      </div>

      <div class="section" style="padding-top: 1em;">
	<h4 style="text-align: center; max-width: 75%; margin: 1em auto 1em; letter-spacing: 0.12em;">This school has been approved by the <a style="white-space: nowrap;" href="http://www.bppe.ca.gov/about_us/contact.shtml">Bureau of Private and Postsecondary Education.</a></h4>
      </div>
DONE;

$template->display('base.html', array(
  'slideshow' : $slideshow,
  'styles' : $styles,
  'introtext' : $introtext,
  'banners' : $banners,
  'content' = $content,
));
?>
