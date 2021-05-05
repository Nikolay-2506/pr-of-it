<?php use App\View; ?>
<?php /** @var View $this */ ?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Record Editor</title>
</head>
<body>

    <style type="text/css">
        .record input {float: left; border-color: gray; margin: 10px;}
        .record textarea#title{float: left; border: 2px solid gray; margin: 41px 0px 20px 10px; position: absolute; display: block}
        .record textarea#content{float: left; border: 2px solid gray; margin: 140px 0px 20px 10px; position: absolute; display: block}
        .record button {float: left; margin: 235px 0px 0px 515px; position: absolute; display: block}
        .record button#del {float: left; margin: 235px 0px 0px 400px; position: absolute; display: block}
    </style>

    <form class="record" action="/App/AdminPanel/dataEntry.php" method="post">
        <?php if(isset($this->article)): ?>
            <input name="id" readonly="readonly" value="<?php echo $this->article->id; ?>" >
        <?php endif; ?>

        <textarea id="title" name="title" placeholder="Заголовок статьи" cols="80" rows="5">
            <?php if(isset($this->article)): ?>
                <?php echo $this->article->title;?>
            <?php endif; ?>
        </textarea>

        <textarea id="content" name="content" placeholder="Текст статьи" cols="80" rows="5">
            <?php if(isset($this->article)): ?>
                <?php echo $this->article->content;?>
            <?php endif; ?>
        </textarea>

        <button type="submit">Отправить</button>

        <?php if($_GET['record'] == 'old'){ ?>
            <button id="del" type="submit" name="id" formaction="/App/AdminPanel/recordDelete.php"
                    value="<?php echo $article->id; ?>">
                Удалить
            </button>
        <?php } else{ ?>
            <button id="del" disabled="disabled" type="submit">Удалить</button>
        <?php }?>
    </form>
</body>
</html>