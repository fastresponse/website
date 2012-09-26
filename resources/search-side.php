<?php

$source_list = "";

if ($handle != null) {
  $all_sources = query_source_list($handle);
  foreach ($all_sources as $src) {
     $source_list .= "<option>{$src['name']}</option>\n";
  }
}

$out = <<<SENDME
<div class="jobsearch">
<form action="$self" method="post">
  <table>
  <caption>Job Search</caption>
  <tbody>
  <tr>
    <td>
      <label>Date range:</label>
    </td>
  </tr>
  <tr>
    <td>
      <select name="daterange">
	<option>Any</option>
	<option>Last week</option>
	<option>Last month</option>
	<option>Last two months</option>
      </select>
    </td>
  </tr>
  <tr>
    <td>
      <label>Applicable course:</label>
    </td>
  </tr>
  <tr>
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
  </tr>
  <tr>
    <td>
      <label>Source of job:</label>
    </td>
  </tr>
  <tr>
    <td>
      <select name="source">
	<option>Any</option>
        $source_list
      </select>
    </td>
  </tr>
  <tr>
    <td>
      <input type="submit" value="Find jobs" />
    </td>
  </tr>
  </tbody></table>
</form>
</div>
SENDME;

if (array_key_exists('daterange', $_POST)) {
  $out .= <<<ADD
<div style="margin-bottom: 1em;">
  <a href="/resources/careers.php">Return to Careers Page</a>
</div>
ADD;
}

echo $out;

?>

