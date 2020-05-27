
<? if( isset($_FILES['attach']) ){
    $file = (object) $_FILES['attach'];
    if( $file->size && $file->size <= 102400 ){
        $savepath = './'.$_FILES['attach']['name'];
        move_uploaded_file( $file->tmp_name, $savepath );
        echo "Файл ".$_FILES['attach']['name']." размером ".$file->size." байт успешно загружен на сервер!";
    }
    else echo 'Файл не был загружен, т.к его размер превышает допу-стимый!';
    exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=win1251" />
    <title> AJAX отправка файла </title>
    <script type="text/javascript">
        function fileUpload(myform){
            //создание iFrame
            iframe = document.createElement('iframe');
            //формирование уникального имени фрейма
            iframe.name = myform.target= Date.parse(new Date);
            //iframe невидимый
            iframe.style.display = 'none';
            //обработчик ответа сервера - окончания загрузки файла
            iframe.onload = iframe.onreadystatechange = function(){
            parent.document.getElementById('results').innerHTML = this.contentWindow.document.body.innerHTML;
        }
        //добавление фрейма в документ
        document.body.appendChild(iframe);
        //отображение начала процесса загрузки
        document.getElementById('results').innerHTML = 'Загрузка...'
        //отправка данных в фрейм
        myform.submit();
        }
    </script>
</head>
<body>
    <div class="border block">
        Загрузка файла на сервер при помощи AJAX. <br />
        Размер файла не должен превышать 100 Кб
        <form action='<?=$_SERVER["PHP_SELF"]?>'
            method="post" target="upload" enctype="multipart/form-data">
            <input type="file" size="50" name="attach" />
            <input type="button" name="send" value="Загрузить файл" on-click="fileUpload(document.forms[0])" />
        </form>
    </div>
    <div class="border" style="float:left; width:350px;" id="results">
        Тут будут отображаться результаты
    </div>
</body>
</html>