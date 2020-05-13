<section>
    <h1>Загрузка файла с отзывами</h1>

    <?php
        
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            echo "<div style=\"color: blue;\">".$model->loadGuestBook($_FILES, "userFile")."</div>";
        }
    ?>


    <br/>
    <form enctype="multipart/form-data" action="" method="POST">
        <input type="hidden" name="MAX_FILE_SIZE" value="30000" />    
        <input name="userFile" type="file">
        <br/>
        <input type="submit" value="Загрузить">
    </form>
</section>