<?php

include_once('./dbconn.php');

$source_list = "";
$hidden_data = "";
$all_source_data = null;

if ($handle != null) {
  $all_source_data = query_source_full($handle);
  foreach ($all_source_data as $src) {
    $id = sanitize_id($src['name']);
    $source_list .= "<option>{$src['name']}</option>\n";
    $hidden_data .= "<input type='hidden' name='website_$id' value='{$src['website']}' />\n";
    /*
    $hidden_data .= "<input type='hidden' name='directions_$id' value='{$src['directions']}' />\n";
    $hidden_data .= "<input type='hidden' name='courses_$id' value='{$src['courses']}' />\n";
    */
  }
}

$defhtml = <<<DEFHTML
<div class="jobadmin">
<h2>Career Services Administration</h2>

<form id="addjob" action="$self" method="post">

  <fieldset id="addjobfieldset" class="noborder">
  <legend>
    <button type="button" onClick="toggleClass('addjobdiv', 'closed'); toggleClass('addjobfieldset', 'noborder');">
    Add a Job Listing
    </button>
  </legend>

  <div id="addjobdiv" class="pop closed">
    <label>Date:</label>
    <input id="cal" type="text" name="date" readonly="readonly" value="Choose a date"/>
    <a href="javascript:NewCal('cal', 'ddmmmyyyy');">
      <img src="/images/cal.gif" alt="Pick a date" />
    </a>

    <br />

    <label>Courses:</label>
    <select name="course" multiple="multiple" size="5">
      <option>EMT</option>
      <option>CPT</option>
      <option>SPT</option>
      <option>CMA</option>
      <option>Paramedic</option>
    </select>

    <br />

    <label>Source of job:</label>
    <select name="source">
      $source_list
    </select>

    <br />

    <label>Full text of job posting:</label>
    <textarea rows="10" cols="100" name="text"></textarea>

    <br />

    <label></label>
    <input type="submit" value="Add new job posting" />
  </div>

  </fieldset>
</form>

<form id="addsource" action="$self" method="post">

  <fieldset id="addsourcefieldset" class="noborder">
  <legend>
    <button type="button" onClick="toggleClass('addsourcediv', 'closed'); toggleClass('addsourcefieldset', 'noborder');">
    Add an Employer
    </button>
  </legend>

  <div id="addsourcediv" class="pop closed">

    <label>Existing Employers:</label>
    <select id="sourcelist" name="sourcelist" size="10" onFocus="displaySourceData(this);">
      $source_list
    </select>
    <div class="sourcedata">
      <input type="text" id="sourcewebsite" readonly="readonly" />
      <br />
      <input type="text" id="sourcedirections" readonly="readonly" />
      <br />
      <select id="sourcecourses" readonly="readonly" size="5">
      </select>
    </div>

    <br />

    <label>
      <input type="button" value="Add" onClick="addSource('addsourceinput', 'sourcelist');" style="margin: 0;"/>
    </label>
    <input type="text" id="addsourceinput" placeholder="Name of employer" />

    $hidden_data

  </div>

  </fieldset>
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
<div style="width: 90%; margin: 0 auto; padding-bottom: 3em;">
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
