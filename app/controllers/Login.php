<?php
/**
 * Created by PhpStorm.
 * User: Yaroslav
 * Date: 26.06.2018
 * Time: 19:21
 */

namespace app\Controllers;


use app\Controller;
use app\models\Session;
use app\models\User;

class Login extends Controller
{

    protected $user;
    protected $key;


    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    public function __invoke()
    {
        if (!empty($_POST)) {
//            $name = 'Petya';
//            $pass = '456';

            $name = $_POST['name'];
            $pass = $_POST['pass'];

//       Создаем объект пользователя
            $this->user = new User();
            $this->user->createUser($name, $pass);

//       Проверяем существует ли такой пользователь в базе данных
            if ($this->user->checkUser()) {
                $this->createKey();

        /**
         * Если пользователь существует, записываем в базу данных новую сессию и перенаправляем на домашнюю страницу
         * иначе оставляем на текущей
         */
                $session = new Session();
                $session->user_id = $this->user->id;
                $session->session_key = $this->key;
                $session->insert();

                header('Location: http://'.$_SERVER['HTTP_HOST']);
            } else {
                header('Location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
            }

        } else {
            $this->view->display(__DIR__ . '/../templates/login.php');
//            echo __DIR__;
        }
    }

    public function createKey()
    {
        $this->key = time() + random_int(-150000000, 150000000);
        $_SESSION['key'] = $this->key;
    }

}