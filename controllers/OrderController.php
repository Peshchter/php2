<?php


namespace App\controllers;

use App\main\App;
use App\models\entities\Order;
use App\models\repositories\OrderRepository;

class OrderController extends Controller
{
    protected $defaultAction = 'index';

    public function confirmAction()
    {

        $goods = $this->request->getSession('goods');
        $user = App::call()->userRepository->getOne($this->request->getSession('user_id'));
        $order = new Order();
        $order->goods = serialize($goods);
        $order->user_id = $user->id;
        $order->shipping_address = $user->address ?: null;
        App::call()->orderRepository->save($order);

        $this->request->setSession('goods', []);
        $params = [
          'link' => $_SERVER['HTTP_REFERER']
        ];
        echo $this->render('orderConfirm', $params);
     //   return $this->redirect();
    }


}