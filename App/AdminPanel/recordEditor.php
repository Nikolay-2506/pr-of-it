<?php

use App\Models\Article;

require __DIR__ . '/../../autoload.php';

$article = new Article;

if (isset($_GET['id'])) {
    $article = Article::findById($_GET['id']);
}

include __DIR__ . '/../Template/Admin/record.php';

//echo '<pre>'.print_r($_SERVER, true).'</pre>';