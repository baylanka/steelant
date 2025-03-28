<?php
use \helpers\services\RouterService;
global $app;

//App routes
require_once basePath("routes/assets/app.web.php");
//Admin routes
require_once basePath("routes/assets/admin.web.php");

//Leaf Category routes (each pages)
RouterService::setAllLeafCategoryRoutes();


$app->get('/',  ["user\HomeController", "home"]);
$app->get('/downloads',  ["user\HomeController", "downloads"]);
$app->get('/gallery',  ["user\HomeController", "gallery"]);
$app->get('/contact',  ["user\HomeController", "contact"]);
$app->get('/about',  ["user\HomeController", "about"]);
$app->get('/imprint',  ["user\HomeController", "imprint"]);
$app->get('/privacy',  ["user\HomeController", "privacy"]);
$app->get('/newsletter',  ["user\HomeController", "newsLetter"]);
$app->get('/general/terms&condition',  ["user\HomeController", "generalCondition"]);

$app->get('/favourite',  ["user\HomeController", "favourite"]);

$app->get('/login',  ["UserController", "login_view"]);
$app->post('/login',  ["UserController", "login"]);
$app->get('/profile',  ["UserController", "profile"]);
$app->post('/user/update',  ["UserController", "update"]);
$app->post('/user/update/password',  ["UserController", "update_password"]);


$app->get('/register',  ["UserController", "register_view"]);
$app->post('/register',  ["UserController", "register"]);

$app->get('/logout',  ["UserController", "logout"]);

$app->get('/newsletter/unsubscribe',  ["UserController", "unsubscribe"]);
$app->get('/newsletter/subscribe',  ["UserController", "subscribe"]);

$app->get('/verify',  ["UserController", "verify_mail"]);


$app->get('/order/request',  ["user\OrderController", "create"]);
$app->post('/order/request/create',  ["user\OrderController", "store"]);
$app->get('/order/request/delete',  ["user\OrderController", "destroy"]);


$app->post('/contact/sendMessage',  ["UserController", "sendMessage"]);

$app->get('/contents',  ["user\ContentController", "getContentsByCategoryId"]);
$app->get('/connector/add_to_favourite',   ["user\ConnectorController", "addToFavourite"]);
$app->get('/connector/favourite/delete',   ["user\ConnectorController", "destroyFavourite"]);




