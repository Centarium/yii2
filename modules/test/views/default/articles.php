<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>

<h1>Articles</h1>
<ul>
<?php foreach ($countries as $country): ?>
    <li>
        <?= Html::encode("{$country['TITLE']} ({$country->TEXT})") ?>:
    </li>
<?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>