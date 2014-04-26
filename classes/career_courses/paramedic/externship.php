<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/php/dbconn.php');
if (!$handle) $handle = db_connect();
?>

<div id="externships">
<div class="module article-box">
  <div class="title">
    <div class="title-border">
      <h1>Didactic Observation Sites</h1>
    </div>
  </div>
  <div class="body">
    <ul>
    <?php foreach (query_external($handle, 'Paramedic', 'didactic observation', true, true) as $site): ?>
      <li><?= $site['site_department'] ?></li>
    <?php endforeach; ?>
    </ul>
  </div>
</div>
<div class="module article-box">
  <div class="title">
    <div class="title-border">
      <h1>Internship Sites</h1>
    </div>
  </div>
  <div class="body">
    <ul>
    <?php foreach (query_external($handle, 'Paramedic', 'internship', true, true) as $site): ?>
      <li><?= $site['site_department'] ?></li>
    <?php endforeach; ?>
    </ul>
  </div>
</div>
</div>
