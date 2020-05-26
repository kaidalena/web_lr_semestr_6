<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $controller->login();
        }
?>
<section>
        <br/>
        <h1>Авторизация</h1>
        <br/>
        <form class="adminForm" action="" method="POST">
                <p><input type="text" name="login" placeholder="Логин"></p>
                <p><input type="password" name="password" placeholder="Пароль"></p>
                <p>
                        <input type="submit" name="submit" value="Войти" style="width: 160px;">
                        <a href="/registration"><input type='button' id="registration" value="Зарегестрироваться" style="width: 160px;"></a>
                </p>
        </form>
</section>