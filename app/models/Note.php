<?php

namespace app\models;

use app\Model;

class Note extends Model
{

    public const TABLE = 'notes';

    public $title;
    public $note;
    public $date;
    public $user_id;

}