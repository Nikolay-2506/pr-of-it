<!doctype html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Админ панель</title>
</head>
<body>
    <h1>Панель администратора</h1>
    <style type="text/css">
        .tftable {font-size:12px;color:#fbfbfb;width:100%;border-width: 1px;border-color: #686767;border-collapse: collapse;}
        .tftable th {font-size:12px;background-color:#171515;border-width: 1px;padding: 8px;border-style: solid;border-color: #686767;text-align:left;}
        .tftable tr {background-color:#2f2f2f;}
        .tftable td {font-size:12px;border-width: 1px;padding: 8px;border-style: solid;border-color: #686767;}
        .tftable tr:hover {background-color:#171515;}
        .record {color: #fbfbfb; text-decoration: none;}
        .record:hover {color: darkgrey; text-decoration: underline;}
    </style>

    <table class="tftable" border="1">
        <tr><th>Заголовок</th><th>Контент</th></tr>
        <?php foreach ($data as $article){ ?>
            <tr>
                <td> <a class="record" href="/App/AdminPanel/recordEditor.php?record=old&id=<?php echo $article->id; ?>"> <?php echo $article->title; ?> </a> </td>
                <td><?php echo $article->content; ?></td>
            </tr>
        <?php } ?>
    </table>

    <form action="/App/AdminPanel/recordEditor.php" method="get" name="add">
        <button name="record" value="new">Добавить новую запись</button>
    </form>

</body>
</html>