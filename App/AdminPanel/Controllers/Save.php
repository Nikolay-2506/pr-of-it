<?php


namespace App\AdminPanel\Controllers;


use App\AdminPanel\Controller;
use App\Models\Article;

class Save extends Controller
{

    protected function handle()
    {
        $article = new Article;

        if (!empty($_POST['id'])) {
            $article = Article::findById((int)$_POST['id']);
        }
        $article->title     = $_POST['title'];
        $article->content   = $_POST['content'];
        $article->author_id = $_POST['author_id'];
        $article->save();

        header('Location: ' . $this->location);
    }
}