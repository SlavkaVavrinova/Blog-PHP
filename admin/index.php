<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

spl_autoload_register(function ($className) {
  $class = __DIR__ . '/Class/' . $className . '.php';
  if (is_file($class)) {
    require_once($class);
  } else {
    $class = __DIR__ . '/../Class/' . $className . '.php';
    require_once($class);
  }
});

$controllerProvider = new ControllerProvider();
$controller = $controllerProvider->getController();
$controller->render();