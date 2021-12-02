<?php

namespace App\Service;


abstract class Session
{
    public static function add($key, $value)
    {
        $_SESSION[$key] = $value;
        return $_SESSION[$key];
    }

    public static function remove($key)
    {
        unset($_SESSION[$key]);
    }

    public static function get($key)
    {
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }
        return null;
    }

    public static function getFullQtt(): int
    {
        if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
            return array_reduce($_SESSION["cart"], function($acc, $prod){
                return $acc + $prod["qtt"];
            }, 0);
        }
        else return 0;
    }

}