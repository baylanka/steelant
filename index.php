<?php

use helpers\services\ConfigService;
use helpers\services\ResponseService;
use app\Router;

require_once __DIR__ . "/app/coreFunctions.php";
require_once basePath("app/Request.php");
require_once basePath("app/Router.php");
const SERVICE_PATH = "helpers/services";
require_once basePath(SERVICE_PATH . "/ConfigService.php");
require_once basePath(SERVICE_PATH . "/RequestService.php");
require_once basePath(SERVICE_PATH . "/ResponseService.php");
require_once basePath("helpers/translate/Translate.php");

if(!file_exists(".env")){
    ResponseService::abort("422",'.env file does not exists');
}
$env = parse_ini_file('.env');
$config = ConfigService::getComposedConfigCollection();

try{
    appInit();
    $app = new Router();
    //web routes
    require_once basePath("routes/web.php");
    $app->listener();
}catch(Exception $ex){
    die("routing exception: " . $ex->getMessage());
}



