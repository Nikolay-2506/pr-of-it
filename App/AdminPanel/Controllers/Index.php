<?php

namespace App\AdminPanel\Controllers;

use App\AdminPanel\AdminDataTable;
use App\ControllerAction;
use App\Models\Article;

class Index extends ControllerAction
{
    protected function handle()
    {
        $columns =
            [
                'id' => function (Article $article) {
                    return $article->id;
                },
                'title' => function (Article $article) {
                    return $article->title;
                },
                'content' => function (Article $article) {
                    return $article->content;
                },
                'author' => function (Article $article) {
                    $author = $article->author;

                    return !empty($author) ? $article->author->generateFullNameAuthor() : $author;
                },
                'email' => function (Article $article) {
                    $author = $article->author;

                    return !empty($author) ? $article->author->email : $author;
                }
            ];
        $adminDataTable = new AdminDataTable(Article::findAll(), $columns);

        echo $adminDataTable->render(__DIR__ . '/../Templates/index.php');
    }
}