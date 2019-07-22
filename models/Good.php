<?php
namespace App\models;

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