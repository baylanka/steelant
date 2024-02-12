<?php
require_once "helpers/utilities/DateTimeUtility.php";
use helpers\utilities\DateTimeUtility;

$options = [
    'make:migration',
];

if($argc <= 1){
    die("empty arguments.");
}

switch($argv[1]){
    case $options[0]:
        writeCreateTableSqlFile($argv);
        break;
    default:
        print "undefined command";
}


function writeCreateTableSqlFile($argv)
{
    $template = file_get_contents(__DIR__ . "/storage/framework/templates/sql/create_table.sql");
    $fileName = time() . "_" . DateTimeUtility::getCurrentDate("Y_m_d") . "_" .$argv[2] . ".sql";
    $dist = __DIR__ . "/database/migrations/" . $fileName;
    if(isset($argv[3]) && strpos($argv[3],"--table=") !== false){
        $tableArgument = explode("=", $argv[3]);
        $tableName = $tableArgument[1];
        $template = str_replace("%tbl_name%",$tableName, $template);
    }

    file_put_contents($dist, $template);
    print "\n----------- MIGRATION FILE IS ADDED -----------------\n";
}

