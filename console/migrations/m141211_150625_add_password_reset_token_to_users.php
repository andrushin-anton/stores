<?php

use yii\db\Schema;
use yii\db\Migration;

class m141211_150625_add_password_reset_token_to_users extends Migration
{
    public function up()
    {
        $this->addColumn('users', 'password_reset_token', Schema::TYPE_STRING);
    }

    public function down()
    {
        echo "m141211_150625_add_password_reset_token_to_users cannot be reverted.\n";

        return false;
    }
}
