<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/php/Twig/Autoloader.php');
Twig_Autoloader::register();

class TemplateRenderer {
  public $loader;
  public $environment;

  public function __construct($envOptions = array(), $templateDirs = array()) {
    $envOptions += array(
      //'cache' => $_SERVER['DOCUMENT_ROOT'] . '/cache',
      'charset' => 'utf-8',
      'strict_variables' => false,
      'debug' => false,
      'auto_load' => true,
    );
    $templateDirs = array(
      $_SERVER['DOCUMENT_ROOT'] . '/templates',
    );
    $this->loader = new Twig_Loader_Filesystem($templateDirs);
    $this->environment = new Twig_Environment($this->loader, $envOptions);
  }

  public function render($templateFile, array $variables) {
    return $this->environment->render($templateFile, $variables);
  }

  public function display($templateFile, array $variables, array $blocks = array()) {
    $this->environment->display($templateFile, $variables, $blocks);
  }
}

