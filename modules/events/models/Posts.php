<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 06.03.2016
 * Time: 16:09
 */
namespace app\modules\events\models;
use yii\db\ActiveRecord;
use yii\data\Pagination;

class Posts extends ActiveRecord
{
    public $id;
    public function rules()
    {
        return [
            [['TEXT','ACTIVE','TITLE',],'safe'],
        ];
    }

    public function getPosts($count_posts=2,$order="TITLE")
    {
        $query = $this::find();

        $pagination = new Pagination([
            'defaultPageSize' => $count_posts,
            'totalCount' => $query->count(),
        ]);

        $posts = $query
            ->orderBy($order)
            ->select(['ID','TITLE'])
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return [
            'posts' => $posts,
            'pagination' => $pagination
        ];
    }

    public function getComments()
    {
        return $this->hasMany(Comments::className(),['POST_ID' => 'ID']);
    }

}