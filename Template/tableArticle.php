<!DOCTYPE html>
<html>
<head>
    <title>tableNews</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<?php
    foreach ($data as $article) {
        echo '<h2 style = "font-style:italic">' . $article->title . ' </h2 >';

        echo '<div style = "background:#eeeeee; border:1px solid #cccccc; padding:5px 10px" >
                    <span style = "font-size:14px" >
                        <span style = "font-family:Comic Sans MS,cursive" >
                            <code > ' . $article->content . ' .</code >
                        </span >
                    </span >
                  </div >';

        echo '<hr />';
    }
?>
</body>
</html>
