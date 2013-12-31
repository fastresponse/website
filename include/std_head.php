<?php
if (empty($page_title)) $page_title = '';
if (empty($stylesheets)) $stylesheets = array();
if (empty($javascripts)) $javascripts = array();
if (empty($head_code)) $head_code = '';
if (empty($jquery)) $jquery = false;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">

<head>
<title><?= $page_title ?> | Fast Response</title>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="robots" content="INDEX, FOLLOW">
  <meta name="googlebot" content="INDEX, FOLLOW">

  <link type="image/x-icon" rel="shortcut icon" href="/misc/favicon.ico" />

  <link type="text/css" rel="stylesheet" media="all" href="/css/template.css" />
  <link type="text/css" rel="stylesheet" media="all" href="/css/nicemenus.css" />
  <link type="text/css" rel="stylesheet" media="all" href="/css/buttons.css" />
  <link type="text/css" rel="stylesheet" media="print" href="/sites/all/themes/fastresponse/css/print.css" /> 

<?php foreach ($stylesheets as $sheet): ?>
  <link type="text/css" rel="stylesheet" media="all" href="<?= $sheet ?>" />
<?php endforeach; ?>

  <!--[if lte IE 6]><style type="text/css" media="all">@import "/sites/all/themes/fastresponse/css/ie6.css";</style><![endif]-->
  <!--[if IE 7]><style type="text/css" media="all">@import "/sites/all/themes/fastresponse/css/ie7.css";</style><![endif]-->
  <!--[if lte IE 8]><style type="text/css" media="all">@import "/css/buttons-ie.css";</style><![endif]-->

  <?php include_once('analytics_google.php'); ?>

  <?php if ($jquery): ?>
  <script src="/js/jquery-1.10.2.min.js" type="text/javascript"></script>
  <?php endif; ?>

  <?php foreach ($javascripts as $script): ?>
  <script src="<?= $script ?>" type="text/javascript"></script>
  <?php endforeach; ?>

  <?= $head_code ?>

  <style type="text/css">
  #head {
    border-bottom: none;
    position: relative;
  }
  </style>

</head>
