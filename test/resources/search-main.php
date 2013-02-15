<?php

$daterange = null;
$course = null;
$company = null;

if (array_key_exists('daterange', $_POST))
  $daterange = $_POST['daterange'];

if ($handle != null && $daterange != null) {
  if (array_key_exists('course', $_POST))
    $course = $_POST['course'];
  if (array_key_exists('company', $_POST))
    $company = $_POST['company'];

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

  if ($company == 'Any')
    $company = null;

  $data = query_jobpostings(
    $handle, $start, $now, $course, $company
  );

  $ret = "";

  foreach ($data as $entry) {
    $company_data = query_company($handle, $entry['company']);

    if ($company_data == null)
      $company_data = array();

    if (!array_key_exists('apply', $company_data))
      $company_data['apply'] = '';

    // if website exists, wrap the name in a link, else just use the name
    if (array_key_exists('website', $company_data)) {
      $company_data['website'] =
        "<a href=\"{$company_data['website']}\">{$entry['company']}</a>\n"
      ;
    }
    else {
      $company_data['website'] = $entry['company'];
    }

    $ret .= "<tr><td onClick=\"toggleShow(this);\">\n";
    $ret .= "<div class=\"top\">{$entry['showdate']}</div>\n";
    $ret .= "<div class=\"top jobtitle\">" . $entry['jobtitle'] . "</div>\n";
    $ret .= "<div class=\"top\">" . str_replace(",", ", ", $entry['courses']) . "</div>\n";
    $ret .= "<div class=\"top\">" . $company_data['website'] . "</div>\n";

    $ret .= "<div class=\"bottom hidden\">\n";
    $ret .= "  <div class=\"contain\">\n";
    $ret .= "    <div class=\"reqs\">\n";
    $ret .= "      Requirements:<br />\n";
    $ret .= "      <ul>\n" . listify($entry['requirements']) . "</ul>\n";
    $ret .= "    </div>\n";
    $ret .= "    <div class=\"text\">\n";
    $ret .= "      " . $entry['text'] . "\n";
    $ret .= "    </div>\n";
    $ret .= "  </div>\n";
    $ret .= "  <div class=\"contact\">\n";
    $ret .= "    " . $entry['contact'] . "\n";
    $ret .= "  </div>\n";
    $ret .= "  <div class=\"apply\">\n";
    $ret .= "    " . $entry['apply'] . "\n";
    $ret .= "  </div>\n";
    $ret .= "</div>\n";

    $ret .= "</td></tr>\n";

  }

  $out = <<<QUERYHTML
<div class="joblist">
<h2>Job Listings</h2>
<table>
<caption>Click on an entry to expand it</caption>
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

?>

