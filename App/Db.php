<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 06.03.2019
 * Time: 22:53
 */

namespace App;


class Db
{
    protected $dbh;

    public function __construct()
    {
        $this->dbh = new \PDO('mysql:host=localhost; dbname=php2', 'root', '');
    }

    public function query($sql, $params = [], $class = null)
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        $sth->setFetchMode(\PDO::FETCH_ASSOC);
        $data = $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        return $data;
    }

    public function execute($query, $params=[])
    {
        $sth = $this->dbh->prepare($query);
        return $sth->execute($params);
    }
}
