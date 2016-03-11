<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 06.03.2016
 * Time: 19:20
 */
use app\modules\events\views\events\assets\Assets;
Assets::register($this);
?>

<div class="post_title">
    <?=$post['TITLE']?>
</div>

<div class="post_date">
    <?=$post['DATE']?>
</div>

<div class="post_text">
    <?=$post['TEXT']?>
</div>


<!-- Start Region Show_comment -->
<?= $this->render('comment/show_comments',[
    'comments' => $comments,
]); ?>
<!-- End Region Show_comment -->


<!-- Start Region New_comment -->
<?= $this->render('comment/new_comment_form',[
    'model_comments' => $model_comments,
    'post_id' => $post['ID']
]); ?>
<!-- End Region New_comment -->


<a href="/web/events/events/index/">Назад</a>