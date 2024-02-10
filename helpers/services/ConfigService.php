<?php

namespace helpers\services;
class ConfigService
{
    public static function getComposedConfigCollection()
    {
        $config = [];
        $configFiles = scandir('config');
        for ($i = 2; $i < sizeof($configFiles); $i++) {
            $eachConfigContent = require_once "config/" . $configFiles[$i];
            $config = array_merge($config, $eachConfigContent);
        }

        return $config;
    }
}
