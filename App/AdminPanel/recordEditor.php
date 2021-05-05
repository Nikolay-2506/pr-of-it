<?php

use App\Models\Article;
use App\View;

require __DIR__ . '/../../autoload.php';

$view = new View();

if (isset($_GET['id'])) {
    $view->article = Article::findById($_GET['id']);
}

print $view->render(__DIR__ . '/../Template/Admin/record.php');
