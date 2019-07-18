<?php

$action = $_REQUEST["do"];

switch ($action) {
    case 'save':
        $user = new \App\models\User();
        $user->save();
        break;
    default:
        break;
}