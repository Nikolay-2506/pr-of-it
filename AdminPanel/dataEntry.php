<?php

use App\Models\Article;

require __DIR__ . '/../autoload.php';

$article = new Article;

if(true == empty($_POST['id'])){
    $article->id = null;
} else{
    $article->id = (int) $_POST['id'];
}
$article->title = $_POST['title'];
$article->content = $_POST['content'];

$article->save();

header("Location: http://php2.local/AdminPanel/admin.php");
exit;