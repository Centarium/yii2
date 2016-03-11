<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 09.03.2016
 * Time: 22:09
 */
namespace app\modules\events\views\events\assets;
use yii\web\AssetBundle;

class Assets extends AssetBundle
{
    public $baseUrl = '\modules\events\views\events\assets';
    public $basePath = '@web';

    public $css = [
        'css/post_create.css',
        'css/post_view.css'
    ];
    public $js = [

    ];
}
?>