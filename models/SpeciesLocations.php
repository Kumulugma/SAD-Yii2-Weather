<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Species;
use app\models\Locations;

class SpeciesLocations extends ActiveRecord {

    /**
     * @return string the name of the table associated with this ActiveRecord class.
     */
    public static function tableName() {
        return '{{species_locations}}';
    }

    public function getSpecies()
    {
        return $this->hasOne(Species::class, ['id' => 'species_id']);
    }

    public function getLocations() {
        return $this->hasOne(Locations::class, ['id' => 'location_id']);
    }

}
