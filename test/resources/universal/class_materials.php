<?php
  include_once("../$course/class_materials.php");

  $list = "";
  $divs = "";
  $dir = "../$course/materials/";
  $files = array();
  if (is_dir($dir))
    $files = scandir($dir);
  
  foreach ($files as $file) {
    $title = $file_titles['$file'];
    $id = sanitize_id($title);
    $list .= "<li><span onClick=\"showSubSection('materials', '$id');\">";
    $list .= "$title</span></li>\n";
    $divs .= "<div id=\"$id\" class=\"hidden\">\n";
    $divs .= "  <iframe frameborder=\"0\">\n";
    $divs .= "  </iframe>\n";
    $divs .= "</div>\n";
    $ids[] = $id;
  }
?>

<script type="text/javascript">
  setSection('materials', [
    <?= implode(", ", $ids) ?>
  ] );
</script>

<ul class="underline pointer">
<?= $list ?>
</ul>

<?= $divs ?>

