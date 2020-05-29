

<?php

?>

<section>

     <h1>Мой Блог</h1>

     <table class="blog">
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
                              echo "<td class='green'><div class=\"info\"><p>". $date->format('d.m.Y  H:i:s')."</p>";

                              echo ($temp['img src'] == null) ? "</div>" : "<img src='" .$temp['img src'].$temp['img name']."'></div>";

                              echo "</td><td class='msg green'><div class=\"text\"><h3>".$temp['topic']."</h3>";
                              echo "<p>".$temp['message']."</p></div>
                                   <div id='comment' class='icon-comment' data-toggle='popover' data-content='Оставить комментарий' ></div>
                                   </td>";
                              echo "</tr>";

                              echo "<tr> <td></td> <td> Коментарии
                              <div class='comment'>
                                   <h4>Кайда Елена</h4> <h5>22:00:03</h5> 
                                   <p>Это мой комментарий</p>
                              </div>
                              <div class='comment'>
                                   <h4>Кайда Елена</h4> <h5>22:00:03</h5> 
                                   <p>Это мой комментарийЭто мой комментарийЭто мой комментарий</p>
                              </div>
                              <div class='comment'>
                                   <h4>Кайда Елена</h4> <h5>22:00:03</h5> 
                                   <p>Это мой комментарий новый комментарий</p>
                              </div>
                              </td></tr>";
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
