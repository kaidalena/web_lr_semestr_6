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
        <li><a href="/admin">Главная</a>
            <li><a href="/admin/guest/upload">Загрузка отзывов</a>
            <li><a href="/admin/blog/upload">Загрузка сообщений блога</a>
        </ul>
    </nav>
    <?php require $view; ?> 
</body>
</html>