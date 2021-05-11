<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Article as ArticleModel;

class Article extends Controller
{
    protected function handle()
    {
        $this->view->article = ArticleModel::findById($_GET['id']);
        echo  $this->view->render(__DIR__ . '/../Template/tableArticle.php');
    }
}