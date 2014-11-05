<div id="externships">
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/php/dbconn.php');
if (!$handle) $handle = db_connect();
?>
<div class="module article-box">
  <div class="title">
    <div class="title-border">
      <h1>Clinical Externship Sites</h1>
    </div>
  </div>
  <div class="body">
    <ul>
    <?php foreach (query_external($handle, $course_abbr, 'clinical externship', true, true) as $site): ?>
      <li><?= $site['site_department'] ?></li>
    <?php endforeach; ?>
    </ul>
  </div>
</div>
</div>
