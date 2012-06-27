<?
//extract data from the post
extract($_POST);
//set POST variables
$url = 'http://mail.fastresponse.org/DiamondD/DDWebServiceProxy/DDWebServiceProxy.aspx?successUrl=http://fastresponse.org/school/thanks/&errorUrl=http://fastresponse.org/school/thanks/';
$fields = array(
            'lastName'=>urlencode($lastName),
            'firstName'=>urlencode($firstName),
            'homePhone'=>urlencode($homePhone),
            'email'=>urlencode($email),
            'address'=>urlencode($address),
            'city'=>urlencode($city),
            'state'=>urlencode($state)
			'zip'=>urlencode($zip)
            'programOfInterest'=>urlencode($programOfInterest),
            'heardAboutUs'=>urlencode($heardAboutUs),
            'contactingTime'=>urlencode($contactingTime),
            'comments'=>urlencode($comments),
        );
//url-ify the data for the POST
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string,'&');
//open connection
$ch = curl_init();
//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_POST,count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
//execute post
$result = curl_exec($ch);
//close connection
curl_close($ch);
	

?>
<html>
<head></head>
<body>
done
</body>
</html>