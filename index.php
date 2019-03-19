<?php

use \App\Models\Article;
use App\Models\User;

require __DIR__ . '/autoload.php';

$article = new Article;

$data = Article::findLastThree();

include __DIR__ . '/Template/tableNews.php';
