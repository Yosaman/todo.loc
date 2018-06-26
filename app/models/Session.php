<?php
/**
 * Created by PhpStorm.
 * User: Yaroslav
 * Date: 26.06.2018
 * Time: 19:48
 */

namespace app\models;


use App\Model;

class Session extends Model
{
    public const TABLE = 'sessions';

    public $user_id;
    public $session_key;


}