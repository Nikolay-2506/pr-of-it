<?php

use \App\Models\Article;

require __DIR__ . '/autoload.php';

$article = new Article;

$data = Article::findLastThree();

include __DIR__ . '/App/Template/tableNews.php';
