<?php
	/** site-specific variables and constants go here
	* (and page-specific ones go on the page and in header.php)
	*/

	# set campaign tags from url parameters
	set_url_tag('crtv'); // creative
	set_url_tag('ntwk'); // network
	set_url_tag('kw'); // keyword
	set_url_tag('dvc'); // device
	set_url_tag('lead_src'); // lead source

	set_landing_url(); // landing page url

	define('BASE_URL','/get-info/');

	define('EMAIL_FROM', 'autoreply@fastresponse.org'); // use the same domain as the webpage
	define('EMAIL_TO', 'it@fastresponse.org'); // use the same domain as the webpage

	define('PHONE','1-800-637-7387');
	# url parameters for youtube embeds
	define('YT_PARAMS','controls=0&autohide=1&iv_load_policy=3&modestbranding=1&rel=0&showinfo=0&wmode=transparent');

	$program_options = array();
	$program_options['EMT'] = 'EMT';
	$program_options['Sterile Processing'] = 'Sterile Processing';
	$program_options['Clinical Medical Assistant'] = 'Clinical Medical Assistant';
	$program_options['Phlebotomy'] = 'Phlebotomy';
	$program_options['Paramedic'] = 'Paramedic';
	$program_options['Other Courses'] = 'Other Courses';

?>
