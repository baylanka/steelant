<?php

namespace helpers\services;

use helpers\pools\LanguagePool;
use helpers\translate\Translate;

class LanguageService
{
    public static function setLanguage()
    {
        try{

            if (isset($_GET['lang'])) {
                $label = strtolower($_GET['lang']);
                $languageTag = LanguagePool::getValueFromLabel($label);
                Translate::setLang($languageTag);
                return;
            }
        }catch (\Exception $ex){
            Translate::setLang(LanguagePool::GERMANY()->getLabel());
        }
    }
}