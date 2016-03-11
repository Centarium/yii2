<?
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div id="news_form">
    <?php $form = ActiveForm::begin([
        'id' => 'news-form',
        'options' => ['class' => 'form-horizontal'],
    ]); ?>

    <div class="first_block">
        <?= $form->field($model, 'TITLE')->label("Заголовок новости"); ?>
        <?= $form->field($model, 'PREVIEW')->label("Краткое описание"); ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>