<?php
/**
 * Created by PhpStorm.
 * User: Yaroslav
 * Date: 26.06.2018
 * Time: 20:34
 */

namespace app\models;


use app\Db;
use app\Model;

class User extends Model
{
    public const TABLE = 'users';

    public $id;
    public $name;
    public $password;


    public function createUser($name, $pass)
    {
        $this->name = $name;
        $this->password = $pass;
    }

    public function checkUser() {
        $sql = 'SELECT * FROM users WHERE name=:name';

        $db = new Db();
        $db_response = $db->query(
            $sql,
            [':name' => $this->name],
            __CLASS__
        );
        $user = $db_response[0];

        $this->id = $user->id;

        if (!empty($user->password)) {
            return ($user->password == $this->password);
        }
        return false;
    }



}