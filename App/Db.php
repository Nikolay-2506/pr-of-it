<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 06.03.2019
 * Time: 22:53
 */

namespace App;

use App\Exceptions\DBException;
use PDO;
use PDOException;
use PDOStatement;

class Db
{
    protected PDO $dbh;

    /**
     * Db constructor.
     * @throws DBException
     */
    public function __construct()
    {
        $config = Config::init();

        try {
            $this->dbh = new PDO('mysql:host=' . $config->data['db']['host'] . ';' .
                'dbname=' . $config->data['db']['dbname'] . ';' .
                'charset=' . $config->data['db']['charset'] . ';',
                $config->data['db']['user'],
                $config->data['db']['password']);
        } catch (PDOException $exception) {
            throw new DBException(
                'При инициализации подлючения к базе произошло исключение',
                0,
                $exception);
        }

        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function query($sql, $params = [], $class = null)
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        if ($class == null) {
            $sth->setFetchMode(PDO::FETCH_ASSOC);
        } else {
            $sth->setFetchMode(PDO::FETCH_CLASS, $class);
        }

        return $sth->fetchAll();
    }

    public function queryEach($sql, $params = [], $class = null)
    {
        $sth = $this->dbh->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]);

        $sth->execute($params);

        if ($class == null) {
            $sth->setFetchMode(PDO::FETCH_ASSOC);
        } else {
            $sth->setFetchMode(PDO::FETCH_CLASS, $class);
        }

        while ($row = $sth->fetch(null, PDO::FETCH_ORI_NEXT)) {
            yield $row;
        }
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
