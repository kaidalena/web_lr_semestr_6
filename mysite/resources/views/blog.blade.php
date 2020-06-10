@extends ('layouts.app')

@section('title-block')
  Блог
@endsection

@section('scripts')
<script src="/scripts/blog.js"></script>
@endsection

@section('content')
<?php   ?>
<section>

     <div id="modalWindow">
        <div id="modalDiv">
          <div class="exit" onclick="commentExit()"></div>
          <div id="respons"></div>
          <?php
               if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']===0 && !empty($_SESSION['fio'])):
          ?>
            <h2>Добавление комментария</h2>
            <textarea id="text" placeholder="Ваш комментарий..."></textarea>
            <input type="button" id="saveComment" value="Сохранить" onclick="create_script()">

          <?php
               elseif (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']===1):
          ?>
            <h2>Редактирование записи</h2>
            <input type="text" id="topic" name="topic">
            <textarea id="text" name="text"> </textarea>
            <input type="button" id="saveRecord" value="Сохранить" onclick="saveFetch()">
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
                    if(empty($blogs) ): ?>
                         <h2>Нет записей</h2>
               <?php else:
                         foreach ($blogs as $temp) {
                              echo "<tr>";
                              // dd($temp['blog']['created_at']);
                              $date = DateTime::createFromFormat('Y-m-d H:i:s', $temp['blog']->created_at);
                              echo "<td class='green'><div class=\"info\"><p>". $date->format('d.m.Y  H:i:s')."</p>";

                              echo ($temp['blog']->img_src == null) ? "</div>" : "<img src='" .$temp['blog']->img_src.$temp['blog']->img_name."'></div>";

                              echo "</td><td class='msg green'><div class=\"text\">
                                   <input type='hidden' class='id_blog' value=".$temp['blog']->id.">
                                   <h3>".$temp['blog']->topic."</h3>";
                              echo "<p>".$temp['blog']->message."</p></div>
                                   <div id='comment' ".
                                   ((isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']) 
                                        ? "class='icon-comment admin' data-toggle='popover' data-content='Редактировать' onclick=\"editRecord(".$temp['blog']->id.")\"" 
                                        : "class='icon-comment user' data-toggle='popover' data-content='Оставить комментарий' onclick=\"newComment(".$temp['blog']->id.")\"").">
                                   </div>
                                   </td>";
                              echo "</tr>";

                              echo "<tr> <td></td> <td>";
                              if (!empty($temp['comments'])){
                                   echo "<p id='titleComment'>Комментарии</p>";
                                   foreach($temp['comments'] as $record){
                                        echo "<div class='comment'>
                                             <h4>".$record['user']->name."</h4> <h5>".$record['comment']->created_at."</h5> 
                                             <p>".$record['comment']->message."</p>
                                        </div>";
                                   }
                              }
                              echo "</td></tr>";
                         }
                    endif;
               ?>

          </tbody>
     </table>

     <?php
     // foreach($pages as $i){
          // echo $i;
     // }
     ?> 

</section>
@endsection
