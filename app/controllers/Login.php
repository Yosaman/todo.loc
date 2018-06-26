<?php
/**
 * Created by PhpStorm.
 * User: Yaroslav
 * Date: 26.06.2018
 * Time: 19:21
 */

namespace App\Controllers;


use app\Db;
use app\models\Session;
use app\models\User;

class Login
{

    protected $user;
    protected $key;


    public function __construct()
    {
        session_start();
    }

    public function __invoke()
    {
        $name = "Petya";
        $pass = '456';

//        $name = $_POST['name'];
//        $pass = $_POST['pass'];

        $this->user = new User();
        $this->user->createUser($name, $pass);

        if ($this->user->checkUser()){
            $this->createKey();

//            var_dump($this->user->id);

            $session = new Session();
            $session->user_id = $this->user->id;
            $session->session_key = $this->key;

            $session->insert();

            header('Location: http://todo.loc/allo.php');


        }
    }

    public function createKey()
    {
        $this->key = time() + random_int(-150000000, 150000000);
        $_SESSION['key'] = $this->key;
    }

}