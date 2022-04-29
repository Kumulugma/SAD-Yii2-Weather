<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Locations;

class Measurements extends ActiveRecord {

    /**
     * @return string the name of the table associated with this ActiveRecord class.
     */
    public static function tableName() {
        return '{{measurements}}';
    }

    public function getSpecies() {
        return $this->hasOne(Locations::class, ['id' => 'location_id']);
    }

}
