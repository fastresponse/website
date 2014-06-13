<?php
$file = $_SERVER['DOCUMENT_ROOT'] . '/php/video_list.txt';
$token = ':';
$sections = array('num', 'category', 'title');

function parse_line($text) {
  global $token, $sections;
  $ret = array();
  $exp = explode($token, $text);

  for ($i = 0; $i < count($exp) && $i < count($sections); $i++) {
    $ret[$sections[$i]] = $exp[$i];
  }
  return $ret;
}

function get_videos($categories) {
  global $file;
  $list = file($file, FILE_IGNORE_NEW_LINES);

  foreach ($list as $vid) {
    $vid = parse_line($vid);

    foreach ($categories as $cat) {
      if (preg_match("/$cat/i", $vid['category'])) {
        $ret[] = $vid;
        break;
      }
    }

  }

  return $ret;
}

?>
