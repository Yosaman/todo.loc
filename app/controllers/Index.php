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
        $db_response_session = Session::findBy('session_key', $_SESSION['key']);
        if ($db_response_session) {
            $user_id = $db_response_session[0]->user_id;

            $db_response_user = User::findBy('id', $user_id);
            $current_user = $db_response_user[0];

            $this->view->user_name = $current_user->name;
            $this->view->notes = Note::findBy('user_id', $user_id);
            $this->view->display(__DIR__ . '/../templates/index.php');
        } else {
            header('Location: http://'.$_SERVER['HTTP_HOST'].'/login');
        }

    }

}