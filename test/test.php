<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/php/templateload.php');
$template = new TemplateRenderer();

$vars = (array(
  'title' => 'Testing',
  'content' => 'HELLO WORLD',
  'buttons' => array(
    array(
      'text' => 'Test<br />Button',
      'link' => '/school/info/',
      'lines' => 2,
      'target' => '_blank',
    ),
    array(
      'text' => 'Click Me',
      'link' => '/school/info/',
      'img' => 'envelope-icon.png',
    ),
  ),
));

$template->display('sidebar-view.html', $vars);
?>
