<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $controller->login();
        }
?>
<section>
        <h1>Регистрация пользователя</h1>
        <br/>
        <form action="" method="POST">
            <p><input type="text" name="fio" placeholder="ФИО"></p>
            <p><input type="text" name="email" placeholder="Email"></p>
            <p><input type="text" name="login" placeholder="Логин"></p>
            <p><input type="password" name="password" placeholder="Пароль"></p>
            <p><input type="submit" name="submit" value="Зарегестрироваться"></p>
        </form>
</section>