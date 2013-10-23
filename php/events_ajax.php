<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/php/dbconn.php');

$handle = db_connect('events');

if (!isset($max)) $max = 0;
if (!isset($date_start)) $date_start = null;
if (!isset($date_end)) $date_end = null;

$allowed_args = array(
  'max', 'date_start', 'date_end',
);

foreach ($allowed_args as $arg) {
  if (isset($_POST[$arg]))
    $$arg = $_POST[$arg];
}

function format_event($handle, $event) {
  /*
   * $event = array(
   *   'id' => integer,
   *   'date' => 'date in YYYY-MM-DD format',
   *   'longdate' => 'date in MMM DD, YYYY format',
   *   'title' => 'string',
   *   'body' => 'html?',
   *   'thumbnail' => 'image url',
   *   'programs' => array(
   *     'EMT', 'CPT', ...
   *   ),
   *   'imagesize' => 'small/medium/large',
   *   'images' => array(
   *     'image url 1', 'image url 2', ...
   *   ),
   *   'links' => array(
   *     'link text 1' => 'link url 1',
   *     'link text 2' => 'link url 2',
   *   )
   * );
   */

  // all text from db_query is sent through htmlentities()
  // html_entity_decode() counteracts that so we can display html
  $event['body'] =
    "<p>" .
    str_replace(
      "\n",
      "</p>\n<p>",
      html_entity_decode($event['body'])
    ) .
    "</p>"
  ;

  if (!isset($event['longdate']))
    $event['longdate'] = '';

  if (!isset($event['programs']))
    $event['programs'] = '';

  $event['programs'] = str_replace(',', ', ', $event['programs']);

  if (!isset($event['thumbnail']))
    $event['thumbnail'] = '';
  
  if ($event['thumbnail'] != '')
    $event['thumbnail'] =
      "<img src='{$event['thumbnail']}' alt='' class='event-thumbnail' />";

  if (!isset($event['imagesize']))
    $event['imagesize'] = '';

  if (isset($event['images'])) {
    $event['images'] = explode(',', $event['images']);
    $tmp = '';
    foreach ($event['images'] as $image) {
      $tmp .= "<img src='$image' alt='' " .
	      "class='event-image size-{$event['imagesize']}' />";
    }
    $event['images'] = $tmp;
  }
  else
    $event['images'] = '';

  if (isset($event['links'])) {
    $event['links'] = explode(',', $event['links']);
    $tmp = '';
    foreach ($event['links'] as $linktext) {
      $data = query_button($handle, $linktext);
      if (!isset($data) || !count($data)) continue;
      $linkurl = $data['link'];
      $tmp .= "<a href='$linkurl' class='event-link'>$linktext</a>";
    }
    $event['links'] = $tmp;
  }
  else
    $event['links'] = '';

  foreach ($event as $key => $val) {
    if (is_int($key) || $key == 'html' || $key == 'thumbnail') continue;
    $classes = "event-$key";
    if ($val == '') $classes .= ' empty';
    $event[$key] = "<div class='$classes'>$val</div>";
  }

  return $event;
}

function get_events($handle, $max, $date_start, $date_end) {
  $defs = array(
    'connerr' => array(
      'id' => 0,
      'title' => 'Events',
      'body' => 'There was a problem connecting to the server. ' .
                'Please try again later.',
    ),
    'notfound' => array(
      'id' => 0,
      'title' => 'Events',
      'body' => 'There were no events found.',
    ),
  );

  if (!isset($handle)) {
    $results = array($defs['connerr']);
  }
  else if (!isset($max)) {
    $results = array($defs['notfound']);
  }
  else {
    $results = query_events_full($handle, $max, $date_start, $date_end);
  }

  if (!isset($results))
    $results = array($defs['notfound']);

  // loop variable by reference
  // lets us change the value in the original array
  foreach ($results as &$result) {
    $result = format_event($handle, $result);
  }
  unset($result); // break reference

  return $results;
}

$events = get_events($handle, $max, $date_start, $date_end);

foreach ($events as $event) {
  echo <<<OUT

<div class='event article-box'>
  <div class='title'>
    <div class='title-border'>
      <table cellpadding='0'><tbody><tr>
        <td class='left'><h2>{$event['longdate']}</h2></td>
        <td class='center'><h1>{$event['title']}</h1></td>
        <td class='right'><h2>{$event['programs']}</h2></td>
      </tr></tbody></table>
    </div>
  </div>
  <div class='body'>
    {$event['thumbnail']}
    {$event['body']}
    {$event['links']}
    {$event['images']}
  </div>
</div>

OUT;
}

?>
