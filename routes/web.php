<?php
global $app;

$app->get('/test',  ["TestController", "test"]);
$app->get('/migrate', ["AppAssistanceController", "migrate"]);

$app->get('/',  ["HomeController", "index"]);


$app->get('/admin/dashboard',  ["admin\DashboardController", "index"]);
$app->get('/admin/connectors',  ["admin\ConnectorController", "index"]);