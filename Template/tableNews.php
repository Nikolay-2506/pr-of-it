<!DOCTYPE html>
<html>
<head>
    <title>tableNews</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
    <?php foreach ($data as $article) { ?>
        <a href="/article.php?id=<?php print $article->id; ?>" >
            <h2 style = "font-style:italic">'. $article->title . ' </h2 >
        </a>

        <div style = "background:#eeeeee; border:1px solid #cccccc; padding:5px 10px" >
            <span style = "font-size:14px" >
                <span style = "font-family:Comic Sans MS,cursive" >
                    <code > <?php print $article->content; ?> </code >
                </span >
            </span >
        </div >

        <p >&nbsp;</p >
        <hr />
    <?php } ?>
</body>
</html>
