<?php

$reply_name="Auto Responde";

// Change the Email Addresses below to email Id where you want to get your emails.

// Reply Email Address where you want to set reply to email ID



$replyto='';



$uploadpath='/uploads/';



$save_path ='http://'.$_SERVER['SERVER_NAME'].$uploadpath;  // do not change this
$subject = stripslashes($_POST['subject']);

switch ($subject) {

case "EMT": // appears as subject in mail and select field name 1 in form

$toemail='autoreply@fastresponse.org'; // select field email 1



break;



case "Sterile Processing": // appears as subject in mail and select field name 2 in form

$toemail='autoreply@fastresponse.org'; // select field email 2



break;



case "Clinical Medical Assistant": // appears as subject in mail and select field name 3 in form

$toemail='autoreply@fastresponse.org'; // select field email 3



break;


case "Ward Clerk": // appears as subject in mail and select field name 4 in form

$toemail='autoreply@fastresponse.org'; // select field email 4



break;

case "Phlebotomy": // appears as subject in mail and select field name 5 in form

$toemail='autoreply@fastresponse.org'; // select field email 5



break;

case "Paramedic": // appears as subject in mail and select field name 6 in form

$toemail='autoreply@fastresponse.org'; // select field email 6



break;

case "Other Courses": // appears as subject in mail and select field name 7 in form

$toemail='autoreply@fastresponse.org'; // select field email 7



break;

}



$autorespond="yes"; // no : Disable the Auto-Responder   yes : Enable Auto-Responder.

$usesmtp="no"; // no : Disable the Use Smtp   yes : Enable Use Smtp.



// smtp configration
$smtphost="ssl: //smtp.domain.com";  // SMTP Server Ex: smtp.yourdomain.com
$smtpport=465; // SMTP Port Ex: 45
$smtpusername='yourname@domain.com';  // SMTP username Ex: yourname@yourdomain
$smtppassword="yourpassword";  // SMTP password Ex: password
?>