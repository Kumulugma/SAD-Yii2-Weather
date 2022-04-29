<?php

use yii\db\Migration;
use tigrov\pgsql\Schema;

/**
 * Class m220428_181031_create_table_measurements
 */
class m220428_181031_create_table_measurements extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('measurements', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'humidity' => Schema::TYPE_FLOAT,
            'iteration' => Schema::TYPE_FLOAT,
            'pressure' => Schema::TYPE_FLOAT,
            'temp_feels' => Schema::TYPE_FLOAT,
            'temp_max' => Schema::TYPE_FLOAT,
            'temp_min' => Schema::TYPE_FLOAT,
            'visibility' => Schema::TYPE_INTEGER,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('measurements');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220428_181031_create_table_measurements cannot be reverted.\n";

        return false;
    }
    */
}
