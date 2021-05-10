<?php


namespace App\AdminPanel\Controllers;

use App\AdminPanel\Controller;
use App\Models\Article;

class Delete extends Controller
{
    protected function handle()
    {
        $article = Article::findById((int) $_POST['id']);
        if (empty($article->id)) {
            $this->access = false;
        }
        $article->delete();

        header('Location: ' . $this->location);
    }

    public function action()
    {
        if ($this->access()) {
            $this->handle();
        }
        die('Не найден ID записи');
    }
}