<?php

include_once('./dbconn.php');

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
	  <option>Kaiser Permanente</option>
	  <option>Sutter Health</option>
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
$course = null;
$source = null;

if (array_key_exists('daterange', $_POST))
  $daterange = $_POST['daterange'];

if ($daterange == null) {
  $out = $defhtml;
}
else {

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
    $start, $now, $course, $source
  );

  $ret = "";

  foreach ($data as $entry) {
    $source_data = query_source($entry['source'], 'website,directions');

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

    $ret .= "<tr style=\"font-size: 80%;\">\n";
    $ret .= "<td>{$entry['showdate']}</td>\n";
    $ret .= "<td>" . $source_data['website'] . "</td>\n";
    $ret .= "<td><img src=\"/images/buttons/directions_btn.png\" alt=\"Directions\" title=\"{$source_data['directions']}\" /></td>\n";
    $ret .= "<td>" . str_replace(",", ", ", $entry['courses']) . "</td>\n";
    $ret .= "</tr><tr>\n";
    $ret .= "<td colspan=\"4\" style=\"border-bottom: solid 2px red; font-size: 115%;\">\n";
    $ret .= "{$entry['text']}\n</td>\n</tr>\n";
  }

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
