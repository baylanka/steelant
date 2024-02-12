<?php

require_once "app/AssistCLI.php";

use app\AssistCLI;

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
            case 'make:model':
                AssistCLI::makeModel($argValues);
                break;
            case 'make:controller':
                AssistCLI::makeController($argValues);
                break;
            case 'serve':
                AssistCLI::appStart($argValues);
                break;
            default:
                throw new Exception("undefined assist command");
        }
    }catch(Exception $ex){
        print "error: " . $ex->getMessage();
    }
}
