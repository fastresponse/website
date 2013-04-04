<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/php/templateload.php');
$template = new TemplateRenderer();
$template->display('index.html', array(), array());
?>
