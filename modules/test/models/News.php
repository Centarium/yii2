<?
namespace app\modules\test\models;
//use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class News extends ActiveRecord
{
    public $title;
    public $preview;
    public $active;
    public $text;
    public $user_id;

    public $props = 'news';

    //private $query;
    //private $command;

    function __construct(){
        //$this->query = (new \yii\db\Query());
        //$this->command = $this->query->createCommand();
    }

    public function rules()
    {
        return [
            [['TEXT','TITLE'],'required'],
            [['TEXT','PREVIEW','ACTIVE','TITLE','USER_ID',],'safe'],
        ];
    }
}
?>