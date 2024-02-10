<?php

use helpers\services\ConfigService;
use helpers\services\RouteService;

require_once "app/Request.php";
const SERVICE_PATH = "helpers/services";
require_once SERVICE_PATH . "/ConfigService.php";
require_once SERVICE_PATH . "/RequestService.php";
require_once SERVICE_PATH . "/ResponseService.php";
require_once SERVICE_PATH . "/RouteService.php";


$env = parse_ini_file('.env');
$config = ConfigService::getComposedConfigCollection();

//starting point of the  app
RouteService::index();



