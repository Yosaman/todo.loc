<?php

require_once __DIR__ . '/../autoload.php';

$uri = explode('/', $_SERVER['REQUEST_URI']);

$class = $uri[1] ? ucfirst($uri[1]) : 'Index';

if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])
    && !empty($_SERVER['HTTP_X_REQUESTED_WITH'])
    && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

    $class = 'ajax';
}

$class_name = '\app\controllers\\' . $class;

$controller = new $class_name;

$controller();


