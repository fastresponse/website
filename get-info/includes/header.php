<?php
	session_start();
	header("Content-Type: text/html; charset=UTF-8");
	header("X-UA-Compatible: IE=edge,chrome=1");
	ob_start("ob_gzhandler");

	//include code libraries used by site
	include_once('functions.php');
	include_once('vars.php');

	// default
	if(!isset($title_suffix))	$title_suffix	= ' | Fast Response';
	if(!isset($title)) 	$title		= 'Welcome';
	if(!isset($description)) 	$description	= 'Fast Response offers training for Health Care careers';

	if(!isset($hideForm))	$hideForm	= false;
	if(!isset($hideLinkList))	$hideLinkList	= true;
	if(!isset($hide_h1))	$hide_h1	= false;
	if(!isset($hide_h2))	$hide_h2	= false;
	if(!isset($conversionCode)) $conversionCode = false;
	if(!isset($questions_code)) $questions_code = '';

	$headline = get_dynamic_val('h1',$headline); //Get the dynamic headline if used, otherwise use the default headline (defined at the page level).
	$subhead = get_dynamic_val('h2',$subhead); //Get the dynamic headline if used, otherwise use the default headline (defined at the page level).

	//Determine the locations the current program is offered at. Then override if the dynamic locations are used (via the URL).
	if(!isset($location)) 	$location	= 'Berkeley, CA';
	$location = get_dynamic_val('loc',$location); //Will use the default determined above if no loc request parameter is passed

	$full_title = $title . $title_suffix; //this is the default title
	$full_title = get_dynamic_val('title',$full_title);

	$program_training_in = (!empty($program_training_in)) ? $program_training_in : "Career training in $location";

?>
<!DOCTYPE html>
<html lang=en>
<head>

	<meta name="robots" content="NOINDEX, NOFOLLOW" />
	<meta name=viewport content="width=device-width, minimum-scale=0.5, maximum-scale=1.0" />
	<meta name="description" content="<?= $description; ?>" />

	<title><?= $full_title; ?></title>

	<link rel=stylesheet href="<?= BASE_URL; ?>css/reset.css">
	<link rel=stylesheet href="<?= BASE_URL; ?>css/style.css">
	<link rel=stylesheet href="<?= BASE_URL; ?>css/form.css">
	<link rel=stylesheet href="<?= BASE_URL; ?>css/responsive.css">
	<link href='http://fonts.googleapis.com/css?family=Bitter:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

	<link rel="shortcut icon" href="<?= BASE_URL; ?>img/fav.png" />
	<link rel=apple-touch-icon-precomposed href="<?= BASE_URL; ?>img/fav.png" />

<?php
include_once('analytics.php');
include_once('vwo_code.php');
?>

</head>
<body>
<div class="wrap" id="top">

<div id="header">

	<img id="logo" title="Fast Response" alt="Fast Response" src="<?= BASE_URL; ?>img/logo.png">

	<div class="location">
		<?= $program_training_in; ?>
	</div>

	<div class="phone">
		<strong>Call <?= phone_link(PHONE); ?></strong><br>
		<span class="tagline">Speak to a friendly admissions advisor</span>
	</div>
</div>

<div class="header-get-info">
<?php if (!$hideForm): ?>
	<div class="get-info-now"><a href="#info-form" class="do-flash btn"><span>Get Info Now!</span></a></div>
<?php endif; ?>
</div>

<div class="main">

	<div id="content">

	<?php if (!empty($headline) && (!$hide_h1)): ?>
    <h1 class="title"><?= $headline; ?></h1>
  <?php endif; ?>

	<?php if (!empty($subhead) && (!$hide_h2)): ?>
	  <h2 class="title"><?= $subhead; ?></h2>
  <?php endif; ?>
