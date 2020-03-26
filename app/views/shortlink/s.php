<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Сократить ссылку</title>
    <meta name="description" content="Сократить ссылку">

    <link rel="stylesheet" href="/public/css/main.css" charset="utf-8">
    <link rel="stylesheet" href="/public/css/form.css" charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
</head>
<body>
    <?php require 'public/blocks/header.php' ?>

    <div class="container main">
        <h1>Сокра.тим</h1>
        <p>Вам нужно сократить ссылку? Сейчас мы это сделаем!</p>
        <form action="/s" method="post" class="form-control">
            <input type="text" name="link" placeholder="Длинное название" value=""><br>
            <input type="text" name="shortlink" placeholder="Короткое название" value=""><br>
            <div class="error"><?=$data['message']?></div>
            <button class="btn" id="send">Уменьшить</button>
        </form>
        <div class="links form-control">
            <?php if (count($data['links']) > 0): ?>
                <h1>Сокращённые ссылки</h1><br>
            <?endif; ?>
            <?php foreach ($data['links'] as $el): ?>
                <div class="links-wrap">
                    <p><b>Длинная:</b> <a href="<?=$el['link']?>"><?=$el['link']?></a></p>
                    <p><b>Короткая:</b> <a href="#">localhost:8888/<?=$el['shortlink']?></a></p>
                    <form action="/" method="post">
                        <input type="hidden" name="delete_item" value="">
                        <button class="btn">Удалить <i class="fas fa-trash"></i></button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>