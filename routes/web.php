<?php
global $app;

$app->get('/',  ["HomeController", "index"]);
$app->get('/dashboard',  ["admin\DashboardController", "index"]);