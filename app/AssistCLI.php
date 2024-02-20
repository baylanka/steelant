<?php

namespace app;

use helpers\utilities\DateTimeUtility;

class AssistCLI
{
    public static function migrate()
    {
        global $container;
        $db =  $container->resolve('DB');
        try {
            $latestMigrationEntrySql = "
                            SELECT batch_number FROM migrations
                                                ORDER BY batch_number DESC;
                        ";
            $latestMigration = $db->query($latestMigrationEntrySql)->first();
            $latestMigrationBatchNumber = !$latestMigration ? 1 : (int)$latestMigration->batch_number + 1;
            $migrationsSql = "SELECT name FROM migrations;";
            $migrations = $db->query($migrationsSql)->get();
        }catch(\PDOException $ex){
            $latestMigrationBatchNumber = 1;
            $migrations = [];
        }
        $migratedTableNames = [];
        foreach ($migrations as $each){
            $migratedTableNames[] = $each->name;
        }
        $migrationDirContents = scandir(basePath("database/migrations"));
        for($i=2; $i < sizeof($migrationDirContents); $i++){
            $migrationFile = $migrationDirContents[$i];
            $migrationName = str_replace(".sql", "", $migrationFile);

            if(in_array($migrationName,$migratedTableNames)){
                continue;
            }
            try {
                $path = "database/migrations/" . $migrationFile;
                $migrationFilePath = basePath($path);
                $sqlContent = file_get_contents($migrationFilePath);
                $db->execute($sqlContent);

                $addNewMigratedFileName = "
                                INSERT INTO migrations (name, batch_number)
                                    VALUES (:name, :batch);
                                ";
                $db->execute($addNewMigratedFileName, ['name' => $migrationName, 'batch' => $latestMigrationBatchNumber]);
            }catch(\Exception $ex){
                echo "<br/>exception- migration:" . $migrationName . ", exception:" . $ex->getMessage();
            }
            $migratedTableNames[] = $migrationName;
        }
    }
    /**
     * @throws \Exception
     */
    public static function makeModel($argv)
    {
        if (!isset($argv[2])) {
            throw new \Exception("model name is required");
        }
        $template = file_get_contents("storage/framework/templates/class/SampleModel.php");
        $modelName = $argv[2];
        $fileName = $modelName . ".php";
        $dist =  "models/" . $fileName;
        if(file_exists($dist)){
            throw new \Exception("model already exists");
        }

        $template = str_replace("SampleModel", $modelName, $template);

        file_put_contents($dist, $template);
        print "\n----------- {$argv[2]} Model FILE IS ADDED -----------------\n";
    }

    public static function makeController($argv)
    {
        if (!isset($argv[2])) {
            throw new \Exception("controller name is required");
        }

        if(isset($argv[3]) && $argv[3] === '--resources'){
            $template = file_get_contents("storage/framework/templates/class/SampleControllerR.php");
        }else{
            $template = file_get_contents("storage/framework/templates/class/SampleController.php");
        }

        $controllerPathName = explode('/', $argv[2]);
        $ControllerName = $controllerPathName[sizeof($controllerPathName)-1];
        $fileName = $ControllerName . ".php";
        array_pop($controllerPathName);  //removing Controller Class name, i.e if, admin/SampleController removing SampleController
        array_unshift($controllerPathName, "controllers"); //adding an element on first index. we need directory path, for that adding controllers prefix here
        $directory = implode("/",$controllerPathName);
        $dist = $directory . "/". $fileName;
        if(file_exists($dist)){
            throw new \Exception("controller already exists");
        }

        $template = str_replace("SampleController", $ControllerName, $template);
        $template = str_replace("ControllerR", "Controller", $template);
        $newControllerNameSpace =  "namespace " . str_replace("/","\\",$directory) . ";";
        $template = str_replace("namespace controllers;", $newControllerNameSpace, $template);
        if(!is_dir($directory)){
            throw new \Exception("directory is unavailable");
        }
        file_put_contents($dist, $template);
        print "\n----------- {$argv[2]} Controller FILE IS ADDED -----------------\n";
    }

    public static function makeMigration($argv)
    {
        $template = file_get_contents("storage/framework/templates/sql/create_table.sql");
        $fileName = time() . "_" . DateTimeUtility::getCurrentDate("Y_m_d") . "_" . $argv[2] . ".sql";
        $dist = "database/migrations/" . $fileName;
        if (isset($argv[3]) && strpos($argv[3], "--table=") !== false) {
            $tableArgument = explode("=", $argv[3]);
            $tableName = $tableArgument[1];
            $template = str_replace("%tbl_name%", $tableName, $template);
        }
        file_put_contents($dist, $template);
        print "----------- {$argv[2]}  MIGRATION FILE IS ADDED -----------------";
    }

    public static function appStart($argv)
    {
        $portNumber = "80";
        if(isset($argv[2]) && strpos($argv[2], "--port=") !== false){
            $portArgument = explode('=', $argv[2]);
            $portNumber = $portArgument[1];
        }

        exec("php -S localhost:$portNumber");
    }
}