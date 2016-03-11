<?php

namespace app\modules\active_form\controllers;

use app\modules\active_form\models\News;
use yii\web\Controller;
use Yii;

class FormController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionSimple()
    {
        $model = new News();
        if($model->load(Yii::$app->request->post()) )
        {
            if( $model->validate())
            {
                $model->save();
                return $this->render('index');
            }
        }

        $cash_var = 'cash_init';
        $container = new \yii\di\Container;
        $container->set('cache', [
            'class' => 'yii\caching\FileCache',
            'cachePath' => $_SERVER['DOCUMENT_ROOT'] . '/cache/',
            'cacheFileSuffix' => '.xxx',
        ]);
        $cache = $container->get('cache');
        $cache->set('15', $cash_var,120);
        $cash_old = $cache->get('13');

        return $this->render('simple',[
            'model' => $model]);
    }


}
