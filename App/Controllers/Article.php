<?php

namespace App\Controllers;

use App\Controller;
use App\Exceptions\DBException;
use App\Models\Article as ArticleModel;
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
        } catch (PDOException $exception) {
            throw new DBException(
                'При получении новости произошло исключение',
                   0,
                        $exception);
        }
        echo  $this->view->render(__DIR__ . '/../Template/tableArticle.php');
    }
}