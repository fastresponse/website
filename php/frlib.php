<?php

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
  $data_set = "'$data_set'";
  return $data_set;
}

?>
