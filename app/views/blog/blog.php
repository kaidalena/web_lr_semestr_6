

<?php

?>

<section>

     <div id="modalWindow">
        <div id="modalDiv">
          <div class="exit" onclick="commentExit()"></div>
          <?php
               if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']===0 && !empty($_SESSION['fio'])):
          ?>
            <div id="respons"></div>
            <h2>Добавление комментария</h2>
            <input type="textarea" id="text" placeholder="Ваш комментарий...">
            <input type="button" id="saveComment" value="Сохранить" onclick="create_script()">

          <?php
               else:
                    echo "<h3>Комментирование доступно только авторизированным пользователям</h3>";
               endif;
          ?>

        </div>
    </div>

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
                                   <div id='comment' class='icon-comment' data-toggle='popover' data-content='Оставить комментарий' onclick=\"newComment(this)\">
                                   <input type='hidden' id='id_blog' value=".$temp['id'].">
                                   </div>
                                   </td>";
                              echo "</tr>";

                              
                              if (!empty($temp['comments'])){
                                   echo "<tr> <td></td> <td> <p style='color: #036f03; font-size: 25px; padding: 10px 0;'>Комментарии</p>";
                                   foreach($temp['comments'] as $comment){
                                        echo "<div class='comment'>
                                             <h4>".$comment['user']."</h4> <h5>".$comment['date']."</h5> 
                                             <p>".$comment['message']."</p>
                                        </div>";
                                   }
                                   echo "</td></tr>";
                              }
                         }
                    endif;
               ?>

          </tbody>
     </table>

     <?php
     foreach($pages as $i){
          echo $i;
     }
     ?>

     

</section>
