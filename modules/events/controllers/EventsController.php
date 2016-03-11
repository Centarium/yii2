<?php

namespace app\modules\events\controllers;

use Yii;
use yii\web\Controller;
use app\modules\events\controllers\CacheComments;
use app\modules\events\models\Posts;
use app\modules\events\models\Comments;

class EventsController extends Controller
{
    public $posts_on_page = 5;

    //Добавление поста и вывод списка постов
    public function actionIndex()
    {
        $model_posts = new Posts();

        $this->Savepost($model_posts);

        $posts = $model_posts->getPosts($this->posts_on_page);

        return $this->render('post_create',[
            'model_posts' => $model_posts,
            'posts' => $posts
        ]);
    }

    //Сохранение поста
    public function Savepost($model_posts)
    {
        $post = Yii::$app->request->post();

        if($model_posts->load($post) && $model_posts->validate())
        {
            $model_posts->save();
        }
    }

    //Сохранение комментария
    public function Savecomment($id)
    {

        $model_comments = new Comments();
        $comment = Yii::$app->request->post();

        if($model_comments->load($comment) && $model_comments->validate())
        {
            $model_comments->save();
        }
    }

    //Просмотр поста
    public function actionPost($id)
    {
        $model_comments = new Comments();
        $model_posts = new Posts();
        $cache_controller = new CacheComments();

        $this->Savecomment($id);

        $Post = $model_posts->findOne($id);
        $Comments = $cache_controller->getCashedComments($id);
        if(!$Comments)
        {
            $Comments = $Post->comments;
            $cache_controller->setCashedComments($id,$Comments);
        }

        return $this->render('post_view',[
            'post' => $Post,
            'comments' => $Comments,
            'model_comments' => $model_comments
        ]);
    }


}
