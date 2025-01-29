<?php

namespace myfrm;

class App
{
    protected static $conteiner;

    public static function setContainer($conteiner)
    {
        static::$conteiner = $conteiner;
    }

    public static function getContainer()
    {
        return static::$conteiner;
    }

    public static function get($service)
    {
        return static::getContainer()->getService($service);
    }

}
