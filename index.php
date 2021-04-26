<?php

use \App\Models\Article;
use App\View;

require __DIR__ . '/autoload.php';

$view = new View;
$view->news = Article::findLastThree();
print $view->render(__DIR__ . '/App/Template/tableNews.php');
