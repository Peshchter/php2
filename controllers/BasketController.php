<?php
namespace App\controllers;

use App\main\App;
use App\models\repositories\GoodRepository;

class BasketController extends Controller
{
    const GOODS = 'goods';

    protected $defaultAction = 'index';

    public function addAction()
    {
        $id = $this->getId();
        if (empty($id)) {
            return $this->redirect();
        }
        $good = App::call()->goodRepository->getOne($id);
        if (empty($good)) {
            return $this->redirect();
        }

        $goods = $this->request->getSession(self::GOODS);
        if (array_key_exists($id, $goods)) {
            $goods[$id]['count']++;
        } else {
            $goods[$id] = [
                'title' => $good->title,
                'price' => $good->price,
                'count' => 1
            ];
        }

        $this->request->setSession(self::GOODS, $goods);
        return $this->redirect();
    }

    public function indexAction()
    {
        var_dump($_SESSION);
    }

    public function clearAction()
    {
        session_unset();
        return $this->redirect();
    }

    public function deleteAction()
    {
        $id = $this->getId();
        if (empty($id)) {
            return $this->redirect();
        }
        $goods = $this->request->getSession(self::GOODS);
        if (array_key_exists($id, $goods)) {
            unset($goods[$id]);
        }

        $this->request->setSession(self::GOODS, $goods);
        return $this->redirect();
    }
}