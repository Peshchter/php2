<?php

include '../services/Autoload.php';

use App\models\User;
use App\services\BD;

spl_autoload_register(
    [new App\services\Autoload(),
        'loadClass']
);

$user = new User();
$user->getOne(1);
//var_dump( $user);

$users = $user->getAll();

$user2 = new User();
$user2->getOne(5);
$user2->login = 'RGFIGsa2323';


$user2->save();
//include 'form.html';


