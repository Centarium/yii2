<?php

use yii\db\Schema;
use yii\db\Migration;

class m151029_071608_create_users_table extends Migration
{
    public function safeup()
    {
        $this->createTable('users',[
            'id' => $this->primaryKey(),
            'name' => $this->string(100)
        ]);
        $this->execute('ALTER TABLE `users` ADD `DATA` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `NAME`');
    }

    public function safedown()
    {
        $this->dropTable('users');
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
