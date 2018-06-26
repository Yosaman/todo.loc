<?php
/**
 * Created by PhpStorm.
 * User: Yaroslav
 * Date: 26.06.2018
 * Time: 23:55
 */

namespace app\controllers;


use app\Controller;
use app\models\Note;
use app\models\Session;

class Ajax extends Controller
{
    public $action;
    public $user_id;

    public function __construct()
    {
        parent::__construct();
//        $this->action = $_POST['action'];
        $this->action = 'init';
    }

    public function __invoke()
    {
        $db_response_session = Session::findBy('session_key', $_SESSION['key']);
        if ($db_response_session) {
            $this->user_id = $db_response_session[0]->user_id;

            switch ($this->action) {
                case 'init':
                    $this->init();
                    break;
                case 'save':
                    save();
                    break;
                case 'new':
                    newNote();
                    break;
                case 'delete':
                    deleteNote();
                    break;
            }
        } else {
            echo json_encode([]);
        }
    }

    public function init()
    {
        $data = Note::findBy('user_id', $this->user_id);
        $out = [];
        foreach ($data as $k => $note) {
            $out[$k] = ['title' => $note->title,
                        'note' => $note->note,
                        'date' => $note->date,
                        'id' => $note->id];
        }
        echo (json_encode($out));
    }

    public function save()
    {

    }
}