<?php

namespace App\controllers;

use App\main\App;
use App\models\entities\Good;
use App\models\repositories\GoodRepository;

class GoodController extends Controller
{
    protected $defaultAction = 'goods';

    public function goodAction()
    {
        $id = $this->getId();
        $params = [
            'good' =>  App::call()->goodRepository->getOne($id)
        ];
        echo $this->render('good', $params);
    }

    public function goodsAction()
    {
        $logged = $this->request->getSession('is_Auth')?: false;
        $params = [
            'goods' =>  App::call()->goodRepository->getAll(),
            'basket' => $this->request->getSession('goods'),
            'logged_in' => $logged
        ];
        if ($logged)
        {
            $params['user'] =  App::call()->userRepository->getOne($this->request->getSession('user_id'));
        }
        echo $this->render('goods', $params);
    }

    public function deleteAction()
    {
        $id = $this->getId();
        $good = App::call()->goodRepository->getOne($id);
        App::call()->goodRepository->delete($good);
        return $this->redirect();
    }

    public function insertAction()
    {


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $good = new Good();
            $good->price = $_POST['price'];
            $good->title = $_POST['title'];
            $good->info = $_POST['info'];
            $good->id = $_POST['id'];
            App::call()->goodRepository->save($good);
            echo $this->render('good', ['good'=>$good]);
            exit;
        }

        if ($_REQUEST['id']) {

            $good = App::call()->goodRepository->getOne((int)$_REQUEST['id']);
            echo $this->render('goodInsert', ['good'=>$good]);
            exit;
        }

        echo $this->render('goodInsert', []);
    }


}