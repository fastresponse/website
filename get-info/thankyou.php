<?php
	//page variables - change as needed for this page
	$title		= 'Thank You';
	$description	= 'Thank you for contacting Fast Response. A friendly and knowledgeable Career Advisor will contact you shortly.';

	$headline = 'Thank You!'; //This is the BIG headline at the top
	$subhead = ''; //This is the main headline of the body

	$hideForm	= true;
	$hideKeyValues	= true;
	$hideExternalSites	= true;
	$hideTestimonials	= true;
	$conversionCode = true;

//	$program_training_in = ' ';

	include_once('includes/header.php');
?>

<p>Thank you for your interest in Fast Response, and congratulations on taking the first steps towards a rewarding new career.</p>

<p>A Fast Response representative will follow up with you shortly to answer any questions that you may have.</p>

<p>
	For immediate questions, give us a call: <strong><?= phone_link(PHONE); ?></strong>
</p>

<p>Feel free to browse the rest of <a href="http://www.fastresponse.org/">our website</a> to learn more about Fast Response.</p>

<p>
	<a href='https://www.facebook.com/FastResponseSchool' target="_blank">
		<img style="vertical-align:middle;margin-right:.4em;" src="<?= BASE_URL ?>img/facebook-logo.png" alt="Facebook logo">Connect with us on Facebook
	</a>
</p>

<?php include_once('includes/footer.php'); ?>
