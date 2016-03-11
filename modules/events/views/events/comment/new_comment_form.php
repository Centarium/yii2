<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 07.03.2016
 * Time: 21:29
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div id="new_comment_form">
    <?php $form = ActiveForm::begin(); ?>

    <div class="post_body">
        <?= $form->field($model_comments, 'TEXT')->textArea(['rows' => '4', 'class'=> 'form-control comment_text'])->label('Текст комментария') ?>
        <?= $form->field($model_comments, 'POST_ID')->hiddenInput(['value' => $post_id])->label('')?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
