<?php
$SESSION_NAME = "";     // if you're using a particular name for your session, specify it here.

if (!empty($SESSION_NAME))
    session_name($SESSION_NAME);
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sample Auto Responding Form for use with formmail.php</title>
</head>
<!--
    This is a sample form that you can use to
    develop your own form.  This particular sample
    includes an Auto Responding feature.

	It's identical to sampleautorespform.htm except
	that it's a PHP script and it will work whether or
	not the user's browser is allowing cookies.

	Some browsers are set to deny all cookies (including
	harmless session cookies).  For these browser
	you need to explicitly pass the PHP session information
	to verifyimg.php and to formmail.php.

    An Auto Responder emails back to the user who
    submits the form.

    Here are the basic steps:
        1. Upload verifyimg.php to your server
           (to the same directory as you'll upload
           this form).
        2. Use version 3.00 or later of FormMail.
        3. Configure FormMail for a template direcory
           or template URL.
        4. Upload the sample email template called
           "sampleautoresptmplt.txt" to your
           template directory.
        5. Upload the explanation document
           "samplearwhy.htm" (to the same directory as
           you'll upload this form).
        6. Follow the 5 step instructions below.
        7. Upload this (configured) HTML document
           to your server.

    Read our How-To guide at
    http://www.tectite.com/fmhowto/autorespond.php
    for full instructions.

    We provide free software!  But we
    need your help to continue; please place a link
    on your website to our website. Here's some HTML
    you can use:
        Visit www.tectite.com for free
        <a href="http://www.tectite.com/">FormMail</a>.
-->
<body>

<script language="javascript" type="text/javascript">
// <![CDATA[
var nReload = 5;

function NewVerifyImage()
{
    if (nReload <= 2)
        if (nReload <= 0)
        {
            alert("Sorry, too many reloads.");
            return;
        }
        else
            alert("Only " + nReload + " more reloads are allowed");
    nReload--;

        //
        // This code now works in both IE and FireFox
        //
    var         e_img;

    e_img = document.getElementById("vimg");
    if (e_img)
                //
                // FireFox attempts to "optimize" by not reloading
                // the image if the URL value doesn't actually change.
                // So, we make it change by adding a different
                // count parameter for each reload.
                //
        e_img.setAttribute("src",e_img.src+'&count='+nReload);
}
// ]]>
</script>

<p>This form demonstrates the use of Auto Responding
features in formmail.php.
<br />Note that formmail.php requires a one line change
to work.  Use a text editor to read the information
at the top of formmail.php.
</p>
<p>Also, you need to change this form using a text editor;
follow the 5 steps shown in the comments.
</p>
<p>We've included sample fields to show you how to
submit Checkboxes, Radio Buttons, Multi-selection
List Boxes, normail Text fields, and Text Areas.
</p>
<p>
For full information and support, visit
<a href="http://www.tectite.com/">www.tectite.com</a>
</p>
<p></p>
    <!-- STEP 1: Put the full URL to formmail.php on your website in the 'action' value. -->
<form method="post" action="http://www.fastresponse.org/formmail/formmail.php?<?php if (defined("SID")) echo SID; ?>" name="SampleAutoRespForm">
    <input type="hidden" name="env_report" value="REMOTE_HOST,REMOTE_ADDR,HTTP_USER_AGENT,AUTH_TYPE,REMOTE_USER" />
    <!-- STEP 2: Put your email address in the 'recipients' value.
                 Note that you also have to allow this email address in the
                 $TARGET_EMAIL setting within formmail.php!
    -->
    <input type="hidden" name="recipients" value="fastresponse13@gmail.com" />
    <!-- STEP 3: Specify required fields in the 'required' value -->
    <input type="hidden" name="required" value="email:Your email address,realname:Your name" />
    <!-- STEP 4: Put your subject line in the 'subject' value. -->
    <input type="hidden" name="subject" value="Sample1 FormMail Auto Responder" />
    <!-- STEP 5: Put template name and other options in the 'autorespond' value. -->
    <input type="hidden" name="autorespond" value="PlainTemplate=sampleautoresptmplt.txt,Subject=Thanks for submitting the test form!,TemplateMissing=" />

    <table border="1" cellspacing="5%">
    <tr>
        <td>
        <p>Please enter your name:</p>
        </td>
        <td><input type="text" name="realname" maxlength="30" />
        </td>
    </tr>
    <tr>
        <td>
        <p>Please enter your email address:</p>
        </td>
        <td><input type="text" name="email" maxlength="60" />
        </td>
    </tr>
    <tr>
        <td><p>May we contact you?</p>
        </td>
        <td>
            Yes <input type="radio" name="contact" value="Y" checked="checked" />
            No <input type="radio" name="contact" value="N" />
         </td>
    </tr>
    <tr>
        <td><p>What are your favourite colours?</p>
        </td>
        <td>
            Red     <input type="checkbox" name="colors[]" value="red" checked="checked" />
            Blue    <input type="checkbox" name="colors[]" value="blue" checked="checked" />
            Yellow  <input type="checkbox" name="colors[]" value="yellow" />
         </td>
    </tr>
    <tr>
        <td valign="top"><p>What vehicles do you have a license to operate?</p>
        </td>
        <td valign="top">
            <p>
            <select name="vehicles[]" multiple="multiple" size="5">
                <option value="Car" selected="selected">Car</option>
                <option value="Bus">Bus</option>
                <option value="Truck">Truck</option>
                <option value="Plane" selected="selected">Aeroplane</option>
                <option value="Boat">Boat</option>
            </select>&nbsp;(Select all that apply; use CTRL-click to select)
            </p>
         </td>
    </tr>
    <tr>
        <td valign="top">
        <p>Please enter your message:</p>
        </td>
        <td><textarea name="mesg" rows="10" cols="50">Testing</textarea>
        </td>
    </tr>
    <tr>
        <td colspan="2">
        <p>To have a confirmation emailed to you, please
        enter the characters you see in the image:
        </p>
        </td>
    </tr>
    <tr>
        <td valign="top">
            <img src="http://www.fastresponse.org/formmail/verifyimg.php?<?php if (defined("SID")) echo SID; ?>" alt="Image verification" name="vimg" id="vimg" />
        </td>
        <td><input type="text" size="12" name="arverify" />
        &nbsp;<a href="samplearwhy.htm" target="_blank">Why?</a>
        </td>
    </tr>
    <tr>
        <td colspan="2">
        <p>If you cannot read the image, click for a new one&nbsp;
            <button onclick="NewVerifyImage(); return false;">
            New image
            </button>
        </p>
        </td>
    </tr>
    <tr>
        <td><input type="submit" value="Submit" /></td>
        <td><a href="http://www.tectite.com/" target="_blank"><img src="http://www.tectite.com/images/FormMail_rnd_blue.jpg" alt="FormMail" title="FormMail" border="0" /></a>
        </td>
    </tr>
    </table>
</form>
</body>
</html>
