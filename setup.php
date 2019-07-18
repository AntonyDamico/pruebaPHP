<?php

require "DependencyContainer.php";
require "db/Connection.php";
$configArr = require "config.php";

// Agregando la conección a la base de datos en el contenedor de dependencias
DependencyContainer::bind(
    'pdo',
    Connection::connect($configArr['database'])
);