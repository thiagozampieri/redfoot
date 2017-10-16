<?php

class Config extends TORM\Model
{

    static function getUrlBase(){
        $c = Config::all()->current();
        return $c->url_base;
    }

}


Config::setTableName('config');
Config::setPK('id');
