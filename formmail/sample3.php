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


<link rel="shortcut icon" href="http://www.fastresponse.org/misc/favicon.ico" type="image/x-icon" />

<link type="text/css" rel="stylesheet" media="all" title="mtyle" href="http://www.fastresponse.org/sites/all/themes/fastresponse/css/style.css" />
<link type="text/css" rel="stylesheet" media="print" href="http://www.fastresponse.org/sites/all/themes/fastresponse/css/print.css?C" /> 
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



<script type = "text/javascript"
src = "../../../js/jquery.js"></script>

<script type = "text/javascript">
$(document).ready(function() {

$("#menu").load("../../../menu/menu.html");


} );
</script>


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
    <input type="hidden" name="subject" value="Sample FormMail Auto Responder" />
    <!-- STEP 5: Put template name and other options in the 'autorespond' value. -->
    <input type="hidden" name="autorespond" value="PlainTemplate=hello.txt,HTMLTemplate=hello.html,
  Subject=Your confirmation,TemplateMissing=" />
  
  
  
     <div id="skip"><a href="#content">Skip to Content</a> <a href="#navigation">Skip to Navigation</a></div>  
  <!--  <div id="page"> -->

 
    <!-- ______________________ HEADER _______________________ -->
 
    <div id="header">
 
      <div id="logo-title">
	
 
              <div id="header-region">
          <div id="block-nice_menus-1" class="block block-nice_menus block-header block-id-33 clearfix odd">
  <div class="block-inner">
 
    
    <div class="content">
       <div id = "menu">
</div>
    </div>
 
    
  </div> <!-- /block-inner -->
</div> <!-- /block -->        </div>
      
      
    </div> <!-- /header -->
    <!-- ______________________ MAIN _______________________ -->

    <div id="main" class="clearfix">
    
      <div id="content">
        <div id="content-inner" class="inner column center">
					<img src="http://fastresponse.org/sites/default/files/imagecache/size_header/headers/header_contact_0.jpg" alt="Fast Response" title="Fast Response"  class="imagecache imagecache-size_header imagecache-default imagecache-size_header_default" width="1000" height="156" />          
                      <div id="content-header">

              <!--<div class="breadcrumb"><a href="/newsite/fastresponse/">Home</a></div>-->

              <!--                <h1 class="title">Contact info</h1>
              -->

              
              
               

              
            </div> <!-- /#content-header -->
          
          <div id="content-area">
            <div class="node node clearfix node-type-page" id="node-26">
  <div class="node-inner">

    
    
    <div class="content">

      <h1>Contact Us For More Information</h1>	
<br>
At Fast Response we strive to provide the highest quality education possible. 
<br>
<br>
Please fill out the below information.<!-- We will send you an automated email
with more information, and -->&nbsp;We will have one of our friendly and knowledgable staff members contact 
you soon!
<br>
<br><br>


<center><b>Fill out form for more information!</b></center> <br> <center>* Indicates required field. </center><br>
  
  
  
  
  
  
<!--
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
    
    -->
    <!-- start table -->
    
    
        <table border="2" align="center" cellpadding="5" cellspacing="5%" bordercolor="#CCCCCC" bgcolor="#212F5F" FRAME=BOX RULES=ROWS>
      <tr>
        <td width="198"><p><strong>Full Name:</strong></p></td>
        <td width="450">&nbsp;&nbsp;
            <input type="text" name="realname" /> 
            *        </td>
      </tr>
      <tr>
        <td><p><strong>Email address:</strong></p></td>
        <td>&nbsp;&nbsp;
         <input type="text" name="email" maxlength="60" />
            *        </td>
      </tr>
   
	      <tr>
        <td><p><strong>Phone Number</strong>:</p></td>
        <td>&nbsp;&nbsp;
            <input type="text" name="phone"  /> 
            * <em>(555-555-5555)</em></td>
      </tr>
      <tr>
        <td><p><strong>What course(s) are <br>you interested in?</strong></p></td>
        <td>
		&nbsp;&nbsp;
		EMT
            <input type="checkbox" name="courses[]" value="EMT" />
			&nbsp;&nbsp;&nbsp;
   
      Phlebotomy
      <input type="checkbox" name="courses[]" value="Phlebotomy" />
     &nbsp;&nbsp;&nbsp;
	
     Sterile Processing
      <input type="checkbox" name="courses[]" value="Sterile Processing" />
      &nbsp;&nbsp;&nbsp; <br />
	
      	&nbsp;&nbsp;&nbsp;Clinical Medical Assistant
        <input type="checkbox" name="courses[]3" value="Clinical Medical Assistant" />
      <!-- removed june 2009  &nbsp;  EMSTA Paramedic
	  <input type="checkbox" name="courses[]" value="PARAMEDIC" />
      -->
    
		
         &nbsp;&nbsp;&nbsp;Ward Clerk
        <input type="checkbox" name="courses[]3" value="Ward Clerk" />
      Other Course(s)
      <input type="checkbox" name="courses[]" value="other" />        </td>
      </tr>
      <tr>
        <td valign="top"><p><strong>How did you hear about us??</strong></p></td>
        <td valign="top">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Feel free to be more specific here!<br>
    &nbsp;
    <select name="reference[]" multiple size="10" style="align:left;">
      <option value="Internet-Google">Google</option>
      <option value="Internet-Bing">Bing</option>
      <option value="Internet-Yahoo">Yahoo</option>
      <option value="Internet-other">Internet-Other</option>
      <option value="Friend/Relative">Friend/Relative</option>
      <option value="Coworker">Coworker</option>
      <option value="Former student">Former student</option>
      <option value="CalWorks">CalWorks</option>
      <option value="DHS/EMSA">DHS/EMSA</option>
      <option value="Employer">Employer</option>
      <option value="walk/drive">Walk-In/Drive-By</option>
      <option value="Flier">Flyer/Brochure</option>
      <option value="career">Career Fair</option>
      <option value="Youth Bridges">Youth Bridges</option>
      <option value="Other">Other/Not specified</option>
    </select>
    &nbsp;
<textarea name="how_hear_specific" rows="5" cols="25" style="color: #663300; margin-bottom: 70px;"></textarea>
 <br />     </td>
      </tr>
	   
	  
	    <tr>
        <td valign="top"><p><strong>Mailing Address:</strong></td>
        <td>  
		
		<input type="text" name=" street address" /> Street Address<br>
		<input type="text" name="street address 2" /> Street Address (Cont.)<br>
		<input type="text" name="street address 3" /> City, State, Zip Code<br>		</td>
      </tr>
      <tr>
        <td valign="top"><p><strong>Please enter any <br>questions or comments:</strong></p></td>
        <td><textarea name="comments" rows="10" cols="50"></textarea> <br><br></td></tr>
    
    
    
    
    
    <!-- end table -->
    <tr>
        <td colspan="2">
        <p>To have a confirmation emailed to you, please
        enter the characters you see in the image:
        </p>
        </td>
    </tr>
    <tr>
        <td valign="top">
            <img src="verifyimg.php?<?php if (defined("SID")) echo SID; ?>" alt="Image verification" name="vimg" id="vimg" />
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
        <td><input type="submit" value="Submit" />  <input type="hidden" name="good_url" value="http://fastresponse.org/school/thanks/" /> </td>
        <td></td>
    </tr>
    </table>
</form>
<small>
<a href="http://www.tectite.com/">FormMail</a> script by Tectite

</small>
<!-- /main -->
		<div id="classlinks">
			      <!-- ______________________ FOOTER _______________________ -->

             <div id="footer">
		<div id="footerlinks"><ul class="links"><li class="menu-111 active-trail first active"><a href="http://www.fastresponse.org" title="home" class="active">home</a></li>

<li class="menu-120"><a href="http://www.fastresponse.org/classes" title="courses">courses</a></li>
<li class="menu-251"><a href="https://fastresponse.securegw.com/cgi-bin/er/calendar_month.cgi" title="calendar">calendar</a></li>
<li class="menu-222"><a href="http://www.fastresponse.org/school/map_parking_and_directions" title="location">location</a></li>
<li class="menu-223"><a href="http://www.fastresponse.org/school/parking" title="parking">parking</a></li>
<li class="menu-198 last"><a href="http://www.fastresponse.org/school/contact_us" title="contact us">contact us</a></li>
</ul></div>
<p>&copy; 2009-2010 Fast Response. All Rights Reserved</p>                  </div> <!-- /footer -->

      
  <!-- /page -->

















</body>
</html>
