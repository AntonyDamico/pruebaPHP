<?php

require "DependencyContainer.php";
require "db/Connection.php";
$configArr = require "config.php";

DependencyContainer::bind(
    'pdo',
    Connection::connect($configArr['database'])
);