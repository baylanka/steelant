<?php

namespace helpers\translate;

class Translate
{
    public static function setLang($lang)
    {
        $_SESSION["lang"] = $lang;

    }
    public static function get($page, $key)
    {
        $lang = $_SESSION["lang"];

        $translateJson = file_get_contents(basePath("helpers/translate/local/" . $lang . ".json"));

        $translateData = json_decode($translateJson);

        try {
            return $translateData->$page->$key;
        } catch (\Exception $e) {
            print($e);
        }
    }

    public static function getLang()
    {
        return $_SESSION["lang"];
    }

    public static function hasLanguageSet(){
        return isset($_SESSION["lang"]);

    }
}
