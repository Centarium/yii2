<?php

namespace app\modules\test\controllers;

use Yii;
use yii\web\Controller;
use app\modules\test\models\Articles;
use app\modules\test\models\News;
use app\modules\test\models\Users;

class DefaultController extends Controller
{
	public $num_articles = 2;

    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionList()
    {
    	$list = ['first','second','third'];
    	return $this->render('list', ['list' => $list]);
    }
    public function actionView_articles()
    {

    	$model = new Articles();
    	$data = $model->getArticles($this->num_articles);

        return $this->render('articles', [
            'countries' => $data['countries'],
            'pagination' => $data['pagination'],
        ]);

    }
    public function create_mass_from_string($array)
    {
        return explode(',',$array);
    }

    public function create_arrays_from_string($user_info)
    {
        $len = count($user_info);
        for($i=0;$i<$len;$i++)
        {
            $user_info[$i]['news'] = $this->create_mass_from_string($user_info[$i]['news']);
            $user_info[$i]['articles'] = $this->create_mass_from_string($user_info[$i]['articles']);
        }
        return $user_info;
    }

    public function actionChange_articles()
    {
        $model_news = new News();
        $model_users = new Users();
        $user_info = $this->create_arrays_from_string($model_users->get_user_info());
        $user_list = Users::find()->select(['NAME', 'ID'])->indexBy('ID')->column();

        $post = Yii::$app->request->post();
        if ( $post )
        {
            if($post['News'] )
            {
                $model = $model_news;
            }
            if($post['Users'])
            {
                $model = $model_users;
            }


            if($model->load($post) && $model->validate())
            {
                $model->save();
            }
            // return $this->render('news_form', ['model_users' => $model]);

        }
            //Получим всех пользователей, их статьи и новости
            return $this->render('entry',[
                'model_news' => $model_news,
                'model_users' => $model_users,
                'user_info' => $user_info,
                'user_list' => $user_list
            ]);

    }
}
