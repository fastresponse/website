<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/php/dbconn.php');
if (empty($handle))
  $handle = db_connect();

$ext_types = query_set_values($handle, 'type', 'external_sites');

foreach ($ext_types as $type):

  $external_sites = query_external($handle, $program_abbreviation, $type, true, true);
  if (empty($external_sites))
    continue;
?>
  <h4><?= ucwords($type) ?> Sites</h4>
  <ul>
  <?php foreach ($external_sites as $site): ?>
    <li><?= $site['site_department'] ?></li>
  <?php endforeach; ?>
  </ul>

<?php endforeach; ?>
