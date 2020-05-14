

<?php
     $values=[];
     // if ($_SERVER["REQUEST_METHOD"] == "POST"){

     //     $valid->Validate($_POST);
     //     if (!$valid->checkErrors($errors)) $values = $_POST;
     //     else{
     //          $controller->save($_POST);
     //         echo "<div id='resultWindiw' style=\"color: green; font-size: 30px;\">Форма успешно отправлена</div>";
     //     }
     // }
?>

<section>

     <h1>Мой Блог</h1>

     <table class="comments">
          <tbody>

               <!-- <?php
                    if($comments == null): ?>
                         <h2>Нет отзывов</h2>
               <?php else:
                         foreach ($comments as $value) {
                              // echo "<script> console.log('file: ".$value['fio']."'); </script>";
                              echo "<tr>";
                              $date = DateTime::createFromFormat('d.m.Y H:i:s', $value['date']);
                              
                              echo "<td class=\"info\"><p>". $date->format('d.m.Y H:i:s')."</p>";
                              echo "<h4>" .$value['fio']."</h4>";
                              echo "<p>" .$value['email']."</p></td>";
                              echo "<td class=\"text\"><p>".$value['msg']."</p>";
                              echo "</tr>";
                         }
                    endif;
               ?> -->

          </tbody>
     </table>

     <!-- <div class="pages">
          Страницы 
          <a href="#"
     </div> -->
     
</section>
