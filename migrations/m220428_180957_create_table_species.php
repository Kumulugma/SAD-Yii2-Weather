<?php

use yii\db\Migration;
use tigrov\pgsql\Schema;

/**
 * Class m220428_180957_create_table_species
 */
class m220428_180957_create_table_species extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('species', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('species');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220428_180957_create_table_species cannot be reverted.\n";

        return false;
    }
    */
}
