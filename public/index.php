<?php
include '../vendor/autoload.php';

$renderer = new \App\services\renders\TwigRenderServices();
$request = new \App\services\Request();
$controllerName = $request->getControllerName() ?: 'good';
$actionName = $request->getActionName();

$controllerClass = 'App\\controllers\\' .
    ucfirst($controllerName) . 'Controller';

if (class_exists($controllerClass)) {
    $controller = new $controllerClass($renderer, $request);
    $controller->run($actionName);
}

