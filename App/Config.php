<?php

namespace App;


class Config
{
    private static $instances = [];
    public $data;

    private function __construct()
    {
        $this->data = ['db' => []];
        $connectionString = file_get_contents(__DIR__ . '/../connectionDataBase');

        $configurations = explode(';', $connectionString);
        foreach ($configurations as $configuration) {
            list($key, $value) = explode(':', $configuration);
            $this->data['db'][$key] = $value;
            unset($key, $value);
        }
    }

    public static function init()
    {
        $cls = static::class;

        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }
}