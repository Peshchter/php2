<?php


class Order
{

    public $id;
    public $user_id;
    public $shipping_address;
    public $summ;
    protected $order_status;
    public $payment_status;
    public $goods = [];

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

}

class DelayedOrder extends Order
{
    public $delayedDate;


}

class PriceTag
{
    public $main;
    public $opt;

}

class ActionPriceTag extends PriceTag
{
    public $startDate;
    public $finishDate;
    public $discount;

}