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
            // используем замыкание
            array_map(function (Article $article) {
                $article->author;
            }, $this->view->news);
        } catch (PDOException $exception) {
            throw new DBException(
                'При получении списка новостей произошло исключение',
                   0,
                        $exception);
        }
        $this->view->setTemplate();
        echo $this->view->render();
    }
}