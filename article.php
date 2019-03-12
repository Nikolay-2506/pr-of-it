<?php

use \App\Models\Article;

require __DIR__ . '/autoload.php';

$article = new Article;

$data = Article::findById($_GET['id']);

include __DIR__ . '/Template/tableArticle.php';