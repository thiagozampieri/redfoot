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
    private $counter = null;

    public function __construct()
    {
        self::getPointsOfStartups();
        self::getCountersOfDatas();
    }

    public function getCountersOfDatas()
    {
        $entrepreneurs = Entrepreneur::all()->count();
        $startups = Startup::where(array('status' => true))->count();
        $companies = Startup::where(array('status' => true, 'is_formalized' => true))->count();

        $cities = 0;
        $l_cities = Address::all();
        $_cities = array();
        while($v_cities = $l_cities->next())
        {
            if(!isset($_cities[$v_cities->uf][$v_cities->city]))
            {
                $cities++;
                $_cities[$v_cities->uf][$v_cities->city] = true;
            }
        }

        $markets = 0;
        $l_startups = Business::all();
        $_startups = array();
        while($v_startups = $l_startups->next())
        {
            if(!isset($_startups[$v_startups->main_market]))
            {
                $markets++;
                $_startups[$v_startups->main_market] = true;
            }
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/v2.10/RedfootStartups/events?access_token=EAACEdEose0cBAK6gG8F3Ig1ag1jxZBVotfAMn6RBbCNnFalZCJD1PvVJqACgWPB98NyRdZCEPpqGnOYZAZC2aP0q38yLLBitw22vR7pz0SvyFYkvXOrZAmdrqeaFJsHhmouFvyeZA8JxIaVdJKw99flcdZBrTsooIDDLoNYkt3ewsXQ9Hq6DHiMZAuEDHIrptuPYZD");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = json_decode(curl_exec($ch));
        curl_close($ch);
        $meetups = sizeof($output->data);

        $counter = new stdClass();

        $counter->entrepreneurs = $entrepreneurs;
        $counter->startups = $startups;
        $counter->companies = $companies;
        $counter->cities = $cities;
        $counter->markets = $markets;
        $counter->meetups = $meetups;

        $this->counter = $counter;
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

    public function getCounters()
    {
        return $this->counter;
    }
}