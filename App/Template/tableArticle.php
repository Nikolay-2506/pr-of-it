<!DOCTYPE html>
<html>
<head>
    <title>tableNews</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
    <h2 style = "font-style:italic"> <?php print $article->title; ?> </h2 >

    <div style = "background:#eeeeee; border:1px solid #cccccc; padding:5px 10px" >
        <span style = "font-size:14px" >
            <span style = "font-family:Comic Sans MS,cursive" >
                <code > <?php print $article->content; ?> </code >
            </span >
        </span >
    </div >

    <hr />
</body>
</html>
