<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/php/dbconn.php');
if (empty($handle))
  $handle = db_connect();

$ext_types = query_set_values($handle, 'type', 'externships');

$externship_query = function($handle, $program, $type) {
  $results = basic_query($handle,
    array('site'), # select
    'externships', # from
    array(
      'FIND_IN_SET(:course, courses) > 0',
      'FIND_IN_SET(:type, type) > 0'
    ), # where
    'site', # order by
    0, # limit
    array(
      ':course' => $program,
      ':type' => $type
    ) # replacement parameters
  );
  return $results;
};

foreach ($ext_types as $type):

  $externship_sites = $externship_query($handle, $program_of_interest, $type);
  if (empty($externship_sites))
    continue;
?>
  <h4><?= ucwords($type) ?> Sites</h4>
  <ul>
  <?php
  foreach (array_values($externship_sites) as $site): ?>
    <li><?= ucwords($site['site']); ?></li>
  <?php endforeach; ?>
  </ul>

<?php endforeach; ?>
