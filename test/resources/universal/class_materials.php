<?php
  //include_once("../$course/class_materials.php");
  include_once($_SERVER['DOCUMENT_ROOT'] . '/php/frlib.php');

  function file_ext($file) {
    return strtolower(pathinfo($file, PATHINFO_EXTENSION));
  }

  function file_title($file) {
    return ucwords(pathinfo($file, PATHINFO_FILENAME));
  }

  function create_nav($file, $ext, $id, $title) {
    switch ($ext) {
      case 'pdf':
	$url  = 'http://' . $_SERVER['SERVER_NAME'] . $file;
	$out  = "<span onClick=\"showSubSection('materials', '$id'); ";
	$out .= "setSource('display_$id', googleViewer('$url'), false); \">";
	$out .= "$title</span>\n";
      break;

      default:
	$out = "";
    }
    return $out;
  }

  function create_body($file, $ext, $id, $title) {
    switch ($ext) {
      case 'pdf':
	$out  = "<iframe id=\"display_$id\" allowtransparency=\"true\" frameborder=\"0\">\n";
	$out .= "</iframe>\n";
      break;

      default:
	$out = "";
    }
    return $out;
  }

  function create_list_and_divs($curdir, &$list, &$divs, &$ids) {
    $entries = scandir($_SERVER['DOCUMENT_ROOT'] . $curdir);
    $subdirs = array();
    $files = array();

    $list .= "<ul class=\"bullets underline pointer\">\n";
    
    foreach ($entries as $name) {
      if ($name == ".." || $name == ".") continue;
      $name = rtrim($curdir, '/') . '/' . $name;
      if (is_dir($_SERVER['DOCUMENT_ROOT'] . $name)) {
	$subdirs[] = $name;
      }
      else {
	$files[] = $name;
      }
    }

    foreach ($subdirs as $sub) {
      $list .= "<li>" . file_title($sub) . "\n";
      create_list_and_divs($sub, $list, $divs, $ids);
      $list .= "</li>";
    }

    foreach ($files as $file) {
      $ext = file_ext($file);
      $title = file_title($file);
      $id = sanitize_id($title);
      $ids[] = $id;

      $list .= "<li>\n";
      $list .= create_nav($file, $ext, $id, $title);
      $list .= "</li>\n";

      $divs .= "<div id=\"$id\" class=\"hidden\" " .
	       "style=\"width: 100%; height: 100%; position: relative; " .
	       "top: 0; left: 0; bottom: 0; right: 0;\"" .
	       ">\n";
      $divs .= create_body($file, $ext, $id, $title);
      $divs .= "</div>\n";
    }

    $list .= "</ul>\n";
  }

  $list = "";
  $divs = "";
  $ids = array();

  $topdir = rtrim($dir, '/') . '/materials/';

  if (is_dir($_SERVER['DOCUMENT_ROOT'] . $topdir)) {
    create_list_and_divs($topdir, $list, $divs, $ids);
  }

  $addquotes = function($val) { return "'$val'"; };
  $sections = implode(", ",
    array_map($addquotes, $ids)
  );

?>

<script type="text/javascript">
  setSection('materials', [
    <?= $sections ?>
  ] );
</script>

<div class="column" style="width: 25%;">
<?= $list ?>
</div>

<div class="column" style="width: 65%; height: 100%; position: relative; top: 0; bottom: 0; right: 0; left: 0; ">
  <?= $divs ?>
</div>
