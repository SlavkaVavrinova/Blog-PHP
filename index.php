<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

spl_autoload_register(function ($className) {
  $class = __DIR__ . '/Class/' . $className . '.php';
  include_once($class);
});



require __DIR__ . '/config.php' ; 
require __DIR__ . '/funkce.php' ; 

require nactiController();

require __DIR__ . '/layout/layout.php'; 
?>