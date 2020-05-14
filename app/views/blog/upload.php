<section>

    <?php
        
        $values = [];
        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            // echo "<p>".var_dump($_POST)."</p>";
            // echo "<p>".var_dump($_FILES)."</p>";

            $array_from_valid = $_POST;
            $array_from_valid['userFile'] = $_FILES;

            $valid->Validate($array_from_valid);
            if (!$valid->checkErrors($errors)) $values = $_POST;
            // else{
            //     $controller->save($_POST);
            //     echo "<div id='resultWindiw' style=\"color: green; font-size: 30px;\">Форма успешно отправлена</div>";
            // }
        }

        // if ($_SERVER["REQUEST_METHOD"] == "POST"){
        //     echo "<div style=\"color: blue;\">".$model->loadGuestBook($_FILES, "userFile")."</div>";
        //     $new_url = 'http://mysite.com/guestBook';
        //     header('Location: '.$new_url);
        // }
    ?>




    <h1>Добавление записи Блога</h1>

    <form enctype="multipart/form-data"  action="" method=POST >
        <p><input type="text" id="topic" name="topic" placeholder="Тема сообщения" data-toggle="popover" 
            >
            <br><pre><?php echo $valid->getError('topic') ?><br></pre><br>
        </p>

        <p><textarea id="message" name="message" data-toggle="popover" placeholder="Ваше сообщение..."
            ></textarea>
            <br><pre><?php echo $valid->getError('message') ?><br></pre> <br>
        </p>

        <p>
            <input type="hidden" name="30000" value="30000" />    
            <input name="userFile" type="file" accept="image/*">
            <br><pre><?php echo $valid->getError('userFile') ?><br></pre> <br>
        </p>

        
        <input type="submit"  id="submit" value="Отправить" >
        <input type="reset" id="reset" value="Очистить" >
    </form>
</section>