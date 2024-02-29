<?php
require_once __DIR__ . "/app/coreFunctions.php";

use app\AssistCLI;
use helpers\services\ConfigService;

autoRegister();
$env = parse_ini_file('.env');
$config = ConfigService::getComposedConfigCollection();
require_once basePath("app/resources.php");

$argumentCount = $argc;
$argumentValues = $argv;
main($argumentCount, $argumentValues);


function main($argCount, $argValues)
{
    try{
        if ($argCount <= 1) {
            throw new Exception("empty arguments.");
        }

        switch ($argValues[1]) {
            case 'make:migration':
                AssistCLI::makeMigration($argValues);
                break;
            case 'migrate':
                AssistCLI::migrate();
                break;
            case 'make:model':
                AssistCLI::makeModel($argValues);
                break;
            case 'make:controller':
                AssistCLI::makeController($argValues);
                break;
            case 'serve':
                AssistCLI::appStart($argValues);
                break;
            case 'storage:link':
                AssistCLI::createStorageLink();
                break;
            case 'storage:unlink':
                AssistCLI::removeStorageLink();
                break;
            default:
                throw new Exception("undefined assist command");
        }
    }catch(Exception $ex){
        print "error: " . $ex->getMessage();
    }
}
