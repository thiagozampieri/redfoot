<?php

/**
 * Created by PhpStorm.
 * User: guilherme
 * Date: 07/10/17
 * Time: 21:58
 */
class Redirect
{

    static function back(){
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }

    static function location($path = ''){

        header("location: " . Config::getUrlBase().$path);
    }

}