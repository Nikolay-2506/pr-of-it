<?php

use App\Models\Article;

require __DIR__ . '/../autoload.php';

$data = Article::findAll();

include __DIR__ . '/../Template/Admin/index.php';

//echo '<pre>'.print_r($data, true).'</pre>';