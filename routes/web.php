<?php
global $app;

$app->get('/test',  ["TestController", "test"]);
$app->get('/migrate', ["AppAssistanceController", "migrate"]);
$app->get('/add_storage_link', ["AppAssistanceController", "linkStorage"]);
$app->get('/remove_storage_link', ["AppAssistanceController", "unlinkStorage"]);


$app->get('/admin/dashboard',  ["admin\DashboardController", "index"]);
$app->get('/admin/connectors',  ["admin\ConnectorController", "index"]);

$app->get('/admin/categories', ["admin\CategoryController", "index"]);
$app->get('/admin/categories/main/store', ["admin\CategoryController", "createMainCategory"]);
$app->post('/admin/categories/main/store', ["admin\CategoryController", "storeMainCategory"]);

$app->get('/admin/categories/sub/store', ["admin\CategoryController", "createSubCategory"]);
$app->post('/admin/categories/sub/store', ["admin\CategoryController", "storeSubCategory"]);
$app->delete('/admin/categories/sub/destroy', ["admin\CategoryController", "destroySubCategory"]);

$app->get('/admin/categories/edit', ["admin\CategoryController", "edit"]);
$app->post('/admin/categories/update', ["admin\CategoryController", "update"]);


$app->get('/',  ["user\HomeController", "connectors"]);
$app->get('/downloads',  ["user\HomeController", "downloads"]);
$app->get('/gallery',  ["user\HomeController", "gallery"]);
$app->get('/sealant',  ["user\HomeController", "sealant"]);
$app->get('/contact',  ["user\HomeController", "contact"]);


$app->get('/connector',  ["user\ConnectorController", "index"]);