<?php

use App\Models\Article;

require __DIR__ . '/../autoload.php';

$article = new Article;
$article->id = (int) $_POST['id'];
$article->delete();

header("Location: http://php2.local/AdminPanel/admin.php");
exit;