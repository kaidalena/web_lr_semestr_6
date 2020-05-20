<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <link rel="stylesheet" href="/public/assets/css/foto.css">
    <link rel="stylesheet" href="/public/assets/css/menu.css">
    <link rel="stylesheet" href="/public/assets/css/study.css">
    <!-- <link rel="stylesheet" href="public/assets/css/test.css"> -->
    <!-- <script src="public/scripts/menu.js"></script> -->
    <script src="/public/scripts/submenu.js"></script>
    <script src="/public/scripts/check.js"></script>
    <script src="/public/scripts/jquery-2.2.3.js"></script>
    <script src="/public/scripts/JQcontacts.js"></script>
    <script src="/public/scripts/JQModalWindow.js"></script>
    <script src="/public/scripts/bootstrap/js/bootstrap.js"></script>
    <script src="/public/scripts/calendar.js"></script>
    <script src="/public/scripts/fotos.js"></script>
    <script src="/public/scripts/interests.js"></script>

    <!-- <script src="public/scripts/clock.js"></script> -->
</head>
<body>
<input type="checkbox" id="nav-toggle" hidden>
    <nav class="nav">
        <label for="nav-toggle" class="nav-toggle" onclick></label>
        <h2 class="logo">
            <a>Little_coon_</a>
        </h2>
        <ul>
            <li><a href="/">Главная</a>
            <li><a href="/aboutMe">Обо мне</a>
            <li><a href="/interests">Мои интересы</a>
            <li><a href="/schedule">Учеба</a>
            <li><a href="/fotos">Фотоальбом</a>
            <li><a href="/test">Тест</a>
            <li><a href="/contacts">Контакты</a>
            <li><a href="/guestBook">Гостевая книга</a>
            <!-- <li><a href="/guest/upload">Загрузка отзывов</a> -->
            <li><a href="/blog">Мой Блог</a>
            <li><a href="/blogEditor">Редактор Блога</a>
            <li><a href="/registration">Регистрация</a>
            <!-- <li><a href="/blog/upload">Загрузка сообщений блога</a> -->
        </ul>
    </nav>
    <?php require $view; ?> 
</body>
</html>