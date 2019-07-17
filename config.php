<?php

return [
    'database' => [
        'name' => 'bd_meteo10',
        'username' => 'tonio',
        'password' => 'amda',
        'connection' => 'mysql:host=127.0.0.1',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        ]
    ]
];