<?php
namespace App\models;

class Order extends Model
{
    public $id;
    public $user_id;
    public $shipping_address;
    public $summ;
    protected $order_status;
    public $payment_status;
    public $goods = [];
    public $info;
    /**
     * @param mixed
     */
    public function calcSumm()
    {
        $this->summ = 0;
        foreach ($this->goods as $good)
            $this->summ += $good->price*$good->count;
        return $this->summ;
    }

    /**
     * @return mixed
     */
    public function getOrderStatus()
    {
        return $this->order_status;
    }

    /**
     * @param mixed $status
     */
    public function setOrderStatus($status)
    {
        $this->order_status = $status;
    }

    /**
     * @param array $goods
     */
    public function addGoods($goods)
    {
        $this->goods += $goods;
    }



    protected static function getTableName()
    {
        return 'orders';
    }
}