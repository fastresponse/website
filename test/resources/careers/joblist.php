<?php

function joblist($handle = null, $daterange = '2 weeks', $course = null, $company = null) {

  if ($handle == null)
    return '<h2 class="joberror">There was an error accessing the database.</h2>';

  $now = date('Y-m-d');

  if ($daterange == 'Any') {
    $start = '2012-01-01';
  }
  else {
    $dateob = new DateTime();
    $dateob = $dateob->sub(
      date_interval_create_from_date_string($daterange)
    );
    $start = $dateob->format('Y-m-d');
  }

  $data = query_jobpostings(
    $handle, $start, $now, $course, $company
  );

  $ret = "";
  $current_cell = 0;
  $cells_per_row = 2;
  $start_row = true;
  $end_row = false;

  foreach ($data as $entry) {

    $calc = $current_cell % $cells_per_row;
    // bools:
    $start_row = ($calc == 0);
    $end_row = ($calc == $cells_per_row - 1);

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

    if ($start_row)
      $ret .= "<tr>\n";

    $ret .= "<td>\n";
    $ret .= "<div class=\"container\" onClick=\"toggleShow(this);\">\n";

    $ret .= "<div class=\"top date\">{$entry['showdate']}</div>\n";
    $ret .= "<div class=\"top jobtitle\">" . $entry['jobtitle'] . "</div>\n";
    $ret .= "<div class=\"top courses\">" . str_replace(",", ", ", $entry['courses']) . "</div>\n";
    $ret .= "<div class=\"top website\">" . $company_data['website'] . "</div>\n";

    $ret .= "<div class=\"bottom hidden\">\n";
    $ret .= "  <div class=\"reqs\">\n";
    $ret .= "    Requirements:<br />\n";
    $ret .= "    <ul>\n" . listify($entry['requirements']) . "</ul>\n";
    $ret .= "  </div>\n";
    $ret .= "  <div class=\"text\">\n";
    $ret .= "    " . $entry['text'] . "\n";
    $ret .= "  </div>\n";
    $ret .= "  <div class=\"contact\">\n";
    $ret .= "    " . $entry['contact'] . "\n";
    $ret .= "  </div>\n";
    $ret .= "  <div class=\"apply\">\n";
    $ret .= "    " . $entry['apply'] . "\n";
    $ret .= "  </div>\n";
    $ret .= "</div>\n";

    $ret .= "</div>\n";
    $ret .= "</td>\n";

    if ($end_row)
      $ret .= "</tr>\n";

    $current_cell++;
  }

  // round out the last row with empty cells
  if (!$end_row) {
    for ($i = $current_cell; $i < $cells_per_row; $i++) {
      $ret .= "<td></td>\n";
    }
    $ret .= "</tr>\n";
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

  return $out;
}

?>

