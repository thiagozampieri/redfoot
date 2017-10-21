<?php

/**
 * Created by PhpStorm.
 * User: thiagomzampieri
 * Date: 16/10/17
 * Time: 15:09
 */
class IndexController
{
    private $_data = array();

    public function __construct()
    {
        self::getPointsOfStartups();

    }

    public function getPointsOfStartups()
    {
        $_data = array();

        $startups = Startup::where(array(
            'status' => true,
        ));

        while($startup = $startups->next())
        {
            //echo "<pre>";
            //print_r($startup->address);

            foreach ($startup->address as $address)
            {
                //print_r($address);

                if ($address->lat == null & $address->lng == null)
                {

                    $geolocation = Geolocation::getByAddress($address);
                    $address2 = Address::where(array('startup_id' => $address->startup_id, 'type' => $address->type))->updateAttributes(
                        array(
                            'lat' => $geolocation->lat,
                            'lng' => $geolocation->lng
                        )
                    );
                    $address->lat = $geolocation->lat;
                    $address->lng = $geolocation->lng;

                }
                $_data[] =
                    array ('label' => $startup->name, 'icon' => $startup->image_path,
                           'coordinates' =>
                        array(
                            'lat'=> (double)$address->lat, 'lng' => (double)$address->lng,
                                ),
                            );
            }

            $this->_data = $_data;
        }
        return $this;
    }


    public function getCoordinates()
    {
        $_data = array();
        foreach ($this->_data as $v_data)
        {
            $_data[] = $v_data['coordinates'];
        }

        return $this->_data;
    }
}