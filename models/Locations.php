<?php
namespace app\models;

use yii\db\ActiveRecord;
use app\models\SpeciesLocations;

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
    
    
    public static function getLocations()
    {
        return self::find()->all();
    }
}