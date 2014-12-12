<?php

use yii\db\Schema;
use yii\db\Migration;

class m141211_062714_create_mail_queue extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%mail_queue}}', [
            'id' => Schema::TYPE_PK,
            'target_email' => Schema::TYPE_STRING . ' NOT NULL',
            'from_email' => Schema::TYPE_STRING . ' NOT NULL',
            'subject' => Schema::TYPE_STRING . ' NOT NULL',
            'body' => Schema::TYPE_TEXT . ' NOT NULL',
            'params' => Schema::TYPE_STRING . ' NOT NULL',

            'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 0',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%mail_queue}}');
    }
}
