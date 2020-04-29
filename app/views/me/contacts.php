<section>

    <h1>Контакты</h1> 
    <?php 
    $values;
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $valid->Validate($_POST);
        if (!$valid->checkErrors($errors)) $values = $_POST;
        
    }
    // echo $_POST['name'];
    ?>
    <!-- <form  action="<?php echo $_SERVER["PHP_SELF"]?>" method=POST id="contact">  -->
    <form  action="" method=POST id="contact" > <!--onchange="checkSubmit()"-->
        <p><strong>Выбери свой возрост</strong></p> 
        <p><select id="age" name="age" > 
            <option value="1">Младше 18</option> 
            <option value="2">18 - 25</option> 
            <option value="3">Старше 25</option> 
            </select> 
        <p>Пол мужской <input name="pol" id="pol1" type="radio" value="m" >
        Пол женский <input name="pol" id="pol2" type="radio" value="w" checked></p>
        <p><strong>Выбери свой курс</strong></p> 
        <SELECT id="gr" name="course"> 
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
        <p><pre><?php echo $valid->getError('course') ?><br></pre></p>

        <p><input type="text" id="FIO" name="name" placeholder="ФИО" data-toggle="popover" onblur="validate(this)" 
             value="<?php if (array_key_exists('name', $_POST)) echo $values['name'] ?>" data-content="<?php echo $rules['name'] ?>"><br><pre><?php echo $valid->getError('name') ?><br></pre><br></p>
        
        <div id="calendar" >
            <input class="notFocus" id="data"  data-toggle="popover" data-content="<?php echo $rules['data'] ?>"
                value="<?php if (array_key_exists('data', $values)) echo $values['data'] ?>" name="data" type="text" size="35"  onfocus="show(this)" oninput="writeDate()" placeholder="Дата рождения"><br><pre><?php echo $valid->getError('data') ?><br><br></pre>
        </div>

        <p><input type="text" id="mail" name="email" onblur="validate(this)" placeholder="Ваш Еmail"  
            value="<?php if (array_key_exists('email', $values)) echo $values['email'] ?>" data-toggle="popover" data-content="<?php echo $rules['email'] ?>"><pre><?php echo $valid->getError('email')?><br></pre><br></p>
        
        <p><input type="text"  id="mobile" name="phone" onblur="validate(this)" placeholder="Номер телефона"
            value="<?php if (array_key_exists('phone', $values)) echo $values['phone'] ?>"  data-toggle="popover" data-content="<?php echo $rules['phone'] ?>"><pre><?php echo $valid->getError('phone') ?><br></pre><br></p></p>
        
            <p><textarea id="message" name="message" onblur="validate(this)" data-toggle="popover" placeholder="Ваше сообщение"
            value="<?php if (array_key_exists('message', $values)) echo $values['message'] ?>" data-content="<?php echo $rules['message'] ?>"></textarea><br><pre><?php echo $valid->getError('message') ?><br></pre> <br></p>
        
            <input type="submit"  id="submit" value="Отправить" >
        <input type="reset" id="reset" value="Очистить" > 
    </form> 
    
    <div id="modalWindow">
        <div id="modalDiv">
            <p>Вы действительно хотите это сделать?</p>
            <input type="button" class="close" id="yes" value="yes">
            <input type="button" class="close" id="no" value="no">
        </div>
    </div>
</section>