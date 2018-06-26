<?php

namespace App;

abstract class Model
{

    public const TABLE = '';

    public $id;

    protected $cols;
    protected $data;

    public static function findAll()
    {
        $db = new Db();

        $sql = 'SELECT * FROM ' . static::TABLE;
        return $db->query(
            $sql,
            [],
            static::class
        );
    }

    public static function findBy($col, $param)
    {
        $db = new Db();

        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE '. $col . '=:param';
        $param = [':param' => $param];
        $post = $db->query($sql, $param, static::class);

        if (empty($post)) {
            return false;
        } else {
            return $post;
        }
    }

    protected function createData(){
        $fields = get_object_vars($this);
        $this->cols = [];
        $this->data = [];
        foreach ($fields as $name => $value) {
            if ('id' == $name or 'data' == $name or 'cols' == $name) {
                continue;
            }
            $this->cols[] = $name;
            $this->data[':' . $name] = $value;
        }
    }

    public function insert()
    {
        $this->createData();

        $sql = 'INSERT INTO ' . static::TABLE . ' ( ' . implode(',', $this->cols) . ' ) VALUES ( ' . implode(',', array_keys($this->data)) . ')';
        $db = new Db();
        $db->execute($sql, $this->data);
        $this->id = $db->getLastId();
    }

    public function update()
    {
        $row = '';
        $this->createData();

        foreach ($this->cols as $col) {
            $row .= $col . ' = :' . $col . ', ';
        }
        $sql = 'UPDATE ' . static::TABLE . ' SET ' . substr($row, 0 , strlen($row)-2) . ' WHERE id = ' . $this->id;
        $db = new Db();
        $db->execute($sql, $this->data);
    }

    public function save()
    {
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id = :id';
        $db = new Db();
        $post = $db->query($sql, [':id' => $this->id], static::class);
        if (empty($post)) {
            $this->insert();
        } else {
            $this->update();
        }
    }

    public function delete()
    {
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id = :id';
        $db = new Db();
        $db->execute($sql, [':id' => $this->id]);
    }


}