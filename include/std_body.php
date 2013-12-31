<?php
if (empty($page_header)) $page_header = '';
?>
<body>

  <div id="page">

    <div id="menu">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/menu/menu.php'); ?>
    </div>

    <div id="head">
      <div class="left sidebar" id="logo-container">
	      <img src="/images/headers/header_main_left.png" alt="Fast Response School Of Health Care Education" />
      </div>
      <div class="right content" id="title-container">
	      <h1 class="page-header"><?= $page_header ?></h1>
      </div>
      <div class="clearfix"></div>
    </div> <!-- /head -->

    <div id="main">

