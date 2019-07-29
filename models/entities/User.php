<?php
namespace App\models\entities;

/**
 * Class User
 * @package App\models
 * @method static getOne($id)
 * @method delete()
 */

class User extends Entity
{
    public $id;
    public $name;
    public $login;
    public $password;


}
