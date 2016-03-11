<?php

use yii\db\Schema;
use yii\db\Migration;

class m151029_124154_create_users_to_article_table extends Migration
{
    public function up()
    {
        $this->createTable('users_to_articles',[
            'id' => $this->primaryKey(),
            'article_id' => $this->integer(11),
            'user_id' => $this->integer(11)
        ]);
    }

    public function down()
    {
        $this->dropTable('users_to_articles');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
