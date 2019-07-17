<?php

class DependencyContainer
{
    private static $container = [];

    public static function bind($key, $value)
    {
        static::$container[$key] = $value;
    }

    public static function get($key)
    {
        return static::$container[$key];
    }
}