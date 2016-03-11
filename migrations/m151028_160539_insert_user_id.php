<?php

use yii\db\Schema;
use yii\db\Migration;

class m151028_160539_insert_user_id extends Migration
{
    public function up()
    {
        $this->execute('ALTER TABLE `news` ADD `USER_ID` INT NOT NULL AFTER `ACTIVE`');
    }

    public function down()
    {

        $this->execute('ALTER TABLE `news` DROP `USER_ID`');
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
