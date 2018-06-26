<?php


require_once __DIR__ . '/../autoload.php';

$uri = explode('/', $_SERVER['REQUEST_URI']);

$class = $uri[1] ? ucfirst($uri[1]) : 'Index';

$class_name = '\app\controllers\\' . $class;

$controller = new $class_name;

$controller();


