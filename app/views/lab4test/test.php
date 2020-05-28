
<?php 
    // echo "<script>console.log('test')</script>";
    // var_dump($_FILES);
    // echo "<br/>";
    // var_dump($_POST);
    // if( isset($_FILES['attach']) ){
    // $file = (object) $_FILES['attach'];
    // if( $file->size && $file->size <= 102400 ){
    //     $savepath = './'.$_FILES['attach']['name'];
    //     echo "path: $savepath";
    //     move_uploaded_file( $file->tmp_name, $savepath );
    //     echo "Файл ".$_FILES['attach']['name']." размером ".$file->size." байт успешно загружен на сервер!";
    // }
    // else echo 'Файл не был загружен, т.к его размер превышает допу-стимый!';
    // exit;
// }
echo "start<br/>";
?>
    <br><input type="text" id="name" name="name"/>
    <br><input type="text" id="fio" name="fio"/>
    <br><input type="button" id="addCommentButton" value="Сохранить комментарий"/>

    <!-- <script type="text/javascript">
        function send(){
            var div = document.getElementById('id');
            div.innerHTML += "1";
            var iframe = document.createElement("iframe");
            $(iframe).attr('name', 'myFrame').on('load', function() {
                div.innerHTML += "<br/>2";
                div.innerHTML += "<br/>" + this.contentWindow.document.body.innerHTML;
                if(this.contentWindow.document.body.innerHTML){
                    div.innerHTML += "<br/>3";
                    //iframe.contentDocument, iframe.contentWindow.document, либо iframe.document
                    var data = JSON.parse(this.contentWindow.document.body.innerHTML),
                    time = data.time,
                    errors = data.errors;
                    div.innerHTML += "<br/>4";
                    if(data.errors){
                        window.alert('Ошибка сохранения комментария:'+ data.errors);
                    } else{
                        //добавляем текст комментария и серверное время его добавления
                        window.alert("good");
                    }
                    //удаляем использованные модальное окно и iframе
                    $(iframe).remove();
                }
            });
            document.body.appendChild(iframe);
            $(form).submit();
        }
    </script>

    <div class="border block">
        <form action='/send'method="post" target="myFrame">
            <input type="button" name="click" value="Click" onclick="send()" />
        </form>
    </div>
    <div id="id"></div> -->


<script>
    function commentWindow(post_id,personal_fio) {
        var divid = document.getElementById('id');

        // var form = document.createElement("form");
        // var div = document.createElement("div");
        //формируем и отображаем окно с формой для ввода комментария
        // $(div).append($(form));
        // $(div).addClass("comment");
        // $(form).attr("action", "/send")
            // .attr("method", "POST")
            // .attr("target", "myFrame");
        // $(form).html('<p>Пожалуйста, оставьте ваш комментарий!</p>'
        //     +'<br><input type="text" id="name" name="name"/>'
        //     +'<br><input type="text" id="fio" name="fio"/>'
        //     +'<br><input type="button" id="addCommentButton" value="Сохранить комментарий"/>'
        //     );
        // document.body.appendChild(div);
        //отправляем введенные данные и отображаем комментарий в случае отсут-ствия ошибок
        $("#addCommentButton").click(function(){
            // var iframe = document.createElement("iframe");
            // $(iframe).attr('name', 'myFrame')
            // .on('load', function() {
                // if(this.contentWindow.document.body.innerHTML){
                    // //отправка данных XML из iFrame
                    // var data = JSON.parse(this.contentWindow.document.body.innerHTML),
                    // time = data.time,
                    // errors = data.errors,
                    // message = $('#message_ta').val();
                    // console.log(data);
                    // if(data.errors){
                    //     window.alert('Ошибка сохранения комментария:'+ data.errors);
                    // } else{
                    //     //добавляем текст комментария и серверное время его добавления
                    //     console.log(' personal_fio '+ personal_fio + ' time ' + time + ' message ' + message );
                    // }
                    // // удаляем использованные модальное окно и iframе
                    // $(div).remove();
                    // $(iframe).remove();

                    //отправка данных XML
                    var name = document.getElementById('name').value;
                    var fio = document.getElementById('fio').value;
                    var xmlString = "<profile>" +
                        " <name>" + escape(name) + "</name>" +
                        " <fio>" + escape(fio) + "</fio>" +
                        "</profile>";
                    // URL для отправки
                    var url = "/send";
                    // Откроем соединение с сервером
                    var xmlHttp = new XMLHttpRequest();
                    xmlHttp.open("POST", url, true);
                    // Сообщим серверу, что посылаются данные в формате XML
                    xmlHttp.setRequestHeader("Content-Type", "text/xml");
                    // Установим функцию уведомления пользователя о
                    // завершении операции на сервере
                    xmlHttp.onreadystatechange = function() {
                        // callback_response_from_server(xmlHttp);
                        console.log(xmlHttp.responseText);
                    }
                    // Отправим данные
                    xmlHttp.send(xmlString);


                    // получение данных XML
                    // var parser = new DOMParser();
                    // console.log(this.contentWindow.document.body.innerHTML);
                    // xmlDoc = parser.parseFromString(this.contentWindow.document.body.innerHTML, "text/xml");
                    // var val = xmlDoc.getElementsByTagName("name")[0].childNodes[0].nodeValue;
                    // document.getElementById("name").value = val;

                    //получение данных JSON
                    // var data = JSON.parse(this.contentWindow.document.body.innerHTML),
                    // time = data.time,
                    // errors = data.errors,
                    // message = $('#message_ta').val();
                    // console.log(data);
                    // if(data.errors){
                    //     window.alert('Ошибка сохранения комментария:'+ data.errors);
                    // } else{
                    //     //добавляем текст комментария и серверное время его добавления
                    //     console.log(' personal_fio '+ personal_fio + ' time ' + time + ' message ' + message );
                    // }
                    //удаляем использованные модальное окно и iframе
                    // $(div).remove();
                    // $(iframe).remove();
                // }
            });
            // document.body.appendChild(iframe);
            // $(form).submit();
        // });
    }

    
</script>

<div id="id"></div>

<script> commentWindow(1,"Kaida"); </script>