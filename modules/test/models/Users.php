<?
namespace app\modules\test\models;
use yii\db\ActiveRecord;

class Users extends ActiveRecord
{
    private $query;
    private $command;

    public $name;

    function __construct(){
        $this->query = (new \yii\db\Query());
        $this->command = $this->query->createCommand();
    }
    public function getNews()
    {
       return $this->hasMany(News::className(), ['USER_ID' => 'ID']);
    }

    public function rules()
    {
        return [
            [['NAME'],'required']
        ];
    }

    //many-to-many
    public  function get_articles()
    {
        $user_articles = $this->command->setSql('SELECT users.ID,users.NAME,articles.ID, GROUP_CONCAT(articles.TITLE) as article
            FROM users
              INNER JOIN
              users_to_articles
                ON users.ID = users_to_articles.USER_ID
              LEFT JOIN articles
                ON users_to_articles.ARTICLE_ID = articles.ID
              GROUP BY users.ID
              INNER JOIN
              news
                ON users.id = news.USER_ID')->queryAll();
        return $user_articles;


        /*
        $user_articles = $this->hasMany(Articles::className(),['id'=>'article_id'])
            ->viaTable('users_to_articles',['user_id' => 'id']);*/
        //->select(['{{articles}}.TITLE'],'{{users}}.name')
        //->all();
    }

    public function getUserNews()
    {
        $news = Users::find()
        ->joinWith('news')
        ->all();
        return $news;
    }

    public  function get_user_info()
    {
        $user_articles = $this->command->setSql('
            SELECT users.ID,users.NAME,

            GROUP_CONCAT(DISTINCT news.TITLE) as news,
            GROUP_CONCAT(DISTINCT articles.TITLE) as articles

            FROM users, news, users_to_articles,articles

		    WHERE users.ID = news.USER_ID
                AND  users.ID = users_to_articles.USER_ID
                AND  users_to_articles.ARTICLE_ID = articles.ID

              GROUP BY users.id')->queryAll();


        //Не работает
        /*
        $user_articles = $this->hasMany(Articles::className(),['id'=>'article_id'])
            ->viaTable('users_to_articles',['user_id' => 'id']);*/
            //->select(['{{articles}}.TITLE'],'{{users}}.name')
            //->all();


        return $user_articles;
    }

}
?>