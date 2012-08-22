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
<h2 style="text-align: center;">Career Services Administration</h2>
<div style="width: 70%; margin: 0 auto; padding-bottom: 3em;">
<form action="$self" method="post">
  <div style="width: 100%; text-align: center;">
    <table border="0" style="margin: 2em auto; text-align: left;">
    <tbody>
    <tr>
      <td>
	<label style="margin-right: 3em;">Date:</label>
      </td>
      <td>
	<label>Courses:</label>
      </td>
      <td>
	<label>Source of job:</label>
      </td>
    </tr>
    <tr>
      <td>
        <input type="text" name="date" />
      </td>
      <td>
	<select name="course" multiple="multiple" size="5">
	  <option>EMT</option>
	  <option>CPT</option>
	  <option>SPT</option>
	  <option>CMA</option>
	  <option>Paramedic</option>
	</select>
      </td>
      <td>
	<select name="source">
          $source_list
	</select>
      </td>
    </tr>
    <tr>
      <td colspan="3">
	<label>Full text of job posting:</label>
      </td>
    </tr>
    <tr>
      <td colspan="3">
	<textarea rows="10" cols="50" name="text"></textarea>
      </td>
    </tr>
    </tbody></table>
    <input type="submit" value="Add new job posting" />
  </div>
</form>
</div>
DEFHTML;

$date = null;
$courses = null;
$source = null;
$text = null;

if (array_key_exists('date', $_POST))
  $date = $_POST['date'];

if ($date == null) {
  $out = $defhtml;
}
else if ($handle != null) {
  $ret = "";
  // make $ret
  $out = <<<QUERYHTML
<h2 style="text-align: center;">Career Services Administration</h2>
<div style="width: 70%; margin: 0 auto; padding-bottom: 3em;">
<table border="0" style="margin: 2em auto; text-align: left;">
<tbody>
$ret
</tbody></table>
</div>
QUERYHTML;
}
else {
  $out = '<h2>There was an error accessing the database.</h2>';
}

echo $out;

$handle = null;

?>
