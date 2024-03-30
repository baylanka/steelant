<?php
global $app;

//App routes
require_once basePath("routes/assets/app.web.php");
//Admin routes
require_once basePath("routes/assets/admin.web.php");


$app->get('/',  ["user\HomeController", "connectors"]);
$app->get('/downloads',  ["user\HomeController", "downloads"]);
$app->get('/gallery',  ["user\HomeController", "gallery"]);
$app->get('/contact',  ["user\HomeController", "contact"]);
$app->get('/about',  ["user\HomeController", "about"]);
$app->get('/imprint',  ["user\HomeController", "imprint"]);
$app->get('/privacy&policy',  ["user\HomeController", "privacy"]);
$app->get('/newsletter',  ["user\HomeController", "newsLetter"]);
$app->get('/general/terms&condition',  ["user\HomeController", "generalCondition"]);


$app->get('/favourite',  ["user\HomeController", "favourite"]);

$app->get('/login',  ["UserController", "login_view"]);
$app->post('/login',  ["UserController", "login"]);

$app->get('/register',  ["UserController", "register_view"]);
$app->post('/register',  ["UserController", "register"]);


$app->get('/logout',  ["UserController", "logout"]);



$app->get('/connector',  ["user\ConnectorController", "index"]);

$app->get('/order/request',  ["user\OrderController", "create_view"]);
$app->post('/order/request/create',  ["user\OrderController", "create"]);