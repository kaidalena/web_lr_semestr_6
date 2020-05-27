<section>
<?php
        $values;
        if ($_SERVER["REQUEST_METHOD"] == "POST"):
                if (!$controller->registration()):
                        $values = $_POST;
                        $errors = $controller->model->validator->getErrors();
                else:
                        $values = [];
                        echo "<h1 style='color:darkgreen;'> Регистрация прошла успешно </h1><br/>";
                endif;
        endif;
?>

        <h1>Регистрация пользователя</h1>
        <br/>
        <form action="" method="POST">
            <p><input type="text" name="name" placeholder="ФИО" data-toggle="popover"
                value="<?php if (isset($values['name'])) echo $values['name'] ?>" data-content="<?php echo $rules['name'] ?>"><br><pre><?php if (isset($errors['name'])) echo $errors['name'] ?><br></pre><br></p>
            <p><input type="text" name="email" placeholder="Email" data-toggle="popover"
                value="<?php if (isset($values['email'])) echo $values['email'] ?>" data-content="<?php echo $rules['email'] ?>"><br><pre><?php if (isset($errors['email'])) echo $errors['email'] ?><br></pre><br></p>
            <p><input type="text" name="login" placeholder="Логин" data-toggle="popover"
                value="<?php if (isset($values['login'])) echo $values['login'] ?>" data-content="<?php echo $rules['login'] ?>"><br><pre><?php if (isset($errors['login'])) echo $errors['login'] ?><br></pre><br></p>
            <p><input type="password" name="password" placeholder="Пароль" data-toggle="popover"
                value="<?php if (isset($values['password'])) echo $values['password'] ?>" data-content="<?php echo $rules['password'] ?>"><br><pre><?php if (isset($errors['password'])) echo $errors['password'] ?><br></pre><br></p>
            <p><input type="submit" name="submit" value="Зарегестрироваться"></p>
        </form>
</section>