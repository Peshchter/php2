<?php

namespace App\controllers;

use App\models\Good;

class GoodController
{
    protected $defaultAction = 'goods';
    protected $action;
    protected $goodId;

    public function run($action)
    {
        $this->action = $action ?: $this->defaultAction;
        $this->goodId = (int)$_REQUEST['id']>0 ? $_REQUEST['id'] : 1;
        $method = $this->action . 'Action';
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            echo '404';
        }
    }

    public function goodAction()
    {
        $params = [
            'good' =>  Good::getOne($this->goodId)
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
    public function render($template, $params = [])
    {
        $content = $this->renderTmpl($template, $params);
        return $this->renderTmpl('layouts/main', [
            'content' => $content
        ]);
    }

    public function renderTmpl($template, $params = [])
    {
        ob_start();
        extract($params);
        include '../views/' . $template . '.php';
        return ob_get_clean();
    }

}