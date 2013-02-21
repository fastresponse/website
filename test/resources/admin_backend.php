<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/php/dbconn.php');

$self = $_SERVER['PHP_SELF'];

$company_list = "";
$hidden_data = "";
$all_company_data = null;
$submitted = null;
$date = null;
$courses = null;
$company = null;
$text = null;
$todaydate = "";
$toplegend = "";
$ret = null;

if ($handle != null) {
  $all_company_data = query_company_full($handle);
  foreach ($all_company_data as $src) {
    $id = sanitize_id($src['name']);
    $company_list .= "<option>{$src['name']}</option>\n";
    $hidden_data .= "<input type='hidden' name='website_$id' value='{$src['website']}' />\n";
    /*
    $hidden_data .= "<input type='hidden' name='directions_$id' value='{$src['directions']}' />\n";
    $hidden_data .= "<input type='hidden' name='courses_$id' value='{$src['courses']}' />\n";
    */
  }
}

if (array_key_exists('submit', $_POST))
  $submitted = $_POST['submit'];

if (array_key_exists('date', $_POST))
  $date = $_POST['date'];

switch ($submitted) {
  case "View Job Listings":
    // pull in the search page here
  break;

  case "Post Job":
    if ($handle == null) {
      $toplegend = "Error: Failed Database Connection";
      break;
    }
    /* need to process several of these
    $ret = insert_jobposting(
      $handle, $_POST['date'], $_POST['courses'], $_POST['company'],
      $_POST['jobtitle'], $_POST['requirements'], $_POST['contact'],
      $_POST['apply'], $_POST['text']
    );
    */
    $toplegend = "Job Posted";
  break;

  case "Add Company":
    if ($handle == null) {
      $toplegend = "Error: Failed Database Connection";
      break;
    }
    /* probably need to process these too
    $ret = insert_company(
      $handle, $_POST['name'], $_POST['website'], $_POST['apply'],
      $_POST['courses'], $_POST['streetaddr'], $_POST['city'],
      $_POST['state'], $_POST['phone'], $_POST['contact']
    );
     */
    $toplegend = "Company Added";
  break;

  default:
    // nothing was submitted yet
    $toplegend = "Career Services Administration";
}

/* figure out $todaydate in dd-mmm-yyyy format */

?>

<div class="jobadmin">

<form id="viewjobs" action="<?= $self ?>" method="post">
  <fieldset>
    <legend>
      <?= $toplegend ?>
    </legend>

    <div class="section">
      <input type="submit" name="submit" value="View Job Listings" />
    </div>
  </fieldset>
</form>

<form id="addjob" action="<?= $self ?>" method="post">

  <fieldset>
    <legend>
      <div id="legendjob">Add a Job Listing</div>
      <div id="legendcompany" class="hidden">Add a Company</div>
    </legend>

    <div class="section" style="margin-top: 0;">
      <div class="column col2" id="leftcol">

	<div class="section">
	  <label>Date:</label>
	  <a href="javascript:NewCal('cal', 'ddmmmyyyy');"><img src="/images/cal.gif" alt="Pick a date" style="vertical-align: middle;" id="calimg" /></a>
	  <input id="cal" type="text" name="date" readonly="readonly" value="<?= $todaydate ?>" />
	</div>

	<div class="section">
	  <label>Job Title:</label>
	  <input type="text" name="jobtitle" />
	</div>

	<div class="section">
	  <label>Requirements:</label>
	  <textarea rows="10" name="requirements"></textarea>
	</div>

	<div class="section">
	  <label>Text / Notes:</label>
	  <textarea rows="5" name="text"></textarea>
	</div>

	<div class="section">
	  <label></label>
	  <input type="submit" name="submit" value="Post Job" />
	</div>

      </div>

      <div class="column col2 hidden" id="leftcolspacer">
      </div>

      <div class="column col2">

	<div class="section hidden" id="companyname">
	  <label>Name:</label>
	  <input type="text" name="name" />
	</div>

	<div class="section" id="companylist">
	  <label>Company:</label>
	  <select name="company">
	    <?= $company_list ?>
	  </select>
	  <input type="button" value="Add New Company" style="width: auto;" onClick="toggleCompany();" />
	</div>

	<div class="section">
	  <label>Courses:</label>
	  <input type="checkbox" name="course" value="EMT"><div class="hspace">EMT</div>
	  <input type="checkbox" name="course" value="CPT"><div class="hspace">CPT</div>
	  <input type="checkbox" name="course" value="SPT"><div class="hspace">SPT</div>
	  <br />
	  <label></label>
	  <input type="checkbox" name="course" value="CMA"><div class="hspace">CMA</div>
	  <input type="checkbox" name="course" value="Paramedic"><div class="hspace">Paramedic</div>
	</div>

	<div class="section">
	  <label>Contact:</label>
	  <textarea rows="2" name="contact"></textarea>
	</div>

	<div class="section">
	  <label>How to apply:</label>
	  <textarea rows="3" name="apply"></textarea>
	</div>

        <div id="companydata" class="hidden">

	  <div class="section">
	    <label>Website:</label>
	    <input type="text" name="website" />
	  </div>

	  <div class="section">
	    <label>Phone:</label>
	    <input type="text" name="phone" />
	  </div>

	  <div class="section">
	    <label>Address:</label>
	    <input type="text" name="streetaddr" />
	  </div>

	  <div class="section">
	    <label>City, State:</label>
	    <input type="text" name="city" />
	    <input type="text" name="state" maxlength=2 value="CA" />
	  </div>

	  <div class="section">
	    <label></label>
	    <input type="submit" name="submit" value="Add Company" />
	    <input type="button" value="Cancel" onClick="toggleCompany();" />
	  </div>

        </div>
      </div>
    </div>

  </fieldset>
</form>

</div>

<?php
  $handle = null;
?>
