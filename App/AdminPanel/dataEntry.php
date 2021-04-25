<?php

use App\Models\Article;

require __DIR__ . '/../../autoload.php';

$article = new Article;

if (!empty($_POST['id'])) {
    $article = Article::findById((int)$_POST['id']);
}
$article->title     = $_POST['title'];
$article->content   = $_POST['content'];

$article->save();

header("Location: http://profit.local/App/AdminPanel/admin.php");
exit;