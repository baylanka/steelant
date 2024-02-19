<?php

namespace helpers\services;

use helpers\translate\Translate;

class LanguageService
{
    public static function setLanguage()
    {
        if (isset($_GET['lang'])) {
            Translate::setLang($_GET['lang']);
            return;
        }

        if(isset($_SESSION["lang"])){
            Translate::setLang($_SESSION["lang"]);
            return;
        }

        Translate::setLang(Translate::DEUTSCH);
    }
}