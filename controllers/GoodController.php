<?php

namespace App\controllers;

use App\models\entities\Good;
use App\models\repositories\GoodRepository;

class GoodController extends Controller
{
    protected $defaultAction = 'goods';

    public function goodAction()
    {
        $id = $this->getId();
        $params = [
            'good' =>  (new GoodRepository())->getOne($id)
        ];
        echo $this->render('good', $params);
    }

    public function goodsAction()
    {
        $params = [
            'goods' =>  (new GoodRepository())->getAll()
        ];

        echo $this->render('goods', $params);
    }

    public function deleteAction()
    {
        $id = $this->getId();
        $goodRepository = new GoodRepository();
        $good = $goodRepository->getOne($id);
        $goodRepository->delete($good);
        header('Location: /good/goods');
    }

    public function insertAction()
    {


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $gRepo = new GoodRepository();
            $good = new Good();
            $good->price = $_POST['price'];
            $good->title = $_POST['title'];
            $good->info = $_POST['info'];
            $good->id = $_POST['id'];
            $gRepo->save($good);
            header('Location: /good/goods');
            exit;
        }

        if ($_REQUEST['id']) {
            $gRepo = new GoodRepository();
            $good = $gRepo->getOne((int)$_REQUEST['id']);
            echo $this->render('goodInsert', ['good'=>$good]);
            exit;
        }

        echo $this->render('goodInsert', []);
    }


}