<?php

class Config extends TORM\Model
{

    static function getUrlBase(){
        $c = Config::all()->current();

        return $c->url_base;
    }

    static function getGoogleMapsKey(){
        return "AIzaSyCNQqrSGL0ow3uAR1oBEbXOP9lJeTmnOk8";
    }

}


Config::setTableName('config');
Config::setPK('id');
