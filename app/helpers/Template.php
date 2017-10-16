<?php

/**
 * Created by PhpStorm.
 * User: guilherme
 * Date: 07/10/17
 * Time: 17:55
 */
class Template
{

    private static function _getDIR(){
        return str_replace("app/helpers", "", __DIR__);
    }

    public static function getHeader(){
        include Template::_getDIR() . '/' . "partials/common/header.php";
    }

    public static function getFooter(){
        include Template::_getDIR() . '/' . "partials/common/footer.php";
    }
}