<?php


namespace app\core;


class Session
{

    public function __construct()
    {
        session_start();
    }

    public function setSession($key,$indice,$value)
    {
        $_SESSION[$key][$indice] = $value;
    }

}