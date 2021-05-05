<?php use App\View; ?>
<?php use App\Models\Article; ?>
<?php /** @var $this View */ ?>
<?php /** @var $article Article */ ?>

<!DOCTYPE html>
<html>
<head>
    <title>tableNews</title>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
    <?php foreach ($this->news as $article): ?>
        <a href="/article.php?id=<?php echo $article->id; ?>">
            <h2 style="font-style: italic"><?php echo $article->title ?? '';?></h2>
        </a>
        <div style="background:#eeeeee; border:1px solid #cccccc; padding:5px 10px;">
                <span style = "font-family:Comic Sans MS,cursive; font-size:14px">
                    <code><?php echo $article->content ?? ''; ?></code>
                </span>
        </div>
        <?php if(!is_null($article->author)): ?>
            <div style="padding:5px 10px;">
                <span>Автор статьи:
                    <span>
                        <?php
                            echo $article->author->firstName . ' ' .
                                 $article->author->lastName . ' | ' .
                                 $article->author->email;
                        ?>
                    </span>
                </span>
            </div>
        <?php endif;?>
        <hr/>
    <?php endforeach; ?>
</body>
</html>
