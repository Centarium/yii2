<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 09.03.2016
 * Time: 16:24
 */
?>
<?if(count($comments)>0):?>
<div id="comments">
    <?foreach ($comments as $comment):?>
        <div class="comment" data-id="<?=$comment['ID']?>">
            <div class="comment_data"><?=$comment['DATE']?></div>
            <div class="comment_body mrg-t-10"><?=$comment['TEXT']?></div>
        </div>
    <?endforeach?>
</div>
<?endif?>
