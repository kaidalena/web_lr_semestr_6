<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"):
                if (!$controller->login()):
                        $values = $_POST;
                        $errors = $controller->model->validator->getErrors();
                endif;
        endif;
?>
<section>
        <br/>
        <h1>Авторизация</h1>
        <br/>
        <form class="adminForm" action="" method="POST">
                <p><input type="text" name="login" placeholder="Логин" data-toggle="popover"
                        value="<?php if (isset($values['login'])) echo $values['login'] ?>" data-content="<?php echo $rules['login'] ?>"><br><pre><?php if (isset($errors['login'])) echo $errors['login'] ?><br></pre><br></p>
                <p><input type="password" name="password" placeholder="Пароль" data-toggle="popover"
                        value="<?php if (isset($values['password'])) echo $values['password'] ?>" data-content="<?php echo $rules['password'] ?>"><br><pre><?php if (isset($errors['password'])) echo $errors['password'] ?><br></pre><br></p>
                <p>
                        <input type="submit" value="Войти" style="width: 160px;">
                        <a href="/registration"><input type='button' id="registration" value="Зарегестрироваться" style="width: 160px;"></a>
                </p>
        </form>
</section>