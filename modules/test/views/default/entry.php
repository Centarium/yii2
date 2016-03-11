<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>


<div id="news_form">
<?php $form = ActiveForm::begin(); ?>
	
	<div class="first_block">
		<?= $form->field($model_news, 'TITLE')->label("Заголовок новости"); ?>
		<?= $form->field($model_news, 'PREVIEW')->label("Краткое описание"); ?>
	</div>

	<div class="second_block">
		<?= $form->field($model_news, 'TEXT')->textArea(['rows' => '4'])->label('Текст новости') ?>
	</div>
    <?= $form->field($model_news, 'USER_ID')->dropdownList($user_list, ['prompt'=>'Выберите пользователя'])
                                            ->label('Пользователь')?>
	<?= $form->field($model_news, 'ACTIVE')->checkbox(['label' => 'Активность']) ?>


    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>
</div>

<?php $form = ActiveForm::begin(); ?>
<div class="user_form">
    <div class="first_block">
        <?= $form->field($model_users, 'NAME')->label("Имя пользователя"); ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>

<table class="user_info">
    <thead>
        <th>Пользователь</th>
        <th>Статьи пользователя</th>
        <th>Новости пользователя</th>
    </thead>
    <? foreach($user_info as $user):?>
        <tr>
            <td>
                <?=$user['NAME']?>
            </td>
            <td>
                <? foreach($user['articles'] as $article):?>
                    <ul>
                        <li><?=$article?></li>
                    </ul>
                <? endforeach;?>
            </td>
            <td>
                <? foreach($user['news'] as $news):?>
                    <ul>
                        <li><?=$news?></li>
                    </ul>
                <? endforeach;?>
            </td>
        </tr>
    <? endforeach;?>
</table>
