<?php

/**
 * Created by PhpStorm.
 * User: guilherme
 * Date: 07/10/17
 * Time: 21:53
 */




class Message
{
    static function setData($key, $value){

        $_SESSION[$key] = $value;
    }

    static function getData($key){

        return $_SESSION[$key];
    }

    static function clear($key){
        unset($_SESSION[$key]);
    }
    
    /**
     * Imprime a message
     */
    static function showMessage(){
        if(!empty(Message::getData('message'))){
            echo "<div class='alert alert-".Message::getData('type')."'>";
            echo Message::getData('message');
            echo "</div>";
            Message::clear('message');
            Message::clear('type');
        }
    }

    static function msgWarning($msg){
        $_SESSION['type'] = 'warning';
        $_SESSION['message'] = $msg;
    }

    static function msgSuccess($msg){
        $_SESSION['type'] = 'success';
        $_SESSION['message'] = $msg;
    }

    static function msgError($msg){
        $_SESSION['type'] = 'danger';
        $_SESSION['message'] = $msg;
    }
}