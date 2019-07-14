<?php

include '../services/Autoload.php';

use App\models\User;
use App\models\Good;
use App\services\BD;

spl_autoload_register(
    [new App\services\Autoload(),
        'loadClass']
);

$user = new User(new BD());

$user->getOne(12);
$good = (new Good(new BD()))->getAll();

var_dump($good);
var_dump($user->calc([1,15,456,456]));


