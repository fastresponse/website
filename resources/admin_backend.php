<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/php/dbconn.php');

$self = $_SERVER['PHP_SELF'];

$company_list = "";
$hidden_data = "";
$all_company_data = null;
$submitted = null;
$date = null;
$courses = null;
$allcompanynames = null;
$text = null;
$showdate = date('d-M-Y');
$toplegend = "";
$ret = null;
$joblistrange = null;
$infomsg = null;
$errmsg = null;

if (post_set('submit'))
  $submitted = $_POST['submit'];

if (post_set('date'))
  $date = $_POST['date'];

if (!array_key_exists('courses', $_POST))
  $_POST['courses'] = array();

if (post_set('joblistrange'))
  $joblistrange = $_POST['joblistrange'];

switch ($submitted) {
  case "View Job Listings":
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

  case "Edit Job":
    if ($handle == null) {
      $errmsg = "Error: Failed to connect to database";
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
    $ret = update_jobposting(
      $handle, $_POST['jobid'], $_POST['date'], $_POST['courses'],
      $_POST['company'], $_POST['jobtitle'], $_POST['requirements'],
      $_POST['contact'], $_POST['apply'], $_POST['text']
    );
    if ($ret == false) { // error
      $errmsg = "An error occurred. Job not edited.";
    }
    else {
      $infomsg = "Job Edited";
    }
  break;

  case "Add Company":
    if ($handle == null) {
      $errmsg = "Error: Failed to connect to database";
      break;
    }
    if (!post_set('company')) {
      $errmsg = "Error: Company name must be specified";
      break;
    }
    $ret = insert_company(
      $handle, $_POST['company'], $_POST['website'], $_POST['apply'],
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

<fieldset>
  <legend style="">
    Current Job Listings
  </legend>

  <div>
    <form id="viewjobs" action="<?= $self ?>" method="post">
    <input type="submit" name="submit" value="View Job Listings" />
    <select name="joblistrange">
      <?php
	if ($joblistrange && $joblistrange != "None") {
	  $selected_first = "";
	  $selected_last = "selected='selected'";
	}
	else {
	  $selected_first = "selected='selected'";
	  $selected_last = "";
	}
      ?>
      <option <?= $selected_first ?>>2 weeks</option>
      <option>1 month</option>
      <option>2 months</option>
      <option>All</option>
      <option <?= $selected_last ?>>None</option>
    </select>
    <!--<input type="button" name="hidejobs" id="hidejobs" onClick="toggleClass('joblist', 'hidden');" value="Hide Jobs" />-->
    </form>
  </div>

  <?php
    if ($joblistrange && $joblistrange != "None") {
      include_once($_SERVER['DOCUMENT_ROOT'] . '/php/joblist.php');
      echo joblist($handle, array(
	'daterange' => $joblistrange, 'admin' => true
      ) );
    }
  ?>

</fieldset>

<form id="addjob" action="<?= $self ?>" method="post" style="margin-top: 2em;">

  <input type="hidden" id="joblistrange" name="joblistrange" value="<?= $joblistrange ?>" />

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
	  <input type="text" name="jobtitle" id="jobtitle" />
	</div>

	<div class="section">
	  <label>Requirements:</label>
	  <textarea rows="10" name="requirements" id="requirements"></textarea>
	</div>

	<div class="section">
	  <label>Text / Notes:</label>
	  <textarea rows="5" name="text" id="text"></textarea>
	</div>

	<div class="section">
	  <label></label>
	  <input type="submit" name="submit" id="jobsubmit" value="Post Job" />
	</div>

      </div>

      <div class="column col2 hidden" id="leftcolspacer">
      </div>

      <div class="column col2">

	<div class="section" id="companyname">
	  <label>Company:</label>
	  <input type="text" name="company" id="company" />
	  <div class="section" id="companylist">
	    <label></label>
	    <select name="allcompanynames" onChange="showCompanyInfo();">
	      <?= $company_list ?>
	    </select>
	    <input type="button" value="Add New Company" style="width: auto;" onClick="toggleCompany();" />
	  </div>
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
	  <textarea rows="2" name="contact" id="contact"></textarea>
	</div>

	<div class="section">
	  <label>How to apply:</label>
	  <textarea rows="3" name="apply" id="apply"></textarea>
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

<script type="text/javascript">
function clearForm() {
  $("#cal").val("");
  $("#jobtitle").val("");
  $("#company").val("");
  $("#text").val("");
  $("#contact").val("");
  $("#apply").val("");
  $("#requirements").val("");
  $("input[name^='courses']").prop('checked', false);
}

$(".delete_btn").click(function() {
  var jobid = $(this).attr('id').replace("delete_", "");
  $.ajax({
    url: "/php/ajax/ajax.db.php",
    type: "POST",
    data: { action: "job_delete", jobid: jobid },
    success: function(data) {
      $("#msg_" + jobid).text(data);
      $("#job_" + jobid).fadeTo("slow", 0.2);
      $("#edit_" + jobid).remove();
      $("#delete_" + jobid).remove();
    },
    error: function(data, code) {
      $("#msg_" + jobid).text(data);
    }
  });
});
$(".edit_btn").click(function() {
  var jobid = $(this).attr('id').replace("edit_", "");

  // first clear the form fields
  clearForm();

  // fill in the input boxes with this job's info
  $("#cal").val( $.trim($("#date_" + jobid).text()) );
  $("#jobtitle").val( $.trim($("#jobtitle_" + jobid).text()) );
  $("#company").val( $.trim($("#company_" + jobid).text()) );
  $("#text").val( $.trim($("#text_" + jobid).text()) );
  $("#contact").val( $.trim($("#contact_" + jobid).text()) );
  $("#apply").val( $.trim($("#apply_" + jobid).text()) );

  $("#requirements").val( $.trim(
    $("#reqs_" + jobid + "> li").clone().append("\n").text()
  ) );

  // foreach course listed in this entry, find the input named "courses[]"
  //   that has value = to this course name and checkmark it
  //   (there are multiples of "courses[]", name is not singular like id)
  $.each(
    $("#courses_" + jobid).text().split(", "),
    function(index, value) {
      $("input[name^='courses']").filter("[value='" + value + "']").prop('checked', true);
  });

  // scroll down to the form
  $("body").scrollTop( $("#addjob").offset().top );

  // change the submit button
  // this form determines what to do based on the value of the submit button used
  $("#jobsubmit").val("Edit Job");

  // put the job ID in so it gets submitted
  $("#jobsubmit").after("<input type='hidden' id='jobid' name='jobid' value='" + jobid + "' />");

  // create a cancel button 
  $("#jobsubmit").after("<input type='button' id='canceledit' value='Cancel Edit' />");

  // clicking cancel undoes all of the above and deletes itself
  $("#canceledit").click(function() {
    clearForm();
    $("#jobsubmit").val("Post Job");
    $("#jobid").remove();
    $(this).remove();
  })
});
</script>

<?php
  $handle = null;
?>
