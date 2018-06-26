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

    public function printPost2(){
        echo '<div id="' . $this->id . '" class="note col-md-4">';
        echo '<p class="date">' . $this->date . '</p>';
        echo '<h2>' . $this->title . '</h2>';
        echo '<p class="noteText">' . $this->note . '</p>';
        echo '<button data-id=' . $this->id . 'type="button" class="btn btn-block btn-primary">More</button></div>';
    }


    public function editPost(){
        echo '<input name="title" value="' . $this->title .  '">';
        echo '<input name="content" value="' . $this->date . '">';
        echo '<input name="id" type="hidden" value="' . $this->id. '">';
        echo '<br>';
        echo '<button>Save</button>';
    }

}