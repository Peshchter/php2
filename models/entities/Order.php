<?php
namespace App\models\entities;


class Order extends Entity
{
    public $id;
    public $user_id;
    public $shipping_address;
    public $summ;
    protected $order_status;
    public $payment_status;
    public $goods;
    public $info;

}