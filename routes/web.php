<?php
global $app;

//App routes
require_once basePath("routes/assets/app.route.php");
//Admin routes
require_once basePath("routes/assets/admin.route.php");


$app->get('/admin/pages',  ["admin\PageController", "index"]);



$app->get('/admin/add-on',  ["admin\AddOnController", "index"]);










$app->get('/',  ["user\HomeController", "connectors"]);
$app->get('/downloads',  ["user\HomeController", "downloads"]);
$app->get('/gallery',  ["user\HomeController", "gallery"]);
$app->get('/sealant',  ["user\HomeController", "sealant"]);
$app->get('/contact',  ["user\HomeController", "contact"]);

$app->get('/login',  ["user\HomeController", "login"]);
$app->get('/register',  ["user\HomeController", "register"]);



$app->get('/connector',  ["user\ConnectorController", "index"]);