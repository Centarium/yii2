<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 06.03.2016
 * Time: 16:10
 */
namespace app\modules\events\models;
use yii\db\ActiveRecord;

class Comments extends ActiveRecord
{
    public $post_id;
    public function rules()
    {
        return [
            [['TEXT'], 'required'],
            [['TEXT','POST_ID'],'safe']
        ];
    }
}
