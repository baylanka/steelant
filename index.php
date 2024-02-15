<?php

use helpers\services\ConfigService;
use helpers\services\ResponseService;
use app\Router;

require_once __DIR__ . "/app/coreFunctions.php";

//this function responsible for include only PHP class file, that are not include
autoRegister();

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



