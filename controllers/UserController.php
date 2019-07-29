<?php
namespace App\controllers;

use App\models\entities\User;
use App\models\repositories\UserRepository;

class UserController extends Controller
{
    protected $defaultAction = 'users';

    public function userAction()
    {
        $params = [
            'user' => User::getOne(1)
        ];

        echo $this->render('user', $params);
    }

    public function usersAction()
    {
        $params = [
            'users' => User::getAll()
        ];

        echo $this->render('users', $params);
    }

    public function deleteAction()
    {
        $id = $this->getId();
        $userRepository = new UserRepository();
        $user = $userRepository->getOne($id);
        $userRepository->delete($user);
        header('Location: ?a=users');
    }

    public function insertAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new User();
            $user->fio = $_POST['fio'];
            $user->login = $_POST['login'];
            $user->password = $_POST['password'];
            $user->save();
            header('Location: ?a=users');
            exit;
        }
        echo $this->render('userInsert', []);
    }
}