<?php


include '../vendor/autoload.php';


$controllerName = $_REQUEST['c'] ?: 'good';
$actionName = $_REQUEST['a'];
$renderer = new \App\services\renders\TwigRenderServices();


$controllerClass = 'App\\controllers\\' .
    ucfirst($controllerName) . 'Controller';
if (class_exists($controllerClass)) {
    $controller = new $controllerClass($renderer);
    $controller->run($actionName);
}


