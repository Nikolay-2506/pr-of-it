<?php

namespace App;

use App\Exceptions\Errors;
use App\Exceptions\NotFoundException;
use Exception;
use Throwable;

abstract class Model
{
    protected static $table = '';

    public $id;

    public static function findAll()
    {
        $db = new Db;
        $sql = 'SELECT * FROM ' . static::$table;

        $data = [];

        foreach ($db->queryEach($sql, [], static::class) as $item) {
            $data[] = $item;
        }
        return $data;
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
        $data = [];
        foreach ($props as $name => $value) {
            if ('id' == $name) {
                continue;
            }
            $fields[] = $name;
            $builds[] = ':' . $name;
            $data[':' . $name] = $value;
        }

        $sql .= ' (' . implode(', ', $fields) . ') VALUE' .
            ' (' . implode(', ', $builds) . ')';

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
                if ('data' == $name) {
                    continue;
                }
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

    /**
     * @param array $data
     * @throws Errors
     */
    public function fill(array $data)
    {
        $props = get_object_vars($this);
        $errors = new Errors;
        $t = false;

        foreach ($props as $key => $value) {
            if (!empty($data[$key])) {
                try {
                    $this->$key = $data[$key];
                    $t = true;
                } catch (Throwable $exception) {
                    $errors->add($exception);
                }
            }
        }

        if (!$t) {
            $errors->add(new Exception('Нет данных в массиве'));
        }

        if (!$errors->empty()) {
            throw $errors;
        }

        return $this;
    }

    /**
     * @param $id
     *
     * @return mixed|static
     * @throws NotFoundException
     */
    public static function findById($id)
    {
        $db = new Db;
        $builds[':id'] = $id;

        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id = :id';

        foreach ($db->queryEach($sql, $builds, static::class) as $item) {
            return $item;
        }

        throw new NotFoundException();
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
