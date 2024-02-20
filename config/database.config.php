<?php
global $env;

return [
    'DB_ENGINE' => $env['DB_ENGINE'] ?? 'mysql',
    'DB_HOST'=>  $env['DB_HOST'] ?? "127.0.0.1",
    'DB_PORT'=>  $env['DB_PORT'] ?? "3306",
    'DB_USER'=>  $env['DB_USER'] ?? "BayFrame",
    'DB_PASSWORD'=> $env['DB_PASSWORD'] ?? "BayFrame-Secret",
    'DB_NAME'=> $env['DB_NAME'] ?? "BayAppDB",
];