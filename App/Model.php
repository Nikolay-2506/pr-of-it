<?php

namespace App;


abstract class Model
{
    protected static $table = '';

    public $id;

    public static function findAll()
    {
        $db = new Db;
        $sql = 'SELECT * FROM '. static::$table;
        return $db->query($sql, [], static::class);
    }

    public static function findLastThree()
    {
        $db = new Db;
        $sql = 'SELECT * FROM '. static::$table . ' ORDER BY id DESC LIMIT 3';
        return $db->query($sql, [], static::class);
    }

    public function insert()
    {
        $db = new Db;
        $sql = 'INSERT INTO ' . static::$table ;
        $props = get_object_vars($this);

        $fieds = [];
        $bield = [];
        $data = [];
        foreach ($props as $name => $value){
            if ('id' == $name){
                continue;
            }
            $fieds[] = $name;
            $bield[] = ':' . $name;
            $data[':' . $name] = $value;
        }

        $sql .= ' (' . implode(', ', $fieds ) . ') VALUE (' . implode(', ', $bield) . ')';

        $db->execute($sql, $data);
        $this->id = $db->lastInsertId();
    }

    public function update()
    {
        $db = new Db;
        $sql = 'UPDATE ' . static::$table ;
        $props = get_object_vars($this);

        $fieds = [];
        $data = [];
        foreach ($props as $name => $value){
            if ('id' == $name){
                $fieldid = $name . ' = :' . $name;
                $data[':' . $name] = $value;
                continue;
            }
            $fieds[] = $name . ' = :' . $name;
            $data[':' . $name] = $value;
        }

        $sql .= ' SET ' . implode(', ', $fieds). ' WHERE ' .$fieldid. ' ';

        $db->execute($sql, $data);
    }

    public function delete()
    {
        $db = new Db;

        $sql = 'DELETE FROM ' . static::$table ;
        $props = get_object_vars($this);

        $bield = ':' . $props['id'];
        $data[':' . $props['id']] = $props['id'];

        $sql .= ' WHERE id = ' . $bield;

        $db->execute($sql, $data);
    }

    public static function findById($id)
    {
        $db = new Db;
        $bield[':id'] = $id;
        $sql = 'SELECT * FROM '. static::$table . ' WHERE id = :id';
        $result = $db->query($sql, $bield, static::class);
        return $result[0];
    }

    public function save()
    {
        if(true == isset($this->id)){
            $this->update();
        } else {
            $this->insert();
        }
    }
}
