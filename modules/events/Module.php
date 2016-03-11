<?php

namespace app\modules\events;
use Yii;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\events\controllers';
    private $assetsUrl;

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    public function registerScripts()
    {
        $assetsUrl = $this->getAssetsUrl();
        $cs = $this->view->registerCssFile($assetsUrl.'assets/post_create.css');
    }

    private  function getAssetsUrl()
    {
        if($this->assetsUrl === null)
        {
            $this->assetsUrl = Yii::$app->getAssetMAnager()->publish(
                Yii::getAlias('events.assets')
            );
        }
        return $this->assetsUrl;
    }
}
