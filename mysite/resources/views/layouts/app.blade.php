<?php use Illuminate\Support\Facades\Auth; ?>
<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title-block')</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" href="/css/foto.css">
    <link rel="stylesheet" href="/css/menu.css">
    <link rel="stylesheet" href="/css/study.css">
    <script src="/scripts/jquery-2.2.3.js"></script>
    <script src="/scripts/bootstrap/js/bootstrap.js"></script>
    <script src="/scripts/submenu.js"></script>
    <script src="/scripts/check.js"></script>
    <script src="/scripts/JQcontacts.js"></script>
    <script src="/scripts/JQModalWindow.js"></script>
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
            if(Auth::check() && Auth::user()->isAdmin()):
                echo "<h2>Admin</h2>";
                echo "<h3><a href='/exit'>Выход</a></h3>";
        ?>
        <ul>
            <!-- <li><a href="/admin/guest/upload">Загрузка отзывов</a> -->
            <li><a href="{{ route('blogUpload') }}">Загрузка сообщений блога</a>
            <!-- <li><a href="/admin/statistic/visitings">Статистика посещаемости</a> -->

            
                @else:
                     <ul>
                    @if(Auth::check() && !Auth::user()->isAdmin()){
                        echo "<h2>".Auth::user()->name."</h2>";
                        echo "<h3><a href='/exit'>Выход</a></h3>";
                    }else{
                        echo "<h3><a href='/user'>Вход</a></h3>";
                    }
                endif;
            
            
            <li><a href="{{ route('index') }}">Главная</a>
            <li><a href="{{ route('blog.index') }}">Мой Блог</a>
            <li><a href="{{ route('blogEditor') }}">Редактор Блога</a>

        </ul>
    </nav>
    @yield('content') 
</body>
</html>