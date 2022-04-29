<?php

use yii\db\Migration;
use tigrov\pgsql\Schema;

/**
 * Class m220429_142300_add_date_to_measurements
 */
class m220429_142300_add_date_to_measurements extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->addColumn('measurements', 'measure_time', Schema::TYPE_DATETIME);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->dropColumn('measurements', 'measure_time');
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m220429_142300_add_date_to_measurements cannot be reverted.\n";

      return false;
      }
     */
}
