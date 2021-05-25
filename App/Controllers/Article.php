<?php

namespace App\Controllers;

use App\Controller;
use App\Exceptions\DBException;
use App\Models\Article as ArticleModel;
use App\ViewTwig;
use PDOException;

class Article extends Controller
{
    /**
     * @throws DBException
     */
    protected function handle()
    {
        try {
            $this->view->article = ArticleModel::findById($_GET['id']);
            $this->view->article->author;
        } catch (PDOException $exception) {
            throw new DBException(
                'При получении новости произошло исключение',
                   0,
                        $exception);
        }
        $this->view->setTemplate(ViewTwig::ARTICLE_TEMPLATE);
        echo $this->view->render();
    }
}