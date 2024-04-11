<?php

namespace helpers\dto;

use helpers\pools\LanguagePool;
use model\AddOnContent;

class AddOnDTO
{
    public $title_en_us;
    public $title_en_gb;
    public $title_fr;
    public $title_de;

    public $description_de;
    public $description_fr;
    public $description_en_us;
    public $description_en_gb;

    public function __construct(AddOnContent $addOn)
    {
        $this->title_de = $addOn->getTitleDe();
        $this->title_fr = $addOn->getTitleFr();
        $this->title_en_us = $addOn->getTitleEnUS();
        $this->title_en_gb = $addOn->getTitleEnUK();

        $this->description_de = $addOn->getDescriptionDe();
        $this->description_fr = $addOn->getDescriptionFr();
        $this->description_en_us = $addOn->getDescriptionEnUS();
        $this->description_en_gb = $addOn->getDescriptionEnUK();
    }

    public function getTitleByLang($lang)
    {
        switch ($lang){
            case LanguagePool::GERMANY()->getLabel():
                return  $this->title_de;
            case LanguagePool::FRENCH()->getLabel():
                return $this->title_fr;
            case LanguagePool::UK_ENGLISH()->getLabel():
                return $this->title_en_gb;
            case LanguagePool::US_ENGLISH()->getLabel():
                return $this->title_en_us;
        }
    }

    public function getDescriptionByLang($lang)
    {
        switch ($lang){
            case LanguagePool::GERMANY()->getLabel():
                return  $this->description_de;
            case LanguagePool::FRENCH()->getLabel():
                return $this->description_fr;
            case LanguagePool::UK_ENGLISH()->getLabel():
                return $this->description_en_gb;
            case LanguagePool::US_ENGLISH()->getLabel():
                return $this->description_en_us;
        }
    }

}