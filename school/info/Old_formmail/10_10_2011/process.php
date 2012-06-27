<html>
<head></head>
<body>
<?
 	
	foreach ($_POST as $key => $value) {
		echo($key." = ".$value."\n");
	}
echo("done.");

$lastName=$_POST['lastName'];
$firstName=$_POST['firstName'];
$homePhone=$_POST['homePhone'];
$email=$_POST['email'];
$address=$_POST['address'];
$city=$_POST['city'];
$state=$_POST['state'];
$zip=$_POST['zip'];
$programOfInterest=$_POST['programOfInterest'];
$heardAboutUs=$_POST['heardAboutUs'];
$contactingTime=$_POST['contactingTime'];
$comments=$_POST['comments'];

	echo "<form name='setdata' action='http://mail.fastresponse.org/DiamondD/DDWebServiceProxy/DDWebServiceProxy.aspx?successUrl=http://fastresponse.org/school/thanks/index.html&errorUrl=http://fastresponse.org/school/thanks/index.html' method='post' >";
	echo "	<INPUT type='hidden' name='lastName' value='$lastName' />";
	echo "	<INPUT type='hidden' name='firstName' value='$firstName' />";
	echo "	<INPUT type='hidden' name='homePhone' value='$homePhone' />";
	echo "	<INPUT type='hidden' name='email' value='$email' />";
	echo "	<INPUT type='hidden' name='address' value='$address' />";
	echo "	<INPUT type='hidden' name='city' value='$city' />";
	echo "	<INPUT type='hidden' name='state' value='$state' />";
	echo "	<INPUT type='hidden' name='zip' value='$zip' />";
	echo "  <INPUT type='hidden' name='programOfInterest' value='$programOfInterest' />";
	echo "  <INPUT type='hidden' name='heardAboutUs' value='$heardAboutUs' />";
	echo "  <INPUT type='hidden' name='contactingTime' value='$contactingTime' />";
	echo "  <INPUT type='hidden' name='comments' value='$comments' />";
	echo "  <INPUT type='hidden' name='campusName' value='FR' />";
	
	echo "  <input type='submit' value='Submit'>";
	
?>
</body>
</html>