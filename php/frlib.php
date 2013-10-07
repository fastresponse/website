<?php

function post_set($index) {
  return
    array_key_exists($index, $_POST) &&
    $_POST[$index] &&
    strlen($_POST[$index])
  ;
}

// taken straight from the PHP.net man page for include
function get_include_contents($filename) {
  if (is_file($filename)) {
    ob_start();
    include $filename;
    return ob_get_clean();
  }
  return false;
}

// sanitize a string to use as an html div id
function sanitize_id($in) {
  // replace anything that's not a letter with underscores
  $out = preg_replace('/[[:^alpha:]]/', '_', $in);
  return $out;
}

// html-ize any output
function htmlsafe($data) {
  $func = function(&$item, $key) {
    $item = htmlentities($item);
  };
  if (is_array($data))
    array_walk_recursive($data, $func);
  return $data;
}

// add html tags to some text
// mostly useful for array_map() calls
// $where can be 'front', 'back', or 'both'
//   determines where to place the tag
//   only does an end-tag (</tag>) when using 'both'
function htmlmap($text, $tag, $where = 'both') {
  switch ($where) {
    case 'both':
      $text = "<$tag>$text</$tag>";
    break;
    case 'front':
      $text = "<$tag>$text";
    break;
    case 'back':
      $text = "$text<$tag>";
    break;
  }
  return $text;
}

// turn a string into a set of html <li></li> items
// each newline-separated section becomes its own <li>
function listify($in) {
  if (!$in || !strlen($in)) return "";
  // use preg_split instead of explode to clear out extra newlines
  $lines = preg_split("/(\r\n)+|(\n)+/", $in);
  $func = function($val) {
    if (!$val || !strlen($val) || $val == "" || $val == " ") return "";
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

function money_strip($str) {
  $str = filter_var(
    $str, FILTER_SANITIZE_NUMBER_FLOAT,
    FILTER_FLAG_ALLOW_FRACTION
  );
  $num = floatval(sprintf("%.2f", $str));
  return $num;
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
