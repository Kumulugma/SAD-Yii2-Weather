<?php
namespace app\models;

use yii\db\ActiveRecord;
use app\models\SpeciesLocations;
use app\models\Measurements;

class Locations extends ActiveRecord
{
    
    /**
     * @return string the name of the table associated with this ActiveRecord class.
     */
    public static function tableName()
    {
        return '{{locations}}';
    }
    
    public function getSpeciesLocations()
    {
        return $this->hasMany(SpeciesLocations::class, ['location_id' => 'id']);
    }
    
    public function getMeasurements()
    {
        return $this->hasMany(Measurements::class, ['location_id' => 'id']);
    }
    
    
    public static function getAllLocations()
    {
        return self::find()->all();
    }
}