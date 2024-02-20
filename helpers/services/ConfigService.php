<?php

namespace helpers\services;
class ConfigService
{
    public static function getComposedConfigCollection()
    {
        $config = [];
        $configFiles = scandir('config');
        for ($i = 2; $i < sizeof($configFiles); $i++) {
            $file = $configFiles[$i];
            $key = str_replace(".config.php","", $file);
            $config[$key] = require_once basePath("config/" . $configFiles[$i]);
        }

        return $config;
    }
}
