<?php

namespace app\models;

use yii\httpclient\Client;
use app\models\Species;
use app\models\Locations;
use app\models\SpeciesLocations;
use DateTimeZone;

class RestClient {

    const PER_PAGE_LIMIT = 100;

    public static function pullSpecies() {

        $client = new Client();
        $loop = true;
        $i = 1;

        while ($loop) {
            $response = $client->createRequest()
                    ->setMethod('GET')
                    ->setUrl('http://weather.k3e.pl/wp-json/wp/v2/species')
                    ->setData(['per_page' => self::PER_PAGE_LIMIT, 'page' => $i])
                    ->send();

            $total = $response->headers->get('x-wp-total');
            if ($total > self::PER_PAGE_LIMIT) {
                $pages = ceil($total / self::PER_PAGE_LIMIT);
            } else {
                $pages = 1;
            }

            if ($response->isOk) {
                if ($pages >= $i) {
                    foreach ($response->data as $item) {
                        if (!Species::find()->where(['name' => $item['name']])->exists()) {
                            $species = new Species();
                            $species->name = $item['name'];
                            $species->save();
                        }
                    }
                    $i++;
                } else {
                    $loop = false;
                }
            } else {
                $loop = false;
            }
        }
    }

    public static function pullLocations() {

        $client = new Client();
        $loop = true;
        $i = 1;

        while ($loop) {
            $response = $client->createRequest()
                    ->setMethod('GET')
                    ->setUrl('http://weather.k3e.pl/wp-json/wp/v2/location')
                    ->setData(['per_page' => self::PER_PAGE_LIMIT, 'page' => $i])
                    ->send();

            $total = $response->headers->get('x-wp-total');
            if ($total > self::PER_PAGE_LIMIT) {
                $pages = ceil($total / self::PER_PAGE_LIMIT);
            } else {
                $pages = 1;
            }

            if ($response->isOk) {
                if ($pages >= $i) {
                    foreach ($response->data as $item) {

                        if (!Locations::find()->where(['name' => $item['title']['rendered']])->exists()) {
                            $location = new Locations();
                            $location->id = $item['id'];
                            $location->name = $item['title']['rendered'];
                            $location->save();
                        } else {
                            $location = Locations::find()->where(['name' => $item['title']['rendered']])->one();
                        }
                        if (count($item['species']) > 0) {
                            $subResponse = $client->createRequest()
                                    ->setMethod('GET')
                                    ->setUrl(reset($item['_links']['wp:term'])['href'])
                                    ->send();

                            SpeciesLocations::deleteAll(['location_id' => $location->id]);
                            foreach ($subResponse->data as $subItems) {
                                $subSpec = Species::find()->where(['name' => $subItems['name']])->one();

                                if ($subSpec != null && !SpeciesLocations::find()->where(['location_id' => $location->id, 'species_id' => $subSpec->id])->exists()) {
                                    $speciesLocation = new SpeciesLocations();
                                    $speciesLocation->location_id = $location->id;
                                    $speciesLocation->species_id = $subSpec->id;
                                    $speciesLocation->save();
                                }
                            }
                        }
                    }
                    $i++;
                } else {
                    $loop = false;
                }
            } else {
                $loop = false;
            }
        }
    }
    
        public static function pullMeasurements() {

        $client = new Client();
        $loop = true;
        $i = 1;

        while ($loop) {
            $response = $client->createRequest()
                    ->setMethod('GET')
                    ->setUrl('http://weather.k3e.pl/wp-json/wp/v2/measurement')
                    ->setData(['per_page' => self::PER_PAGE_LIMIT, 'page' => $i])
                    ->send();

            $total = $response->headers->get('x-wp-total');
            if ($total > self::PER_PAGE_LIMIT) {
                $pages = ceil($total / self::PER_PAGE_LIMIT);
            } else {
                $pages = 1;
            }
            

            
            if ($response->isOk) {
                if ($pages >= $i) {
                    foreach ($response->data as $item) {
                        if (!Measurements::find()->where(['id' => $item['id']])->exists()) {
                            $measurement = new Measurements();
                            $measurement->id = $item['id'];
                            $measurement->name = $item['title']['rendered'];
                            $measurement->humidity = $item['meta']['humidity'];
                            $measurement->iteration = $item['meta']['iteration'];
                            $measurement->pressure = $item['meta']['pressure'];
                            $measurement->temp_feels = $item['meta']['temp_feels'];
                            $measurement->temp_max = $item['meta']['temp_max'];
                            $measurement->temp_min = $item['meta']['temp_min'];
                            $measurement->visibility = $item['meta']['visibility'];
                            $measurement->location_id = $item['meta']['location_ID'];
                            $measurement->measure_time = self::get_date_from_gmt($item['date_gmt']);
                            
                            $measurement->save();
                        }
                    }
                    $i++;
                } else {
                    $loop = false;
                }
            } else {
                $loop = false;
            }
        }
    }
    
    public static function get_date_from_gmt( $string, $format = 'Y-m-d H:i:s' ) {
    $datetime = date_create( $string, new DateTimeZone( 'UTC' ) );
 
    if ( false === $datetime ) {
        return gmdate( $format, 0 );
    }
 
    return $datetime->setTimezone( new DateTimeZone('Europe/Warsaw') )->format( $format );
}

}
