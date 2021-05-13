<?php

namespace App\Controllers;

use App\Controller;
use App\Exceptions\DBException;
use App\Models\Article;
use PDOException;

class Index extends Controller
{
    /**
     * @throws DBException
     */
    protected function handle()
    {
        try {
            $this->view->news = Article::findAll();
        } catch (PDOException $exception) {
            throw new DBException(
                'При получении списка новостей произошло исключение',
                   0,
                        $exception);
        }
        echo $this->view->render(__DIR__ . '/../Template/tableNews.php');
    }
}