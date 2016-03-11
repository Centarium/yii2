<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 06.03.2016
 * Time: 17:50
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div id="new_posts_form">
    <?php $form = ActiveForm::begin(); ?>

    <div class="post_body">
        <?= $form->field($model_posts, 'TITLE' )->textInput(['class' => 'form-control post_title' ])->label("Заголовок поста"); ?>
        <?= $form->field($model_posts, 'TEXT')->textArea(['rows' => '4', 'class'=> 'form-control post_text'])->label('Текст поста') ?>
        <?= $form->field($model_posts, 'ACTIVE')->checkbox(['label' => 'Активность']) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>


