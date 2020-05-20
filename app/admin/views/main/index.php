<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $controller->login();
        }
?>
<section>
        <h1>Админ панель</h1>
        <br/>
        <form class="adminForm" action="" method="POST">
                <h2>Авторизация</h2>
                <p><input type="text" name="login" placeholder="Login"></p>
                <p><input type="password" name="password" placeholder="Password"></p>
                <p><input type="submit" name="submit" value="Войти"></p>
        </form>
</section>