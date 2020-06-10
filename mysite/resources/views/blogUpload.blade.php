@extends ('layouts.app')

@section('title-block')
  Загрузка блога
@endsection


@section('content')
<section>
    <h1>Загрузка файла с сообщениями Блога</h1>

    <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            echo "<div style=\"color: blue;\">".$controller->saveRecords("userFile")."</div>";
        }
    ?>

    <br/>
    <h3> Файл *.CSV </h3>
    <form enctype="multipart/form-data" action="" method="POST">
        <input type="hidden" name="300000" value="30000" />
        <input name="userFile" type="file">
        <br/>
        <input type="submit" value="Загрузить">
    </form>
</section>
@endsection