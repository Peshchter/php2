<?php

include '../services/Autoload.php';

spl_autoload_register(
    [new App\services\Autoload(),
        'loadClass']
);

$controllerName = $_REQUEST['c'] ?: 'good';
$actionName = $_REQUEST['a'];

$controllerClass = 'App\\controllers\\' .
    ucfirst($controllerName) . 'Controller';
if (class_exists($controllerClass)) {
    $controller = new $controllerClass();
    $controller->run($actionName);
}


