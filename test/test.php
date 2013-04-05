<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/php/templateload.php');
$template = new TemplateRenderer();

$vars = (array(
  'title' => 'Testing',
  'headerimg' => 'header_map_right.jpg',
  'content' => 'HELLO WORLD',
  'buttons' => array(
    array(
      'text' => "Test\nButton",
      'link' => '/school/info/',
      'target' => '_blank',
    ),
    array(
      'text' => 'Click Me',
      'link' => '/school/info/',
      'img' => 'envelope-icon.png',
    ),
  ),
));

$template->display('sidebar-view.twig', $vars);
?>
