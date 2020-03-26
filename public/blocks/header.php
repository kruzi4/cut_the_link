<header>
    <div class="container top-menu">
        <div class="logo">
            <img src="/public/img/logo.png" alt="Logo">
            <span>Уберём всё лишнее из ссылки!</span>
        </div>
        <div class="nav">
            <a href="/">Главная</a>
            <a href="/contact/about">Про нас</a>
            <a href="/contact">Контакты</a>
            <?php if ($_COOKIE['login'] == ""): ?>
                <a href="/user/auth">Войти</a>
            <?php else: ?>
                <a href="/user/dashboard">Личный кабинет</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="container middle">

    </div>
</header>