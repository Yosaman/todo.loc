<?php
/**
 * Created by PhpStorm.
 * User: Yaroslav
 * Date: 25.06.2018
 * Time: 16:25
 */

namespace app\Models;

trait MagicTrait
{
    protected $data;

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

    public function __isset($name)
    {
        return isset($this->data[$name]);
    }
}

