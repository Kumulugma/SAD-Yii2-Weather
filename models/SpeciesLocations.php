<?php
namespace app\models;

use yii\db\ActiveRecord;
use app\models\Species;

class SpeciesLocations extends ActiveRecord
{
    
    /**
     * @return string the name of the table associated with this ActiveRecord class.
     */
    public static function tableName()
    {
        return '{{species_locations}}';
    }
    
    public function getSpecies()
    {
        return $this->hasOne(Species::class, ['id' => 'species_id']);
    }
    
}