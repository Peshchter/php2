<?php
namespace App\models;

class Order extends Model
{
    public $id;
    public $info;

    protected function getTableName()
    {
        return 'orders';
    }
}