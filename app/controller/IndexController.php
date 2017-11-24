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
    private $facebookEvent = null;

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
        curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/v2.10/RedfootStartups/events?access_token=1552012431558424|4HsNfdtOdfV3TcAYveBPQGR4Rhw");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = json_decode(curl_exec($ch));
        curl_close($ch);

        $this->facebookEvent = $output->data;
        $meetups = sizeof($this->facebookEvent);



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
            //print_r($startup->business);

            foreach ($startup->address as $address)
            {
                //print_r($address);

                if (($address->lat == null & $address->lng == null) | ($address->lat != 0 & $address->lng != 0))
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
                ;

                //if ($address->lat != 0 & $address->lng != 0) {
                    $_data[] =
                        array('label' => $startup->name,
                            'icon' => $startup->image_path,
                            'category' => $startup->business->main_market,
                            'address' => $address->street . ', ' . $address->number . ', ' . $address->complement . ', ' . $address->neighborhood . ', ' . $address->zipcode . ', ' . $address->city . ' / ' . $address->uf,
                            'coordinates' => array(
                                'lat' => (double)$address->lat, 'lng' => (double)$address->lng,
                            ),
                        );

                //}
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

    public function getEvents()
    {
        return $this->facebookEvent;
    }

    public function getCategory()
    {
        $v_categories = (isset($_GET['category'])) ? explode(",", $_GET['category']) : array();
        $_categories = array();
        foreach($v_categories as $v_cat => $value) $_categories[$value] = true;

        return $_categories;
    }
}

function countFilter($data)
{
    global $key;
    if ($data[category] == $key)
        return $data;
}

function mountLink($texto)
{
    if (!is_string ($texto))
        return $texto;

    $er = "/(https:\/\/(www\.|.*?\/)?|http:\/\/(www\.|.*?\/)?|www\.)([a-zA-Z0-9]+|_|-)+(\.(([0-9a-zA-Z]|-|_|\/|\?|=|&)+))+/i";

    preg_match_all ($er, $texto, $match);

    foreach ($match[0] as $link)
    {

        //coloca o 'http://' caso o link não o possua
        $link_completo = (stristr($link, "http") === false) ? "http://" . $link : $link;

        $link_len = strlen ($link);

        //troca "&" por "&", tornando o link válido pela W3C
        $web_link = str_replace ("&", "&amp;", $link_completo);
        $texto = str_ireplace ($link, "<a href=\"" . strtolower($web_link) . "\" target=\"_blank\">". (($link_len > 60) ? substr ($web_link, 0, 25). "...". substr ($web_link, -15) : $web_link) ."</a>", $texto);

    }

    return $texto;

}