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

        $fields = [];
        $data = [];
        foreach ($props as $name => $value) {
            if ('id' != $name) {
                if ('data' == $name) { continue; }
                $fields[] = $name . ' = :' . $name;
            }
            $data[':' . $name] = $value;
        }

        $sql .= ' SET ' . implode(', ', $fields) . ' WHERE id = :id';

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
        $data = $db->query($sql, $builds, static::class);
        if (is_array($data)) {
            foreach ($data as $datum) {
                if ($datum instanceof static) {
                    return $datum;
                }
            }
        }
        return new static;
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
