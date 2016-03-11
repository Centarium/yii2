<?
namespace app\modules\active_form\models;
use yii\db\ActiveRecord;

class News extends ActiveRecord
{
    public $title;
    public $preview;


    public function rules()
    {
        return [
            [['PREVIEW','TITLE'],'required'],
            [['TITLE','PREVIEW'],'safe'],
        ];
    }
}
?>