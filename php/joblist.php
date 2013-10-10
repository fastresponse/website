<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/php/dbconn.php');

function formatweblink($company_data = null) {
  if ($company_data == null)
    $company_data = array();

  if (!array_key_exists('name', $company_data))
    $company_data['name'] = 'No name';

  // if website exists, wrap the name in a link, else just use the name
  if (array_key_exists('website', $company_data)) {
    // ensure there's a protocol string on the front
    if (strpos($company_data['website'], 'http://') === false &&
    strpos($company_data['website'], 'https://') === false) {
      $company_data['website'] = 'http://' . $company_data['website'];
    }
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

function get_admin_controls($entry) {
  $jobid = $entry['id'];

  $ret = "";

  $ret .= "  <input type=\"button\" value=\"Edit\" class=\"edit_btn\" " .
          "id=\"edit_$jobid\" />\n";
  $ret .= "  <input type=\"button\" value=\"Delete\" class=\"delete_btn\" " .
	  "id=\"delete_$jobid\" />\n";
  $ret .= "  <span id=\"msg_$jobid\"></span>\n";

  return $ret;
}

function joblist($handle, $args = array()) {

  $course = null;
  $company = null;
  $daterange = '2 weeks';
  $cells_per_row = 2;
  $admin = false;

  foreach ($args as $arg => $val) {
    switch ($arg) {
      case 'admin':
      case 'daterange':
      case 'course':
      case 'company':
      case 'cells_per_row':
	      $$arg = $val;
      break;
      default: // do nothing
    }
  }

  if (!isset($handle))
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

    if ($start_row)
      $ret .= "<tr>\n";

    $ret .= "<td>\n";
    $ret .= "<div class=\"container\" onClick=\"toggleShow(this);\" id=\"job_{$entry['id']}\">\n";

    $ret .= "<div class=\"top date\" id=\"date_{$entry['id']}\">{$entry['showdate']}</div>\n";
    $ret .= "<div class=\"top courses\" id=\"courses_{$entry['id']}\">" . str_replace(",", ", ", $entry['courses']) . "</div>\n";
    $ret .= "<div class=\"top jobtitle\" id=\"jobtitle_{$entry['id']}\">" . $entry['jobtitle'] . "</div>\n";
    $ret .= "<div class=\"top website hidden\" title=\"{$company_data['full_contact_info']}\">" . $company_data['weblink'] . "</div>\n";
    $ret .= "<div class=\"top companyname\"  id=\"company_{$entry['id']}\"title=\"{$company_data['full_contact_info']}\">" . $company_data['name'] . "</div>\n";

    $ret .= "<div class=\"bottom hidden\">\n";
    $ret .= "  <div class=\"reqs\">\n";
    $ret .= "    Requirements:<br />\n";
    $ret .= "    <ul id=\"reqs_{$entry['id']}\">\n" . listify($entry['requirements']) . "</ul>\n";
    $ret .= "  </div>\n";

    $line = 1;

    if (strlen($entry['text'])) {
      $ret .= "  <div class=\"line{$line}\" id=\"text_{$entry['id']}\">\n";
      $ret .= "    " . $entry['text'] . "\n";
      $ret .= "  </div>\n";
      $line++;
    }
    if (strlen($entry['contact'])) {
      $ret .= "  <div class=\"line{$line}\" id=\"contact_{$entry['id']}\">\n";
      $ret .= "    " . $entry['contact'] . "\n";
      $ret .= "  </div>\n";
      $line++;
    }
    if (strlen($entry['apply'])) {
      $ret .= "  <div class=\"line{$line}\" id=\"apply_{$entry['id']}\">\n";
      $ret .= "    " . $entry['apply'] . "\n";
      $ret .= "  </div>\n";
      $line++;
    }

    $ret .= "</div>\n"; // bottom
    $ret .= "</div>\n"; // container

    if ($admin) {
      $ret .= get_admin_controls($entry);
    }

    $ret .= "</td>\n";

    if ($end_row)
      $ret .= "</tr>\n";

    $current_cell++;
  }

  // round out the last row with empty cells
  if (strlen($ret) && !$end_row) {
    for ($i = $current_cell; $i < $cells_per_row; $i++) {
      $ret .= "<td></td>\n";
    }
    $ret .= "</tr>\n";
  }

  if (!strlen($ret))
    return "";

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
