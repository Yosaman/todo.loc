<?php

require_once __DIR__ . '/../autoload.php';

$uri = explode('/', $_SERVER['REQUEST_URI']);

$class = $uri[1] ? ucfirst($uri[1]) : 'Index';

$class_name = '\app\controllers\\' . $class;

//echo '<br>';
//
//var_dump($class_name);
//
//echo '<br>';

$controller = new $class_name;

//echo '<br>';

//var_dump($controller);

$controller();


