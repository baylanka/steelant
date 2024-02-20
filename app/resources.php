<?php

use app\Container;
use app\Database;
$container = new Container();

$container->bind('DB', function(){
    global $config;
    $dbConfig = $config['database'];
    return  Database::getInstance($dbConfig['DB_ENGINE'], $dbConfig['DB_HOST'],
        $dbConfig['DB_PORT'], $dbConfig['DB_USER'], $dbConfig['DB_PASSWORD'], $dbConfig['DB_NAME']);
});
