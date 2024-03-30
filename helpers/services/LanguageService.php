<?php

namespace helpers\services;

use helpers\pools\LanguagePool;
use helpers\translate\Translate;

class LanguageService
{
    public static function setLanguage()
    {
        try{

            global $env;



            if (isset($_GET['langStrict'])) {
                Translate::setLang($_GET['langStrict']);
                return;
            }



            if($_SERVER['HTTP_HOST'] === $env["HOST_US"]){
                Translate::setLang(LanguagePool::US_ENGLISH()->getLabel());
                return;
            }


            if (!isset($_GET['lang']) && Translate::hasLanguageSet()) {
               return;
            }

            if (!isset($_GET['lang']) && !Translate::hasLanguageSet()) {
                Translate::setLang(LanguagePool::GERMANY()->getLabel());
                return;
            }




            $label = strtolower($_GET['lang']);
            $languageTag = LanguagePool::getValueFromLabel($label);
            Translate::setLang($languageTag);
            return;


        }catch (\Exception $ex){
            Translate::setLang(LanguagePool::GERMANY()->getLabel());
        }
    }
}