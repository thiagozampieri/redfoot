<?php

/**
 * Created by PhpStorm.
 * User: guilherme
 * Date: 07/10/17
 * Time: 21:53
 */




class Util
{
    /**
     * Formata de 00/00/0000 para 0000-00-00
     * @param $date
     * @return string
     */
    static function formatDate($date){
        if($date !== '') {
            $date = explode('/', $date);
            return $date[2] . '-' . $date[1] . '-' . $date[0];
        }else{
            return '1970-01-01';
        }
    }

    /**
     * Retorna apenas numeros
     * @param $text
     * @return string
     */
    static function onlyNumbers($text){
        $text = str_replace('.', '', $text);
        $text = str_replace('/', '', $text);
        $text = str_replace('-', '', $text);
        return $text;
    }

    static function textLimiterCaracter($str, $limit, $suffix = '...')
    {
        if (strlen($str) > $limit) {

            while (substr($str, $limit, 1) != ' ') {
                $limit--;
            }

            if (strlen($str) <= $limit) {
                return $str;
            }

            return substr($str, 0, $limit + 1) . $suffix;
        }
        return $str;
    }

}