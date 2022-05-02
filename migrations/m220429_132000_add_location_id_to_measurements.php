<?php

use yii\db\Migration;
use tigrov\pgsql\Schema;

/**
 * Class m220429_132000_add_location_id_to_measurements
 */
class m220429_132000_add_location_id_to_measurements extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->addColumn('measurements', 'location_id', Schema::TYPE_INTEGER . ' NOT NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->dropColumn('measurements', 'location_id');
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m220429_132000_add_location_id_to_measurements cannot be reverted.\n";

      return false;
      }
     */
}
