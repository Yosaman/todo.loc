<?php

namespace App\Controllers;

use app\Controller;
use app\models\User;

class Index extends Controller
{
//    protected function handle()
////    {
////        $this->view->articles = Article::findAll();
////        echo $this->view->render(__DIR__ . '/../../templates/index.php');
////    }
///
    public function __construct()
    {
//        echo 'hello index';

        echo $_SERVER['DOCUMENT_ROOT'];

        $user = new User();
        $user->createUser('Ivan', '123');
        $data = $user->checkUser();
        echo '<br>';
        var_dump($data);

        $user1 = new User();
        $user1->createUser('Vika', '123');
        $data1 = $user1->checkUser();
        echo '<br>';
        var_dump($data1);
    }
}