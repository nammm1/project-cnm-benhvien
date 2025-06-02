<?php for($num=1;$num<=$totalpages;$num++){ ?>
    <?php if($num != $current_page){ ?>
        <a class="page_item" href="?per_page=<?=$inf_per_page?>&page=<?=$num ?>"><?=$num ?></a>
    <?php }else{?>
        <strong style="font-size: 18px; text-decoration:underline;" class="current_page page_item"><?=$num ?></strong>
    <?php } ?>    
<?php } ?>

