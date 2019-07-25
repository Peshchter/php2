<?php
namespace App\models;
/**
 * Class Good
 * @package App\models
 * @method static getOne($id)
 */
class Good extends Model
{
    public $id;
    public $price;
    public $title;
    public $info;
    public $img;

    protected static function getTableName()
    {
        return 'products';
    }
}