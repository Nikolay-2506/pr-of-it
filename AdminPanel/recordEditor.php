<?php

use App\Models\Article;

require __DIR__ . '/../autoload.php';

$tmp = Article::findById($_GET['id']);
$article = $tmp[0];

include __DIR__ . '/../Template/Admin/record.php';

//echo '<pre>'.print_r($_SERVER, true).'</pre>';