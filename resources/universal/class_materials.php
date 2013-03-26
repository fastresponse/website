<?php
  //include_once("../$course/class_materials.php");
  include_once($_SERVER['DOCUMENT_ROOT'] . '/php/frlib.php');

  /* there are different ways to display various file types
  // for PDFs, we're going to load an iframe that uses Google viewer,
  //   but we don't actually set the src of the iframe until the file
  //   is selected - otherwise we'd be waiting while 20+ iframes load
  // we can probably do this for word, excel, and ppt files too
  */

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

      case 'php':
      case 'html':
      case 'htm':
	$out  = "<span onClick=\"showSubSection('materials', '$id'); \">";
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

      case 'php':
      case 'html':
      case 'htm':
	// these files do NOT need to use $id, they're inside a div with that id already
	$out = get_include_contents($_SERVER['DOCUMENT_ROOT'] . $file);
      break;

      default:
	$out = "";
    }
    return $out;
  }

  // need to return several lists, so just return by reference
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

      // this extra style gunk is necessary to force the iframe inside to fill this div
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

  // $dir = dirname($_SERVER['PHP_SELF']); // set previously
  // so $topdir is an absolute url pathname (/blah/place/materials/)
  // we have to tack the DOCUMENT_ROOT on to the front to do actual filesystem calls
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

<!-- this stuff is necessary to force the iframes inside to fill their container divs -->
<div class="column" style="width: 65%; height: 100%; position: relative; top: 0; bottom: 0; right: 0; left: 0; ">
  <?= $divs ?>
</div>
