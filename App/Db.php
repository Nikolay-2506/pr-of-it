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
        if ($class == null){
            $sth->setFetchMode(\PDO::FETCH_ASSOC);
        } else {
            $sth->setFetchMode(\PDO::FETCH_CLASS, $class);
        }
        return $sth->fetchAll();
    }

    public function execute($query, $params=[])
    {
        $sth = $this->dbh->prepare($query);
        return $sth->execute($params);
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
}
