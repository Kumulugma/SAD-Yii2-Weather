<?php

use yii\db\Migration;
use tigrov\pgsql\Schema;

/**
 * Class m220428_185413_create_table_species_locations
 */
class m220428_185413_create_table_species_locations extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('species_locations', [
            'id' => Schema::TYPE_PK,
            'species_id' => Schema::TYPE_TEXT,
            'location_id' => Schema::TYPE_TEXT
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropTable('species_locations');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220428_185413_create_table_species_locations cannot be reverted.\n";

        return false;
    }
    */
}
