<?php

use \App\Models\Article;
use App\Models\User;

require __DIR__ . '/autoload.php';

$article = new Article;

//$sql = 'SELECT * FROM news WHERE id=:id';
//$data = $db->query($sql, [':id' => 2 ]);

//$data = Article::findAll();
$data = Article::findLastThree();

include __DIR__ . '/Template/tableNews.php';

//echo '<pre>'.print_r($data, true).'</pre>';
