<?php
namespace App\controllers;

use App\main\App;
use App\models\entities\User;
use App\models\repositories\UserRepository;

class UserController extends Controller
{
    protected $defaultAction = 'users';

    public function userAction()
    {
        $id = $this->getId();
        $params = [
            'user' => App::call()->userRepository->getOne($id)
        ];
        echo $this->render('user', $params);
    }

    public function usersAction()
    {
        $params = [
            'users' => App::call()->userRepository->getAll()
        ];

        echo $this->render('users', $params);
    }

    public function deleteAction()
    {
        $id = $this->getId();
        $user = App::call()->userRepository->getOne($id);
        App::call()->userRepository->delete($user);
        return $this->redirect();
    }

    public function insertAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new User();
            $user->fio = $_POST['fio'];
            $user->login = $_POST['login'];
            $user->password = $_POST['password'];
            App::call()->userRepository->save($user);
            return $this->redirect();
        }
        echo $this->render('userInsert', []);
    }

    public function signInAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $login = $_POST['login'];
            $password = $_POST['password'];
            $user = App::call()->userRepository->getUserByLogin($login);
            if  ( password_verify($password, $user->password) ) {
                $this->request->setSession('is_Auth', true);
                $this->request->setSession('user_id', $user->id);
            }
            return $this->redirect('/good');
        }

        echo $this->render('signIn', []);

    }

    public function signOutAction()
    {
        $this->request->setSession('is_Auth', false);
        unset($_SESSION['user_id']);
        return $this->redirect();
    }

    public function regAction()
    {
        if (($_SERVER['REQUEST_METHOD'] == 'POST') && ($_POST['password'] == $_POST['password2'])) {
            $user = new User();
            $user->name = $_POST['name'];
            $user->login = $_POST['login'];
            $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            App::call()->userRepository->save($user);
            $user_id = App::call()->bd->lastID();
            $this->request->setSession('is_Auth', true);
            $this->request->setSession('user_id', $user_id);
            return $this->redirect('/good');

        }
        echo $this->render('userReg', []);
    }

}