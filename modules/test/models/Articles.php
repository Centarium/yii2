<?php

namespace app\modules\test\models;

use yii\db\ActiveRecord;
use yii\data\Pagination;
/**
 * This is the model class for table "articles".
 *
 * @property integer $ID
 * @property string $TEXT
 */
class Articles extends ActiveRecord
{
    public function getArticles($count_articles=2)
    {
        $query = $this::find();

        $pagination = new Pagination([
            'defaultPageSize' => $count_articles,
            'totalCount' => $query->count(),
        ]);

        $countries = $query->orderBy('TITLE')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return [
                'countries' => $countries,
                'pagination' => $pagination
            ];
    }
  
}
