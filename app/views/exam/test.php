<section>
    
    <?php 
    // echo date('Y-m-d H:i:s');
    // var_dump($_POST);
    $values;
    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        // echo "<p>".var_dump($_POST)."</p>";
        $valid->Validate($_POST);
        $controller->sendResults($_POST);
        if (!$valid->checkErrors($errors)) $values = $_POST;
        else{
            echo "<div id='resultWindiw' style=\"color: green; font-size: 30px;\"> Ответы успешно отправлены </div>";
        }
        
        // var_dump($errors);
    }
    ?>
    <h1> Тест по дисциплине "Основы экологии"</h1>
    <form action="" method=POST id="contact">
        <p><input id="FIO" type="text" name="name" placeholder="ФИО" data-toggle="popover" 
            value="<?php if (array_key_exists('name', $_POST)) echo $values['name'] ?>" onblur="validate(this)" 
            data-content="<?php echo $rules['name'] ?>"><br><pre><?php echo $valid->getError('name') ?></pre><br></p> 

        <p>Выбери свой курс</p> 
        <p><SELECT id="gr" name="course" >  
            <OPTGROUP label="1 курс"> 
                <OPTION value="ИС-11">ИС-11 
                <OPTION value="ИС-12">ИС-12 
                <OPTION value="ИС-13">ИС-13 
            </OPTGROUP>
            <OPTGROUP label="2 курс"> 
                <OPTION value="ИС-21">ИС-21 
                <OPTION value="ИС-22">ИС-22 
                <OPTION value="ИС-23">ИС-23 
            </OPTGROUP>
            <OPTGROUP label="3 курс"> 
                <OPTION value="ИС-31">ИС-31 
                <OPTION value="ИС-32">ИС-32 
            </OPTGROUP>
            <OPTGROUP label="4 курс"> 
                <OPTION value="ИС-41">ИС-41 
                <OPTION value="ИС-42">ИС-42 
            </OPTGROUP> 
            <OPTGROUP LABEL="5 курс"> 
                <OPTION value="ИС-51">ИС-51 
                <OPTION value="ИС-52">ИС-52 
            </OPTGROUP> 
            <OPTGROUP LABEL="Магистры"> 
                <OPTION  value="Maг-51">Maг-51 
            </OPTGROUP> 
        </SELECT>
        <pre><?php echo $valid->getError('course') ?></pre><br></p>
        
        <ol class=test>
            <li><h3>Как называют факторы неорганической среды, которые влияют на жизнь и распространение живых организмов?</h3></li>
            <p>
                <select id="test1" name="question1">
                    <option value="Живыми">Живыми</option>
                    <option value="Абиотическими">Абиотическими</option>
                    <option value="Антропогенными">Антропогенными</option>
                    <option value="Биотическими">Биотическими</option>
                    <option value="Лимитирующие">Лимитирующие</option>
                    <option value="Неживые">Неживые</option>
                    <!-- 2 -->
                </select>
                <pre><?php echo $valid->getError('question1') ?></pre><br>
            </p>
            <li><h3> Как называется превращение органических соединений из неорганических за счет энергии света?</h3></li>
            <!-- фотосинтез -->
            <p><input id="test2" type="text" name="question2" placeholder="Ответ"
                value="<?php if (array_key_exists('question2', $_POST)) echo $values['question2'] ?>"> <pre><?php echo $valid->getError('question2') ?></pre><br></p>

            <li><h3>Каковы основные направления экологии?</h3></li>
            <p>
                <p><input id="c1" type="checkbox" name="question3[]" value="Физическое">Физическое</p>
                <p> <input id="c2" type="checkbox" name="question3[]" value="Xимическое">Xимическое</p>
                <p> <input id="c3" type="checkbox" name="question3[]" value="Kосмическое">Kосмическое</p>
                <pre><?php echo $valid->getError('question3') ?></pre><br>
            </p>
            <!-- 1 2 -->
            <input type="submit" id="submit"  value="Отправить" > 
            <input  type="reset" value="Очистить"> 
        </ol>
    </form>
</section>