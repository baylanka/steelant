<?php
global $app;

$app->get('/test',  ["TestController", "test"]);
$app->get('/migrate', ["AppAssistanceController", "migrate"]);

$app->get('/',  ["HomeController", "index"]);


$app->get('/admin/dashboard',  ["admin\DashboardController", "index"]);
$app->get('/admin/connectors',  ["admin\ConnectorController", "index"]);

$app->get('/admin/categories', ["admin\CategoryController", "index"]);
$app->get('/admin/categories/main/store', ["admin\CategoryController", "createMainCategory"]);