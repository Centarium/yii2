<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 06.03.2016
 * Time: 18:43
 */
use yii\widgets\LinkPager;
?>

<table class="user_info">

    <thead>
    <th>Посты</th>
    </thead>


    <? foreach($posts['posts'] as $post):?>
        <tr>
            <td data-id="<?=$post['ID']?>">
                <a href="/web/events/events/post/<?=$post['ID']?>"><?=$post['TITLE']?></a>
            </td>
        </tr>
    <? endforeach;?>
</table>

<?= LinkPager::widget([
    'pagination' => $posts['pagination'],
]) ?>