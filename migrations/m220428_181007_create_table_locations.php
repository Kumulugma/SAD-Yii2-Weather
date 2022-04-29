<?php

use yii\db\Migration;
use tigrov\pgsql\Schema;

/**
 * Class m220428_181007_create_table_locations
 */
class m220428_181007_create_table_locations extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('locations', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('locations');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220428_181007_create_table_locations cannot be reverted.\n";

        return false;
    }
    */
}
