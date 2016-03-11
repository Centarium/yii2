<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\active_form\models\News */
/* @var $form ActiveForm */
?>
<div class="form-simple">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'preview') ?>
        <?= $form->field($model, 'title') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- form-simple -->
