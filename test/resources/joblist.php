<?php

include_once('./dbconn.php');

$self = $_SERVER['PHP_SELF'];

$source_list = "";

$handle = db_connect();

if ($handle != null) {
  $all_sources = query_source_list($handle);
  foreach ($all_sources as $src) {
     $source_list .= "<option>{$src['name']}</option>\n";
  }
}

$defhtml = <<<DEFHTML
<div class="jobsearch">
<h2>Career Services</h2>
<form action="$self" method="post">
  <table>
  <tbody>
  <tr>
    <td>
      <label>Date range:</label>
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
	<option>Any</option>
	<option>Last week</option>
	<option>Last month</option>
	<option>Last two months</option>
      </select>
    </td>
    <td>
      <select name="course">
	<option>Any</option>
	<option>EMT</option>
	<option>CPT</option>
	<option>SPT</option>
	<option>CMA</option>
	<option>Paramedic</option>
      </select>
    </td>
    <td>
      <select name="source">
	<option>Any</option>
        $source_list
      </select>
    </td>
  </tr>
  <tr>
    <td></td>
    <td>
      <input type="submit" value="Find jobs" />
    </td>
    <td></td>
  </tr>
  </tbody></table>
</form>
</div>
DEFHTML;

$daterange = null;
$course = null;
$source = null;

if (array_key_exists('daterange', $_POST))
  $daterange = $_POST['daterange'];

if ($daterange == null) {
  $out = $defhtml;
}
else if ($handle != null) {
  if (array_key_exists('course', $_POST))
    $course = $_POST['course'];
  if (array_key_exists('source', $_POST))
    $source = $_POST['source'];

  $now = date('Y-m-d');

  switch ($daterange) {
    case 'Last week':
      $dateob = new DateTime();
      $dateob = $dateob->sub(
	date_interval_create_from_date_string('1 week')
      );
      $start = $dateob->format('Y-m-d');
    break;

    case 'Last month':
      $dateob = new DateTime();
      $dateob = $dateob->sub(
	date_interval_create_from_date_string('1 month')
      );
      $start = $dateob->format('Y-m-d');
    break;

    default:
    case 'Any':
      $start = '2012-01-01';
    break;
  }

  if ($course == 'Any')
    $course = null;

  if ($source == 'Any')
    $source = null;

  $data = query_jobpostings(
    $handle, $start, $now, $course, $source
  );

  $ret = "";

  foreach ($data as $entry) {
    $source_data = query_source($handle, $entry['source']);

    if ($source_data == null)
      $source_data = array();

    if (!array_key_exists('directions', $source_data))
      $source_data['directions'] = '';

    // if website exists, wrap the name in a link, else just use the name
    if (array_key_exists('website', $source_data)) {
      $source_data['website'] =
        "<a href=\"{$source_data['website']}\">{$entry['source']}</a>\n"
      ;
    }
    else {
      $source_data['website'] = $entry['source'];
    }

    $ret .= "<tr><td class=\"topleft topright bottomleft bottomright\" " .
            "onClick=\"toggleShow(this);\">\n";
    $ret .= "<div class=\"top\">{$entry['showdate']}</div>\n";
    $ret .= "<div class=\"top\">" . $source_data['website'] . "</div>\n";
    $ret .= "<div class=\"top\"><img src=\"/images/buttons/directions_btn.png\" alt=\"Directions\" title=\"{$source_data['directions']}\" /></div>\n";
    $ret .= "<div class=\"top\">" . str_replace(",", ", ", $entry['courses']) . "</div>\n";
    $ret .= "<div class=\"bottom\">";
    $ret .= "<img src=\"/images/buttons/more.png\" alt=\"More\" class=\"morebutton\" /> ";
    $ret .= nl2br($entry['text']);
    $ret .= "\n</div>\n";
    $ret .= "</td></tr>\n";

  }

  $out = <<<QUERYHTML
<div class="joblist">
<h2>Job Listings</h2>
<table>
<tbody>
$ret
</tbody></table>
</div>
QUERYHTML;

}
else {
  $out = '<h2 class="joberror">There was an error accessing the database.</h2>';
}

echo $out;

// close the db handle
$handle = null;

?>
