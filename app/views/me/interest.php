<section>
        <h1>Мои интересы</h1>
        <ol class="ol" >
        <?php foreach($names as $val): ?>
                <li>
                        <a href= <?php echo "#".$val['src'] ?> > <?php echo $val['name'] ?> </a>
                </li>
        <?php endforeach; ?>
        </ol>

        <table>
                <?php foreach($names as $val): ?>

                <th id= <?php echo $val['src'] ?> colspan="2" >
                        <h2><?php echo $val['name'] ?> </h2></th>
                <tr>
                        <td CLASS=data><img src=<?php echo "public/assets/img/".$val['src'].".jpg" ?> class="leftImg"></td>
                        <td CLASS=data>
                                <?php echo $val['description'] ?> 
                        </td>
                </tr>
                <?php endforeach; ?>
        </table>
</section>