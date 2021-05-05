<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 06.03.2019
 * Time: 22:53
 */

namespace App;

use PDO as PDO;

class Db
{
    protected $dbh;

    public function __construct()
    {
        $config = Config::init();
        $this->dbh = new PDO('mysql:host=' . $config->data['db']['host'] . ';' .
                            'dbname=' . $config->data['db']['dbname'] . ';' .
                            'charset=' . $config->data['db']['charset'] . ';',
                        $config->data['db']['user'],
                        $config->data['db']['password']);
    }

    public function query($sql, $params = [], $class = null)
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        if ($class == null) {
            $sth->setFetchMode(\PDO::FETCH_ASSOC);
        } else {
            $sth->setFetchMode(\PDO::FETCH_CLASS, $class);
        }
        return $sth->fetchAll();
    }

    public function execute($query, $params = [])
    {
        $sth = $this->dbh->prepare($query);
        return $sth->execute($params);
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
}
