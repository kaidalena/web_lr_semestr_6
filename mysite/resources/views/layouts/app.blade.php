<!DOCTYPE html>
<html>
<head>
    <title>@yield('title-block')</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" href="/css/foto.css">
    <link rel="stylesheet" href="/css/menu.css">
    <link rel="stylesheet" href="/css/study.css">
    <script src="/scripts/submenu.js"></script>
    <script src="/scripts/check.js"></script>
    <script src="/scripts/jquery-2.2.3.js"></script>
    <script src="/scripts/JQcontacts.js"></script>
    <script src="/scripts/JQModalWindow.js"></script>
    <script src="/scripts/bootstrap/js/bootstrap.js"></script>
    <script src="/scripts/calendar.js"></script>
    <script src="/scripts/fotos.js"></script>
    <script src="/scripts/interests.js"></script>
    @yield('scripts')
</head>
<body>
<input type="checkbox" id="nav-toggle" hidden>
    <nav class="nav">
        <label for="nav-toggle" class="nav-toggle" onclick></label>
        <h2 class="logo">
            <a>Little_coon_</a>
        </h2>
        
        <?php
            if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']):
                echo "<h2>Admin</h2>";
                echo "<h3><a href='{{ route('exit') }}'>Выход</a></h3>";
        ?>
        <ul>
            <!-- <li><a href="/admin/guest/upload">Загрузка отзывов</a> -->
            <li><a href="{{ route('blogUpload') }}">Загрузка сообщений блога</a>
            <!-- <li><a href="/admin/statistic/visitings">Статистика посещаемости</a> -->

            <?php
                else:
                    echo "<ul>";
                    if(isset($_SESSION['isAdmin']) && !$_SESSION['isAdmin']){
                        echo "<h2>".$_SESSION['fio']."</h2>";
                        echo "<h3><a href='{{ route('exit') }}'>Выход</a></h3>";
                    }else{
                        echo "<h3><a href='{{ route('login') }}'>Вход</a></h3>";
                    }
                endif;
            ?>
            
            <li><a href="{{ route('index') }}">Главная</a>
            <!-- <li><a href="/aboutMe">Обо мне</a>
            <li><a href="/interests">Мои интересы</a>
            <li><a href="/schedule">Учеба</a>
            <li><a href="/fotos">Фотоальбом</a>
            <li><a href="/test">Тест</a>
            <li><a href="/contacts">Контакты</a>
            <li><a href="/guestBook">Гостевая книга</a> -->
            <li><a href="{{ route('blog') }}">Мой Блог</a>
            <li><a href="{{ route('blogEditor') }}">Редактор Блога</a>

        </ul>
    </nav>
    @yield('content') 
</body>
</html>