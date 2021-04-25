<?php

namespace App;


abstract class Model
{
    protected static $table = '';

    public $id;

    public static function findAll()
    {
        $db = new Db;
        $sql = 'SELECT * FROM ' . static::$table;
        return $db->query($sql, [], static::class);
    }

    public static function findLastThree()
    {
        $db = new Db;
        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY id DESC LIMIT 3';
        return $db->query($sql, [], static::class);
    }

    public function insert()
    {
        $db = new Db;
        $sql = 'INSERT INTO ' . static::$table;
        $props = get_object_vars($this);

        $fields = [];
        $builds = [];
        $data   = [];
        foreach ($props as $name => $value) {
            if ('id' == $name) {
                continue;
            }
            $fields[] = $name;
            $builds[] = ':' . $name;
            $data[':' . $name] = $value;
        }

        $sql .= ' (' . implode(', ', $fields) . ') VALUE (' . implode(', ', $builds) . ')';

        $db->execute($sql, $data);
        $this->id = $db->lastInsertId();
    }

    public function update()
    {
        $db = new Db;
        $sql = 'UPDATE ' . static::$table;
        $props = get_object_vars($this);

        var_dump($this, $props);

        $fields = [];
        $data = [];
        foreach ($props as $name => $value) {
            if ('id' != $name) {
                $fields[] = $name . ' = :' . $name;
            }
            $data[':' . $name] = $value;
        }

        var_dump($fields, $data);

        $sql .= ' SET ' . implode(', ', $fields) . ' WHERE id = :id';

        var_dump($sql);

        $db->execute($sql, $data);
    }

    public function delete()
    {
        $db = new Db;

        $sql = 'DELETE FROM ' . static::$table . ' WHERE id = :id';
        $data[':id'] = $this->id;

        $db->execute($sql, $data);
    }

    public static function findById($id)
    {
        $db = new Db;
        $builds[':id'] = $id;
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id = :id';
        return $db->query($sql, $builds, static::class)[0];
    }

    public function save()
    {
        if (!empty($this->id)) {
            $this->update();
        } else {
            $this->insert();
        }
    }
}
