<?php
require_once('../php/Twig/Autoloader.php');
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('../templates');
$twig = new Twig_Environment($loader, array(
  //'debug' => true;
  'cache' => 'cache',
  'auto_load' => true,
));

$template = $twig->loadTemplate('base.php');

$template->display(array(
  'title' => 'Testing',
  'sidebar' => '<h4>Blah?</h4>',
  'content' => '<h1>HELLO WORLD</h1>',
));

?>
