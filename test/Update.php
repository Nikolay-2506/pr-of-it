<?php

require __DIR__ . '/../autoload.php';

$article = new Article;

$article->id = 3;
$article->title = 'Американец вломился в магазин через окно ради Микки-Мауса';
$article->content = 'В американском штате Калифорния неизвестный мужчина вломился в магазин фортепиано и похитил игрушку Микки-Мауса. Об этом сообщает в своем Twitter ABC News.
Грабитель разбил окно закрытого заведения, однако не взял ничего ценного. Его целью, судя по видеозаписи, была «сидящая» на фортепиано игрушка.
О судьбе правонарушителя ничего не сообщается. В магазине сказали, что похищенную игрушку заменили новой.';

echo '<pre>'.print_r($article->update(), true).'</pre>';
