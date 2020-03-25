<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
    <meta name="description" content="Регистрация">

    <link rel="stylesheet" href="/public/css/main.css" charset="utf-8">
    <link rel="stylesheet" href="/public/css/form.css" charset="utf-8">
</head>
<body>
    <?php require 'public/blocks/header.php' ?>

    <div class="main">
        <h1>Сокра.тим</h1>
        <p>Вам нужно сократить ссылку? Прежде чем это сделать зарегестрируйтесь на сайте</p>
        <form action="/user/reg" method="post" class="form-control">
            <input type="email" name="email" placeholder="Введите email" value="<?=$_POST['email']?>"><br>
            <input type="text" name="name" placeholder="Введите логин" value="<?=$_POST['name']?>"><br>
            <input type="password" name="pass" placeholder="Введите пароль" value="<?=$_POST['pass']?>"><br>
            <div class="error"><?=$data['message']?></div>
            <button class="btn" id="send">Зарегистрироваться</button>
            <p>Есть аккаунт? Тогда вы можете <a href="/user/auth">авторизоваться</a></p>
        </form>
    </div>
</body>
</html>