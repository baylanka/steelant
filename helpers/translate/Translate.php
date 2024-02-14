<?php

namespace helpers\services\translate;

session_start();
class Translate
{

    public static $english = "en";
    public static $deutsch = "de";
    
    public static $french = "de";

    public static $lang;


    public function __construct($lang)
    {
        Translate::$lang = strtolower($lang);
    }

    public static function setLang($lang)
    {
        $_SESSION["lang"] = $lang;
        new Translate($_SESSION["lang"]);
    }
    public static function get($page, $key)
    {
        $lang = Translate::$lang;

        $translateJson = file_get_contents(basePath("helpers/translate/local/" . $lang . ".json"));

        $translateData = json_decode($translateJson);

        try {
            return $translateData->$page->$key;
        } catch (\Exception $e) {
            print($e);
        }
    }
}
