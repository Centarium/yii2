<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 10.03.2016
 * Time: 14:26
 */
namespace app\modules\events\controllers;

class CacheComments
{
    private $cash_time = 86400;
    private $container_name = 'cache';
    private $folder_name = 'posts';

    //Получение комментариев к посту из кеша
    public function getCashedComments($post_id)
    {
        $cache = $this->getCacheContainer($this->container_name);
        return $cache->get($post_id);

    }
    public function setCashedComments($post_id,$comments)
    {
        $cache = $this->getCacheContainer($this->container_name);
        $cache->set($post_id, $comments, $this->cash_time);
    }

    private function getCacheContainer()
    {
        $container = new \yii\di\Container;
        $container->set($this->container_name, [
            'class' => 'yii\caching\FileCache',
            'cachePath' => $_SERVER['DOCUMENT_ROOT'] . '/'.$this->container_name.'/ '.$this->folder_name.'',
            'cacheFileSuffix' => '.comments',
        ]);
        $cache = $container->get($this->container_name);

        return $cache;
    }
}

?>