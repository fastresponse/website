<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/php/dbconn.php');

if (!array_key_exists('action', $_POST)) {
  echo 'Error: no action specified';
  http_response_code(418);
  return;
}

// first we have to figure out which database to use

// explicitly set - excellent
if (array_key_exists('db', $_POST)) {
  $db = $_POST['db'];
}
else {
  // try to figure out what DB based on action requested
  switch ($_POST['action']) {
    case 'job_delete':
    case 'job_edit':
    case 'job_query':
      $db = 'career_services';
      $jobid = $_POST['jobid'];
    break;
  }
}

$handle = db_connect($db);
if (!isset($handle)) {
  echo 'Error: no DB connection';
  http_response_code(418);
  return;
}

switch ($_POST['action']) {
  case 'job_delete':
    $ret = delete_jobposting($handle, $jobid);
    if ($ret) echo "Job deleted.";
    else {
      echo "Failed to delete job.";
      http_response_code(418);
    }
    return;

  case 'job_edit':
    $ret = update_jobposting($handle, $jobid );
    if ($ret) echo "Job updated.";
    else {
      echo "Failed to update job.";
      http_response_code(418);
    }
    return;

  case 'job_query':
    return;

  default:
    http_response_code(400);
}

