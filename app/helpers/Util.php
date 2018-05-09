<?php

/**
 * Created by PhpStorm.
 * User: guilherme
 * Date: 07/10/17
 * Time: 21:53
 */


class Util {
    /**
     * Formata de 00/00/0000 para 0000-00-00
     * @param $date
     * @return string
     */
    static function formatDate($date){
        if($date !== '') {
            $date = explode('/', $date);

            if (checkdate($date[1],$date[2],$date[0])) return $date[2] . '-' . $date[1] . '-' . $date[0];
        }
        return '1970-01-01';
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

    private static $g_color = 0;
    static function getColor(){
        $_color = array();

        $_color[] = '#ff5050';
        $_color[] = '#ffffff';
        /*
        $_color[] = '#ff0000';
        $_color[] = '#ff4000';
        $_color[] = '#ff8000';
        $_color[] = '#ffbf00';
        $_color[] = '#ffff00';
        $_color[] = '#bfff00';
        $_color[] = '#80ff00';
        $_color[] = '#40ff00';
        $_color[] = '#00ff00';
        $_color[] = '#00ff40';
        $_color[] = '#00ff80';
        $_color[] = '#00ffbf';
        $_color[] = '#00ffff';
        $_color[] = '#00bfff';
        $_color[] = '#0080ff';
        $_color[] = '#0040ff';
        $_color[] = '#0000ff';
        $_color[] = '#4000ff';
        $_color[] = '#8000ff';
        $_color[] = '#bf00ff';
        $_color[] = '#ff00ff';
        $_color[] = '#ff00bf';
        $_color[] = '#ff0080';
        $_color[] = '#ff0040';
        $_color[] = '#ff0000';

        return $_color[rand(0, sizeof($_color))];
        */

        self::$g_color++;

        $tmp = (self::$g_color % 2) ? 1 : 0;
        return $_color[$tmp];
    }

}