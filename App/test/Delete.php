<?php

use \App\Models\Article;

require __DIR__ . '/../../autoload.php';

$data = Article::findById(2);

$article = $data[0];

$article->delete();

//echo '<pre>'.print_r($article, true).'</pre>'; die;
