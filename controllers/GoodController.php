<?php

namespace App\controllers;

use App\models\Good;

class GoodController extends Controller
{
    protected $defaultAction = 'goods';

    public function goodAction()
    {
        $this->id = (int)$_REQUEST['id']>0 ? $_REQUEST['id'] : 1;
        $params = [
            'good' =>  Good::getOne($this->id)
        ];
        echo $this->render('good', $params);
    }

    public function goodsAction()
    {
        $params = [
            'goods' =>  Good::getAll()
        ];

        echo $this->render('goods', $params);
    }
}