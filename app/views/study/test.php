<section>
    <h1> Тест по дисциплине "Основы экологии"</h1>
    <?php 
    // var_dump($_POST);
    $values;
    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        $valid->Validate($_POST);
        $errors = $valid->errorsGet;
        if (!$valid->checkErrors($errors)) $values = $_POST;
        
        // var_dump($errors);
    }
    ?>
    <!-- <form onsubmit="return check(foundT());" id="contact">  -->
    <form action="" method=POST id="contact">
        <p><input id="FIO" type="text" name="name" placeholder="ФИО" data-toggle="popover" 
            value="<?php if (array_key_exists('name', $_POST)) echo $values['name'] ?>" onblur="validate(this)" 
            data-content="<?php echo $rules['name'] ?>"><br><pre><?php echo $errors['name'] ?></pre><br></p> 
        <p>Выбери свой курс</p> 
        <p><SELECT id="gr" name="course"> 
            <OPTGROUP label="1 курс"> 
                <OPTION value="1">ИС-11 
                <OPTION value="2">ИС-12 
                <OPTION value="3">ИС-13 
            </OPTGROUP>
            <OPTGROUP label="2 курс"> 
                <OPTION value="4">ИС-21 
                <OPTION value="5">ИС-22 
                <OPTION value="6">ИС-23 
            </OPTGROUP>
            <OPTGROUP label="3 курс"> 
                <OPTION value="7">ИС-31 
                <OPTION value="8">ИС-32 
            </OPTGROUP>
            <OPTGROUP label="4 курс"> 
                <OPTION value="9">ИС-41 
                <OPTION value="10">ИС-42 
            </OPTGROUP> 
            <OPTGROUP LABEL="5 курс"> 
                <OPTION value="11">ИС-51 
                <OPTION value="12">ИС-52 
            </OPTGROUP> 
            <OPTGROUP LABEL="Магистры"> 
                <OPTION  value="13">Maг-51 
            </OPTGROUP> 
        </SELECT>
        <pre><?php echo $errors['course'] ?></pre><br></p>
        
        <ol class=test>
            <li><h3>Как называют факторы неорганической среды, которые влияют на жизнь и распространение живых организмов?</h3></li>
            <p>
                <select id="test1" name="question1">
                    <option value="1">Живыми</option>
                    <option value="2">Абиотическими</option>
                    <option value="3">Антропогенными</option>
                    <option value="4">Биотическими</option>
                    <option value="5">Лимитирующие</option>
                    <option value="6">Неживые</option>
                    <!-- 2 -->
                </select>
                <pre><?php echo $errors['question1'] ?></pre><br>
            </p>
            <li><h3> Как называется превращение органических соединений из неорганических за счет энергии света?</h3></li>
            <!-- фотосинтез -->
            <p><input id="test2" type="text" name="question2" placeholder="Ответ"> <pre><?php echo $errors['question2'] ?></pre><br></p>

            <li><h3>Каковы основные направления экологии?</h3></li>
            <p>
                <p><input id="c1" type="checkbox" name="question3[]" value="1">Физическое</p>
                <p> <input id="c2" type="checkbox" name="question3[]" value="2">Xимическое</p>
                <p> <input id="c3" type="checkbox" name="question3[]" value="3">Kосмическое</p>
                <pre><?php if (array_key_exists('question3', $errors)) echo $errors['question3'] ?></pre><br>
            </p>
            <!-- 1 2 -->
            <input type="submit" id="submit"  value="Отправить" > 
            <input  type="reset" value="Очистить"> 
        </ol>
    </form>
</section>