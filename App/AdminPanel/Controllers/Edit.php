<?php


namespace App\AdminPanel\Controllers;

use App\AdminPanel\Controller;
use App\Models\Article;
use App\Models\Author;

class Edit extends Controller
{

    protected function handle()
    {
        if (isset($_GET['id'])) {
            $this->view->article = Article::findById($_GET['id']);
        }

        $this->view->authors = Author::findAll();

        echo $this->view->render(__DIR__ . '/../Templates/record.php');
    }
}