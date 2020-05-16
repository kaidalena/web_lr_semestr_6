

<?php

?>

<section>

     <h1>Мой Блог</h1>

     <table class="comments">
          <tbody>

               <?php
               // echo "<p> data: ".var_dump($rows)."</p>";
                    if(empty($rows) ): ?>
                         <h2>Нет записей</h2>
               <?php else:
                         foreach ($rows as $temp) {
                              // echo "<p> data: ".var_dump($temp)."</p>";
                              // echo "<script> console.log('file: ".$value['fio']."'); </script>";
                              echo "<tr>";
                              $date = DateTime::createFromFormat('Y-m-d H:i:s', $temp['date']);
                              echo "<td class=\"info\"><p>". $date->format('d.m.Y  H:i:s')."</p>";

                              echo ($temp['img src'] == null) ? "</td>" : "<img src='" .$temp['img src'].$temp['img name']."'></td>";
                              // echo "<script> console.log(\"<img src='" .$temp['img src'].$temp['img name']."'></td>\") </script>";

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
     <?php
     foreach($pages as $i){
          echo $i;
     }

     ?>
     <br/>
</section>
