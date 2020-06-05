<section>

    <h1> Статистика посещаемости </h1>
    <table class="comments">
        <tbody>
            <?php
                foreach($rows as $temp){
                    echo "<tr>";
                    $date = DateTime::createFromFormat('Y-m-d H:i:s', $temp['date']);
                    echo "<td class=\"info\"><p>". $date->format('d.m.Y  H:i:s')."</p>";
                    echo "<h4>" .$temp['web_page']."</h4></td>";
                    echo "<td class=\"text\"><p>IP: ".$temp['ip']."</p>";
                    echo "<p>Host: ".$temp['host']."</p>";
                    echo "<p>Browser: ".$temp['browser']."</p>";
                    echo "</td></tr>";
                    // echo "<br/>".var_dump($temp);
                }
            ?>
        </tbody>
    </table>
    <br/>
    <?php
     foreach($pages as $i){
          echo $i;
     }
     ?>

</section>