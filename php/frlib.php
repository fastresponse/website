<?php

function post_set($index) {
  return
    array_key_exists($index, $_POST) &&
    $_POST[$index] &&
    strlen($_POST[$index])
  ;
}

// sanitize a string to use as an html div id
function sanitize_id($in) {
  // quick-n-dirty. look for a builtin func later
  $out = str_replace(" ", "_", $in);
  return $out;
}

// turn a string into a set of html <li></li> items
// each newline-separated section becomes its own <li>
function listify($in) {
  if (!$in || !strlen($in)) return "";
  $lines = explode("\n", $in);
  $func = function($val) {
    return "<li>" . $val . "</li>";
  };
  $out = implode("\n", array_map($func, $lines));
  return $out;
}

// translates a php array into a mysql set
function arr_to_set($data_arr) {
  $data_set = implode(',', $data_arr);
  $data_set = "$data_set";
  return $data_set;
}

function phone_strip($str) {
  $str = '' . $str;
  $str = strtr($str, "()-+", "    ");
  $str = str_replace(" ", "", $str);
  return $str;
}

function phone_format($num) {
  $str = '' . $num;
  switch (strlen($str)) {
    case 7:
      $str = substr($str, 0, 3) . '-' . substr($str, 3);
    break;

    case 10:
      $str = substr($str, 0, 3) . '-' . substr($str, 3, 3) . '-' .
	     substr($str, 6);
    break;

    case 11:
      $str = substr($str, 0, 1) . '-' . substr($str, 1, 3) . '-' .
	     substr($str, 4, 3) . '-' . substr($str, 7);
    break;

    default:
      // not a standard US phone number, give up
  }
  return $str;
}

?>
