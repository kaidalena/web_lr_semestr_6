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
    <script>
        function check_login(){
            var xmlString = "<profile><login>" + document.getElementById('login').value + "</login></profile>";
            var url = "/check_login";
            var xmlHttp = new XMLHttpRequest();
            xmlHttp.open("POST", url, true);
            // Сообщим серверу, что посылаются данные в формате XML
            xmlHttp.setRequestHeader("Content-Type", "text/xml");
            // Установим функцию уведомления пользователя о
            // завершении операции на сервере
            xmlHttp.onreadystatechange = function() {
                $respons = xmlHttp.responseText;
                document.getElementById('err_login').textContent = $respons;
            }
            // Отправим данные
            xmlHttp.send(xmlString);
        }
    </script>

        <h1>Регистрация пользователя</h1>
        <br/>
        <form action="" method="POST">
            <p><input type="text" name="name" placeholder="ФИО" data-toggle="popover"
                value="<?php if (isset($values['name'])) echo $values['name'] ?>" data-content="<?php echo $rules['name'] ?>"><br><pre><?php if (isset($errors['name'])) echo $errors['name'] ?></pre><br><br></p>
            <p><input type="text" name="email" placeholder="Email" data-toggle="popover"
                value="<?php if (isset($values['email'])) echo $values['email'] ?>" data-content="<?php echo $rules['email'] ?>"><br><pre><?php if (isset($errors['email'])) echo $errors['email'] ?></pre><br><br></p>
            <p><input type="text" name="login" id="login" placeholder="Логин" onblur="check_login()" data-toggle="popover"
                value="<?php if (isset($values['login'])) echo $values['login'] ?>" data-content="<?php echo $rules['login'] ?>"><br><pre id="err_login"><?php if (isset($errors['login'])) echo $errors['login'] ?></pre><br/><br/></p>
            <p><input type="password" name="password" placeholder="Пароль" data-toggle="popover"
                value="<?php if (isset($values['password'])) echo $values['password'] ?>" data-content="<?php echo $rules['password'] ?>"><br><pre><?php if (isset($errors['password'])) echo $errors['password'] ?></pre><br><br></p>
            <p><input type="submit" name="submit" value="Зарегестрироваться"></p>
        </form>

            <!-- <p><input type="text" name="name" placeholder="ФИО" data-toggle="popover"
                value="<?php if (isset($values['name'])) echo $values['name'] ?>" data-content="<?php echo $rules['name'] ?>"><br><pre><?php if (isset($errors['name'])) echo $errors['name'] ?><br></pre><br></p>
            <p><input type="text" name="email" placeholder="Email" data-toggle="popover"
                value="<?php if (isset($values['email'])) echo $values['email'] ?>" data-content="<?php echo $rules['email'] ?>"><br><pre><?php if (isset($errors['email'])) echo $errors['email'] ?><br></pre><br></p>
            <p><input type="text" name="login" placeholder="Логин" data-toggle="popover"
                value="<?php if (isset($values['login'])) echo $values['login'] ?>" data-content="<?php echo $rules['login'] ?>"><br><pre><?php if (isset($errors['login'])) echo $errors['login'] ?><br></pre><br></p>
            <p><input type="password" name="password" placeholder="Пароль" data-toggle="popover"
                value="<?php if (isset($values['password'])) echo $values['password'] ?>" data-content="<?php echo $rules['password'] ?>"><br><pre><?php if (isset($errors['password'])) echo $errors['password'] ?><br></pre><br></p>
            <p><input type="button" name="submit" value="Зарегестрироваться"></p> -->
            
</section>