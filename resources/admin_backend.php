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
$showdate = date('d-M-Y');
$toplegend = "";
$ret = null;
$showjoblist = 0;
$infomsg = null;
$errmsg = null;

if (array_key_exists('submit', $_POST))
  $submitted = $_POST['submit'];

if (array_key_exists('date', $_POST))
  $date = $_POST['date'];

if (!array_key_exists('courses', $_POST))
  $_POST['courses'] = array();

switch ($submitted) {
  case "View Job Listings":
    $showjoblist = 1;
  break;

  case "Post Job":
    if ($handle == null) {
      $errmsg = "Error: Failed Database Connection";
      break;
    }
    if (!post_set('jobtitle')) {
      $errmsg = "Error: Job title must be specified";
      break;
    }
    if (!post_set('requirements')) {
      $errmsg = "Error: Job requirements must be specified";
      break;
    }
    $ret = insert_jobposting(
      $handle, $_POST['date'], $_POST['courses'], $_POST['company'],
      $_POST['jobtitle'], $_POST['requirements'], $_POST['contact'],
      $_POST['apply'], $_POST['text']
    );
    if ($ret == false) { // error
      $errmsg = "An error occurred. Job not posted.";
    }
    else {
      $infomsg = "Job Posted";
    }
  break;

  case "Add Company":
    if ($handle == null) {
      $errmsg = "Error: Failed to connect to database";
      break;
    }
    if (!post_set('name')) {
      $errmsg = "Error: Company name must be specified";
      break;
    }
    $ret = insert_company(
      $handle, $_POST['name'], $_POST['website'], $_POST['apply'],
      $_POST['courses'], $_POST['streetaddr'], $_POST['city'],
      $_POST['state'], $_POST['phone'], $_POST['contact']
    );
    if ($ret == false) {
      $errmsg = "An error occurred. Company not added.";
    }
    else {
      $infomsg = "Company Added";
    }
  break;

  default:
    // nothing was submitted yet
}

if ($handle != null) {
  $all_company_data = query_company_full($handle);
  foreach ($all_company_data as $src) {
    $id = sanitize_id($src['name']);
    $company_list .= "<option id='${id}'>{$src['name']}</option>\n";
    $hidden_data .= "<input type='hidden' id='{$id}_streetaddr' value='{$src['streetaddr']}' />\n";
    $hidden_data .= "<input type='hidden' id='{$id}_city' value='{$src['city']}' />\n";
    $hidden_data .= "<input type='hidden' id='{$id}_state' value='{$src['state']}' />\n";
    $hidden_data .= "<input type='hidden' id='{$id}_phone' value='" .
                    phone_format($src['phone']) . "' />\n";
    $hidden_data .= "<input type='hidden' id='{$id}_contact' value='{$src['contact']}' />\n";
    $hidden_data .= "<input type='hidden' id='{$id}_website' value='{$src['website']}' />\n";
    $hidden_data .= "<input type='hidden' id='{$id}_courses' value='{$src['courses']}' />\n";
    $hidden_data .= "<input type='hidden' id='{$id}_apply' value='{$src['apply']}' />\n";
  }
}

?>

<div class="jobadmin">
<h2>Job Search Administration</h2>

<?php if ($infomsg): ?>
  <div class="jobinfomsg">
    <?= $infomsg ?>
  </div>
<?php elseif ($errmsg): ?>
  <div class="joberrmsg">
    <?= $errmsg ?>
  </div>
<?php endif; ?>

<form id="viewjobs" action="<?= $self ?>" method="post">
  <fieldset>
    <legend style="">
      Current Job Listings
    </legend>

    <div class="section">
      <input type="submit" name="submit" value="View Job Listings" />
      <!--<input type="button" name="hidejobs" id="hidejobs" onClick="toggleClass('joblist', 'hidden');" value="Hide Jobs" />-->
    </div>

    <?php
      if ($showjoblist) {
	include_once($_SERVER['DOCUMENT_ROOT'] . '/php/joblist.php');
	echo joblist($handle, 'Any');
      }
    ?>

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
	  <input id="cal" type="text" name="date" readonly="readonly" value="<?= $showdate ?>" />
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
	  <select name="company" onChange="showCompanyInfo();">
	    <?= $company_list ?>
	  </select>
	  <input type="button" value="Add New Company" style="width: auto;" onClick="toggleCompany();" />
	</div>

	<div class="section">
	  <label>Courses:</label>
	  <input type="checkbox" name="courses[]" value="EMT"/><div class="hspace">EMT</div>
	  <input type="checkbox" name="courses[]" value="CPT"/><div class="hspace">CPT</div>
	  <input type="checkbox" name="courses[]" value="SPT"/><div class="hspace">SPT</div>
	  <br />
	  <label></label>
	  <input type="checkbox" name="courses[]" value="CMA"/><div class="hspace">CMA</div>
	  <input type="checkbox" name="courses[]" value="Paramedic"/><div class="hspace">Paramedic</div>
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
	    <input type="button" value="Cancel" onClick="toggleCompany(); showCompanyInfo();" />
	  </div>

        </div>
      </div>
    </div>

  <?= $hidden_data ?>

  </fieldset>
</form>

</div>

<?php
  $handle = null;
?>
