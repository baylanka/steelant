<?php

use helpers\services\ConfigService;
use helpers\services\ResponseService;
use helpers\services\RouteService;

require_once __DIR__ . "/app/coreFunctions.php";
require_once basePath("app/Request.php");
const SERVICE_PATH = "helpers/services";
require_once basePath(SERVICE_PATH . "/ConfigService.php");
require_once basePath(SERVICE_PATH . "/RequestService.php");
require_once basePath(SERVICE_PATH . "/ResponseService.php");
require_once basePath(SERVICE_PATH . "/RouteService.php");

if(!file_exists(".env")){
    ResponseService::abort("422",'.env file does not exists');
}
$env = parse_ini_file('.env');
$config = ConfigService::getComposedConfigCollection();

//starting point of the  app
RouteService::index();



