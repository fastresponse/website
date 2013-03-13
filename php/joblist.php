<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/php/dbconn.php');

function formatweblink($company_data = null) {
  if ($company_data == null)
    $company_data = array();

  if (!array_key_exists('name', $company_data))
    $company_data['name'] = 'No name';

  // if website exists, wrap the name in a link, else just use the name
  if (array_key_exists('website', $company_data)) {
    $company_data['weblink'] =
      "<a href=\"{$company_data['website']}\" target=\"_blank\">" .
      $company_data['name'] . "</a>\n"
    ;
  }
  else {
    $company_data['weblink'] = $company_data['name'];
  }

  return $company_data['weblink'];
}

function fullcompanyinfo($handle = null, $company_name = null) {
  if ($company_name != null)
    $company_data = query_company($handle, $company_name);
  else
    $company_data = null;

  if ($company_data == null)
    $company_data = array();

  if (!array_key_exists('apply', $company_data))
    $company_data['apply'] = '';

  $company_data['name'] = $company_name;
  $company_data['weblink'] = formatweblink($company_data);

  $company_data['full_contact_info'] = $company_name;
  if (array_key_exists('website', $company_data) && strlen($company_data['website']))
    $company_data['full_contact_info'] .= "\n" . $company_data['website'];
  if (array_key_exists('phone', $company_data) && strlen($company_data['phone']))
    $company_data['full_contact_info'] .= "\n" . phone_format($company_data['phone']);
  if (array_key_exists('streetaddr', $company_data) && strlen($company_data['streetaddr']))
    $company_data['full_contact_info'] .= "\n" . $company_data['streetaddr'];
  if (array_key_exists('city', $company_data) && strlen($company_data['city']))
    $company_data['full_contact_info'] .= "\n" . $company_data['city'];
  if (array_key_exists('state', $company_data) && strlen($company_data['state']))
    $company_data['full_contact_info'] .= "\n" . $company_data['state'];

  return $company_data;
}

function joblist($handle = null, $daterange = '2 weeks', $course = null, $company = null, $cells_per_row = 2) {

  if ($handle == null)
    return '<h2 class="joberror">There was an error accessing the database.</h2>';

  $now = date('Y-m-d');

  if ($daterange == 'Any' || $daterange == 'All') {
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
  $start_row = true;
  $end_row = false;

  foreach ($data as $entry) {

    $calc = $current_cell % $cells_per_row;
    // bools:
    $start_row = ($calc == 0);
    $end_row = ($calc == $cells_per_row - 1);

    $company_data = fullcompanyinfo($handle, $entry['company']);

    /*
    $company_data = query_company($handle, $entry['company']);

    if ($company_data == null)
      $company_data = array();

    if (!array_key_exists('apply', $company_data))
      $company_data['apply'] = '';

    // if website exists, wrap the name in a link, else just use the name
    if (array_key_exists('website', $company_data)) {
      $company_data['weblink'] =
	"<a href=\"{$company_data['website']}\">{$entry['company']}</a>\n"
      ;
    }
    else {
      $company_data['weblink'] = $entry['company'];
    }

    $company_data['full_contact_info'] = $entry['company'];
    if (array_key_exists('website', $company_data) && strlen($company_data['website']))
      $company_data['full_contact_info'] .= "\n" . $company_data['website'];
    if (array_key_exists('phone', $company_data) && strlen($company_data['phone']))
      $company_data['full_contact_info'] .= "\n" . phone_format($company_data['phone']);
    if (array_key_exists('streetaddr', $company_data) && strlen($company_data['streetaddr']))
      $company_data['full_contact_info'] .= "\n" . $company_data['streetaddr'];
    if (array_key_exists('city', $company_data) && strlen($company_data['city']))
      $company_data['full_contact_info'] .= "\n" . $company_data['city'];
    if (array_key_exists('state', $company_data) && strlen($company_data['state']))
      $company_data['full_contact_info'] .= "\n" . $company_data['state'];
    */

    if ($start_row)
      $ret .= "<tr>\n";

    $ret .= "<td>\n";
    $ret .= "<div class=\"container\" onClick=\"toggleShow(this);\">\n";

    $ret .= "<div class=\"top date\">{$entry['showdate']}</div>\n";
    $ret .= "<div class=\"top courses\">" . str_replace(",", ", ", $entry['courses']) . "</div>\n";
    $ret .= "<div class=\"top jobtitle\">" . $entry['jobtitle'] . "</div>\n";
    $ret .= "<div class=\"top website\" title=\"{$company_data['full_contact_info']}\">" . $company_data['weblink'] . "</div>\n";

    $ret .= "<div class=\"bottom hidden\">\n";
    $ret .= "  <div class=\"reqs\">\n";
    $ret .= "    Requirements:<br />\n";
    $ret .= "    <ul>\n" . listify($entry['requirements']) . "</ul>\n";
    $ret .= "  </div>\n";

    $line = 1;

    if (strlen($entry['text'])) {
      $ret .= "  <div class=\"line{$line}\">\n";
      $ret .= "    " . $entry['text'] . "\n";
      $ret .= "  </div>\n";
      $line++;
    }
    if (strlen($entry['contact'])) {
      $ret .= "  <div class=\"line{$line}\">\n";
      $ret .= "    " . $entry['contact'] . "\n";
      $ret .= "  </div>\n";
      $line++;
    }
    if (strlen($entry['apply'])) {
      $ret .= "  <div class=\"line{$line}\">\n";
      $ret .= "    " . $entry['apply'] . "\n";
      $ret .= "  </div>\n";
      $line++;
    }

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
<div class="joblist" id="joblist">
<table>
<tbody>
$ret
</tbody></table>
</div>
QUERYHTML;

  return $out;
}

?>
