<?php

use yii\db\Schema;
use yii\db\Migration;

class m141211_055704_add_timestamps_to_users extends Migration
{
    public function up()
    {
        $this->addColumn('users', 'created_at', 'integer');
        $this->addColumn('users', 'updated_at', 'integer');
    }

    public function down()
    {
        return true;
    }
}
