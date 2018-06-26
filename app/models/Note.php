<?php

namespace app\models;

use app\Model;

class Note extends Model
{

    public const TABLE = 'notes';

    public $title;
    public $note;
    public $date;


    public function printPost(){
        echo '<h3>' . $this->title . '</h3>';
        echo '<p>' . $this->note . '</p>';
        echo '<p>' . $this->data . '</p>';
    }

    public function editPost(){
        echo '<input name="title" value="' . $this->title .  '">';
        echo '<input name="content" value="' . $this->date . '">';
        echo '<input name="id" type="hidden" value="' . $this->id. '">';
        echo '<br>';
        echo '<button>Save</button>';
    }

}