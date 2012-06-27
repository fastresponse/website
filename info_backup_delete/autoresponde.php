<?php

include("autowrite.php");

$message=$automessage;

$headers = "From: $autofrom";

if($usesmtp=="yes")

{

$to=$toemail;
$mail1 = new PHPMailer(); 
$mail1->IsSMTP();
$mail1->SMTPAuth   = yes; // enable SMTP authentication
	$mail1->Host = $smtphost; // SMTP server

					$mail1->Port       = $smtpport; 

					$mail1->Username   = $smtpusername; // SMTP account username

				$mail1->Password   = $smtppassword; // SMTP account password

$mail1->AddReplyTo($autofrom, $subject);        

			$mail1->SetFrom($autofrom, $reply_name);                

			$mail1->AddAddress($email, $cname);        

			$mail1->Subject    = $autosubject;        

		



if($attachment !="")

{



$body             = file_get_contents($attachment);

$body             = eregi_replace("[\]",'',$body);

}

$mail1->MsgHTML($message);

$mail1->AddAttachment($attachment);

$mail = $mail1->Send();

}else{

if($attachment !="")

{

  // Read the file to be attached ('rb' = read binary)

  $file = fopen($attachment,'rb');

  $data = fread($file,filesize($attachment));

  fclose($file);



  



  // Generate a boundary string

  $semi_rand = md5(time());

  $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

  

  // Add the headers for a file attachment

  $headers .= "\nMIME-Version: 1.0\n" .

              "Content-Type: multipart/mixed;\n" .

              " boundary=\"{$mime_boundary}\"";





 // Add a multipart boundary above the plain message

  $message = "This is a multi-part message in MIME format.\n\n" .

             "--{$mime_boundary}\n" .

             "Content-Type: text/plain; charset=\"iso-8859-1\"\n" .

             "Content-Transfer-Encoding: 7bit\n\n" .

             $message . "\n\n";



  // Base64 encode the file data

  $data = chunk_split(base64_encode($data));



  // Add file attachment to the message



$message .= "--{$mime_boundary}\n" .

            "Content-Type: {$type};\n" .

            " name=\"{$name}\"\n" .

            "Content-Disposition: attachment;\n" .

            " filename=\"{$fileatt_name}\"\n" .

            "Content-Transfer-Encoding: base64\n\n" .

         $data . "\n\n";





}
// Send the message
mail($email, $autosubject, $message, $headers);

}
?>