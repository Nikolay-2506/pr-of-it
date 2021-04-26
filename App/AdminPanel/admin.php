<?php

use App\Models\Article;
use App\View;

require __DIR__ . '/../../autoload.php';

$view = new View;
$view->news = Article::findAll();
print $view->render(__DIR__ . '/../Template/Admin/index.php');
