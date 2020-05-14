

<?php
     // $values=[];
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

               <?php
                    if(empty($data)): ?>
                         <h2>Нет записей</h2>
               <?php else:
                         foreach ($data as $temp) {
                              // echo "<script> console.log('file: ".$value['fio']."'); </script>";
                              echo "<tr>";
                              $date = DateTime::createFromFormat('Y-m-d H:i:s', $temp['date']);
                              echo "<td class=\"info\"><p>". $date->format('d-m-Y H:i:s')."</p>";
                              // echo "</td>";
                              header("Content-type: image/*");
                              echo "<h4>" .$temp['image']."</h4></td>";
                              echo "<td class=\"text\"><h3>".$temp['topic']."</h3>";
                              echo "<p>".$temp['message']."</p></td>";
                              echo "</tr>";
                         }
                    endif;
               ?>

          </tbody>
     </table>

     <!-- <div class="pages">
          Страницы 
          <a href="#"
     </div> -->
     
</section>
