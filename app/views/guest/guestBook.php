

<?php
     $values;
     if ($_SERVER["REQUEST_METHOD"] == "POST"){

         $valid->Validate($_POST);
         if (!$valid->checkErrors($errors)) $values = $_POST;
         else{
             echo "<div id='resultWindiw' style=\"color: green; font-size: 30px;\">Форма успешно отправлена</div>";
         }

     }
?>

<section>
     <h1>Гостевая книга</h1>
     <h3>Здесь вы можете оставить свой отзыв</h3>

     <form  action="" method=POST >
          <p><strong>Выберите свой возрост</strong></p>

          <p><input type="text" id="name" name="name" placeholder="ФИО" data-toggle="popover" onblur="validate(this)"

              value="<?php if (array_key_exists('name', $values)) echo $values['name'] ?>"
              data-content="<?php echo $rules['name'] ?>">
              <br><pre><?php echo $valid->getError('name') ?><br></pre><br>
         </p>

          <p><input type="text" id="mail" name="email" onblur="validate(this)" placeholder="Ваш Еmail"
             value="<?php if (array_key_exists('email', $values)) echo $values['email'] ?>"
             data-toggle="popover" data-content="<?php echo $rules['email'] ?>">
             <pre><?php echo $valid->getError('email')?><br></pre><br>
        </p>

          <p><textarea id="message" name="message" onblur="validate(this)" data-toggle="popover" placeholder="Ваше сообщение"
             value="<?php if (array_key_exists('message', $values)) echo $values['message'] ?>"
             data-content="<?php echo $rules['message'] ?>"></textarea>
             <br><pre><?php echo $valid->getError('message') ?><br></pre> <br>

        </p>

          <input type="submit"  id="submit" value="Отправить" >
          <input type="reset" id="reset" value="Очистить" >
     </form>

     <h1><br>Отзывы</h1>
     <table class="comments">
          <tbody>

               <?php

                    foreach ($comments as $value) {
                         // echo "<script> console.log('file: ".$value['fio']."'); </script>";
                         echo "<tr>";
                         $date = DateTime::createFromFormat('d-m-Y H:i:s', $value['date']);
                         echo "<td class=\"info\">". $date->format('d.m.Y H:i:s');
                         echo "<br>" .$value['fio'];
                         echo "<br>" .$value['email']."</td>";
                         echo "<td class=\"text\">".$value['msg'];
                         echo "</tr>";
                    }

               ?>

               <!-- <tr>
                    <td class="info">Kaida Elena <br> 23.05.20 </td>
                    <td class="text">My comment </td>
               </tr> -->
          </tbody>
     </table>
</section>
