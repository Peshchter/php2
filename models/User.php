<?php
namespace App\models;

/**
 * Class User
 * @package App\models
 * @method static getOne($id)
 * @method delete()
 */
class User extends Model
{
    public $id;
    public $name;
    public $login;
    public $password;

    protected static function getTableName()
    {
        return 'users';
    }

}
