<?php
  require_once($_SERVER['DOCUMENT_ROOT'] . '/php/dbconn.php');
  if (empty($handle)) $handle = db_connect();

  $where = array(
    "course = '$next_class_code'",
    "thedate >= '" . date('Y-m-d') . "'",
    "status <> 'full'",
  );
  if (isset($next_class_type))
    $where[] = "type = '$next_class_type'";

  $result = basic_query($handle,
    // select
    array(
      "DATE_FORMAT(thedate, '%M %D, %Y') as showdate",
    ),

    // from
    'start_dates',

    // where
    $where,

    // order
    'thedate ASC',

    // limit
    1,

    // params
    array()
  );

  if (is_array($result) && isset($result['showdate'])):
    $out = isset($next_class_text) ? $next_class_text : 'Next class date:';
    $out.= ' ' . $result['showdate'];
?>
<p style="padding: 0 10%; color: red; font-weight: bold; font-size: 120%; text-align: center;">
  <?= $out ?><br />
  Seats are limited!
</p>
<?php endif; ?>
