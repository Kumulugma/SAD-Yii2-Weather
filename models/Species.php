<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\SpeciesLocations;

class Species extends ActiveRecord {

    /**
     * @return string the name of the table associated with this ActiveRecord class.
     */
    public static function tableName() {
        return '{{species}}';
    }

    public function getLocationsSpecies() {
        return $this->hasMany(SpeciesLocations::class, ['species_id' => 'id']);
    }

    public static function getAllSpecies()
    {
        return self::find()->all();
    }
}
