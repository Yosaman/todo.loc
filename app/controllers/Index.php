<?php

namespace App\Controllers;

use app\Controller;
use app\models\Note;
use app\models\Session;
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
        parent::__construct();
        session_start();
    }

    public function __invoke()
    {
        $db_response = Session::findBy('session_key', $_SESSION['key']);
        $user_id = $db_response[0]->user_id;

        $this->view->notes = Note::findBy('user_id', $user_id);
        $this->view->display(__DIR__ . '/../templates/index.php');


    }

}