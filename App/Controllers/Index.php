<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Article;

class Index extends Controller
{
    protected function handle()
    {
        $this->view->news = Article::findAll();
        echo $this->view->render(__DIR__ . '/../Template/tableNews.php');
    }
}