<?php

/**
 * Created by PhpStorm.
 * User: thiagozampieri
 * Date: 21/10/17
 * Time: 11:18
 */
class Geolocation
{
        public static function getByAddress($loc)
        {
            $address  = $loc->street.',';
            $address .= $loc->number.',';
            //$address .= $loc->complement.',';
            $address .= $loc->neighborhood.',';
            $address .= $loc->zipcode.',';
            $address .= $loc->city.',';
            $address .= $loc->uf;

            $prepAddr  = str_replace(' ','+',$address);
            $url       = 'https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false';
            //echo $url;
            $geocode   = file_get_contents($url);
            $output    = json_decode($geocode);

            //$latitude  = $output->results[0]->geometry->location->lat;
            //$longitude = $output->results[0]->geometry->location->lng;
            return ($output->status == 'OK') ? $output->results[0]->geometry->location : false;
        }
}