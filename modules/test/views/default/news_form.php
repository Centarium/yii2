<?
use yii\helpers\Html;
?>
<p> Вы ввели следующую информацию: </p>

<?if($model_news): ?>
<ul>
    <li><label>Имя новости</label>: <?= Html::encode($model_news->title) ?></li>
    <li><label>Текст новости</label>: <?= Html::encode($model_news->text) ?></li>
</ul>
<?endif?>
<?if($model_users): ?>
    <ul>
        <li><label>Имя пользователя</label>: <?= Html::encode($model_users->name) ?></li>
    </ul>
<?endif?>