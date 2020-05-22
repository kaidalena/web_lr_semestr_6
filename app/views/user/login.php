<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $controller->login();
        }
?>
<section>
        <h1>Авторизация</h1>
        <br/>
        <form class="adminForm" action="" method="POST">
                <p><input type="text" name="Логин" placeholder="Login"></p>
                <p><input type="password" name="Пароль" placeholder="Password"></p>
                <p><input type="submit" name="submit" value="Войти"></p>
        </form>
</section>