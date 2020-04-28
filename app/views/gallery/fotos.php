<section>
    <h1>Галлерея</h1>
    <table class="foto">
        <?php 
        $i=0;
        foreach ($args as $val):?>
            <td><img 
                id=<?php echo $val['id']; ?>
                class="inTable" 
                src=<?php echo $val['src']; ?> 
                alt=<?php echo $val['alt']; ?> 
                title=<?php echo $val['titles']; ?> 
                onClick=bigFotoDiv(this) > 
                <figcaption> <?php echo $val['figcaption']; ?> </figcaption></td>
            <?php $i++;
                if($i % 5 == 0):?> <tr>
            <?php endif;?>
        <?php endforeach; ?>

    </table>
    <p> <a href="/">На гланую</a></p>
</section>