<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $controller->login();
                header('Location: /admin');
        }

?>
<section>
        <h1>Админ панель</h1>
        <br/>

        <?php if (!isset($_SESSION['isAdmin']) || !$_SESSION['isAdmin']): ?>
        <form class="adminForm" action="" method="POST">
                <h2>Авторизация</h2>
                <p><input type="text" name="login" placeholder="Login"></p>
                <p><input type="password" name="password" placeholder="Password"></p>
                <p><input type="submit" name="submit" value="Войти"></p>
        </form>

        <?php else: ?>
        <h2> Вы зашли под аккаунтом администратора.</h2>
        <p> Здесь вы можете изменять данные web-страниц.</p>
        <?php endif ?>
</section>