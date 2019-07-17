<?php

class Connection
{
    public static function connect(array $config)
    {
        try {
            return new PDO (
                $config['connection'] . ';dbname=' . $config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch (PDOException $exception) {
            var_dump($exception->getMessage());
            die('No se pudo conectar, compruebe credenciales');
        }
    }
}