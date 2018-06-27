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
        $this->action = $_POST['action'];
//        $this->action = 'init';
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
                    $this->save();
                    break;
                case 'new':
                    $this->save();
                    break;
                case 'delete':
                    $this->delete();
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
        $note = new Note();
        $note->title = $_POST['title'];
        $note->note = $_POST['note'];
        $note->id = $_POST['id'];
        $note->user_id = $this->user_id;
        $note->date = date('Y-m-j H:i:s');
        $note->save();
    }

    public function delete()
    {
        $db_response = Note::findBy('id', $_POST['id']);
        $note = $db_response[0];
        if ($note->user_id == $this->user_id) {
            $note_to_delete = new Note();
            $note_to_delete->id = $_POST['id'];
            $note_to_delete->delete();
        }
    }
}