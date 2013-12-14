<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/php/dbconn.php');
if (!$handle) $handle = db_connect();
?>

<div>
  <h1>Didactic Observation Sites</h1>
  <ul>
  <?php foreach (query_external($handle, 'Paramedic', 'didactic observation', true) as $site): ?>
    <li><?= $site['site_department'] ?></li>
  <?php endforeach; ?>
  </ul>
</div>
<div>
  <h1>Internship Sites</h1>
  <ul>
  <?php foreach (query_external($handle, 'Paramedic', 'internship', true) as $site): ?>
    <li><?= $site['site_department'] ?></li>
  <?php endforeach; ?>
  </ul>
</div>
